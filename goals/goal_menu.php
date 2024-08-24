<!DOCTYPE html>
<html>

<header>
    <h1>KYBERNAN</h1>
    <h3>Goal Menu</h3>
</header>

<body>

<a href="new_goal.php">ADD NEW GOAL</a>
<br>
<?php
require_once(__DIR__.'/../login.php');

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $query = "SELECT id, state FROM goals";
  $result = $conn->query($query);
  if(!$result) die ("Database access failed: " . $conn->error);

  echo "<ul>";
  while ($row = $result->fetch_assoc()) {
    $id = "{$row['id']}";
    $state = "{$row['state']}";
    echo <<<END
    <li>
    <a href="single_goal.php?id=$id">Condition {$state}</a>
    </li>
    END;
  }
  echo "</ul>";

?>
</body>
</html>
