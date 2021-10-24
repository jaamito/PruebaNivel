<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prueba de nivel

Api que se conecta a la api Stack Exchange y obtiene información de la consulta https://api.stackexchange.com/2.3/questions?site=stackoverflow, he creado 3 URL en la api que son las siguientes:

- /api/info: muestra las url con información sobre cada URL y un acceso directo para probarlas.
- /api/random: muestra de forma random consultas a la api de StackExchange.
- /api/getQuestions?tagged=php&fromdate=1293840000&todate=1294444800": muestra consultas con 3 filtros, recuerda que el filtro Tagged es obligatorio, sin ese filtro la consulta no funcionará.


