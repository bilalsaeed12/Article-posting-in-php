<?php

$conn = mysqli_connect("localhost", "root", "", "createblog");
if (!$conn) {
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able establish database connection</h3>";
}
$id = $_POST['id'] ?? null;

if (!$id) {
    header("Location: myprofile.php");
    exit;
}

$query = ("DELETE FROM addblog where id=$id");

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Data deleted";
    header('Location: myprofile.php');
} else {
    echo "data not deleted";
}
