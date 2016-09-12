jQuery(document).ready(function( $ ) {

	/*********** VALIDATION FORM ***********/
	$('#inscription form :submit').click(function(e) {
		e.preventDefault();

		var erreur = false;
		var regexNom = /^[a-zéèêëïçàâäùû]+([ -][a-zéèêëïçàâäùû]+)?$/i;
		var regexApp = /^[a-z0-9]+?$/i;
		var regexVille = /^[a-zéèêëïçàâäùû\- ]+$/i;
		var regexCp = /^[a-z][0-9][a-z] [0-9][a-z][0-9]$/i;
		var regexTel = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;

		var regexCourriel = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/i; // source de l'expression régulière : https://openclassrooms.com/courses/dynamisez-vos-sites-web-avec-javascript/les-expressions-regulieres-partie-2-2-1
		var regexMdp =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/; // source de l'expression régulière : http://www.the-art-of-web.com/javascript/validate-password/

		if (!(regexNom.test($('#txtPrenom').val())))
		{
			$('#txtPrenom').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errPrenom').show();
			$('#errTextPrenom').text('Prénom invalide');
			erreur = true;
		}
		else
		{
			$('#errPrenom').hide();
			$('#txtPrenom').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		if (!(regexNom.test($('#txtNom').val())))
		{
			$('#txtNom').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errNom').show();
			$('#errTextNom').text('Nom invalide');
			erreur = true;
		}
		else
		{
			$('#errNom').hide();
			$('#txtNom').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

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

		if (!(regexTel.test($('#txtTel').val())))
		{
			$('#txtTel').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errTel').show();
			$('#errTextTel').text('Téléphone invalide (418-555-5555)');
			erreur = true;
		}
		else
		{
			$('#errTel').hide();
			$('#txtTel').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}


		var jour = parseInt($('#txtJour').val());
		var mois = parseInt($('#selMois').val());
		var annee = parseInt($('#txtAnnee').val());
		var regexJour = /^([1-9]|0[1-9]|1[0-9]|2[0-9]|3[0-1])$/;
		var regexMois = /^([1-9]|0[1-9]|1[0-2])$/;
		var regexAnnee = /^2[0-9]{3}$/;
		var date = new Date();
		var anneeCourante = date.getFullYear();
		var moisCourant = date.getMonth()+1; 
		var jourCourant = date.getDate();

		//validation date de naissance							//n'est pas entre 1900 et année courante	//est supérieur à la date d'aujourd'hui									//mois de 30 jours										//année bissextile							//février année pas bissextile			
		if ((!regexJour.test(jour)) || (!regexMois.test(mois)) || (annee < 1900 || annee > anneeCourante || (annee == anneeCourante && mois >= moisCourant && jour > jourCourant)) || ((mois==4|mois==6|mois==9|mois==11) && (jour==31)) || ((mois==2) && (jour==29) && (annee%4!=0)) || (mois==2 && ((jour==30)||(jour==31))) || (isNaN(annee)))
		{
			$('#txtJour').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);
			$('#selMois').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);
			$('#txtAnnee').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errDdn').show();
			$("#errTextDdn").text("Date de naissance invalide");
			erreur = true;
		}
		else
		{
			$('#errDdn').hide();
			$('#txtJour').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
			$('#selMois').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
			$('#txtAnnee').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		if (!(regexCourriel.test($('#txtCourriel').val())))
		{
			$('#txtCourriel').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errCourriel').show();
			$('#errTextCourriel').text('Courriel invalide');
			erreur = true;
		}
		else
		{
			$('#errCourriel').hide();
			$('#txtCourriel').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		if (!(regexMdp.test($('#txtMdp').val())))
		{

			$('#txtMdp').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errMdp').show();
			$('#errTextMdp').text('Mot de passe invalide (6 caractères obligatoires. Au moins un chiffre, une majuscule, une minuscule.)');
			erreur = true;
		}
		else
		{
			$('#errMdp').hide();
			$('#txtMdp').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		if ($('#txtEnfant').val()=="" || $('#txtEnfant').val()<0)
		{
			$('#txtEnfant').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errEnfant').show();
			$('#errTextEnfant').text("Nombre d'enfants invalide");
			erreur = true;
		}
		else
		{
			$('#errEnfant').hide();
			$('#txtEnfant').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}


		if (!(regexNom.test($('#txtRefere').val())))
		{
			$('#txtRefere').animate({
				borderColor: '#c62323',
				backgroundColor: '#fcebeb'
			},300);

			$('#errRefere').show();
			$('#errTextRefere').text("Référence invalide");
			erreur = true;
		}
		else
		{
			$('#errRefere').hide();
			$('#txtRefere').animate({
				borderColor: '#000',
				backgroundColor: '#fff'
			},0);
		}

		/*affichage erreurs*/
		$('#errNom').mouseover(function(event) {
			$('#errTextNom').css('display', 'inline-block');
		});

		$('#errNom').mouseout(function(event) {
			$('#errTextNom').hide();
		});

		$('#errPrenom').mouseover(function(event) {
			$('#errTextPrenom').css('display', 'inline-block');
		});

		$('#errPrenom').mouseout(function(event) {
			$('#errTextPrenom').hide();
		});

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

		$('#errTel').mouseover(function(event) {
			$('#errTextTel').css('display', 'inline-block');
		});

		$('#errTel').mouseout(function(event) {
			$('#errTextTel').hide();
		});

		$('#errDdn').mouseover(function(event) {
			$('#errTextDdn').css('display', 'inline-block');
		});

		$('#errDdn').mouseout(function(event) {
			$('#errTextDdn').hide();
		});

		$('#errCourriel').mouseover(function(event) {
			$('#errTextCourriel').css('display', 'inline-block');
		});

		$('#errCourriel').mouseout(function(event) {
			$('#errTextCourriel').hide();
		});

		$('#errMdp').mouseover(function(event) {
			$('#errTextMdp').css('display', 'inline-block');
		});

		$('#errMdp').mouseout(function(event) {
			$('#errTextMdp').hide();
		});

		$('#errEnfant').mouseover(function(event) {
			$('#errTextEnfant').css('display', 'inline-block');
		});

		$('#errEnfant').mouseout(function(event) {
			$('#errTextEnfant').hide();
		});

		$('#errRefere').mouseover(function(event) {
			$('#errTextRefere').css('display', 'inline-block');
		});

		$('#errRefere').mouseout(function(event) {
			$('#errTextRefere').hide();
		});
		/*fin affichage erreurs*/


		$('html, body').animate({ scrollTop: 0 }, 0);

		if (erreur == false)
		{
			$('#inscription form').submit();
		}
	});
	/*********** FIN VALIDATION FORM ***********/

});