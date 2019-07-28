<?php

class HomeModel extends BaseModel
{
    public function getAll()
    {
        $statement = self::$db->prepare("SELECT * FROM posts");
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getAuthorName(int $author_id)
    {
        $statement = self::$db->prepare("SELECT username FROM users WHERE id = " . $author_id);
        $statement->execute();
        $authorName = $statement->get_result()->fetch_row();
        return $authorName[0];
    }

    public function getPost(int $post_id)
    {
        $statement = self::$db->prepare("SELECT * FROM posts WHERE id = " . $post_id);
        $statement->execute();
        $post = $statement->get_result()->fetch_assoc();
        return $post;
    }

    public function createPost(string $title, string $content, int $user_id)
    {
        $statement = self::$db->prepare("INSERT INTO posts (title, content, user_id)
VALUES (?, ?, ?)");
        $statement->bind_param("sss", $title, $content, $user_id);
        $statement->execute();
        if ($statement->affected_rows != 1) {
            return false;
        }
        $post_id = self::$db->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $post_id;
    }

    public function getUserPosts(int $user_id)
    {
        $statement = self::$db->prepare("SELECT * FROM posts WHERE user_id = " . $user_id);
        $statement->execute();
        $posts = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $posts;
    }

    public function editPost(string $title, string $content, int $user_id, int $post_id)
    {
        $statement = self::$db->prepare("UPDATE posts SET title = ?, content = ?
 WHERE user_id = " . $user_id . "  AND id = " . $post_id);
        $statement->bind_param("ss", $title, $content);
        $statement->execute();
        if ($statement->affected_rows != 1) {
            return false;
        }
    }

    public function deletePost(int $post_id)
    {
        $statement = self::$db->prepare("DELETE FROM posts WHERE id = " . $post_id);
        $statement->execute();
        if ($statement->affected_rows != 1) {
            return false;
        }
    }
}

















