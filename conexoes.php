<?php



$localhost = "localhost";
 //O endereço do servidor do banco// 
$username = "root";
//O nome de usuário padrão//   
$password = "";
 //A senha do usuário para o banco de dados//, //se houve senha, ja esta aqui//     
$db_banco = "ludofashion";
//nome do banco// 


$connect = mysqli_connect("$localhost", "$username", "$password", "$db_banco"); 
//O mysqli_connect faz uma conexão com o banco  usando as variáveis usadas//.
//A função mysqli_connect retorna um objeto de conexão, que é armazenado na variável $connect.



if ($connect->connect_error) {
    //Se aparecer um erro, retorna com uma mensagem de erro.// 
    die("Falha de Conexão: " . $connect->connect_error);
} //Se um erro for detectado, vai pro if e encerra a conexao//
    


?>