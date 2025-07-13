<?php 
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>App Mail Send</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    </head>

    <body>

        <div class="container">  

            <div class="py-3 text-center ">
                <i class="bi bi-send display-2"></i>
                <h2>Send Mail</h2>
                <p class="lead">Seu app de envio de e-mails particular!</p>
            </div>

            <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1):?>

                <div class="container h-25 bg-success text-light rounded d-flex align-items-center justify-content-center opacity-75">
                    <div class="d-flex">
                        <i class="bi bi-envelope-x fs-3 me-3"></i>
                        <h4><?= $_SESSION['mensagem'] ?></h4>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="../../index.php" class="btn btn-outline-success">Voltar para a principal</a>
                </div>

            <?php endif; ?>

            <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 2):?>

                <div class="container h-25 bg-danger text-light rounded d-flex align-items-center justify-content-center opacity-75">
                    <div class="d-flex">
                        <i class="bi bi-envelope-x fs-3 me-3"></i>
                        <h4>Detalhes do erro : <?= $_SESSION['mensagem'] ?></h4>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <a href="../../index.php" class="btn btn-outline-danger">Voltar para a principal</a>
                </div>
            <?php endif; ?>
            
        </div>

    </body>
</html>