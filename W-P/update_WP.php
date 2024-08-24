<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<script>
    function confirmDelete() {
        if (confirm("Delete this record?")) {
            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id')
            if (idParam !== null) {
                window.open("delete_WP.php?id=" + idParam, "Deleting ID " + idParam);
            }
        }
    }
</script>
<header>
    <h1>KYBERNAN</h1>
    <h3>Edit Wiki-Praxis Post</h3>
</header>
<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$output_form = function($id, $premise, $inverse, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3){

    echo <<<EOF
    <form action="update_WP.php" method="post">
    <label for="premise">Premise:</label>
    <textarea id="premise" name="premise" rows="3" cols="30" minlength="10" maxlength="250">$premise</textarea>
    <label for="inverse">Inverse:</label>
    <textarea id="inverse" name="inverse" rows="3" cols="30" minlength="10" maxlength="250">$inverse</textarea>
    <br>
    <br>
    <br>
    <label for="arg1">Argument:</label>
    <textarea id="arg1" name="arg1" rows="3" cols="30" minlength="10" maxlength="500">$arg1</textarea>
    <label for="reb1">Rebuttal:</label>
    <textarea id="reb1" name="reb1" rows="3" cols="30" maxlength="500">$reb1</textarea>
    <br>
    <label for="inv_arg1">Inverse Argument:</label>
    <textarea id="inv_arg1" name="inv_arg1" rows="3" cols="30" maxlength="500">$inv_reb1</textarea>
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
    <input type="hidden" id="id" name="id" value="$id">
    <input type="submit" value="submit">
    <br>
    </form>
    <button name="deleteButton" onclick="confirmDelete()">Delete record</button>
    <br>
    <br>
    <a href="WP_menu.php">Return to Wiki-Praxis Menu<a>
    EOF;
};


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    if ($id == "") {
        echo "No Wiki-Praxis ID supplied.";
        return;
    }

    $query = "SELECT * FROM wiki_praxis WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $premise = $row['premise'];
            $inverse = $row['inverse'];
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

    $output_form ($id, $premise, $inverse, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3);

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
     $premise = $_POST['premise'];
     $inverse = $_POST['inverse'];
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

    $sql = "UPDATE `wiki_praxis` SET `premise`=?,`inverse`=?,`arg1`=?,`reb1`=?,`inv_arg1`=?,`inv_reb1`=?, `arg2`=?,`reb2`=?,`inv_arg2`=?,`inv_reb2`=?,`arg3`=?,`reb3`=?,`inv_arg3`=?,`inv_reb3`=? WHERE `id` =?";
    $result = $conn->execute_query($sql, [$premise, $inverse, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3, $id]);

    if ($result == TRUE) {
        $output_form ($id, $premise, $inverse, $arg1, $reb1, $inv_arg1, $inv_reb1, $arg2, $reb2, $inv_arg2, $inv_reb2, $arg3, $reb3, $inv_arg3, $inv_reb3);
        echo "$conn->affected_rows record(s) updated successfully.\n";
    } else {
        echo "Error: " . $sql . "<br>". $conn->error;
    }
    $conn->close();
}
?>

</html>
