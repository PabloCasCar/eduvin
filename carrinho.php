<?php 
include('ligacao.php');
include('cabecalho.php');
include('confirm_compra.php');


function resumoCarrinho() {
    $cart = $_SESSION['carrinho'] ?? array();
 
    if (empty($cart)) {
        return '<p>Não existem elementos no carrinho de momento</p>';
    } else {
        $items = count($cart);
        $s = ($items > 1) ? 's' : '';
        return '<p>Você tem <a href="cart.php">'.$items.' item'.$s.' no carrinho</a></p>';
    }
}
 
function alteracoesCarrinho() {
    $carrinho = $_SESSION['carrinho'] ?? array();
 
    if (isset($_POST['acao'])) {
        $action = $_POST['acao'];
        $prod = addslashes($_POST['id']);
 
        switch ($action) {
            case 'add':
                if (isset($carrinho[$prod])) {
                    $carrinho[$prod] += 1;
                } else {
                    $carrinho[$prod] = 1;
                }
                break;
 
            case 'delete':
                if (isset($carrinho[$prod])) {
                    unset($carrinho[$prod]);
                }
                break;
 
            case 'update':
                foreach ($_POST as $key => $value) {
                    if (stristr($key, 'qty')) {
                        $id = addslashes(str_replace('qty', '', $key));
                        $carrinho[$id] = $value;
                    }
                }
                break;
        }
        $_SESSION['carrinho'] = $carrinho;
    }
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    alteracoesCarrinho();
    header("Location: carrinho.php");
    exit();
}

function getProdutoInfo($id) {
    global $ligacao;
    $sql = "SELECT * FROM produtos WHERE id='$id'";
    $result = $ligacao->query($sql);
    return $result->fetch_assoc();
}

$carrinho = $_SESSION['carrinho'] ?? array();
$total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cart-container">
        <h1>Seu Carrinho</h1>
        <?php if (empty($carrinho)): ?>
            <p>Não existem elementos no carrinho de momento</p>
        <?php else: ?>
            <form action="carrinho.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Total</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrinho as $id => $qty): 
                            $produto = getProdutoInfo($id);
                            $subtotal = $produto['preco'] * $qty;
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo $produto['nome']; ?></td>
                                <td><input type="number" name="qty<?php echo $id; ?>" value="<?php echo $qty; ?>" min="1"></td>
                                <td><?php echo number_format($produto['preco'], 2); ?>€</td>
                                <td><?php echo number_format($subtotal, 2); ?>€</td>
                                <td>
                                    <button type="submit" name="acao" value="update">Atualizar</button>
                                    <button type="submit" name="acao" value="delete" onclick="document.getElementsByName('id')[0].value='<?php echo $id; ?>'">Remover</button>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Total</td>
                            <td><?php echo number_format($total, 2); ?>€</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>

