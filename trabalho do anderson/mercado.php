<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

/* CRIA O CARRINHO */

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];
}

/* NOME DO MERCADO */

$nomeMercado = "LAG ATACADÃO";

/* ADICIONAR PRODUTO */

if(isset($_POST['produto'])){

    $produto = [
        "nome" => $_POST['produto'],
        "preco" => $_POST['preco']
    ];

    $_SESSION['carrinho'][] = $produto;
}

/* REMOVER PRODUTO */

if(isset($_POST['remover'])){

    $indice = $_POST['indice'];

    if(isset($_SESSION['carrinho'][$indice])){

        unset($_SESSION['carrinho'][$indice]);

        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    }
}

/* FINALIZAR COMPRA */

$mensagem = "";

if(isset($_POST['finalizar'])){

    if(count($_SESSION['carrinho']) > 0){

        $mensagem = "✅ Compra finalizada com sucesso!";

        $_SESSION['carrinho'] = [];

    }else{

        $mensagem = "⚠️ Seu carrinho está vazio!";
    }
}

/* CALCULAR TOTAL */

$total = 0;

foreach($_SESSION['carrinho'] as $item){
    $total += $item['preco'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $nomeMercado; ?></title>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="topo">

    <div class="logo">
        <?php echo $nomeMercado; ?>
    </div>

    <input
        type="text"
        class="search"
        placeholder="O que você procura?"
    >

    <div class="menu">

        <a href="home.php">
            Mercados
        </a>

        <a href="logout.php">
            Sair
        </a>

    </div>

</div>

<div class="container">

    <h1 class="titulo">
        <?php echo $nomeMercado; ?>
    </h1>

    <div class="produtos">

        <!-- ARROZ -->

        <div class="produto">

            <h3>Arroz 5KG</h3>

            <p>R$ 24,99</p>

            <form method="POST">

                <input
                    type="hidden"
                    name="produto"
                    value="Arroz 5KG"
                >

                <input
                    type="hidden"
                    name="preco"
                    value="24.99"
                >

                <button type="submit">
                    Adicionar
                </button>

            </form>

        </div>

        <!-- FEIJÃO -->

        <div class="produto">

            <h3>Feijão Carioca</h3>

            <p>R$ 9,99</p>

            <form method="POST">

                <input
                    type="hidden"
                    name="produto"
                    value="Feijão Carioca"
                >

                <input
                    type="hidden"
                    name="preco"
                    value="9.99"
                >

                <button type="submit">
                    Adicionar
                </button>

            </form>

        </div>

        <!-- MACARRÃO -->

        <div class="produto">

            <h3>Macarrão</h3>

            <p>R$ 5,49</p>

            <form method="POST">

                <input
                    type="hidden"
                    name="produto"
                    value="Macarrão"
                >

                <input
                    type="hidden"
                    name="preco"
                    value="5.49"
                >

                <button type="submit">
                    Adicionar
                </button>

            </form>

        </div>

        <!-- LEITE -->

        <div class="produto">

            <h3>Leite Integral</h3>

            <p>R$ 6,89</p>

            <form method="POST">

                <input
                    type="hidden"
                    name="produto"
                    value="Leite Integral"
                >

                <input
                    type="hidden"
                    name="preco"
                    value="6.89"
                >

                <button type="submit">
                    Adicionar
                </button>

            </form>

        </div>

        <!-- CAFÉ -->

        <div class="produto">

            <h3>Café</h3>

            <p>R$ 14,90</p>

            <form method="POST">

                <input
                    type="hidden"
                    name="produto"
                    value="Café"
                >

                <input
                    type="hidden"
                    name="preco"
                    value="14.90"
                >

                <button type="submit">
                    Adicionar
                </button>

            </form>

        </div>

    </div>

</div>

<!-- CARRINHO -->

<div class="carrinho">

    <h2>Carrinho</h2>

    <?php

    if(count($_SESSION['carrinho']) > 0){

        foreach($_SESSION['carrinho'] as $indice => $item){

            echo "<div style='margin-bottom:15px;'>";

            echo "<p>";
            echo $item['nome'];
            echo " - R$ ";
            echo number_format($item['preco'],2,',','.');
            echo "</p>";

            ?>

            <form method="POST">

                <input
                    type="hidden"
                    name="indice"
                    value="<?php echo $indice; ?>"
                >

                <button
                    type="submit"
                    name="remover"
                    style="
                        background:red;
                        color:white;
                        border:none;
                        padding:6px 12px;
                        border-radius:6px;
                        cursor:pointer;
                        margin-top:5px;
                    "
                >
                    Remover
                </button>

            </form>

            <?php

            echo "</div>";
        }

    }else{

        echo "<p>Carrinho vazio</p>";
    }

    ?>

    <hr>

    <p>

        <strong>
            Total: R$ <?php echo number_format($total,2,',','.'); ?>
        </strong>

    </p>

    <form method="POST">

        <button
            type="submit"
            name="finalizar"
            class="comprar"
        >
            FINALIZAR COMPRA
        </button>

    </form>

    <p style="margin-top:15px;font-weight:bold;">
        <?php echo $mensagem; ?>
    </p>

</div>

</body>
</html>