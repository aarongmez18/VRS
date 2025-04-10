
// Funcion AJAX para añadir el producto al carrito del usuario
function addToCart(userId, productId) {
   // Realiza la solicitud AJAX para agregar el producto al carrito
   // Pasa el userId y el productId como parámetros
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/agregar_carrito.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Muestra un mensaje de éxito o realiza cualquier otra acción
                console.log('Producto agregado al carrito');
                // Actualiza la alerta en la página
                var alerta = document.getElementById('custom-alert');
                alerta.textContent = 'Producto añadido al carrito.';
                alerta.classList.remove('hidden');
                setTimeout(function () {
                    alerta.classList.add('hidden');
                }, 3000);
            } else {
                // Muestra un mensaje de error
                console.log('Error al agregar el producto al carrito');
            }
        }
    };
    // le enviamos el valor 1 para añadir el producto al carrito
    xhr.send('userId=' + userId + '&productId=' + productId + '&value=' + 1);
   }

// Funcion AJAX para enviar el producto a la lista de deseos

function toggleWishlist(userId, productId) {
    var wishlistButton = document.querySelector(`#wishlist-btn-${productId}`);
    const icon = wishlistButton.querySelector('i');

    // Alternar entre el icono de 'heart' y 'heart-fill'
    if (icon.classList.contains('bi-heart')) {
        icon.classList.remove('bi-heart');
        icon.classList.add('bi-heart-fill');
        showCustomAlert('Producto agregado a la lista de deseos')

            // Realiza la solicitud AJAX para agregar el producto a la lista de deseos
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/agregar_lista_deseos.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Muestra un mensaje de éxito o realiza cualquier otra acción
                console.log('Producto agregado a la lista de deseos');
            } else {
                // Muestra un mensaje de error
                console.log('Error al agregar el producto a la lista de deseos');
            }
        }
    };
   //  Pasamos el value = 1 para agregar el producto a la lista de deseos
    xhr.send('userId=' + userId + '&productId=' + productId + '&value=' + 1);
    } else {
        icon.classList.remove('bi-heart-fill');
        icon.classList.add('bi-heart');
        showCustomAlert('Producto eliminado de la lista de deseos');

        
            // Realiza la solicitud AJAX para eliminar el producto a la lista de deseos
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/agregar_lista_deseos.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Muestra un mensaje de éxito o realiza cualquier otra acción
                console.log('Producto eliminado de la lista de deseos');
            } else {
                // Muestra un mensaje de error
                console.log('Error al eliminar el producto a la lista de deseos');
            }
        }
    };
   //  Pasamos el value = 2 para eliminar el producto de la lista de deseos
    xhr.send('userId=' + userId + '&productId=' + productId + '&value=' + 2);
    }


}


// Función para eliminar el producto del carrito

function eliminarDelCarrito(userId, productId) {
       // Realiza la solicitud AJAX para eliminar el producto del carrito
       var xhr = new XMLHttpRequest();
       xhr.open('POST', '../Controller/agregar_carrito.php', true);
       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
       xhr.onreadystatechange = function () {
           if (xhr.readyState === XMLHttpRequest.DONE) {
               if (xhr.status === 200) {
                   // Muestra un mensaje de éxito o realiza cualquier otra acción
                   console.log('Producto eliminado del carrito');
                   showCustomAlert('Producto eliminado del carrito');
               } else {
                   // Muestra un mensaje de error
                   console.log('Error al eliminar el producto del carrito');
                   showCustomAlert('Error al eliminar el producto');
               }
           }
       };
       // Pasamos el value = 2 para eliminar el producto del carrito
       xhr.send('userId=' + userId + '&productId=' + productId + '&value=' + 2);
       location.reload();
       return false;
}
function eliminar(userId, productId) {
    // Realiza la solicitud AJAX para eliminar el producto a la lista de deseos
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/agregar_lista_deseos.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Muestra un mensaje de éxito o realiza cualquier otra acción
                console.log('Producto eliminado de la lista de deseos');
                showCustomAlert('Producto eliminado de la lista de deseos');
            } else {
                // Muestra un mensaje de error
                console.log('Error al eliminar el producto a la lista de deseos');
                showCustomAlert('Error al eliminar el producto');
            }
        }
    };
    // Pasamos el value = 2 para eliminar el producto de la lista de deseos
    xhr.send('userId=' + userId + '&productId=' + productId + '&value=' + 2);
    location.reload();
    return false;
}



// Funcion para mostrar la alerta personalizada
function showCustomAlert(message) {
    const alertBox = document.getElementById('custom-alert');
    
    // Mostrar el mensaje personalizado
    alertBox.innerHTML = message;
    alertBox.classList.remove('hidden');
    alertBox.classList.add('show');
    
    // Ocultar la alerta después de 1 segundo y medio
    setTimeout(() => {
        alertBox.classList.remove('show');
        alertBox.classList.add('hidden');
    }, 1500);
}


// Funciones para aumentar o disminuir la cantidad de productos mediante AJAX
function disminuirCarrito(userId, productId,precioProducto) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/disminuirCantidad.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) { // Verifica si la solicitud ha terminado
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    var productId = response.producto;
                    var cantidad = response.cantidad;
                    var precio = response.precio;

                    document.getElementById('cantidad-' + productId).innerText = cantidad;
                    document.getElementById('precio-' + productId).innerText = 'Precio del producto: ' + precio + '€';
                    console.log('Producto:', productId);
                    console.log('Cantidad:', cantidad);
                    console.log('Precio:', precio);
                    console.log('Producto cambiado correctamente');
                } catch (e) {
                    console.error('Error al analizar JSON:', e);
                }
            } else {
                console.error('Error en la petición:', xhr.statusText);
            }
        }
    };

    xhr.send('userId=' + userId + '&id_producto=' + productId + '&precio=' + precioProducto);
}

function aumentarCarrito(userId, productId,precioProducto) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/aumentarCantidad.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) { // Verifica si la solicitud ha terminado
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    var productId = response.producto;
                    var cantidad = response.cantidad;
                    var precio = response.precio;

                    document.getElementById('cantidad-' + productId).innerText = cantidad;
                    document.getElementById('precio-' + productId).innerText = 'Precio del producto: ' + precio + '€';
                    console.log('Producto:', productId);
                    console.log('Cantidad:', cantidad);
                    console.log('Precio:', precio);
                    console.log('Producto cambiado correctamente');
                } catch (e) {
                    console.error('Error al analizar JSON:', e);
                }
            } else {
                console.error('Error en la petición:', xhr.statusText);
            }
        }
    };

    xhr.send('userId=' + userId + '&id_producto=' + productId + '&precio=' + precioProducto);
}
