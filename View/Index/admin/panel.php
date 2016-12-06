<p class="bg-danger">Пароли не шифровал специально, для более удобной проверки</p>

<h2 class="sub-header"></h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Тип учетной записи</th>
            <th>Удаление</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <?php
            foreach ($data['users'] as $user) {
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td>' . $user['login'] . '</td>';
                echo '<td>' . $user['password'] . '</td>';
                echo '<td>' . $user['type'] . '</td>';
                echo "<td><a href=\"admin/deleteUser/{$user['id']}\"><button class='btn-danger'>Удалить</button></a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>