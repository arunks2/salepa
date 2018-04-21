$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(window).load(function(){
  $('#loading').fadeOut(1000);
  
  $('.icon-nav-mobile').click(function(){
    $('.mainNav').toggleClass('open');
  });
}) //.Ready