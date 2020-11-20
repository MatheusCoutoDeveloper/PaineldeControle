<?php

	verificaPermissaoPagina(2);
	

?>


<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];
				

			if($login == ''){
				Painel::alerta('erro','O campo login está vazio!');
			}else if($nome == ''){
				Painel::alerta('erro','O campo nome está vazio!');
			}else if($senha == ''){
				Painel::alerta('erro','O campo senha está vazio!');
			}else if($cargo == ''){
				Painel::alerta('erro','O campo cargo precisa estar selecionado!');
			}else if($imagem['name'] == ''){
				Painel::alerta('erro','Selecione uma imagem!');
			}else{
				//Podemos cadastrar!
				if($cargo >= $_SESSION['cargo']){
					Painel::alerta('erro','Você precisa selecionar um cargo menor que o seu!');
				}else if(Painel::imagemValida($imagem) == false){
					Painel::alerta('erro','O formato especificado não é válido!');
				}else if(Usuario::userExists($login)){
					Painel::alerta('erro','Este login já foi usado, escolha outro por favor!');
				}else{
					//Podemos cadastrar no banco de dados
					$usuario = new Usuario();
					$imagem = Painel::uploadFile($imagem);
					$usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
					Painel::alerta('sucesso','O cadastro do usuário '.$login.' foi feito com sucesso!');
				}
			}
		}

		?>
		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				
				<?php 

					foreach (Painel::$cargos as $key => $value) {
						echo '<option value="'.$key.'">'.$value.'</option>';
					}

				 ?>

			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Adicionar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->