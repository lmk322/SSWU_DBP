<?php
    $link = mysqli_connect("localhost", "admin", "admin", "google");
    $query_cate = "SELECT distinct category FROM googleapp order by category";
    $query_down = "SELECT distinct installs FROM googleapp order by installs desc";
    $result_cate = mysqli_query($link, $query_cate);
    $result_down = mysqli_query($link, $query_down);
    $row_cate = mysqli_fetch_array($result_cate);
    $row_down = mysqli_fetch_array($result_down);
    $cate = array();
    $down = array();
    $i = 0;
    $j = 0;
    while($row_cate = mysqli_fetch_array($result_cate)) {
        $cate[$i] = $row_cate['category'];
        $i++;
    }
    while($row_down = mysqli_fetch_array($result_down)) {
        $down[$j] = $row_down['installs'];
        $j++;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Google Play Store </title>
</head>
<body>
    <h1> Google Play Store </h1>
    <form action="category.php" method="POST">
        (1) 카테고리별 어플 조회 <br>
        <select name="category">
            <option value="none">========선택========</option>
            <option value="<?=$cate[0]?>"><?=$cate[0]?></option>
            <option value="<?=$cate[1]?>"><?=$cate[1]?></option>
            <option value="<?=$cate[2]?>"><?=$cate[2]?></option>
            <option value="<?=$cate[3]?>"><?=$cate[3]?></option>
            <option value="<?=$cate[4]?>"><?=$cate[4]?></option>
            <option value="<?=$cate[5]?>"><?=$cate[5]?></option>
            <option value="<?=$cate[6]?>"><?=$cate[6]?></option>
            <option value="<?=$cate[7]?>"><?=$cate[7]?></option>
            <option value="<?=$cate[8]?>"><?=$cate[8]?></option>
            <option value="<?=$cate[9]?>"><?=$cate[9]?></option>
            <option value="<?=$cate[10]?>"><?=$cate[10]?></option>
            <option value="<?=$cate[11]?>"><?=$cate[11]?></option>
            <option value="<?=$cate[12]?>"><?=$cate[12]?></option>
            <option value="<?=$cate[13]?>"><?=$cate[13]?></option>
            <option value="<?=$cate[14]?>"><?=$cate[14]?></option>
            <option value="<?=$cate[15]?>"><?=$cate[15]?></option>
            <option value="<?=$cate[16]?>"><?=$cate[16]?></option>
            <option value="<?=$cate[17]?>"><?=$cate[17]?></option>
            <option value="<?=$cate[18]?>"><?=$cate[18]?></option>
            <option value="<?=$cate[19]?>"><?=$cate[19]?></option>
            <option value="<?=$cate[20]?>"><?=$cate[20]?></option>
            <option value="<?=$cate[21]?>"><?=$cate[21]?></option>
            <option value="<?=$cate[22]?>"><?=$cate[22]?></option>
            <option value="<?=$cate[23]?>"><?=$cate[23]?></option>
            <option value="<?=$cate[24]?>"><?=$cate[24]?></option>
            <option value="<?=$cate[25]?>"><?=$cate[25]?></option>
            <option value="<?=$cate[26]?>"><?=$cate[26]?></option>
            <option value="<?=$cate[27]?>"><?=$cate[27]?></option>
            <option value="<?=$cate[28]?>"><?=$cate[28]?></option>
            <option value="<?=$cate[29]?>"><?=$cate[29]?></option>
            <option value="<?=$cate[30]?>"><?=$cate[30]?></option>
            <option value="<?=$cate[31]?>"><?=$cate[31]?></option>
        </select>
        <input type="submit" value="조회">
    </form> <br>
    <form action="download.php" method="POST">
        (2) 다운로드별 어플 조회 <br>
        <select name="download">
            <option value="none">======선택======</option>
            <script language="JavaScript">
                var arr_cate = <?=$cate?>
                for(i=0;i<arr_cate.length;i++){
                    <option value="arr_cate[i]">arr_cate[i]</option>
                }
            </script>
            <option value="<?=$down[0]?>"><?=$down[0]?></option>
            <option value="<?=$down[1]?>"><?=$down[1]?></option>
            <option value="<?=$down[2]?>"><?=$down[2]?></option>
            <option value="<?=$down[3]?>"><?=$down[3]?></option>
            <option value="<?=$down[4]?>"><?=$down[4]?></option>
            <option value="<?=$down[5]?>"><?=$down[5]?></option>
            <option value="<?=$down[6]?>"><?=$down[6]?></option>
            <option value="<?=$down[7]?>"><?=$down[7]?></option>
            <option value="<?=$down[8]?>"><?=$down[8]?></option>
            <option value="<?=$down[9]?>"><?=$down[9]?></option>
            <option value="<?=$down[10]?>"><?=$down[10]?></option>
            <option value="<?=$down[11]?>"><?=$down[11]?></option>
            <option value="<?=$down[12]?>"><?=$down[12]?></option>
            <option value="<?=$down[13]?>"><?=$down[13]?></option>
            <option value="<?=$down[14]?>"><?=$down[14]?></option>
            <option value="<?=$down[15]?>"><?=$down[15]?></option>
            <option value="<?=$down[16]?>"><?=$down[16]?></option>
            <option value="<?=$down[17]?>"><?=$down[17]?></option>
            <option value="<?=$down[18]?>"><?=$down[18]?></option>
            <option value="<?=$down[19]?>"><?=$down[19]?></option>
        </select>
        <input type="submit" value="조회">
    </form> <br>
    <form action="rating.php" method="POST">
        (3) 별점 순 어플 조회 <br>
        <input type="text" name="first_rating" placeholder="first_rating">
        점 부터 
        <input type="text" name="last_rating" placeholder="last_rating">
        점 까지
        <input type="submit" value="조회">
    </form>
</body>
</html>