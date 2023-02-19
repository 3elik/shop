FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

RUN pecl install xdebug-3.1.5 \
    && docker-php-ext-enable xdebug

COPY composer.lock composer.json /var/www/

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    vim \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Create system user to run Composer and Artisan Commands
RUN groupadd -g 1000 $user
RUN useradd -u $uid -ms /bin/bash -g $user $user

# Set working directory
WORKDIR /var/www

COPY . /var/www
COPY --chown=$user:$user . /var/www

USER $user
