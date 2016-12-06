<h2 class="sub-header"></h2>
<div class="table-responsive">
    <table class="table table-striped">

        <thead>
        <tr>
            <th>id</th>
            <th>Опубликовано</th>
            <th>Дата</th>
            <th>Кем опубликовано</th>
            <th>В каком материале</th>
            <th>Текст</th>
            <th>Редактировать</th>
            <th>Публикация</th>
            <th>Удаление</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <?php
            foreach ($data['comments'] as $comment) {
                echo '<tr>';
                echo '<td>' . $comment['id'] . '</td>';

                if($comment['published'] == 1) {
                    echo '<td>Да</td>';
                } else {
                    echo '<td>Нет</td>';
                }

                echo '<td>' . $comment['date'] . '</td>';
                echo '<td>' . $comment['login'] . '</td>';
                echo '<td>' . $comment['title'] . '</td>';
                echo '<td>' . $comment['text'] . '</td>';
                echo "<td><a href=\"admin/editComment/{$comment['id']}\"><button>Редактировать</button></a></td>";
                echo "<td><a href=\"admin/editPubComment/{$comment['id']}\"><button class='btn-info'>Опубликовать/снять с публикации</button></a></td>";
                echo "<td><a href=\"admin/deleteComment/{$comment['id']}\"><button class='btn-danger'>Удалить</button></a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>