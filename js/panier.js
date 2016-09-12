jQuery(document).ready(function( $ ) {

	//augmente qté panier
	$('.btnPlus').click(function(e) {
		$qte = $(this).prev();
		e.preventDefault();
		var nb = parseInt($qte.val());
		nb = nb+1;
		$qte.val(nb);
	});

	//diminue qté panier
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


});