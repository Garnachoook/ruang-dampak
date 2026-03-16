FROM php:8.2-apache

# 1. Install dependencies (ZIP, PostgreSQL, Curl)
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git libpq-dev curl

# 2. Install Node.js (untuk compile Tailwind & AlpineJS)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 3. Install PHP Ext untuk PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip

# 4. Aktifkan Apache mod_rewrite untuk routing Laravel
RUN a2enmod rewrite

# 5. Ubah root folder Apache ke /public milik Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 6. Copy seluruh file project ke dalam server
COPY . /var/www/html
WORKDIR /var/www/html

# 7. Install Composer & Dependencies PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# 8. Compile Frontend (Breeze/Livewire/Tailwind)
RUN npm install && npm run build

# 9. Berikan izin akses folder cache & storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache