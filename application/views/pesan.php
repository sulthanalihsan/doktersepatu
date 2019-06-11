<div class="modal <?php echo ($mode=='SUKSES')?'modal-success':'modal-warning'?> fade" id="modal-std" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $mode; ?></h4>
                <a href="<?php echo base_url($go); ?>">
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </a>
            </div>
            <div class="modal-body">
                <p> <?php echo $isi; ?> </p>
            </div>
            <div class="modal-footer">
                <a  href="<?php echo base_url($go); ?>" >
                <i id="close-modal" class=' btn <?php echo ($mode=='SUKSES')?'btn-success':'btn-warning'?> '> OK</i></a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->