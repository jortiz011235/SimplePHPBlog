<?php mysql_connect('localhost', 'root', '');
mysql_select_db('blog');
$list_result = mysql_query('SELECT * FROM entry');

if (!empty($_GET['id'])) {
  $entry_result = mysql_query('SELECT * FROM entry WHERE id = ' . mysql_real_escape_string($_GET['id']));
  $entry = mysql_fetch_array($entry_result);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
        font-size: 0.8em;
        font-family: cursive;
        line-height: 1.6em;
      }
      header {
        border-bottom: 1px solid #ccc;
        padding: 20px 0;
      }
      nav {
        float: left;
        margin-right: 20px;
        min-height: 1000px;
        min-width: 150px;
        border-right: 1px solid #ccc;
      }
      nav ul {
        list-style: none;
        padding-left: 0;
        padding-right: 20px;
      }
      article {
        float: left;
      }
      .description {
        width: 500px;
      }
      button {
         background:none!important;
          border:none; 
          padding:0!important;
          /*border is optional*/
          border-bottom:1px solid #444; 
      }
    </style>
  </head>

  <body id="body">
    <div>
      <nav>
        <ul>
          <?php
          while ($row = mysql_fetch_array($list_result)) {
            echo "<li><a href=\"?id={$row['id']}\">" . htmlspecialchars($row['title']) . "</a></li>";
          }
          ?>
        </ul>
        <ul>
          <li>
            <a href="input.html" style="color:green; font-size:16pt;">Add</a>
          </li>
          <li>
           <?php
          if(!empty($entry)){
        ?>
            <a href="delete.php?id=<?=$entry['id']?>">Delete</a>
             <?php
        }
        ?>
          </li>
        </ul>
      </nav>
      <article>
        <?php
          if(!empty($entry)){
        ?>
        <h2><?=htmlspecialchars($entry['title'])?></h2>
        <div class="description">
          <?=htmlspecialchars($entry['description'])?>
        </div>
        <br /><br />
        <div>
          <a href="modify.php?id=<?=$entry['id']?>">Modify</a>
        </div>
        <?php
        }
        ?>
      </article>
    </div>
  </body>
</html>