
<?php

require_once('conexao.php');

if(isset($_POST['nome']) && $_POST['nome'] != ""){

    $id = $_POST['id'];
    $idquarto = $_POST['idquarto'];
    $idcliente = $_POST['idcliente'];
    $dataaentrada = $_POST['dataaentrada'];
    $dataasaida = $_POST['dataasaida'];
    $valorreserva = $_POST['valorreserva'];
    $statussreserva = $_POST['statussreserva'];
    $dataahora = $_POST['dataahora'];

    if($id == ""){
        $sql = "insert into reservas (idquarto, idcliente, dataaentrada, valorreserva, statussreserva, dataahora,  reg_datahora, alt_datahora)
            values ('$idquarto', '$idcliente', '$dataaentrada', '$valorreserva', '$statussreserva', '$dataahora', now(), '')
        ";
    }else{
        $sql = "update reservas set idquarto = '$idquarto', idcliente = '$idcliente', dataaentrada = '$dataaentrada', valorreserva = '$valorreserva', dataahora = '$dataahora', alt_datahora = NOW()
                where id = ".$id;
    }
    
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && $id==""){
        $_GET['msg'] = 'Dados inseridos com sucesso';
        $_POST = null;
    }elseif($resultado && $id!=""){
        $_GET['msg'] = 'Dados alterados com sucesso';
        $_POST = null;
    }elseif(!$resultado){
        $_GET['msg'] = 'Falha ao inserir a consulta';
    }
}

if(isset($_GET['msg']) && $_GET['msg'] != ""){
    echo $_GET['msg'];
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Reservas Enviadas</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 class="centro">CADASTRO DE RESERVAS</h1>
<p align=center> <a href="formulario-cliente.php">Cadastrar clientes</a></p>

<table border=1 width=80% align=center><tr>
    <td><label for="idquarto">id do quarto:</label></td>
    <td><label for="idcliente ">id do cliente :</label></td>
    <td><label for="dataaentrada">data de entrada:</label></td>        
    <td><label for="dataasaida ">data de saida :</label></td>
    <td><label for="valorreserva ">valor de reserva </label></td>
    <td><label for="statuserva ">status reserva </label></td>
    <td><label for="dataahora ">horario </label></td>

</tr>


<?php
    $sql = "select id, nome, documento , dataanascimento , estado , mensagem from mensagens ";
    $resultado = mysqli_query($conexao, $sql);

    while($dados = mysqli_fetch_array($resultado)){
        echo '<tr><td>'.$dados['idquarto'].'</td>
              <td>'.$dados['idcliente '].'</td>
              <td>'.$dados['dataaentrada '].'</td>        
              <td>'.$dados['dataasaida'].'</td>
              <td>'.$dados['valorreserva '].'</td>
              <td>'.$dados['statuserva '].'</td>
              <td>'.$dados['dataahora '].'</td>

              <td>
                <a href="excluir-reservas.php?id='.$dados['id'].'">Excluir</a>
                <a href="formulario-reservas.php?id='.$dados['id'].'">Alterar</a>
              </td></tr>';
    }

    mysqli_close($conexao);

?>

</table>
<p align=center> <a href="formulario-reservas.php">Cadastrar</a></p>
</body>
</html>