<?php
function connectDB() {
    $login = "u31786_gocode";
    $pass = "B5g0R0r6J4";
    $name_db = "u31786_gocode";
    $server = "db4.myarena.ru";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $link = mysqli_connect($server, $login, $pass, $name_db);
    mysqli_set_charset($link, 'utf8');
    return $link;
}

?>
<meta charset="UTF-8">
<style>
    body{
        margin: 0;
        padding: 0;
        background: #c52628;
    }
    .header img{
        width: 100%;
    }
    .wrap{
        background: #ffffff;
        height: 100%;
        padding: 30px;
        border-radius: 20px 20px 0 0;
    }
    .awards{
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 6px 12px 3px rgba(34, 60, 80, 0.2);
        border-radius: 20px;
        margin-bottom: 30px;
        font-family: "Inter", Arial, sans-serif;
    }
    .b{
       height: 60px;
    }
    .a {
        height: 60px;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
    <div class="header">
        <img src="img/header.jpg">
    </div>
    <div class="wrap">
        <a style="text-decoration: none; color: #000;" href="/gocode/awards.php">
        <div class="awards">
            <span>У Вас 3 новых достижения!</span>
            <img src="img/stars.png" class="b">
        </div>
        </a>
        <div class="awards">
            <span><strong>Вы в ударе!</strong> Уже 500 дней подряд используете свою Тройку.</span>
            <img src="img/fire.png" class="a">
        </div>
    </div>
</body>
