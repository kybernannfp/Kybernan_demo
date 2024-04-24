<!DOCTYPE html>
<html>
<head>
<script>
  function confirmDelete() {
    if (confirm("Delete this record?")) {
      const urlParams = new URLSearchParams(window.location.search);
      const idParam = urlParams.get('id')
      if (idParam !== null) {
        window.open("delete_goal.php?id=" + idParam, "Deleting ID " + idParam);
      }
    }
  }
</script>
</head>
<header>
    <h1>KYBERNAN</h1>
    <h3>Edit Goal Post</h3>
</header>
<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/demo/login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$output_form = function($id, $state, $direction, $current, $link, $location, $updated) {
    $is_checked = function($condition) { return $condition ? "checked" : ""; };

    echo <<<EOF
    <form action="update_goal.php?id=$id" method="post">
        <label for="state">Condition:</label>
        <input type=text id="state" name="state" value="$state">
        <label for="direction">Direction:</label>
        <input type=radio id="increase" name="direction" value="increase" {$is_checked($direction == 'increase')}>
        <label for="increase">increase</label>
        <input type=radio id="decrease" name="direction" value="decrease" {$is_checked($direction == 'decrease')}>
        <label for="decrease">decrease</label>
        <br>
        <label for="current">Current Value:</label>
        <input type=text id="current" name="current" value="$current">
        <label for="link">Source for Data:</label>
        <input type=text id="link" name="link" value="$link">
        <br>
        <label for="location">Geographic Scope:</label>
        <input type=text id="location" name="location"value="$location">
        <label for="updated">Last Updated:</label>
        <input type=date id="updated" name="updated"value="$updated">
        <input type="hidden" id="id" name="id" value="$id">
        <input type="submit" value="submit">
        <br>
    </form>
    <button name="deleteButton" onclick="confirmDelete()">Delete record</button>
    <br>
    <br>
    <a href="goal_menu.php">Return to Goal Menu<a>
    EOF;
};

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    if ($id == "") {
        echo "No goal ID supplied.";
        return;
    }

    $query = "SELECT * FROM goals WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $state = $row['state'];
            $direction = $row['direction'];
            $current = $row['current'];
            $link = $row['link'];
            $location = $row['location'];
            $updated = $row['updated'];
            $id = $row['id'];
        }
    }

    $output_form ($id, $state, $direction, $current, $link, $location, $updated); 

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $state = $_POST['state'];
    $direction= $_POST['direction'];
    $current = $_POST['current'];
    $link = $_POST['link'];
    $location = $_POST['location'];
    $updated = $_POST['updated'];
    $id = $_POST['id'];

    $sql = "UPDATE `goals` SET `state`=?,`direction`=?,`current`=?,`link`=?,`location`=?,`updated`=? WHERE `id` =?";
    $result = $conn->execute_query($sql, [$state, $direction, $current, $link, $location, $updated, $id]);

    if ($result == TRUE) {
        $output_form ($id, $state, $direction, $current, $link, $location, $updated); 
        echo "$conn->affected_rows record(s) updated successfully.\n";
    } else {
        echo "Error: " . $sql . "<br>". $conn->error;
    }
    $conn->close();
}
?>

</html>
