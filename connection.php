<?php
$servername = "localhost";
$db = "db_notes";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $db, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// $servername1 = "localhost";
// $db1 = "test";
// $username1 = "root";
// $password1 = "";

// try {
//     $connSSCSC = new PDO("mysql:host=$servername1;dbname=" . $db1, $username1, $password1);
//     // set the PDO error mode to exception
//     $connSSCSC->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
