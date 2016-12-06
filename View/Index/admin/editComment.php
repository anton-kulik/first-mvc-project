<h2>Редактировать комментарий</h2>

<form method="post">

    <div class="form-group">
        <textarea class="form-control" name="text" cols="150" rows="10"
                  placeholder="Описание категории. Необязательно"><?php if (isset($data['comment'][0]['text'])) {
                echo $data['comment'][0]['text'];
            }
            ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $data['comment'][0]['id'] ?>">
    <button type="submit" class="btn btn-default">Сохранить</button>
</form>