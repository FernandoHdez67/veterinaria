FROM php:8.1-apache

LABEL maintainer="jaivic"

# Habilitar mod_rewrite en Apache
RUN a2enmod rewrite

# Instalar dependencias y extensiones necesarias
RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libicu-dev \
        libxml2-dev \
        libpq-dev \
        vim \
        git \
    && docker-php-ext-install pdo pdo_mysql zip intl xmlrpc soap opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs \
    && apt-get autoremove -y

# Copiar archivos de configuración de Apache y PHP
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/apache/apache2.conf /etc/apache2/apache2.conf
COPY docker/php/php.ini /usr/local/etc/php/php.ini

# Configurar el entorno de Composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# Copiar el código fuente de la aplicación
WORKDIR /var/www/html/
COPY . /var/www/html/

# Configurar permisos y ejecutar Composer install al final para aprovechar el caché de capas
RUN chown -R www-data:www-data /var/www/html \
    && composer install --no-dev --optimize-autoloader --prefer-dist \
    && rm -rf /root/.composer/cache

# Limpiar el sistema de paquetes innecesarios y cachés
RUN apt-get purge -y --auto-remove git \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

EXPOSE 80

CMD ["apache2-foreground"]
