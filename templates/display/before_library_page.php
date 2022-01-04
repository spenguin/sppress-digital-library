<?php
/**
 * HTML for before Library Page
 */
?>
<?php
    $path = './../wp-content/plugins/flipbooklibrary/templates/';
?>
    <link rel="stylesheet" href="<?php echo $path; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>css/bootstrap4-styles.css">

    <link rel="stylesheet" href="<?php echo $path; ?>css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>css/fontawesome-solid.min.css">
    
    <link rel="stylesheet" href="<?php echo $path; ?>css/style.css">

  <div class="container">
      <div class="content">
        <div class="modal fade" id="flip-book-window" tabindex="-1" role="dialog" aria-labelledby="headerLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <div class="modal-body">
                        <div class="mount-node">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-list">