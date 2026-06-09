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

/* ADICIONAR PRODUTO */
if(isset($_POST['adicionar'])){

    $produto = $_POST['produto'];
    $preco = $_POST['preco'];

    $_SESSION['carrinho'][] = [
        'produto' => $produto,
        'preco' => $preco
    ];
}

/* REMOVER PRODUTO */
if(isset($_POST['remover'])){

    $indice = $_POST['indice'];

    unset($_SESSION['carrinho'][$indice]);

    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
}

$total = 0;

foreach($_SESSION['carrinho'] as $item){
    $total += $item['preco'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Mercado</title>

<style>

body{
    font-family: Arial;
    background:#f5f5f5;
}

.container{
    width:900px;
    margin:auto;
}

.produtos{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.produto{
    background:white;
    padding:15px;
    width:200px;
    border-radius:10px;
    text-align:center;
}

button{
    background:green;
    color:white;
    border:none;
    padding:10px;
    border-radius:5px;
    cursor:pointer;
}

.carrinho{
    margin-top:30px;
    background:white;
    padding:20px;
    border-radius:10px;
}

</style>

</head>
<body>

<div class="container">

<h1>Produtos</h1>

<div class="produtos">

    <div class="produto">
        <h3>Arroz</h3>
        <p>R$ 25,00</p>

        <form method="POST">
            <input type="hidden" name="produto" value="Arroz">
            <input type="hidden" name="preco" value="25">
            <button type="submit" name="adicionar">
                Adicionar
            </button>
        </form>
    </div>

    <div class="produto">
        <h3>Feijão</h3>
        <p>R$ 10,00</p>

        <form method="POST">
            <input type="hidden" name="produto" value="Feijão">
            <input type="hidden" name="preco" value="10">
            <button type="submit" name="adicionar">
                Adicionar
            </button>
        </form>
    </div>

    <div class="produto">
        <h3>Macarrão</h3>
        <p>R$ 8,00</p>

        <form method="POST">
            <input type="hidden" name="produto" value="Macarrão">
            <input type="hidden" name="preco" value="8">
            <button type="submit" name="adicionar">
                Adicionar
            </button>
        </form>
    </div>

</div>

<div class="carrinho">

<h2>Carrinho</h2>

<?php if(count($_SESSION['carrinho']) > 0){ ?>

    <?php foreach($_SESSION['carrinho'] as $i => $item){ ?>

        <p>
            <?php echo $item['produto']; ?>
            - R$ <?php echo number_format($item['preco'],2,',','.'); ?>

            <form method="POST" style="display:inline;">
                <input type="hidden" name="indice" value="<?php echo $i; ?>">
                <button name="remover">
                    Remover
                </button>
            </form>
        </p>

    <?php } ?>

    <h3>Total: R$ <?php echo number_format($total,2,',','.'); ?></h3>

    <form action="pagamentos.php" method="POST">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <button type="submit">
            Ir para Pagamento
        </button>
    </form>

<?php }else{ ?>

    <p>Carrinho vazio.</p>

<?php } ?>

</div>

</div>

</body>
</html>
