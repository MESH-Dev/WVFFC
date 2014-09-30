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
    console.log(customType);
  })


});
