<?php
$tituloPagina = 'Contato';
$descricaoPagina = 'Entre em contato com a DROZ Robótica para solicitar orçamento e informações.';
$paginaAtiva = 'contato';
require_once __DIR__ . '/includes/funcoes.php';
include __DIR__ . '/includes/header.php';

$mensagemEnviada = false;
$nome = '';
$email = '';
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if ($nome !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) && $mensagem !== '') {
        $mensagemEnviada = true;
    }
}
?>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <h1 class="section-title mb-3">Fale com a DROZ Robótica</h1>
                <p class="hero-text">Use esta área para formulário de contato e também para demonstrar um fluxo comercial simples no site.</p>

                <div class="glass-card rounded-4 p-4 mt-4">
                    <p class="mb-2"><i class="bi bi-geo-alt me-2"></i>Campo Mourão - PR</p>
                    <p class="mb-2"><i class="bi bi-envelope me-2"></i>contato@drozrobotica.com.br</p>
                    <p class="mb-0"><i class="bi bi-phone me-2"></i>(44) 99999-9999</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="glass-card rounded-4 p-4 p-lg-5">
                    <?php if ($mensagemEnviada): ?>
                        <div class="alert alert-success">
                            Mensagem enviada com sucesso. Em um ambiente real, este formulário poderia ser conectado ao banco de dados ou a um e-mail.
                        </div>
                    <?php endif; ?>

                    <form method="post" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?= e($nome) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" value="<?= e($email) ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Mensagem</label>
                            <textarea name="mensagem" class="form-control" rows="5" required><?= e($mensagem) ?></textarea>
                        </div>
                        <div class="col-12 d-grid d-md-flex justify-content-md-end">
                            <button class="btn btn-primary px-4">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
