<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<header>
    <h1>KYBERNAN</h1>
    <h2>Main Menu</h2>
</header>

<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

?>
<a href="demo_guide.php">Demo Guide</a>
<br>
<br>
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
