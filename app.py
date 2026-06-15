from flask import Flask, render_template

# Inicializa la aplicación Flask
app = Flask(__name__)

# Define la ruta principal (página de inicio)
@app.route('/')
def home():
    # Renderiza el archivo index.html ubicado en la carpeta templates
    return render_template('index.html')

# Ejecuta el servidor
if __name__ == '__main__':
    app.run(debug=True)