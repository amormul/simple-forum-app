<?php
class CategoriesController extends Controller {
    /**
     * @return void
     */
    public function index(): void {
        $categories = $this->model('Category')->getAll();
        $this->view('categories/index', ['categories' => $categories]);    //вывод всех категорий
    }
    /**
     * @return void
     */
    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryModel = $this->model('Category');                    //модель категории
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image_url = $_POST['image_url'];
            if (empty($title) || empty($description) || empty($image_url)) {
                $error = 'Заполните все поля';
                $this->view('categories/create', ['error' => $error]);
                return;
            }
            if ($categoryModel->create($title, $description, $image_url, $_SESSION['user_id'])) {
                header('Location: /categories');                         //редирект на страницу категорий
                exit;
            }
            $error = 'Не удалось создать категорию';
            $this->view('categories/create', ['error' => $error]);
        } else {
            $this->view('categories/create');
        }
    }
    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void {
        $categoryModel = $this->model('Category');                        //модель категории
        $isDeleted = $categoryModel->delete($id, $_SESSION['user_id']);
        header('Location: /categories');
        exit;
    }
}
