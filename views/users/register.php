<?php
$this->title = 'Register New User'; ?>
<h1><?= htmlspecialchars($this->title) ?></h1>
<form method="post">
    <div><label for="username">Username:</label></div>
    <input type="text" name="username" id="username">
    <div><label for="password">Password:</label></div>
    <input type="password" name="password" id="password">
    <div><label for="full_name">Full name:</label></div>
    <input type="text" name="full_name" id="full_name">
    <div><input type="submit" value="Register">
        <a href="<?= APP_ROOT ?>/users/login">[Go to Login]</a>
    </div>
</form>