# Bienvenido!!!

¡Bienvenido al repositorio! Aquí encontrarás 20 Formularios completos y funcionales, desarrollados utilizando PHP para la lógica del lado del servidor, bases de datos para almacenar los datos y HTML para la interfaz de usuario.



## Requisitos previos

Antes de comenzar a utilizar estos Formularios, asegúrate de tener los siguientes requisitos previos instalados en tu entorno de desarrollo:

1. Servidor web local (Xampp, Apache).

2. PHP (versión 7.0 o superior) instalado y configurado correctamente.

3. Un sistema de gestión de bases de datos compatible, como MySQL o PostgreSQL.

4. Navegador web actualizado.

5. Composer.

   

## Instrucciones de uso

Sigue los pasos a continuación para utilizar los :

1. Clona este repositorio en tu entorno de desarrollo local o descarga el código fuente como un archivo ZIP.

2. Configura tu entorno de desarrollo para que apunte al directorio raíz del repositorio clonado o al directorio descomprimido.

3. Crea una base de datos llamada "campusland", ya que asi esta por defecto en las credenciales que apuntan a la base de datos.

4. Importa el archivo SQL proporcionado con cada CRUD para crear la estructura de la base de datos y poblarla con datos de ejemplo, "El archivo se encuentra en la carpeta baseData".

5. Abre el archivo de conexión a la base de datos que se encuentra en la ruta (script/db/credentials) y configura los parámetros de conexión según tu entorno (por ejemplo, nombre de usuario, contraseña).

6. Abre el navegador web y accede a la URL correspondiente a cada CRUD (por ejemplo, `http://localhost/Prueba-piloto/index.hmtl`).

   

## Estructura del repositorio

El repositorio está organizado de la siguiente manera:

```
BaseData |
		 |campusland ->archivo exportable a la base de datos
css |
	|archivos con los estilos css de interfaz
js |
   |components |
   		       |Interfaz js de cada crud
   	archivos |
   			 |archivos que muestran los cruds
script|
	  |db|
	  	 |Carpeta con los archivos de conexión a la base de datos
	  archivos con el backend de cada crud	 
uploads |
		|Archivo que recolecta los datos y los envia a la base de datos
.gitignore
.htaccess
composer.js |
			|Configuración de composer con enrutamiento de carpetas
composer.lock
index.html |
 		   |Archivo con la interfaz de usuario
```



## Problemas y preguntas

Si tienes algún problema o pregunta relacionada con estos CRUDs, no dudes en abrir un "Issue" en este repositorio. Haré todo lo posible para ayudarte y resolver cualquier problema que encuentres.

