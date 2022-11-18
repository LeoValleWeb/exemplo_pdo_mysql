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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
       <main class="container">
        <h1>Editar Genero</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
            <div class="form-grup">
            <label for="nome">Nome do Gênero</label> 
            <input class="form-control" type="text" name="nome" value="<?= $genero ['nome'] ?>" />
        </div>
        <br />
            <a class="btn btn-secondary" href="index.php">Voltar</a>
            <button class="btn btn-success" type="submit">salvar</button>
        </form>
    </main>
    </body>
</html>