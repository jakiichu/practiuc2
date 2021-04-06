<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Главная</title>
</head>

<body>
    <header>
        <link rel="stylesheet" href="/application/css/style.css">
        <!-- CSS bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Сайт</a>

                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/portfolio">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/add">add</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <?php
                                $link = mysqli_connect('localhost', 'root', '', 'testtable');
                                if (isset($_COOKIE['id'])) {
                                    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
                                    $userdata = mysqli_fetch_assoc($query);
                                }

                                if(isset($userdata['user_login'])){
                                    if ($userdata['user_login'] == "zxc") {

                                        print_r('<a class="nav-link active" aria-current="page" href="/admin">admin</a>');
                                    }
                                }
                                
                                ?>
                            </li>

                            <li class="nav-item">
                                <?php
                                $link = mysqli_connect('localhost', 'root', '', 'testtable');
                                if (!isset($_COOKIE['id'])) {
                                    print_r('<a class="nav-link active" aria-current="page" href="/register">reg</a>');
                                }
                                ?>
                            </li>

                            <li class="nav-item">
                                <?php
                                $link = mysqli_connect('localhost', 'root', '', 'testtable');
                                if (!isset($_COOKIE['id'])) {
                                    print_r('<a class="nav-link active" aria-current="page" href="/login">login</a>');
                                }


                                ?>

                            </li>

                            <li class="nav-item">
                                <?php
                                $link = mysqli_connect('localhost', 'root', '', 'testtable');
                                if (isset($_COOKIE['id'])) {
                                    print_r('<a class="nav-link active" aria-current="page" href="/logout">logout</a>');
                                }


                                ?>

                            </li>

                            <li class="nav-item">
                                <?php
                                $link = mysqli_connect('localhost', 'root', '', 'testtable');
                                if (isset($_COOKIE['id'])) {
                                    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
                                    $userdata = mysqli_fetch_assoc($query);
                                }


                                if (isset($userdata['user_login'])) {

                                    print("Дарова " . $userdata['user_login']);
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php include 'application/views/' . $content_view; ?>

</body>

</html>