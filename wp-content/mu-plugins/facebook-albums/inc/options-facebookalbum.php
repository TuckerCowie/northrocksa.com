<?php
/**
 * Template and actions for options page.
 */
if (!defined('DB_NAME')) {
  header('HTTP/1.0 403 Forbidden');
  die;
}

//For nonce.
global $current_user;
//Setup plugin options.
$options = get_option('facebookalbum', FB_Album::default_options());

//If nonce, do update
if (isset($_POST["fbalbum_nonce"])) :
  $options = $_POST['facebookalbum'];
  update_option('facebookalbum', $options);
  echo '<div class="updated"><p><strong>Facebook Albums has been updated</strong></p></div>';
endif;

if(isset($_GET['reset_application']) && wp_verify_nonce($_GET['reset_application'], $current_user->data->user_email)) :
  unset($options['app_id']);
  unset($options['app_secret']);
  unset($options['access_token']);
  update_option('facebookalbum', $options);
  echo '<div class="updated"><p><strong>Facebook API application has been removed.</strong></p></div>';
endif;

 ?>
      <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Facebook Album <?php _e('Options', 'facebook-albums'); ?></h2>
        <div id="facebook-album-content" class="postbox-container" style="">
        <form method="post" action="" name="options-facebookalbum">
        <?php   wp_nonce_field(basename(__FILE__), 'fbalbum_nonce'); ?>
        <div class="settings-box">
            <?php if(!FB_Album::verify_app_information()) : ?>
            <p><?php _e('Every 2 months, you\'ll need to re-enter your application credentials', 'facebook-albums'); ?></p>
            <p><label><?php _e('App ID', 'facebook-albums'); ?></label><input type="text" name="facebookalbum[app_id]" value="<?php echo $options['app_id']; ?>" /></p>
            <p><label><?php _e('App Secret', 'facebook-albums'); ?></label><input type="text" name="facebookalbum[app_secret]" value="<?php echo $options['app_secret']; ?>" /></p>
            <?php else:
            FB_Album::set_facebook_sdk();
            // Get User ID
            $user = FB_Album::$facebook_sdk->getUser();
            if ($user) {
              try {
                $old_access_token = $options['access_token'];
                // Proceed knowing you have a logged in user who's authenticated.
              $user_profile = FB_Album::$facebook_sdk->api('/me');
              FB_Album::$facebook_sdk->setExtendedAccessToken();
              $options['access_token'] = FB_Album::$facebook_sdk->getAccessToken();
              update_option('facebookalbum', $options);

              } catch (FacebookApiException $e) {
                echo '<div class="error"><p><strong>OAuth Error</strong>Error added to error_log: '.$e.'</p></div>';
                error_log($e);
                $user = null;
              }
            }
            ?>
              <input type="hidden" name="facebookalbum[app_id]" value="<?php echo $options['app_id']; ?>" />
              <input type="hidden" name="facebookalbum[app_secret]" value="<?php echo $options['app_secret']; ?>" />
              <input type="hidden" name="facebookalbum[access_token]" value="<?php echo $options['access_token']; ?>" />
              <?php if($user) : ?>
                <div style="float: right; margin: 10px;"><span style="margin: 0 10px;"><?php echo $user_profile['name']; ?></span><img src="https://graph.facebook.com/<?= $user_profile['id'] ?>/picture?type=square" style="vertical-align: middle"/></div>
              <?php endif; ?>
              <p><?php printf(__('Having issues once logged in? Try <a href="?page=facebook-album&amp;reset_application=%s">resetting application data.</a> <em>warning: removes App ID and App Secret</em>'), wp_create_nonce($current_user->data->user_email)); ?></p>
              <p><strong>Notice!</strong> Your extended access token will only last about 2 months. So visit this page every month or so to keep the access token fresh.</p>
              <p><a href="https://developers.facebook.com/apps/<?php echo $options['app_id']; ?>" target="_blank"><?php _e("View your Facebook application's settings.", 'facebook-albums'); ?></a></li></p>
            <?php endif; ?>
        </div>
            <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
            </p>
        </form>
        </div>
      </div>
