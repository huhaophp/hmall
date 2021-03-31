@include('backend.layouts.header')

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include('backend.layouts.sidebar')
<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        @include('backend.layouts.topbar')
        <!-- Begin Page Content -->
            <div class="container-fluid">
                @foreach($errors->all() as $error)
                    @component('components.alert', ['type' => 'danger', 'message' => $error])
                    @endcomponent
                @endforeach
                @if(session('success'))
                    @component('components.alert', ['type' => 'success', 'message' => session('success')])
                    @endcomponent
                @endif
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
    @include('backend.layouts.footer')
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">确认离开?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">如果您准备结束当前会话，请在下面选择“注销”</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                <form action="{{ route('backend:auth:destroy') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary">退出</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/sb-admin-2/vendor/jquery/jquery.min.js"></script>
<script src="/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/sb-admin-2/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/sb-admin-2/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/sb-admin-2/js/demo/chart-area-demo.js"></script>
<script src="/sb-admin-2/js/demo/chart-pie-demo.js"></script>
@yield('script')
</body>

</html>
