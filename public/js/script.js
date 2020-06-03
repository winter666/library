$(document).ready(function(){

    $('#navbarDropdown').on('click', showNavbar);
    $('.navbar-toggler').on('click', showNavigation);
    $('#evt-del').on('click', confirmEventDel);
    $('#evt-modal').on('click', modal);
    $('.close_btn').on('click', modal);

    function showNavbar() {
        $('#is_auth-navbar').toggle('display');
    }

    function showNavigation() {
        $('#navbarHeader').toggle('display');
    }

    function confirmEventDel(evt) {
    	if (confirm('Are you sure?')) {
    		return true;
    	} else {
	    	evt.preventDefault();
    	}
    }

    function modal() {
        $('.background_shadow').toggle('display');
        $('.modal-window').toggle('display');
    }

});