<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Serviços</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				if(Painel::insert($_POST)){
					Painel::alerta('sucesso','O cadastro do serviço foi registrado com sucesso!');
				}else{
					Painel::alerta('erro','Campos vazios não são permitidos!');
				}
			}
			

		?>
		<div class="form-group">
			<label>Serviço:</label>
			<input type="text" name="servico"/>
		</div><!--form-group-->

		<div class="form-group">
			<label>Descrição:</label>
			<textarea name="descricao"></textarea>
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="order_id" value="0" />
			<input type="hidden" name="nome_tabela" value="tb_site.servicos" />
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->