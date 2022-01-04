<?php
/**
 * Create Actions
 */

add_action( 'display_library', 'display_before_library', 10 );
add_action( 'display_library', 'display_library', 20 );
add_action( 'display_library', 'display_after_library', 30 );
//add_action( 'display_title', 'display_title', 20 );


function display_library( $pageNo = 1 )
{
    $perPage    = get_option( 'showTitle', 20 );
    if( empty( $perPage ) ) $perPage    = 20;
    
    $args   = [
        'post_type' => 'flipbook',
        'posts_per_page'    => $perPage,
        'offset'    => $perPage * ( $pageNo - 1 ),
        'orderby'   => 'title',
        'order'     => 'ASC',
    ];

    $query  = new WP_Query( $args ); 

    $titles = [];

    if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post();
        $titles[$query->post->ID]   = [
            'title'     => $query->post->post_title,
            'permalink' => basename( get_permalink( $query->post->ID ) ),
            'thumbnail' => get_the_post_thumbnail( $query->post->ID )
        ];
    endwhile; endif; wp_reset_postdata(); //var_dump( $titles );

    add_action( 'display_titles', 'display_titlelist', 10, 1 );
    do_action( 'display_titles', $titles );
}



function display_after_library()
{
    $pageNo = ( isset( $_GET['pageNo'] ) ) ? $_GET['pageNo'] : 1;
    if( isset( $_GET['ofPages'] ) )
    {
        $ofPages    = $_GET['ofPages'];
    }
    else
    {
        $perPage    = get_option( 'showFontSets', 20 );
        $ofPages    = 1; //= getFontPages( $perPage );
    }
    
    add_action( 'display_after_titlelist', 'display_titlelist_footer', 10, 2 );
    do_action( 'display_after_titlelist', $pageNo, $ofPages );
}


function x_display_titlelist( $titles )
{
    include_once( FBL_TEMPLATES . '/test/displayFlipbook.php' );
}

function display_titlelist( $titles )
{   exit( print_r( $titles ) );
    ?>
    <div class="title-list">
        <?php
            foreach( $titles as $title ):  ?>
                <div class="title-list_entry">
                    <a href="<?php echo site_url() . '/library?book=' . $title['permalink']; ?>">
                        <h2><?php echo $title['title']; ?></h2>
                        <?php echo $title['thumbnail']; ?>
                    </a>
                </div>
        <?php endforeach; ?>
    </div>
    <?php
}

function display_titlelist_footer( $pageNo, $ofPages )
{ ?>
    <div class="title-list_pagination">
        1 of 1
    </div>
    <?php
}

/**
 * Display title
 */
function display_title()
{
    //$slug   = $_GET['book'];    //[FIX] sanitise string
    // Get post by slug
    $args   = [
        'name'      => $_GET['book'],
        'post_type' => 'flipbook',
        'numberposts'   => 1,
    ];

    $query  = new WP_Query( $args );
    $book   = array_shift( $query->get_posts() );

    $pdfurl = get_post_meta( $book->ID, 'pdfurl', TRUE );
    $image_path = get_post_meta( $book->ID, 'image_path', TRUE );

    include_once( FBL_TEMPLATES . '/display/displayFlipbook.php' );
}