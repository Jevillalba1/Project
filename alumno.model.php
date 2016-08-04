<?php
//Se crea el modelo de acceso a la base de datos por medio de la clase "Alumnomodel1"
class AlumnoModel
{
    private $pdo;
//El constructor se encarga de inicializar la cadena de conexión hacia MySQL, y esta instancia se almacena en la variable de tipo private llamada "pd0"
    public function __CONSTRUCT()
    {
//PDO es orientada a objetos por eso podemos usar "try" para detectar errores en tiempo de ejecución
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
//PDO es orientada a objetos por eso podemos usar "catch" para detectar errores en tiempo de ejecución
        catch(Exception $e)
        {
            echo 'Lo sentimos ocurrio un error al conectar con la base de datos: ' . $e->getMessage();
        }
    }
//Se crea la funcion de tipo publica llamada "Listar"
    public function Listar()
    {
        try
        {
            $result = array();
//Codigo SQL para que muestre todos los datos de la tabla
            $stm = $this->pdo->prepare("SELECT * FROM registro");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Alumno();
//Se almacenan los datos de las tablas en variables
                $alm->__SET('Id', $r->Id);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Apellido', $r->Apellido);
                $alm->__SET('Direccion', $r->Direccion);
                $alm->__SET('Telefono', $r->Telefono);
                $alm->__SET('Correo', $r->Correo);
                $alm->__SET('Id_Usuario', $r->Id_Usuario);
                $alm->__SET('Contrasena', $r->Contrasena);


                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
//Se crea la funcion de tipo publica llamada "Obtener"
    public function Obtener($Id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM registro WHERE Id = ?");               
            $stm->execute(array($Id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Alumno();
//Se almacenan los resultados de la consulta en variables
                $alm->__SET('Id', $r->Id);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Apellido', $r->Apellido);
                $alm->__SET('Direccion', $r->Direccion);
                $alm->__SET('Telefono', $r->Telefono);
                $alm->__SET('Correo', $r->Correo);
                $alm->__SET('Id_Usuario', $r->Id_Usuario);
                $alm->__SET('Contrasena', $r->Contrasena);


            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
//Se crea la funcion de tipo publica llamada "Eliminar"
    public function Eliminar($Id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM registro WHERE Id = ?");                      

            $stm->execute(array($Id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
//Se crea la funcion de tipo publica llamada "Actualizar"
    public function Actualizar(Alumno $data)
    {
        try 
        {
            $sql = "UPDATE registro SET 
                        Nombre          = ?, 
                        Apellido        = ?,
                        Direccion       = ?, 
                        Telefono        = ?,
                        Correo          = ?,
                        Id_Usuario      = ?,
                        Contrasena      = ?
                    WHERE Id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nombre'), 
                    $data->__GET('Apellido'), 
                    $data->__GET('Direccion'),
                    $data->__GET('Telefono'),
                    $data->__GET('Correo'),
                    $data->__GET('Id_Usuario'),
                    $data->__GET('Contrasena'),
                    $data->__GET('Id')
                    )                    
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Alumno $data)
    {
        try 
        {

        $sql = "INSERT INTO registro (Id,Nombre,Apellido,Direccion,Telefono,Correo,Id_Usuario,Contrasena) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('Id'),
                $data->__GET('Nombre'), 
                $data->__GET('Apellido'), 
                $data->__GET('Direccion'),
                $data->__GET('Telefono'),
                $data->__GET('Correo'),
                $data->__GET('Id_Usuario'),
                $data->__GET('Contrasena')
                )
            );
        } catch (Exception $e) 
        {
            
            die($e->getMessage());
        }
    }
}
?>