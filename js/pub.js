jQuery(document).ready(function( $ ) {
	
	/*********** ANIMATION PUB ***********/
	var $texteGauche = $("#pub #texte-gauche");
	var $texteDroite = $("#pub #texte-droite");
	var $main = $("#pub #main");
	var $coeur = $("#pub #coeur");
	var $fleche = $("#pub #fleche");
	var pause = false;

	var tlm = new TimelineMax({
		delay:1,
		repeat:-1,
		repeatDelay:5
	});

	tlm
		.to($texteGauche, 1, {left:"20%", ease:Back.easeOut})
		.to($main, 1, {opacity: 1, ease:Back.easeOut}, "+=0.5")
		.to($texteDroite, 1, {left:"38%", ease:Back.easeOut}, "+=1")
		.to($coeur, 1, {opacity: 1, ease:Back.easeOut},"+=0.5")
		.to($fleche, 1, {scale: 1},"+=1")

		$('#pause').click(function(){
			if(pause==false)
			{
				tlm.pause();
				pause = true;
			}
			else
			{
				tlm.play();
				pause = false;
			}
		
	});

	/*********** FIN ANIMATION PUB ***********/
});