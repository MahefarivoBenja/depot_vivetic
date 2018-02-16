<?php
    $theme_opt = "";
    foreach ($theme as $value_theme)
    {
        $theme_opt .='<option value="'.$value_theme->id_theme.'">'.$value_theme->nom_theme.'</option>';
    }
?>
<!-- page start-->
<section class="panel">
    <header class="panel-heading">
        Ajout d'un nouveau d�p�t &nbsp;<button id="upload_button" class="btn btn-success allfile" style="display: none;">Effacer tous les fichiers</button>
    </header>
    <div class="panel-body">
        <span class="todepot">
             <form action="<?php echo site_url('/upload/upload'); ?>" class="dropzone" id="depot">
             </form>
        </span>

        <div class="form-group">
            <br/><label class="control-label col-md-12">&nbsp;Sujet / Commentaire :&nbsp;<strong style="color:red;">(*)</strong></label>
            <div class="controls col-md-12">
                <textarea class="form-control" rows="5" id="comment_consigne" style="resize:none !important;"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-6">&nbsp;D�tails :&nbsp;</label>
                    <div class="controls col-md-12">
                        <input type="text" class="form-control" id="id_dtl">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-6">&nbsp;Quantit� :&nbsp;</label>
                    <div class="controls col-md-12">
                        <input type="text" class="form-control" id="id_qtt">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-6">&nbsp;Th�me :&nbsp;</label>
                    <div class="controls col-md-12">
                        <select class="form-control input-sm m-bot15" id="slct_thm_modal_upload">
                            <?php echo $theme_opt; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-6">&nbsp;Typologie :&nbsp;</label>
                    <div class="controls col-md-12">
                        <select class="form-control input-sm m-bot15" id="slct_typo_modal_upload" readonly="true">
                            <option value="18">DEPOT</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer"><span style="float:left;    margin-bottom: 100px !important;"><strong style="color:red;">(*)</strong> : Champ obligatoire</span>
            <button type="button" class="btn btn-shadow btn-info" data-toggle="tooltip" onclick="save_upload_order();" title="Envoyer chez Vivetic">Enregistrer</button>
        </div>
    </div>



</section>
<!-- page end-->