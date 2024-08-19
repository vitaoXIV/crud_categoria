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
    <link rel="stylesheet" href="categoria2.css">
  
   
 
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
    <nav>
        <a href="">Catálogo</a>
        <a href="">Sobre a Loja</a>
    </nav>

        <div class="inicio">
            <h1>CATEGORIAS</h1>
            <img src="imgs/categoria.png" alt="" width="40px">
        </div>

    <section>
        
        <div class="Categorias">
            <?php foreach ($result as $item): ?> <!--  Inicia um loop que itera sobre cada item no resultado da consulta SQL.-->
                <div class="categorias-2"> <!-- Define um contêiner para cada categoria.-->

                    <form action="" method="post" class="furm"> <!-- Cria um formulário para editar a categoria. -->

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
                <img src="imgs/mais_branco.png" alt="" width="10px"><a href="adicionar_categoria.php">Adicionar Categoria</a>
            </div>
        </div>
    </section>
</body>