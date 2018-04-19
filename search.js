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
});