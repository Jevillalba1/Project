<?php
require_once 'enfermedad.entidad.php';
require_once 'enfermedad.model.php';

$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('Id_Enfermedad',   $_REQUEST['Id_Enfermedad']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Gravedad',        $_REQUEST['Gravedad']);
            $alm->__SET('Descripcion',     $_REQUEST['Descripcion']);

            $model->Actualizar($alm);
            header('Location: Enfermedades.php');
            break;

        case 'registrar':
            $alm->__SET('Id_Enfermedad',   $_REQUEST['Id_Enfermedad']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Gravedad',        $_REQUEST['Gravedad']);
            $alm->__SET('Descripcion',     $_REQUEST['Descripcion']);

            $model->Registrar($alm);
            header('Location: Enfermedades.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['Id_Enfermedad']);
            header('Location: Enfermedades.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['Id_Enfermedad']);
            break;
    }
}
?>
 
 <title>Enfermedades</title>
        <head  profile="http://www.w3.org/2005/10/profile">
            <link rel="icon" type="image/png" href="../9.png">
            <link rel="stylesheet" type="text/css" href="../Style.css"> 
            <a href="Index.html"><IMG SRC="../2.png" height = 70 width= 170 Hspace = 10 Vspace = 1 > </a>
            <marquee  width = 65% height = "60" behavior=slide aling=top scrollamount = 10 bgcolor = red> 
                <font face = "Verdana", size = 20 , color = white>  Droger&iacutea PPs </font>
            </marquee>
            <font face="Comic Sans Ms" color="44D024" size="3"
            >
            <body link="#0EC99D" vlink="#0EC99D" alink="#0EC99D">
            <a href="Index.html"><right>Iniciar Sesi&oacuten</right></a> | <a href="Registro.php"><right>Registrarse</right></a>
            </font>
            <hr style="border: 2px solid #791DD5; background-color:#286F2C; height: 5px; width: 90%; margin: 0 auto;"> </hr>
            <center> 
                <marquee width = 70% height = "30" SCROLLAMOUNT = 10 bgcolor = "F3EAEA" direction = left> 
                    <font face = "Verdana", size = 5 , color = black>  Todo lo que busca en un solo lugar </font> 
                </center>
            </marquee>
        </head>
   <Body background = "..\10.jpg">
    <form method=GET action="https://www.google.com/search">
    <TABLE  align =left style="position:absolute;top:135px;right:140px;"  ><tr><td>
    <A HREF="https://www.google.com/webhp?hl=es">
    <IMG SRC="http://img.deusm.com/informationweek/2015/09/1322015/logo_420_color_2x.png" border="0" ALT="Google" align="absmiddle" height= 80 width = 100></A>
    <INPUT TYPE=text name=q size=20 maxlength=255 value="">
    <INPUT TYPE=hidden name=hl value=es>
    <INPUT type=submit name=btnG VALUE="Buscar">    
    </td></tr></TABLE>
    </form>
       <div id = "header">
            <ul class = "nav">
                <li><a href="Administrador.html">Inicio </a></li>
                <li><a href="">Gestionar </a>
                        <ul>
                            <li><a href="Enfermedades.php">Enfermedades </a></li>
                            <li><a href="Analgesicos.html">Medicamentos </a></li><li><a href="Antibioticos.html">Usuarios </a></li>
                            <li><a href="Anticepticos.html">Administradores </a></li>
                        </ul>
                </li>
                <li><a href="">Dispositivos Medicos </a>
                        <ul>
                            <li><a href="Botiquin.html">Botiquin </a></li>
                            <li><a href="Accesorios.html">Accesorios </a></li>
                            <li><a href="Insumos.html">Insumos </a></li>
                            <li><a href="Equipos.html">Equipos </a></li>
                        </ul>
                </li>
                <li><a href="">Cuidado personal </a>
                        <ul>
                            <li><a href="Aseopersonal.html">Aseo personal </a></li>
                            <li><a href="Cuidadooral.html">Cuidado oral </a></li>
                            <li><a href="Cuidadocapilar.html">Cuidado capilar </a></li>
                            <li><a href="Cuidadodepies.html">Cuidado de pies </a></li>
                            <li><a href="Saludsexual.html">Salud sexual </a></li>                       
                        </ul>
                </li>
                    <li><a href="Contacto.html">Contacto </a></li>
            </ul>
        </div>
        <br>
        <br>
        <br>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <div class="pure-g" >
            <div class="pure-u-1-12">
                <form action="?action=<?php echo $alm->Id_Enfermedad > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <table>
                        <tr>
                            <th >Id de enfermedad</th>
                            <td><input type="text" name="Id_Enfermedad" value="<?php echo $alm->__GET('Id_Enfermedad'); ?>" required /></td>
                        </tr>
                        
                            <th >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" required /></td>
                        </tr>
                        <tr>
                            <th >Gravedad</th>
                            <td><input type="text" name="Gravedad" value="<?php echo $alm->__GET('Gravedad'); ?>" required /></td>
                        </tr>
                        <tr>
                            <th >Descripcion</th>
                            <td><input type="text" name="Descripcion" value="<?php echo $alm->__GET('Descripcion'); ?>" required  /></td>
                        </tr>
                         <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
        </br>
                </form> 
                    <table class="pure-table pure-table-horizontal" width="1000px" BGCOLOR="#22F8BC">
                        <thead>
                            <tr>
                                <th >Id de enfermdedad</th>
                                <th >Nombre</th>
                                <th >Gravedad</th>
                                <th >Descripcion</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php foreach($model->Listar() as $r): ?>
                            <tr>
                                <td align="center" width="50px"><?php echo $r->__GET('Id_Enfermedad'); ?></td>
                                <td align="center"><?php echo $r->__GET('Nombre'); ?></td>
                                <td align="center"><?php echo $r->__GET('Gravedad'); ?></td>
                                <td align="center"><?php echo $r->__GET('Descripcion'); ?></td>
                                <td>
                                    <a href="?action=editar&Id_Enfermedad=<?php echo $r->Id_Enfermedad; ?>">Editar</a>
                                </td>
                                <td>
                                    <a href="?action=eliminar&Id_Enfermedad=<?php echo $r->Id_Enfermedad; ?>">Eliminar</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>     
            </div>
    </body>
</html>