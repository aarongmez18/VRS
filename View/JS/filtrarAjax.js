
function crearCardProducto(producto) {
    const card = document.createElement('div');
    card.classList.add('product-card');
    card.innerHTML = `
        <img src="${producto.imagen}" alt="${producto.nombre}" class="product-image">
        <div class="product-info">
            <h3 class="product-name">${producto.nombre}</h3>
            <p class="product-price">${producto.precio}€</p>
            <button class="add-to-cart-btn" onclick="addToCart(${userId}, ${producto.id})"><i class="bi bi-basket3-fill"></i></button>
            <button id="wishlist-btn-${producto.id}" class="add-to-cart-btn" onclick="toggleWishlist(${userId}, ${producto.id})"><i class="bi bi-heart"></i></button>
        </div>`;
    return card;
}

// Recogemos el valor de option
const filtro = document.getElementById('filtro');
filtro.addEventListener('change', function() {
    const valor = filtro.value;
    // Hacemos peticion AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../Controller/filtrarProductos.php?filtro=' + valor, true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            const productos = JSON.parse(xhr.responseText);
            const contenedorCards = document.querySelector('.contenedor__cards');
            // Limpiamos el contenido anterior
            while (contenedorCards.firstChild) {
                contenedorCards.removeChild(contenedorCards.firstChild);
            }
            // Añadimos los nuevos productos
            productos.forEach(producto => {
                const card = crearCardProducto(producto);
                contenedorCards.appendChild(card);
            });
        } else {
            console.error('Error al cargar los productos:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Error al realizar la petición AJAX');
    };

    xhr.send();
});