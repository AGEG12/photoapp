function confirmSignout() {
        (async () => {
            await Swal.fire({
                title: 'Cerrar sesión',
                text: '¿Quieres cerrar la sesión?',
                icon: 'question',
                confirmButtonText: 'Cerrar',
                confirmButtonColor: '#f48c67',
                backdrop: true,
                allowOutsideClick: false,
                allowEscapekey: false,
                allowEnterKey: true,
                stopkeydownPropagation: false,
                showCancelButton: true,
                cancelButtonText: 'Cancelar'
            }).then( result => {
                if (result.value) {
                    location.href = "signout.php";
                }
            })
        })(); 
}
