FROM php:8.1-apache

# Instalar extensiones para MySQL y PDO
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite (necesario para tu MVC)
RUN a2enmod rewrite

# Copiar todo el proyecto al contenedor
COPY . /var/www/html/

# Ajustar permisos para que Apache pueda leer los archivos
RUN chown -R www-data:www-data /var/www/html
