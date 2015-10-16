
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formLogin" class="container">

      <form  class="form-ingreso " onsubmit="validarLogin();return false;">
        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
                <label for="nombre" class="sr-only">Nombre</label>
        <input type="text" id="nombre" minlength="3" class="form-control" placeholder="nombre" required="" autofocus="">
        <label for="correo" class="sr-only">Correo electrónico</label>
                <input type="email" id="correo" class="form-control" placeholder="Correo electrónico" required="" >
        <label for="clave" class="sr-only">Clave</label>
        <input type="password" id="clave" minlength="4" class="form-control" placeholder="clave" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordame
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>

      </form>



    </div> <!-- /container -->

  <?php }else{ 
    $var = usuario::TraerUnUsuario($_SESSION['registrado']); 

    ?>

    <div id="formLogin" class="container">

      <form  class="form-ingreso " onsubmit="validarLogin();return false;">
        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
                <label for="nombre" class="sr-only">Nombre</label>
        <input type="text" id="nombre" minlength="3" class="form-control" placeholder="nombre" required="" autofocus="">
        <label for="correo" class="sr-only">Correo electrónico</label>
                <input readonly type="email" id="correo" class="form-control" placeholder="Correo electrónico" value='<?php echo isset($var) ? $var->correo : "" ?>' disable>
        <label for="clave" class="sr-only">Clave</label>
        <input readonly type="password" id="clave" minlength="4" class="form-control" placeholder="clave" value='<?php echo isset($var) ? $var->clave : "" ?>' disable>
        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordame
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Modificar</button>

      </form>



    </div> <!-- /container -->

  <?php }?>         
