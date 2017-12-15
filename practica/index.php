 <?php 
$info = array();
    if ($_POST) {

        $file = "conf.dat";
        if (isset($_GET['mod'])) {

            $edit = "datos/{$_GET['mod']}";
            $datos = json_encode($_POST);
            file_put_contents($edit, $datos);
            $cod = 2;
            header('Location: index.php');
        } else {
            $cod = 0;
        } 

        if ($cod < 1) {
          if (is_file($file)) {

            $conf = unserialize(file_get_contents($file));
            $conf ->cod++;

        }else{
            $conf = new stdClass();
            $conf -> cod=1;
        }
                 file_put_contents('conf.dat', serialize($conf));
                 $cod = $conf ->cod;
                 $datos = json_encode($_POST);
                 file_put_contents("datos/reg".$cod.".json", $datos);
        }
        

    }elseif (isset($_GET['mod'])) {
        $file = "datos/{$_GET['mod']}";

        $info = json_decode(file_get_contents($file), true);


    }elseif (isset($_GET['eli'])) {
        $file = "datos/{$_GET['eli']}";
        if (is_file($file)) {
            unlink($file);
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <!--Llamada a bootstrap por CDN-->
        <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" rel="stylesheet"/>
        <script crossorigin="anonymous" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js">
        </script>
        <meta charset="utf-8"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <title>
            REGISTRO DE EMPRESAS
        </title>
    </meta>
</meta>
</link>
<link href="css/Style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

<div class="container" >
    <h1 align="center"><strong class="align-middle">Formulario de registro</strong></h1>
<form class="form-control" method="POST" class="form-group" name="formulario">

<div class="form-group input-group">

    <div class="form-group">
<div class="form-group input-group">
<span class="input-group-addon">Nombre</span>
<input name="nombre" type="text" value="<?php echo (isset($info['nombre']))?$info['nombre']:''; ?>" />
</div>


<div class="form-group input-group">
<span class="input-group-addon">RNC</span>
<input name="RNC" type="text" value="<?php echo (isset($info['RNC']))?$info['RNC']:''; ?>"/>
</div>

<div class="form-group input-group">
<span class="input-group-addon">Color</span>
<input name="color" type="text" value="<?php echo (isset($info['color']))?$info['color']:''; ?>"/>
</div>

<div class="form-group input-group">
<span class="input-group-addon">Comentario:</span>
<textarea name="comentario" type="text"><?php echo (isset($info['comentario']))?$info['comentario']:''; ?></textarea>
</div>


<div class="form-group input-group">
<span class="input-group-addon">Aportacion</span>
<input name="aportacion" type="text" value="<?php echo (isset($info['aportacion']))?$info['aportacion']:''; ?>" onkeypress="return valida(event)"/>
</div>
    </div>


<div class="form-group box2">
 
<div class="form-group input-group">
<span class="input-group-addon">Cant Empleados</span>
<input name="cant empleados" type="text" value="<?php echo (isset($info['cant_empleados']))?$info['cant_empleados']:''; ?>" onkeypress="return valida(event)"/>
</div>   

<span class="input-group form-control-static">Nomenclatura</span>
  <div class="form-group input-group">
                    <div class="form-group has-feedback">
                        <label class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="nomenclatura" value="A" 
                                <?php if (isset($info['nomenclatura'])) {
                                    if ($info['nomenclatura'] == 'A') {
                                        echo 'checked';
                                    }
                                } ?>
                                />
                            </span>
                            <div class="form-control form-control-static">
                                A
                            </div>
                        </label>
                    </div>

                    <div class="form-group has-feedback ">
                        <label class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="nomenclatura" value="B" 
                                 <?php if (isset($info['nomenclatura'])) {
                                    if ($info['nomenclatura'] == 'B') {
                                        echo 'checked';
                                    }
                                } ?>/>
                            </span>
                            <div class="form-control form-control-static">
                                B
                            </div>
                        </label>
                    </div>

                    <div class="form-group has-feedback ">
                        <label class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="nomenclatura" value="X" 
                                 <?php if (isset($info['nomenclatura'])) {
                                    if ($info['nomenclatura'] == 'X') {
                                        echo 'checked';
                                    }
                                } ?>/>
                            </span>
                            <div class="form-control form-control-static">
                                X
                            </div>
                        </label>
                    </div>

                    <div class="form-group has-feedback ">
                        <label class="input-group">
                            <span class="input-group-addon">
                                <input type="radio" name="nomenclatura" value="Z" 
                                 <?php if (isset($info['nomenclatura'])) {
                                    if ($info['nomenclatura'] == 'Z') {
                                        echo 'checked';
                                    }
                                } ?>/>
                            </span>
                            <div class="form-control form-control-static">
                                Z
                            </div>
                        </label>
                    </div>

 </div>

  <div class="form-group input-group"><span class="input-group-addon">Tamaño</span>
  <select class="custom-select" name="tamano">
  <option value="pequeño" <?php if (isset($info['tamano'])) {
                                    if ($info['tamano'] == 'pequeño') {
                                        echo 'selected';
                                    }
                                } ?>
                                >Pequeño</option>
  <option value="mediano" <?php if (isset($info['tamano'])) {
                                    if ($info['tamano'] == 'mediano') {
                                        echo 'selected';
                                    }
                                } ?>
                                >Mediano</option>
  <option value="grande" <?php if (isset($info['tamano'])) {
                                    if ($info['tamano'] == 'grande') {
                                        echo 'selected';
                                    }
                                } ?>
                                >Grande</option>
   </select>

</div>
<div>

    <span>Total recaudado: <?php
$files = scandir("datos");
$cop = 0; 
foreach ($files as $file) {

    $path = "datos/{$file}";  
    $tem = 0;
   if (is_file($path)) {
       $info = file_get_contents($path);
       $dato = json_decode($info);
       
        $con = 0;
        foreach ($dato as $campo) {

           if ($con == "4") {
              $tem = "{$campo}";
        //    echo "{$campo}";
           }
           $con = $con + 1;
        }
   }
$cop = $cop + $tem;
}

echo "$cop";
?></span>
<br />
    <span>Empleados registrados: <?php
$files = scandir("datos");
$cop = 0; 
foreach ($files as $file) {

    $path = "datos/{$file}";  
    $tem = 0;
   if (is_file($path)) {
       $info = file_get_contents($path);
       $dato = json_decode($info);
       
        $con = 0;
        foreach ($dato as $campo) {

           if ($con == "5") {
              $tem = "{$campo}";
        //    echo "{$campo}";
           }
           $con = $con + 1;
        }
   }
$cop = $cop + $tem;
}

echo "$cop";

?></span>
<br />
    <span>Emplesas: <?php
$dir = scandir("datos");
$emp = count($dir) - 2;
echo $emp;
?></span>

</div>

</div>
</div>

<button class="btn btn-secondary" type="reset">Nuevo</button>
<button class="btn btn-success" type="submit">Guardar</button>

<br/><br/>
</form>

<div>
    <table class="table">
    <thead>
    <th>Empresa</th>
    <th>RNC</th>
    <th>Color</th>
    <th>Aportacion</th>
    <th>Cant.Empleados</th>
    <th>Nomen.</th>
    <th>Tamaño</th>
    <th>act</th>
    </thead>

    <tbody>

<?php 

$files = scandir("datos");

foreach ($files as $file) {

    $path = "datos/{$file}";

   if (is_file($path)) {
       $info = file_get_contents($path);
       $dato = json_decode($info);
       echo "<tr>";

$con = 0;
foreach ($dato as $campo) {

    if ($con <> "3") {
        echo "<td>{$campo}</td>";
    }
$con = $con + 1;

}
echo "
<td> 
<a href='index.php?eli={$file}' onclick='return confirm(\"Seguro de querer eliminar el registro?\")' class='btn btn-outline-danger'>Eliminar</a>
<a href='index.php?mod={$file}' class='btn btn-outline-primary'>Editar</a>
</td>
</tr>";
   }
}

?>
    </tbody>

</table>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
</body>
</html>
