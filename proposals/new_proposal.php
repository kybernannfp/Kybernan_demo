<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<header>
    <h1>KYBERNAN</h1>
    <h3>New Proposal Post</h3>
</header>
<form action="new_proposal.php" method="post">
    <label for="title">Title:</label>
    <input type=text id="title" name="title">
    <br>
    <label for="blurb">Description:</label>
    <textarea id="blurb" name="blurb" rows="3" cols="30" minlength="10" maxlength="500">Enter a description.</textarea>
    <br>
    <label for="goals">Goals:</label>
    <input type="text" id="goals" name="goals">
    <label for="locations">Geographic Scope:</label>
    <input type="text" id="locations" name="locations">
    <br>
    <label for="resparty">Responsible Party:</label>
    <input type="text" id="resparty" name="resparty">
    <label for="resources">Resources Required:</label>
    <input type="text" id="resources" name="resources">
    <br>
    <label for="steps">Steps:</label>
    <textarea id="steps" name="steps" rows="3" cols="30" maxlength="250">Explain the step-by-step process.</textarea>
    <label for="outcome">Projected Outcome:</label>
    <textarea id="outcome" name="outcome" rows="3" cols="30" maxlength="250">Explain how the steps will lead to specific goals.</textarea>
    <br>
    <label for="arg1">Argument:</label>
    <textarea id="arg1" name="arg1" rows="3" cols="30" minlength="10" maxlength="500">Type an argument in support of the proposal.</textarea>
    <label for="reb1">Rebuttal:</label>
    <textarea id="reb1" name="reb1" rows="3" cols="30" maxlength="500">Type a rebuttal to the argument.</textarea>
    <br>
    <label for="inv_arg1">Inverse Argument:</label>
    <textarea id="inv_arg1" name="inv_arg1" rows="3" cols="30" maxlength="500">Type an argument in opposition to the proposal.</textarea>
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
<a href="proposal_menu.php">Return to Proposal Menu<a>
</html>

<?php
require_once(__DIR__.'/../login.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $blurb = $_POST['blurb'];
    $goals = $_POST['goals'];
    $locations = $_POST['locations'];
    $resparty = $_POST['resparty'];
    $resources = $_POST['resources'];
    $steps = $_POST['steps'];
    $outcome = $_POST['outcome'];
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
    $sql = "INSERT INTO `proposals`(`title`,`blurb`,`goals`,`locations`,`resparty`,`resources`,`steps`,`outcome`,`arg1`,`reb1`,`inv_arg1`,`inv_reb1`,`arg2`,`reb2`,`inv_arg2`,`inv_reb2`,`arg3`,`reb3`,`inv_arg3`,`inv_reb3`) VALUES ('$title','$blurb','$goals','$locations','$resparty','$resources','$steps','$outcome','$arg1','$reb1','$inv_arg1','$inv_reb1','$arg2','$reb2','$inv_arg2','$inv_reb2','$arg3','$reb3','$inv_arg3','$inv_reb3')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>". $conn->error;
    }
    $conn->close();
}
?>