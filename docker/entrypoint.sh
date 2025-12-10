#!/usr/bin/env bash
set -euo pipefail

# small helper to wait for db readiness (Postgres or MySQL)
wait_for_db() {
  if [ -z "${DB_CONNECTION:-}" ]; then
    return 0
  fi

  echo "Waiting for DB (${DB_CONNECTION:-}) to be ready..."

  if [ "${DB_CONNECTION}" = "pgsql" ]; then
    for i in $(seq 1 30); do
      if php -r "try { new PDO('pgsql:host=${DB_HOST:-} ;port=${DB_PORT:-5432};dbname=${DB_DATABASE:-}', '${DB_USERNAME:-}', '${DB_PASSWORD:-}'); echo 'ok'; } catch(Exception \$e) { exit(1);}"; then
        echo "Postgres is ready"
        return 0
      fi
      sleep 1
    done
    echo "Postgres did not become ready in time"
    return 1
  else
    for i in $(seq 1 30); do
      if php -r "try { new PDO('mysql:host=${DB_HOST:-};port=${DB_PORT:-};dbname=${DB_DATABASE:-}', '${DB_USERNAME:-}', '${DB_PASSWORD:-}'); echo 'ok'; } catch(Exception \$e) { exit(1);}"; then
        echo "MySQL is ready"
        return 0
      fi
      sleep 1
    done
    echo "MySQL did not become ready in time"
    return 1
  fi
}

# run startup tasks only if APP_ENV != 'local' or optionally always
if [ "${APP_ENV:-production}" != "local" ]; then
  # Wait for DB
  if ! wait_for_db; then
    echo "DB wait failed - continuing but migrations may fail"
  fi

  # Ensure storage:link exists (safe)
  if [ ! -L public/storage ]; then
    php artisan storage:link || echo "storage:link failed (maybe already exists)"
  fi

  # Run migrations (force so it doesn't ask)
  if [ "${SKIP_MIGRATIONS:-0}" != "1" ]; then
    php artisan migrate --force || echo "Migration failed (see logs)"
  fi

  # Clear and warm caches (optional)
  php artisan config:cache || true
  php artisan route:cache || true
  php artisan view:cache || true
fi

# ensure proper permissions on runtime
chown -R www-data:www-data storage bootstrap/cache || true

# exec CMD (apache2-foreground) passed from Dockerfile CMD
exec "$@"
