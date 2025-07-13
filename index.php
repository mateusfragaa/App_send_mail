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

			<?php if (isset($_GET['erro']) && $_GET['erro'] == 'login'):?>
				<div class="alert alert-danger" role="alert">
  					<div class="d-flex">
  						<i class="bi bi-exclamation-triangle fs-5 me-2"></i>
    					<h6>Houve um erro verifique se o dados do formulário estão preenchidos corretamente!</h6>
  					</div>
				</div>
			<?php endif; ?>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<form method="post" action="App/Controller/processa_envio.php" class="d-grid gap-3">
							<div class="form-group">
								<label for="para">Para</label>
								<input type="text" class="form-control" id="para" placeholder="joao@dominio.com.br" name="para">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail" name="assunto">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea style="resize: none;" rows="3" cols="30" class="form-control" id="mensagem" name="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>