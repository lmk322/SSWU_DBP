<?php 
    $link = mysqli_connect("localhost","admin","admin","google");
    if(isset($_GET['category'])){
        $filtered_category = mysqli_real_escape_string($link,$_GET['category']);
    } else {
        $filtered_category = mysqli_real_escape_string($link,$_POST['category']);
    }
    $query = "SELECT app, genres, content_rating
              FROM googleapp
              where category='{$filtered_category}' 
              order by app";
    $query_info = "SELECT category from googleapp where category = '{$filtered_category}'";
    $result = mysqli_query($link, $query);
    $result_info = mysqli_query($link, $query_info);
    
    $app_info = '';
    while($row = mysqli_fetch_array($result)) {
        $app_info .= '<tr>';
        $app_info .= '<td>'.$row['app'].'</td>';
        $app_info .= '<td>'.$row['genres'].'</td>';
        $app_info .= '<td>'.$row['content_rating'].'</td>';
        $app_info .= '</tr>';
    }
    
    $row_info = mysqli_fetch_array($result_info);
    $category_info = $row_info['category'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Google Play Store </title>
</head>
<body>
    <h2><a href="index.php"> Google Play Store </a> | 카테고리별 어플 조회</h2>
    <h3>카테고리 : <?=$category_info?> </h3>
    <table border="1">
        <tr>
            <th>app name</th>
            <th>genre</th>
            <th>content rating</th>
        </tr>
        <?=$app_info?>
    </table>
</body>
</html>