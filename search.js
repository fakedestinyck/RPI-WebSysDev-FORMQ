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
    preferences = [false,false,false,false,false,false,false,false,false,false,false];
    $("#button").click(function(){
        if($('#smoking').is(":checked")){
            preferences[0]=true;
        }
        if($('#bedtime').is(":checked")){
            preferences[1]=true;
        }
        if($('#mornnight').is(":checked")){
            preferences[2]=true;
        }
        if($('#pets').is(":checked")){
            preferences[3]=true;
        }
        if($('#schedule').is(":checked")){
            preferences[4]=true;
        }
        if($('#mess').is(":checked")){
            preferences[5]=true;
        }
        if($('#drink').is(":checked")){
            preferences[6]=true;
        }
        if($('#party').is(":checked")){
            preferences[7]=true;
        }
        if($('#tv').is(":checked")){
            preferences[8]=true;
        }
        if($('#gamer').is(":checked")){
            preferences[9]=true;
        }
        if($('#music').is(":checked")){
            preferences[10]=true;
        }
        console.log(preferences);
    });
});
