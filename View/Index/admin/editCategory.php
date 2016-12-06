<h2>Редактировать категорию</h2>

<form method="post">
    <div class="form-group">
        <input name="title" value="<?php echo $data['category'][0]['title'] ?>" type="text" class="form-control"
               placeholder="Название категории" required>
    </div>

    <div class="form-group">
        <textarea class="form-control" name="description" cols="150" rows="10"
                  placeholder="Описание категории. Необязательно"><?php if(isset($data['category'][0]['description']))
            {
                echo $data['category'][0]['description'];
            }
            ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $data['category'][0]['id']?>">
    <button type="submit" class="btn btn-default">Сохранить</button>
</form>