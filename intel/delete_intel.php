<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/demo/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `intel` WHERE `id`=?";

    $result = $conn->execute_query($sql, [$id]);

    if ($result == TRUE) {
        echo "Record deleted successfully.";
        echo <<<END
        <br>
        <br>
        <a href="intel_menu.php">Return to Intel Menu<a>
        END;



    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}