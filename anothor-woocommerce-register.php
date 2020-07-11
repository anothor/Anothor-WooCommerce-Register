<?php
/*
Plugin Name: Anothor WooCommerce Register
Plugin URI: https://anothor.com
Description: Custom WooCommerce register form use [anc_registration]
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

    add_action( 'wp_enqueue_scripts', 'anothor_plugin_css' );

    function anothor_plugin_css() {
    
        wp_enqueue_style( 'anc-wc-register-style', plugins_url( 'anc-style.css', __FILE__ ) );
        wp_enqueue_script ( 'anc-wc-register-script', plugins_url( 'assets/js/anc-script.js', __FILE__ ) ,array(), '', true );
    
    }

   
    add_shortcode( 'anc_registration', 'anothor_registration_form' );
    
    function anothor_registration_form() {
    // if ( is_admin() ) return;
    // if ( is_user_logged_in() ) return;
    ob_start();
    
    ?>
    <form id="stepByStepForm" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="customer-form-register multi-step-form register" >

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
            <li class="progress-bar__dot"><img class="final-icon img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/final-icon.png', __FILE__ ) ); ?>" alt="icon"></li>
        </ul>

        <div class="step step1">
            <div id="register-question-1" class="register-question">
                <h3>คุณเป็นคนสไตล์แบบไหน?<br><small>เลือกได้หลายคำตอบ</small></h3>
                <input class="checkbox-tools" type="checkbox" name="your_style" id="your-style-1"><label class="label-checkbox" for="your-style-1">ชอบทดลองสินค้าหลายหลายประเภทและแบรนด์</label>
                <input class="checkbox-tools" type="checkbox" name="your_style" id="your-style-2"><label class="label-checkbox" for="your-style-2">ชอบของใหม่ล่าสุดเท่านั้น นำเทรน ลองอะไรใหม่ๆด้วยตัวเอง</label>
                <input class="checkbox-tools" type="checkbox" name="your_style" id="your-style-3"><label class="label-checkbox" for="your-style-3">ชอบใช้สินค้าที่เป็นที่รู้จัก ชอบใช้สินค้าที่เป็นที่รู้จัก</label>
                <input class="checkbox-tools" type="checkbox" name="your_style" id="your-style-4"><label class="label-checkbox" for="your-style-4">ไม่ค่อยบำรุงผิวและแต่งหน้า แต่ตอนนี้อยากหันมาดูแลและแต่งหน้า</label>
            </div>
        </div>

        <div class="step step2 hidden">
            <div id="register-question-2" class="register-question">
                <h3>ผิวของคุณโทนสีอะไร?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin_tone" id="skin-tone-1"><label class="label-radio" for="skin-tone-1">ผิวขาว</label>
                    <input class="checkbox-tools" type="radio" name="skin_tone" id="skin-tone-2"><label class="label-radio" for="skin-tone-2">ผิวขาวอมเหลือง</label>
                    <input class="checkbox-tools" type="radio" name="skin_tone" id="skin-tone-3"><label class="label-radio" for="skin-tone-3">ผิวขาวปานกลาง</label>
                    <input class="checkbox-tools" type="radio" name="skin_tone" id="skin-tone-4"><label class="label-radio" for="skin-tone-4">ผิวแทน</label>
                    <input class="checkbox-tools" type="radio" name="skin_tone" id="skin-tone-5"><label class="label-radio" for="skin-tone-5">ผิวเข้ม</label>
                </div>
            </div>
        </div>

        <div class="step step3 hidden">
            <div id="register-question-3" class="register-question">
                <h3>ผิวหน้าของคุณเป็นอย่างไร?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin_face" id="skin-face-1"><label class="label-radio" for="skin-face-1"><img class="face-skin-tone img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/face-skin-tone-1.png', __FILE__ ) ); ?>" alt="icon">ผิวธรรมดา</label>
                    <input class="checkbox-tools" type="radio" name="skin_face" id="skin-face-2"><label class="label-radio" for="skin-face-2"><img class="face-skin-tone img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/face-skin-tone-2.png', __FILE__ ) ); ?>" alt="icon">ผิวมัน</label>
                    <input class="checkbox-tools" type="radio" name="skin_face" id="skin-face-3"><label class="label-radio" for="skin-face-3"><img class="face-skin-tone img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/face-skin-tone-3.png', __FILE__ ) ); ?>" alt="icon">ผิวแห้ง</label>
                    <input class="checkbox-tools" type="radio" name="skin_face" id="skin-face-4"><label class="label-radio" for="skin-face-4"><img class="face-skin-tone img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/face-skin-tone-4.png', __FILE__ ) ); ?>" alt="icon">ผิวผสม</label>
                </div>
            </div>
        </div>

        <div class="step step4 hidden">
            <div id="register-question-4" class="register-question">
                <h3>คุณต้องการแก้ปัญหาผิวด้านไหน?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin_repair" id="skin-repair-1"><label class="label-radio" for="skin-repair-1"><img class="skin-repair img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/skin-repair-1.png', __FILE__ ) ); ?>" alt="icon">ลดการเกิดสิว</label>
                    <input class="checkbox-tools" type="radio" name="skin_repair" id="skin-repair-2"><label class="label-radio" for="skin-repair-2"><img class="skin-repair img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/skin-repair-2.png', __FILE__ ) ); ?>" alt="icon">ลดริ้วรอย</label>
                    <input class="checkbox-tools" type="radio" name="skin_repair" id="skin-repair-3"><label class="label-radio" for="skin-repair-3"><img class="skin-repair img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/skin-repair-3.png', __FILE__ ) ); ?>" alt="icon">ขาวกระจ่างใส</label>
                    <input class="checkbox-tools" type="radio" name="skin_repair" id="skin-repair-4"><label class="label-radio" for="skin-repair-4"><img class="skin-repair img-thumbnail" src="<?php echo esc_url( plugins_url( 'assets/images/skin-repair-4.png', __FILE__ ) ); ?>" alt="icon">เพิ่มความชุ่มชื่น</label>
                </div>
            </div>
        </div>

        <div class="step step5 hidden">
            <div id="register-question-5" class="register-question">
                <h3>คุณเลือกซื้อสกินแคร์แบบไหน?</h3>
                <div class="radio-selection">
                    <input class="checkbox-tools" type="radio" name="skin_care" id="skin-care-1"><label class="label-radio" for="skin-care-1">ไม่เลย ใช้อะไรก็ได้</label>
                    <input class="checkbox-tools" type="radio" name="skin_care" id="skin-care-2"><label class="label-radio" for="skin-care-2">มีเช็คบ้าง แต่มีได้กังวลมาก</label>
                    <input class="checkbox-tools" type="radio" name="skin_care" id="skin-care-3"><label class="label-radio" for="skin-care-3">กังวลมาก เช็ครายละเอียดตลอด</label>
                </div>
            </div>
        </div>

        <div class="step step6 hidden">
            <div id="register-question-6" class="register-question">
                <h3>คุณกำลังจะได้ลองกล่องของเราแล้ว</h3>
                <div class="final-reg-form">
                    <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(  ! empty( $_POST['first_name'] ) ? sanitize_text_field( $_POST['first_name'] ) : '' ); ?>" size="50" placeholder="ชื่อ" />
                    <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(  ! empty( $_POST['last_name'] ) ? sanitize_text_field( $_POST['last_name'] ) : '' ); ?>" size="50" placeholder="นามสกุล" />
                    <select id="age" name="age" width="100">
                        <option value="0" disabled selected>ช่วงอายุ</option>
                        <option value="18 - 25">18 - 25</option>
                        <option value="26 - 35">26 - 35</option>
                        <option value="36 - 45">36 - 45</option>
                        <option value="46 - 55">46 - 55</option>
                        <option value="56 - 60">56 - 60</option>
                        <option value="60 +">60 +</option>
                    </select>
                    <select id="gender" name="gender">
                        <option value="-" disabled selected>เพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                        <option value="LGBTQ">LGBTQ+</option>
                    </select>
                    <select id="salary" name="salary">
                        <option value="0" disabled selected>รายได้ต่อเดือน</option>
                        <option value="1 - 20,000">1 - 20,000</option>
                        <option value="20,001 - 40,0000">20,001 - 40,0000</option>
                        <option value="40,001 - 60,0000">40,001 - 60,0000</option>
                        <option value="60,001 - 80,0000">60,001 - 80,0000</option>
                        <option value="80,0000 +">80,0000 +</option>
                    </select>
                    

                    <input type="text" name="username" id="username" value="<?php echo esc_attr(  ! empty( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : '' ); ?>" size="25" placeholder="Username">
                    <input type="email" name="email" id="email" value="<?php echo esc_attr(  ! empty( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '' ); ?>" placeholder="Email">
                    <input type="text" name="password" id="password" value="<?php echo esc_attr(  ! empty( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '' ); ?>" placeholder="Password">

                    <button id="submit-register" type="submit" name="submit" class="button"><h4>สมัครสมาชิก</h4></button>

                </div>
            </div>
        </div>

        <div class="button-group">
            <button id="previous" class="button disabled hidden" disabled>ย้อนกลับ</button>
            <button id="next" class="button">ต่อไป</button>
        </div>
    
    </form>
    
    <?php
        
    return ob_get_clean();
    }


if (isset($_POST['submit']))
{
    $username   =   sanitize_user( $_POST['username'] );
    $email = sanitize_email( $_POST['email'] );
    $password = esc_attr( $_POST['password'] );

    $user = new_user_with_metadata($username, $password, $email);

    // global $reg_errors;
    // $reg_errors = new WP_Error;

    // $your_style = $_POST['your_style'];
    // $skin_tone = $_POST['skin_tone'];
    // $skin_face = $_POST['skin_face'];
    // $skin_repair = $_POST['skin_repair'];
    // $skin_care = $_POST['skin_care'];
    // $age = $_POST['age'];
    // $gender = $_POST['gender'];
    // $salary = $_POST['salary'];

    // $info_array = array(
    //     $_POST['your_style'],
    //     $_POST['skin_tone'],
    //     $_POST['skin_face'],
    //     $_POST['skin_repair'],
    //     $_POST['skin_care'],
    //     $_POST['age'],
    //     $_POST['gender'],
    //     $_POST['salary']
    // );
    // $user_info = serialize($info_array);

    // $first_name = sanitize_text_field($_POST['first_name']);
    // $last_name = sanitize_text_field($_POST['last_name']);

    // sanitize user form input
    // global $username, $useremail;
    // $username   =   sanitize_user( $_POST['username'] );
    // $email = sanitize_email( $_POST['email'] );
    // $password = esc_attr( $_POST['password'] );
    
    // $userdata = array(
    //     'first_name'    =>   $first_name,
    //     'last_name'    =>   $last_name,
    //     'user_login'    =>   $username,
    //     'user_email'    =>   $email,
    //     // 'user_pass'     =>   null,
    //     'description'   =>  $user_info
    //     );
        
    // $new_user_id = wp_insert_user( $userdata );

}

function new_user_with_metadata( $username, $password, $email ) {
    //this is just an example, in your function you can pass as many fields as you want
    $meta = array(
        'life_style' => $_POST['your_style'],
        'skin_tone' => $_POST['skin_tone'],
        'skin_face' => $_POST['skin_face'],
        'skin_repair' => $_POST['skin_repair'],
        'skin_care' => $_POST['skin_care'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'salary' => $_POST['salary']
    );
    
    //let's create our user
    $user = wp_create_user( $username, $password, $email );
    
    //check if there are no errors
    if ( ! is_wp_error( $user ) ) {
      foreach( $meta as $key => $val ) {
        update_user_meta( $user, $key, $val ); 
      }
    }
    
    return $user;
  }