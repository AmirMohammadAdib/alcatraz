<!-- BEGIN JS -->
<script src="{{ asset('admin-assets/plugins/jquery/dist/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/bootstrap/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/metisMenu/dist/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/paper-ripple/dist/PaperRipple.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/screenfull/dist/screenfull.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/switchery/dist/switchery.js') }}"></script>
<script src="{{ asset('admin-assets/js/core.js') }}"></script>

<!-- BEGIN PAGE JAVASCRIPT -->
<script src="{{ asset('admin-assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/jquery-incremental-counter/jquery.incremental-counter.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/ammap3/ammap/ammap.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/ammap3/ammap/maps/js/iranHighFa.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/kamadatepicker/kamadatepicker.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/pages/dashboard1.js') }}"></script>
<!-- END PAGE JAVASCRIPT -->   

@if(session()->has('alert-success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Swal.fire({
        title: "پیام موفقیت آمیز!",
        text: "{{ session('alert-success') }}",
        icon: "success"
    }); 
</script>
@endif