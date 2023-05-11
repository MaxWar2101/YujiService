<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
<div class="container-fluid bg-dark text-white py-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-6">
                    <h3 class="text-primary mb-4">Información</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-6">
                    <h3 class="text-primary mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                        <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                        <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Pricing Plan</a>
                        <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <!-- Iniciar Sesion -->
                <div class="col-md-4" id="sesion">
                    <div class="card bg-primary">
                        <!-- Mensaje de Error -->
                        <?php
                        session_start();
                        if (isset($_SESSION['error']) && $_SESSION['error']) {
                            echo "<i class='text-center' style='color: white'><h2>ALERTA</h2> <h3>Credenciales incorrectas</h3> <h5>Intente Nuevamente</h5> </i> ";
                            session_destroy();
                        }
                        ?>
                        <!-- Mensaje de Error -->

                        <div class="card-body text-center">
                            <h2 class="card-title text-white">Iniciar Sesion</h2>
                            <h5 class="card-title text-white">Ingrese su email y contraseña</h5>
                            <br>
                            <form class="form" action="controllers/controller.login.php" method="post">
                                <input type="email" class="form-control" placeholder="Email" name="email" required><br>
                                <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
                                <br>
                                <div class="row justify-content-center">
                                    <input type="submit" class="btn btn-outline-light" value="INGRESAR">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Iniciar Sesion -->
            </div>
        </div>
    </div>
</div>

<script src=<?php echo $recursos_bs_jq ?>></script>
<script>
    $(".linkborrar").click(function() {
        var id = $(this).attr('href');
        $("#inpborrar").val(id)
    });
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="/resources/lib/easing/easing.min.js"></script>
<script src="/resources/lib/waypoints/waypoints.min.js"></script>
<script src="/resources/lib/counterup/counterup.min.js"></script>
<script src="/resources/lib/owlcarousel/owl.carousel.min.js"></script>

</body>

</html>