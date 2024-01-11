<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST['logout'])) {
    $authentication = new Authentication();
    $authentication->logout();
}

if (isset($_GET["getWikis"])) {
    if (isset($_SESSION["admin"]))
        $wikis = $wikiObj->getWikis();
    else
        $wikis = $wikiObj->getMyWikis($_SESSION["user_id"]);



    $searchArray = [];

    foreach ($wikis as $data) {
        $wikiTags = Tag::get_wiki_tag($data["wiki_id"]);

        $searchArray[] = [
            "tags" => $wikiTags,
            "wiki_infos" => $data
        ];
    }
    echo json_encode($searchArray);
    exit;
}

if (isset($_POST["create_wiki"])) {
    extract($_POST);
    $date = date("U");
    $wikiObj->addWiki($title, $content, $tag, $category, $_SESSION["user_id"], $date);
    echo "wiki added successfully";
    exit;
}


if (isset($_POST["delete_wiki"])) {
    $wiki_id = $_POST["wiki_id"];
    $wikiObj->deleteWiki($wiki_id);
    echo "success";
    exit;
}

if (isset($_POST["archive_wiki"])) {
    $wiki_id = $_POST["wiki_id"];
    $wikiObj->archiveWiki($wiki_id);
    echo "success";
    exit;
}


if (isset($_POST["edit_wiki"])) {
    extract($_POST);
    $date = date("U");
    $wikiObj->updateWiki($wiki_id, $tag, $title, $content, $category, $date);
    echo "success";
    exit;
}