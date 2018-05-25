Dropzone.options.myAwesomeDropzone = {
    paramName: "file",
    maxFilesize: 1,
    acceptedFiles: ".csv",
    createImageThumbnails: false,
    init: function () {
        this.on("error", function (file, response) {
            alert(response);
        });
    }
};