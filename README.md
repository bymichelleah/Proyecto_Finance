# 💼 Finance

## 📌 Descripción del Proyecto
**Finance** es un sistema interno diseñado para optimizar la gestión financiera de entidades, garantizando **seguridad, confiabilidad y eficiencia** en cada proceso y transacción.  
Su objetivo principal es consolidarse como una **solución digital moderna y líder** dentro del sector financiero.

---

## 🎯 Objetivo General
Desarrollar un sistema interno **Finance** que optimice la gestión financiera de las entidades, garantizando seguridad y confiabilidad en cada proceso y transacción, consolidando su posición como una **solución digital líder** en el sector financiero.

---

## 🏗️ Desarrollo por Semanas

### 📅 Semana 01
- Elaboración de la **maquetación en Figma**.  
- Definición de la **identidad visual** y diseño de las vistas principales.

### 📅 Semana 02
- Definición de la **base de datos relacional** para el sistema Finance.  
- Modelado de tablas y relaciones principales.

### 📅 Semana 03
- Creación del **repositorio en GitHub** para trabajo colaborativo.  
- Configuración de las ramas:  
  - `main` (rama principal)  
  - `Gian`, `Michelle`, `Damaris`, `Nathali` (ramas colaborativas de desarrollo)

### 📅 Semana 04
- Desarrollo de las **vistas principales** en Laravel según la maqueta de Figma:  
  - `Login`  
  - `Productos`  
  - `Clientes`  
  - `Pagos`  
  - `Reportes`

### 📄 Semana Final
- Implementación de un **README** con resumen técnico del proyecto.  
- Integración final y pruebas del sistema.

---

## 🧩 Tecnologías Utilizadas
- **Laravel 10** (Framework principal)
- **MySQL** (Gestor de base de datos)
- **HTML5, CSS3 y Blade** (Vistas dinámicas)
- **Git y GitHub** (Control de versiones)
- **Figma** (Diseño UI/UX)

---

## 👥 Equipo de Desarrollo
- **Gian** – Backend y lógica de negocio  
- **Michelle** – Integración de vistas y login  
- **Damaris** – Módulo de clientes  
- **Nathali** – Módulo de productos y reportes  

---

## 🚀 Instalación del Proyecto

```bash
# Clonar el repositorio
git clone https://github.com/usuario/finance.git

# Ingresar al proyecto
cd finance

# Instalar dependencias
composer install

# Configurar el archivo .env
cp .env.example .env
php artisan key:generate

# Migrar la base de datos
php artisan migrate

# Iniciar el servidor local
php artisan serve

