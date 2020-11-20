<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$servicos = Painel::select('tb_site.servicos','id=?',array($id));
	}else{
		Painel::alerta('erro','Você precisa passar o parâmetro ID.');
		die();
	}
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Serviço</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alerta('sucesso','O serviço foi editado com sucesso!');
					$servicos = Painel::select('tb_site.servicos','id=?',array($id));

				}else{
					Painel::alerta('erro','Campos vazios não são permitidos.');	
				}
			}

		?>
		<div class="form-group">
			<label>Serviço:</label>
			<input type="text" name="servico" value="<?php echo $servicos['servico']; ?>"  />
		</div><!--form-group-->

		<div class="form-group">
			<label>Descrição:</label>
			<textarea name="descricao"><?php echo $servicos['descricao']; ?></textarea>
		</div><!--form-group-->


		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_site.servicos" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->