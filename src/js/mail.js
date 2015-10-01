$( document ).ready(function() {
	$('#enviar').click(function(){
		
		$('#mensaje').html('');
		$('#group-form-first-name').removeClass('has-error');
		$('#group-form-email').removeClass('has-error');
		$('#group-form-about-yourself').removeClass('has-error');
		
		var l = Ladda.create( document.querySelector( '#enviar' ) );
		l.start();
		
		var error = 0;
		if($('#form-first-name').val() == ""){
			$('#group-form-first-name').addClass('has-error');
			error = 1;
		}
		if($('#form-email').val() == ""){
			$('#group-form-email').addClass('has-error');
			error = 1;
		}
		if($('#form-about-yourself').val() == ""){
			$('#group-form-about-yourself').addClass('has-error');
			error = 1;
		}
		if(error == 1){
			l.stop();
			return false;
		}
		var name_ 		= "";
		var from_	 	= "";
		var phone_ 		= "";
		var message_	= "";
		
		name_ 			= $('#form-first-name').val();
		from_ 			= $('#form-email').val();
		phone_ 			= $('#form-phone').val();
		message_ 		= $('#form-about-yourself').val();
		
		//setTimeout(function(){ 
								$.ajax({
									// la URL para la petición
									url : 'mail.php',
								 
									// la información a enviar
									// (también es posible utilizar una cadena de datos)
									data : { from :  from_, name: name_, phone: phone_, message: message_},
								 
									// especifica si será una petición POST o GET
									type : 'POST',
								 
									// el tipo de información que se espera de respuesta
									dataType : 'json',
								 
									// código a ejecutar si la petición es satisfactoria;
									// la respuesta es pasada como argumento a la función
									success : function(json) {
										$('#mensaje').append("Su consulta fue enviada");
										/*
										$('<h1/>').text(json.title).appendTo('body');
										$('<div class="content"/>')
											.html(json.html).appendTo('body');
										*/	
									},
								 
									// código a ejecutar si la petición falla;
									// son pasados como argumentos a la función
									// el objeto de la petición en crudo y código de estatus de la petición
									error : function(xhr, status) {
										//alert('Disculpe, existió un problema');
									},
								 
									// código a ejecutar sin importar si la petición falló o no
									complete : function(xhr, status) {
										//alert('Petición realizada');
										l.stop();
										//l.toggle();
										//l.isLoading();
										//l.setProgress( 0-1 );
									}
								});
							
		//					}, 3000);
		
		
	});
	/*
	setInterval(function(){ 
							var l = Ladda.create( document.querySelector( '#enviar' ) );
							l.stop(); }, 3000);
							*/
});