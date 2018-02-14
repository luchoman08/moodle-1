<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
// Get the HTML for the settings bits.
/**
 * Moodle's crisp theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_crisp
 * @copyright 2014 dualcube {@link http://dualcube.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $CFG, $USER;
$html = theme_crisp_ases_get_html_for_settings($OUTPUT, $PAGE);
echo $OUTPUT->doctype()
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
  <title><?php echo $OUTPUT->page_title(); ?></title>
  <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
  <?php echo $OUTPUT->standard_head_html() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<style>
    #snowflakeContainer {
      position: absolute;
      left: 0px;
      top: 0px;
    }
    .snowflake {
        padding-left: 15px;
        font-family: Cambria, Georgia, serif;
        font-size: 14px;
        line-height: 24px;
        position: fixed;
        color: #DADADA;
        user-select: none;
        z-index: 1000;
    }
    .snowflake:hover {
        cursor: default;
    }
</style>
<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>
<header id="header-login"role="banner" class="navbar <?php echo $html->navbarclass ?> moodle-has-zindex">

  <nav>

       <div class="row-fluid">
           <div class="span12">
              <a href="https://campusvirtual.univalle.edu.co/moodle"><img class="center-in-span"src="<?php echo $CFG->wwwroot. '/theme/crisp/img/Encabezado_IngresoCampus.png';?>"/></a>
           </div>
        </div>
  </nav>

</header>

<div id="snowflakeContainer">
    <p class="snowflake">*</p>
</div>



<div id="page" class="">
  <div id="page-content" class="row-fluid">

      <div class="container">
        <div id="content-login" class="container">
          <div class="row">
            <div id="msj-login" class="span6">
              <p>Si desea más informaci&oacuten ó  requiere
                asesoría adicional, por favor escríbanos a
                campusvirtual@correounivalle.edu.co ó comuniquese al 3182649 ó 3182653</p>
<a href="https://campusvirtual.univalle.edu.co/moodle/info-dintev/CVUV_usuarios_2015.swf">
<center> <h6><b>Manual de ingreso al Campus Virtual</b></a></h6></p></center>      
 </div>
            <div class="span6">
              <center><h5>Ingreso al Campus Virtual Univalle</h5></center>
              <?php echo $OUTPUT->main_content();?>
              <!-- <div class="forgetpass2"> 
              <a href="forgot_password.php">¿Olvidó su contraseña?</a>
              </div>-->
            <?php echo $OUTPUT->course_content_footer(); ?>
          </div>
        </div>

      </div>

  </div>
</div>
<script>
  
     

  //función para ajustar el tamaño del login cuando aparece mensaje de error
  var error = document.getElementById("loginerrormessage");
  if (error != null) { 
   		//altura del content-login
      var height_content_login = document.getElementById('content-login').offsetHeight; 		

      //aumentamos la altura
      document.getElementById('content-login').style.height = (height_content_login+34)+'px';
      //acomodamos el recuadro con el mensaje
   		document.getElementById('msj-login').style.marginTop ='5.5%';
  }
 </script>

<script>
  // The star of every good animation
var requestAnimationFrame = window.requestAnimationFrame || 
                            window.mozRequestAnimationFrame || 
                            window.webkitRequestAnimationFrame ||
                            window.msRequestAnimationFrame;

var transforms = ["transform", 
                  "msTransform", 
                  "webkitTransform", 
                  "mozTransform", 
                  "oTransform"];
                   
var transformProperty = getSupportedPropertyName(transforms);

// Array to store our Snowflake objects
var snowflakes = [];

// Global variables to store our browser's window size
var browserWidth;
var browserHeight;

// Specify the number of snowflakes you want visible
var numberOfSnowflakes = 50;

// Flag to reset the position of the snowflakes
var resetPosition = false;

//
// It all starts here...
//
function setup() {
  window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
  window.addEventListener("resize", setResetFlag, false);
}
setup();

//
// Vendor prefix management
//
function getSupportedPropertyName(properties) {
    for (var i = 0; i < properties.length; i++) {
        if (typeof document.body.style[properties[i]] != "undefined") {
            return properties[i];
        }
    }
    return null;
}

//
// Constructor for our Snowflake object
//
function Snowflake(element, radius, speed, xPos, yPos) {

  // set initial snowflake properties
    this.element = element;
    this.radius = radius;
    this.speed = speed;
    this.xPos = xPos;
    this.yPos = yPos;
  
  // declare variables used for snowflake's motion
    this.counter = 0;
    this.sign = Math.random() < 0.5 ? 1 : -1;
  
  // setting an initial opacity and size for our snowflake
    this.element.style.opacity = .1 + Math.random();
    this.element.style.fontSize = 12 + Math.random() * 50 + "px";
}

//
// The function responsible for actually moving our snowflake
//
Snowflake.prototype.update = function () {

  // using some trigonometry to determine our x and y position
    this.counter += this.speed / 5000;
    this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
    this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;

  // setting our snowflake's position
    setTranslate3DTransform(this.element, Math.round(this.xPos), Math.round(this.yPos));
    
    // if snowflake goes below the browser window, move it back to the top
    if (this.yPos > browserHeight) {
      this.yPos = -50;
    }
}

//
// A performant way to set your snowflake's position
//
function setTranslate3DTransform(element, xPosition, yPosition) {
  var val = "translate3d(" + xPosition + "px, " + yPosition + "px" + ", 0)";
    element.style[transformProperty] = val;
}

//
// The function responsible for creating the snowflake
//
function generateSnowflakes() {
  
  // get our snowflake element from the DOM and store it
    var originalSnowflake = document.querySelector(".snowflake");
    
    // access our snowflake element's parent container
    var snowflakeContainer = originalSnowflake.parentNode;
    
    // get our browser's size
  browserWidth = document.documentElement.clientWidth;
    browserHeight = document.documentElement.clientHeight;
          
    // create each individual snowflake
    for (var i = 0; i < numberOfSnowflakes; i++) {
    
      // clone our original snowflake and add it to snowflakeContainer
        var snowflakeCopy = originalSnowflake.cloneNode(true);
        snowflakeContainer.appendChild(snowflakeCopy);

    // set our snowflake's initial position and related properties
        var initialXPos = getPosition(50, browserWidth);
        var initialYPos = getPosition(50, browserHeight);
        var speed = 5+Math.random()*40;
        var radius = 4+Math.random()*10;
        
        // create our Snowflake object
        var snowflakeObject = new Snowflake(snowflakeCopy, 
                          radius, 
                          speed, 
                          initialXPos, 
                          initialYPos);
        snowflakes.push(snowflakeObject);
    }
    
    // remove the original snowflake because we no longer need it visible
  snowflakeContainer.removeChild(originalSnowflake);
  
  // call the moveSnowflakes function every 30 milliseconds
    moveSnowflakes();
}

//
// Responsible for moving each snowflake by calling its update function
//
function moveSnowflakes() {
    for (var i = 0; i < snowflakes.length; i++) {
        var snowflake = snowflakes[i];
        snowflake.update();
    }
    
  // Reset the position of all the snowflakes to a new value
    if (resetPosition) {
      browserWidth = document.documentElement.clientWidth;
      browserHeight = document.documentElement.clientHeight; 
      
    for (var i = 0; i < snowflakes.length; i++) {
          var snowflake = snowflakes[i];
          
          snowflake.xPos = getPosition(50, browserWidth);
          snowflake.yPos = getPosition(50, browserHeight);
      }
      
      resetPosition = false;
    }
    
    requestAnimationFrame(moveSnowflakes);
}

//
// This function returns a number between (maximum - offset) and (maximum + offset)
//
function getPosition(offset, size) {
  return Math.round(-1*offset + Math.random() * (size+2*offset));
}

//
// Trigger a reset of all the snowflakes' positions
//
function setResetFlag(e) {
  resetPosition = true;
}
</script>
<?php require('footer.php');


