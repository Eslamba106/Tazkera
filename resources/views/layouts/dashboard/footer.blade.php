
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
@yield('js')

<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->

<script src="{{ asset('js/dist/adminlte.min.js') }}"></script>
{{-- <script>
    $('.panel').each(function(){
       $(this).hide();
    });
    $('#sectionChooser').change(function(){
        var myID = $(this).val();
        $('.panel').each(function(){
            myID === $(this).attr('id') ? $(this).show() : $(this).hide();
        });
    });
</script> --}}
</body>

</html>
