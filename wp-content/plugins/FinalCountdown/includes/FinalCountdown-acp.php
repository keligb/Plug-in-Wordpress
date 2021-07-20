
<h1>Réglages Final Countdown</h1>

<h2>Configuration du compte à rebours</h2>

<form action="" method="post">
    <label for="date">Date</label>
    <input type="date" id="date" name="date" />

    <label for="heure">Heure</label>
    <input type="time" id="heure" name="heure" />

    <input type="submit" onClick="controle()">
</form>

<script>
    function controle() {
    var date = document.getElementById('date');
    var heure = document.getElementById('heure');

    alert(date.value);
    alert(heure.value);
    }
    
</script>


<?php
    // function getFuseaux(){
    //     global $wpdb;
    //     $wpdb->query("SELECT * FROM {$wpdb->prefix}fuseaux");
    // }
?>



<!-- //Définir options de réglage
// + texte ? 
// Changement du fuseau horaire -->