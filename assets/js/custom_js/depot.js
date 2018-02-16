function save_upload_order() {
  ///  alert('0000');
    var inForm = Dropzone.forElement("#depot").files;/*liste qui "est" dans le form '#depot'*/
   /* console.log(inForm);*/

    var nbFile   = inForm.length;/*nombre fichier dans "#depot" */
    var listFile = [];
    for (i = 0; i < nbFile; i++)
    {
        //console.log(inForm[i].name)
        listFile[i] = listFileTemp[inForm[i].name]; /*recupere le filename dans serveur*/
    }
    /*console.log(inForm[0].name);
    console.log('xxxxx');
    console.log(listFileTemp);*//*liste qui "est ou etait" dans serveur => 'nom_client':nom_serveur  */
   // console.log(JSON.stringify(listFile));
    var filteToBD   = JSON.stringify(listFile);
    listFileTemp    = [];
    var replace     = '' +
        '<form action="http://192.168.10.70/depot_preprod/index.php/upload/upload" class="dropzone dz-clickable" id="depot">' +
        '<div class="dz-default dz-message"><span><i class="fa fa-cloud-upload faa-float animated fa-4x" aria-hidden="true">' +
        '</i><h5><b>Déposer ou cliquer pour ajouter</b></h5></span>' +
        '</div></form>';

     var comment    = $('#comment_consigne').val();
     var detail     = $('#id_dtl').val();
     var quantite   = $('#id_qtt').val();
     var theme      = $('#slct_thm_modal_upload').val();
     var typologie  = $('#slct_typo_modal_upload').val();


    /*console.log("comment:"+comment+"detail:"+detail+"quantite:"+quantite+"theme:"+theme+"typologie:"+":"+typologie); */

     /***cree la ligne dans hub de comm
     * 1- test la reference (unique)
     * 2- crée la lingne dans remontee
     * 3- mettre dans discussion
     * 4- mettre dans piece_jointe
     * si non OK delete ligne remontee; OK : fini
     */
     var formData = {
         listFile   :listFile,
         comment    :comment,
         detail     :detail,
         quantite   :quantite,
         theme      :theme,
         typologie  :typologie
     };

        /*console.log(formData);
        return false;*/
     $.ajax({
        url : url+'home/insert_in_db',
        type : 'POST',
        dataType : 'json',
        data : formData,
        success : function(ret, statut){
           if(ret.retour == 1 )
           {
               Command: toastr['success']("Création dépôt terminée.");
               $('.todepot').html('');/*recree dropzone*/

               $('.todepot').html(replace);/*recree dropzone*/

               $("#depot").dropzone({url : url+'upload/Upload/'}); /*recree dropzone*/

               $('#comment_consigne').val('');
               $('#id_dtl').val('');
               $('#id_qtt').val('');
               $('#slct_thm_modal_upload').val(1);
               $('#slct_typo_modal_upload').val(18);

           }
           else
           {
               Command: toastr['error']("Erreur de notre serveur. Merci de refaire plus tard");
               $('.todepot').html('');/*recree dropzone*/

               $('.todepot').html(replace);/*recree dropzone*/

               $("#depot").dropzone({url : url+'upload/Upload/'}); /*recree dropzone*/

           }
        },

        error : function(resultat, statut, erreur){
            Command: toastr['error']("Erreur de notre serveur.");
            $('.todepot').html('');/*recree dropzone*/

            $('.todepot').html(replace);/*recree dropzone*/

            $("#depot").dropzone({url : url+'upload/Upload/'}); /*recree dropzone*/

        },

        complete : function(resultat, statut){

        }

    });

}