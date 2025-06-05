# FROM richarvey/nginx-php-fpm:latest

# COPY . .

# # Image config
# ENV SKIP_COMPOSER 1
# ENV WEBROOT /var/www/html/public
# ENV PHP_ERRORS_STDERR 1
# ENV RUN_SCRIPTS 1
# ENV REAL_IP_HEADER 1

# # Laravel config
# ENV APP_ENV production
# ENV APP_DEBUG false
# ENV LOG_CHANNEL stderr

# # Allow composer to run as root
# ENV COMPOSER_ALLOW_SUPERUSER 1

# CMD ["/start.sh"]

# Stage 1: Build Vite assets
FROM node:18 as node-builder

WORKDIR /app
COPY package*.json ./
RUN npm ci --no-progress
COPY . .
RUN npm run build

# Stage 2: Build final Laravel app image
FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# Copy Laravel app
COPY . .

# Copy Vite build assets from Node.js build
COPY --from=node-builder /app/public/build /var/www/html/public/build

# Laravel environment config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1


# Run artisan commands for optimization
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

CMD ["/start.sh"]
