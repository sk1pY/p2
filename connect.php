<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'p2';

$link = mysqli_connect($host,$user,$password,$db) or die(mysqli_error($link));
