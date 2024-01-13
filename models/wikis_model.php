<?php
$categoryObj = new Category();
$categories = $categoryObj->getCategories();


$tagObj = new Tag();
$tags = $tagObj->getTags();

$wikiObj = new Wiki();