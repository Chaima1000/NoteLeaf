#!/bin/bash
set -e

# Wait for MySQL to be available (sometimes needed in Docker Compose)
echo "Waiting for MySQL to start..."
until mysql -h"$DB_HOST" -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -e "SHOW DATABASES;"; do
  echo "Waiting for MySQL to be available..."
  sleep 2
done

# Create the database and user if they don't exist
mysql -u root -p$MYSQL_ROOT_PASSWORD <<EOF
CREATE DATABASE IF NOT EXISTS $MYSQL_DATABASE;
CREATE USER IF NOT EXISTS '$MYSQL_USER'@'%' IDENTIFIED BY '$MYSQL_PASSWORD';
GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%';
FLUSH PRIVILEGES;
EOF
echo "Database and user created successfully!"
