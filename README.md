# 🎨 Encriptar-Desencriptar

Este proyecto es una aplicación en **PHP** diseñada para realizar operaciones de **encriptación** y **desencriptación** de datos. Utiliza algoritmos de cifrado para proteger información sensible y permite su recuperación mediante desencriptación.

---

## ✨ Características
- 🔒 **Encriptación simétrica y asimétrica**.
- 🛡️ Uso de algoritmos seguros para proteger datos.
- 🗄️ Integración con bases de datos mediante SQL.

---

## 📋 Requisitos previos
- **PHP**: Versión 7.4 o superior.
- **Composer**: Para gestionar las dependencias del proyecto.
- **Servidor web**: Apache o Nginx.
- **Base de datos**: MySQL o compatible.

---

## 🚀 Instalación

1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/SantiagoGRJ/Encriptar-Desencriptar.git
   cd Encriptar-Desencriptar
   ```

2. **Instalar dependencias**:
   ```bash
   composer install
   ```

3. **Configurar la base de datos**:
   - Crear una base de datos en MySQL.
   - Importar el archivo `algoritmo.sql`:
     ```bash
     mysql -u <usuario> -p <nombre_base_datos> < algoritmo.sql
     ```

4. **Configurar el entorno**:
   - Crear un archivo `.env` basado en el ejemplo proporcionado (si aplica).
   - Configurar las credenciales de la base de datos y otros parámetros necesarios.

5. **Iniciar el servidor**:
   - Usar el servidor embebido de PHP:
     ```bash
     php -S localhost:8000
     ```
   - O configurar un servidor web como Apache o Nginx.

---

## 🛠️ Uso
- Acceder a la aplicación desde el navegador en `http://localhost:8000` (o la URL configurada).
- Seguir las instrucciones en la interfaz para encriptar o desencriptar datos.

---

## 📂 Estructura del proyecto
- `index.php`: Punto de entrada de la aplicación.
- `src/`: Contiene el código fuente principal.
- `algoritmo.sql`: Archivo SQL para la configuración de la base de datos.
- `composer.json`: Archivo de configuración de dependencias.

---

## 🤝 Contribuciones
¡Las contribuciones son bienvenidas! Por favor, abre un issue o envía un pull request para sugerir mejoras o reportar problemas.

---

## 📜 Licencia
Este proyecto está licenciado bajo la **Licencia MIT**.