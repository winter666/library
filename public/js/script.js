$(document).ready(function(){

    $('#navbarDropdown').on('click', showNavbar);
    $('.navbar-toggler').on('click', showNavigation);


    function showNavbar() {
        $('#is_auth-navbar').toggle('display');
    }

    function showNavigation() {
        $('#navbarHeader').toggle('display');
    }

});