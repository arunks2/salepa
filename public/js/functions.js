$(function(){
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
        });
    });
var loader = $('#loading');
function checkResponseAndTakeAction(response, user_status='seller') {
    
    if(response.status=='connected') {
        loader.fadeIn(500);
        text = '<i class="fa fa-check" style="margin-top:2px; margin-right:10px;"></i> Alright, logging you in right now!';
        notify(text,'success');
        FB.api('/me?fields=name,email,id', function(response) {
              
              $.ajax({
                'url' : '/login',
                'method':'post',
                'data' : {
                    response : response
                    }
              })
              .done (function(response) {
                if(response==1) {
                    if(user_status=='buyer') {
                       window.location.reload();
                    }
                    else {
                    window.location.href='/user/dashboard';
                    }
                }
                else if(response==2) {
                    if(user_status=='buyer') {
                        window.location.reload();
                    }
                    else {
                    window.location.href='/user/dashboard';
                    }
                }
                else {
                    loader.fadeOut(500);
                    text='<i class="fa fa-exclamation"></i>  Woops, something is wrong. Please try again!';
                    notify(text, 'error');
                }
              })
              ;
            }, {scope: 'public_profile,email'});
    }
    else {
        text = '<i class="fa fa-exclamation" style="margin-top:2px; margin-right:10px;"></i> Hey! Let\'s login already :)';
        notify(text, 'warning');
        
    }
  }


/**
 * Creates a notification Killer in the view
 * @param  HTML string text 
 * @param  String type 
 * @return none 
 */
function notify(text, type, position = 'bottomCenter', killer = true) {

  		noty({
                text        : text,
                type        : type,
                dismissQueue: true,
                layout      : position,
                closeWith   : ['click'],
                theme       : 'relax',
                killer      : killer,
                maxVisible  : 10,
                animation   : {
                    open  : 'animated flipInX bounce',
                    close : 'animated flipOutX',
                    easing: 'swing',
                    speed : 500
                }
            });
  }