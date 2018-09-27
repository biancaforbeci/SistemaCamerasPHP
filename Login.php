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
    </head>
    <body>
        <h1 style="text-align: center; color: grey">Security CloudCam</h1>
        <hr>                
        <form action="Login.php" method="POST">
               <table style="margin: 0 auto; font-family: Arial;">
                    <tr>
                        <td>Login: </td><td><input type="text" name="login" /></td>
                    </tr>
                    <tr>
                        <td>Senha: </td><td><input type="text" name="senha" /></td>
                    </tr>                    
                    <tr>
                        <td><input type="submit" name="gravar" value="Logar"</td>    
                    </tr>
                </table>                
        </form>                    
       
     <?php     
    
    function setConectar(){     
       $conn = new mysqli("localhost", "root","forbeci", "sistemacameras") or die("Conexão com banco de dados falhou." . $conn->connect_error);   
       
       return $conn;
   }        
   
   function pesquisar($login,$senha){
        $sql = "SELECT * FROM empresa WHERE login= '$login' AND senha='$senha'";
       
        if(mysqli_query(setConectar(), $sql) != null){
            return $sql;
        }else{
            return false;
        }
   }  
   
           session_start();
 
           if($_POST){
            if($_POST['gravar']){                
                $login=$_POST["login"];
                $senha=$_POST["senha"];
                
                $resultado = pesquisar($login,$senha);
                   
                   if($resultado != false){
                       $_SESSION['login'] = $login;
                       $_SESSION['senha'] = $senha;
                      header('Location: cameras.php');
                   }else{
                     echo "Login da empresa não encontrado !";
                   }                              
            }
        }      
        ?>
    </body>
</html>