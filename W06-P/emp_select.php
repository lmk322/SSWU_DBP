<?php 
    $link = mysqli_connect("localhost","admin","admin","employees");
    if(isset($_GET['emp_no'])){
        $filtered_id = mysqli_real_escape_string($link,$_GET['emp_no']);
    } else {
        $filtered_id = mysqli_real_escape_string($link,$_POST['emp_no']);
    }
    if(isset($_GET['count'])){
        $filtered_count = mysqli_real_escape_string($link,$_GET['count']);
    } else {
        $filtered_count = mysqli_real_escape_string($link,$_POST['count']);
    }
    
    $emp_info = '';
    for($i=0;$i<$filtered_count;$i=$i+1) {
        $query = "SELECT * FROM employees WHERE emp_no = '{$filtered_id}'+$i";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);

        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['emp_no'].'</td>';
        $emp_info .= '<td>'.$row['birth_date'].'</td>';
        $emp_info .= '<td>'.$row['first_name'].'</td>';
        $emp_info .= '<td>'.$row['last_name'].'</td>';
        $emp_info .= '<td>'.$row['gender'].'</td>';
        $emp_info .= '<td>'.$row['hire_date'].'</td>';
        $emp_info .= '<td><a href="emp_update.php?emp_no='.$row['emp_no'].'">update</a></td>';
        $emp_info .= '<td><a href="emp_delete.php?emp_no='.$row['emp_no'].'">delete</a></td>';
        $emp_info .= '</tr>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>
<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 직원 정보 조회</h2>
    <table border="1">
        <tr>
            <th>emp_no</th>
            <th>birth_date</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>hire_date</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?=$emp_info?>
    </table>
</body>
</html>