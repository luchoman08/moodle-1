 # Instalación 
 
 ## Preparación: Base de datos
 ```SQL 
 CREATE DATABASE moodle35 WITH TEMPLATE moodle35 OWNER usuario;
 ```
## Preparación: Sitio
```bash
mkdir /var/www/moodledata35  
chmod -R 775 /var/www/moodledata35  
cd /var/www/html  
git clone https://github.com/vvbv/moodle.git  moodle35
cd moodle35/blocks  
git clone https://github.com/sistemasases/moduloases.git  ases
```
**Cambiar max_execution_time = 30 → max_execution_time = 400 en el siguiente archivo**  
```bash
nano /etc/php/$(php -v | head -n 1 | cut -d " " -f 2 | cut -f1-2 -d".")/apache2/php.ini 
systemctl restart apache2
```
 **Configurar según la máquina, la url de acceso en config.php y los usuarios de la base de datos.**  
 ```bash
google-chrome http://127.0.0.1/moodle35/install.php || firefox http://127.0.0.1/moodle35/install.php
```
**Finalmente ingresar con 'desadmin'**
