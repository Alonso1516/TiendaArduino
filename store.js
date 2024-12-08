let carrito = [];
let total = 0;

// Agregar productos al carrito
function agregarAlCarrito(nombre, precio) {
    carrito.push({ nombre, precio });
    total += precio;
    actualizarCarrito();
}

// Actualizar el carrito visualmente
function actualizarCarrito() {
    const carritoContenido = document.getElementById("carrito-contenido");
    const totalSpan = document.getElementById("total");

    // Vaciar contenido previo
    carritoContenido.innerHTML = "";

    // Mostrar productos en el carrito
    carrito.forEach((producto, index) => {
        const item = document.createElement("div");
        item.className = "carrito-item";
        item.innerHTML = `
            <span>${producto.nombre} - $${producto.precio.toFixed(2)}</span>
            <button onclick="eliminarDelCarrito(${index})">Eliminar</button>
        `;
        carritoContenido.appendChild(item);
    });

    // Actualizar el total
    totalSpan.textContent = total.toFixed(2);
}

// Eliminar productos del carrito
function eliminarDelCarrito(index) {
    total -= carrito[index].precio;
    carrito.splice(index, 1);
    actualizarCarrito();
}

// Finalizar la compra
function finalizarCompra() {
    if (carrito.length === 0) {
        alert("El carrito está vacío.");
        return;
    }

    // Preparar datos para enviar al servidor
    const datos = {
        productos: JSON.stringify(carrito),
        total: total,
    };

    // Enviar datos al servidor
    fetch("guardar_carrito.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(datos),
    })
        .then((response) => response.text())
        .then((mensaje) => {
            alert(mensaje); // Mostrar mensaje del servidor
            carrito = [];
            total = 0;
            actualizarCarrito();
        })
        .catch((error) => console.error("Error al guardar la compra:", error));
}
