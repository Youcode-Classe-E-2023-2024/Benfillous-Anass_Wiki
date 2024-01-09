<?php
class Category {
    function addCategory($category) {
        global $db;
        $sql = "INSERT INTO category (category) VALUES (:category)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
    }
}