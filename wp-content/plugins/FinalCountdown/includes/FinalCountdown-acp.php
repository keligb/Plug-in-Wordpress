<h1>Réglages Final Countdown</h1>

<h2>Configuration du compte à rebours</h2>

<form action="" method="post">
    <label for="date">Date</label>
    <input type="date" id="date" name="date" />

    <label for="heure">Heure</label>
    <input type="time" id="heure" name="heure" />

    <input type="submit" onClick="lea()">
</form>

<script>
    // function lea() {
    //     var date = document.getElementById('date');
    //     var heure = document.getElementById('heure');


    //     var test1 = date.value;
    //     var test2 = heure.value;

    //     // console.log(test1);
    //     alert(test1.replace(/-/g, ',') + ',' + test2.replace(':', ','));
    // }
</script>

<?php
    // add_action( 'wp_enqueue_scripts', 'script');

    // function script(){
    //     wp_enqueue_script('recup-form', plugins_url('/recup-form.js',__FILE__));
    // }
?>

<?php
    // function getFuseaux(){
    //     global $wpdb;
    //     $wpdb->query("SELECT * FROM {$wpdb->prefix}fuseaux");
    // }
?>



<!-- //Définir options de réglage
// + texte ? 
// Changement du fuseau horaire -->