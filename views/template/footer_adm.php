<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=<?php echo $recursos_bs_jq ?>></script>
<script src=<?php echo $recursos_pop_js ?>></script>
<script src=<?php echo $recursos_bs_js ?>></script>

<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("txtPassword");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }

    $(document).ready(function() {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function() {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
    });
</script>
<script>
    $(".linkborrar").click(function() {
        var id = $(this).attr('href');
        $("#inpborrar").val(id);
    });
</script>
</body>

</html>