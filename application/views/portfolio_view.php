<div class="container">
    <h1 class="mt-3">Портфолио</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Год</th>
                <th>Проект</th>
                <th>Описание</th>
            </tr>
        </thead>
        <?php
        $link = mysqli_connect('localhost', 'root', '', 'mydatabase');
        $sql = mysqli_query($link, 'SELECT * FROM `portfolio`');
        while ($result = mysqli_fetch_array($sql)) {

        ?>
            <tr>
                <td><?= $result['name'] ?></td>
                <td><?= $result['Site'] ?></td>
                <td><?= $result['Description'] ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>