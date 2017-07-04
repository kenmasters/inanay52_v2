jQuery(document).ready(function($){

	// Remove empty fields from GET forms
	$("form.filter").submit(function() {
		$(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
		return true;
	});

	$('#new-appointment-result').modal({
		show: false, // to prevent showing even if not triggered
	    backdrop: 'static', // to prevent closing when clicked outside
	    keyboard: false  // to prevent closing with Esc button (if you want this too)
	});

	$('button.attach-result').click(function(){
		var appointment_name = $(this).data('appointment_name');
		var patient_name = $(this).data('patient_name');
		var appointment_date = $(this).data('appointment_date');
		var appointment_time = $(this).data('appointment_time');
		var form_action = $(this).data('form_action');

		var result = $('#new-appointment-result');

		result.find('#appointment_name').text(appointment_name);
		result.find('#patient_name').text(patient_name);
		result.find('#appointment_date').text(appointment_date);
		result.find('#appointment_time').text(appointment_time);
		result.find('form').attr('action', form_action);
	});
	
	// Un-disable form fields when page loads, in case they click back after submission
	// $( "form.filter" ).find( ":input" ).prop( "disabled", false );

	// // Disable all sortable widgets
	// $( ".ui-sortable" ).sortable( "disable" );

 //    $('select#take').on('change', function() {
 //        $('form.filter input[name="take"]').val( $(this).val() );
 //        $('form.filter').trigger('submit');
 //    });

 //    $('.selectpicker li').on('click', function() {
	//     var selected = $(this).attr('rel');
	//     var selectParent = $(this).parents('.bootstrap-select').siblings('.selectpicker');
	//     console.log(selectParent);

	//     if( selected == 0 ) {
	//         selectParent.selectpicker('val', 'All');
	//         selectParent.selectpicker('deselectAll');
	//     } else {
	//         if( selectParent.val() == 'All') {
	//             selectParent.selectpicker('deselectAll');
	//         }
	//         selectParent.find('[value=All]').removeClass('selected');

	//     }

	// });

	// Reset all form inputs
	// $('.reset').on('click', function(e) {
	// 	e.preventDefault();
	// 	$(':input').val('');
	// 	$('.selectpicker').val('').selectpicker('refresh');
 //        $('.selectpicker option').prop('selected', false);
	// });

});

