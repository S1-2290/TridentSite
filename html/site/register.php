<?php
// Value variables
$firstname = $_POST['firstname'];
$username = $_POST['user'];
$email = $_POST['emailinput'];
$password = $_POST['passwordInput'];

// Create connection to database
$server = 'localhost:3306';
$user = '<ENTER_USERNAME>';
$pass = '<ENTER_PASSWORD>';
$db_name = 'trident_site';
$command_create = "create database trident_site;";
$insert_command = "INSERT INTO users (firstname, username, email, password, confirmed) VALUES ('$firstname', '$username', '$email', '$password', 'Y')";

// Init the connection
$connect = new mysqli($server, $user, $pass, $db_name);

// Primary functions
function write_data($message) {
    $data = fopen('.data.txt', 'a+');
    fwrite($data, $message."\n");
    fclose($data);
}

// Check the current connection
if ($connect->connect_error) {
    die("<p><font color='red'>Failed to connect, here is the error: </font>".$connect->connect_error);
}

// Check if main site DB exists
if ($connect->select_db('trident_site') === true) {
    write_data("DATABASE_CONNECTED: ".$connect->client_info);
} else {
    echo "<h4>Creating DB...</h4>";
    if ($connect->query($command_create) === true) {
        echo "<h4>Created DB...</h4>";
    } else {
        echo "<h4><font color='red'>Could not create DB, Error: </font>".$connect->error;
    }
}

// Insert the post values into the database
if ($connect->query($insert_command) === true) {
    write_data("NEW_RECORD_ADDED");
    // header("http://127.0.0.1/site.php?itr=10");
    echo "<script type='text/javascript'>window.top.location='http://127.0.0.1/site.php?itr=10';</script>";
} else {
    echo "<h2><font color='red'>Error: </font>".$insert_command." - ".$connect->error;
}
?>
