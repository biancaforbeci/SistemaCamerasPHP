<html>
    <head>
        <meta charset="UTF-8">
        <title>Security CloudCam</title>
        <link rel="stylesheet" href="css/estilo.css"
    </head>
    <body>
        <h1 style="text-align: center; color: gray">Security CloudCam</h1>
        <hr>
        <h4>Empresas Cadastradas</h4>
        <table id='tabela' border='1' margin:auto>
            <thead>
            <th>Nome</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
            <th>Quantidade de câmeras</th>
            </thead>                   
    <tbody>    
        <?php       
    
    function setConectar(){     
       $conn = new mysqli("localhost", "root","forbeci", "sistemacameras") or die("Conexão com banco de dados falhou." . $this->conn->connect_error);   
       
       return $conn;
   }   
   
   function listar(){
        $sql= mysqli_query(setConectar(), "SELECT * FROM empresa");
        
        return $sql;
    }        
        $dados= listar();
        while($col = $dados->fetch_array()){
            echo "<tr>";
            echo "<td>" .$col['nome']."</td>";
            echo "<td>" .$col['rua']."</td>";
            echo "<td>" .$col['numero']."</td>";
            echo "<td>" .$col['bairro']."</td>";
            echo "<td>" .$col['cidade']."</td>";
            echo "<td>" .$col['estado']."</td>";
            echo "<td>" .$col['cep']."</td>";
            echo "<td>" .$col['qtd']."</td>";
            echo "<tr>";
        }        
        ?>
    </tbody>  
    </table>
    </body>
</html>