<?php



$localhost = "localhost";  //O endereço do servidor do banco de dados. No exemplo, é localhost, indicando que o banco de dados está no mesmo servidor que o código PHP.
$username = "root";   //O nome de usuário para acessar o banco de dados. Aqui, é root, que é um usuário padrão em muitos sistemas de banco de dados.
$password = "";       //A senha do usuário para o banco de dados. No exemplo, está vazia, o que significa que não há senha configurada para o usuário root.
$db_banco = "ludofashion"; //O nome do banco de dados é ludofashion.


$connect = mysqli_connect("$localhost", "$username", "$password", "$db_banco"); //Usa a função mysqli_connect para tentar estabelecer uma conexão com o banco de dados usando as variáveis definidas anteriormente. A função mysqli_connect requer quatro argumentos:
//A função mysqli_connect retorna um objeto de conexão, que é armazenado na variável $connect.



if ($connect->connect_error) { //Se houver um erro, essa propriedade terá uma mensagem de erro.
    die("Conexão falhou: " . $connect->connect_error);//Verifica se a propriedade connect_error não está vazia, o que indicaria um erro de conexão.
}//Se um erro for detectado, a função die encerra a execução do script e exibe a mensagem de erro concatenada com a mensagem específica do erro obtida a partir de $connect->connect_error.
    


?>