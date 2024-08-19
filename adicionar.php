<?php
require 'conexoes.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    //metodo do modo POST. Só garante que formulário foi enviado via POST.
 
    $nome = $_POST['categoria'];
    // Pega o VALUES do campo de form com o nome categoria e armazena na variável $nome.//
    

    // Verifica se o campo de nome não está vazio//

    if (!empty($nome)) { // Verifica se  $nome não ta empty. O !empty retorna true se a variável estiver vazia//
    
        // Prepara a consulta SQL para inserir a nova categoria 
        $sql = "INSERT INTO categoria (nome) VALUES (?)";      
        $stmt = $connect->prepare($sql); 
        //Prepara a consulta SQL para execução, esse connect é para se conectar com o banco//
        $stmt->bind_param("s", $nome);
        //"s" significa que o parametro é string//   
        
        
         // Responsavel pela execução e consulta//  

        if ($stmt->execute()) { 
             //Se der certo, o bloco de código dentro do if será executado.//  
           
            header('location:categorias.php');
            //ir para categorias.php// 
        } else {
            echo "Erro ao adicionar categoria, tente de novo. " . $connect->error;
            //Se der errado , mostra uma mensagem de erro//
        }

        // Responsável por fechar a declaração e a conexão//

        $stmt->close();
        //Fecha a declaração preparada/ 
                                                    
        $connect->close();
        //Fecha a conexão com o banco de dados,// 
    } else {
        echo "Obrigatório."; 
        //Se o campo $nome estiver vazio, exibe uma mensagem indicando que o nome da categoria é obrigatório.
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="css/styles.css">
    
    <link rel="stylesheet" href="css/adicionar2.css">
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

                <form action="" method="post"  class="pust">
                    <input type="text" name="categoria" id="cate">
                    <button type="submit" id="atualizar" class="adi">ADICIONAR</button>

                </form>
            </div>
        </div>
    </section>
</body>