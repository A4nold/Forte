/* FORM WIZARD VALIDATION SIGN UP ======================================== */

$('form#custom').attr('action', 'quotation-wizard-send.php');

$(function() {
'use strict';
				$('#custom').stepy({
					backLabel:	'Previous step',
					block:		true,
					errorImage:	true,
					nextLabel:	'Next step',
					titleClick:	true,
					description:	true,
					legend:			false,
					validate:	true
				});
				
				
				$('#custom').validate({
	
					errorPlacement: function(error, element) {
						
					$('#custom .stepy-error').append(error);
					}, rules: {
						'Service-Option':		'required',
						'Credit-Score':	'required',
						'Duration':		'required',
						'Urgency':		'required',
						'Reference[]':	'required',
						'budget':		'required',
						'firstname_quote':		'required',
						'lastname_quote':		'required',
						'email_quote':		'required',
						'phone_quote':	'required',
						'message_general':		'required',
						'terms':		'required' 	// BE CAREFUL: last has no comma
					}, messages: {
						'Service-Option':		{ required: 	 'Service-Option required' },
						'Credit-Score':	{ required: 	 'Credit-Score required' },
						'Duration':		{ required: 	 'Duration required' },
						'Urgency':		{ required: 	 'Urgency required' },
						'Reference[]':	{ required: 	 'Reference required' },
						'budget':		{ required: 	 'Budget required' },
						'firstname_quote':		{ required: 	 'First name required' },
						'lastname_quote':		{ required: 	 'Last name required' },
						'email_quote':		{ required: 	 'Email required' },					
						'phone_quote':	{ required:  'Phone required' },
						'message_general':		{ required:  'Description required' },
						'terms':		{ required:  'Please accept terms' },
					},
					submitHandler: function(form) 
					{
					if($('input#website').val().length == 0)
					{ 
					form.submit();
					}
					}
				});

			});
			