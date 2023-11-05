# Use an official PHP runtime as a parent image
FROM php:apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install dependencies and extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo_mysql

# Copy the application files to the container
COPY . /var/www/html

# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Set environment variables for AWS ECS
ENV AWS_REGION=us-east-2
ENV ECR_REPOSITORY=cachorropet
ENV ECS_SERVICE=MY_ECS_SERVICE
ENV ECS_CLUSTER=ClusterCachorroPET
ENV ECS_TASK_DEFINITION=MY_ECS_TASK_DEFINITION
ENV CONTAINER_NAME=ClusterCachorroPET

# Expose port 80 for Apache
EXPOSE 8000

# Start Apache server
CMD ["apache2-foreground"]