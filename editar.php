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
        <button id="button"><img src="../imgs/test.png" alt="" width="30px" onclick="barra_lateral()" id="btn-lateral"></button>
        <h1>LudoFashion</h1>
        <form action="" id="form-buscar">
            <input type="search" name="buscar" id="buscar" placeholder="buscar..."></input>
            <button type="submit" id="btn-buscar"><img src="../imgs/buscar.png" alt="" width="30px"></button>
        </form>
        <a href="../views/Cad.html" class="icon-link"><img src="./imgs/cadastro.png.png" alt="" width="40px"> Cadastre-se</a>
        <a href="../views/duvida.html" class="icon-link"> <img src="./imgs/ajuda.png.png" alt="" width="40px"> Dúvidas</a>
        <a href="../views/Minha lista de desejo.html" class="icon-link"> <img src="./imgs/wishlist.png" alt="" width="40px"> Favoritos</a>
        <a href="../views/Perfil.html" class="icon-link"> <img src="./imgs/perfil.png" alt="" width="40px"> Perfil</a>
       

    </header>
    <nav class="versao-mobile" id="versao-mobile">
        <a href="../views/Cad.html" class=""><img src="./imgs/cadastro.png.png" alt="" width="40px"> Cadastrar</a>
        <a href="../views/duvida.html" class=""> <img src="./imgs/ajuda.png.png" alt="" width="40px"> Dúvidas</a>
        <a href="../views/Minha lista de desejo.html" class=""> <img src="./imgs/wishlist.png" alt="" width="40px">Favoritos</a>
        <a href="../views/Perfil.html" class=""> <img src="./imgs/perfil.png" alt="" width="40px"> Perfil</a>
        <a href="../views/catálogo.html"><img src="./imgs/catalogue.png" alt="" width="40px"> Catálogo</a>
        <a href="../views/sobre a loja.html"><img src="./imgs/info.png" alt="" width="40px">Sobre a Loja</a>
    </nav>
    <nav>
        <a href="../views/catálogo.html">Catálogo</a>
        <a href="../views/sobre a loja.html">Sobre a Loja</a>


    </nav>
   
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

               