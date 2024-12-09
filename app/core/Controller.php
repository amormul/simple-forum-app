<?php
class Controller {
    public function __construct() {
        $isLoggedIn = isset($_SESSION['user_id']);
        $isLoginPage = in_array($_SERVER['REQUEST_URI'], ['/auth/login', '/auth/register']); //находится ли юзер на логине или регистрации
        if (!$isLoggedIn && !$isLoginPage) {
            header('Location: /auth/login');
            exit;
        }
    }
    /**
     * @param string $view
     * @param array $data
     * @return void
     */
    protected function view(string $view, array $data = []): void {
        extract($data);                                                                      //извлекает переменные из массива
        require_once '../app/views/template/default.php';
    }
    /**
     * @param string $model
     * @return object
     */
    protected function model(string $model): object {
        require_once '../app/models/' . $model . '.php';
        return new $model();                                                                 //создает новый объект
    }
}
