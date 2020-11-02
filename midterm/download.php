<?php 
    $link = mysqli_connect("localhost","admin","admin","google");
    if(isset($_GET['download'])){
        $filtered_download = mysqli_real_escape_string($link,$_GET['download']);
    } else {
        $filtered_download = mysqli_real_escape_string($link,$_POST['download']);
    }
    $query = "SELECT app, size, category
              FROM googleapp
              where installs='{$filtered_download}' 
              order by app";
    $query_info = "SELECT installs from googleapp where installs = '{$filtered_download}'";
    $result = mysqli_query($link, $query);
    $result_info = mysqli_query($link, $query_info);
    
    $app_info = '';
    while($row = mysqli_fetch_array($result)) {
        $app_info .= '<tr>';
        $app_info .= '<td>'.$row['app'].'</td>';
        $app_info .= '<td>'.$row['size'].'</td>';
        $app_info .= '<td>'.$row['category'].'</td>';
        $app_info .= '</tr>';
    }
    
    $row_info = mysqli_fetch_array($result_info);
    $download_info = $row_info['installs'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Google Play Store </title>
</head>
<body>
    <h2><a href="index.php"> Google Play Store </a> | 다운로드별 어플 조회</h2>
    <h3> 다운로드수 : <?=$download_info?> </h3>
    <table border="1">
        <tr>
            <th>app name</th>
            <th>size</th>
            <th>category</th>
        </tr>
        <?=$app_info?>
    </table>
</body>
</html>