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
    init: function () {
        if(document.querySelector('[name="imagen"]').value,trim()){
            const imagenPublicada = {}
            imagenPublicada.size = 234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;
            this.options.addedfile.call(this, imagenPublicada)
        }
    }
});

dropzone.on("success", function (file, response) {
    console.log(response);
    console.log(response.image);
    document.querySelector('[name="imagen"]').value = response.image;
});

dropzone.on("error", function (file, message) {
    console.log(message);
});

dropzone.on("removedfile", function () {
    console.log("eliminado1");
});
