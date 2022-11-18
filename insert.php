<?php
require_once './vendor/autoload.php';

use ExemploPDOMYSQL\MySQLConnection;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $bd = new MySQLConnection();

$comando = $bd->prepare('INSERT INTO generos (nome) VALUES (: nome)');
$comando->execute([': nome' => $_POST['nome']]);

header('Location:/index.php');

}
$_title = 'Novo Gênero';
?>

<?php include('./includes/header.php') ?>

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
        
    <?php include('./includes/footer.php') ?>
