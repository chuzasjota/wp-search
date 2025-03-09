# Mega Buscador

Un buscador avanzado para WordPress que permite buscar en posts, páginas y archivos con funcionalidad AJAX, mejorando la experiencia del usuario.

## 📌 Descripción previa

- Se está utilizando **WordPress 6.7.2**.
- El tema elegido es **Getwid Base**.
- Se realizó un **web scraping** de la página [CONAF](https://www.conaf.cl/) para extraer páginas, posts y archivos con el único propósito de contar con datos de prueba para el buscador.

## 🔧 Uso

El buscador está configurado para buscar en **archivos adjuntos (attachments), páginas y entradas** en WordPress y se implemento AJAX para mostrar el resultado sin recargar la página.

- Se incluye un filtro de tipo.
- Una lista desplegable para manipular la cantidad de resultados a mostrar
- Para tener resultado diferentes puedes buscar con las siguientes palabras **mujeres - cites - conaf - aclaracion**

### 🔍 Búsqueda de archivos

- Se indexan archivos PDF, DOCX, XLSX.
- Se extrae el tipo de archivo, título, tamaño del archivo y la fecha para mostrar en los resultados

### 🔎 Búsqueda en posts y páginas

- Permite buscar en títulos y contenido de **posts y páginas**.
- Se extraen títulos, descripciones, fechas y tipo de post para mostrar en los resultos.
