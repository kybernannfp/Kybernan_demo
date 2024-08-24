<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<header>
    <h1>KYBERNAN</h1>
    <h3>New Wiki-Praxis Post</h3>
</header>
<form action="new_WP.php" method="post">
    <label for="premise">Premise:</label>
    <textarea id="premise" name="premise" rows="3" cols="30" minlength="10" maxlength="250">Enter the premise you wish to argue.</textarea>
    <label for="inverse">Inverse:</label>
    <textarea id="inverse" name="inverse" rows="3" cols="30" minlength="10" maxlength="250">Enter the opposite of the premise.</textarea>
    <br>
    <br>
    <br>
    <label for="arg1">Argument:</label>
    <textarea id="arg1" name="arg1" rows="3" cols="30" minlength="10" maxlength="500">Type an argument in support of the premise.</textarea>
    <label for="reb1">Rebuttal:</label>
    <textarea id="reb1" name="reb1" rows="3" cols="30" maxlength="500">Type a rebuttal to the argument.</textarea>
    <br>
    <label for="inv_arg1">Inverse Argument:</label>
    <textarea id="inv_arg1" name="inv_arg1" rows="3" cols="30" maxlength="500">Type an argument in support of the inverse.</textarea>
    <label for="inv_reb1">Inverse Rebuttal:</label>
    <textarea id="inv_reb1" name="inv_reb1" rows="3" cols="30" maxlength="500">Type a rebuttal to the argument.</textarea>
    <br>
    <label for="arg2">Argument:</label>
    <textarea id="arg2" name="arg2" rows="3" cols="30" maxlength="500"></textarea>
    <label for="reb2">Rebuttal:</label>
    <textarea id="reb2" name="reb2" rows="3" cols="30" maxlength="500"></textarea>
    <br>
    <label for="inv_arg2">Inverse Argument:</label>
    <textarea id="inv_arg2" name="inv_arg2" rows="3" cols="30" maxlength="500"></textarea>
    <label for="inv_reb2">Inverse Rebuttal:</label>
    <textarea id="inv_reb2" name="inv_reb2" rows="3" cols="30" maxlength="500"></textarea>
    <br>
    <label for="arg3">Argument:</label>
    <textarea id="arg3" name="arg3" rows="3" cols="30" maxlength="500"></textarea>
    <label for="reb3">Rebuttal:</label>
    <textarea id="reb3" name="reb3" rows="3" cols="30" maxlength="500"></textarea>
    <br>
    <label for="inv_arg3">Inverse Argument:</label>
    <textarea id="inv_arg3" name="inv_arg3" rows="3" cols="30" maxlength="500"></textarea>
    <label for="inv_reb3">Inverse Rebuttal:</label>
    <textarea id="inv_reb3" name="inv_reb3" rows="3" cols="30" maxlength="500"></textarea>
    <br>
    <input type="hidden" id="id" name="id" value="AUTO_INCREMENT">
    <input type="submit" value="submit">
    <br>
</form>
<br>
<br>
<a href="WP_menu.php">Return to Wiki-Praxis Menu<a>
</html>

<?php
require_once(__DIR__.'/../login.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $premise = $_POST['premise'];
    $inverse= $_POST['inverse'];
    $arg1 = $_POST['arg1'];
    $reb1 = $_POST['reb1'];
    $inv_arg1 = $_POST['inv_arg1'];
    $inv_reb1 = $_POST['inv_reb1'];
    $arg2 = $_POST['arg2'];
    $reb2 = $_POST['reb2'];
    $inv_arg2 = $_POST['inv_arg2'];
    $inv_reb2 = $_POST['inv_reb2'];
    $arg3 = $_POST['arg3'];
    $reb3 = $_POST['reb3'];
    $inv_arg3 = $_POST['inv_arg3'];
    $inv_reb3 = $_POST['inv_reb3'];
    $sql = "INSERT INTO `wiki_praxis`(`premise`,`inverse`,`arg1`,`reb1`,`inv_arg1`,`inv_reb1`,`arg2`,`reb2`,`inv_arg2`,`inv_reb2`,`arg3`,`reb3`,`inv_arg3`,`inv_reb3`) VALUES ('$premise','$inverse','$arg1','$reb1','$inv_arg1','$inv_reb1','$arg2','$reb2','$inv_arg2','$inv_reb2','$arg3','$reb3','$inv_arg3','$inv_reb3')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>". $conn->error;
    }
    $conn->close();
}
?>
