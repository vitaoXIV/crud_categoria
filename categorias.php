<?php
require 'conexoes.php';            // conexao com o banco de dados
$sql = "SELECT * FROM categoria";   //$sql = "SELECT * FROM categoria";: Define a consulta SQL que será usada para buscar todos os registros da tabela categoria. O comando SELECT * seleciona todas as colunas da tabela.
$stmt = $connect->prepare($sql);    //$stmt: É uma variável que representa um objeto de declaração preparada (statement) criado com o método prepare() da classe mysqli. Esse objeto é usado para executar consultas SQL de forma segura, prevenindo ataques como injeção de SQL.$stmt = $connect->prepare($sql);: Prepara a consulta SQL para execução. $connect é o objeto de conexão com o banco de dados e prepare é um método da classe mysqli que cria uma declaração preparada, prevenindo ataques como injeção de SQL.
$stmt->execute(); //$stmt->execute();: Executa a declaração preparada. Isso faz com que a consulta SQL seja enviada ao banco de dados e executada.

$result = $stmt->get_result(); //$result = $stmt->get_result();: Obtém o resultado da execução da consulta. $result será um objeto mysqli_result que contém todos os registros retornados pela consulta.
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="styles.css">
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
        <h1 id="categorias-tit1"> <img src="./imgs/categoria.png" alt="" width="40px">Categorias</h1>
        <div class="Categorias">
            <?php foreach ($result as $item): ?> <!--  Inicia um loop que itera sobre cada item no resultado da consulta SQL.-->
                <div class="categorias-2"> <!-- Define um contêiner para cada categoria.-->

                    <form action="" method="post"> <!-- Cria um formulário para editar a categoria. -->

                        <a><?php echo htmlspecialchars($item['nome']); ?></a>

                        <a href="editar.php?id=<?= ($item['id_categoria']); ?>"><img src="./imgs/editar.png" alt="" width="40px"></a>
                    </form> <!--  Cria um link para editar a categoria, com um ícone de edição.-->

                    <form action="deletar_categoria.php?id=<?= ($item['id_categoria']); ?>" method="post" onsubmit="return confirm('Deseja excluir essa categoria?')">
                        <!-- Cria um formulário para deletar a categoria, com uma confirmação antes da exclusão.-->
                        <button type="submit" name="excluir" id="deletar"><img src="./imgs/lixeira.png" alt="" width="40px"></button>
                    </form>
                    <!-- Cria um botão de envio para o formulário de exclusão, com um ícone de lixeira. -->
                </div>
            <?php endforeach; ?>
            <div class="adicionar">
                <img src="./imgs/mais.png" alt="" width="50px"><a href="adicionar_categoria.php">Adicionar Categoria</a>
            </div>
        </div>
    </section>
</body>