<?php
$servername = "198.71.240.38";
$username = "contened";
$password = "Sarai2016*";
$dbname = "contened";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, m_nudiver FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["m_nudiver"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
