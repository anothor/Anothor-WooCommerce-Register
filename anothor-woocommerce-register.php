<?php
/*
Plugin Name: Anothor WooCommerce Register
Plugin URI: https://anothor.com
Description: Custom WooCommerce register form use [anc_woocommerce_registration_form]
Version: 1.0
Author: Anothor
Author URI: https://anothor.com
WC requires at least: 4.3
WC tested up to: 4.3
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    add_action( 'wp_enqueue_scripts', 'anothor_plugin_css' );

    function anothor_plugin_css() {
    
        wp_enqueue_style( 'anc-wc-register-style', plugins_url( 'anc-style.css', __FILE__ ) );
        wp_enqueue_script ( 'anc-wc-register-script', plugins_url( 'assets/js/anc-script.js', __FILE__ ) ,array(), '', true );
    
    }

   
    add_shortcode( 'anc_woocommerce_registration_form', 'anothor_woocommerce_registration_form' );
    
    function anothor_woocommerce_registration_form() {
    // if ( is_admin() ) return;
    // if ( is_user_logged_in() ) return;
    ob_start();
    
    // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
    // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
    
    do_action( 'woocommerce_before_customer_login_form' );
    
    ?>
<form id="stepByStepForm" class="multi-step-form">
   <ul class="progress-bar">
      <li class="progress-bar__dot full active">1</li>
      <li class="progress-bar__connector"></li>
      <li class="progress-bar__dot">2</li>
      <li class="progress-bar__connector"></li>
      <li class="progress-bar__dot">3</li>
      <li class="progress-bar__connector"></li>
      <li class="progress-bar__dot">4</li>
      <li class="progress-bar__connector"></li>
      <li class="progress-bar__dot">5</li>
      <li class="progress-bar__connector"></li>
      <li class="progress-bar__dot">6</li>
   </ul>

   <div class="step step1">
    <h3>Step 1</h3>
   </div>

   <div class="step step2 hidden">
    <h3>Step 2</h3>
   </div>

   <div class="step step3 hidden">
    <h3>Step 3</h3>
   </div>

   <div class="step step4 hidden">
    <h3>Step 4</h3>
   </div>

   <div class="step step5 hidden">
    <h3>Step 5</h3>
   </div>

   <div class="step step6 hidden">
      <h3>Step 6</h3>
   </div>

   <div class="button-group">
      <button id="previous" class="button disabled hidden" disabled>
         previous
      </button>
      <button id="next" class="button">
         next
      </button>
      <button id="validate" type="submit" class="hidden button">
         Submit
        </button>
   </div>

</form>

        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
    
            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <div id="register-question-1" class="register-question">
                <h3>คุณเป็นคนสไตล์แบบไหน?</h3>
                <p>เลือกได้หลายคำตอบ</p>
                <p><input class="checkbox-tools" type="checkbox" name="your-style" id="your-style-1"><label class="label-checkbox" for="your-style-1">123123</label></p>
                <p><input class="checkbox-tools" type="checkbox" name="your-style" id="your-style-2"><label class="label-checkbox" for="your-style-2">123123</label></p>
                <p><input class="checkbox-tools" type="checkbox" name="your-style" id="your-style-3"><label class="label-checkbox" for="your-style-3">123123</label></p>
                <p><input class="checkbox-tools" type="checkbox" name="your-style" id="your-style-4"><label class="label-checkbox" for="your-style-4">123123</label></p>
            </div>
            <hr>
            <div id="register-question-2" class="register-question">
                <h3>ผิวของคุณโทนสีอะไร?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin-tone" id="skin-tone-1"><label class="label-radio" for="skin-tone-1">ผิวขาว</label>
                    <input class="checkbox-tools" type="radio" name="skin-tone" id="skin-tone-2"><label class="label-radio" for="skin-tone-2">ผิวขาวอมเหลือง</label>
                    <input class="checkbox-tools" type="radio" name="skin-tone" id="skin-tone-3"><label class="label-radio" for="skin-tone-3">ผิวขาวปานกลาง</label>
                    <input class="checkbox-tools" type="radio" name="skin-tone" id="skin-tone-4"><label class="label-radio" for="skin-tone-4">ผิวแทน</label>
                    <input class="checkbox-tools" type="radio" name="skin-tone" id="skin-tone-5"><label class="label-radio" for="skin-tone-5">ผิวเข้ม</label>
                </div>
            </div>
            <hr>
            <div id="register-question-3" class="register-question">
                <h3>ผิวหน้าของคุณเป็นอย่างไร?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin-face" id="skin-face-1"><label class="label-radio" for="skin-face-1"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวธรรมดา</label>
                    <input class="checkbox-tools" type="radio" name="skin-face" id="skin-face-2"><label class="label-radio" for="skin-face-2"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวมัน</label>
                    <input class="checkbox-tools" type="radio" name="skin-face" id="skin-face-3"><label class="label-radio" for="skin-face-3"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวแห้ง</label>
                    <input class="checkbox-tools" type="radio" name="skin-face" id="skin-face-4"><label class="label-radio" for="skin-face-4"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวผสม</label>
                </div>
            </div>
            <hr>
            <div id="register-question-4" class="register-question">
                <h3>คุณต้องการแก้ปัญหาผิวด้านไหน?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin-repair" id="skin-repair-1"><label class="label-radio" for="skin-repair-1"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวธรรมดา</label>
                    <input class="checkbox-tools" type="radio" name="skin-repair" id="skin-repair-2"><label class="label-radio" for="skin-repair-2"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวมัน</label>
                    <input class="checkbox-tools" type="radio" name="skin-repair" id="skin-repair-3"><label class="label-radio" for="skin-repair-3"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวแห้ง</label>
                    <input class="checkbox-tools" type="radio" name="skin-repair" id="skin-repair-4"><label class="label-radio" for="skin-repair-4"><img class="img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/icon.png', __FILE__ ) ); ?>" alt="icon">ผิวผสม</label>
                </div>
            </div>
            <hr>
            <div id="register-question-5" class="register-question">
                <h3>คุณเลือกซื้อสกินแคร์แบบไหน?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin-care" id="skin-care-1"><label class="label-radio" for="skin-care-1">ไม่เลย ใช้อะไรก็ได้</label>
                    <input class="checkbox-tools" type="radio" name="skin-care" id="skin-care-2"><label class="label-radio" for="skin-care-2">มีเช็คบ้าง แต่มีได้กังวลมาก</label>
                    <input class="checkbox-tools" type="radio" name="skin-care" id="skin-care-3"><label class="label-radio" for="skin-care-3">กังวลมาก เช็ครายละเอียดตลอด</label>
                </div>
            </div>
            <hr>
            <div id="register-question-6" class="register-question">
                <h3>คุณกำลังจะได้ลองกล่องของเราแล้ว</h3>
                
            </div>



            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
    
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </p>
    
            <?php endif; ?>
    
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>
    
            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
    
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                </p>
    
            <?php else : ?>
    
                <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
    
            <?php endif; ?>
    
            <?php do_action( 'woocommerce_register_form' ); ?>
    
            <p class="woocommerce-FormRow form-row">
                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
            </p>
    
            <?php do_action( 'woocommerce_register_form_end' ); ?>
    
        </form>
        <hr>
    <?php
        
    return ob_get_clean();
    }

}

// add_action( 'woocommerce_before_customer_login_form', 'jk_login_message' );
function jk_login_message() {
    if ( get_option( 'woocommerce_enable_myaccount_registration' ) == 'yes' ) {
	?>
		<div class="woocommerce-info">
			<p><?php _e( 'Returning customers login. New users register for next time so you can:' ); ?></p>
			<ul>
				<li><?php _e( 'View your order history' ); ?></li>
				<li><?php _e( 'Check on your orders' ); ?></li>
				<li><?php _e( 'Edit your addresses' ); ?></li>
				<li><?php _e( 'Change your password' ); ?></li>
			</ul>
		</div>
	<?php
	}
}
