# Use a imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libxml2-dev \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo pdo_mysql

# Habilite o módulo mod_rewrite do Apache
RUN a2enmod rewrite

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie o código para o diretório de trabalho
COPY . /var/www/html

# Defina a variável de ambiente do Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Exponha a porta 80 para o Apache
EXPOSE 80

# Comando para iniciar o Apache no container
CMD ["apache2-foreground"]
