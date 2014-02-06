<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('blog');
$result = mysql_query('SELECT * FROM entry WHERE id = '.mysql_real_escape_string($_GET['id']));
$entry = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html> 
  <form action="./process.php?mode=modify" method="POST">
    <input type="hidden" name="id" value="<?=$entry['id']?>" />
    <p>Subject: <input type="text" name="title" value="<?=htmlspecialchars($entry['title'])?>"></p>
    <p>Content: <textarea name="description" cols="30" rows="10"><?=htmlspecialchars($entry['description'])?></textarea></p>
    <p><input type="submit" /></p>
  </form>
</html>
