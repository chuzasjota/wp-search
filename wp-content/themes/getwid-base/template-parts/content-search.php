<div class="mega-search">
  <form id="ajax-search-form" class="search-form">
    <input type="text" class="search-field" placeholder="Buscador..." value="" name="s" id="search-term">
    
    <div class="search-options">
      <h3>Buscar solo en:</h3>
      <label>
        <input type="checkbox" name="post_type[]" value="post"> Entradas
      </label>
      <label>
        <input type="checkbox" name="post_type[]" value="page"> Páginas
      </label>
      <label>
        <input type="checkbox" name="post_type[]" value="attachment"> Archivos
      </label>
    </div>
    
    <div class="search-quantity">
      <label for="per_page">Cantidad a mostrar:</label>
      <select name="per_page" id="per_page">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
      </select>
    </div>
    
    <button type="submit" id="search-submit">Buscar</button>
  </form>

  <div id="search-results-container">
    <!-- Aquí se cargarán los resultados vía AJAX -->
  </div>
</div>