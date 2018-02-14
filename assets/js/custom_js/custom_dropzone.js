Dropzone.options.depot = {

    dictDefaultMessage: "<i class=\"fa fa-cloud-upload fa-4x\" aria-hidden=\"true\"></i> Ajouter un document",
    addRemoveLinks: true,
    maxFilesize: 500,

    dictRemoveFile: 'Supprimer',
    init: function() {
        var myDropzone = this;
        $("#upload_button").click(function() {

            Dropzone.forElement("#depot").removeAllFiles(true);
        });
        this.on("addedfile", function(file) {

            if (this.files.length)
            {
                var _i, _len;
                for (_i = 0, _len = this.files.length; _i < _len - 1; _i++)
                {
                    if( this.files[_i].name === file.name )
                    {
                        this.removeFile(file);
                        Command: toastr['info']("Vous avez déjà dans la liste le fichier : "+file.name);
                    }
                }
            }
        });

    }
};