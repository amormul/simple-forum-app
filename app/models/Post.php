<?php
class Post {
    /**
     * @var Database $db
     */
    private Database $db;
    public function __construct() {
        $this->db = new Database();
    }
    /**
     * @param int $threadId
     * @return mysqli_result
     */
    public function getAllByThread(int $threadId): mysqli_result {
        $sql = "SELECT p.*, u.username FROM posts p JOIN users u ON p.user_id = u.id WHERE thread_id = {$threadId}";
        return $this->db->query($sql);
    }
    /**
     * @param string $content
     * @param int $threadId
     * @param int $userId
     * @return bool
     */
    public function create(string $content, int $threadId, int $userId): bool {
        $sql = "INSERT INTO posts (content, thread_id, user_id) VALUES ('{$content}', {$threadId}, {$userId})";
        return $this->db->query($sql);
    }
    /**
     * @param int $id
     * @param int $userId
     * @return bool
     */
    public function delete(int $id, int $userId): bool {
        $sql = "DELETE FROM posts WHERE id = {$id} AND user_id = {$userId}";
        return $this->db->query($sql);
    }
}