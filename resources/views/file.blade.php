
 <form role="form" id="form_upload"  method="POST" enctype="multipart/form-data">  
  {{ csrf_field() }}
                          <div class="form-group m-b-20 row">
                             <div class="col-12">
                                       <label for="emailaddress">Select File to Upload</label>
                    <input id="file" type="file" ref="file" class="form-control" name="file"  required />
                                    </div>
                                    <div id="info"></div>
                            </div>

                           <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                         <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">
                                                 <i class="mdi mdi-cloud-upload"></i>    Upload to Cloud <span class="loador"></span>
                                                </button>
                                 </div>
                                </div>
                    </form>
<script type="text/javascript">
$("form#form_upload").submit(function(e) {
     jQuery('.loador').html('<div style="text-align:center;"><img src="/public/assets/images/preloader.gif" style="height:25px;" /></div>');
     jQuery('#info').hide();
    NProgress.start();
    var formData = new FormData(this);
    $.ajax({
            url     : '/api/upload/file',
            type    : 'POST',
            data    : formData,
        success: function (data) {
            jQuery('.loador').hide();
       alert('File Uploaded Successfully')
         NProgress.done();
        },
         error: function (data) {
            jQuery('.loador').hide();
                 alert('something went wrong during Upload, try again');
                 Console.log(data);
                  NProgress.done();
            },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault(); 
                          });
</script>
