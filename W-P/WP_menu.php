<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<header>
    <h1>KYBERNAN</h1>
    <h3>Wiki-Praxis Menu</h3>
</header>

<body>
<a href="new_WP.php">ADD NEW TOPIC</a>
<br>
<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT id, premise FROM wiki_praxis";
$result = $conn->query($query);
if(!$result) die ("Database access failed: " . $conn->error);

echo "<ul>";
while ($row = $result->fetch_assoc()) {
    $id = "{$row['id']}";
    $premise = "{$row['premise']}";
    echo <<<END
    <li>
    <a href="single_WP.php?id=$id">Premise: {$premise}</a>
    </li>
    END;
}
echo "</ul>";