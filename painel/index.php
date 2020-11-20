<?php

    include('../config.php');

    if(Painel::logado() == true){
        include('login.php');
    }else{
        include('main.php');
    }
    

?>