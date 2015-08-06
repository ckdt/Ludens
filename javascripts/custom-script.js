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


  var options = {
    backToTop: false
  };
  $('.nav-tabs').stickyTabs(options);


  /*if (location.hash) {
    window.scrollTo(0, 0);         // execute it straight away
    setTimeout(function() {
        console.log('TEST');
        window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
    }, 200);
  }*/


  $('.person-img a').click(function(){
    //alert('deded');
    /*if (location.hash) {               // do the test straight away
      window.scrollTo(0, 0);         // execute it straight away
        setTimeout(function() {
            window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
        }, 1);
    }*/
  });
});

jQuery(window).load(function($) {
//$(window).load(function() {
  //if (location.hash) {
    /*window.scrollTo(0, 0);         // execute it straight away
    setTimeout(function() {
        //console.log('TEST');
        window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
    }, 115);*/
  //}
});
