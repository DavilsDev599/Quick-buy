<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home - Quick Buy</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- TOPO -->

    <div class="topo">

        <div class="logo">
            Quick Buy
        </div>

        <input 
            type="text" 
            class="search" 
            placeholder="O que você procura?"
        >

        <div class="menu">

            <a href="#">
                Minha Conta
            </a>

            <a href="#">
                Favoritos
            </a>

            <a href="logout.php">
                Sair
            </a>

        </div>

    </div>

    <!-- CONTEÚDO -->

    <div class="container">

        <h1 class="titulo">
            COMPRE NO CONFORTO DE CASA
        </h1>

        <!-- MERCADOS -->

        <div class="cards">

            <!-- MERCADO 1 -->

            <div class="card">

                <img 
                    src="img/logo.png" 
                    alt="Mercado"
                >

                <h2>Lag Atacadão</h2>

                <a href="mercado.php">

                    <button>
                        ACESSAR
                    </button>

                </a>

            </div>

            <!-- MERCADO 2 -->

            <div class="card">

                <img 
                    src="img/logo2.png" 
                    alt="Mercado"
                >

                <h2>Super Econômico</h2>

                <a href="mercado.php">

                    <button>
                        ACESSAR
                    </button>

                </a>

            </div>

            <!-- MERCADO 3 -->

            <div class="card">

                <img 
                    src="img/logo3.png" 
                    alt="Mercado"
                >

                <h2>Mix Center</h2>

                <a href="mercado.php">

                    <button>
                        ACESSAR
                    </button>

                </a>

            </div>

            <!-- MERCADO 4 -->

            <div class="card">

                <img 
                    src="img/logo4.png" 
                    alt="Mercado"
                >

                <h2>Mercadão Brasil</h2>

                <a href="mercado.php">

                    <button>
                        ACESSAR
                    </button>

                </a>

            </div>

        </div>

    </div>

</body>
</html>