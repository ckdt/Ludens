/// custom script ///
jQuery(document).ready(function($) {
  window.scrollTo(0, 0);
  //Isotope|Masonry all blog items
  var $container = $('.blog-container');
  $container.imagesLoaded( function () {
    $('.blog-container').isotope({
      itemSelector: '.item-blog',
    });
  });



  //function to open up tab in about
  function activaTab(tab){
      $('.nav-tabs a[href="#' + tab + '"]').tab('show');
  }

  // store the hash (DON'T put this code inside the $() function, it has to be executed
  // right away before the browser can start scrolling!
  var hash = window.location.hash,
      target = hash.replace('#', '');

  //open tab by getting hash of url
  activaTab(target);
  $('span#tab').text(target);

  // delete hash so the page won't scroll to it
  window.location.hash = "";

  // now whenever you are ready do whatever you want
  $(window).load(function() {
      if (target) {
          window.scrollTo(0, 0);
      }
  });

  //put selected class on the selected person
  var path = window.location.pathname;
  var search = path.match("over-ons/(.*)/");
  var selected = '.' + search[1];
  console.log(selected);

  $(selected).addClass('selected');

});
