<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../View/IMG/VRS2.png" type="image/x-icon">
	<!-- CSS Generales -->
	<link rel="stylesheet" href="../View/CSS/footer.css">
	<link rel="stylesheet" href="../View/CSS/navbar.css">
	<!-- CSS De la Pagina -->
	<link rel="stylesheet" href="../View/CSS/detalle.css">



	<!-- Bootstrap -->
	<link rel="stylesheet" href="../View/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Varosi Product</title>
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
        <a href="../View/load.php" class="menu-logo">
            <img src="../View/IMG/VRS2.png" alt="Varosies" width="50px" />
        </a>

        <!-- Enlaces -->
        <div class="menu">
            <ul>
                <li><a href="../Controller/collections.php"> Coleccion </a></li>
                <li><a href="../View/contactanos.php"> Contactanos </a></li>
            </ul>
            <!-- Iconos enlaces -->
            <ul>
                <li>
                    <a href="../Controller/wishlist.php"><i class="bi bi-search-heart"></i></a>
                </li>
                <li>
                    <a href="../Controller/carrito.php"><i class="bi bi-bag"></i></a>
                </li>
                <li>
                    <a href="../Controller/register.php" target="_blank"><i class="bi bi-person-circle"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Descuento mensaje -->
    <div class="descuento-container">
        <marquee direction="right">Todos nuestros envios son totalmente gratuitos</marquee>
    </div>

     <!-- Contenido de la página -->
      <main class="contenedor mb-5">
        <div class="product-header">
            <!-- Imagen del producto -->
            <img src="<?php echo $datosProducto->getImagen(); ?>" alt="Imagen del producto">
            
            <!-- Información del producto -->
            <div class="product-info">
                <h1><?php echo $datosProducto->getNombre();?></h1>
                <div class="price">
                   Precio: <?php echo $datosProducto->getPrecio(); ?> €
                </div>

                <div class="tallaje">
                    <p>Corte oversize para conseguir un estilo urbano y la mácima comodidad</p>
                    <p>Felpa perchada para ofrecer un confort óptimo</p>
                    <p>80% algodón / 20% poliéster. Granaje 280g/m2</p>
                    <div class="options">
                    <div class="color-size-row">
                        <!-- Titulos -->
                        <p>Color:</p>
                        <p>Talla:</p>
                    </div>

                    <div class="color-size-row">
                        <!-- Opciones de color -->
                        <div class="color-options">
                            <div class="color-option">
                                <input type="radio" id="color1" name="color" checked>
                                <label for="color1"><span style="background-color: black;"></span></label>
                            </div>
                            <div class="color-option">
                                <input type="radio" id="color2" name="color">
                                <label for="color2"><span style="background-color: whitesmoke;"></span></label>
                            </div>
                            <div class="color-option">
                                <input type="radio" id="color3" name="color">
                                <label for="color3"><span style="background-color: maroon;"></span></label>
                            </div>
                        </div>

                        <!-- Opciones de tallas -->
                        <div class="size-options">
                            <div class="size-option">
                                <input type="radio" id="size1" name="size" checked>
                                <label for="size1">XS</label>
                            </div>
                            <div class="size-option">
                                <input type="radio" id="size2" name="size">
                                <label for="size2">S</label>
                            </div>
                            <div class="size-option">
                                <input type="radio" id="size3" name="size">
                                <label for="size3">M</label>
                            </div>
                            <div class="size-option">
                                <input type="radio" id="size4" name="size">
                                <label for="size4">L</label>
                            </div>
                            <div class="size-option">
                                <input type="radio" id="size5" name="size">
                                <label for="size5">XL</label>
                            </div>
                        </div>
                </div>
            </div>
        </div>
                <!-- Contenedor de la alerta -->
         <div class="contenedor__alertas">
            <div id="custom-alert" class="custom-alert hidden">
                Producto añadido a la lista de deseos.
            </div>
         </div>

        <!-- Botones y enlaces -->
         <div class="product-buttons my-5">
         <button class="add-to-cart-btn" onclick="addToCart(<?php echo $user; ?>, <?php echo $datosProducto->getId(); ?>)"><i class="bi bi-bag-fill"></i></button>
            <button id="wishlist-btn-<?php echo $datosProducto->getId(); ?>" class="add-to-cart-btn mx-5" onclick="toggleWishlist(<?php echo $user; ?>, <?php echo $datosProducto->getId(); ?>)"><i class="bi bi-heart"></i></button>
        </div>

    </div>
    <!-- Descripción del producto -->
    <div class="product-description ">
        <h3>Descripción del producto</h3>
        <p><?php echo nl2br($datosProducto->getDescripcion()); ?></p>
    </div>

    <!-- Acerca de este articulo -->
     <div class="about-product">
        <h3>Acerca de este producto</h3>
        <ul>
            <li>Corte oversize para conseguir un estilo urbano y la máxima comodidad</li>
            <li>Felpa perchada para ofrecer un confort óptimo</li>
            <li>Cuenta con un diseño ligero</li>
            <li>Tiene detalles distintivos de la marca</li>
            <li>Ofrece comodidad y libertad de movimiento</li>
            <li>Este producto es original Varosi</li>
        </ul>



    </div>

</main>

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
    
</body>
</html>

<!-- Javascript Bootstrap -->
<script src="../View/dist/js/bootstrap.bundle.min.js"></script>
<script src="../View/JS/agregarAjax.js"></script>
