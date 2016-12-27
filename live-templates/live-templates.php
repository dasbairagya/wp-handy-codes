Abbreviation: cpt
Description: custom post type

<?php
/**
 * Register Post Type $cpt$
 */
add_action( 'init', 'codex_$cpt$_init' );

function codex_$cpt$_init() {
    $labels = array(
        'name'               => _x( '$cpt$s', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( '$cpt$', 'post type singular name', 'your-plugin-textdomain' ),
        'add_new'            => 'Add $cpt$',
        'all_items'          => 'All $cpt$',
        'edit_item'          =>'Edit $cpt$',
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => '$cpt$' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' )
    );

    register_post_type( '$cpt$', $args );
}
?>
<!-------------------------------------------------->
  Abbreviation: fetch
Description: custom fetch loop
  
<?php  
/**
 * Custom Slug Name $cpt$
 */
        global $post;
            $args = array(
                'posts_per_page'  =>   -1 ,
                'orderby'         => 'date',
                'order'           => 'DESC',
                'post_type'       => '$cpt$',
                'post_status'     => 'publish'
            );

            $the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) :
                $the_query->the_post();
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>

                <?php endwhile; ?>

<!-- ------------------------------------------------ -->

Abbreviation: foreach
Description: quick froeach 

<?php
/**
 * Iterable_expr $cpt$
 */
foreach ($cpt$ as $cpt$s) {
    $END$
}?>

<!-------------------------------------------------->
Abbreviation: loop
Description: default loop 

<?php
if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
               $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
            <?php endwhile;endif; ?>

<!-------------------------------------------------->
Abbreviation: show-menu
Description: show the main menu in the header.php 
<?php
/**
 * Menu Name $cpt$
 */
                        $args =array( 'menu' => '$cpt$', 
                            'container' => '<div>',
                            'container_class' => 'collapse navbar-collapse',
                            'menu_class' => 'nav navbar-nav',

                             );
                        wp_nav_menu($args);
                        ?>


<!-------------------------------------------------->
Abbreviation: create-menu
Description: create main menu in the function.php 
<?php
/**
 * Menu Name $cpt$
 */
function create_menu(){
    register_nav_menu('primary','$cpt$');
    register_nav_menu('secondary','Footer Menu');
}
add_action('init','create_menu');
?>
<!-------------------------------------------------->
Abbreviation: create-thumbnail
Description: create to show thumbnail-image function.php 
<?php
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1200, 9999 );
?>
<!-------------------------------------------------->
Abbreviation: widget
Description: create widget to show widgetin the admin dashboard by function.php 
<?php

/**
 * Widget Name $cpt$
 */
function demolition_widgets_$cpt$_init() {
    register_sidebar( array(
        'name' => __( '$cpt$', 'demolition' ),
        'id' => '$cpt$',
        'description' => __( 'Add widgets here to appear in your sidebar.', 'demolition' ),
        'before_widget' => ' ',
        'after_widget' => '',
        'before_title' =>'',
        'after_title' =>'',
    ) );
}
add_action( 'widgets_init', 'demolition_widgets_$cpt$_init' );

?>

<!-------------------------------------------------->
Abbreviation: excerpt
Description: get the excerpt function quickly
<?php
echo substr(get_the_excerpt(), 0, 110); ?>

<!-------------------------------------------------->