<?php
function cors()
{
    // // Allow from any origin
    // if (isset($_SERVER['HTTP_ORIGIN'])) {
    //     // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    //     // you want to allow, and if so:
    //     header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    //     header('Access-Control-Allow-Credentials: true');
    //     header('Access-Control-Max-Age: 86400');    // cache for 1 day
    // }
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }
}

$request = json_decode(file_get_contents("php://input"));
$name = $request->name;
$phone = $request->phone;
$email = $request->email;


$servername = "localhost";
$username = "Few";
$password = "1234";
$dbname = "vue";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO friends (name, phone, email)
VALUES ('".$name."', '".$phone."', '".$email."')";

if ($conn->query($sql) === TRUE) {
    var_dump("เพิ่มข้อมูลสำเร็จ"); 
} else {
   var_dump("Error: " . $sql . "<br>" . $conn->error);
}
$conn->close();
?>