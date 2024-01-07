<?php

if (isset($_POST['logout'])) {
    $authentication = new Authentication();
    $authentication->logout();
}
