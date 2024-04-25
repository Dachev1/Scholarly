<?php
include '../db/config_session.inc.php';
include '../db/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/chatheads.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>Scholarly</title>
    <link rel="icon" href="../img/book.png">
</head>

<body>
    <!-- navbar -->
    <?php
    require '../elements/navbar.php';
    $slash = "../";
    navbar($slash);
    ?>
  <div class="container">
    <?php
    if (isset($_SESSION["user_username"])) {

        $receiver_username = $_SESSION["user_username"];

        function getMessages(object $pdo, string $receiver_username)
        {
            $query = "SELECT DISTINCT sender_username, receiver_username, timestamp FROM messages WHERE receiver_username = :receiver_username OR sender_username = :receiver_username ORDER BY timestamp DESC";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":receiver_username", $receiver_username);

            if ($stmt->execute()) {
                $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $stmt = null;
                $pdo = null;
                return $messages;
            } else {
                return [];
            }
        }

        $messages = getMessages($pdo, $receiver_username);
        if ($messages) {
            function displayMessages(array $messages, string $receiver_username)
            {
                $displayed_usernames = []; // Array to store displayed usernames
                foreach ($messages as $message) {
                    $sender_username = $message["sender_username"];
                    $receiver_username = $message["receiver_username"];

                    // Display sender and receiver usernames differently
                    if ($sender_username == $receiver_username) {
                    } elseif ($receiver_username == $_SESSION["user_username"]) {
                        $username = htmlspecialchars($sender_username, ENT_QUOTES, 'UTF-8');
                        if (!in_array($username, $displayed_usernames)) {
                            echo "<div class='chathead'><a class='chathead-link' href='view_message.php?user={$message["sender_username"]}'><p>$username</p></a></div>";
                            $displayed_usernames[] = $username;
                        }
                    } else {
                        $username = htmlspecialchars($receiver_username, ENT_QUOTES, 'UTF-8');
                        if (!in_array($username, $displayed_usernames)) {
                            echo "<div class='chathead'><a class='chathead-link' href='view_message.php?user={$message["receiver_username"]}'><p>$username</p></a></div>";
                            $displayed_usernames[] = $username;
                        }
                    }
                }
            }
            displayMessages($messages, $receiver_username);
        } else {
            echo "<p class='no_messages'>Нямате съобщения</p>";
        }
    } else {
        echo "<p class='no_messages'>Нямате съобщения</p>";
    }
    ?>
  </div>
</body>

</html>