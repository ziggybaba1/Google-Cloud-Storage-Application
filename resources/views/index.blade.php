<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/public/plugins/switchery/switchery.min.css">
        <link href="/public/css/nprogress.css" rel="stylesheet">
<!-- Modal -->
        <link href="/public/plugins/custombox/css/custombox.min.css" rel="stylesheet">
        <!-- Bootstrap fileupload css -->
        <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/assets/css/icons.css" rel="stylesheet" type="text/css" />
         <link href="/public/assets/css/style_cl.css" rel="stylesheet" type="text/css" />
        <script src="/public/assets/js/modernizr.min.js"></script>
        <script src="/public/assets/js/jquery-3.1.1.min.js"></script>
        <link href="/public/style.css" rel="stylesheet" type="text/css" />
        <title>Cloud Storage</title>


        <style>
.title{margin-top: 230px;color: cadetblue;} 
.nav-link{min-width: 300px;}
body{background-color: #271646;}
body.enlarged {min-height: auto;}
label{color:#1758af;}
.loader:empty {position: absolute;top: calc(50% - 4em);left: calc(50% - 4em);width: 6em;height: 6em;border: 1.1em solid rgba(0, 0, 0, 0.2);border-left: 1.1em solid #000000;border-radius: 50%;animation: load8 1.1s infinite linear;}
@keyframes load8 {0% {transform: rotate(0deg);}100% {transform: rotate(360deg);}}
.st0{fill:none;stroke:#02c0ce;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
        </style>
    </head>
    <body>
         <div id="wrapper">
        <div id="app" ></div>
    </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="/public/assets/js/jquery.min.js"></script>
        <script src="/public/assets/js/popper.min.js"></script>
        <script src="/public/assets/js/bootstrap.min.js"></script>
        <script src="/public/assets/js/jquery.slimscroll.js"></script>
        <script src="/public/js/nprogress.js"></script>
        <script src="/public/plugins/switchery/switchery.min.js"></script>
        <script src="/public/plugins/custombox/js/custombox.min.js"></script>
        <script src="/public/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/public/plugins/moment/moment.js"></script>
        <script type="text/javascript" src="/public/assets/pages/jquery.form-advanced.init.js"></script>
        <script src="/public/assets/js/jquery.core.js"></script>
        <script src="/public/assets/js/jquery.app.js"></script>
        <script type="text/javascript">
  function showAjaxModal(url)
  {
    
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="/public/assets/images/preloader.gif" style="height:25px;" /></div>');
    
    // LOADING THE AJAX MODAL
    jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
    
    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response)
      {
        jQuery('#modal_ajax .modal-body').html(response);
      }
    });
  }
  $( function() {
    getindex();
     });
   var interval;
$(document).on('mousemove keyup keypress',function(){
  clearTimeout(interval);
  //do any process and then call the function again
  settimeout();
})
function settimeout(){
  interval=setTimeout(function(){
    getindex(); 
  },5000)
}
   function getindex(){
     jQuery('#loader').html('<div style="text-align:center;"><img src="/public/assets/images/preloader.gif" style="height:25px;" /></div>');
    $.ajax({
      url: '/api/get/index',
      success: function(response)
      {
        $('#loader').hide();
        jQuery('#show_media').html(response);
      }
    });
   }
  </script>
  <div class="modal fade" id="modal_ajax" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div  class="come modal-content">
            <button type="button" onclick="NProgress.done()" class="close" data-dismiss="modal">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
                <div class="modal-header">
                     <div class="pull-left">
                                </div>
                <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"  >
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="NProgress.done()" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
