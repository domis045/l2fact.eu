<?php
$kalba = $_SESSION['lang'];
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 $conn->set_charset('utf8'); 
 // Check connection
 if (!$conn) 
	{
	echo "<div class='news'>";
	echo "<h1> Error </h1>";
	die('<p>Could not connect to the news database '.mysql_error());
	echo "</p>";
	echo "</div>";
	}

$sql = "SELECT newsid, title, text FROM $kalba";
$result = mysqli_query($conn, mysql_real_escape_string($sql)); 

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
	echo "<div class='news'><h1> " . $row["title"]. " </h1><p>" . $row["text"] . " </p></div>";
    }
} else {
    echo "<div class='news'>";
    echo "<h1> No news </h1>";
    echo "<p> No news were yet added </p>";
    echo "</div>";
}

mysqli_close($conn);
 ?> 