<?php if (!isset($_SESSION["login"])) {
    header("Location: 404.html");
}