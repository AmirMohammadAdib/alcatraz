<!DOCTYPE html>
<html lang="fa" dir="rtl" class="rtl">
    <head>
        @include('admin.layouts.head-tag')
        @yield('head-tag')
    </head>
    <body class="active-ripple theme-darkpurple fix-header sidebar-extra bg-1 dark">
        <!-- BEGIN LOEADING -->
        <div id="loader">
            <div class="spinner"></div>
        </div><!-- /loader -->
        <!-- END LOEADING -->
        
        <!-- BEGIN HEADER -->
            @include('admin.layouts.header')    
        <!-- END HEADER -->
              
        <!-- BEGIN WRAPPER -->
        <div id="wrapper">

            <!-- BEGIN SIDEBAR -->
                @include('admin.layouts.nav-bar')
            <!-- END SIDEBAR -->     

            <!-- BEGIN PAGE CONTENT -->

            <div id="page-content">
                <div id="inner-content">
                    <div class="row">    
                        <div class="col-md-12">
                            <div class="breadcrumb-box shadow"> 
                                <ul class="breadcrumb">
                                    @yield('breadcrumb')
                                </ul>
                                <div class="breadcrumb-left">
                                    {{ verta()->formatWord('l dS F') }}
                                    <i class="icon-calendar"></i>
                                </div><!-- /.breadcrumb-left -->
                            </div><!-- /.breadcrumb-box -->


                            @yield('content')
                        </div><!-- /.col-md-12 -->
                    </div>
                </div>
            </div>
        </div><!-- /#wrapper -->
        <!-- END WRAPPER -->


        
        @include('admin.layouts.footer')
        
        @include('admin.layouts.scripts') 
        @yield('script')
    </body>
</html>