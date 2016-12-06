<h2 class="sub-header"></h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Редактирование</th>
            <th>Удаление</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <?php
            foreach ($data['categories'] as $categories) {
                echo '<tr>';
                echo '<td>' . $categories['id'] . '</td>';
                echo '<td>' . $categories['title'] . '</td>';
                echo '<td>' . $categories['description'] . '</td>';
                echo "<td><a href=\"admin/editCategory/{$categories['id']}\"><button>Редактировать</button></a></td>";
                echo "<td><a href=\"admin/deleteCategory/{$categories['id']}\"><button class='btn-danger'>Удалить</button></a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <a href="admin/addCategory">
        <button class="btn btn-default">Добавить категорию</button>
    </a>
</div>