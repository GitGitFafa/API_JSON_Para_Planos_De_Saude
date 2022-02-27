<?php
/*$con = mysqli_connect($user,$password,$database, $port, $socket) */
/*início da conexão com o banco de dados.  */
$con = mysqli_connect('localhost','root', '', 'propostaplanosaude' );
/*Final do código da conexão com banco de dados*/
$dados = array();
$dados['erro'] = false;
$dados['message'] ='Nenhum erro encontrado. Prossiga com a sua api.';


$sql = "SELECT * FROM beneficiarios";
/*$result = mysqli_query($link, $sql); */
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) >0){
  while($user = mysqli_fetch_array($result)){

    $dados['users'][] = array(
      'id'=> intval($user['id']), 
      'nome'=>$user['nome'],
      'idade'=> $user['idade'],
      'quantidade_de_usuarios'=> $user['quantidade_de_usuarios'],
      'registro_de_planos'=> $user['registro_de_planos']
    );
  }
}else{
  $dados['erro'] = true;
  $dados['message'] ="Nenhum usuário encontrado!";
  exit;
}

/*Início do array com as informações que serão transformadas no arquivo JSON */


/*Fim do array com os dados que será transformado em JSON */

/*transformando os dados num arquivo JSON */
echo json_encode ($dados);

