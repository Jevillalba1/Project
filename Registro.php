<?php
//Interfaz que permite pintar la data por medio de codigo PHP

require_once 'alumno.entidad.php';
//Verifica que el archivo ya este incluido, y si es asi no se incluye de nuevo
require_once 'alumno.model.php';

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
//Se llaman cada uno de los casos descritos en el archivo "alumno.model.php", para de esta manera poder "mostrar" cada uno de los datos
        case 'actualizar':
            $alm->__SET('Id',              $_REQUEST['Id']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Direccion',       $_REQUEST['Direccion']);
            $alm->__SET('Telefono',        $_REQUEST['Telefono']);
            $alm->__SET('Correo',          $_REQUEST['Correo']);
            $alm->__SET('Id_Usuario',      $_REQUEST['Id_Usuario']);
            $alm->__SET('Contrasena',      $_REQUEST['Contrasena']);

            $model->Actualizar($alm);
            header('Location: Registro.php');
            break;

        case 'registrar':
            $alm->__SET('Id',              $_REQUEST['Id']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Direccion',       $_REQUEST['Direccion']);
            $alm->__SET('Telefono',        $_REQUEST['Telefono']);
            $alm->__SET('Correo',          $_REQUEST['Correo']);
            $alm->__SET('Id_Usuario',      $_REQUEST['Id_Usuario']);
            $alm->__SET('Contrasena',      $_REQUEST['Contrasena']);

            $model->Registrar($alm);
            header('Location: Registro.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['Id']);
            header('Location: Registro.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['Id']);
            break;
    }
}
?>
 <title>Registro</title>
        <head  profile="http://www.w3.org/2005/10/profile">
            <link rel="icon" type="image/png" href="../9.png">
            <link rel="stylesheet" type="text/css" href="../Style.css"> 
            <a href="Index.html"><IMG SRC="../2.png" height = 70 width= 170 Hspace = 10 Vspace = 1 > </a>
            <marquee  width = 65% height = "60" behavior=slide aling=top scrollamount = 10 bgcolor = red> 
                <font face = "Verdana", size = 20 , color = white>  Droger&iacutea PPs </font>
            </marquee>
            <font face="Comic Sans Ms" color="44D024" size="3"
            >
            <body link=green vlink=green alink=green>
            <a href="Index.html"><right>Iniciar Sesi&oacuten</right></a> | <a href="Registro.php"><right>Registrarse</right></a>
            </font>
            <hr style="border: 2px solid #791DD5; background-color:#286F2C; height: 5px; width: 90%; margin: 0 auto;"> </hr>
            <center> 
                <marquee width = 70% height = "30" SCROLLAMOUNT = 10 bgcolor = "F3EAEA" direction = left> 
                    <font face = "Verdana", size = 5 , color = black>  Todo lo que busca en un solo lugar </font> 
                </center>
            </marquee>
        </head>
   <Body background = "..\1.png">
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
                <li><a href="Index.html">Inicio </a></li>
                <li><a href="">Medicamentos </a>
                        <ul>
                            <li><a href="Mucoliticos.html">Mucol&iacuteticos </a></li>
                            <li><a href="Analgesicos.html">Analg&eacutesicos </a></li>                  <li><a href="Antibioticos.html">Antibi&oacuteticos </a></li>
                            <li><a href="Anticepticos.html">Antic&eacutepticos </a></li>
                            <li><a href="Laxantes.html">Laxantes </a></li>
                            <li><a href="Mucoliticos.html">Mucol&iacuteticos </a></li>
                            <li><a href="Antihistaminicos.html">Antihistam&iacutenicos </a></li>
                            <li><a href="Broncodilatadores.html">Broncodilatadores </a></li>                
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
                <form action="?action=<?php echo $alm->Id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <table >
                        <tr>
                            <th >Identificaci&oacuten</th>
                            <td><input type="text" name="Id" value="<?php echo $alm->__GET('Id'); ?>" required /></td>
                        </tr>
                        
                            <th >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" required /></td>
                        </tr>
                        <tr>
                            <th >Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>" required /></td>
                        </tr>
                        <tr>
                            <th >Direccion</th>
                            <td><input type="text" name="Direccion" value="<?php echo $alm->__GET('Direccion'); ?>" required /></td>
                        </tr>
                        <tr>
                            <th >Telefono</th>
                            <td><input type="text" name="Telefono" value="<?php echo $alm->__GET('Telefono'); ?>" required /></td>
                        </tr>
                         <tr>
                            <th >Correo</th>
                            <td><input type="text" name="Correo" value="<?php echo $alm->__GET('Correo'); ?>" required /></td>
                        </tr>
                        <tr>
                            <th >Id de usuario</th>
                            <td><input type="text" name="Id_Usuario" value="<?php echo $alm->__GET('Id_Usuario'); ?>" required /></td>
                        </tr>
                        <tr>
                            <th >Contrase&ntildea</th>
                            <td><input type="password" name="Contrasena" value="<?php echo $alm->__GET('Contrasena'); ?>" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Registrarse</button>
                            </td>
                        </tr>
                    </table>
                </form> 
            </div>
    </body>
</html>