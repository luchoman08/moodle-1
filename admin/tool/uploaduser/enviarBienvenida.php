<?php
//define('CLI_SCRIPT', true);
//require('../../../config.php');
require_once($CFG->dirroot.'/lib/moodlelib.php');
require_once($CFG->dirroot.'/lib/accesslib.php');

$correo_electronico;
$boton_ingresar;
$boton_entrar  ;
$url_imagen_menu;
$sufijoCorreoInstitucional ;
$correoFuente = 'campusvirtual@correounivalle.edu.co';



function getButton($texto){
  return (string) ('<button style="border : 0px; margin: 5px; padding : 5px; font-size : 100%;color: white; background: #d51b23;" class="btn"  >'.$texto.'</button> ');
}

$sufijoc = 'correounivalle.edu.co';
$correo_electronico = 'campusvirtual@correounivalle.edu.co';
$boton_ingresar = getButton('Ingresar') ;
$boton_entrar = getButton('Entrar') ;
$url_imagen_menu = '<img src="https://campusvirtual.univalle.edu.co/moodle/theme/image.php/crisp/theme/1504192393/IconoHome" alt="menu univalle" /> ';


  /**
  *Chequea si el correo es institucional o no
  *@param string $correo
  *@return boolean 
  */


function chequeoCorreoInstitucional($correo){
  global $sufijoc;
   $regex = "/^[A-Za-z._0-9]+@" . $sufijoc .'$/';
  if(!preg_match($regex, $correo) )
    return false;
  return true ;
}

/**
  *@param user $user Atributos utilizados: username email
*/
function getMail($user) {



  $actualizar_corre_univalle = '' ;

  if(!chequeoCorreoInstitucional($user->email)){
$actualizar_corre_univalle =
' <p><span style="color: #ff0000;">PD</span>: Por favor actualizar su correo electrónico institucional en el Campus Virtual.:</p>
<ul>
<li>Dar clic sobre su nombre que aparece en la parte superior derecha.</li>
<li>Elegir Preferencias y luego Editar perfil.</li>
<li>Actualizar el correo electr&oacute;nico, preferiblemente el institucional.</li>
<li>Dar clic en el bot&oacute;n '. getButton('Actualizar informaci&oacute;n Personal'). ' </li>
</ul>   '

;
}
  global $OUTPUT;
  global $correo_electronico;
  global $boton_ingresar;
  global $boton_entrar  ;
  global $url_imagen_menu;
  global $sufijoCorreoInstitucional ;

  $mensaje_html = '
<!DOCTYPE html>
<html>
  <head>
    <style>
      @media only screen and (max-device-width: 480px) {
        /* mobile-specific CSS styles go here */
      }
    </style>
  </head>
  <body>
    <p>Cordial saludo.</p>
    <p>
        <em>
          <span style="color: #ff0000;">NOTA:</span>
        </em> 
      NOMBRE DE USUARIO EN EL CAMPUS VIRTUAL: 
      <span style="color: #99ccff;"> 
        <span style="color: #000000;">
          <em>
            <strong>'
            ;
              $mensaje_html .= '<span style="font-size: 18pt;">'.$user->username.'</span>' .
           '</strong>
          </em>
        </span>
      </span>
    </p>
    <p>Nos permitimos enviarle las instrucciones para ingresar al Campus Virtual, que también las podrá encontrar en el slider de la página principal <em><strong><span style="color: #3366ff;"><a href="https://campusvirtual.univalle.edu.co/moodle/info-dintev/CVUV_usuarios_2015.html" target="_blank" style="color: #3366ff;">Manual de Ingreso al Campus Virtual</a></span>:</strong></em></p>
    <ul>
      <li>En un navegador, escribir la direcci&oacute;n o URL: <span style="color: #3366ff;"><a href="https://campusvirtual.univalle. edu.co/" target="_blank" style="color: #3366ff;">https://campusvirtual.univalle. edu.co/</a></span>.</li>';
      $mensaje_html .=
      '<li>Dar clic en el bot&oacute;n'.$boton_ingresar.'(lado Superior-Derecho).</li>'      ;
      $mensaje_html .=
      '<li>Escribir los siguientes datos y luego dar clic en el bot&oacute;n '.$boton_entrar.'</li>' . '
      <ul>
        <li>En <strong>Nombre de usuario</strong>, c&oacute;digo estudiantil, un gui&oacute;n y el c&oacute;digo del plan.</li>
        <li>Ejemplo: <strong>1234567-3746</strong></li>
        <li>En <strong>Contraseña</strong>, primera letra del primer nombre en <strong>mayúscula</strong>, el c&oacute;digo estudiantil (sin los dos primeros dígitos del año) y la primera letra del primer apellido en <strong>mayúscula</strong>.  Ejemplo:  Nombre completo del estudiante MARCO AURELIO PATIÑO TORRES con c&oacute;digo 1512345. La contraseña seria: <strong>M1234567P</strong></li>
      </ul>
      <li>Cambiar la contraseña: escribir la contraseña actual y luego escribir dos veces la nueva contraseña.</li>
      <li>Al ingresar al Campus Virtual encontrará las opciones para actualizar su informaci&oacute;n personal, correo electr&oacute;nico o cambiar su contraseña, etc.</li>';
      $mensaje_html .=  
      '<li>Puede acceder a sus cursos, dar clic en el icono '.$url_imagen_menu.
       '(parte superior-izquierdo) y en el Bloque Mis Cursos aparece el listado de cursos ordenados por semestres, empezando por el actual y dar clic  en el nombre del curso.</li> 
    </ul>
    <p>Si usted olvida la contraseña:</p>
    <p></p>
    <ul>'
    ;
    $mensaje_html .= '
      <li>Dar clic en el bot&oacute;n '.$boton_ingresar.'(parte Superior-Derecho).</li>
      <li>Dar clic en el enlace<strong> ¿Olvid&oacute; su contraseña?</strong> (bloque <strong>Entrar</strong>).</li>
      <li>Escribir su nombre de usuario, por ejemplo: c&oacute;digo estudiantil, un gui&oacute;n y el c&oacute;digo del plan. Ejemplo: <strong>1234567-3746</strong>.</li>
      ';
       $mensaje_html .= '
      <li>O enviar un correo electr&oacute;nico a <a href="mailto:' .$correo_electronico .'" target="_blank">'.$correo_electronico.'</a> con sus nombres, apellidos, c&oacute;digo estudiantil y del Programa Académico.</li>
    </ul>';
    $mensaje_html .= 
    $actualizar_corre_univalle . 
  '</body>
</html>';

return $mensaje_html;
}

  function sendMailToNewUsers($users){
	$subject = 'Creación de su nuevo usuario';
    global $USER;
  	if(is_siteadmin($user_or_id = null)){
	    foreach($users as $i => $user){
        $mailHtml = getMail($user);
	      email_to_user($user, $USER, $subject, $mailHtml , $mailHtml,  ", ", true);
	    }
    }
  } 

  
 //Prueba para solo un usario
/*
echo "hola";
$user = new stdClass();
$user->email = 'luchoman08@gmail.com';
$user->username = '1327951-37463';

print_r (email_to_user($user, $user, $subject, "", getMail($user),  ", ", true));
//echo getMail($user);
*/
?>
