/*
My Custom JS
=============

Author: Xenonia
Updated: Jaunary 2015
Notes: Practice Only

*/



$(function() {

  $('#alertMe').click(function(e) {
    e.preventDefault();

    $('#successAlert').slideDown();

  });


  $('[rel="tooltip"]').tooltip();

});



