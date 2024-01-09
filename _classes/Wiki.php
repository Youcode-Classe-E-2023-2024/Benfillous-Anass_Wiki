<?php
class Wiki {
    function addWiki($title, $content, $tags, $category, $creator, $created_date) {
        global $db;
        $sql = "INSERT INTO wiki (title, content, category_id, creator, created_date) VALUES (:title, :content, :category, :creator, :created_date)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':creator', $creator);
        $stmt->bindParam(':created_date', $created_date);
        $stmt->execute();
        $wikiId = $db->lastInsertId();

        foreach ($tags as $tag) {
            Tag::wiki_tag($tag, $wikiId);
        }
    }

    function updateWiki($tags, $title, $content, $category, $creator, $updated_date) {
        global $db;
        $sql = "UPDATE wiki SET  title = :title, content = :content, category_id = :category_id, creator = :creator,  updated_date :updated_date WHERE tag_id = :tag_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':creator', $creator);
        $stmt->bindParam(':updated_date', $updated_date);
        $stmt->bindParam(':wiki_id', $wiki_id);
        $stmt->execute();

        foreach ($tags as $tag) {
            Tag::update_wiki_tag($tag);
        }
    }
}