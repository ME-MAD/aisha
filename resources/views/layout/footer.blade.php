<div class="footer-wrapper">
    <div class="footer-section f-section-1">
        <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
    </div>
    <div class="footer-section f-section-2">
        <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
    </div>
</div>

</div>
</div>
<!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('adminAssets/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('adminAssets/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('adminAssets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('adminAssets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('adminAssets/assets/js/app.js')}}"></script>
<script>
$(document).ready(function() {
App.init();
});
</script>
<script src="{{asset('adminAssets/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('adminAssets/assets/js/shared/modals.js')}}"></script>
<script src="{{asset('adminAssets/assets/shared/main.js')}}"></script>
<script src="{{asset('adminAssets/assets/shared/modal.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>


@yield('javascript')


@include('sweetalert::alert')

</body>
</html>