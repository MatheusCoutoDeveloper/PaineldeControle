<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_site.depoimentos',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
	}else if(isset($_GET['order'])){
		Painel::orderItem('tb_site.depoimentos',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
	$depoimentos = Painel::selectAll('tb_site.depoimentos',($paginaAtual - 1)* $porPagina, $porPagina);
?>

<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Listar Depoimentos</h2>
		<div class="wraper-table">
			<table>
				<tr>
					<td> <i class="fa fa-user-circle" aria-hidden="true"></i> Nome:</td>
					<td> <i class="fa fa-calendar" aria-hidden="true"></i> Data:</td>
					<td> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
					<td><i class="fa fa-times" aria-hidden="true"></i></td>
					<td>#</td>
					<td>#</td>
				</tr>

				<?php
					foreach ($depoimentos as $key => $value) {

				?>

				<tr>
					<td><?php echo $value['nome']; ?></td>
					<td><?php echo $value['data']; ?></td>
					<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-depoimento?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></td>
					<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?excluir=<?php echo $value['id']?>"><i class="fa fa-times" aria-hidden="true"></i> Excluir</a></td>
					<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=up&id=<?php echo $value['id']?>"><i class="fa fa-chevron-up" aria-hidden="true"></i></a></td>
					<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=down&id=<?php echo $value['id']?>"><i class="fa fa-chevron-down" aria-hidden="true"></i></a></td>
				</tr>

				<?php }  ?>
			</table>
		</div><!--wraper-table-->

		<div class="paginacao">
			<?php
				$totalPaginas = ceil(count(Painel::selectAll('tb_site.depoimentos')) / $porPagina);
				for($i = 1; $i <= $totalPaginas; $i++){
					if($i == $paginaAtual){
						echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
					}else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
				}
			?>

		
		</div><!--paginacao-->

</div>


