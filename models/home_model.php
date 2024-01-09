<?php


//$user = new User(1);
//$user->username = 'Baz';
//$user->email = 'Baz';
//$var = $user->email;
//$user->setPassword('123');
//$user->edit();
//dd($user);

$users = User::getAll();
//dd($users);


$categoryObj = new Category();
$categories = $categoryObj->getCategories();


$tagObj = new Tag();
$tags = $tagObj->getTags();
