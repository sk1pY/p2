<?php
include '../connect.php';
if($_POST['submit']){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $author_id = $_POST['author_id'];

    $query = "INSERT INTO news(title,text,author_id) VALUES ('$title','$text','$author_id')";
    $res = mysqli_query($link,$query) or die(mysqli_error($link));
    var_dump($res);

}
?>
<form  method="post">
    <input type="text" name = 'title' placeholder="title">
    <input type="text" name = 'text' placeholder="text">
    <input type="text" name = 'author_id' placeholder="author_id    ">
    <input type="submit" name = 'submit' >
</form>