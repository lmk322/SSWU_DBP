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

  if( isset($_GET['id']) ) {
    $query = "SELECT * FROM sky WHERE id = {$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
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
  <ol> <?= $list ?> </ol>
  <form action="process_create.php" method="POST"
    <p><input type="text" name="tilte" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <p><input type="submit"></p>
  </form>
</body>
</html>
