<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url('View/img/plantilla/bg-1.jpg')">
                <div class="login-logo">
                    <img src="View/img/plantilla/logo-large.png" class="img-responsive">
                </div>
                <h3 class="login-box-msg" style="color: white">SISTEMA DE BODEGA</h3>
            </div>
            <form class="login100-form validate-form" method="post" autocomplete="off">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Usuario es requerido">
                    <span class="label-input100">Usuario</span>
                    <input class="input100" type="text" name="ingUsuario" id="ingUsuario" placeholder="Ingrese Rut Usuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate="Contraseña es requerida">
                    <span class="label-input100">Contraseña</span>
                    <input type="password" class="input100" name="ingPassword" placeholder="Ingrese Contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="recordar">
                        <label for="ckb1" class="label-checkbox100">
                            Recuérdame
                        </label>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Ingresar
                    </button>
                </div>

                <?php
                $login = new ControladorUsuarios();
                $login -> ctrIngresoUsuario();
                ?>

            </form>
        </div>
    </div>
</div>

<script>

$("#ingUsuario").rut({
    formatOn: 'keyup'
});

</script>