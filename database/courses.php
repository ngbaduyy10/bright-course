<?php
require_once 'database.php';
class Courses extends Database {
    private $conn;
    public function __construct() {
        $this->conn = $this->connect();
    }
    public function get_courses($sort = null, $keyword = null, $limit = null, $offset = 0, $subject = null) {
        $sql = "SELECT * FROM courses";
        $params = [];

        if ($keyword) {
            $sql .= " WHERE (title LIKE :keyword OR description LIKE :keyword)";
            $params[':keyword'] = "%$keyword%";
        }

        if ($subject) {
            $subjectArray = explode(',', $subject);
            $subjectArray = array_map('intval', $subjectArray);

            $placeholders = [];
            foreach ($subjectArray as $index => $subjectId) {
                $placeholder = ":subject$index";
                $placeholders[] = $placeholder;
                $params[$placeholder] = $subjectId;
            }
            $subjectCondition = "subject_id IN (" . implode(',', $placeholders) . ")";

            if ($keyword) {
                $sql .= " AND $subjectCondition";
            } else {
                $sql .= " WHERE $subjectCondition";
            }
        }

        if ($sort && $sort !== 'default') {
            $allowedSortColumns = ['price', 'rating'];
            $allowedSortOrders = ['asc', 'desc'];
            list($column, $order) = explode('-', $sort) + [null, null];

            if (in_array($column, $allowedSortColumns) && in_array(strtolower($order), $allowedSortOrders)) {
                $sql .= " ORDER BY $column " . strtoupper($order);
            }
        }

        if ($limit && $offset >= 0) {
            $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        }

        $stmt = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            if (str_starts_with($key, ':subject')) {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_course_detail($id) {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create_course($title, $description, $price, $image, $subject_id) {
        $stmt = $this->conn->prepare("INSERT INTO courses (title, description, price, image, rating, subject_id) VALUES (:title, :description, :price, :image, 4.5, :subject_id)");
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':subject_id', $subject_id, PDO::PARAM_INT);
        $stmt->execute();
        return ['status' => 'success', 'message' => 'Course created successfully'];
    }

    public function update_course($id, $title, $description, $price, $image, $subject_id) {
        $stmt = $this->conn->prepare("UPDATE courses SET title = :title, description = :description, price = :price, image = :image, subject_id = :subject_id WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':subject_id', $subject_id, PDO::PARAM_INT);
        $stmt->execute();
        return ['status' => 'success', 'message' => 'Course updated successfully'];
    }

    public function delete_course($id) {
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return ['status' => 'success', 'message' => 'Course deleted successfully'];
    }
}
?>