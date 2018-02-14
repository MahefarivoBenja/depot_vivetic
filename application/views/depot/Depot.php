<!-- page start-->
<section class="panel">
    <header class="panel-heading">
        Dropzone File Upload &nbsp;<button id="upload_button" class="btn btn-success">Effacer tous les fichiers</button>
    </header>
    <div class="panel-body">
        <form action="<?php echo site_url('/upload/upload'); ?>" class="dropzone" id="depot">
            <button type="submit">Valider</button>
        </form>
    </div>

</section>
<!-- page end-->