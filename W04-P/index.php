<?php
  $link = mysqli_connect('localhost','root','mkyung127688','dbp');
  $query = "SELECT * FROM sky";
  $result = mysqli_query($link,$query);
  $list = '';
  while($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'description' => 'This is where he introduces his drama activities.'
  );
  $update_link = '';
  $delete_link = '';
  $author = '';

  if( isset($_GET['id']) ) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM sky LEFT JOIN author_sky ON sky.author_id = author_sky.id WHERE sky.id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $article['name'] = htmlspecialchars($row['name']);

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    $delete_link = '<form action="process_delete.php" method="POST">
    <input type="hidden" name="id" value="'.$_GET['id'].'">
    <input type="submit" value="delete"></form>';
    $author = "<p>by {$article['name']}</p>";
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> KANG SKY </title>
</head>
<body>
  <h1><a href="index.php"> KANG SKY </a></h1>
  <a href = "author.php">author</a>
  <ol> <?= $list ?> </ol>
  <a href="create.php">create</a>
  <?=$update_link?>
  <?=$delete_link?>
  <h2> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?>
  <?= $author ?>
</body>
</html>
