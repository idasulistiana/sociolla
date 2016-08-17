$(document).ready(function(){
	$('.body_loading').hide();
	$('.loading').hide();
	$('.loading_text').hide();
	$('.alert-true').hide();
	$('.alert-false').hide();
});

function Add_Company_Profile(){
	$('.body_loading').slideDown();
	$('.loading').show();
	$('.loading_text').show();
	$('.alert-true').hide();
	$('.alert-false').hide();
		$.ajax({
		url:'company/company_profile',
		type:'POST',
		data:{
			name:$('#name').val(),
			street:$('#street').val(),
			description:$('#description').val(),
			city:$('#city').val(),
			province:$('#province').val(),
			postal:$('#postal').val()
		},
		success:function(data){
			result=jQuery.parseJSON(data);
			if(result.is_success== true){
				$('.body_loading').hide();
				$('.loading').hide();
				$('.loading_text').hide();
				$('.alert-true').fadeTo(2000,500).slideUp(500);
				$('.alert-true > .alert-message').html(result.message);
				$('.alert-true > .alert-message-detail').html(result.validation_errors);
				$('#name').val('');$('#description').val('');$('#city').val('');$('#postal').val('');$('#province').val('');$('#street').val('');
			}else{
				$('.alert-false').fadeTo(2000,500).slideUp(500);
				$('.alert-false > .alert-message').html(result.message);
				$('.alert-false > .alert-message-detail').html(result.validation_errors);
				
			}
			$('.body_loading').hide();
			$('.loading').hide();
			$('.loading_text').hide();
		}
	});
}  

function Sent_Ask(){
	$('.body_loading').slideDown();
	$('.loading').show();
	$('.loading_text').show();
	$('.alert-true').hide();
	$('.alert-false').hide();
	$.ajax({
		url:'company/ask_us',
		type:'POST',
		data:{
			'division':$('#division').val(),
			'name_ask_us':$('#name_ask_us').val(),
			'question':$('#question').val()
		},
		success:function(data){
			result=jQuery.parseJSON(data);
			if(result.is_success== true){
				$('.body_loading').hide();
				$('.loading').hide();
				$('.loading_text').hide();
				$('.alert-true').fadeTo(2000,500).slideUp(500);
				$('.alert-true > .alert-message').html(result.message);
				$('.alert-true > .alert-message-detail').html(result.validation_errors);
				$('#division').val('');$('#name_ask_us').val('');$('#question').val('');
			}else{
				$('.alert-false').fadeTo(2000,500).slideUp(500);
				$('.alert-false > .alert-message').html(result.message);
				$('.alert-false > .alert-message-detail').html(result.validation_errors);
			}
			$('.body_loading').hide();
			$('.loading').hide();
			$('.loading_text').hide();
		}
	});
}

$('.btn-submit').click(function(){
	Add_Company_Profile();
});

$('.btn-cancel').click(function(){
	$('#name').val('');$('#description').val('');$('#city').val('');$('#postal').val('');$('#province').val('');$('#street').val('');
});

$('.btn-send-ask-us').click(function(){
	Sent_Ask();
});

$('.input').keypress(function(event){
	if(event.which==13){
		event.preventDefault();
		Add_Company_Profile();
	}
});

$('.input_ask_us').keypress(function(event){
	if(event.which==13){
		event.preventDefault();
		Sent_Ask();
	}
});