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
});
