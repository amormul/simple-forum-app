<?php
class Router {
    /**
     * @var mixed|string
     */
    protected $controller = 'HomeController';
    /**
     * @var string
     */
    protected string $method = 'index';
    /**
     * @var array
     */
    protected array $params = [];
    public function __construct() {
        $url = $this->parseUrl();
        if(isset($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';                  //первая буква заглавная
            $controllerFile = '../app/controllers/' . $controllerName . '.php';
            if(file_exists($controllerFile)) {
                $this->controller = $controllerName;
                unset($url[0]);                                                 //удаляет первый элемент массива для того чтобы определить контроллер
            }
        }
        $controllerPath = '../app/controllers/' . $this->controller . '.php';
        if (!file_exists($controllerPath)) {
            die('Controller not found');
        }
        require_once $controllerPath;
        $this->controller = new $this->controller;
        if(isset($url[1])) {                                                    //определение метода
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];                                        //если метод существует
                unset($url[1]);                                                 //удаляет второй элемент массива для того чтобы определить метод
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);//вызывает метод контроллера с параметрами
    }
    /**
     * @return array|null
     */
    protected function parseUrl(): ?array {
        if (isset($_GET['url'])) {
            return explode('/', rtrim($_GET['url'], '/'));    //разбивает строку на массив
        }
        return null;
    }
}