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
add_shortcode('FinalCountdown', 'FinalCountdownShortcode2');

function FinalCountdownShortcode2($atts){
    $a = shortcode_atts(array(
        'name' => 'xxx',
        'y' => 'un autre'
    ), $atts);

    return "<p>name = {$a['name']} et y = {$a['y']} </p>";
}