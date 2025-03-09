jQuery(document).ready(function($) {
  $('#ajax-search-form').on('submit', function(e) {
    e.preventDefault();
    $('#search-results-container').html('<div class="loading">Buscando...</div>');
      
    // Form data
    var searchData = {
      action: 'mega_search_ajax',
      s: $('#search-term').val(),
      per_page: $('#per_page').val(),
      security: mega_search_ajax.nonce
    };
      
    // Tipos de post type
    var selectedPostTypes = [];
    $('input[name="post_type[]"]:checked').each(function() {
      selectedPostTypes.push($(this).val());
    });
      
    if (selectedPostTypes.length > 0) {
      searchData.post_type = selectedPostTypes;
    }
      
    // Enviar solicitud AJAX
    $.ajax({
      url: mega_search_ajax.ajax_url,
      type: 'post',
      data: searchData,
      success: function(response) {
        $('#search-results-container').html(response);
      },
      error: function() {
        $('#search-results-container').html('<p>Error al procesar la búsqueda. Inténtelo de nuevo.</p>');
      }
    });
  });
});