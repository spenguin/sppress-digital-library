<?php
/**
 * Library Page
 */
//var_dump( $titles );
?>
<?php
    $path = './../wp-content/plugins/flipbooklibrary/templates/';
?>
<script type="text/javascript">
    var template = {
        html: '<?php echo $path; ?>templates/default-book-view.html',
        styles: [
        '<?php echo $path; ?>css/font-awesome.min.css',
        '<?php echo $path; ?>css/short-white-book-view.css'
        ],
        script: '<?php echo $path; ?>js/default-book-view.js'
    };
    var booksOptions    = {};
</script>
<div class="books">
    <?php 
        foreach( $titles as $title ): 
            $id = str_replace( ' ', '', $title['title'] );
            $featured_img_url = get_the_post_thumbnail_url( $title['id'],'full' );
            $pdfurl = get_post_meta( $title['id'], 'pdfurl', TRUE );
            ?>
            <div class="thumb">
                <img id="<?php echo $id; ?>" src="<?php echo $featured_img_url; ?>" class="btn"/>
                <div class="caption">
                    <?php echo $title['title']; ?>
                </div>
            </div>
            <script type="text/javascript">
                booksOptions["<?php echo $id; ?>"] = {
                    pdf: "<?php echo $pdfurl; ?>", 
                    downloadURL: "<?php echo $pdfurl; ?>", 
                    template: template
                };
            </script>
        <?php endforeach; ?>
</div>

<script>console.log( booksOptions ); </script>