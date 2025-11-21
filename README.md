# Proyecto: Sitio web simple

Este repositorio contiene un archivo HTML muy simple de ejemplo.

Contenido principal:
- `index.html`: página de bienvenida en español.

Instrucciones rápidas:

1. Clonar el repositorio:

   `git clone <url-del-repo>`

2. Abrir `index.html` en el navegador.

Cómo subir cambios (si no usas `gh`):

```
git add .
git commit -m "Mensaje descriptivo"
git branch -M main
git remote add origin https://github.com/<usuario>/<repo>.git
git push -u origin main
```

Si quieres que cree el repositorio remoto por ti, puedo intentar usar la CLI `gh` (de GitHub). Requiere que ya estés autenticado en tu máquina.

Requisitos y pasos siguientes (Windows PowerShell):

- Instalar Git: descarga e instala desde https://git-scm.com/download/win
- (Opcional) Instalar la GitHub CLI `gh`: https://cli.github.com/

Comandos para completar desde `C:\Users\IK\Documents\Web`:

```powershell
git init
git config user.name "$env:USERNAME"
git config user.email "$env:USERNAME@example.com"
git add .
git commit -m "Initial commit"
git branch -M main
# Crear repo remoto con gh (opcional):
gh repo create --public --source=. --confirm
git push -u origin main
```

Si no quieres instalar `gh`, después de crear el repo en GitHub copia la URL y ejecuta:

```powershell
git remote add origin https://github.com/<usuario>/<repo>.git
git push -u origin main
```

Si quieres, puedo volver a intentar ejecutar los pasos por ti una vez instales Git (y `gh` si deseas que cree el repo remoto automáticamente).
