<?php
require 'conexoes.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {          //if ($_SERVER['REQUEST_METHOD'] == 'POST') {: Verifica se a requisição HTTP é do tipo POST. Isso é usado para garantir que o código a seguir só será executado se o formulário foi enviado via método POST.
 
    $nome = $_POST['categoria'];  //$nome = $_POST['categoria'];: Obtém o valor do campo de formulário com o nome categoria e o armazena na variável $nome. Este valor é o nome da nova categoria a ser adicionada ao banco de dados.
    

    // Verifica se o campo de nome não está vazio
    if (!empty($nome)) {                               //if (!empty($nome)) {: Verifica se a variável $nome não está vazia. A função !empty() retorna true se a variável não for vazia e não for um valor considerado vazio (como "", 0, null, etc.).
    
        // Prepara a consulta SQL para inserir a nova categoria 
        $sql = "INSERT INTO categoria (nome) VALUES (?)";      //$stmt = $connect->prepare($sql);: Prepara a consulta SQL para execução. $connect é o objeto de conexão com o banco de dados, e prepare é um método da classe mysqli que retorna um objeto de declaração preparada ($stmt).
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $nome);                              //bind_param(): É um método do objeto de declaração preparada que vincula variáveis aos parâmetros da consulta SQL. Esse método é usado para associar valores às placeholders (marcadores) na consulta preparada.


        // "s": É uma string que define o tipo de dado do parâmetro que está sendo vinculado. No caso de "s", significa que o parâmetro é uma string. Outros possíveis tipos são:

        // "i" para inteiros.
        // "d" para números de ponto flutuante (double).
        // "b" para blobs (dados binários).



        // Executa a consulta  
        if ($stmt->execute()) {                         //if ($stmt->execute()) {: Executa a consulta SQL preparada. Se a execução for bem-sucedida, o bloco de código dentro do if será executado.
           
            header('location:categorias.php');
        } else {
            echo "Erro ao adicionar categoria: " . $connect->error; //else { echo "Erro ao adicionar categoria: " . $connect->error; }: Se a execução da consulta falhar, exibe uma mensagem de erro que inclui a mensagem de erro retornada pela conexão com o banco de dados ($connect->error).
        }

        // Fecha a declaração e a conexão
        $stmt->close();                  //Fecha a declaração preparada, liberando os recursos associados a ela.
                                                    
        $connect->close();                //Fecha a conexão com o banco de dados, liberando os recursos associados a ela.
    } else {
        echo "O nome da categoria é obrigatório."; //Se o campo $nome estiver vazio, exibe uma mensagem indicando que o nome da categoria é obrigatório.
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="adicionar2.css">
    <script src="../javascript.js" defer></script>

</head>

<body>
<header>
        <a href=""  class="LUDO">LUDO FASHION</a>
        <form action="" id="form-buscar">
            <input type="search" name="buscar" id="buscar" placeholder="Buscar...">
            <button type="submit" id="btn-buscar"><img src="imgs/buscar.png" alt=""
                    width="25px" height="25px">
            </button>

        </form>
        <a href="" class="icon-link" id="cadastru">
            <img src="IMGS/icone pessoa.png" alt="" width="50px" height="50px">
            Cadastre-se
            <a href="" class="icon-link" id="duvido">
                <img src="IMGS/help_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="" width="50px" height="50px">
                Dúvidas
                <a href="" class="icon-link" id="casa">
                    <img src="IMGS/casa.png" alt="" width="45px" height="45px">
                    Home
                 </a>
                 <a href="" class="icon-link" id="fav">
                    <img src="IMGS/favorito.png" alt="" width="45px" height="45px">
                    Favoritos
                 </a>
        </a>
    </header>
    
    <a href="categorias.php"><img src="imgs/seta-esquerda.png" alt="" width="70px" class="seta"></a>
    <section>
        

         <div class="add_2">
        <img src="./imgs/mais_branco.png" alt="" width="40px">
        <h1 id="add">Adicionar Categoria</h1>
        </div>
       

        <div class="Categorias">

            <div class="categorias-2">

                <form action="" method="post">
                    <input type="text" name="categoria" id="cate">
                    <button type="submit" id="atualizar" class="adi">Adicionar</button>

                </form>
            </div>
        </div>
    </section>
</body>