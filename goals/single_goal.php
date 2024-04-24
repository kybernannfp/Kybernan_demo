<!DOCTYPE html>
<html>

<header>
    <h1>KYBERNAN</h1>
    <h3>Goal Page</h3>
</header>

<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/demo/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];
if ($id != "") {
    $query= "SELECT * FROM goals WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if(!$result) die ("Database access failed: " . $conn->error);

    while ($row = $result->fetch_row()) {
        echo <<<END
        <ul>
        <li>Condition: $row[0]</li>
        <li>Direction: $row[1]</li>
        <li>Current Value: $row[2]</li>
        <li>Source: $row[3]</li>
        <li>Geographic Scope: $row[4]</li>
        <li>Last Updated: $row[5]</li>
        </ul>
        <a href="update_goal.php?id=$id">Edit Page</a>
        END;
    }
}
?>
<br>
<br>
<a href="goal_menu.php">Return to Goal Menu<a>
</html>
