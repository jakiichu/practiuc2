<div class="container">
    <h3>Тут находится главная страница</h3>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    $sql = mysqli_query($link, 'SELECT * FROM `news`');
    while ($result = mysqli_fetch_array($sql)) {
        print_r("<div class='card text-white bg-secondary mb-3 d-inline-flex m-3' style='max-width: 18rem;'>
        <div class='card-header'>{$result['id']} запостил {$result['name']}</div>
        <div class='card-body'>
            <h5 class='card-title'>{$result['headline']}</h5>
            <p class='card-text'>{$result['story']}</p>
        </div>
        <form method='POST'>
        <input name='id' type='id' value='{$result['id']}' class='d-none .d-sm-block'><br>
            <input name='coments' type='text' required><br>
            <input name='submit' type='submit' value='отправить'>
        </form>
    </div>");
        $geweg = mysqli_connect('localhost', 'root', '', 'mydatabase');
        $asdawdsafw =  mysqli_query($geweg, "SELECT * FROM `coment`");
        while ($asd = mysqli_fetch_array($asdawdsafw)) {
            $f = mysqli_query($geweg, "SELECT * FROM `coment` WHERE `id_news`");
            mysqli_query($geweg, "SELECT * FROM `coment` WHERE `id_news` === {$result['id']}");

            if ("{$result['id']}" == "{$asd['id_news']}") {
                print_r("<p>{$asd['name']}: {$asd['coments']}</p>");
                if (isset($userdata['user_login'])) {
                    if ($asd['name'] == $userdata['user_login']) {
                        print_r("<form method='POST'><input name='id' type='id' value='{$asd['id']}' class='d-none .d-sm-block'><input name='del' type='submit' value='удалить'></form>");
                    }
                }
                
            }
        };
    }
    ?>
    <?php
    $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
    if (isset($_POST['del'])) {
        $id = $_POST['id'];
        mysqli_query($link, "DELETE FROM `coment` WHERE `ID` = $id");
    }

    if (isset($_POST['submit'])) {

        $err = [];

        if (!isset($userdata['user_login'])) {

            die("<b>че это </b><br>");
            $err[] = "авторизируйтесь на сайте";
        }
        if (count($err) == 0) {
            $login = $userdata['user_login'];
            $coments = $_POST['coments'];
            $id_news = $_POST['id'];
            mysqli_query($link, "INSERT INTO coment SET coments='" . $coments . "', id_news='" . $id_news . "', name='" . $login . "'");
            header("Location: http://localhost:4430/");
            exit();
        } else {
            die("<b>При регистрации произошли какие-то ошибки</b><br>");
        }
    }
    ?>
</div>