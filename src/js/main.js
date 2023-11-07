document.addEventListener("DOMContentLoaded", function() {
    

    // alternar la visibilidad del formulario al hacer clic en el botón
    const botonMostrar = document.getElementById("mostrarFormulario");
    const formulario = document.getElementById("formulario");

    botonMostrar.addEventListener("click", function() {
        if (formulario.style.display === "none" || formulario.style.display === "") {
            formulario.style.display = "grid";
        } else {
            formulario.style.display = "none";
        }
    });

    // validar que la fecha no sea anterior a la fecha actual

        const form = document.getElementById("formulario"); 
        const fechaInput = document.getElementById("Fecha_Vence"); 
    
        form.addEventListener("submit", function(event) {
            const fechaSeleccionada = new Date(fechaInput.value);
            const fechaActual = new Date();
    
            if (fechaSeleccionada < fechaActual) {
                alert("La fecha seleccionada no puede ser anterior a la fecha actual.");
                event.preventDefault();
            }
        });

    const botonesEditarProveedor = document.querySelectorAll(".editar-proveedor");
    const formularioEdicionProveedor = document.getElementById("formulario-edicion-proveedor");

    botonesEditarProveedor.forEach(boton => {
        boton.addEventListener("click", () => {
            if (formularioEdicionProveedor.style.display === "grid") {
                formularioEdicionProveedor.style.display = "none";
            } else {
                formularioEdicionProveedor.style.display = "grid";
                const proveedorNombre = boton.parentElement.firstChild.textContent.trim();
                document.getElementById("nombre-proveedor").value = proveedorNombre;
            }
        });
    });
        

        const botonesEditar = document.querySelectorAll(".editar-producto");
        const formularioEdicion = document.getElementById("formulario-edicion");
        
        botonesEditar.forEach(boton => {
            boton.addEventListener("click", () => {
                if (formularioEdicion.style.display === "grid") {
                    // Si el formulario ya está abierto, al hacer clic nuevamente en "Editar", lo cerramos
                    formularioEdicion.style.display = "none";
                } else {
                    // Si el formulario está cerrado, lo abrimos
                    formularioEdicion.style.display = "grid";
                    // Puedes agregar más lógica para llenar el formulario con los datos del producto aquí
                    // Por ejemplo, obtén el nombre del producto y colócalo en el campo "nombre-editar"
                    const productoNombre = boton.parentElement.firstChild.textContent.trim();
                    document.getElementById("nombre-editar").value = productoNombre;
                }
            });
        });

        // Comprueba si hay un mensaje de alerta en la URL
        const urlParams = new URLSearchParams(window.location.search);
        const mensaje = urlParams.get('mensaje');
        
        // Muestra un alerta si hay un mensaje en la URL
        if (mensaje) {
            alert(mensaje);
        }



 
 const campos = ["cliente", "producto", "precio", "cantidad"];
 campos.forEach(campo => {
 document.getElementById(campo).addEventListener("input", actualizarPrevisualizacion);
 });

 
 //actualizar la previsualización 
 function actualizarPrevisualizacion() {
    const clienteSeleccionado = document.getElementById("cliente").value;
    const productoSeleccionado = document.getElementById("producto").value;
    const precioUnitario = parseFloat(document.getElementById("precio").value);
    const cantidad = parseInt(document.getElementById("cantidad").value);

    // Calcular el total
    const total = isNaN(precioUnitario) || isNaN(cantidad) ? 0 : precioUnitario * cantidad;

    // Actualizar elementos en la previsualización 
    document.getElementById("clienteSeleccionado").textContent = clienteSeleccionado;
    document.getElementById("productoSeleccionado").textContent = productoSeleccionado;
    document.getElementById("precioUnitario").textContent = precioUnitario.toFixed(2);
    document.getElementById("cantidadSeleccionada").textContent = cantidad;
    document.getElementById("total").textContent = total.toFixed(2);

   
    }   

    


});


