function controle() {
    var date = document.getElementById('date');
    var heure = document.getElementById('heure');


    var test1 = date.value;
    var test2 = heure.value;

    console.log(test1);
    alert(test1.replace(/-/g, ',') + ',' + test2.replace(':', ','));

    console.log("coucou");
}