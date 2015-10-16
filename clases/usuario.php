

   
<?php
class usuario
{
  public $nombre;
  public $correo;
  public $clave;

    public function BorrarUsuario()
   {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("
        delete 
        from usuarios        
        WHERE correo=:correo"); 
        $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);    
        $consulta->execute();
        return $consulta->rowCount();
   }

  public function ModificarUsuario()
   {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("
        update usuarios 
        set nombre= :nombre
        WHERE correo= :correo");
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);  
        $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);  

      return $consulta->execute();

   }
  
  
   public function InsertarUsuario()
   {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,correo,clave)values(:nombre,:correo,:clave)");
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);  
        $consulta->bindValue(':correo',$this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave',$this->clave, PDO::PARAM_STR);  
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
        

   }

   public function GuardarUsuario()
   {

    if($this->correo>0)
      {
        $this->ModificarUsuario();
      }else {
        $this->InsertarUsuario();
      }

   }


    public static function TraerTodoLosUsuarios()
  {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios");
      $consulta->execute();     
      return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");   
  }

  public static function TraerUnUsuario($id) 
  {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
      $consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUsuario(:id);");
              $consulta->bindValue(':id',$id, PDO::PARAM_STR);  
      $consulta->execute();
      $cdBuscado= $consulta->fetchObject('usuario');
      return $cdBuscado;        

      
  }


  public function mostrarDatos()
  {
      return "Metodo mostar:".$this->nombre."  ".$this->correo."  ".$this->clave;
  }

}