<!-- host,username,password jgn ubah.
nama database=nama projek-->

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'todolist';

$conn = new mysqli($host,$username,$password,$database);

if ($conn->connect_error){
    die("Connection failed : ".$conn->connect_error);
}

?>
