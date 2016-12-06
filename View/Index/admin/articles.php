<h2 class="sub-header"></h2>
<div class="table-responsive">
    <table class="table table-striped">

        <a href="admin/addArticle">
            <button class="btn btn-default">Добавить статью</button>
        </a>

        <thead>
        <tr>
            <th>id</th>
            <th class="my_int">Опубликовано</th>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Картинка</th>
            <th>Текст</th>
            <th>Тэги</th>
            <th>Категория</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <?php
            foreach ($data['articles'] as $article) {
                echo '<tr>';
                echo '<td>' . $article['id'] . '</td>';

                if($article['published'] == 1) {
                    echo '<td>Да</td>';
                } else {
                    echo '<td>Нет</td>';
                }

                echo '<td>' . $article['date'] . '</td>';
                echo '<td>' . $article['title'] . '</td>';
                echo '<td>' . $article['image'] . '</td>';
                echo '<td>' . $article['text'] . '</td>';
                echo '<td>' . $article['meta_tags'] . '</td>';
                echo '<td>' . $article['cat_id'] . '</td>';
                echo "<td><a href=\"admin/editArticle/{$article['id']}\"><button>Редактировать</button></a></td>";
                echo "<td><a href=\"admin/editPubArticle/{$article['id']}\"><button class='btn-info'>Опубликовать/снять с публикации</button></a></td>";
                echo "<td><a href=\"admin/deleteArticle/{$article['id']}\"><button class='btn-danger'>Удалить</button></a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>