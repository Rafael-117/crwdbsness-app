@if (Session::has('success'))
    <input type="hidden" id="alerta" data-type="success" value="{{ Session::get('success') }}">
@endif
@if (Session::has('msg-error'))
    <input type="hidden" id="alerta" data-type="error" value="{{ Session::get('msg-error') }}">
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ocurrio un error por favor revisa tus datos.',
        })
    </script>
@endif

<script>
    let text = document.getElementById("alerta");

    if (text != null || text != undefined) {
        let type = text.dataset.type;
        alerta(type, text.value)
        text.dataset.type = ""
    }

    function alerta(type, text) {
        if (type == 'success') {
            Swal.fire({
                icon: 'success',
                title: text,
                showConfirmButton: false,
                timer: 1500
            })
        }

        if (type == 'error') {

            Swal.fire({
                title: '<strong>Ocurrio un error</strong>',
                icon: 'error',
                html: text,
                showConfirmButton: true,
                confirmButtonColor: '#3085d6',
            })
        }


    }
</script>
