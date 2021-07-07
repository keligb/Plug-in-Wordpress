<?php
/*
* Plugin Name: Final Countdown
* Author: Kelig Brindeau Waruny Rajendran Léa Ifergan
* Version: 1.0
* Description: Plugin permettant de créer un compte à rebours
*/

require_once plugin_dir_path(__FILE__).'includes/FinalCountdown-functions.php';

register_activation_hook(__FILE__, 'FinalCountdown_activation');

function FinalCountdown_activation(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}FinalCountdown (id INT AUTO_INCREMENT PRIMARY KEY,
                  email VARCHAR(255) NOT NULL); ");

}

register_deactivation_hook(__FILE__, 'FinalCountdown_deactivation');

function FinalCountdown_deactivation(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}FinalCountdown;");
}

//Bonus : avant de supprimer la table demander à l'utilisateur s'il souhaite la supprimer

