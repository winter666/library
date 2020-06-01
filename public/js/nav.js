$(document).ready(function(){

    $('.navbar-toggler').on('click', showNavigation);

	function showNavigation() {
		$('#navbarHeader').toggle('display');
	}
});