<?php

if (isset($_POST['logout'])) {
    $authentication = new Authentication();
    $authentication->logout();
}

if (isset($_GET["getWikis"])) {
    $wikis = $wikiObj->getWikis();

    echo json_encode($wikis);
    /*echo "success";*/
    exit;
}

if (isset($_POST["create_wiki"])) {
    extract($_POST);
    $date = date("U");
    $wikiObj->addWiki($title, $content, $tag, $category, $_SESSION["user_id"], $date);
    echo "wiki added successfully";
    exit;
}