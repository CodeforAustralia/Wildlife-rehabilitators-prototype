$(function () {

		/*$('.datepicker').pickadate({
    		selectMonths: true, // Creates a dropdown to control month
    		selectYears: 10 // Creates a dropdown of 15 years to control year
  		});

  		$('.timepicker').pickatime({
    		autoclose: false,
    		twelvehour: false,
    		donetext: 'OK',
  			autoclose: false,
  			vibrate: true // vibrate the device when dragging clock hand
 		});*/

		$('select').material_select();

        $("#monday").change(function() {
    		$('#monday_from').attr('disabled',!this.checked);
    		$('#monday_to').attr('disabled',!this.checked);
		});

		$("#tuesday").change(function() {
    		$('#tuesday_from').attr('disabled',!this.checked);
    		$('#tuesday_to').attr('disabled',!this.checked);
		});

		$("#wednesday").change(function() {
    		$('#wednesday_from').attr('disabled',!this.checked);
    		$('#wednesday_to').attr('disabled',!this.checked);
		});

		$("#thursday").change(function() {
    		$('#thursday_from').attr('disabled',!this.checked);
    		$('#thursday_to').attr('disabled',!this.checked);
		});

		$("#friday").change(function() {
    		$('#friday_from').attr('disabled',!this.checked);
    		$('#friday_to').attr('disabled',!this.checked);
		});

		$("#saturday").change(function() {
    		$('#saturday_from').attr('disabled',!this.checked);
    		$('#saturday_to').attr('disabled',!this.checked);
		});

		$("#sunday").change(function() {
    		$('#sunday_from').attr('disabled',!this.checked);
    		$('#sunday_to').attr('disabled',!this.checked);
		});

     $("#closure_periods").change(function () {
        $("#closed_period").toggle();
                           
     });

        $('ul#filter a').click(function() {
            $(this).css('outline','none');
            $('ul#filter .current').removeClass('current');
            $(this).parent().addClass('current');

            var filterVal = $(this).text().toLowerCase().replace(' ','-');

            if(filterVal == 'all') {
              $('ul#species_list li.hidden').fadeIn('slow').removeClass('hidden');
            } else {
              $('ul#species_list li').each(function() {
                if(!$(this).hasClass(filterVal)) {
                  $(this).fadeOut('normal').addClass('hidden');
                } else {
                  $(this).fadeIn('slow').removeClass('hidden');
                }
              });
            }
              return false;
        });

        
});