<!DOCTYPE html>
<html>

<header>
    <h1>KYBERNAN</h1>
    <h3>Intel Page</h3>
</header>

<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/demo/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];
if ($id != "") {
    $query= "SELECT * FROM intel WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if(!$result) die ("Database access failed: " . $conn->error);

    while ($row = $result->fetch_row()) {
        echo <<<END
        <ul>
        <li>Title: $row[0]</li>
        <li>Publication: $row[1]</li>
        <li>Link: $row[2]</li>
        <li>Description: $row[3]</li>
        <li>Goals: $row[4]</li>
        <li>Geographic Scope: $row[5]</li>
        </ul>
        <a href="update_intel.php?id=$id">Edit Page</a>
        END;
    }
}
?>
<br>
<br>
<a href="intel_menu.php">Return to Intel Menu<a>
</html>
