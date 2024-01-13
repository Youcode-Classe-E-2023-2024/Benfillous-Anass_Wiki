<?php
class Category {
    function addCategory($category) {
        global $db;
        $sql = "INSERT INTO category (category) VALUES (:category)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
    }

    function updateCategory($category, $category_id) {
        global $db;
        $sql = "UPDATE category SET category = :category WHERE category_id = :category_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }

    function deleteCategory($category_id) {
        global $db;
        $sql = "DELETE FROM category WHERE category_id = :category_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }

    function getCategories() {
        global $db;
        $sql = "SELECT * FROM category ORDER BY category_id DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}