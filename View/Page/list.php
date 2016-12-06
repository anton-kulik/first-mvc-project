<h1>List of our articles</h1>
<table class="table table-striped">
    <?php foreach($data['pages'] as $page) { ?>
        <tr>
            <td><?php echo $page['alias'] ?></td>
            <td><?php echo $page['title'] ?></td>
            <td><a href="page/show/<?php echo $page['alias'] ?>" class="btn btn-primary" role="button">Read</a></td>
        </tr>
    <?php } ?>
</table>