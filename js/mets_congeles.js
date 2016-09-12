jQuery(document).ready(function( $ ) {

	/*augmente quantité*/
	$('.btnPlus').click(function(e) {
		$qte = $(this).prev();
		e.preventDefault();
		var nb = parseInt($qte.val());
		nb = nb+1;
		$qte.val(nb);
	});

	/*diminue quantité*/
	$('.btnMoins').click(function(e) {
		$qte = $(this).next();
		e.preventDefault();

		var nb = parseInt($qte.val());
		if (nb != 0)
		{
			nb = nb-1;
		}

		$qte.val(nb);
	});

	//affichage boîte connexion
	$("#lienConnexion").click(function (e) {
		e.preventDefault();
        $('#popUpLogin').show();
        $('#overlay').addClass('overlay');
    	$(".message").html("");
    });



});