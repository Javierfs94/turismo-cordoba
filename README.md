# Turismo Córdoba

# Cómo desplegar en local

Recomendamos el uso de XAMPP en Windows puesto que es muy fácil de desplegar así. Se requiere tener instalado en el XAMPP Apache, PHP y MySQL. 

Una vez instalado XAMPP, pudiendo descargarlo de https://www.apachefriends.org/es/download.html, iniciaremos los servicios de Apache y MySQL. Si la instalación ha sido correcta, al acceder por nuestro navegador en la barra de dirección a http://localhost/dashboard/ nos mostrará la página por defecto de Apache y en http://localhost/phpmyadmin/ nos llevará a la base de datos.

Descargamos el repositorio del proyecto, y copiados la carpeta turismocordoba en el htdocs de XAMPP.

En phpmyadmin haremos login (por defecto el login se hace sin contraseña). Crearemos una base de datos llamada turismocordoba, accederemos y en las opciones de la barra superior, pulsaremos en Importar, e importaremos el fichero turismocordoba.sql.

Tras estos pasos tendriamos el proyecto montado y funcional en local.

# Cómo desplegar en un servidor

El proceso es bastante similar, sólo que deberemos tener preparado el servidor para atender las correspondientes peticiones y redirecciones.

En la carpeta proyecto de CodeIgniter, deberemos modificar 2 archivos: Index.php (se encuentra en la ráiz del proyecto) y database.php (se encuentra en aplication/config)


Index.php 
	define('URLWEB', 'http://localhost/turismocordoba/'); => Deberemos modificarlo por la url de nuestra web

database.php
  Modificaremos hostname por nuestro host y username/password por los que tengamos en nuestra base de datos.
