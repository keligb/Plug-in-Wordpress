<?php

//Test

add_action('wp_footer', 'FinalCountdown_FooterText');

function FinalCountdown_FooterText(){
    echo "<i>Le plugin Final Countdown est activé</i>";
}

//Admin link
add_action('admin_menu', 'FinalCountdown_AdminLink');

function FinalCountdown_AdminLink(){
    add_menu_page(
        'FinalCountdown Page',
        'FinalCountdown',
        'manage_options',
        'FinalCountdown/includes/FinalCountdown-acp.php',
    );
}

//Sortcodes
//[FinalCountdown]

add_shortcode('FinalCountdown', 'FinalCountdownShortcode');

function FinalCountdownShortcode(){
    return "<b>Shortcode Final Countdown</b>";
}

//[FinalCountdown att="value"]
// add_shortcode('FinalCountdown', 'FinalCountdownShortcode2');

// function FinalCountdownShortcode2($atts){
//     $a = shortcode_atts(array(
//         'name' => 'xxx',
//         'y' => 'un autre'
//     ), $atts);

//     return "<p>name = {$a['name']} et y = {$a['y']} </p>";
// }

// WIDGET

class FinalCountdown_Widget extends WP_Widget {
    public function __construct(){
        parent::__construct(
            'FinalCountdown_widget',
            __('Widget FinalCountdown', 'Final Countdown'),
            array(
                'description' => __('Widget simple issu du plugin Final Countdown', 'FinalCountdown')
            )
        );
        add_action('wp_loaded', array($this, 'save_email'));
    }

    public function widget ($args, $instance){
        //front
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget.$before_title.$title.$after_title.
        '<form action="" method="post"> 
            <label for="email_user"> Votre email : </label>
            <input id="email_user" name="email_user" type="email">
            <input type="submit">
        </form>
            '.$after_widget;
    }

    public function form ($instance){
        //back
        $title = isset($instance['title']) ? $instance['title']: '';
        echo '<p><label for="'.$this->get_field_name('title').'">Titre : </label><br />
              <input type="text" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" value="'.$title.'"></p>
             ';
    }

    public function update ($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    public function save_email(){
        if(isset($_POST['email_user']) && !empty($_POST['email_user'])){
            global $wpdb;
            $email = $_POST['email_user'];
            
            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}final_countdown_table WHERE email='$email'");

            if(is_null($row)){
                $wpdb->insert("{$wpdb->prefix}final_countdown_table", array('email' => $email));
            }
        }
    }
}

add_action('widgets_init', 'FinalCountdown_Registerwidgets');

function FinalCountdown_Registerwidgets() {
    register_widget('FinalCountdown_Widget');
}