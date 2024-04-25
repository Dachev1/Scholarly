<?php


function print_cards(string $grade, string $subject, object $pdo)
{
    require_once '../db/dbh.inc.php';

    $sql = "SELECT * FROM products WHERE subject = :subject AND grades = :grade";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('subject', $subject);
    $stmt->bindParam('grade', $grade);
    $stmt->execute();

    $result = $stmt->fetchAll();

    $counter = 0;
    if (isset($_SESSION["user_username"])) { //REGISTRIRAN
        foreach ($result as $row) {
            if ($counter == 3) {
                break;
            }
            echo "<div class='item'>";
            echo "<a href='../product_info.php?id=" . $row['product_id'] . "'>";
            echo "<div class='caption'>" . $row['title'] . "</div>";
            echo "<div class='item_img'><img src='../images/" . $row['image'] . "' alt='book image' height='100'></div>"; //snimka
            echo "<div class='condition'>" . "Състояние: " . $row['Pcondition'] . "</div>";
            echo "<div class='info'>";
            echo "<div class='from'>" . $row['username'] . "</div>";
            echo "<div class='price'>" . "Цена:  " . $row['price'] . "лв" . "</div>";

            echo "</div>";
            echo "</a>";
            echo "</div>";
            if ($counter <= 3) {
                $counter++;
            }
        }
    } else {
        foreach ($result as $row) {
            if ($counter == 4) {
                break;
            }


            echo "<div class='item'>";
            echo "<a href='../product_info.php?id=" . $row['product_id'] . "'>";
            echo "<div class='caption'>" . $row['title'] . "</div>";
            echo "<div class='item_img'><img src='../images/" . $row['image'] . "' alt='book image' height='100'></div>";
            echo "<div class='condition'>" . "Състояние: " . $row['Pcondition'] . "</div>";
            echo "<div class='from'>" . $row['username'] . "</div>";
            echo "<div class='price'>" . $row['price'] . " лв" . "</div>";
            echo "</a>";
            echo "</div>";

            if ($counter <= 4) {
                $counter++;
            }
        }
    }
}


// ZA VSICHKI
function print_cards_all(string $grade, string $subject, object $pdo)
{
    require_once '../../db/dbh.inc.php';

    $sql = "SELECT * FROM products WHERE subject = :subject AND grades = :grade";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('subject', $subject);
    $stmt->bindParam('grade', $grade);
    $stmt->execute();

    $result = $stmt->fetchAll();

    $counter = 0;

    foreach ($result as $row) {

        echo "<div class='item'>";
            echo "<a href='../../product_info.php?id=" . $row['product_id'] . "'>";
            echo "<div class='caption'>" . $row['title'] . "</div>";
            echo "<div class='item_img'><img src='../../images/" . $row['image'] . "' alt='book image' height='100'></div>";
            echo "<div class='condition'>" . "Състояние: " . $row['Pcondition'] . "</div>";
            echo "<div class='from'>" . $row['username'] . "</div>";
            echo "<div class='price'>" . $row['price'] . " лв" . "</div>";
            echo "</a>";
            echo "</div>";

        $counter++;
        if ($counter % 4 === 0 && $counter !== count($result)) {
            echo '</div><br><br><div class="content">';
        }
    }
    if ($counter == 0) {
        echo 'Няма учебници';
    }
    echo '</div>';
}
