<?php include('ligacao.php');?>
<?php
 
include('ligacao.php');
 
function resumoCarrinho() {
    $cart = $_SESSION['carrinho'];
 
    if (!$cart) {
        return '<p>Não existem elementos no carrinho de momento</p>';
    } else {
        $items = count($cart);
        $s = ($items > 1) ? 's' : '';
        return '<p>Você tem <a href="cart.php">'.$items.' item'.$s.' no carrinho</a></p>';
    }
}
 
function alteracoesCarrinho() {
    $carrinho = array();
 
    if (isset($_SESSION['carrinho']))
        $carrinho = $_SESSION['carrinho'];
 
    if (isset($_POST['acao'])) {
        $action = $_POST['acao'];
        $prod = addslashes($_POST['id']);
 
        switch ($action) {
            case 'add':
                if ($carrinho[$prod]) {
                    $carrinho[$prod] += 1;
                } else {
                    $carrinho[$prod] = 1;
                }
                break;
 
            case 'delete':
                if ($carrinho[$prod]) {
                    $carrinho[$prod] = NULL;
                    unset($carrinho[$prod]);
                }
                break;
 
            case 'update':
                if ($carrinho) {
                    $newcarrinho = '';
                    foreach ($_POST as $key => $value) {
                        if (stristr($key, 'qty')) {
                            $id = addslashes(str_replace('qty', '', $key));
                            $newcarrinho[$id] = $value;
                        }
                    }
                }
                $carrinho = $newcarrinho;
                break;
        }
        $_SESSION['carrinho'] = $carrinho;
    }
}
 
if($_SERVER['REQUEST_METHOD']=='POST') {
 
alteracoesCarrinho();
 
header("Location: index.php");
}
 
?>