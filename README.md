# Sistema de Búsqueda de Cursos y Exámenes

## Descripción
Aplicación Desarrollada para responder a travez de la consola de comandos.

## Requisitos Previos

- PHP (7.4 o superior)
- composer
- MySql y Phpmyadmin o cualquier gestor de BBDD para verificar la informacion

## Instalación

1. Copiar el proyecto en la ruta de ejecucion para php

2. Instalar dependencias

```bash
composer install
```

## Configuración

1. Crear archivo `.env` en la raíz del proyecto y coloca las variables de configuración del equipo en uso

```sh
cp .env-example .env
```

2. Desde tu terminal o línea de comandos y accede a MySQL usando el siguiente comando:

```sh
mysql -u tu_usuario -p
```

3. Ejecuta el archivo para la ejecucion de la base de datos dentro de la terminal de MySQL con el siguiente comando:

```sh
SOURCE /ruta/al/proyecto/db/schema.sql;
```

4. Por ultimo salimos de la consola de MySQL

```sh
EXIT;
```

## Ejecución

Para ejecutar la aplicación:

```bash
php main.php search trabajo
```

## Estructura del Proyecto

```text
language-school/
├── composer.json
├── main.php
├── phpunit.xml
├── db/
│   ├──schema.sql
├── src/
│   ├── Core/
│   │   ├── SearchResult.php
│   │   └── AbstractSearchResult.php
│   ├── Entity/
│   │   ├── Course.php
│   │   └── Exam.php
│   ├── Repository/
│   │   └── SearchRepository.php
│   └── Service/
│       └── SearchService.php
└── tests/
    ├── Entity/
    │   ├── CourseTest.php
    │   └── ExamTest.php
    ├── Repository/
    │   └── SearchRepositoryTest.php
    └── Service/
        └── SearchServiceTest.php
```

## Características Principales

- Búsqueda por palabras clave

## Contribuir

1. Hacer fork del repositorio
2. Crear una nueva rama
3. Realizar cambios y commit
4. Crear pull request

## Licencia

Este proyecto está bajo la Licencia MIT.

## Información de Contacto

- **Nombre:** Jonay Mend
- **Correo:** [jonay12@gmail.com](mailto:jonay12@gmail.com)
- **Teléfono:** +58-412-55555555
