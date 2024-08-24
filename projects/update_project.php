<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<head>
    <script>
        function confirmDelete() {
            if (confirm("Delete this record?")) {
                const urlParams = new URLSearchParams(window.location.search);
                const idParam = urlParams.get('id')
                if (idParam !== null) {
                    window.open("delete_project.php?id=" + idParam, "Deleting ID " + idParam);
                }
            }
        }
    </script>
</head>
<header>
    <h1>KYBERNAN</h1>
    <h3>Edit Project Post</h3>
</header>
<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$output_form = function($id, $title, $blurb, $start_date, $goals, $locations, $resparty, $commentary, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3){

    echo <<<EOF
    <form action="update_project.php" method="post">
    <label for="title">Title:</label>
    <input type=text id="title" name="title" value ="$title">
    <br>
    <label for="blurb">Description:</label>
    <textarea id="blurb" name="blurb" rows="3" cols="30" minlength="10" maxlength="500">$blurb</textarea>
    <br>
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" value="$start_date">
    <label for="goals">Goals:</label>
    <input type="text" id="goals" name="goals" value="$goals">
    <br>
    <label for="locations">Geographic Scope:</label>
    <input type="text" id="locations" name="locations" value="$locations">
    <label for="resparty">Responsible Party:</label>
    <input type="text" id="resparty" name="resparty" value="$resparty">
    <br>
    <label for="commentary">Commentary and Links:</label>
    <textarea id="commentary" name="commentary" rows="5" cols="50">$commentary</textarea>
    <br>
    <label for="arg1">Argument:</label>
    <textarea id="arg1" name="arg1" rows="3" cols="30" minlength="10" maxlength="500">$arg1</textarea>
    <label for="reb1">Rebuttal:</label>
    <textarea id="reb1" name="reb1" rows="3" cols="30" maxlength="500">$reb1</textarea>
    <br>
    <label for="inv_arg1">Inverse Argument:</label>
    <textarea id="inv_arg1" name="inv_arg1" rows="3" cols="30" maxlength="500">$inv_arg1</textarea>
    <label for="inv_reb1">Inverse Rebuttal:</label>
    <textarea id="inv_reb1" name="inv_reb1" rows="3" cols="30" maxlength="500">$inv_reb1</textarea>
    <br>
    <label for="arg2">Argument:</label>
    <textarea id="arg2" name="arg2" rows="3" cols="30" maxlength="500">$arg2</textarea>
    <label for="reb2">Rebuttal:</label>
    <textarea id="reb2" name="reb2" rows="3" cols="30" maxlength="500">$reb2</textarea>
    <br>
    <label for="inv_arg2">Inverse Argument:</label>
    <textarea id="inv_arg2" name="inv_arg2" rows="3" cols="30" maxlength="500">$inv_arg2</textarea>
    <label for="inv_reb2">Inverse Rebuttal:</label>
    <textarea id="inv_reb2" name="inv_reb2" rows="3" cols="30" maxlength="500">$inv_reb2</textarea>
    <br>
    <label for="arg3">Argument:</label>
    <textarea id="arg3" name="arg3" rows="3" cols="30" maxlength="500">$arg3</textarea>
    <label for="reb3">Rebuttal:</label>
    <textarea id="reb3" name="reb3" rows="3" cols="30" maxlength="500">$reb3</textarea>
    <br>
    <label for="inv_arg3">Inverse Argument:</label>
    <textarea id="inv_arg3" name="inv_arg3" rows="3" cols="30" maxlength="500">$inv_arg3</textarea>
    <label for="inv_reb3">Inverse Rebuttal:</label>
    <textarea id="inv_reb3" name="inv_reb3" rows="3" cols="30" maxlength="500">$inv_reb3</textarea>
    <br>
    <input type="hidden" id="id" name="id" value="$id">
    <input type="submit" value="submit">
    <br>
    </form>
    <button name="deleteButton" onclick="confirmDelete()">Delete record</button>
    <br>
    <br>
    <a href="project_menu.php">Return to Project Menu<a>
    EOF;
};

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    if ($id == "") {
        echo "No Project ID supplied.";
        return;
    }

    $query = "SELECT * FROM projects WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $blurb = $row['blurb'];
            $start_date = $row['start_date'];
            $goals = $row['goals'];
            $locations = $row['locations'];
            $resparty = $row['resparty'];
            $commentary = $row['commentary'];
            $arg1 = $row['arg1'];
            $reb1 = $row['reb1'];
            $inv_arg1 = $row['inv_arg1'];
            $inv_reb1 = $row['inv_reb1'];
            $arg2 = $row['arg2'];
            $reb2 = $row['reb2'];
            $inv_arg2 = $row['inv_arg2'];
            $inv_reb2 = $row['inv_reb2'];
            $arg3 = $row['arg3'];
            $reb3 = $row['reb3'];
            $inv_arg3 = $row['inv_arg3'];
            $inv_reb3 = $row['inv_reb3'];
            $id = $row['id'];
        }
    }

    $output_form ($id, $title, $blurb, $start_date, $goals, $locations, $resparty, $commentary, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3);

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
     $title = $_POST['title'];
     $blurb = $_POST['blurb'];
     $start_date = $_POST['$start_date'];
     $goals = $_POST['goals'];
     $locations = $_POST['locations'];
     $resparty = $_POST['resparty'];
     $commentary = $_POST['commentary'];
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
     $id = $_POST['id'];

    $sql = "UPDATE `projects` SET `title`=?,`blurb`=?,`start_date`=?,`goals`=?,`locations`=?,`resparty`=?,`commentary`=?,`arg1`=?,`reb1`=?,`inv_arg1`=?,`inv_reb1`=?, `arg2`=?,`reb2`=?,`inv_arg2`=?,`inv_reb2`=?,`arg3`=?,`reb3`=?,`inv_arg3`=?,`inv_reb3`=? WHERE `id` =?";
    $result = $conn->execute_query($sql, [$title, $blurb, $start_date, $goals, $locations, $resparty, $commentary, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3, $id]);

    if ($result == TRUE) {
        $output_form ($id, $title, $blurb, $start_date, $goals, $locations, $resparty, $commentary, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3);
        echo "$conn->affected_rows record(s) updated successfully.\n";
    } else {
        echo "Error: " . $sql . "<br>". $conn->error;
    }
    $conn->close();
}
?>

</html>