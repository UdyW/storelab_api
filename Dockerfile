FROM composer
RUN composer global require "laravel/lumen-installer"
ENV PATH $PATH:/tmp/vendor/bin
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer