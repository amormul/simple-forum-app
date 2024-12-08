<?php
class Thread {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    /**
     * @param int $categoryId
     * @return mysqli_result
     */
    public function getAllByCategory(int $categoryId): mysqli_result {
        $sql = "SELECT t.*, u.username FROM threads t JOIN users u ON t.user_id = u.id WHERE category_id = {$categoryId}";
        return $this->db->query($sql);
    }
    /**
     * @param string $title
     * @param int $categoryId
     * @param int $userId
     * @return bool
     */
    public function create(string $title, int $categoryId, int $userId): bool {
        $sql = "INSERT INTO threads (title, category_id, user_id) VALUES ('{$title}', {$categoryId}, {$userId})";
        return $this->db->query($sql);
    }
    /**
     * @param int $id
     * @param int $userId
     * @return bool
     */
    public function delete(int $id, int $userId): bool {
        $sql = "DELETE FROM threads WHERE id = {$id} AND user_id = {$userId}";
        return $this->db->query($sql);
    }
}