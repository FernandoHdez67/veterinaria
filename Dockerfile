# Usa la imagen oficial de PHP con Apache como servidor web
FROM php:apache

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Instala las dependencias de Laravel y otras herramientas necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# Copia los archivos de la aplicación al contenedor
COPY . /var/www/html

# Instala las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las dependencias de la aplicación Laravel
RUN composer install

# Configura los permisos de almacenamiento de Laravel (ajústalo según tus necesidades)
RUN chown -R www-data:www-data storage bootstrap/cache

# Genera una clave de aplicación de Laravel
RUN php artisan key:generate

# Expone el puerto 80 para que Apache pueda servir la aplicación
EXPOSE 80

# Comando para iniciar el servidor web de Apache
CMD ["apache2-foreground"]
