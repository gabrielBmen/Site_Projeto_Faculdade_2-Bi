<?php
include 'templates/header.php';
include 'conexao.php';

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
?>

<div class="container mt-5">
    <div class="row">

<?php while($produto = mysqli_fetch_assoc($resultado)) { ?>

<div class="col-md-4 mb-4">
    <div class="card shadow h-100">
        <div class="card-body">
            <h5><?= $produto['nome'] ?></h5>

            <p><?= $produto['descricao'] ?></p>

            <h4>R$ <?= $produto['preco'] ?></h4>

            <button class="btn btn-success">
                Comprar
            </button>
        </div>
    </div>
</div>

<?php } ?>

    </div>
</div>

<?php include 'templates/footer.php'; ?>