<?php
$link = mysqli_connect('localhost', 'root', '', 'testtable');

if (isset($_POST['posts'])) {
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    $sql = mysqli_query($link, 'SELECT * FROM `news`');
    while ($result = mysqli_fetch_array($sql)) {
        echo ("
        id-{$result['id']}<br> 
        кто создал-{$result['name']}<br> 
        заголовок-{$result['headline']}<br> 
        основание-{$result['story']}

        <form method='POST'>
        headline <input name='headline' type='text' required><br>
        story <input name='story' type='text' required><br>
        <input name='ref' type='submit' value='изминить'><br>
                <input name='id' type='id' value='{$result['id']}' class='d-none .d-sm-block'>

        </form>

        <form method='POST'>
        <input name='id' type='id' value='{$result['id']}' class='d-none .d-sm-block'>
        <input name='del' type='submit' value='удалить'>
        </form><br><br>");
    }
}
if (isset($_POST['ref'])) {
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    $headline = $_POST['headline'];
    $story = $_POST['story'];
    $id = $_POST['id'];
    mysqli_query($link, "UPDATE `news` SET `headline` = '$headline', `story` = '$story' WHERE `news`.`id` = '$id'");
}
if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    mysqli_query($link, "DELETE FROM `news` WHERE `news`.`id` = $id");
}

if (isset($_POST['portfolio'])) {
    $name = $_POST['name'];
    $Site = $_POST['Site'];
    $Description = $_POST['Description'];
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    mysqli_query($link, "INSERT INTO portfolio SET name='" . $name . "', Site='" . $Site . "', Description='" . $Description . "'");
};
?>

<h2>создание постов</h2>
<form method="POST">
    name <input name="name" type="text" required><br>
    site <input name="Site" type="text" required><br>
    description <textarea name="Description" type="text" required></textarea><br><br>
    <input name="portfolio" type="submit" value="создать"><br>
</form>
<br>

<form method="POST">
    <input name="posts" type="submit" value="изменить запись">
</form><br>
<form method="POST">
    <input name="akk" type="submit" value="изменить аккаунт">
</form><br>
<form method="POST">
    <input name="com" type="submit" value="изменить комент">
</form><br>
<?php
if (isset($_POST['ref2'])) {
    $user_login = $_POST['user_login'];
    $user_id = $_POST['user_id'];
    $link = mysqli_connect('localhost', 'root', '', 'testtable');
    mysqli_query($link, "UPDATE `users` SET  `user_login` = '$user_login' WHERE `users`.`user_id` = '$user_id'");
}
if (isset($_POST['del2'])) {
    $id = $_POST['user_id'];
    $link = mysqli_connect('localhost', 'root', '', 'testtable');
    mysqli_query($link, "DELETE FROM `users` WHERE `users`.`user_id` = $id");
}
if (isset($_POST['akk'])) {
    $link = mysqli_connect('localhost', 'root', '', 'testtable');
    $sql = mysqli_query($link, 'SELECT * FROM `users`');
    while ($result = mysqli_fetch_array($sql)) {
        echo ("
        user_id-{$result['user_id']}<br> 
        кто создал-{$result['user_login']}<br> 

        <form method='POST'>
        user_login <input name='user_login' type='text' required><br>
        <input name='user_id' type='user_id' value='{$result['user_id']}' class='d-none .d-sm-block'>
        <input name='ref2' type='submit' value='изминить'><br>
        </form>

        <form method='POST'>
        <input name='user_id' type='user_id' value='{$result['user_id']}' class='d-none .d-sm-block'>
        <input name='del2' type='submit' value='удалить'>
        </form><br><br>");
    }
}

if (isset($_POST['ref3'])) {
    $coments = $_POST['coments'];
    $id = $_POST['id'];
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    mysqli_query($link, "UPDATE `coment` SET  `coments` = '$coments' WHERE `coment`.`id` = '$id'");
}
if (isset($_POST['del3'])) {
    $id = $_POST['id'];
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    mysqli_query($link, "DELETE FROM `coment` WHERE `coment`.`id` = $id");
}

if (isset($_POST['com'])) {
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    $sql = mysqli_query($link, 'SELECT * FROM `coment`');
    while ($result = mysqli_fetch_array($sql)) {
        echo ("
        id-{$result['id']}<br> 
        кто создал-{$result['name']}<br> 
        что написал-{$result['coments']}<br>
        <form method='POST'>
        coments <input name='coments' type='text' required><br>
        <input name='id' type='text' value='{$result['id']}' class='d-none .d-sm-block'>
        <input name='ref3' type='submit' value='изминить'><br>
        </form>

        <form method='POST'>
        <input name='id' type='text' value='{$result['id']}' class='d-none .d-sm-block'>
        <input name='del3' type='submit' value='удалить'>
        </form><br><br>");
    }
}
?>