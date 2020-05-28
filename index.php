<?php
require "config.php";

$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

require "header.php";

?>


<a class="btn btn-primary" href="adicionar.php">ADICIONAR USUÁRIO</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $usuario) : ?>
            <tr>
                <td><?= $usuario['id']; ?></td>
                <td><?= $usuario['nome']; ?></td>
                <td><?= $usuario['email']; ?></td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="editar.php?id=<?= $usuario['id'] ?>">Editar </a>
                    <a class="btn btn-danger btn-sm" href="excluir.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?php require "footer.php" ?>