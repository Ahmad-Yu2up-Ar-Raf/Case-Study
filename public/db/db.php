<?php 
$db = mysqli_connect("localhost","root","","case" );


if($db->connect_error){
    echo"error";
}