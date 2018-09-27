<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
         session_start();
         $loginPage = $_SESSION['login'];
         $senhaPage = $_SESSION['senha'];
         $row;         
         
         $dados = pesquisar($loginPage, $senhaPage);
         if($dados != null){                
            $row = mysqli_fetch_row($dados);
            echo "<html><h1> Empresa logada : ".$row[0]."</h1></html>";             
         } 
         
         $result= listar();
         
         
       function setConectar(){     
       $conn = new mysqli("localhost", "root","forbeci", "sistemacameras") or die("Conexão com banco de dados falhou." . $conn->connect_error);   
       return $conn;
       }     
         
       function pesquisar($login,$senha){
            $result = "SELECT nome,qtd FROM empresa WHERE login= '$login' AND senha='$senha'";           
            $dados = mysqli_query(setConectar(), $result);    
            return $dados;
       }
       
       function listar(){
        $sql= mysqli_query(setConectar(), "SELECT * FROM cameras");  
        return $sql;
        }         
        ?>
    </head>
    <body style="background-color: #eee">
    
    <div style="margin-left: 220px; align-items: center; align-content: center" > 
         
        <?php
           $x=0;
           while(($rowcamera = $result->fetch_array()) && ($x < $row[1])){
           echo $rowcamera['path'];
           $x++;
           }   
        ?>
    </div>
   
    </body>
</html>