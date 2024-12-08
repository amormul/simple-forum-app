<?php
class PostsController extends Controller {
    /**
     * @param int $threadId
     * @return void
     */
    public function index(int $threadId): void {
        $postModel = $this->model('Post');                                //модель поста
        $posts = $postModel->getAllByThread($threadId);                         //вывод всех постов
        $data = [
            'posts' => $posts,
            'thread_id' => $threadId
        ];
        $this->view('posts/index', $data);
    }
    /**
     * @param int $threadId
     * @return void
     */
    public function create(int $threadId): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postModel = $this->model('Post');
            $isCreated = $postModel->create($_POST['content'], $threadId, $_SESSION['user_id']);
            if ($isCreated) {
                header('Location: /posts/index/' . $threadId);
                exit;
            }
        }
    }
    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit;
        }
        $postModel = $this->model('Post');                                //модель поста
        $isDeleted = $postModel->delete($id, $_SESSION['user_id']);
        if ($isDeleted) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}