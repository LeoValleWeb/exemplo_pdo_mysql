<?php
require_once './vendor/autoload.php';

use ExemploPDOMYSQL\MySQLConnection;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $bd = new MySQLConnection();

$comando = $bd->prepare('INSERT INTO generos (nome) VALUES (: nome)');
$comando->execute([': nome' => $_POST['nome']]);

header('Location:/index.php');

}

?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Novo Gênero</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
       <main class="container">
        <h1>Novo Gênero</h1>
        <form action="insert.php" method="post">
           <div class="form-grup">
            <label for="nome">Nome do Gênero</label>
            <input class="form-control" type="text" required name="nome" />
           </div>
           <br />
            <a class="btn btn-secondary" href="index.php">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
        </form>
      </main>
    </body>
</html>