
  <?php
    $path = './../wp-content/plugins/flipbooklibrary/templates/';
  ?>
  <link rel="stylesheet" href="<?php echo $path; ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $path; ?>css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo $path; ?>css/bootstrap4-styles.css">

  <link rel="stylesheet" href="<?php echo $path; ?>css/fontawesome.min.css">
  <link rel="stylesheet" href="<?php echo $path; ?>css/fontawesome-solid.min.css">

  <link rel="stylesheet" href="<?php echo $path; ?>css/style.css">

  <script src="<?php echo $path; ?>js/jquery.min.js"></script>
  <script src="<?php echo $path; ?>js/bootstrap.min.js"></script>

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
        <div class="books">
            <h2>Images</h2>
            <div class="thumb">
                <img id="theKingIsBlack" src="<?php echo $path; ?>images/theKingIsBlack.jpg" class="btn" alt="The King is Black - setting the trend again" />
                <div class="caption">
                Book is built from image collection.
                </div>
            </div>
        </div>
        <div class="books">
            <h2>PDFs</h2>
            <div class="thumb">
                <img id="condoLiving" src="<?php echo $path; ?>images/BreaksVolumeOne.jpg" class="btn" alt="Condo Living - Party in your place" />
                <div class="caption">
                PDF magazine as a 3D FlipBook.
                </div>
            </div>
            <div class="thumb">
                <img id="theThreeMusketeers" src="<?php echo $path; ?>images/theThreeMusketeers.jpg" class="btn" alt="Alexandre Dumas - The Three Musketeers" />
                <div class="caption">
                The Three Musketeers book. Pay attention on the 3D view by means free orbit (use menu settings to release orbit control). Have a look at the binding.
                </div>
            </div>
        </div>
        <div class="books">
            <h2>HTMLs</h2>
            <div class="thumb">
                <img id="orwell1984" src="<?php echo $path; ?>images/orwell1984.jpg" class="btn" alt="George Orwell - 1984" />
                <div class="caption">
                1984 - George Orwell's book. Created from single HTML pages. It demonstrates interaction with the user, shows how to manage the plugin from internal content.
                Pay attention on table of contents.
                </div>
            </div>
            <div class="thumb">
                <img id="preview" src="<?php echo $path; ?>images/preview.jpg" class="btn" alt="Preview" />
                <div class="caption">
                An example of simple interactive markup. There is no actions just hover effect.
                </div>
            </div>
        </div>


<script src="<?php echo $path; ?>js/html2canvas.min.js"></script>
<script src="<?php echo $path; ?>js/three.min.js"></script>
<script src="<?php echo $path; ?>js/pdf.min.js"></script>

<script src="<?php echo $path; ?>js/3dflipbook.js"></script>
<script type="text/javascript">

  function theKingIsBlackPageCallback(n) {
    return {
      type: 'image',
      src: '<?php echo $path; ?>books/image/theKingIsBlack/'+(n+1)+'.jpg',
      interactive: false
    };
  }

  function orwell1984PageCallback(n) {
    return {
      type: 'html',
      src: '<?php echo $path; ?>books/html/1984/'+(n+1)+'.html',
      interactive: true
    };
  }

  function previewPageCallback(n) {
    return {
      type: 'html',
      src: '<?php echo $path; ?>books/html/preview/'+(Math.floor(n/2)%3+1)+'.html',
      interactive: true
    };
  }

  var template = {
    html: '<?php echo $path; ?>templates/default-book-view.html',
    styles: [
      '<?php echo $path; ?>css/font-awesome.min.css',
      '<?php echo $path; ?>css/short-white-book-view.css'
    ],
    script: '<?php echo $path; ?>js/default-book-view.js'
  };

  var booksOptions = {
    orwell1984: {
      pageCallback: orwell1984PageCallback,
      pages: 204,
      propertiesCallback: function(props) {
        props.page.depth /= 2;
        props.cover.padding = 0.002;
        return props;
      },
      template: template
    },
    preview: {
      pageCallback: previewPageCallback,
      pages: 200,
      propertiesCallback: function(props) {
        props.cover.padding = 0.003;
        props.sheet.color = 0x008080;
        return props;
      },
      template: template
    },
    theKingIsBlack: {
      pageCallback: theKingIsBlackPageCallback,
      pages: 40,
      propertiesCallback: function(props) {
        props.cover.color = 0x000000;
        return props;
      },
      template: template
    },
    condoLiving: {
      pdf: '<?php echo $path; ?>books/pdf/BreaksVolumeOne.pdf',
      downloadURL: '<?php echo $path; ?>books/pdf/BreaksVolumeOne.pdf',
      template: template
    },
    theThreeMusketeers: {
      pdf: 'books/pdf/TheThreeMusketeers.pdf',
      propertiesCallback: function(props) {
        props.page.depth /= 3;
        props.cover.padding = 0.002;
        props.cover.binderTexture = 'books/pdf/binder/TheThreeMusketeers.jpg';
        return props;
      },
      template: template
    },
  };

  var instance = {
    scene: undefined,
    options: undefined,
    node: $('#flip-book-window').find('.mount-node')
  };
  $('#flip-book-window').on('hidden.bs.modal',  function() {
    instance.scene.dispose();
  });
  $('#flip-book-window').on('shown.bs.modal', function() {
    instance.scene = instance.node.FlipBook(instance.options);
  });

  $('.books').find('img').click(function(e) {
    if(e.target.id) {
      instance.options = booksOptions[e.target.id];
      $('#flip-book-window').modal('show');
    }
  });

</script>
    <script src="<?php echo $path; ?>js/script.js"></script>       