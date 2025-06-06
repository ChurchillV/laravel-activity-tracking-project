# Stage 1: Node build for Vite assets
FROM node:18 AS node-builder

WORKDIR /app

# Install Node dependencies and build assets
COPY package*.json ./
RUN npm ci --no-progress
COPY . .
RUN npm run build


# Stage 2: Laravel production-ready image
FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# Copy Laravel application code
COPY . .

# Copy built Vite assets
COPY --from=node-builder /app/public/build /var/www/html/public/build

# Install Composer dependencies
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# Environment config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
