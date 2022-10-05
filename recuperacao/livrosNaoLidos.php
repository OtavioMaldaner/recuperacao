<?php
require_once __DIR__."/vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros Não Lidos</title>
</head>
<body>
<table>
        <tr>
            <td>Título</td>
            <td>Autor</td>
        </tr>
        <?php
        $livros = Livro::livrosNaoLidos();
        foreach($livros as $livro){
            echo "<tr>";
            echo "<td>{$livro->getTitulo()}</td>";
            echo "<td>{$livro->getAutor()}</td>";
            echo '<td><a href="mudaStatus.php?id='.$livro->getIdLivro().'">Já li este livro</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
    <a href="index.php">Voltar para a tela inicial</a>
</body>
</html>