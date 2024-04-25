<?php
$slash = "";
function navbar(string $slash)
{
?>
    <!-- navbar -->
    <header class="header">
        <a href="<?php echo $slash ?>index.php" class="logo">Scholarly</a>
        <nav class="navbar">
            <a href="<?php echo $slash ?>about_us.php">За нас</a>
            <a href="<?php echo $slash ?>contacts.php">Контакти</a>
           
            <?php
            if (isset($_SESSION["user_username"])) {
            ?>
                <a class="sett" onclick="openNav()">Акаунт</a>
                <div id="mySidenav">
                    <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>
                    <?php echo "<img class='user_img' src='". $slash . $_SESSION['user_img'] . "' alt='user_image'>" ?>
                    <a><?php echo $_SESSION["user_username"] ?></a>
                    <a><?php echo $_SESSION["user_email"] ?></a>
                    <a href="<?php echo $slash ?>index.php">Начало</a>
                    <a href="<?php echo $slash ?>user_products.php">Вашите продукти</a>
                    <a href="<?php echo $slash ?>chat_function/chat_heads.php">Съобщения</a>
                    <a href="<?php echo $slash ?>settings/settings.php">Настройки</a>
                    <a href="<?php echo $slash ?>db/logout.php">Изход</a>
                <?php
            } else {
                ?>
                    <a href="<?php echo $slash ?>login_register.php">Влез</a>
                <?php
            }
                ?>
        </nav>
        </div>
        <script src="<?php echo $slash ?>js/navigation_manu.js"></script>
    </header>
    <hr class="hr_nav">
<?php } ?>