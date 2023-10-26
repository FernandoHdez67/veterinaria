# Utilizamos una imagen base con PHP y Apache
FROM php:8.1-apache

# Instalamos las extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install pdo_mysql

# Habilitamos el mod_rewrite de Apache para permitir el enrutamiento de Laravel
RUN a2enmod rewrite

# Establecemos el directorio de trabajo en el servidor web de Apache
WORKDIR /var/www/html

# Copiamos los archivos de tu proyecto Laravel al contenedor
COPY . /var/www/html

# Establecemos los permisos adecuados para los archivos de Laravel
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage

# Configuramos el archivo de host virtual de Apache para Laravel
COPY laravel.conf /etc/apache2/sites-available/000-default.conf

# Exponemos el puerto 80 para acceder a la aplicación Laravel
EXPOSE 80

# Comando para iniciar Apache cuando el contenedor se ejecute
CMD ["apache2-foreground"]
