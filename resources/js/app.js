import "./bootstrap";

import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube tu Imagen",
    acceptedFiles: ".png,.jpg,.jpeg,gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Imagen",
    maxFiles: 1,
    uploadMultiple: false,

    // use: recuperar old de imagen al crear post para evitar volver a subirla
    //      si hay error de validacion
    init: function () {
        // if se mando algo en el campo Image
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            // campos sin utilidad
            imagenPublicada.size = 234;
            // captura valor de imagen y guarda en prop
            imagenPublicada.name =
                document.querySelector('[name="imagen"]').value;
            // asi resuelve Dropzone la asignacion
            this.options.addedfile.call(this, imagenPublicada);
            // asigna miniatura para mostrar
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );
            // clases de Dropzone para terminar
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", function (file, response) {
    document.querySelector('[name="imagen"]').value = response.image;
});

dropzone.on("error", function (file, response) {
    document.querySelector('[name="imagen"]').value = response.image;
});

dropzone.on("removedfile", function () {
    document.querySelector('[name="imagen"]').value = "";
});
