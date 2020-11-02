<?php 
    $link = mysqli_connect("localhost","admin","admin","google");
    if(isset($_GET['first_rating'])){
        $filtered_first = mysqli_real_escape_string($link,$_GET['first_rating']);
    } else {
        $filtered_first = mysqli_real_escape_string($link,$_POST['first_rating']);
    }
    if(isset($_GET['last_rating'])){
        $filtered_last = mysqli_real_escape_string($link,$_GET['last_rating']);
    } else {
        $filtered_last = mysqli_real_escape_string($link,$_POST['last_rating']);
    }
    $query = "SELECT app, rating, reviews, category, price
              FROM googleapp
              where '{$filtered_first}' <= rating 
              and rating <='{$filtered_last}' 
              order by rating desc";
    $result = mysqli_query($link, $query);
    
    $app_info = '';
    while($row = mysqli_fetch_array($result)) {
        $app_info .= '<tr>';
        $app_info .= '<td>'.$row['app'].'</td>';
        $app_info .= '<td>'.$row['rating'].'</td>';
        $app_info .= '<td>'.$row['reviews'].'</td>';
        $app_info .= '<td>'.$row['category'].'</td>';
        $app_info .= '<td>'.$row['price'].'</td>';
        $app_info .= '</tr>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Google Play Store </title>
</head>
<body>
    <h2><a href="index.php"> Google Play Store </a> | 랭킹 순 어플 조회</h2>
    <table border="1">
        <tr>
            <th>app name</th>
            <th>rating</th>
            <th>review</th>
            <th>category</th>
            <th>price</th>
        </tr>
        <?=$app_info?>
    </table>
</body>
</html>