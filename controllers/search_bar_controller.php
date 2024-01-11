<?php

if (isset($_GET["search_title"])) {
    $input_value = $_GET["input_value"];
    $searchedData = Search::searchForTitles($input_value);
    $searchArray = [];

    foreach ($searchedData as $data) {
        $wikiTags = Tag::get_wiki_tag($data["wiki_id"]);

        $searchArray[] = [
            "tags" => $wikiTags,
            "wiki_infos" => $data
        ];
    }
    echo json_encode($searchArray);
    exit;
}

if (isset($_GET["search_tag"])) {
    $input_value = $_GET["input_value"];
    $searchedData = Search::searchForTags($input_value);

    $searchArray = [];
    foreach ($searchedData as $data) {
        $wikiTags = Tag::get_wiki_tag($data["wiki_id"]);

        $searchArray[] = [
            "tags" => $wikiTags,
            "wiki_infos" => $data
        ];
    }
    echo json_encode($searchArray);
    exit;
}

if (isset($_GET["search_category"])) {
    $input_value = $_GET["input_value"];
    $searchedData = Search::searchForCategory($input_value);
    $searchArray = [];

    foreach ($searchedData as $data) {
        $wikiTags = Tag::get_wiki_tag($data["wiki_id"]);

        $searchArray[] = [
            "tags" => $wikiTags,
            "wiki_infos" => $data
        ];
    }
    echo json_encode($searchArray);
    exit;
}

if (isset($_GET["get_wiki_tags"])) {
    $wiki_id = $_GET["wiki_id"];
    $wikiTags = Tag::get_wiki_tag($wiki_id);

    $searchArray = [];

    foreach ($searchedData as $data) {
        $wikiTags = Tag::get_wiki_tag($data["wiki_id"]);

        $searchArray[] = [
            "tags" => $wikiTags,
            "wiki_infos" => $data
        ];
    }
    echo json_encode($searchArray);
    exit;
}