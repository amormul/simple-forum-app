<?php
class AuthController extends Controller {
    /**
     * @return void
     */
    public function login(): void {                                             //авторизирован ли юзер
        if (isset($_SESSION['user_id'])) {
            header('Location: /categories');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');                            //модель юзера
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($userModel->login($email, $password)) {
                header('Location: /categories');
                exit;
            } else {
                $error = 'Неверный пароль или логин';
                $this->view('auth/login', ['error' => $error]);
            }
        } else {
            $this->view('auth/login');
        }
    }
    /**
     * @return void
     */
    public function register(): void {
        if (isset($_SESSION['user_id'])) {                                      //зарегестрирован ли пользователь
            header('Location: /categories');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');                            //модель юзера
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($userModel->register($username, $email, $password)) {
                header('Location: /auth/login');
                exit;
            } else {
                $error = 'Не удалось зарегистрироваться';
                $this->view('auth/register', ['error' => $error]);
            }
        } else {
            $this->view('auth/register');
        }
    }
    /**
     * @return void
     */
    public function logout(): void {
        session_destroy();
        header('Location: /auth/login');
        exit;
    }
}