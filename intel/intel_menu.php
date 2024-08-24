<!DOCTYPE html>
<html>

<header>
    <h1>KYBERNAN</h1>
    <h3>Intel Menu</h3>
</header>

<body>
<a href="new_intel.php">ADD NEW INTEL</a>
<br>
<?php
require_once(__DIR__.'/../login.php');

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $query = "SELECT id, title FROM intel";
  $result = $conn->query($query);
  if(!$result) die ("Database access failed: " . $conn->error);

  echo "<ul>";
  while ($row = $result->fetch_assoc()) {
    $id = "{$row['id']}";
    $title = "{$row['title']}";
    echo <<<END
    <li>
    <a href="single_intel.php?id=$id">Title: {$title}</a>
    </li>
    END;
  }
  echo "</ul>";

?>
</body>
</html>
