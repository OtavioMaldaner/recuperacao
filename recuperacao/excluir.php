<?php
require_once __DIR__."/vendor/autoload.php";
$festa = Livro::find($_GET['id']);
$festa->delete();
header("location:index.php");