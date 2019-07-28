<?php
$this->title = 'Edit Post';
?>
<h1><?= htmlspecialchars($this->title) ?></h1>
<form method="post">
    <div><label for="title">Title:</label></div>
    <input type="text" name="title" id="title" value="<?= $this->post['title'];?>">
    <div><label for="content">Content:</label></div>
    <input type="text" name="content" id="content" value="<?= $this->post['content'];?>">
    <div><input type="submit" value="Edit post"></div>
</form>