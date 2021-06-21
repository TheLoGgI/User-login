
<?php 

$servername = "localhost";
$username = "username";
$password = "password";
$table = 'users';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";



function createDB() {
    $command = "CREATE TABLE Users(
        priuserID int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL
    );";
    return $command;
}


function insertDB($username, $userpassword) {
    $command = "INSERT INTO `users`(`username`, `password`) VALUES ('{$username}','{$userpassword}');";
}

function checkUser($username) {
    $command = "SELECT username = '{$username}' FROM users;";
    $command = "SELECT username FROM users WHERE username LIKE '{$username}';";
}

?> 