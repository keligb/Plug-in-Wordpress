<?php

//add_action('wp_footer', 'FinalCountdown_FooterText');

function FinalCountdown_FooterText(){

    echo " 
         <div class=\"wrap\"
            <div class=\"content\">
                <h1>Coming soon</h1>
                <div class=\"numbers\">
                    <div class=\"bloc\" id=\"days\">
                    </div>
                    <div class=\"bloc\" id=\"hours\">
                    </div>
                    <div class=\"bloc\" id=\"minutes\">
                    </div>
                    <div class=\"bloc\" id=\"seconds\">
                    </div>
                </div>
            </div>
          </div> 
          ";
          //var_dump( $result->get_error_data() ) ; exit( 0 ) ;
}

add_action( 'wp_enqueue_scripts', 'scripts');

function scripts(){
    wp_enqueue_script('jquery', plugins_url('/jquery.min.js',__FILE__));
    wp_enqueue_script('script', plugins_url('/script.js',__FILE__));
    wp_enqueue_style('style', plugins_url('/style.css',__FILE__));
    // wp_enqueue_script('recup-form', plugins_url('/recup-form.js',__FILE__));

}

add_action('admin_enqueue_scripts', 'test');

function test(){
    wp_enqueue_script('script', plugins_url('/script.js',__FILE__));
    wp_enqueue_script('jquery', plugins_url('/jquery.min.js',__FILE__));
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
    return "<div class=\"wrap\"
    <div class=\"content\">
        <h1>Coming soon</h1>
        <p>DU TEXTE</p>
        <div class=\"numbers\">
            <div class=\"bloc\" id=\"days\">
            </div>
            <div class=\"bloc\" id=\"hours\">
            </div>
            <div class=\"bloc\" id=\"minutes\">
            </div>
            <div class=\"bloc\" id=\"seconds\">
            </div>
        </div>
    </div>
  </div>";
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
                $wpdb->insert("{$wpdb->prefix}countdow", array('email' => $email));
            }
        }
    }
}

add_action('widgets_init', 'FinalCountdown_Registerwidgets');

function FinalCountdown_Registerwidgets() {
    register_widget('FinalCountdown_Widget');
}

function final_countdown_custom_box () {
    add_meta_box('final-countdown-shortcode', __('Comment intégrer le compte à rebours ?'), 'wp_shrt_final_countdown', 'post', 'side' );
}

function wp_shrt_final_countdown() {
    echo '<p>';
    _e('Pour afficher le shortcode, ajoutez le shortcode suivant à votre page ou à votre article.', 'final-countdown');
    
    echo '<p>';
    echo '<div class="">[FinalCountdown]</div>';
    
    echo '<p>';
    _e('Si vous ajoutez le shortcode aux fichiers de votre thème, ajoutez le code de template suivant.', 'final-countdown');
    
    echo '<p>';
    echo '<div>&lt;?php echo do_shortcode("[FinalCountdown]");?&gt; </div>' ;
}

add_action('add_meta_boxes', 'final_countdown_custom_box');
