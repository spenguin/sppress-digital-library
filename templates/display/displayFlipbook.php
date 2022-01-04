<?php
/**
 * Display Flipbook
 */

?>
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/css/lightbox.css">
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/css/font-awesome.min.css">
<style type="text/css">
    .thumbnail {
    display: inline-block;
    width: 120px;
    height: 160px;
    background-color: #ccc;
    margin: 0 5px;
    cursor: pointer;
    }
    .fullscreen {
    background-color: #333;
    }
</style>



<div class="books">
    <div class="thumbnail" data-book-id="book1">
    Book 1
    </div>
    <div class="thumbnail" data-book-id="book2">
    Book 2
    </div>
    <div class="thumbnail" data-book-id="book3">
    Book 3
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/js/html2canvas.min.js"></script>
<script src="<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/js/three.min.js"></script>
<script src="<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/js/pdf.min.js"></script>
<script src="<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/js/3dflipbook.js"></script>
<script src="<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/js/lightbox.js"></script>

<script type="text/javascript">
      window.jQuery(function() {
        var $ = window.jQuery;
        var styleClb = function() {
          $('.fb3d-modal').removeClass('light').addClass('dark');
        }, booksOptions = {
          book1: {
            pdf: 'http://flipbooklib.loc/wp-content/uploads/2020/03/breaks-complete-low-res.pdf',
            template: {
              html: '<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/templates/display/default-book-view.php',
              styles: [
                '<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/css/short-white-book-view.css'
              ],
              links: [{
                rel: 'stylesheet',
                href: '<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/css/font-awesome.min.css'
              }],
              script: '<?php echo site_url(); ?>/wp-content/plugins/flipbooklibrary/vendor/3DFlipbook/js/default-book-view.js',
              sounds: {
                startFlip: 'sounds/start-flip.mp3',
                endFlip: 'sounds/end-flip.mp3'
              }
            },
            styleClb: styleClb
          },
          book2: {
            pdf: 'books/pdf/TheThreeMusketeers.pdf',
            propertiesCallback: function(props) {
              props.page.depth /= 4;
              props.cover.padding = 0.002;
              return props;
            },
            template: {
              html: 'templates/default-book-view.html',
              styles: [
                'css/black-book-view.css'
              ],
              links: [{
                rel: 'stylesheet',
                href: 'css/font-awesome.min.css'
              }],
              script: 'js/default-book-view.js',
              sounds: {
                startFlip: 'sounds/start-flip.mp3',
                endFlip: 'sounds/end-flip.mp3'
              }
            },
            styleClb: function() {
              $('.fb3d-modal').removeClass('dark').addClass('light');
            }
          },
          book3: {
            pdf: 'books/pdf/FoxitPdfSdk.pdf',
            propertiesCallback: function(props) {
              props.page.depth /= 3;
              return props;
            },
            template: {
              html: 'templates/default-book-view.html',
              styles: [
                'css/black-book-view.css'
              ],
              links: [{
                rel: 'stylesheet',
                href: 'css/font-awesome.min.css'
              }],
              script: 'js/default-book-view.js',
              sounds: {
                startFlip: 'sounds/start-flip.mp3',
                endFlip: 'sounds/end-flip.mp3'
              }
            },
            styleClb: styleClb
          }
        };

        var instance = {
          scene: undefined,
          options: undefined,
          node: $('.fb3d-modal .mount-container')
        };

        var modal = $('.fb3d-modal');
        modal.on('fb3d.modal.hide', function() {
          instance.scene.dispose();
        });
        modal.on('fb3d.modal.show', function() {
          instance.scene = instance.node.FlipBook(instance.options);
          instance.options.styleClb();
        });
        $('.books').find('.thumbnail').click(function(e) {
          var target = $(e.target);
          while(target[0] && !target.attr('data-book-id')) {
            target = $(target[0].parentNode);
          }
          if(target[0]) {
            instance.options = booksOptions[target.attr('data-book-id')];
            $('.fb3d-modal').fb3dModal('show');
          }
        });
      });
    </script>



<!-- To create 3D FlipBook from PDF -->
<script type="text/javascript">
    $('.solid-container').FlipBook({pdf: 'http://flipbooklib.loc/wp-content/uploads/2020/03/breaks-complete-low-res.pdf'});
</script>