<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    function terminarPedido(pedido) {
        Swal.fire({
            title: 'Terminar tu pedido',
            icon: 'info',
            html: `
        <table class="table-striped col-12">
            <tr>
            <th scope="col"># Acciones</th>
            <td>${pedido.num_acciones}</td>
            </tr>
            <tr>
            <th scope="col">Precio por acción</th>
            <td>${pedido.precio_acccion}</td>
            </tr>
            <tr>
            <th scope="col">Monto</th>
            <td>${pedido.monto}</td>
            </tr>
            <tr>
            <th scope="col">Comisión</th>
            <td>${pedido.comision}</td>
            </tr>
            <tr>
            <th scope="col">Impuestos</th>
            <td>${pedido.impuestos}</td>
            </tr>
            <tr>
            <th scope="col"> <h2> Total </h2> </th>
            <td> <h2> ${pedido.total}</h2></td>
            </tr>
        </table>

        <div class="">
           Realiza tu depósito o transferencia bancaria y envía tu comprobante a 
           <a href="mailto:info@crwdbsness.com"><b> info@crwdbsness.com </b></a> para finalizar tu pedido.
        </div>`
        })

    }


    function cancelarPedido(id) {
        Swal.fire({
            title: '¿Estás seguro de que deseas cancelar tu pedido?',
            text: 'Queremos asegurarnos de que estás completamente satisfecho con tu elección antes de proceder.',
            showDenyButton: true,
            showCancelButton: false,
            denyButtonText: `No, Salir`,
            confirmButtonText: `Si, Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: '/transactions/' + id,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response == 'Eliminado') {
                            Swal.fire('Eliminado!', '', 'success');
                            var elementoAEliminar = document.getElementById("pedido_" + id);
                            elementoAEliminar.remove();
                        }
                        if (response == 'Error') {
                            Swal.fire('Error al eliminar!', '', 'error');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire('Error al eliminar', '', 'error');
                    }
                });

            } else if (result.isDenied) {
                Swal.fire('Sin cambios efectuados', '', 'info');
            }
        })
    }
</script>
