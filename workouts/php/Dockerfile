# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Global build arguments
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
ARG UID=1000

ARG COMPOSER_VERSION=2.2
ARG PHP_VERSION=8.1

# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Fetch Composer
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
FROM composer:${COMPOSER_VERSION} as composer

# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Builds base image
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
FROM php:${PHP_VERSION}-cli as build
ARG UID

# Install common dependencies
RUN \
  apt-get update \
  && apt-get install -y \
    libzip-dev \
    zip \
  && docker-php-ext-install \
    zip \
  && rm -rf /var/lib/apt/lists/*

# Install dev dependencies
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Create rootless user
RUN \
  useradd -u $UID -m -d /var/www devuser \
  && chown -R devuser:devuser /var/www

USER devuser

# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Package the app
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
FROM build as package
ARG UID

COPY --chown=$UID . /var/www/app

WORKDIR /var/www/app

# Install project dependencies
RUN composer install --no-interaction
