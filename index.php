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
    </head> 
    <body>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
            </tr>
        <?php foreach($generos as $g): ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td><?= $g['name'] ?></td>
            <tr>
        <?php endforeach ?>
    </table>
  </body>
</html>