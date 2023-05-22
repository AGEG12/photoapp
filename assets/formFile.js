const inputFilename = document.getElementById('input-filename');
const inputFile = document.getElementById('input-file');
document.addEventListener('DOMContentLoaded',()=> {
    inputFile.addEventListener('change', defaultNameFile);
})
function defaultNameFile() {
    let filename = document.getElementById('input-file').files[0].name;
    inputFilename.value = filename;
};

function fileUploadedAlert() {
    (async () => {
        await Swal.fire({
            title: 'Completado',
            text: 'La imagen se cargo correctamente',
            icon: 'success',
            confirmButtonText: 'Ir a galeria',
            confirmButtonColor: '#f48c67',
            backdrop: true,
            allowOutsideClick: false,
            allowEscapekey: false,
            allowEnterKey: true,
            stopkeydownPropagation: false,
            showCancelButton: true,
            cancelButtonText: 'Agregar otra imagen'
        }).then( result => {
            if (result.value) {
                location.href = "index.php";
            }
        })
    })(); 
}