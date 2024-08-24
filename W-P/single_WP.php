<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<header>
    <h1>KYBERNAN</h1>
    <h3>Wiki-Praxis Page</h3>
</header>

<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];
if ($id != "") {
    $query = "SELECT * FROM wiki_praxis WHERE id = ?";
    $result = $conn->execute_query($query, [$id]);

    if (!$result) die ("Database access failed: " . $conn->error);
while ($row = $result->fetch_assoc()) {
    $premise = "{$row['premise']}";
    $arg1 = "{$row['arg1']}";
    $reb1 = "{$row['reb1']}";
    $inv_arg1 = "{$row['inv_arg1']}";
    $inv_reb1 = "{$row['inv_reb1']}";
    $arg2 = "{$row['arg2']}";
    $reb2 = "{$row['reb2']}";
    $inv_arg2 = "{$row['inv_arg2']}";
    $inv_reb2 = "{$row['inv_reb2']}";
    $arg3 = "{$row['arg3']}";
    $reb3 = "{$row['reb3']}";
    $inv_arg3 = "{$row['inv_arg3']}";
    $inv_reb3 = "{$row['inv_reb3']}";

    echo "$premise" . "<br>". "<br>";
}
}

echo <<<END
<a href="inverse_WP.php?id=$id">Invert</a>
END;

?>

<table>
    <th>FOR</th>
    <th>AGAINST</th>
    <tr>
        <td><?php echo $arg1;?></td>
        <td><?php echo $reb1;?></td>
    </tr>
    <tr>
        <td><?php echo $inv_reb1;?></td>
        <td><?php echo $inv_arg1;?></td>
    </tr>
    <tr>
        <td><?php echo $arg2;?></td>
        <td><?php echo $reb2;?></td>
    </tr>
    <tr>
        <td><?php echo $inv_reb2;?></td>
        <td><?php echo $inv_arg2;?></td>
    </tr>
    <tr>
        <td><?php echo $arg3;?></td>
        <td><?php echo $reb3;?></td>
    </tr>
    <tr>
        <td><?php echo $inv_reb3;?></td>
        <td><?php echo $inv_arg3;?></td>
    </tr>
</table>
<?php
echo <<<END
<a href="update_WP.php?id=$id">Edit Page</a>
<br>
<br>
<a href="WP_menu.php">Return to Wiki-Praxis Menu<a>
END;
?>
</html>
