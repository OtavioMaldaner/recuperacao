<?php
    require_once __DIR__."/vendor/autoload.php";
    $id = $_GET['id'];
    $livro = Livro::mudarStatus($id);
    header("Location: index.php");
?>