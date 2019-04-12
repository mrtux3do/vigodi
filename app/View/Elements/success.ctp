<div id="flash" class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo h($message) ?>
</div>

<script>
    jQuery(function($) {
        setTimeout(function(){
            $("#flash").remove();
        }, 5000 ); // 5 secs
    });
</script>