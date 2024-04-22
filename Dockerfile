# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Install any needed packages
RUN apt-get update && apt-get install -y \
    mysql-client \
    && docker-php-ext-install mysqli

# Set working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Expose port 80
EXPOSE 80

# Define environment variables
ENV MYSQL_HOST=localhost \
    MYSQL_USER=root \
    MYSQL_PASSWORD= \
    MYSQL_DATABASE=workshop

# Automatically run init.sql when the container starts
ADD workshop.sql /docker-entrypoint-initdb.d

# Start Apache
CMD ["apache2-foreground"]