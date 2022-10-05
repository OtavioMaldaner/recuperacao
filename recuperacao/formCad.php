<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Livro</title>
</head>
<body>
    <form action='formCad.php' method='POST'>
        Título: <input name='titulo' type='text' required>
        <br>
        Autor(a): <input name='autor' type='text' required>
        <br>
        Status: <select name="status" required>
                    <option value="0">Não lido</option>
                    <option value="1">Lido</option>
                </select>
        <br>
        <input type='submit' name='botao'>
        <?php
        if(isset($_POST['botao'])){
            require_once __DIR__."/vendor/autoload.php";
            $festa = new Livro($_POST['titulo'],$_POST['autor'],$_POST['status']);
            $festa->save();
            header("location: index.php");
        }
        ?>
    </form>
</body>
</html>

