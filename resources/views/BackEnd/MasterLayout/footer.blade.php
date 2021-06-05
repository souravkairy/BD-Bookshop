@extends('BackEnd.MasterLayout.master')
@section('footer')
<footer class="footer">
    © 2021 BD BOOKSHOP <span class="d-none d-sm-inline-block"> -Developed By Sourav</span>.
</footer>

</div>
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->

    <script src="{{ asset('public/BackEnd/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/dropzone/dist/dropzone.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('public/BackEnd/assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/raphael/raphael.min.js')}}"></script>

    <script src="{{ asset('public/BackEnd/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/pages/form-advanced.js') }}"></script>


    <script src="{{ asset('public/BackEnd/assets/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/pages/datatables.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('public/BackEnd/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/app.js') }}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        jQuery(document).ready(function(){
            $('.summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                 // set focus to editable area after initializing summernote
            });
        });
    </script>
    <script>


        @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"

            switch(type){
                case 'info':
                     toastr.info("{{ Session::get('message') }}");
                     break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                 case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    </body>

    </html>
@endsection
