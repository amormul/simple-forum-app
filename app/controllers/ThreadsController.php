<?php
class ThreadsController extends Controller {
    /**
     * @param int $categoryId
     * @return void
     */
    public function index(int $categoryId): void {
        $threadModel = $this->model('Thread');                            //модель темы
        $threads = $threadModel->getAllByCategory($categoryId);
        $data = [
            'threads' => $threads,
            'category_id' => $categoryId
        ];
        $this->view('threads/index', $data);
    }
    /**
     * @param int $categoryId
     * @return void
     */
    public function create(int $categoryId): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $threadModel = $this->model('Thread');                       //модель темы
            if ($threadModel->create($_POST['title'], $categoryId, $_SESSION['user_id'])) {
                header('Location: /threads/index/' . $categoryId);
                exit;
            }
        }
        $data['category_id'] = $categoryId;
        $this->view('threads/create', $data);
    }
    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            return;
        }
        $threadModel = $this->model('Thread');
        if ($threadModel->delete($id, $_SESSION['user_id'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
