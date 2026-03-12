# Manual de Usuario - Intérprete Golampi

**Universidad de San Carlos de Guatenala**

**Facultade de Ingeniería** 

**Organizacion de Lenguajes y Compiladores 2**

**Jorge Ivan Samayoa Sian - 202307506**

---

## 1. Instalación de la herramienta

Para que el usuario pueda hacer uso de la herramienta Golampi deberá de cumplir con los siguientes prerquisitos:

* **PHP 8.1 o superior**
* **Composer**
* **Obtener el proyecto ya sea descargandolo o habiendo clonado el repositorio**

Una vez el usuario tenga el proyecto descargado es momento de instalar las dependencias del backend

```ebnf
composer install 

 (* Comando para descargar el Runtime de ANTLR4 para PHP debntro de la carpeta vendor/*)
```
Ahora se levanta el servidor desde **Backend/**

```ebnf
php -S localhost:8000
```

Posteriormente se inicia el Frontend, para esto se debe arbir el archivo **index.html** directamente en el navegador o usar el siguiente comando

```ebnf
python3 -m http.server 3000

(*Ya que nuestro frontend está hecho de CSS, HTML Y JavaScript puro, podemos usar pytho3 para levantarlo ya que funciona con archivos estáticos y en este caso los archivos de nuestro frontend son archivos estáticos.*)
```
---
## 2. Funcionamiento de Golampi

Ya que hemos iniciado tanto nuestro backend como el frontend, nos dirigiremos al **localhost:3000** y lograremos visualizar la interfaz de nuestro intérprete.

![FirsImage](/Documentacion/Imagenes/golampi.png)

### 2.1. Barra de acciones
Como se puede observar en la esquina superior derecha de nuestro intérprete, Golampi ofrece distintas funcionalidades al usuario, las cuales son:

* **Nuevo:** Creará un archivo nuevo y limpiará la entrada de texto si ya existe algún tipo de código.

* **Cargar Archivo:** Abrirá nuestro explorador de archivo y nos permitirá abrir un archivo de extensión **.go** para probrar el código que esté escrito en el.

* **Guardar:** Guardará en nuestro dispositivo cualquier entrada de texto que esté en el editor.

* **Ejecutar:** Enviará el código fuente a nuestro servidor de php para que este sea analizado y nos devuelva ya sea una tabla de errores o los resultados de la ejecución con su respectiva tabla de símbolos.

* **Limpiar Consola:** Limpiará la consola de salida.  
<br>

![Toolbar](/Documentacion/Imagenes/toolbar.png)


### 2.2. Panel de edición

En este espacio el usuario podrá escribir y visualizar el código que le enviará al servidor php para que sea analizado y ejecutado. 

![Editor](/Documentacion/Imagenes/Editor.png)

### 2.3. Consola de salida

Es el área en donde el usuario podrá ver el resultado de su código fuente, siempre y cuando este no contenga ningún error ya sea léxico, sintáctico o semántico.

![Result](/Documentacion/Imagenes/Result.png)

### 2.4. Área de Reportes

Para este apartado el usuario podrá visualizar la tabla de errores (si es que los hay) o la tabla de símbolos resultantes de la ejecución del código fuente. 

#### 2.4.1. Tabla de errores 

Mostrará todos los errores que puedan presentarse en las fases léxicas, sintácticas y semánticas de la ejecución. La tabla de errores indicará el tipo de error, una breve descripción y su ubicación.

![Errores](/Documentacion/Imagenes/Errores.png)

#### 2.4.2. Tabla de símbolos

Mostrará todo los símbolos que el analizador vaya recolentando durante la ejecución del programa indicando el tipo, valor, ámbito y ubicación en el código.

![Simbolos](/Documentacion/Imagenes/Simbolos.png)

### 2.5. Panel de Reportes

Este apartado permitira al usuario poder descargar los reportes de errores y símbolos en formato ***.csv*** para una mejor visualziación.

![Reportes](/Documentacion/Imagenes/Reportes.png)

![CSV](/Documentacion/Imagenes/CSV.png)