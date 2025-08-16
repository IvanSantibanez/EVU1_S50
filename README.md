# Pasos a seguir para levantar proyecto luego de clonar
---
1. Ejecutar comando `composer install` para instalar dependencias
2. Copiar contenido del **.env.example** en el archivo **.env** (se debe generar localmente si no existe)
3. Ejecutar comando `php artisan key:generate` para configurar la key
4. Configurar **Base de Datos** con el nombre indicado en el archivo **.env**
5. Ejecutar comando `php artisan migrate:fresh --seed` para correr migraciones y seeders
6. Ejecutar comando `php artisan serve` para levantar

