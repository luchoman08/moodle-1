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

	//require_once($CFG->dirroot.'/calendar/lib.php');
	$html = theme_crisp_ases_get_html_for_settings($OUTPUT, $PAGE);
	global $DB, $USER;
	if (right_to_left()) {
	    $regionbsid = 'region-bs-main-and-post';
	} else {
	    $regionbsid = 'region-bs-main-and-pre';
	}
	$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
	?>
	<?php require('header.php'); ?>    

	<div id="show-admin">
		<a class="admin-sets" href="#">
			<span></span>
		</a>
		<div class="adminset">  
		<?php if ($hassidepre) { ?>
			<?php echo $OUTPUT->blocks_for_region('side-pre') ?>
		<?php 
	}
	?>
		</div>
	</div>
		
	<div id="page-content" class="row-fluid">
		<div class="row-fluid">
			<section id="region-main" class="span12 pull-right">
				<!-- Necessary HTML -->
				<div class="row-fluid">
					<div class="span12">
						<div id="lemmon-slider">
							<div id="slider3" class="slider">
								<ul>
									<?php
										$numberofslides = theme_crisp_get_setting('numberofslides');

										for($i = 1; $i <= $numberofslides; $i++){
											$slideimg = theme_crisp_render_slideimg($i, 'slide'.$i.'image');
											$url = theme_crisp_get_setting('slide'.$i.'caption');
											
											

									?>
											<li>
												<a href="<?php echo $url; ?>" target="_blank"><img src="<?php echo $slideimg; ?>" alt=""/></a>											
											</li>

									<?php } ?>
								</ul>

							</div>
							<div class="controls">
								<a href="#" class="next-slide"></a>
								<a href="#" class="prev-slide"></a>
							</div>
						</div> <!-- end of lemmon slider -->
					</div> 
				</div> 
				<?php
					
					$PAGE->requires->js('/lib/jquery/jquery-3.1.0.min.js');
					$PAGE->requires->js('/theme/'.$CFG->theme.'/lemmon-Lemmon-Slider/lemmon-slider.js');
				?>
				<script>
				
				/*window.onload = function(){
				  // home page slider 
				  $( '#slider3' ).lemmonSlider({ infinite: true});
						sliderAutoplay();
				  }
				  // autoplay
				  var sliderTimeout = null;
				  function sliderAutoplay(){
					  $( '#slider3' ).trigger( 'nextSlide' );
					  sliderTimeout = setTimeout( 'sliderAutoplay()', 3000 );
				  }*/
				
				</script>
				<div class="bodydetails">
					<div class="row-fluid">
						<?php 
							//MENSAJES PARA MOSTRAR EN LA PÁGINA PRINCIPAL (MANTENIMIENTO DEL CAMPUS,MENSAJES IMPORTANTES ETC)
								$textInformation = theme_crisp_get_setting('textinformation');

								if ($textInformation) {
						?>
										<div style="margin: 0px 0px 0px 110px;">
											<?php echo $textInformation; ?>
										</div>
						<?php				
								}
						?>

						
						
						<div class="shortnote">

									<div class="bodytexts">
										<div class="forsupport">
											<div class="icons">

												<a href="<?php echo $CFG->wwwroot.'/info-dintev/manuales.php';?>">
												<div id="ico-1" class="container"></div></a>
												

											</div>
											<div class="heads">

												<p style="color: #d51b23; padding-top: 6px; font-size: 17px;"><b><!-- 'Soporte' --></b></p>

											</div>
											<div class="texts">

												<p>Cómo ingresar al campus virtual<br>
													Inscripción de cursos (para profesores)<br>
													Gestión de recursos y actividades
												</p>
											</div>
										</div> <!-- end of forsupport -->

										<div class="forcourses">
											<div class="icons">

												<a href="<?php echo $CFG->wwwroot.'/info-dintev/cursospublicos.php';?>">
													<div id="ico-2" class="container"></div>
												</a>

											</div>
										<div class="heads">

	                    <p style="color: #d51b23; padding-top: 6px; font-size: 17px;"><b><!-- Cursos--></b></p>

										</div>

										<div class="texts">
											<p>Cursos disponibles para invitados<br>
												(no requiere iniciar sesión)</p>
										</div>
									</div>  <!-- end of forcourses -->
									<div class="forforum">
										<div class="icons">
											<a href="<?php echo $CFG->wwwroot.'/info-dintev/cursos-demo.php';?>">
												<div id="ico-3" class="container"></div>
											</a>

										</div>
										<div class="heads">


	                    <p style="color: #d51b23; padding-top: 6px; font-size: 17px;"><b><!-- Foros --></b></p>

										</div>
										<div class="texts">

											<p>Espacio para prácticas de prueba<br>
												sobre la plataforma Moodle
												del Campus Virtual</p>
										</div>
									</div> <!-- end of forforum -->
								</div>

	                		</div> <!-- end of shortnote -->
						</div> <!-- end of span8 cust -->

				</div> <!-- end of bodydetails -->

		</div> <!-- end of span12 -->
	</div>  <!-- end of row-fluid -->
				<div id="bodymaincontent" class="row-fluid">
				<?php
					echo $OUTPUT->main_content();
				?>
				</div>
			</section>
		</div>
	</div>
	<?php require('footer.php');
