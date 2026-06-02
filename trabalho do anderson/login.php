<?php
session_start();

include("includes/conexao.php");

if(isset($_POST['entrar'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios 
            WHERE email='$email' 
            AND senha='$senha'";

    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $_SESSION['usuario'] = $email;

        header("Location: home.php");
        exit();

    }else{

        $erro = "Email ou senha inválidos!";

    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - Quick Buy</title>

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

        </div>

    </div>

    <!-- LOGIN -->

    <div class="container">

        <h1 class="titulo">
            ACESSE SUA CONTA
        </h1>

        <div class="box-login">

            <?php
            if(isset($erro)){
                echo "<p style='color:red; text-align:center;'>$erro</p>";
            }
            ?>

            <form method="POST" action="login.php">

                <input
                    type="email"
                    name="email"
                    class="input"
                    placeholder="Digite seu email"
                    required
                >

                <input
                    type="password"
                    name="senha"
                    class="input"
                    placeholder="Digite sua senha"
                    required
                >

                <button
                    type="submit"
                    name="entrar"
                    class="botao"
                >
                    ENTRAR
                </button>

            </form>

        </div>

    </div>

</body>
</html>