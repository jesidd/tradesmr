<?php

include 'ConectBe.php';
include '../../modelo/entidad/Usuario.php';

class User{

    public function AutenticarUser($user,$pass){
        $conectbe = new ConectBe();

        $data_table= $conectbe->ejecutarConsulta("SELECT * FROM usuarios WHERE usuario = :user AND password = :pass", 
                                                    array(':user'=>$user,':pass'=>$pass));
        $usuario= null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["id"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }

    }

    public function verificarExistente($username, $correo){
        $conectbe = new ConectBe();
        
        $data_table= $conectbe->ejecutarConsulta("SELECT * FROM usuarios WHERE usuario = :user OR correo = :correo", 
                                                    array(':user'=>$username,':correo'=>$correo));
        $usuario= null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["id"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }

    }

    public function insertarUsuario(Usuario $usuario,$rol){
        $data_source= new ConectBe();

        $iguales = $this->verificarExistente($usuario->getUsername(),$usuario->getCorreo());

        if($iguales == null){
            $sql = "INSERT INTO usuarios (usuario, correo, password,rol) VALUES ( :username, :correo, :password,:rol)";
            $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':username'=>$usuario->getUsername(),
                ':correo'=>$usuario->getCorreo(),
                ':rol'=>$rol,
                ':password'=>$usuario->getPassword()
                )
            );
            return $resultado;
        }else{
            $errMsg .= 'Username and Password already existing';
            return null;
        }
    }

    public function buscarUsuarioPorUser($username){
        $data_source = new ConectBe();
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuarios WHERE usuario = :username", 
                                                    array(':username'=>$username));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["usuario"],
                    $data_table[$indice]["correo"],
                    $data_table[$indice]["password"]
                    );
            }
            return $usuario;
        }else{
            return null;
        }
    }    

    public function buscarUsuarioPorId($id){
        $data_source = new ConectBe();

        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuarios WHERE id = :id", 
                                                    array(':id'=>$id));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["usuario"],
                    $data_table[$indice]["correo"],
                    $data_table[$indice]["password"]
                    );
            }
            return $usuario;
        }else{
            return null;
        }
    } 

    public function obtenerFoto($id){
        $data_source = new ConectBe();

        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuarios WHERE id = :id", 
                                                    array(':id'=>$id));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){

                $resultado=   $data_table[$indice]["foto"];
  
            }
            return $resultado;
        }else{
            return null;
        }
    }    

    public function obtenerRol($id){
        $data_source = new ConectBe();

        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuarios WHERE id = :id", 
                                                    array(':id'=>$id));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){

                $resultado=   $data_table[$indice]["rol"];
  
            }
            return $resultado;
        }else{
            return null;
        }
    }  

    public function verificarExistenteExcpt($username, $correo,$id){
        $conectbe = new ConectBe();

        $data_table= $conectbe->ejecutarConsulta("SELECT * FROM usuarios WHERE id <> $id AND ( usuario = :user OR correo = :correo )", 
                                                    array(':user'=>$username,':correo'=>$correo));
        $usuario= null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["id"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }

    }

    public function modificarUsuario(Usuario $usuario,$foto){
        $data_source= new ConectBe();
        
        $iguales = $this->verificarExistenteExcpt($usuario->getUsername(),$usuario->getCorreo(),$usuario->getId());//verifica si los datos de confirmacion son los mismos del usuario

        if($iguales == null){
            $sql = "UPDATE usuarios SET "
            . " usuario= :username, "
            . " correo= :correo, "
            . " password= :password,"
            . " foto= :foto"
            . " WHERE id= :id";
            $resultado = $data_source->ejecutarActualizacion($sql, array(
            ':username'=>$usuario->getUsername(),
            ':correo'=>$usuario->getCorreo(),
            ':password'=>$usuario->getPassword(),
            ':id'=>$usuario->getId(),
            ':foto'=>$foto
              )
            );
        }else{
            $resultado = null;
        }

        return $resultado;
    }

    public function borrarUsuario(Usuario $usuario){
        $data_source = new ConectBe();

        $userEncontrado = $this->buscarUsuarioPorId($usuario->getId());

        if($userEncontrado->getUsername() == $usuario->getUsername()){

            if($userEncontrado->getPassword() == $usuario->getPassword()){
                $sql = "DELETE FROM usuarios "
                . " WHERE id= :id";
                $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':id'=>$usuario->getId()
              )
            );
            }else{
                $errMsg ='contraseña incorrecta';
                return null;
            }

        }else{
            $errMsg ='nombre de usuario incorrecto';
            return null;
        }
        
        return $resultado;
    }

}


?>