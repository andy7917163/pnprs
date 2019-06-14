FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
&& docker-php-ext-install -j$(nproc) iconv \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-install zip \
&& docker-php-ext-configure pdo_mysql \
&& docker-php-ext-install pdo_mysql \
&& docker-php-ext-install opcache \
&& docker-php-ext-install mysqli \
&& docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
&& docker-php-ext-install pdo pdo_pgsql pgsql \
&& pecl install redis-4.3.0 \
&& pecl install swoole \
&& docker-php-ext-enable redis swoole

# Install Composer
ENV COMPOSER_HOME /root/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH $COMPOSER_HOME/vendor/bin:$PATH

# Write Permission
WORKDIR /app
RUN usermod -u 1000 www-data