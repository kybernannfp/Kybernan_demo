<!DOCTYPE html>
<html>
<header>
    <h1>KYBERNAN</h1>
    <h3>New Intel Post</h3>
</header>
<form action="new_intel.php" method="post">
    <label for="title">Title:</label>
    <input type=text id="title" name="title">
    <br>
    <label for="publication">Publication:</label>
    <input type=text id="publication" name="publication">
    <br>
    <label for="link">Link:</label>
    <input type=text id="link" name="link">
    <br>
    <label for="blurb">Description:</label>
    <textarea id="blurb" name="blurb" rows="2" cols="30" minlength="10" maxlength="250">Enter a description</textarea><br>
    <label for="goals">Goals Impacted:</label>
    <input type="text" id="goals" name="goals"><br>
    <label for="location">Geographic Scope:</label>
    <input type=text id="locations" name="locations">
    <input type="hidden" id="id" name="id" value="AUTO_INCREMENT">
    <input type="submit" value="submit">
    <br>
</form>
<br>
<br>
<a href="intel_menu.php">Return to Intel Menu<a>
</html>

<?php
require_once(__DIR__.'/../login.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $publication= $_POST['publication'];
    $link = $_POST['link'];
    $blurb = $_POST['blurb'];
    $goals = $_POST['goals'];
    $locations = $_POST['locations'];
    $sql = "INSERT INTO `intel`(`title`,`publication`,`link`,`blurb`,`goals`,`locations`) VALUES ('$title','$publication','$link','$blurb','$goals','$locations')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>". $conn->error;
    }
    $conn->close();
}
?>