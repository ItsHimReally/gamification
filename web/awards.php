<?php
function connectDB() {
    $login = "u31786_gocode";
    $pass = "B5g0R0r6J4";
    $name_db = "u31786_gocode";
    $server = "db4.myarena.ru";
    $link = mysqli_connect($server, $login, $pass, $name_db);
    mysqli_set_charset($link, 'utf8');
    return $link;
}
$link = connectDB();

$query = mysqli_query($link, "SELECT * FROM `awards`");
$resultArr = array();
while ($result = mysqli_fetch_array($query)) {
    $resultArr[$result["category"]][] = $result;
}

$awardsUsersStr = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `users` WHERE `id` = 1"))["awards"];
$awardsUsers = explode(',', $awardsUsersStr);
?>
<meta charset="UTF-8">
<style>
    body{
        margin: 0;
        padding: 0;
        background: #c52628;
    }
    .wrap{
        background: #ffffff;
        padding: 30px;
        border-radius: 20px 20px 0 0;
    }
    .header{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .header img{
        width: 30px;
        filter: invert(100%);
        margin-right: 15px;
    }
    .header span{
        font-family: "Inter", Arial, sans-serif;
        font-size: 18px;
        color: #ffffff;
    }
    .categ{
        font-family: "Inter", sans-serif;
        font-size: 20px;
    }
    .list{
        display: flex;
        flex-wrap: wrap;
    }
    .award{
        display: flex;
        font-family: "Inter", sans-serif;
        font-size: 16px;
        flex-direction: column;
        align-items: center;
    }
    .award img{
        width: 150px;

    }
    .categ{
        margin-bottom: 20px;
    }
    .CB{
        filter: grayscale(100%);
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<a style="text-decoration: none; color: #000;" href="/gocode/index.php">
<div class="header">
    <img src="img/arrow-left.svg">
    <span>Достижения</span>
</div>
</a>
</body>
    <div class="wrap">
<?php
    foreach ($resultArr as $v) {
        echo '
<div class="categ">
    <span>'.array_search($v, $resultArr).'</span>
    <div class="list">';
        foreach ($v as $w) {
            if (!in_array($w["id"], $awardsUsers)) {
                $classCB = ' class="CB" ';
            } else {
                $classCB = '';
            }
            echo '
<div class="award">
        <img src="'.$w['image'].'"'.$classCB.'>
        <span>'.$w["name"].'</span>
    </div>';
        }
        echo '</div></div>
';
    }
?>
    </div>
</body>
