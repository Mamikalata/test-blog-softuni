<?php
$this->title = 'Create Post'; ?>
<h1><?= htmlspecialchars($this->title) ?></h1>
<form method="post">
    <div><label for="title">Title:</label></div>
    <input type="text" name="title" id="title">
    <div><label for="content">Content:</label></div>
    <input type="text" name="content" id="content">
    <div><input type="submit" value="Create post"></div>
</form>
