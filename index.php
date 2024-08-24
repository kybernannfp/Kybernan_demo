<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel='stylesheet'>
</head>
<header>
    <h1>KYBERNAN</h1>
    <h2>Main Menu</h2>
</header>

<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

?>

<a href="goals/goal_menu.php">GOALS</a>
<br>
<a href="intel/intel_menu.php">INTEL</a>
<br>
<a href="proposals/proposal_menu.php">PROPOSALS</a>
<br>
<a href="projects/project_menu.php">PROJECTS</a>
<br>
<a href="W-P/WP_menu.php">WIKI-PRAXIS</a>

<html>
