<?php

//Proceso de conexión con la base de datos
require("conexionBaseDatos.php");
//Iniciar Sesión
//session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
    header("location:index.php");
}else{
    //busco el id usario y lo guardo en una variable
    $idusuario= $_SESSION['idusuario'];
// echo "idusuario= $idusuario<br>";
    $consulta="SELECT * FROM Usuario WHERE idUsuario='$idusuario'";
    $resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
    $resultado_obtenido=mysqli_fetch_array($resultado);
//obtengo el tipo de perfil que tiene
    $TipoPerfil_idTipoPerfil= $resultado_obtenido['TipoPerfil_idTipoPerfil'];
    $_SESSION['TipoPerfil'] = $TipoPerfil_idTipoPerfil;
// echo "tipodeperfil= $TipoPerfil_idTipoPerfil<br>";

    $consulta="SELECT * FROM TipoPerfil WHERE idTipoPerfil='$TipoPerfil_idTipoPerfil'";
    $resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
    $resultado_obtenido=mysqli_fetch_array($resultado);
//obtengo el tipo de perfil que tiene
    $Permisos_idPermisos= $resultado_obtenido['Permisos_idPermisos'];
    $PerfilDescripcion=$resultado_obtenido['PerfilDescripcion'];
// echo "Permisos= $Permisos_idPermisos<br>";

    $consulta="SELECT * FROM Permisos WHERE idPermisos='$Permisos_idPermisos'";
    $resultado= mysqli_query($link, $consulta) or die (mysqli_error($link));
    $resultado_obtenido=mysqli_fetch_array($resultado);


//obtengo los permisos que tiene si es 1(permitido), si es 0(no permitido)
    $PermisoCrearSocio= $resultado_obtenido['PermisoCrearSocio'];
    $_SESSION['PermisoCrearSocio'] = $PermisoCrearSocio;
//
    $PermisoCrearLibro= $resultado_obtenido['PermisoCrearLibro'];
    $_SESSION['PermisoCrearLibro'] = $PermisoCrearLibro;
//

//si no esta el ID no muestra el formulario***********************************
    if($idusuario!=null)
    {
        //FORMULARIO DE USUARIO*********************************************************************
        echo "<form form action='' method='post' name='formulario_usuario'>
          <table align=center>
              <tr>
                <td><h2 >$PerfilDescripcion de la Biblioteca</h2></td>
              </tr>";
        //si tiene permido de editar sus datos personales se muestra esta opcion
        if($PermisoCrearSocio==1)
        {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name=EditarMisDatosPersonales value='Editar Mis Datos Personales'></td>
                  </tr>";
        }
        if($PermisoCrearLibro==1)
        {echo"
                  <tr>
                  <td><input style='margin: 5px' class='btn btn-default' type='submit' name='EditarDatosPersonalesOtros' value='Editar Datos Personales Otros'></td>
                  </tr>";
        }

//////////////////////////////////////////////////////
        if($TipoPerfil_idTipoPerfil!=(1 or 10))
        {
            echo"<td>R=Regente||P=Preceptor/a||S=Secretario/a||C=Cambio de Funciones||D=Docente||T=Tutor||A=Alumno/a</td>";
        }


        echo"          
          </table>
        </form>
    ";
        #if(isset($_POST['EditarMisDatosPersonales']))
        #{
        //llama al archivo php 1
        #   header("location:MenuDatosPersonales.php");
        #}
    }
    @mysqli_free_result($resultado);
    @mysqli_close($link);
}


?>
