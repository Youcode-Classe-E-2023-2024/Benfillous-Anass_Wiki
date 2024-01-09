<?php
class Tag {
    function addTag($tag) {
        global $db;
        $sql = "INSERT INTO tag (tag) VALUES (:tag)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag', $tag);
        $stmt->execute();
    }
}