# @src https://dev.to/jonesrussell/install-composer-in-custom-docker-image-3f71
# Dockerfile
FROM php:7.4.1-fpm 
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer