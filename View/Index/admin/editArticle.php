<h2>Редактировать статью</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input name="title" type="text" class="form-control" placeholder="Название статьи" value="<?php echo $data['article'][0]['title']?>" required>
    </div>

    <div class="form-group">
        <p>Выберите категорию</p>
        <select name="category">
            <?php
            foreach ($data['article'] as $value) {
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
                  required><?php echo $data['article'][0]['text']?></textarea>
    </div>

    <div class="form-group">
        <input name="tags" type="text" class="form-control" placeholder="Теги через запятую" value="<?php echo $data['article'][0]['meta_tags']?>">
    </div>

    <div class="form-group">
        <input type="file" name="image">
        <p class="help-block">файлы расширения jpg, png, bmp</p>
    </div>

    <button type="submit" class="btn btn-default">Сохранить</button>
</form>