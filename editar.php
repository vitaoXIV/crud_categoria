<?php
require 'conexoes.php';

if (!isset($_GET['id'])) {
    // Verifica se o parâmetro id foi passado na URL via método GET//
    die("ID da categoria obrigatório.");
    // Se ID não for definido, o die encerra a execução e mostra "ID da categoria obrigatório." 

}

$id = intval($_GET['id']);
//Transforma o valor de id para um número int//

// Obtém os detalhes da categoria//
$sql = "SELECT * FROM categoria WHERE id_categoria = ?";
$stmt = $connect->prepare($sql);
//Prepara a consulta SQL para execução//
$stmt->bind_param("i", $id);
//"i" de int, vincula a variável $id ao marcador de posição ? na consulta SQL//          

$stmt->execute();
//executa//
$result = $stmt->get_result();
//pega os resultados de "$stmt"//
$categoria = $result->fetch_assoc();
// Pega a próxima linha do resultado como um array associativo.//
  //Se  a categoria com id existir ,suas informações são jogadas no $categoria.//

if (!$categoria) {
    //Verifica se $categoria é false ou não contém dados//                        
    die("Categoria não encontrada.");
    //se for false, exibe essa mensagem de erro//
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

   
    $sql = "UPDATE categoria SET nome = ? WHERE id_categoria = ?";
     // Atualiza para a nova no banco de dados//
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("si", $nome, $id);
    // Vincula o $nome e $id aos marcadores de posição na consulta SQL//
    //"si" de string e "id" um numero int//
    $stmt->execute();

   
    header('Location:categorias.php');
    //redireciona para pagina inicial//
 
}


?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/editar.css">
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

        <div class="lapizera">
        <img src="imgs/lapis_branco.png" alt="" width="40px">
        <h1 id="editar_categoria">Editar Categoria</h1>
        </div>
   
        <div class="Categorias">
            <span class="categorias-2">

                <form action="" method="post">
                    <input type="text" name="nome" id="cate" value="<?php echo htmlspecialchars($categoria['nome']); ?>"> 
                    <button type="submit" name="atualizar" id="atualizar">ATUALIZAR</button>
                    
                </form>
            </span>

               