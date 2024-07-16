<div class="row footer-container">
    <div class="col-md-12">
        <div class="copyright">
            <p class="float-start">
                کلیه حقوق قالب مدیران محفوظ می باشد و کپی برداری از آن به هیچ عنوان جایز نیست.
            </p>
            <p class="float-end ltr tahoma">
                <span>©</span>
                <a href="#" target="_blank">Rayanik</a>
            </p>
        </div><!-- /.copyright -->
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->

<!-- BEGIN SETTING -->
<div class="settings d-none d-sm-block">
    <a href="#" class="btn" id="toggle-setting">
        <i class="icon-settings"></i>
    </a>
    
    <div class="setting-content">               
        <h3 class="text-center">تنظیمات</h3>
        <div class="fix-header-box">
            <p class="h6">
                هدر ثابت: 
                <span class="float-end">
                    <input type="checkbox" class="fix-header-switch normal" checked>
                </span>
            </p>
        </div><!-- /.fix-header-box -->
        <hr class="light">
        <div class="toggle-sidebar-box">
            <p class="h6">
                جمع کردن سایدبار: 
                <span class="float-end">
                    <input type="checkbox" class="toggle-sidebar-switch normal">
                </span>
            </p>
        </div><!-- /.toggle-sidebar-box -->
        <hr class="light">
        <div class="toggle-sidebar-box">
            <p class="h6">
                سایدبار خلاقانه: 
                <span class="float-end">
                    <input type="checkbox" class="creative-sidebar-switch normal">
                </span>
            </p>
        </div><!-- /.toggle-sidebar-box -->
        <hr class="light">
        <div class="theme-colors">
            <p class="h6">رنگ قالب : </p>
            <a class="btn btn-round btn-darkpurple ripple-effect active" data-color="darkpurple"></a>
            <a class="btn btn-round btn-blue ripple-effect" data-color="blue"></a>
            <a class="btn btn-round btn-red ripple-effect" data-color="red"></a>
            <a class="btn btn-round btn-green ripple-effect" data-color="green"></a>
            <a class="btn btn-round btn-orange ripple-effect" data-color="orange"></a>
            <a class="btn btn-round btn-purple ripple-effect" data-color="purple"></a>
            <a class="btn btn-round btn-deeporange ripple-effect" data-color="deeporange"></a>
            <a class="btn btn-round btn-cyan ripple-effect" data-color="cyan"></a>
            <a class="btn btn-round btn-rose ripple-effect" data-color="rose"></a>
            <a class="btn btn-round btn-lime ripple-effect" data-color="lime"></a>
            <a class="btn btn-round btn-darkorange ripple-effect" data-color="darkorange"></a>
            <a class="btn btn-round btn-darkblue ripple-effect" data-color="darkblue"></a>
        </div><!-- /.theme-colors -->
        <hr class="light">
        <div class="sidebar-bg-box">
            <p class="h6 bold">تصویر سایدبار: </p>
            <ul class="sidebar-bg">
                <li class="active">
                    <a href="#" href="javascript:void(0)">
                        <img src="{{ asset('admin-assets/images/sidebar-bg/thumb/1.jpg') }}" data-bg="1" alt="sidebar background">
                    </a>
                </li>
                <li>
                    <a href="#" href="javascript:void(0)">
                        <img src="{{ asset('admin-assets/images/sidebar-bg/thumb/2.jpg') }}" data-bg="2"  alt="sidebar background">
                    </a>
                </li>
                <li>
                    <a href="#" href="javascript:void(0)">
                        <img src="{{ asset('admin-assets/images/sidebar-bg/thumb/3.jpg') }}" data-bg="3"  alt="sidebar background">
                    </a>
                </li>
                <li>
                    <a href="#" href="javascript:void(0)">
                        <img src="{{ asset('admin-assets/images/sidebar-bg/thumb/4.jpg') }}" data-bg="4"  alt="sidebar background">
                    </a>
                </li>
                <li>
                    <a href="#" href="javascript:void(0)">
                        <img src="{{ asset('admin-assets/images/sidebar-bg/thumb/5.jpg') }}" data-bg="5"  alt="sidebar background">
                    </a>
                </li>
                <li>
                    <a href="#" href="javascript:void(0)">
                        <img src="{{ asset('admin-assets/images/sidebar-bg/thumb/no-image.png') }}" data-bg=""  alt="no image">
                    </a>
                </li>
            </ul>
        </div><!-- /.sidebar-bg-box -->
        <div class="theme-code ltr text-left">
            <code></code>
        </div><!-- /.theme-code -->
    </div><!-- /.setting-content -->


    <div class="img-box">
        <img class="img-bottom dark" src="{{ asset('admin-assets/images/logo-dark.png') }}">
        <img class="img-bottom light" src="{{ asset('admin-assets/images/logo.png') }}">
    </div><!-- /.img-box -->
</div><!-- /.settings -->
<!-- END SETTING -->

<!-- BEGIN CODE MODAL -->
<div class="modal fade" id="code-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default btn-round btn-icon float-start" id="btn-copy"><i class="far fa-copy"></i></button>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">کپی کردن کدها</h4>
            </div>
            <div class="modal-body"></div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
<!-- END CODE MODAL -->        