<?php
require_once './vendor/autoload.php';

use ExemploPDOMYSQL\MySQLConnection;

$bd = new MySQLConnection();

$genero= null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute(['id' => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
}else {
    $comando = $bd->prepare('UPDATE generos SET nome = :nome WHERE id = :id');
    $comando->execute([': nome' => $_POST['nome'], ':id' => $_POST['id']]);
    
    header('Location:/index.php');

}
?>

<!DOCTYPE html>
    <html lang="pt-br"> 
    <head>
        <meta charset="utf-8">
        <title>Editar Género</title>
    </head>
    <body>
        <h1>Editar Genero</h1>
        <form action="update.php" method="post"> <input type="hidden" name="id" value="<? Sgenero['id']?>"
            <input type="hidden" name="id" values="<?= $generos['id'] ?>"
            <label for="nome">Nome do Gênero</label> 
            <input type="text" required name="nome" value="<?= $genero ['nome'] ?>" />
            <button type="submit">salvar</button>
        </form>
    </body>
</html>