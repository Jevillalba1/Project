<?php

require_once 'registrar.entidad.php';
require_once 'registrar.model.php';

$alm = new Usuario();
$model = new UsuarioModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
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
            header('Location: Gestion_Clientes.php');
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
            header('Location: Gestion_Clientes.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['Id']);
            header('Location: Gestion_Clientes.php');
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
            <a href="Administrador.html"><IMG SRC="../2.png" height = 70 width= 170 Hspace = 10 Vspace = 1 > </a>
            <marquee  width = 65% height = "60" behavior=slide aling=top scrollamount = 10 bgcolor = red> 
                <font face = "Verdana", size = 20 , color = white>  Droger&iacutea PPs </font>
            </marquee>
            <font face="Comic Sans Ms" color="44D024" size="3"
            >
            <body link=green vlink=green alink=green>
            <a href="Index.html"><right>Iniciar Sesi&oacuten</right></a> | <a href="Registro.php"><right>Registarse</right></a>
            </font>
            <hr style="border: 2px solid #791DD5; background-color:#286F2C; height: 5px; width: 90%; margin: 0 auto;"> </hr>
            <center> 
                <marquee width = 70% height = "30" SCROLLAMOUNT = 10 bgcolor = "F3EAEA" direction = left> 
                    <font face = "Verdana", size = 5 , color = black>  GESTI&OacuteN DE USUARIOS </font> 
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
                                <button type="submit" class="pure-button pure-button-primary">Aceptar</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <table class="pure-table pure-table-horizontal" width="1000px" BGCOLOR="#22F8BC">
                        <thead>
                            <tr>
                                <th >Identificaci&oacuten</th>
                                <th >Nombre</th>
                                <th >Apellido</th>
                                <th >Direcci&oacuten</th>
                                <th >T&eacutelefono</th>
                                <th >Correo</th>
                                <th >Id de usuario</th>
                                <th >Contras&ntildea</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php foreach($model->Listar() as $r): ?>
                            <tr>
                                <td align="center"><?php echo $r->__GET('Id'); ?></td>
                                <td align="center"><?php echo $r->__GET('Nombre'); ?></td>
                                <td align="center"><?php echo $r->__GET('Apellido'); ?></td>
                                <td align="center"><?php echo $r->__GET('Direccion'); ?></td>
                                <td align="center"><?php echo $r->__GET('Telefono'); ?></td>
                                <td align="center"><?php echo $r->__GET('Correo'); ?></td>
                                <td align="center"><?php echo $r->__GET('Id_Usuario'); ?></td>
                                <td align="center"><?php echo $r->__GET('Contrasena'); ?></td>
                                <td>
                                    <a href="?action=editar&Id=<?php echo $r->Id; ?>">Editar</a>
                                </td>
                                <td>
                                    <a href="?action=eliminar&Id=<?php echo $r->Id; ?>">Eliminar</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>  
            </div>
    </body>
</html>