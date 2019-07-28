<?php
$this->title = 'Welcome to My Blog'; ?>
<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Date</th>
        <th>Author</th>
    </tr>
    <?php foreach ($this->posts as $post) : ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td><?= htmlspecialchars($post['title']) ?></td>
            <td><?= DateTime::createFromFormat("Y-m-d H:i:s", $post['date'])->format("d-m-Y"); ?></td>
            <td><?= htmlspecialchars($this->model->getAuthorName($post['user_id'])) ?></td>
            <td><a href=<?= APP_ROOT . "/" . DEFAULT_CONTROLLER . "/view/" . $post['id'] ?>>Read</a></td>
            <td><a href=<?= APP_ROOT . "/" . DEFAULT_CONTROLLER . "/edit/" . $post['id'] ?>>Edit</a></td>
            <td><a href=<?= APP_ROOT . "/" . DEFAULT_CONTROLLER . "/delete/" . $post['id'] ?>>Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
