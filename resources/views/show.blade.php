<div class="card-box">
                            <div class="row">
                                <div class="col-1" >

                                </div>
                             <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                <li class="nav-item">
                                    <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <i class="fi-monitor mr-2"></i> Files
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-delete"></i> Trash
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a onClick="showAjaxModal('/api/get/token')" class="btn btn-bg btn-info btn-block">
                                        <i class="mdi mdi-cloud-upload"></i> Click to Upload
                                    </a>
                                </li>
                                </ul>
                                 <div class="col-1"></div>
                            </div>
                                 <div class="tab-content">
                                <div class="tab-pane show active" id="home"> 
                            <div class="row">
                                <div class="loado"></div>
                                @forelse(\App\Upload::simplePaginate(30) as $upload)
                                <div id="real" class="col-lg-3 col-xl-3">
                                    <div class="file-man-box">
                                    <a onclick="deleted('/api/delete/{{$upload->id}}')" class="file-close"><i class="mdi mdi-close-circle"></i></a>
                                        <div class="file-img-box">
                                    @if($upload->mime=='image/jpeg')
                                            <span class="btn btn-sm btn-warning">JPEG</span>
                                    @elseif($upload->mime=='image/png')
                                    <span class="btn btn-sm btn-warning">PNG</span>
                                      @elseif($upload->mime=='image/gif')
                                    <span class="btn btn-sm btn-warning">GIF</span>
                @elseif($upload->mime=='application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                    <span class="btn btn-sm btn-info">DOCX</span>
                                      @elseif($upload->mime=='application/pdf')
                                    <span class="btn btn-sm btn-primary">PDF</span>
                                     @elseif($upload->mime=='application/msword')
                                    <span class="btn btn-sm btn-success">DOC</span>
                                    @elseif($upload->mime=='text/html')
                                    <span class="btn btn-sm btn-success">HTML</span>
                                     @elseif($upload->mime=='application/php')
                                    <span class="btn btn-sm btn-dark">PHP</span>
                                    @else
                                     <span class="btn btn-sm btn-light">OTHER</span>
                                    @endif   
                                        </div>
                                        <a href="/api/download/{{$upload->id}}" target="_blank" class="file-download"><i class="mdi mdi-download"></i> </a>
                                        <div class="file-man-title">
                                            <h5 class="mb-0 text-overflow">{{$upload->image}}</h5>
                                            <p class="mb-0"><small>{{round($upload->size/1000,2)}} kb</small></p>
                                        </div>
                                    </div>
                                </div>
                                 @empty
                                    <tr>
                                        <td colspan="3">No entries found.</td>
                                    </tr>
                                @endforelse
                            </div>
                           
                            </div>
                             <div class="tab-pane" id="profile">
                                <div class="row">
                                    <div class="loadinly"></div>
                         @forelse(\App\Upload::onlyTrashed()->simplePaginate(30) as $delete)
                                <div class="col-lg-3 col-xl-3">
                                    <div class="file-man-box">
                                        <a onclick="recdeleted('/api/rec_delete/{{$delete->id}}')" class="file-close"><i class="mdi mdi-backup-restore"></i></a>
                                        <div class="file-img-box">
                                    @if($delete->mime=='image/jpeg')
                                            <span class="btn btn-sm btn-warning">JPEG</span>
                                    @elseif($delete->mime=='image/png')
                                    <span class="btn btn-sm btn-warning">PNG</span>
                                      @elseif($delete->mime=='image/gif')
                                    <span class="btn btn-sm btn-warning">GIF</span>
                @elseif($delete->mime=='application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                    <span class="btn btn-sm btn-info">DOCX</span>
                                      @elseif($delete->mime=='application/pdf')
                                    <span class="btn btn-sm btn-primary">PDF</span>
                                     @elseif($delete->mime=='application/msword')
                                    <span class="btn btn-sm btn-success">DOC</span>
                                    @elseif($delete->mime=='text/html')
                                    <span class="btn btn-sm btn-success">HTML</span>
                                     @elseif($delete->mime=='application/php')
                                    <span class="btn btn-sm btn-dark">PHP</span>
                                    @else
                                     <span class="btn btn-sm btn-light">OTHER</span>
                                    @endif   
                                        </div>
                                        <div class="file-man-title">
                                            <h5 class="mb-0 text-overflow">{{$delete->image}}</h5>
                                            <p class="mb-0"><small>{{round($delete->size/1000,2)}} kb</small></p>
                                        </div>
                                    </div>
                                </div>
                                 @empty
                                    <tr>
                                        <td colspan="3">No entries found.</td>
                                    </tr>
                                @endforelse
                            </div>
                             </div>
                            </div>
                          </div>
                            <script type="text/javascript">
                                function deleted(url)
                                {
                            jQuery('.loado').html('<div style="text-align:center;"><img src="/public/assets/images/preloader.gif" style="height:25px;" /></div>');
                                    $.ajax({
                                    url: url,
                                    success: function(response)
                                    {
                                    jQuery('#show_media').html(response);
                                    $('.loado').hide();
                                    alert('Files has been deleted Successfully');
                                    },
                                     error: function(response)
                                    {
                                        $('.loado').hide();
                                    alert('Error occured in deleting file');
                                    },
                                    });
                                }
                                 function recdeleted(url)
                                {
                                jQuery('.loadinly').html('<div style="text-align:center;"><img src="/public/assets/images/preloader.gif" style="height:25px;" /></div>');
                                    $.ajax({
                                    url: url,
                                    success: function(response)
                                    {
                                    jQuery('#show_media').html(response);
                                     $('.loadinly').hide();
                                    alert('Files has been restore Successfully');
                                    },
                                     error: function(response)
                                    {
                                    $('.loadinly').hide();
                                    alert('Error occured in restoring file');
                                    },
                                    });
                                }
                            </script>
                        
                   
                           