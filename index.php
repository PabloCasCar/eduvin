<?php
  include('ligacao.php');
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eduvin</title>
        <link rel="stylesheet" href="style.css">
        <script src="js/slideshow.js" defer></script>
    </head>
    <body>
        
    <?php include_once('menu.php');?>

    <?php include('cabecalho.php');?>

        
        <section id="inicio">
            <img class="slideEduvin" src="images/istockphoto-1360684256-612x612.jpg" alt="Slide1">
            <img class="slideEduvin" src="images/vintage-1595623922.jpg" alt="Slide2">
            <img class="slideEduvin" src="images/vintage-london.jpg" alt="Slide3">
            <img class="slideEduvin" src="images/vintage.jpg" alt="Slide4">
        </section>
        
        <section id="roupas">
            <hr>
            <h1>Roupas</h1>
            <a href="">
                <div id="cards">
                <div class="card_tshirts">
                    <img src="images/tshirts.png" alt="t-shirts">
                    <div class="card_container">
                        <h4>T-shirts Vintage</h4>
                        <p>T-shirts do tamanho xs até ao xxl</p>
                        <span class="preço"><p>20€</p></span>
                    </div>
            </a>
        
                </div>
            <a href="">
                <div class="card_calcas">
                    <img src="images/calcas.png" alt="calcas">
                    <div class="card_container">
                        <h4>Calças Vintage</h4>
                        <p>Calças do tamanho 30 até ao 50</p>
                        <span class="preço"><p>30€</p></span>
                    </div>
                </a>
                
            </div>
                <a href="">
                    <div class="card_casacos">
                    <img src="images/casaco.png" alt="casacos">
                    <div class="card_container">
                        <h4>Casacos Vintage</h4>
                        <p>Casacos do tamanho xs até ao xxl</p>
                        <span class="preço"><p>35€</p></span>
                    </div>
                </a>
            </div>
            <hr>
        </section>
    
        <section id="acessorios">
            <h1>Acessórios e Calçados</h1>
            <a href="">
                <div class="card_acessorios">
                <img src="images/acessorios.png" alt="T-shirts">
                <div class="card_container">
                    <h4>Acessorios Vintage</h4>
                    <p>Acessorios: Aneis, correntes, pulseiras e brincos</p>
                    <span class="preço"><p>10€</p></span>
                </div>
            </a>
        </div>
            <a href="">
                <div class="card_acessorios">
                <img src="images/sapatilhas-p-6000-2FBrXk.png" alt="T-shirts">
                <div class="card_container">
                    <h4>Calçados Vintage</h4>
                    <p>Calçados: 20 até o 50</p>
                    <span class="preço"><p>60€-150€</p></span>
                </div>
                </a>
            </div>
            <hr>
        </section>
    
        <section id="sobrenos">
            <h1>Sobre nós</h1>
            <div class="linha">
                <div class="coluna"><span class="text"><li> Somos uma pequena empresa de roupas antigas fundada em 2023, onde vendemos diversas peças de roupas que eram muito utilizadas nos anos 80, 90 e 2000.</li></span></div>
                <div class="coluna"><a href="#"><img id="sede" src="images/1-est-giorno.png" alt="Eduvin's logo"></a></div>
            </div>
            <hr>
        </section>
        
        <section id="contactos">
            <h1>Contactos</h1>
            <span class="text"><li>edu@eduvintage.com | +351 925328117 | Rua Joaquim Rodrigues, nº15</li></span>
        </section>

        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>  