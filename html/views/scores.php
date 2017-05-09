<?php
$server = "";
$username = "root";
$password = "hook3rSpit18!";
$dbname = "CTF";

echo "<html>";
echo '<link rel="stylesheet" type="text/css" href="../css/navbar.css">';
echo '<link rel="stylesheet" type="text/css" href="../css/tbl.css">';
require('user_includes/accountInfo.php');

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo '<table>';
$sql = "SELECT user_name, user_score FROM users ORDER BY user_score DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row 
    $rank = 1;
    echo '<tr><th>Rank</th><th>Username</th><th>Score</th></tr>';
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $rank . '</td><td>' . $row["user_name"]. "</td><td>" . intval($row["user_score"]). '</td></tr>';
	$rank += 1;
    }
} else {
    echo "0 results";
}
echo '</table><br><br>';
echo "</html>";
$conn->close();

?>
