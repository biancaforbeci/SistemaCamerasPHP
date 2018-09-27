<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <title></title>
    <?php
       if($_POST){
            if($_POST['cadastra']){
                header('Location: cadastraEmpresa.php');
            }else{
                header('Location: Login.php');
            }
       }
    ?>            
    </head>
    <body>
        <form action="index.php" method="POST">
        <h1 style="text-align: center; color: grey">Security CloudCam</h1>
        <hr>                
               <center>
                 <img src="monit.jpg" style="align-content: center"/> 
                </center>                 
              
            <div id="botao1">
                <input type="submit" name="cadastra" value="Cadastrar Empresa" class="botaoEnviar1"/>
            </div>
                               
            <div id="botao">
                <input type="submit" name="logar" value="Logar" class="botaoEnviar" />
            </div>             
     </form> 
    </body>
</html>
