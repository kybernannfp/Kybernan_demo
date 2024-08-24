<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<header>
    <h1>KYBERNAN</h1>
    <h3>Goal Page</h3>
</header>

<?php
// This database configuration hardcodes a path specific to your XAMPP IDE.
// At some point, this should be updated to e.g. a relative path.
require_once(__DIR__.'/../login.php');

// Hack to call global functions in heredoc strings
function heredoc($param) {
    // just return whatever has been passed to us
    return $param;
}
$heredoc = 'heredoc';

function intel_results($state, $conn)
{
  $wildcard_state = "%$state%";
  $query = "SELECT id, title FROM intel WHERE goals LIKE ?";
  $result = $conn->execute_query($query, [$wildcard_state]);

  if (!$result) die ("Database access failed: " . $conn->error);

    // Construct a nested unordered list for search matches
    $result_str = "<ul>";
    $item_counter = 1;
    while ($row = $result->fetch_assoc()){
        $item_url = "../intel/single_intel.php?id={$row['id']}";
        $item_url = "'" . $item_url . "'";
        $item_title = "{$row['title']}";

        $item = "<li>";
        $item = $item . "{$item_counter}: ";
        $item = $item . "<a href={$item_url}>{$item_title}</a>";
        $item = $item . "</li>";
        $result_str = $result_str . $item;
        $item_counter += 1;
    }
    $result_str = $result_str . "</ul>";

    return $result_str;
}

function proposal_results($state, $conn)
{
    $wildcard_state = "%$state%";
    $query = "SELECT id, title FROM proposals WHERE goals LIKE ?";
    $result = $conn->execute_query($query, [$wildcard_state]);

    if (!$result) die ("Database access failed: " . $conn->error);

    // Construct a nested unordered list for search matches
    $result_str = "<ul>";
    $item_counter = 1;
    while ($row = $result->fetch_assoc()){
        $item_url = "../proposals/single_proposal.php?id={$row['id']}";
        $item_url = "'" . $item_url . "'";
        $item_title = "{$row['title']}";

        $item = "<li>";
        $item = $item . "{$item_counter}: ";
        $item = $item . "<a href={$item_url}>{$item_title}</a>";
        $item = $item . "</li>";
        $result_str = $result_str . $item;
        $item_counter += 1;
    }
    $result_str = $result_str . "</ul>";

    return $result_str;
}

function project_results($state, $conn)
{
    $wildcard_state = "%$state%";
    $query = "SELECT id, title FROM projects WHERE goals LIKE ?";
    $result = $conn->execute_query($query, [$wildcard_state]);

    if (!$result) die ("Database access failed: " . $conn->error);

    // Construct a nested unordered list for search matches
    $result_str = "<ul>";
    $item_counter = 1;
    while ($row = $result->fetch_assoc()){
        $item_url = "../projects/single_project.php?id={$row['id']}";
        $item_url = "'" . $item_url . "'";
        $item_title = "{$row['title']}";

        $item = "<li>";
        $item = $item . "{$item_counter}: ";
        $item = $item . "<a href={$item_url}>{$item_title}</a>";
        $item = $item . "</li>";
        $result_str = $result_str . $item;
        $item_counter += 1;
    }
    $result_str = $result_str . "</ul>";

    return $result_str;
}

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];
if ($id != "") {
    $query= "SELECT * FROM goals WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if(!$result) die ("Database access failed: " . $conn->error);

    // Updated to fetch_array; fetch_row() results depend on ordering of
    // fields, but for me, the first column is ID, whereas in your DB schema
    // it's last; at some point, we need to include the schema with the code
    // directly and update this type of usage.
    while ($row = $result->fetch_array()) {
        // For me, $row[0] is the ID
        $state = $row['state'];

        echo <<<END
        <ul>
        <li>Condition: $row[0]</li>
        <li>Direction: $row[1]</li>
        <li>Current Value: $row[2]</li>
        <li>Source: $row[3]</li>
        <li>Geographic Scope: $row[4]</li>
        <li>Last Updated: $row[5]</li>
        <li>Related Intel: {$heredoc(intel_results($state, $conn))}</li>
        <li>Related Proposals: {$heredoc(proposal_results($state, $conn))}</li>
        <li>Related Projects: {$heredoc(project_results($state, $conn))}</li>
        </ul>
        END;
    }
}

?>
<br>
<br>
<a href="update_goal.php?id=$id">Edit Page</a>
<br>
<a href="goal_menu.php">Return to Goal Menu<a>
</html>
