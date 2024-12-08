<?php
class User {
    /**
     * @var Database $db
     */
    private Database $db;
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function register(string $username, string $email, string $password): bool {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);      //хешируем пароль
        $sql = "INSERT INTO users (username, email, password) VALUES ('{$username}', '{$email}', '{$hashedPassword}')";
        return $this->db->query($sql);
    }
    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool {
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {                                            //если пользователь существует
            $user = $result->fetch_assoc();                                     //получаем данные пользователя
            if (password_verify($password, $user['password'])) {                //сравниваем пароли
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return true;
            }
        }
        return false;
    }
}
