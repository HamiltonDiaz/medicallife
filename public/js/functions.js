// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})();

/*Esta funcion es para la barra lateral */
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
});


/* Para visualizar img */
function readURL(input, imgsrc) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        var supportedImages = ["image/jpeg", "image/png", "image/gif", "image/jpg"];

        element = input.files[0];
        if (supportedImages.indexOf(element.type) != -1) {
            reader.onload = function (e) {
                // Asignamos el atributo src a la tag de imagen
                $(imgsrc).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
            alert("Archivo Invalido");
            document.getElementById("imgpreview").value = "";
        }
    }
}
/*fin previsualizar img */

/*Configurar alertas*/
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "3000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

/*Fin configurar alertas */

/*Datatables */

$(document).ready(function () {
    $('#datatable').DataTable(
        {
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por p&aacutegina",
                "zeroRecords": "Lo sentimos no hay conincidencias",
                "info": "P&aacutegina _PAGE_ de _PAGES_",
                "infoEmpty": "No se han encontrado resultados para tu búsqueda",
                "infoFiltered": "(Buscado en _MAX_ registros)",
                "search": "Buscar",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "&Uacuteltimo"
                },
                "Processing": "Procesando",
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            reponsive: "true",
            dom: "Bfrtilp",
            buttons: [
                {
                    extend: "excelHtml5",
                    text: '<span class="fa fa-file-excel-o"></span>',
                    titleAttr: "Exportar a Excel",
                    className: "btn btn-success"
                },
                {
                    extend: "pdfHtml5",
                    text: '<span class="fa fa-file-pdf-o"></span>',
                    titleAttr: "Exportar a PDF",
                    className: "btn btn-danger"
                },
                {
                    extend: "print",
                    text: '<span class="fa fa-print"></span>',
                    titleAttr: "Imprimir",
                    className: "btn btn-primary"
                },
                {
                    extend: "copy",
                    text: '<span class="fa fa-files-o"></span>',
                    titleAttr: "Copiar",
                    className: "btn btn-light"
                }
            ]
        });


});

/*Fin datatables */

