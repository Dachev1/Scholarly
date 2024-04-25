<?php
require_once '../db/config_session.inc.php';
require_once '../db/dbh.inc.php';

$user_chat = isset($_GET['user']) ? $_GET['user'] : null;
if ($user_chat) {
    $receiver_username = $user_chat;
    $sender_username = $_SESSION["user_username"];

    function getMessages(object $pdo, string $receiver_username, string $sender_username)
    {
        $query = "SELECT * FROM messages WHERE (receiver_username = :receiver_username AND sender_username = :sender_username) OR (receiver_username = :sender_username AND sender_username = :receiver_username)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":receiver_username", $receiver_username);
        $stmt->bindParam(":sender_username", $sender_username);

        if ($stmt->execute()) {
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $messages;
        } else {
            return [];
        }
    }
    function get_reciever_img(object $pdo, string $receiver_username)
    {
        $query = "SELECT img FROM users WHERE username = :receiver_username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":receiver_username", $receiver_username);
        $stmt->execute();
        $receiver_img = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $receiver_img;
    }
    $receiver_img = get_reciever_img($pdo, $receiver_username);
    $messages = getMessages($pdo, $receiver_username, $sender_username);

    if (count($messages) > 0) {
        $messageRoom = null;
?>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/navbar.css">
            <link rel="stylesheet" href="../css/view_message.css">
            <script src="../js/scroll_to_bottom.js"></script>
            <title>Чат с <?php echo $user_chat ?></title>
            <link rel="icon" href="../img/book.png">
        </head>

        <body>
            <?php
            require '../elements/navbar.php';
            $slash = "../";
            navbar($slash)
            ?>


            <div class="message_container">
                <?php
                foreach ($messages as $message) {

                    if ($message['sender_username'] == $sender_username) {
                        echo '<div class="message_right"><img class="user_img_right user_img" src="' . $slash . $_SESSION['user_img'] . '" alt="user_image">';
                    } else {
                        echo '<div class="message_left"><img class="user_img_left user_img" src="' . $slash . $receiver_img[0]['img'] . '" alt="receiver_user_image">';
                    }
                ?>
                    <p class="time"><?php echo $message['timestamp']; ?></p>
                    <p><?php echo $message['message_content']; ?></p>


            </div>
    <?php
                }
            }
    ?>
    </div>
    </div>
<?php } else {
?>
    <div class="container" id="container">
        <h1>Нямате съобщения</h1>
        <a href="index.php"> <button type="button">Начална страница</button></a>
    </div>
    <footer>
    <?php
}
if ($_SESSION['user_username'] == $sender_username) { ?>
        <form class="footer" action="../db/send_massage.php?id=<?php echo $message['product_id']; ?>" method="post">
            <input type="hidden" name="receiver_username" value="<?php echo $user_chat; ?>">
            <input type="hidden" name="sender_username" value="<?php echo $message['sender_username']; ?>">
            <input autocomplete="off" class="text" type="text" name="message_content" placeholder="Вашето съобщение" required></input>
            <input type="submit" value="Изпрати" class="submit">
            <a class="sett settTwo" onclick="openNav()">Акаунт</a>
        </form>
    <?php } ?>
    </footer>

        </body>

        </html>