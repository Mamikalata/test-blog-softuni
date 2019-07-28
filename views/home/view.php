<?php
$this->title = "Post Title" ?>
<h1><?= htmlspecialchars($this->post['title']) ?></h1>
<h2><?= $this->post['content'] ?></h2>
<br>
<h3><?= DateTime::createFromFormat("Y-m-d H:i:s", $this->post['date'])->format("d-m-Y"); ?></h3>
<h3> Author: <?= htmlspecialchars($this->model->getAuthorName($this->post['user_id'])) ?></h3>