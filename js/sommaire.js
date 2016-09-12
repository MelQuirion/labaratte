jQuery(document).ready(function( $ ) {

	/*********** VALIDATION FORM ***********/
	$('#sommaire form :submit').click(function(e) {
		e.preventDefault();

		var erreur = false;

		var regexVille = /^[a-zéèêëïçàâäùû\- ]+$/i;
		var regexApp = /^[a-z0-9]+?$/i;
		var regexCp = /^[a-z][0-9][a-z] [0-9][a-z][0-9]$/i;

		if ($('#txtAdresse').val() == "")
		{
			$('#txtAdresse').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errAdresse').show();
			$('#errTextAdresse').text('Adresse invalide');
			erreur = true;
		}
		else
		{
			$('#errAdresse').hide();
			$('#txtAdresse').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		if ($('#txtApp').val() != "" && !(regexApp.test($('#txtApp').val())))
		{
			$('#txtApp').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errApp').show();
			$('#errTextApp').text('App. invalide');
			erreur = true;
		}
		else
		{
			$('#errApp').hide();
			$('#txtApp').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		if (!(regexVille.test($('#txtVille').val())))
		{
			$('#txtVille').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errVille').show();
			$('#errTextVille').text('Ville invalide');
			erreur = true;
		}
		else
		{
			$('#errVille').hide();
			$('#txtVille').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		if (!(regexCp.test($('#txtCp').val())))
		{
			$('#txtCp').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errCp').show();
			$('#errTextCp').text('Code postal invalide (A1A 1A1)');
			erreur = true;
		}
		else
		{
			$('#errCp').hide();
			$('#txtCp').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		/*affichage erreurs*/
		$('#errAdresse').mouseover(function(event) {
			$('#errTextAdresse').css('display', 'inline-block');
		});

		$('#errAdresse').mouseout(function(event) {
			$('#errTextAdresse').hide();
		});

		$('#errApp').mouseover(function(event) {
			$('#errTextApp').css('display', 'inline-block');
		});

		$('#errApp').mouseout(function(event) {
			$('#errTextApp').hide();
		});

		$('#errVille').mouseover(function(event) {
			$('#errTextVille').css('display', 'inline-block');
		});

		$('#errVille').mouseout(function(event) {
			$('#errTextVille').hide();
		});

		$('#errCp').mouseover(function(event) {
			$('#errTextCp').css('display', 'inline-block');
		});

		$('#errCp').mouseout(function(event) {
			$('#errTextCp').hide();
		});
		/*fin affichage erreurs*/


		$('html, body').animate({ scrollTop: 0 }, 0);

		if (erreur == false)
		{
			$('#sommaire form').submit();
		}
	});
	/*********** FIN VALIDATION FORM ***********/

});