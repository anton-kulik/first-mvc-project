<h2>Добавить Статью</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input name="title" type="text" class="form-control" placeholder="Название статьи" required>
    </div>

    <div class="form-group">
        <p>Выберите категорию</p>
        <select name="category">
            <?php
            foreach ($data['category'] as $value) {
                echo '<option value="' . $value['id'] . '">' . $value['title'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <input name="date" type="date" class="form-control" placeholder="Дата публикации">
    </div>

    <div class="form-group">
        <textarea class="form-control" name="text" cols="150" rows="10" placeholder="Текст материала"
                  required></textarea>
    </div>

    <div class="form-group">
        <input name="tags" type="text" class="form-control" placeholder="Теги через запятую">
    </div>

    <div class="form-group">
        <input type="file" name="image">
        <p class="help-block">файлы расширения jpg, png, bmp</p>
    </div>

    <button type="submit" class="btn btn-default">Сохранить</button>
</form>