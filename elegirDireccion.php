<?php
include_once("header.php");
include_once("config.php");
include("footer.php");

?>
<div class="container mt-5">
    <div class="row">
        <div id="legend">
            <legend class="">Direcciones disponibles para envio</legend>
        </div>
    </div>
</div>

<?php 
$sql = 'SELECT * from public."Direccion" where "Rut_Titular" ='."'".$_GET['rut']."'";
$q = pg_query($conexion,$sql);
$results = pg_fetch_all($q);
echo '
<form action="/proyectoBDD/elegirMetodosDePago.php/?rut='.$_GET['rut'].'&order='.$_GET['order'].' "method="POST">';
foreach($results as $key => $value){
    echo '
        <div class="input-group border border-black mt-3 ml-5">
        <div class="input-group-prepend">
            <div class="input-group-text">
            <input type="radio" name="'.$value['Alias_Direccion'].'" aria-label="Radio button for following text input">
            </div>
        </div>
            <div class="container ml-5">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2">Calle:</div>
                            <div class="col-4">'.$value['Calle'].'</div>
                        </div>
                        <div class="row">
                            <div class="col-2 ">Numero:</div>
                            <div class="col-4">'.$value['Numero'].'</div>
                        </div>
                        <div class="row">
                            <div class="col-2 ">Comuna:</div>
                            <div class="col-4">'.$value['Comuna'].'</div>
                        </div>
                        <div class="row">
                            <div class="col-2 ">Ciudad:</div>
                            <div class="col-4">'.$value['Ciudad'].'</div>
                        </div>  
                        <div class="row">
                            <div class="col-2 ">Alias Direccion:</div>
                            <div class="col-4">'.$value['Alias_Direccion'].'</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
} ?>
<div class="container mt-5">
    <div class="row justify-content-end">
        <div class="col-2">
            <input class="btn btn-primary" type="submit" value="Seleccionar Direccion">
        </div>
    </div>
</div>

</form>
