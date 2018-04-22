import {match_similar} from 'algo'; 


 $(document).on('click', '.panel-heading span.clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
 })

 $(document).ready(function(){
    $("#request1").click(function() {
        if ($("#contentx").hasClass("hidden")) {
            $("#contentx").removeClass("hidden");
            $("#expand").addClass("hidden");
        }
        else {
            $("#contentx").addClass("hidden");
            $("#expand").removeClass("hidden");
        }
    });
    preferences = [true,true,true,true,true,true,true,true,true,true,true];
    $("#button").click(function(){
        if($('#smoking').is(":checked")){
            preferences[0]=false;
        }
        if($('#bedtime').is(":checked")){
            preferences[1]=false;
        }
        if($('#mornnight').is(":checked")){
            preferences[2]=false;
        }
        if($('#pets').is(":checked")){
            preferences[3]=false;
        }
        if($('#schedule').is(":checked")){
            preferences[4]=false;
        }
        if($('#mess').is(":checked")){
            preferences[5]=false;
        }
        if($('#drink').is(":checked")){
            preferences[6]=false;
        }
        if($('#party').is(":checked")){
            preferences[7]=false;
        }
        if($('#tv').is(":checked")){
            preferences[8]=false;
        }
        if($('#gamer').is(":checked")){
            preferences[9]=false;
        }
        if($('#music').is(":checked")){
            preferences[10]=false;
        }
        console.log(preferences);
        //CHANGE THIS TO BE FOR THE GROUP_ID OF THE PERSON WHO IS CLICKING THE BUTTON
        var matches = match_similar(1 ,preferences);
    });
});
