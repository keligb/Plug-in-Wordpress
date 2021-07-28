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
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}countdow (id INT AUTO_INCREMENT PRIMARY KEY,
                  email VARCHAR(255) NOT NULL); ");

    // $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fuseaux (id INT AUTO_INCREMENT PRIMARY KEY, 
    //               nom VARCHAR(255) NOT NULL); ");

    // $wpdb->query("INSERT INTO {$wpdb->prefix}fuseaux (nom) VALUES 
    // ('Afrique'),('Amerique'), ('Antarctique'), ('Arctique'), ('Asie'), ('Atlantique'), ('Australie'), ('Europe'), ('Inde'), ('Pacifique') ");

    // $wpdb->query("ALTER TABLE `{$wpdb->prefix}fuseaux` ADD CONSTRAINT `fk_User_Role1` FOREIGN KEY (`Role_idRole`) REFERENCES `tr_role` (`idRole`) 
    // ON DELETE NO ACTION ON UPDATE NO ACTION;");

}

register_deactivation_hook(__FILE__, 'FinalCountdown_deactivation');

function FinalCountdown_deactivation(){
    global $wpdb;

    $wpdb->query("DROP TABLE IF EXISTS wordpress.{$wpdb->prefix}countdow;");

    //$wpdb->query("DROP TABLE IF EXISTS wordpress.{$wpdb->prefix}fuseaux;");
}

//Bonus : avant de supprimer la table demander à l'utilisateur s'il souhaite la supprimer