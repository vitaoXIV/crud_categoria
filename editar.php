<?php
require 'conexoes.php';

if (!isset($_GET['id'])) {
    die("ID da categoria não fornecido."); //if (!isset($_GET['id'])) {: Verifica se o parâmetro id foi passado na URL via método GET. Se não estiver definido, o script termina a execução e exibe a mensagem "ID da categoria não fornecido."

}

$id = intval($_GET['id']);  //Converte o valor do parâmetro id para um número inteiro. Isso ajuda a garantir que o valor seja tratado como um número ao interagir com o banco de dados e reduz o risco de injeção de SQL.

// Obtém os detalhes da categoria
$sql = "SELECT * FROM categoria WHERE id_categoria = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);           //Vincula a variável $id ao marcador de posição ? na consulta SQL. O "i" indica que o parâmetro é um inteiro.
 //Prepara a consulta SQL para execução. $connect é o objeto de conexão com o banco de dados, e prepare retorna um objeto de declaração preparada ($stmt).
$stmt->execute();
$result = $stmt->get_result();
$categoria = $result->fetch_assoc();//$result->fetch_assoc();: Obtém a próxima linha do resultado como um array associativo. Se a categoria com o ID fornecido existir, seus detalhes serão armazenados em $categoria.

if (!$categoria) {                         //if (!$categoria) {: Verifica se $categoria é false ou não contém dados (significa que a categoria com o ID fornecido não foi encontrada). Se for o caso, o script termina a execução e exibe a mensagem "Categoria não encontrada."
    die("Categoria não encontrada.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    // Atualiza a categoria no banco de dados
    $sql = "UPDATE categoria SET nome = ? WHERE id_categoria = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("si", $nome, $id);  //$stmt->bind_param("si", $nome, $id);: Vincula as variáveis $nome e $id aos marcadores de posição na consulta SQL. O "si" indica que $nome é uma string e $id é um inteiro.
    $stmt->execute();

   
    header('Location:categorias.php');

}


?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="editar.css">
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
                    <button type="submit" name="atualizar" id="atualizar">Atualizar</button>
                    
                </form>
            </span>

               