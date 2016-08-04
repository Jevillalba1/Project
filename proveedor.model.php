<?php
class ProveedorModel
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
            $stm = $this->pdo->prepare("SELECT * FROM proveedor");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new proveedor();
                $alm->__SET('Id_Proveedor', $r->Id_Proveedor);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Telefono', $r->Telefono);
                $alm->__SET('Direccion', $r->Direccion);
                $alm->__SET('Estado', $r->Estado);

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function Obtener($Id_Proveedor)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM proveedor WHERE Id_Proveedor = ?");               
            $stm->execute(array($Id_Proveedor));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new proveedor();
                $alm->__SET('Id_Proveedor', $r->Id_Proveedor);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Telefono', $r->Telefono);
                $alm->__SET('Direccion', $r->Direccion);
                $alm->__SET('Estado', $r->Estado);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public function Eliminar($Id_Proveedor)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM proveedor WHERE Id_Proveedor = ?");                      

            $stm->execute(array($Id_Proveedor));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public function Actualizar(proveedor $data)
    {
        try 
        {
            $sql = "UPDATE proveedor SET 
                        Nombre          = ?, 
                        Telefono        = ?,
                        Direccion       = ?,
                        Estado          = ? 
                WHERE Id_Proveedor = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nombre'), 
                    $data->__GET('Telefono'), 
                    $data->__GET('Direccion'),
                    $data->__GET('Estado'),
                    $data->__GET('Id_Proveedor')
                    )                    
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(proveedor $data)
    {
        try 
        {

        $sql = "INSERT INTO proveedor (Id_Proveedor,Nombre,Telefono,Direccion,Estado) 
                VALUES (?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('Id_Proveedor'),
                $data->__GET('Nombre'), 
                $data->__GET('Telefono'), 
                $data->__GET('Direccion'),
                $data->__GET('Estado'),
                )
            );
        } catch (Exception $e) 
        {
            
            die($e->getMessage());
        }
    }
}
?>