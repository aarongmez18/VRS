<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Favicon -->
    <link rel="shortcut icon" href="../View/IMG/VRS2.png" type="image/x-icon">
    <!-- CSS Generales -->
    <link rel="stylesheet" href="../View/CSS/footer.css" />
    <link rel="stylesheet" href="../View/CSS/navbar.css" />
    <!-- CSS de la página -->
    <link rel="stylesheet" href="../View/CSS/index.css">
    <link rel="stylesheet" href="../View/CSS/cards.css">


    <!-- Bootstrap -->
    <link rel="stylesheet" href="../View/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Varosi &copy;</title>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="menu-container">
        <!-- Burger menu -->
        <input type="checkbox" aria-label="Toggle menu" />
        <span></span>
        <span></span>
        <span></span>

        <!-- Logo -->
        <a href="#" class="menu-logo"><img src="../View/IMG/VRS2.png" alt="Varosies" width="50px" /></a>

        <!-- Enlaces -->
        <div class="menu">
            <ul>
                <li><a href="../Controller/collections.php"> Colecciones </a></li>
                <li><a href="../View/contactanos.php"> Contactanos </a></li>
            </ul>
            <!-- Iconos enlaces -->
            <ul>
                <li><a href="../Controller/wishlist.php"><i class="bi bi-search-heart"></i></a></li>
                <li><a href="../Controller/carrito.php"><i class="bi bi-bag"></i></a></li>
                <li><a href="../Controller/login.php" target="_blank"><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </div>
    </nav>
    <!-- Descuento mensaje -->
    <div class="descuento-container">
        <marquee direction="left">Disfruta de nuestros productos con un descuento del 25% hasta el final de semana.</marquee>
    </div>

    <!-- Carousel -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel"
        style="max-height: 80vh; overflow: hidden;">
        <div class="carousel-inner">
            <div class="carousel-item active"><img src="../View/IMG/carrousel2.webp" class="d-block w-100" alt="Moda">
            </div>
            <div class="carousel-item"><img src="../View/IMG/carrousel3.jpeg" class="d-block w-100" alt="Nuevo Drop">
            </div>
            <div class="carousel-item"><img src="../View/IMG/carrousel1.webp" class="d-block w-100" alt="Urbano"></div>
        </div>
    </div>






    <!-- Contenedores Cards -->
    <main class="container-fluid">
        <!-- Información Contenedores -->
        <div class="enlaces-cards">
            <p class="titulo-cards">DESCUBRE</p>
            <a href="../Controller/collections.php">Más</a>
        </div>
        <!-- Contenedor de la alerta -->
         <div class="contenedor__alertas">
            <div id="custom-alert" class="custom-alert hidden">
                Producto añadido al carrito.
            </div>
            <div id="custom-alert" class="custom-alert hidden">
                Producto añadido a la lista de deseos.
            </div>
         </div>
<!-- 4 Productos aleatorios -->
<div class="contenedor__cards">

 <?php
  foreach ($productos as $producto) {
    echo '<div class="product-card">';
    echo '<img src="'.$producto->getImagen().'" alt="'.$producto->getNombre().'" class="product-image">';
    echo '<div class="product-info">';
    echo '<h3 class="product-name">'.$producto->getNombre().'</h3>';
    echo '<p class="product-price">'.$producto->getPrecio().'€</p>';
    echo '<a class="add-to-cart-btn" href="../Controller/detalleProducto.php?id='.$producto->getId().'"><i class="bi bi-arrow-up-circle"></i></a>';
    ?>
    <button id="wishlist-btn-<?php echo $producto->getId(); ?>" class="add-to-cart-btn" onclick="toggleWishlist(<?php echo $userId; ?>, <?php echo $producto->getId(); ?>)"><i class="bi bi-heart"></i></button>
    <?php 
    echo '</div>';
    echo '</div>';

  } 
 ?>
            </div>

 </div>



    </main>

    <section class="container-fluid contenedor__promocional">
        
        <div class="texto__promocional">
            <h2>NEWLESTTER</h2>
            <p>20% Descuento al registrarte en nuestro tablon de promociones.</p>
            <input type="email" name="promocion_emeal" id="emeal" placeholder="Inserta tu email">
        </div>

    </section>


    <section class="container-fluid contenedor__eslogan">
        <h1>"Varosi: Style that redefines your presence."</h1>
        <img src="../View/IMG/logo.png" alt="Varosies"  />
    </section>






    <!-- Footer -->

    <footer class="footer__container">
        <h4 class="footer__title">Varosi Urban Style</h4>
        <section class="footer__section">
            <div class="footer__contact">
                <p class="footer__tp">SUPPORT</p>
                <p>
                    <a href="mailto:helpvrs@varosi.com">vrs@varosi.com</a>
                </p>
                <!-- <p><i class="bi bi-telephone-fill"></i> +34 611 42 40 82</p> -->
            </div>
            <div class="footer__politics">
                <p class="footer__tp">POLICIES</p>
                <p>
                    <a href="../View/Policies/termsCondicions.html">Terms and Conditions</a>
                </p>
                <p>
                    <a href="../View/Policies/devoluciones.html">Devolutions Policy</a>
                </p>
                <p><a href="../View/Policies/cookies.html">Cookie Policy</a></p>
                <p><a href="../View/Policies/privacidad.html">Privacy Policy</a></p>
            </div>
            <div class="footer__social-media">
                <a href="#"><i class="bi bi-tiktok"></i></a>
                <a href="https://www.instagram.com/varosies/?utm_source=ig_web_button_share_sheet"><i
                        class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
            </div>
        </section>
        <section class="footer__bottom">
            <p>&copy; 2024 Varosi Urban Style. All rights reserved.</p>
        </section>
    </footer>
</body>

</html>

<!-- Javascript Bootstrap -->
<script src="../View/dist/js/bootstrap.bundle.min.js"></script>
<script src="../View/JS/agregarAjax.js"></script>