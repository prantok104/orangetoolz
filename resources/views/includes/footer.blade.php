{{-- jQuery --}}
<script src="{{ asset('assets/libraries/jquery/js/jquery-3.5.1.min.js') }}"></script>

{{-- Mordanizer js --}}
<script src="{{ asset('assets/libraries/modernizr/js/modernizr-3.11.2.min.js') }}"></script>

{{-- Boostrap js --}}
<script src="{{ asset('assets/libraries/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/libraries/bootstrap/js/bootstrap.min.js') }}"></script>

{{-- Toastr js --}}
<script src="{{ asset('assets/libraries/toastr/js/toastr.min.js') }}"></script>
{!! Toastr::message() !!}

{{-- SweetAlert js --}}
<script src="{{ asset('assets/libraries/sweetalert/js/sweetalert.min.js') }}"></script>

{{-- Select2 js --}}
<script src="{{ asset('assets/libraries/select2/js/select2.min.js') }}"></script>

{{-- Main js --}}
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- Custom js --}}
@stack('js')
</body>

</html>
