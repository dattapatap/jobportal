(function($) {
    "use strict";
	$('#container').showmore({
		closedHeight: 140,
		buttonTextMore: 'Show more',
		buttonTextLess: 'Close',
		buttonCssClass: 'showmore-button',
		animationSpeed: 0.5
	});

    $('#container1').showmore({
		closedHeight: 100,
		buttonTextMore: 'Show more',
		buttonTextLess: 'Close',
		buttonCssClass: 'showmore-button',
		animationSpeed: 0.5
	});


	$('.hide-details').showmore({
		closedHeight: 137,
		buttonTextMore: 'Show more',
		buttonTextLess: 'Close',
		buttonCssClass: 'showmore-button1',
		animationSpeed: 0.5
	});

    var minsal = 15000;
    var maxsal = 40000;
    if( $('#minsalery').val() &&  $('#minsalery').val()){
        minsal =  $('#minsalery').val();
        maxsal =  $('#maxsalery').val();
        console.log(minsal+ '  '+maxsal);
    }

	$( "#mySlider" ).slider({
		range: true,
		min: 10000,
		max: 100000,
		values: [ minsal, maxsal ],
		slide: function( event, ui ) {
                $( "#price" ).val( "₹" + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] );
                $('#minsalery').val(ui.values[ 0 ]);
                $('#maxsalery').val(ui.values[ 1 ]);
        }
	});
	$( "#price" ).val( "₹" + $( "#mySlider" ).slider( "values", 0 ) +
			   " - ₹" + $( "#mySlider" ).slider( "values", 1 ) );
    $('#minsalery').val( $( "#mySlider" ).slider( "values", 0 ));
    $('#maxsalery').val( $( "#mySlider" ).slider( "values", 1 ));

})(jQuery);
