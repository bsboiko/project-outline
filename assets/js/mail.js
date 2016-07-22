// Just adding functionality to the mail form

$function(){
 var form = $('#ajax-contact')

 var formMessages =$('#messages')

$(form).submit(function(event)){
	event.preventDefault();

var formData $(form).serialize();

$ajax({
	type: 'Post',
	url: $(form).attr('action'),
	data: formData
})
.done(function (response) {
	$formMessages removeClass.('error');
	$formMessages addClass.('success');
	$formMessages text(response);
	$(name).val('')
	$(emial).val('')
	$(messages).val(''),
})
.fail(function(data)){
	$formMessages removeClass.('success');
	$formMessages addClass.('error');
	if (data.responseText !==''){
		$(formMessages).text(data.ResonseText);
		else {
			$(formMessages).text('Oops! Your message could not be sent.');
		}
};

};