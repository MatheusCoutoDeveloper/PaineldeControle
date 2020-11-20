<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Slide</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$imagem = $_FILES['imagem'];
				
			if($nome == ''){
				Painel::alerta('erro','O campo nome não pode ficar vazio');
			}else{
				//Podemos cadastrar!
				if(Painel::imagemValida($imagem) == false){
					Painel::alerta('erro','O formato especificado não é válido!');
				}else{
					//Podemos cadastrar no banco de dados
					$imagem = Painel::uploadFile($imagem);
					$arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides'];
					Painel::insert($arr);
					Painel::alerta('sucesso','O cadastro do slide foi realizado com sucesso!');
				}
			}
		}

		?>
		<div class="form-group">
			<label>Nome do Slide:</label>
			<input type="text" name="nome">

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="order_id" value="0" />
			<input type="hidden" name="nome_tabela" value="tb_site.slides" />
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->