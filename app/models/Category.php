<?php
class Category {
    /**
     * @var Database
     */
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    /**
     * @return mysqli_result
     */
    public function getAll(): mysqli_result {
        $sql = "SELECT c.*, u.username FROM categories c JOIN users u ON c.user_id = u.id ORDER BY c.created_at DESC";
        return $this->db->query($sql);
    }
    /**
     * @param string $title
     * @param string $description
     * @param string $imageUrl
     * @param int $userId
     * @return bool
     */
    public function create(string $title, string $description, string $imageUrl, int $userId): bool {
        $title = $this->db->escape($title);                                     //экранирует спец символы
        $description = $this->db->escape($description);
        $imageUrl = $this->db->escape($imageUrl);
        $sql = "INSERT INTO categories (title, description, image_url, user_id) VALUES ('$title', '$description', '$imageUrl', $userId)";
        return $this->db->query($sql);
    }
    /**
     * @param int $id
     * @param int $userId
     * @return bool
     */
    public function delete(int $id, int $userId): bool {
        $id = $id;
        $userId = $userId;
        $sql = "DELETE FROM categories WHERE id = $id AND user_id = $userId";
        return $this->db->query($sql);
    }
}