<?php
	include('../config.php');
	$data = array();
	$assunto = 'Novo mensagem do site!';
	$corpo = '';
	foreach ($_POST as $key => $value) {
		$corpo.=ucfirst($key).": ".$value;
		$corpo.="<hr>";
	}
	$info = array('assunto'=>$assunto,'corpo'=>$corpo);
	$mail = new Email('texteditor.com.br','texteditor@task.com.br','Matheus100%','Texteditor');
	$mail->addAdress('matheuscoutoferreira@hotmail.com','Matheus');
	$mail->formatarEmail($info);
	if($mail->enviarEmail()){
		$data['sucesso'] = true;
	}else{
		$data['erro'] = true;
	}



	//$data['retorno'] = 'sucesso';

	die(json_encode($data));
?>