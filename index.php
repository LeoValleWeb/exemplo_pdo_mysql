<?php

require_once './vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$comando - $bd->prepare('SELECT * FROM generos');
$conando->execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang-"pt-br">
    <head>
        <meta charset="utf-8">
        <title>Biblioteca</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head> 
    <body>
    <main class="container">
        <a class="btn btn-primary" href="insert.php">Novo Gênero</a>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>&nbsp;</th>
            </tr>
        <?php foreach($generos as $g): ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td><?= $g['name'] ?></td>
                <td>
                    <a class="bnt bnt-secondary" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                    <a class="bnt btn-danger" href="delete.php?id=<?= $g['id'] ?>">Excluir"</a>
                </td>
            <tr>
            <?php endforeach ?>
        </table>
      </main>
    </body>
</html>