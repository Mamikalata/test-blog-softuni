<?php

class HomeController extends BaseController
{
    public function index(int $user_id = null)
    {
        $this->authorize();
        if ($user_id == null) {
            $this->posts = $this->model->getAll();
        } else {
            $this->posts = $this->model->getUserPosts($user_id);
        }
    }

    public function view(int $id)
    {
        $this->authorize();
        $this->post = $this->model->getPost($id);
    }

    public function create()
    {
        if ($this->isPost) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            if ($this->formValid()) {
                $this->post_id = $this->model->createPost($title, $content, $user_id);
                $this->addInfoMessage("Your post has been created!");
                $this->redirect(DEFAULT_CONTROLLER, "view", $this->post_id);
            } else {
                $this->addErrorMessage("Error has occurred!");
            }
        }
    }

    public function edit(int $post_id)
    {
        $this->view($post_id);

        if ($this->isPost) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            if ($this->formValid()) {
                $this->model->editPost($title, $content, $user_id, $post_id);
                $this->addInfoMessage("Your post has been edited!");
                $this->redirect(DEFAULT_CONTROLLER, "view", $post_id);
            } else {
                $this->addErrorMessage("Error has occurred!");
            }
        }
    }

    public function delete(int $post_id)
    {
        $this->authorize();
        if ($this->isPost) {
            if (isset($_POST['yes'])) {
                $isDeleted = $this->model->deletePost($post_id);
                $this->addInfoMessage("Your post has been deleted successfully!");
                $this->redirect("");
            } else if (isset($_POST['no'])) {
                $this->redirect("");
            } else {
                $this->addErrorMessage("Error has occurred!");
            }
        }
    }
}