<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Escolha de Login - Quick Buy</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- TOPO -->

    <div class="topo">

        <div class="logo">
            Quick Buy
        </div>

        <div class="menu">

            <a href="index.php">
                INÍCIO
            </a>

            <a href="#">
                CONTATO
            </a>

            <a href="#">
                SUPORTE
            </a>

        </div>

    </div>

    <!-- CONTEÚDO -->

    <div class="container">

        <h1 class="titulo">
            COMPRE À VONTADE SEM ESTRESSE
        </h1>

        <div class="cards">

            <!-- CLIENTE -->

            <div class="card">

                <h2>
                    ACESSO PARA CLIENTES
                </h2>

                <p style="margin-top:15px;">

                    Faça login para acessar os mercados,
                    produtos e acompanhar seus pedidos.

                </p>

                <a href="login.php">

                    <button style="margin-top:20px;">

                        ENTRAR

                    </button>

                </a>

            </div>

            <!-- MERCADOS -->

            <div class="card">

                <h2>
                    ACESSO PARA MERCADOS
                </h2>

                <p style="margin-top:15px;">

                    Área exclusiva para mercados parceiros.

                </p>

                <a href="#">

                    <button style="margin-top:20px;">

                        ACESSAR

                    </button>

                </a>

            </div>

        </div>

    </div>

</body>
</html>