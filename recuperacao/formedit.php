<?php
require_once __DIR__."/vendor/autoload.php";
if (isset($_GET['id'])) {
    $livro = Livro::find($_GET['id']);
    // header('Location: index.php');
}
if (isset($_POST['botao'])) {
    $livro = new Livro($_POST['titulo'], $_POST['autor'], $_POST['status']);
    $livro->setIdLivro($_POST['id']);
    $livro->save();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite um livro da sua estante</title>
</head>
<body>
    <form action="formedit.php" method="post">
        <?php
        echo "Título: <input type='text' name='titulo' required value='{$livro->getTitulo()}'>";
        ?>
        <br>
        <?php
            echo "Autor: <input type='text' name='autor' required value='{$livro->getAutor()}'><br>";
            echo "Status: <select name='status' required><option value='0'>Não lido</option><option value='1'>Lido</option></select>";
            echo "<input type='hidden' name='id' required value='{$livro->getIdLivro()}'>";
        ?>
        <br>
        <input type="submit" value="Enviar" name='botao'>
    </form>
</body>
</html>
