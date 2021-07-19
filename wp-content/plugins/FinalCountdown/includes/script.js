jQuery(function($){
    var launch = new Date(2021,06,14,23,00,00);
    var days = $('#days');
    var hours = $('#hours');
    var minutes = $('#minutes');
    var seconds = $('#seconds');

    setDate();
    function setDate(){

        var now = new Date();
        var s = ((launch.getTime() - now.getTime())/1000) - now.getTimezoneOffset()*60;
        var d = Math.floor(s/86400);
        days.html('<p>'+d+'</p><p class="nom">Jour'+(d>1?'s</p>':''));
        s -= d*86400;

        var h = Math.floor(s/3600);
        hours.html('<p>'+h+'</p><p class="nom">Heure'+(h>1?'s</p>':''));
        s -= h*3600;

        var m = Math.floor(s/60);
        minutes.html('<p>'+m+'</p><p class="nom">Minute'+(m>1?'s</p>':''));
        s -= m*60;

        s = Math.floor(s);
        seconds.html('<p>'+s+'</p><p class="nom">Seconde'+(s>1?'s</p>':''));

        setTimeout(setDate, 1000);
    }
});