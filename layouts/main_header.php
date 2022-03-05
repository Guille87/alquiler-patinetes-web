<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
        </div>
        <div class="col-sm-6">
            <div class="toggle_3">
            <?php
            if (isset($_SESSION['codusu'])) {
                echo '<div class="usu_login" onclick="mostrar_opciones()"><i class="fa fa-fw fa-user">'.$_SESSION['nomusu'].'</i></div>';
            } else {
            ?>
            <div class="left_main">
                <div class="menu_main">
                    <a href="register.php"><i class="fa fa-fw fa-user"></i> Register</a>
                </div>
            </div>
            <div class="middle_main">
                <div class="menu_main">
                    <a href="login.php"><i class="fa fa-fw fa-sign-in"></i> Login</a>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="right_main">
                <div class="toggle_main"><a class="openbtn" onclick="openNav()"><img src="images/toggle-menu-icon.png" style="max-width: 100%;"></a></div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    function mostrar_opciones() {
        if (document.getElementById("ctrl-menu").style.display == "block") {
            document.getElementById("ctrl-menu").style.display="none";
        } else {
            document.getElementById("ctrl-menu").style.display="block";
        }
        
    }
</script>
<div class="menu_opciones" id="ctrl-menu" style="display: none;">
    <ul>
        <li><a href="_logout.php"><div class="menu_opcion">Cerrar sesión</div></a></li>
    </ul>
</div>