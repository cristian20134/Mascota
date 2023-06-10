<script>
    $('.delete-confirm').on('click', function (e) {
            e.preventDefault();
            const url = $(this).attr('href');

            Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Este registro y sus detalles se eliminarán!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: '¡Cancelar!',

            }).then(function(result) {
                if (result.value) {
                        this.on=(window.location.href = url);
                        }
                    });
                });
</script>