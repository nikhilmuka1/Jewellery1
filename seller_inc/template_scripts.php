<?php
/**
 * template_scripts.php
 *
 * Author: pixelcave
 *
 * All vital JS scripts are included here
 *
 */
?>

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="<?php echo BASE_URL;?>js/vendor/jquery.min.js"></script>
<script src="<?php echo BASE_URL;?>js/vendor/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL;?>js/plugins.js"></script>
<script src="<?php echo BASE_URL;?>js/app.js"></script>
<script src="<?php echo BASE_URL;?>js/jquery.validate.js"></script>
<script src="<?php echo BASE_URL;?>js/nj_form.js"></script>
<!-- START PRELOADS -->
<audio id="audio-alert" src="<?php echo BASE_URL;?>audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="<?php echo BASE_URL;?>audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS --> 
<script>
// Logout Audio
/* PLAY SOUND FUNCTION */
function playAudio(file){
    if(file === 'alert')
        document.getElementById('audio-alert').play();

    if(file === 'fail')
        document.getElementById('audio-fail').play();    
}
/* END PLAY SOUND FUNCTION */
/* MESSAGE BOX */
    $(".mb-control").on("click",function(){
        var box = $($(this).data("box"));
        if(box.length > 0){
            box.toggleClass("open");

            var sound = box.data("sound");
            if(sound === 'alert')
                playAudio('alert');

            if(sound === 'fail')
                playAudio('fail');

        }        
        return false;
    });
    $(".mb-control-close").on("click",function(){
       $(this).parents(".message-box").removeClass("open");
       return false;
});    
/* END MESSAGE BOX */    
// Logout    
/* Show Timee */   
function updatingClock(selector, type) {
function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }
    function currentDate() {
        var currentDate = new Date;
        var Day = currentDate.getDate();
        if (Day < 10) {
            Day = '0' + Day;
        } //end if
        var Month = currentDate.getMonth() + 1;
        if (Month < 10) {
            Month = '0' + Month;
        } //end if
        var Year = currentDate.getFullYear();
        var fullDate = Month + '/' + Day + '/' + Year;
        return fullDate;
    } //end current date function

    function currentTime() {
        var currentTime = new Date;
        var Minutes = currentTime.getMinutes();
        if (Minutes < 10) {
            Minutes = '0' + Minutes;
        }
        var Hour = currentTime.getHours();
        if (Hour > 12) {
            Hour -= 12;
        } //end if
         var today = new Date();
        var s = checkTime(today.getSeconds());
        
        var Time = Hour + ':' + Minutes + ':' + s;
        if (currentTime.getHours() <= 12) {
            Time += ' AM';
        } //end if
        if (currentTime.getHours() > 12) {
            Time += ' PM';
        } //end if
        
        return Time;
    } // end current time function


    function updateOutput() {
        var output;
        if (type == 'time') {
            output = currentTime();
            if ($(selector).text() != output) {
                $(selector).text(output);
            } //end if
        } //end if
        if (type == 'date') {
            output = currentDate();
            if ($(selector).text() != output) {
                $(selector).text(output);
            } //end if
        } //end if
        if (type == 'both') {
            output = currentDate() + ' at ' + currentTime();
            if ($(selector).text() != output) {
                $(selector).text(output);
            } //end if
        } //end if
    }//end update output function
    updateOutput();
    window.setInterval(function() {
        updateOutput();
    }, 1000); //run update every 1 second
} // end updating clock function
updatingClock('#date-time', 'both');   
/* Show Timee */
</script>
