<?php

$link = mysqli_connect('localhost', 'root', '', 'mydatabase');

$asd = mysqli_connect('localhost', 'root', '', 'testtable');
if (isset($_COOKIE['id'])) {
    $query = mysqli_query($asd, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
}

if (isset($_POST['submit'])) {


    $err = [];

    if (!isset($userdata['user_login'])) {
        $err[] = "равторизируйтесь на сайте";
    }
    if (count($err) == 0) {
        $login = $userdata['user_login'];
        $headline = $_POST['headline'];
        $story = $_POST['story'];
        mysqli_query($link, "INSERT INTO news SET headline='" . $headline . "', story='" . $story . "', name='" . $login . "'");
        header("Location: http://localhost:4430/");
        exit();
    } else {
        die("<b>При регистрации произошли какие-то ошибки:</b><br>");
    }
}

?>




<form method="POST">
    Headline <input name="headline" type="text" required><br>
    News Story <textarea name="story" id="story"></textarea><br>
    <input name="submit" type="submit" value="создать">
</form>