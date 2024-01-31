# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any needed packages
##RUN apt-get update && \
   ## apt-get install -y libmysqli-dev && \
   ## docker-php-ext-install mysqli

# Make port 80 available to the world outside this container
EXPOSE 80

# Define environment variable for MySQL connection
ENV DB_HOST=localhost
ENV DB_USER=root
ENV DB_PASSWORD=
ENV DB_NAME=task_manager

# Start Apache when the container launches
CMD ["apache2-foreground"]
