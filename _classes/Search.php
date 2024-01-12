<?php

class Search
{
    static function searchForTitles($title)
    {
        global $db;
        $title = "%" . "$title" . "%";
        $sql = "SELECT wiki.*, category.*, users.username
                FROM wiki
                JOIN users ON wiki.creator = users.user_id
                JOIN category ON wiki.category_id = category.category_id
                WHERE title LIKE :title AND archived = 0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    static function searchForTags($tag)
    {
        global $db;
        $tag = "%" . "$tag" . "%";
        $sql = "SELECT DISTINCT wiki.*, category.*, users.username
                FROM wiki_tag
                         JOIN wiki ON wiki_tag.wiki_id = wiki.wiki_id
                        JOIN users ON wiki.creator = users.user_id
                         JOIN tag ON wiki_tag.tag_id = tag.tag_id
                         JOIN category ON wiki.category_id = category.category_id
                WHERE tag.tag LIKE :tag AND archived = 0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    static function searchForCategory($category)
    {
        global $db;
        $category = "%" . "$category" . "%";
        $sql = "SELECT category.*, wiki.*, users.username FROM wiki
                JOIN users ON wiki.creator = users.user_id
                JOIN category ON wiki.category_id = category.category_id
                WHERE category.category LIKE :category AND archived=0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":category", $category, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
}

