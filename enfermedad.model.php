<?php
class AlumnoModel
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
            $stm = $this->pdo->prepare("SELECT * FROM enfermedades");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Alumno();
                $alm->__SET('Id_Enfermedad', $r->Id_Enfermedad);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Gravedad', $r->Gravedad);
                $alm->__SET('Descripcion', $r->Descripcion);

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    public function Obtener($Id_Enfermedad)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM enfermedades WHERE Id_Enfermedad = ?");               
            $stm->execute(array($Id_Enfermedad));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Alumno();
//Se almacenan los resultados de la consulta en variables
                $alm->__SET('Id_Enfermedad', $r->Id_Enfermedad);
                $alm->__SET('Nombre', $r->Nombre);
                $alm->__SET('Gravedad', $r->Gravedad);
                $alm->__SET('Descripcion', $r->Descripcion);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    public function Eliminar($Id_Enfermedad)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM enfermedades WHERE Id_Enfermedad = ?");                      

            $stm->execute(array($Id_Enfermedad));
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
            $sql = "UPDATE enfermedades SET 
                        Nombre          = ?, 
                        Gravedad        = ?,
                        Descripcion     = ? 
                WHERE Id_Enfermedad = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Nombre'), 
                    $data->__GET('Gravedad'), 
                    $data->__GET('Descripcion'),
                    $data->__GET('Id_Enfermedad')
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

        $sql = "INSERT INTO enfermedades (Id_Enfermedad,Nombre,Gravedad,Descripcion) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('Id_Enfermedad'),
                $data->__GET('Nombre'), 
                $data->__GET('Gravedad'), 
                $data->__GET('Descripcion'),
                )
            );
        } catch (Exception $e) 
        {
            
            die($e->getMessage());
        }
    }
}
?>