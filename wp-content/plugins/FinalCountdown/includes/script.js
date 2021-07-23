jQuery(function($){
    var launch = new Date(2021,06,23,15,13,00);
    var days = $('#days');
    var hours = $('#hours');
    var minutes = $('#minutes');
    var seconds = $('#seconds');

    setDate();
    function setDate(){

        var now = new Date();
        var s = (launch.getTime() - now.getTime())/1000; //- now.getTimezoneOffset()*60;
        var d = Math.floor(s/86400);
        days.html('<p>'+d+'</p><p class="nom">Jour'+(d>1?'s</p>':''));
        s -= d*86400;

        

        var h = Math.floor(s/3600);
        hours.html('<p>'+h+'</p><p class="nom">Heure'+(h>1?'s</p>':''));
        s -= h*3600;

        console.log(h);

        var m = Math.floor(s/60);
        minutes.html('<p>'+m+'</p><p class="nom">Minute'+(m>1?'s</p>':''));
        s -= m*60;

        s = Math.floor(s);
        seconds.html('<p>'+s+'</p><p class="nom">Seconde'+(s>1?'s</p>':''));

        if(d<0) {
            days.html('<p>'+0+'</p><p class="nom">Jour'); 
        }

        if(s<0) {
            seconds.html('<p>'+0+'</p><p class="nom">Seconde'); 
        }

        if(d<=0 && h<=0 && m<=0 && s<=0) {
            alert('Le compte à rebours est terminé !');
            days.html('<p>'+0+'</p><p class="nom">Jour</p>');
            hours.html('<p>'+0+'</p><p class="nom">Heure</p>');
            minutes.html('<p>'+0+'</p><p class="nom">Minute</p>');
            seconds.html('<p>'+0+'</p><p class="nom">Seconde</p>');

            return stop;
        }

        timer  = setTimeout(setDate, 1000);

        
    }

    function stop() {
        if(timer) {
            clearTimeout(timer);
            timer = 0;
        }
    }
});