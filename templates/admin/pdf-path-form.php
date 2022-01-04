<?php
/**
 * Form to record the PDF path
 */
?>
<div class="hcf_box">
    <style scoped>
        .hcf_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .hcf_field{
            display: contents;
        }
    </style>
    <p class="meta-options hcf_field">
        <label for="pdfurl">PDFURL</label>
        <input id="pdfurl" type="text" name="pdfurl" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'pdfurl', true ) ); ?>">
    </p>
</div>