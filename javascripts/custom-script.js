/// custom script ///
jQuery(document).ready(function($) {
  //Isotope|Masonry all blog items
  var $container = $('.blog-container');
  $container.imagesLoaded( function () {
    $('.blog-container').isotope({
      itemSelector: '.item-blog',
    });
  });


  var options = {
    backToTop: false
  };
  $('.nav-tabs').stickyTabs(options);



});
