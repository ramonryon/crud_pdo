<?php

require "config.php";

$info = [];

$id = filter_input(INPUT_GET, "id");
if ($id) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();


    if ($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

require "header.php";
?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?= $info['id']; ?>">
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="name" class="form-control" placeholder="digite seu nome" value="<?= $info['nome']; ?>">
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email" class="form-control" placeholder="digite seu email" value="<?= $info['email']; ?>">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
</form>

<?php require "footer.php"; ?>