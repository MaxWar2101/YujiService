<?php include $templates_header ?>

<body>
    <?php include $templates_navbar ?>

    <main role="main">
        <div class="jumbotron jumbotron-fluid mb-5">
            <div class="container text-center py-3">
                <h1 class="text-primary mb-4">Bienvenido</h1>
                <h1 class="text-white display-3 mb-5">Ingrese Codigo de Seguimiento</h1>
                <div class="mx-auto" style="width: 100%; max-width: 600px;">
                    <form class="form" action="?page=cli-inicio" method="post">
                        <input type="text" class="form-control" placeholder="Codigo" name="codigo" style="padding: 30px;" required><br>
                        <div class="row justify-content-center">
                            <input type="submit" class="btn btn-primary py-2 px-5" value="Buscar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include $templates_footer ?>

</body>

</html>