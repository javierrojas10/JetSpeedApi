# JetSpeedApi

_API para hacer test de webs con PHP y javascript._

## Comenzando 🚀

_Crea una cuenta Google CLoud, crea un proyecto y obten un Key de autorización para usar la api de Google Speed Insights
Descarga o clona el repositorio. 
Utiliza el código de ejemplo para guiarte._


### Pre-requisitos 📋
#### Composer
_Necesitas composer, para ello en tu carpeta donde clonaste ejecuta el siguiente comando en tu consola_

* [MAC] (https://naftic.com/instalar-composer-en-mac/) - Como instalar composer desde MAC
* [Windows] (https://www.ecodeup.com/aprende-a-instalar-composer-en-windows-10/) - Como instala Composer en Windows

#### Guzzle
_Una vez que tengas composer, en tu carpeta donde clonaste debería haber un archivo llamado composer.json_
Si no está ahi puedes copiarlo de tu raíz, para migrarlo. y debe ingresar el siguiente comando a tu consola, dentro de la carpeta para instala Guzzle y se creará una carperta llamada "vendor", allí haremos el require de autoload.php.

```
composer require guzzlehttp/guzzle

```


### Instalación 🔧

_api.php es un archivo que permite asegurar el key de google, solo coloca tu key en:_

```
$ApiKey = [TU_API_KEY_AQUI];
```

## Ejecutando las pruebas ⚙️

_Para usar tu api solo debes hacer un GET request llamado url asi:_

```
http://[Localhost o tu ip]/api.php?url=https://jetdigital.cl
```

_La respuesta será así_

```
{
    "Interactive": "1.8 s",
    "Paint": "1.1 s",
    "Score": 89
}
```

_Interactive es el tiempo que toma la web en ser interactiva_
_Paint es el tiempo que toma la web en mostrarse_
_Score es un cálculo de los score de ambas métricas_

_Puede agregar más datos ya que el json de Google Speed Insights es larguísimo, pero con esto ya puedes ir probando_

```
https://www.googleapis.com/pagespeedonline/v5/runPagespeed?key=[TU API KEY]&url=https://jetdigital.cl
```

## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [PHP](https://www.php.net/manual/es/intro-whatis.php) 
* [JavaScript](https://www.javascript.com/) 
* [API Google](https://developers.google.com/speed/docs/insights/v5/get-started) 



## Autor ✒️
* **Javier Rojas** - *Todo* - [javierrojas10](https://github.com/javierrojas10)

## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Invita una cerveza 🍺 a alguien del equipo. 
* Da las gracias públicamente 🤓.
* etc.



---
⌨️ con ❤️ por [javierrojas10](https://github.com/javierrojas10) 😊
