<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

$total = $_POST['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pagamento</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#f5f5f5;
    text-align:center;
}

.container{
    width:500px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

button{
    background:green;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:5px;
    cursor:pointer;
}

input, select{
    width:100%;
    padding:10px;
    margin-top:10px;
    margin-bottom:15px;
    box-sizing:border-box;
}

</style>

</head>
<body>

<div class="container">

    <h1>Pagamento</h1>

    <h2>
        Total: R$ <?php echo number_format($total,2,',','.'); ?>
    </h2>

    <form action="confirmar.php" method="POST">

        <input
            type="hidden"
            name="total"
            value="<?php echo $total; ?>"
        >

        <select id="metodo" name="pagamento" required>
            <option value="">Escolha o pagamento</option>
            <option value="pix">PIX</option>
            <option value="cartao">Cartão de Crédito</option>
            <option value="boleto">Boleto</option>
        </select>

        <div id="dadosPagamento"></div>

        <button type="submit">
            CONFIRMAR PAGAMENTO
        </button>

    </form>

</div>

<script>

const metodo = document.getElementById("metodo");
const dados = document.getElementById("dadosPagamento");

metodo.addEventListener("change", function(){

    if(this.value === "pix"){

        dados.innerHTML = `
            <h3>PIX</h3>
            <p>Chave PIX:</p>
            <input
                type="text"
                value="quickbuy@pix.com"
                readonly
            >
        `;

    }else if(this.value === "cartao"){

        dados.innerHTML = `
            <input
                type="text"
                placeholder="Número do Cartão"
                required
            >

            <input
                type="text"
                placeholder="Nome no Cartão"
                required
            >

            <input
                type="text"
                placeholder="Validade"
                required
            >

            <input
                type="text"
                placeholder="CVV"
                required
            >
        `;

    }else if(this.value === "boleto"){

        dados.innerHTML = `
            <h3>Boleto Gerado</h3>

            <input
                type="text"
                value="23790.12345 67890.123456 78901.123456 1 99990000010000"
                readonly
            >
        `;

    }else{

        dados.innerHTML = "";

    }

});

</script>

</body>
</html>