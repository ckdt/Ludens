jQuery(document).ready(function($) {

  if(window.location.href.indexOf('case') > -1) {
    $('li[id="Cases"]').addClass('active');
  } else if (window.location.href.indexOf('wat-we-doen') > -1) {
    $('li[id="Wat we doen"]').addClass('active');
  } else if(window.location.href.indexOf('over-ons') > -1) {
    $('li[id="Over ons"]').addClass('active');
  } else {
    $('#Blog').addClass('active');
  }

  //Add active class to blog
  if ($(".post-content").length > 0) {
    console.log('deded');
    $('li[id="Blog"]').addClass('active');
  }
});
