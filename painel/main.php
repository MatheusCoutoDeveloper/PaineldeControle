<?php

    if(isset($_GET['loggout'])){
        Painel::loggout();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Painel de Controle</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="menu">
        <div class="menu-wraper"></div>
            <div class="box-usuario">
                <?PHP
                    if($_SESSION['img'] == ''){  
                ?>
                        <div class="avatar-usuario">
                        <i class="fa fa-user"></i>
                </div><!--avatar-usuario-->
                <?php }else{ ?>
                    <div class="imagem-usuario">
                        <img src="<?php INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>"/>
                    </div>
                <?php } ?>
                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome']; ?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
                </div><!--nome-usuario-->
            </div><!--box-usuario-->
            <div class="itens-menu">
                <h2>Cadastro</h2>
                <a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
                <a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico">Cadastrar Serviço</a>
                <a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
                <h2>Gestão</h2>
                <a <?php selecionadoMenu('listar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
                <a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>
                <a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
                <h2>Administração do Painel</h2>
                <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
                <a <?php selecionadoMenu('adicionar-usuario'); ?><?php verificaPermissaoMenu(2); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuários</a>
                <h2>Configuração Geral</h2>
                <a <?php selecionadoMenu('editar-site'); ?> href="">Editar Site</a>
            </div><!--itens-menu-->
        </div><!--menu-wraper-->
        </div><!--menu-->
            <header>
                <div class="center"></div>
                <div class="menu-btn">
                    <i class="fa fa-bars"></i>
                </div><!--menu-btn-->
                <div class="loggout">
                <a <?php if(@$_GET['url'] == ''){ ?>style="background: #6670b3;padding: 13px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>?home"><i class="fa fa-home"></i> <span>Página Principal</span></a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa fa-window-close"></i> <span>Sair</span></a>
                </div><!--loggout--> 
                <div class="clear"></div>
                </div><!--center-->
            </header>
        <div class="content">
            <?php Painel::carregarPagina(); ?>
        </div><!--content-->

    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $('[formato=data]').mask('99/99/9999');
    </script>
    </body>
</html>

