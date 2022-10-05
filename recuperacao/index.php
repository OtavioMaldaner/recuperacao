<?php
require_once __DIR__."/vendor/autoload.php";
$livros = Livro::findall();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estante</title>
</head>
<body>
    <table>
        <tr>
            <td>Título</td>
            <td>Autor(a)</td>
            <td>Status</td>
        </tr>
        <?php
        foreach ($livros as $livro) {
            echo '<tr>';
            echo '<td>'.$livro->getTitulo().'</td>'."\t";
            echo '<td>'.$livro->getAutor().'</td>'."\t";
            if($livro->getStatus() == 0) {
                echo "<td>Não lido</td>"."\t";
            } else {
                echo "<td>Lido</td>"."\t";
            }
            echo '<td><a href="formedit.php?id='.$livro->getIdLivro().'">Editar</a></td>';
            echo "<td><a href='excluir.php?id={$livro->getIdLivro()}'>Excluir</a></td>";
            echo '</tr>';
        }
        ?>
    </table>
    <a href="formcad.php">Adicionar um livro a sua estante</a>
    <br>
    <a href="livrosLidos.php">Veja os livros que você já leu</a>
    <br>
    <a href="livrosNaoLidos.php">Veja os livros na sua lista de leituras</a>
</body>
</html>






