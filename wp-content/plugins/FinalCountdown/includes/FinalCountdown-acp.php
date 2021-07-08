
<h1>Réglages Final Countdown</h1>

<h2>Changement du fuseau horaire</h2>

<form action="" method="post">
    <label for="fuseaux">Choisissez votre fuseau horaire</label>
    <select name="fuseaux">
        <option value="">--- Choisissez une option ----</option>
        <option value="id_du_fuseau">Amérique</option>
        <option value="id_du_fuseau">Europe</option>
        <option value="id_du_fuseau">Inde</option>
    </select>

    <input type="submit">
</form>

<?php
    // function getFuseaux(){
    //     global $wpdb;
    //     $wpdb->query("SELECT * FROM {$wpdb->prefix}fuseaux");
    // }
?>



<!-- //Définir options de réglage
// + texte ? 
// Changement du fuseau horaire -->