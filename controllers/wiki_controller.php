<?php

if(isset($_GET["id"])) {
    $wikiId = $_GET["id"];
    $wikiInfos = Wiki::getWiki($wikiId);
    $tags = Tag::get_wiki_tag($wikiId);
    if(empty($wikiInfos))
        header("Location: 404.html");
} else
    header("Location: 404.html");