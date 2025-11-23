# Proyecto: Sitio web simple

Este repositorio contiene un archivo HTML muy simple de ejemplo.

Contenido principal:
```markdown
# Proyecto: Sitio web simple

Este repositorio contiene un archivo HTML muy simple de ejemplo.

Contenido principal:
- `index.html`: página de prueba.
- `styles.css`: estilo y diseño para index.html
```

**Postgres / Neon (opciones gratuitas y configuración rápida)**

Si vas a usar Neon (Postgres) o cualquier servicio PostgreSQL, puedes usar los archivos `db_pg.php` y `subscribe_pg.php` incluidos.

- `db_pg.php`: lee `DATABASE_URL` (recomendado) o las variables `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASS` y crea la tabla `subscribers` si no existe.
- `subscribe_pg.php`: endpoint que recibe `POST` con `email` y lo inserta en `subscribers` (usa PDO). Redirige a `index.html` con parámetros `m=ok` o `e=` para indicar resultado.

SQL (manual) para crear la tabla en Postgres si quieres ejecutarlo desde el panel de Neon o psql:

```sql
CREATE TABLE IF NOT EXISTS subscribers (
	id SERIAL PRIMARY KEY,
	email VARCHAR(255) NOT NULL UNIQUE,
	created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);
```

Ejemplo de `DATABASE_URL` (Neon) que puedes usar tal cual como variable de entorno:

```
postgresql://user:password@host:port/dbname?sslmode=require
```

Cómo establecer `DATABASE_URL` temporalmente en PowerShell (sesión actual):

```powershell
# $env:DATABASE_URL = 'postgresql://user:password@host:port/dbname?sslmode=require'
```

Para que la aplicación use Postgres, cambia el formulario en `index.html` a apuntar a `subscribe_pg.php` o duplica el formulario y apunta al endpoint que prefieras.

Si quieres, adapto `index.html` para usar `subscribe_pg.php` por defecto (o dejo las dos opciones). Dime tu preferencia.