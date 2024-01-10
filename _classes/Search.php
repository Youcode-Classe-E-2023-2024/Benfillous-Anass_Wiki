<?php

class Search
{
    static function searchForTitles($title)
    {
        global $db;
        $title = "%" . "$title" . "%";
        $sql = "SELECT * FROM wiki WHERE title LIKE :title AND archived=0";
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
        $sql = "SELECT tag.*, wiki.* FROM wiki_tag
                JOIN tag ON wiki_tag.tag_id = tag.tag_id
                JOIN wiki ON wiki_tag.wiki_id = wiki.wiki_id
                WHERE tag LIKE :tag";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":tag", $tag, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
}

