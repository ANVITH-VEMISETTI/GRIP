<?php
require_once "config.php";

$q = $_GET["q"];
$sql = "SELECT id, name, email, balance FROM users WHERE name = '".$q."'";

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
error_reporting(E_ERROR | E_PARSE);
if($q == $row['name']){
echo "<table>";
echo "<tr><th colspan='2'>Coustomer Details</th></tr>";
echo "<tr>";
echo "<th>Customer ID</th>";
echo "<td>" . $row['id'] . "</td></tr>";
echo "<tr><th>Customer Name</th>";
echo "<td>" . $row['name'] . "</td></tr>";
echo "<tr><th>E-mail</th>";
echo "<td>" . $row['email'] . "</td></tr>";
echo "<tr><th>Balance</th>";
echo "<td>" . $row['balance'] . "</td>";
echo "</tr>";
echo "</table>";
}
else
{
    echo "<p style = 'text-align:center;'><b>No Customer With Specified Name</b></p>";
}

mysqli_close($link);
?>