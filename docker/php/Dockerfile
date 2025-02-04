# Указываем базовый образ
FROM php:8.2-fpm

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    default-mysql-client \  
    # Используем default-mysql-client вместо mysql-client
    && docker-php-ext-install zip pdo_mysql

# Установка Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Установка прав на директории Laravel
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Копируем файлы приложения
COPY . /var/www/html

# Установка зависимостей Laravel
RUN composer install --no-dev --optimize-autoloader

# Установка прав на директории storage и cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Указываем пользователя
USER www-data
