<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('blog');

if( $_GET['mode'] === 'insert') {
    $result = mysql_query("INSERT INTO entry (title, description, created) VALUES ('" . 
 mysql_real_escape_string($_POST['title']) . "', '" .  mysql_real_escape_string($_POST['description']) . "', now())");
    header("Location: list.php");

}
if( $_GET['mode'] === 'modify') {
   
 	$titleValue = $_POST['title'];
 	$descriptionValue =  $_POST['description'];
 	$idValue  = $_POST['id'];

    $updateStatement = "UPDATE entry set title ='$titleValue', description ='$descriptionValue' where id =  '$idValue' ";
    $result = mysql_query($updateStatement);
    if ( $result === false ){
      var_dump($result);
	}
    header("Location: list.php");

}


