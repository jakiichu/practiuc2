<?php
$link = mysqli_connect('localhost', 'root', '', 'testtable');
$sql = mysqli_query($link, 'SELECT * FROM `users`');
while ($result = mysqli_fetch_array($sql)) {
    echo "{$result['user_id']}: {$result['user_login']} имя<br>";
}
?>

<div class="container">
<h3>Тут находится главная страница</h3>
</div>