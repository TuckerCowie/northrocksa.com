<?php
/**
 * The Facebook Album Widget
 * Displays 6
 */
if (!defined('DB_NAME')) {
  header('HTTP/1.0 403 Forbidden');
  die;
}

add_action( 'widgets_init', create_function( '', 'return register_widget( "FB_Album_Widget" );' ) );
class FB_Album_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct( 'facebook-album', 'Facebook Album', array('description' => 'Paste a Facebook Page album URL and display the most recent photos as a widget.') );
    //Widget has been set up
  }

  public function form( $instance ) {
    //The form you see on the admin side
      $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'url' => '', 'thumb_size' => '', 'limit' => '6', 'show_album_title' => '') );
    $title = $instance['title'];
      $url = $instance['url'];
    $thumb_size = $instance['thumb_size'];
    $limit = $instance['limit'];
    $show_album_title = $instance['show_album_title'];
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'facebook-albums'); ?>: </label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></p>
      <p><label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Facebook Album URL', 'facebook-albums'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo attribute_escape($url); ?>" /></label></p>
      <p><label for="<?php echo $this->get_field_id('limit'); ?>">Number of pictures: <input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo attribute_escape($limit); ?>" size="3"/></label></p>
    <?php
  }

  public function update( $new_instance, $old_instance ) {
    //Saves the options

    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['url'] = $new_instance['url'];
    $instance['limit'] = $new_instance['limit'];

    //Before exiting out, lets clear the cache.
    FB_Album::_set_album_url($instance['url']);
    $album_id = FB_Album::_get_album_id();
    FB_Album::clear_cache($album_id);

    return $instance;
  }

  public function widget( $args, $instance ) {
    extract($args);

    echo $before_widget;

    if(!empty($instance['title']))
      echo $before_title . esc_attr($instance['title']) . $after_title;

    //Loads up plugin variables
    FB_Album::load_options();

    //We need to see if the widget has been overridden for this page.
    global $post;
    $wp_pages = FB_Album::$options['pages'];
    $facebook_album_url = (!empty($wp_pages[$post->ID])) ? $wp_pages[$post->ID] : $instance['url'];


    if($facebook_album_url != '') {
      FB_Album::_set_album_url( $facebook_album_url );
    } else {
      //We didn't have a URL!
      echo 'No Facebook Album specified.';
      echo $after_widget;
      return;
    }

    if(!FB_Album::_get_album_id()) {
      echo 'The Facebook album ID came up empty, double check the URL';
      echo $after_widget;
      return;
    } else {

      //Checks if Facebook API came back with a result
      if(!($fb = FB_Album::_get_graph_results($instance['limit'])) ) {
        echo 'Sorry, there was an error loading the Facebook album, please refresh the page and try again.';
        echo $after_widget;
        return;
      }

      //Checks if has photo data
      if(!$fb['data']) {
        echo 'Facebook API came back with a faulty result. You may be accessing an album you do not have permissions to access.';
      } else {
        FB_Album::_enqueue_resources();
       ?>
        <div class="row">
          <?php foreach ($fb['data'] as $img) :
            $thumbnail_src_url = FB_Album::check_thumbnail_src_size_url($img, 5); ?>
            <div class="col-xs-4" style="padding: 15px">
              <a href="<?= $img['link']; ?>" target="_blank" class="nr_card nr_card_image nr_card_image--1x1" style="background-image: url('<?php echo FB_Album::_clean_url($thumbnail_src_url) ?>');">
                <div class="content"></div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php }
    }
    echo $after_widget;
  }
}
?>
