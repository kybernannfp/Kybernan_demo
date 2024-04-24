<!DOCTYPE html>
<html>
<header>
    <h1>KYBERNAN</h1>
    <h3>New Goal Post</h3>
</header>
<form action="new_goal.php" method="post">
    <label for="state">Condition:</label>
    <input type=text id="state" name="state">
    <label for="direction">Direction:</label>
    <input type=radio id="increase" name="direction" value="increase">
    <label for="increase">increase</label>
    <input type=radio id="decrease" name="direction" value="decrease">
    <label for="decrease">decrease</label>
    <br>
    <label for="current">Current Value:</label>
    <input type=text id="current" name="current">
    <label for="link">Source for Data:</label>
    <input type=text id="link" name="link">
    <br>
    <label for="location">Geographic Scope:</label>
    <input type=text id="location" name="location">
    <label for="updated">Last Updated:</label>
    <input type=date id="updated" name="updated">
    <input type="hidden" id="id" name="id" value="AUTO_INCREMENT">
    <input type="submit" value="submit">
    <br>
</form>
<br>
<br>
<a href="goal_menu.php">Return to Goal Menu<a>
</html>

<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/demo/login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $state = $_POST['state'];
    $direction= $_POST['direction'];
    $current = $_POST['current'];
    $link = $_POST['link'];
    $location = $_POST['location'];
    $updated = $_POST['updated'];
$sql = "INSERT INTO `goals`(`state`,`direction`,`current`,`link`,`location`,`updated`) VALUES ('$state','$direction','$current','$link','$location','$updated')";
$result = $conn->query($sql);
if ($result == TRUE) {
echo "New record created successfully.";
} else {
echo "Error: " . $sql . "<br>". $conn->error;
}
$conn->close();
}
?>






