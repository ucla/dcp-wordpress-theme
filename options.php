<?php
  /**
   * Create A Simple Theme Options Panel
   * https://www.wpexplorer.com/wordpress-theme-options/
   */

  // Exit if accessed directly
  if ( ! defined( 'ABSPATH' ) ) {
  	exit;
  }

  // Start Class
  if ( ! class_exists( 'UCLA_Theme_Options' ) ) {

  	class UCLA_Theme_Options {

  		/**
  		 * Start things up
  		 *
  		 * @since 1.0.0
  		 */
  		public function __construct() {

  			// We only need to register the admin panel on the back-end
  			if ( is_admin() ) {
  				add_action( 'admin_menu', array( 'UCLA_Theme_Options', 'add_admin_menu' ) );
  				add_action( 'admin_init', array( 'UCLA_Theme_Options', 'register_settings' ) );
  			}

  		}

  		/**
  		 * Returns all theme options
  		 *
  		 * @since 1.0.0
  		 */
  		public static function get_theme_options() {
  			return get_option( 'theme_options' );
  		}

  		/**
  		 * Returns single theme option
  		 *
  		 */
  		public static function get_theme_option( $id ) {
  			$options = self::get_theme_options();
  			if ( isset( $options[$id] ) ) {
  				return $options[$id];
  			}
  		}

  		/**
  		 * Add sub menu page
  		 *
  		 * @since 1.0.0
  		 */
  		public static function add_admin_menu() {
  			add_menu_page(
  				esc_html__( 'Theme Settings', 'text-domain' ),
  				esc_html__( 'Theme Settings', 'text-domain' ),
  				'manage_options',
  				'theme-settings',
  				array( 'UCLA_Theme_Options', 'create_admin_page' )
  			);
  		}

  		/**
  		 * Register a setting and its sanitization callback.
  		 *
  		 * We are only registering 1 setting so we can store all options in a single option as
  		 * an array. You could, however, register a new setting for each option
  		 *
  		 * @since 1.0.0
  		 */
  		public static function register_settings() {
  			register_setting( 'theme_options', 'theme_options', array( 'UCLA_Theme_Options', 'sanitize' ) );
  		}

  		/**
  		 * Sanitization callback
  		 *
  		 * @since 1.0.0
  		 */
  		public static function sanitize( $options ) {

  			// If we have options lets sanitize them
  			if ( $options ) {

  				// Address Line One
  				if ( ! empty( $options['address_input_one'] ) ) {
  					$options['address_input_one'] = sanitize_textarea_field( $options['address_input_one'] );
  				} else {
  					unset( $options['address_input_one'] ); // Remove from options if empty
  				}

          // Address Line Two
  				if ( ! empty( $options['address_input_two'] ) ) {
  					$options['address_input_two'] = sanitize_textarea_field( $options['address_input_two'] );
  				} else {
  					unset( $options['address_input_two'] ); // Remove from options if empty
  				}

  			}

  			// Return sanitized options
  			return $options;

  		}


  		/**
  		 * Settings page output
  		 *
  		 * @since 1.0.0
  		 */
  		public static function create_admin_page() { ?>

  			<div class="wrap">

  				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

  				<form method="post" action="options.php">

  					<?php settings_fields( 'theme_options' ); ?>

  					<table class="form-table UCLA-custom-admin-login-table">
              <?php // Text input example ?>
  						<tr valign="top">
  							<th scope="row"><?php esc_html_e( 'Footer Address', 'text-domain' ); ?></th>
  							<td>
  								<?php $address_one = self::get_theme_option( 'address_input_one' ); ?>
  								<input type="text" name="theme_options[address_input_one]" value="<?php echo esc_attr( $address_one ); ?>"/>
                  <br/>
                  <?php $address_two = self::get_theme_option( 'address_input_two' ); ?>
                  <input type="text" name="theme_options[address_input_two]"  value="<?php echo esc_attr( $address_two ); ?>"/>
  							</td>
  						</tr>

  					</table>

  					<?php submit_button(); ?>

  				</form>

  			</div><!-- .wrap -->
  		<?php }

  	}
  }
  new UCLA_Theme_Options();

  // Helper function to use in your theme to return a theme option value
  function myprefix_get_theme_option( $id = '' ) {
  	return UCLA_Theme_Options::get_theme_option( $id );
  }
