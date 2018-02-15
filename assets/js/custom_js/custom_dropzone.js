Dropzone.options.depot = {

    dictDefaultMessage: "<i class=\"fa fa-cloud-upload faa-float animated fa-4x\" aria-hidden=\"true\"></i><h5><b>Déposer ou cliquer pour ajouter</b></h5>",
    addRemoveLinks: true,
    maxFilesize: 20,
    paramName: "file",
    maxFilesize: 20,
    maxfilesexceeded:function () {
      alert('xxxxx');
    },
    dictRemoveFile: 'Supprimer',
    init: function() {

        var myDropzone = this;
        var listFile = [];
        $("#upload_button").click(function() {
            /*remove all files in form '#id'*/

           /* console.log(listFile);*/
            Dropzone.forElement("#depot").removeAllFiles(true);

        });
        this.on("addedfile", function(file,response) {
            if (this.files.length)
            {
                var _i, _len;

                for (_i = 0, _len = this.files.length; _i < _len - 1; _i++)
                {
                    if( this.files[_i].name === file.name ) /*test si fichier existe déjà dans form '#depot'*/
                    {
                        this.removeFile(file);
                        Command: toastr['info']("Vous avez déjà dans la liste le fichier : "+file.name);
                    }

                }
                /*alert(_i);*/
            }

        });
        this.on("error", function(file, message) {
            alert(message);

            this.removeFile(this.file.name);

        });
        this.on("removedfile", function(file) {
            /*if (!file.serverId) { return; }*/
            /*$.post("delete-file.php?id=" + file.serverId);*/
            /*console.log(file.upload.filename);
            console.log('----');
            console.log(listFile[file.upload.filename]);*/
          //  alert(url);
           $.ajax({
                url : url+'upload/Upload/delete',
                type : 'POST', // Le type de la requête HTTP, ici devenu POST
                data : 'myfile=' + listFile[file.upload.filename],
                dataType : 'text'
            });


        });
        this.on("success", function(file, response) {
            /*file.name : nom de fichier d'origine*/
            /*response : nom de fichier dans le serveur retourner par php*/
            listFile[file.name] = response; /*stoker dans un array, utile pour la suprression*/
            if(response == 'error_upload')
            {

                Command: toastr['error']("Erreur de notre serveur.");
                return false;
            }

            /*console.log("file.name : "+file.name+"response : "+response);*/
        });


    }
};