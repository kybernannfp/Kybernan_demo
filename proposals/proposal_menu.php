<!DOCTYPE html>
<html>

<header>
    <h1>KYBERNAN</h1>
    <h3>Proposal Menu</h3>
</header>

<body>
<a href="new_proposal.php">ADD NEW PROPOSAL</a>
<br>
<?php
  require_once '/Applications/XAMPP/xamppfiles/htdocs/demo/login.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $query = "SELECT id, title FROM proposals";
  $result = $conn->query($query);
  if(!$result) die ("Database access failed: " . $conn->error);

  echo "<ul>";
  while ($row = $result->fetch_assoc()) {
    $id = "{$row['id']}";
    $title = "{$row['title']}";
    echo <<<END
    <li>
    <a href="single_proposal.php?id=$id">Title: {$title}</a>
    </li>
    END;
  }
  echo "</ul>";

?>
</body>
</html>
