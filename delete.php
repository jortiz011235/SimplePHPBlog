<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('blog');
$idValue  = $_GET['id'];
$deleteStatement = "DELETE FROM entry  where id =  '$idValue' ";
$result = mysql_query($deleteStatement);
 header("Location: list.php");

