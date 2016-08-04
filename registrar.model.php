<?php
class UsuarioModel
{
    private $pdo;
    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            echo 'Lo sentimos ocurrio un error al conectar con la base de datos: ' . $e->getMessage();
        }
    }
    public function Listar()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM registro");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Usuario();
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

            $alm = new Usuario();
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
    public function Actualizar(Usuario $data)
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

    public function Registrar(Usuario $data)
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