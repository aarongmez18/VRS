<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="IMG/VRS2.png" type="image/x-icon" />
    <!-- CSS Generales -->
    <link rel="stylesheet" href="../View/CSS/footer.css" />
    <link rel="stylesheet" href="../View/CSS/navbar.css" />
    <!-- CSS de la página -->
    <link rel="stylesheet" href="../View/CSS/contact.css" />


    <!-- Bootstrap -->
    <link rel="stylesheet" href="../View/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Conocenos</title>
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
					<li><a href="../Controller/collections.php"> Colecciones </a></li>
					<li><a href="../View/contactanos.php"> Contactanos </a></li>
				</ul>
				<!-- Iconos enlaces -->
				<ul>
					<li><a href="../Controller/wishlist.php"><i class="bi bi-search-heart"></i></a></li>
					<li><a href="../Controller/carrito.php"><i class="bi bi-bag"></i></a></li>
					<li><a href="../Controller/register.php" target="_blank"><i class="bi bi-person-circle"></i></a></li>
				</ul>
			</div>
		</nav>

        <main>

            <section class="container">

                <div class="text-center">
                    <h1 class="h1">CONTACTO</h1>
                    <p>Ponte en contacto con nosotros si tienes alguna duda o DM en Instagram.</p>
                    <!-- <hr class="bi-hr"> -->
					<hr>

                </div>

                <div class="contact__container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.141895495548!2d-5.776298199999986!3d37.1730987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd127f741ecc5b79%3A0xc4314da8d6b5d2ad!2sC.%20M%C3%BAsico%20Jos%C3%A9%20Salazar%20Rodriguez%2C%2041710%20Utrera%2C%20Sevilla!5e0!3m2!1ses!2ses!4v1728340645409!5m2!1ses!2ses" width="600" height="450" class="mapa__contact" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="formulario__contact">
                        <h2 class="h2">DATOS</h2>
                        <small>Ingresa tus datos para contactar con usted</small>
                        <form action="../Controller/contact.php" method="POST">
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control" > <br>
                            <input type="email" name="email" placeholder="Correo electrónico" class="form-control" > <br>
                            <textarea name="mensaje" placeholder="Escribe tu mensaje"></textarea> <br>
                            <input type="submit"></input>
                        </form>
                    </div>

                </div>

            </section>

            <hr>
        </main>

	    <!-- Footer -->
		<footer class="footer__container ">
			<h4 class="footer__title">Varosi Urban Style</h4>
			<section class="footer__section">
				<div class="footer__contact">
					<p class="footer__tp">SUPPORT</p>
					<p>
						<a href="mailto:helpvrs@varosi.com">vrs@varosi.com</a>
					</p> 
					<!-- <p><i class="bi bi-telephone-fill"></i> +34 611 42 40 82</p> -->
				-</div>
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
<script src="../View/dist/js/bootstrap.bundle.min.js"></script>