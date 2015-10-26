jQuery(document).ready(function($){
  //Are we loaded?
  console.log('hell yeah!');

  //Let's do something awesome!

  try{Typekit.load();}catch(e){}

  $("#search").click(function() {
    $("#search-box").toggle();
  });


  //Front page link hover and slideout

  $('.home-callout a').each(function( index ){

  	$(this).click(function() {

      if($('.slide').eq(index).hasClass('active')) {
        $('.active').fadeOut();
        $('.active').removeClass('active');
      } else {
        $('.active').fadeOut();
        $('.active').removeClass('active');
        $('.slide').eq(index).fadeIn();
        $('.slide').eq(index).addClass('active');
      }

  	});


  });

  $('.content-callout a').each(function( index ){

    $(this).click(function() {

      if($('.slide').eq(index).hasClass('active')) {
        $('.active').fadeOut();
        $('.active').removeClass('active');
      } else {
        $('.active').fadeOut();
        $('.active').removeClass('active');
        $('.slide').eq(index).fadeIn();
        $('.slide').eq(index).addClass('active');
      }

    });
  });

  $(".resource-btn").click(function() {
    var customType = $( this ).data('filter');
  });

  $(".period ul").hide();

  $(".period h3").click(function() {
    $(this).next("ul").slideToggle();
  });

  var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  function beginsWith(needle, haystack){
    return (haystack.substr(0, needle.length) == needle);
  };

  $('a').each(function(){

    if(typeof $(this).attr('href') != "undefined") {
      var test = beginsWith( url, $(this).attr('href') );
      //if it's an external link then open in a new tab

      

      if( test == false && $(this).attr('href').indexOf('#') == -1){
        $(this).attr('target','_blank');
      }
    }
  });

});
