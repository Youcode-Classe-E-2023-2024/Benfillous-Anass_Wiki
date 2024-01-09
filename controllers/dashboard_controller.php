<?php

if(empty($_SESSION["admin"])) {
    header("Location: index.php");
}

if(isset($_POST["add_category"])) {
    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);
    $categoryObj->addCategory($category);
    echo "category added successfully";
    exit;
}

if(isset($_GET["get_categories"])) {
    $categories = $categoryObj->getCategories();
    echo json_encode($categories);
    exit;
}

if(isset($_POST["delete_category"])) {
    $categoryId = filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_SPECIAL_CHARS);
    $categoryObj->deleteCategory($categoryId);
    echo "category deleted successfully";
    exit;
}

if(isset($_POST["edit_category"])) {
    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);
    $categoryId = filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_SPECIAL_CHARS);
    $categoryObj->updateCategory($category, $categoryId);
    echo "category updated successfully";
    exit;
}


if(isset($_POST["add_tag"])) {
    $tag = filter_input(INPUT_POST, "tag", FILTER_SANITIZE_SPECIAL_CHARS);
    $tagObj->addTag($tag);
    echo "tag added successfully";
    exit;
}

if(isset($_GET["get_tags"])) {
    $tags = $tagObj->getTags();
    echo json_encode($tags);
    exit;
}

if(isset($_POST["delete_tag"])) {
    $tagId = filter_input(INPUT_POST, "tag_id", FILTER_SANITIZE_SPECIAL_CHARS);
    $tagObj->deleteTag($tagId);
    echo "tag deleted successfully";
    exit;
}


if(isset($_POST["edit_tag"])) {
    $tag = filter_input(INPUT_POST, "tag", FILTER_SANITIZE_SPECIAL_CHARS);
    $tagId = filter_input(INPUT_POST, "tag_id", FILTER_SANITIZE_SPECIAL_CHARS);
    $tagObj->updateTag($tag, $tagId);
    echo "tag updated successfully";
    exit;
}