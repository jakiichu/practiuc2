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

    foreach ($data as $row) {
        ?>
            <tr>
                <td><?= $row['Year'] ?></td>
                <td><?= $row['Site'] ?></td>
                <td><?= $row['Description'] ?></td>
            </tr>
        <?php
    }
    ?>
        </tbody>
    </table>
</div>
