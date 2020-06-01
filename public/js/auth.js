$(document).ready(function(){

    $('#navbarDropdown').on('click', show);

	function show() {
		$('#is_auth-navbar').toggle('display');
	}
});