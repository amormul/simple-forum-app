<?php
class HomeController extends Controller {
    /**
     * @return void
     */
    public function index(): void {
        header('Location: /categories');
        exit;
    }
}