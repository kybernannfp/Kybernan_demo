<!DOCTYPE html>
<html>
<head>
    <script>
        function confirmDelete() {
            if (confirm("Delete this record?")) {
                const urlParams = new URLSearchParams(window.location.search);
                const idParam = urlParams.get('id')
                if (idParam !== null) {
                    window.open("delete_intel.php?id=" + idParam, "Deleting ID " + idParam);
                }
            }
        }
    </script>
</head>
<header>
    <h1><a href="localhost/demo/index.php">KYBERNAN</a></h1>
    <h3>Edit Intel Post</h3>
</header>
<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$output_form = function($id, $title, $publication, $link, $blurb, $goals, $locations){

    echo <<<EOF
    <form action="update_intel.php" method="post">
    <label for="title">Title:</label>
    <input type=text id="title" name="title" value="$title">
    <br>
    <label for="publication">Publication:</label>
    <input type=text id="publication" name="publication" value="$publication">
    <br>
    <label for="link">Link:</label>
    <input type=text id="link" name="link" value="$link">
    <br>
    <label for="blurb">Description:</label>
    <textarea id="blurb" name="blurb" rows="2" cols="30" minlength="10" maxlength="250" >$blurb</textarea><br>
    <label for="goals">Goals Impacted:</label>
    <input type="text" id="goals" name="goals" value="$goals"><br>
    <label for="location">Geographic Scope:</label>
    <input type=text id="locations" name="locations" value="$locations">
    <input type="hidden" id="id" name="id" value="$id">
    <input type="submit" value="submit">
    <br>
    </form>
    <button name="deleteButton" onclick="confirmDelete()">Delete record</button>
    <br>
    <br>
    <a href="intel_menu.php">Return to Intel Menu<a>
    EOF;
};

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    if ($id == "") {
        echo "No intel ID supplied.";
        return;
    }

    $query = "SELECT * FROM intel WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $publication = $row['publication'];
            $link = $row['link'];
            $blurb = $row['blurb'];
            $goals = $row['goals'];
            $locations = $row['locations'];
            $id = $row['id'];
        }
    }

    $output_form ($id, $title, $publication, $link, $blurb, $goals, $locations);

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
     $title = $_POST['title'];
     $publication = $_POST['publication'];
     $link = $_POST['link'];
     $blurb = $_POST['blurb'];
     $goals = $_POST['goals'];
     $locations = $_POST['locations'];
     $id = $_POST['id'];

    $sql = "UPDATE `intel` SET `title`=?,`publication`=?,`link`=?,`blurb`=?,`goals`=?,`locations`=? WHERE `id` =?";
    $result = $conn->execute_query($sql, [$title, $publication, $link, $blurb, $goals, $locations, $id]);

    if ($result == TRUE) {
        $output_form ($id, $title, $publication, $link, $blurb, $goals, $locations);
        echo "$conn->affected_rows record(s) updated successfully.\n";
    } else {
        echo "Error: " . $sql . "<br>". $conn->error;
    }
    $conn->close();
}
?>

</html>
