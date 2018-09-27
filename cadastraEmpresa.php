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
        <form action="cadastraEmpresa.php" method="POST">
                 <table style="margin: 0 auto; font-family: Arial;">
                    <tr>
                        <td>Nome da empresa: </td><td><input type="text" name="nome" /></td>
                    </tr>
                    <tr>
                        <td>Rua: </td><td><input type="text" name="rua" /></td>
                    </tr>
                    <tr>
                        <td>Número: </td><td><input type="text" name="numero" /></td>
                    </tr>
                    <tr>
                        <td>Bairro: </td><td><input type="text" name="bairro" /></td>
                    </tr>
                    <tr>
                        <td>Cidade: </td><td><input type="text" name="cidade" /></td>
                    </tr>
                    <tr>
                        <td>Estado: </td><td><input type="text" name="estado" /></td>
                    </tr>
                    <tr>
                        <td>CEP: </td><td><input type="text" name="cep" /></td>
                    </tr>
                    <tr>
                        <td>Quantidade de câmeras: </td><td><input type="text" name="qtd" /></td>
                    </tr>
                    <br>                    
                    <hr>
                    
                    <tr>
                        <td>Login: </td><td><input type="text" name="login" /></td>
                    </tr>
                    <tr>
                        <td>Senha: </td><td><input type="text" name="senha" /></td>
                    </tr>     
                    <br>
                    <tr>
                        <td><input type="submit" name="gravar" value="Cadastrar"</td>
                    <br>
                    <a href="listarEmpresas.php" target="_self">Listar Empresas Cadastradas</a>    
                    <br>
                    <a href="Login.php" target="_self">Logar</a>      
                    </tr>
                    </table>                
            </form>                      
        
        <?php     
    
    function setConectar(){     
       $conn = new mysqli("localhost", "root","forbeci", "sistemacameras") or die("Conexão com banco de dados falhou." . $conn->connect_error);   
       
       return $conn;
   }        
   
   function inserir($nome,$rua,$numero,$bairro,$cidade,$estado,$cep,$qtd,$login,$senha){
        $sql = "INSERT INTO empresa (nome,rua,numero,bairro,cidade,estado,cep,qtd, login, senha) VALUES('" . $nome . "', '" . $rua . "', '" . $numero . "', '" . $bairro . "', '" . $cidade . "', '" . $estado . "','" . $cep . "','" . $qtd . "','" . $login . "','" . $senha . "' )";
        
        if(mysqli_query(setConectar(), $sql)){
            return true;
        }else{
            return false;
        }
   }   
   
   function verifica($nome,$rua,$numero,$cep,$cidade,$qtd,$login,$senha){      
       if(empty ($nome) || empty ($rua) || empty ($numero) || empty ($cep) || empty ($cidade) || empty ($qtd) || empty($login) || empty($senha)){
           return 1;
       }else if (!(is_numeric($numero))){
	   return 2;
       }else if(!(is_numeric($qtd))){
           return 3;
       }    
   }
        
        if($_POST){
            if($_POST['gravar']){
                $nome= $_POST["nome"];
                $rua= $_POST["rua"];
                $numero= $_POST["numero"];                
                $bairro=$_POST["bairro"];
                $cidade=$_POST["cidade"];
                $estado=$_POST["estado"];
                $cep=$_POST["cep"];
                $qtd=$_POST["qtd"];
                $login=$_POST["login"];
                $senha=$_POST["senha"];
                
                switch (verifica($nome,$rua,$numero,$cep,$cidade,$qtd,$login,$senha)){                     
                    case 1:
                        echo "Verifique se os campos nome,rua,numero,cep,cidade, quantidade de câmeras, login e senha foram preenchidos!";
                        break;
                    case 2:
                        echo "Apenas números no número.";
                        break;
                    case 3:
                        echo "Apenas números na quantidade de câmeras.";
                        break;
                    default :               
                        $resultado = inserir($nome,$rua,$numero,$bairro,$cidade,$estado,$cep,$qtd,$login,$senha);
                   
                        if($resultado == true){
                          echo "Empresa salva com sucesso !";
                        }else{
                        echo "Falha ao inserir empresa !";
                        }
                        break;
                    }            
            }
        }      
        ?>
        
    </body>
</html>
