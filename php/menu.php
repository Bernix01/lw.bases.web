
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">Learning & Winening</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li ><a href="/">Cursos</a></li>
                    <li><a href="acerca_de.html">Acerca de</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" method='POST' action='buscarCursos.php'>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar curso" name="busqueda">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glypicon glyphicon-search"></span></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                                    <?php if(!isset($_SESSION["nickname"])){ ?>
                    <li ><a href="login.html">Identifícate</a></li>
                    <?php }else {
                      ?>
                        <li ><a href="#"><?php echo $_SESSION["nickname"] ?></a></li>
                          <li ><a href="/logout/">Cerrar sesión</a></li>
                      <?php
                    } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
