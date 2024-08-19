<?php
// Pra conectar com o banco//  
require 'conexoes.php';
      
$sql = "SELECT * FROM categoria"; 
 //Seleciona todas a tabelas de categoria
$stmt = $connect->prepare($sql);
//Conecta e prepara a consulta SQL para execução//    
$stmt->execute();
//Executa a declaração preparada//  

$result = $stmt->get_result();
//Obtém o resultado da execução da consulta//
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/categoria2.css">
  
   
 
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

                    <form action="deletar.php?id=<?= ($item['id_categoria']); ?>" method="post" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?')">
                        <!-- Cria um formulário para deletar a categoria, com uma confirmação antes da exclusão.-->
                        <button type="submit" name="excluir" id="deletar"><img src="./imgs/lixeira.png" alt="" width="40px"></button>
                    </form>
                    <!-- Cria um botão de envio para o formulário de exclusão, com um ícone de lixeira. -->
                </div>
            <?php endforeach; ?>
            <div class="adicionar">
                <img src="imgs/mais_branco.png" alt="" width="25px"><a href="adicionar.php">Adicionar Categoria</a>
            </div>
        </div>
    </section>
</body>