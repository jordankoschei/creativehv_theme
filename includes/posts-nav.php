<?php
  $title = 'Recent interviews';

  if (is_category() || is_tax('location')) {
    if (is_category()) {
      $title = single_term_title('', false) . ' interviews';
    }

    if (is_tax('location')) {
      $title = single_term_title('Interviews in ', false);

      $location = get_queried_object();
      if ($location->parent !== 0) {
        $county = get_term($location->parent, 'location');
        $title .= ' (<a href="' . get_term_link($county->term_id, 'location') . '">' . $county->name . '</a>)';
      }
    }

    if (is_paged()) {
      $title .= ' — Page ' . get_query_var('paged');
    }
  } else {
    if (is_paged()) {
      $title = 'Page ' . get_query_var('paged');
    }
  }
?>

<div class="posts__top">
  <h2><?php echo $title; ?></h2>

  <div class="posts__selects">
    <?php
      wp_dropdown_categories(array(
        'show_option_all' => 'Any location',
        'taxonomy' => 'location',
        'hierarchical' => 1,
        'show_count' => 1,
        'name' => 'loc',
        'value_field' => 'slug',
        'selected' => get_query_var('location')
      ));

      wp_dropdown_categories(array(
        'show_option_all' => 'Any creative field',
        'show_count' => 1
      ));
    ?>
  </div>
</div>

<script type="text/javascript">
  var catDropdown = document.getElementById('cat');
  var locDropdown = document.getElementById('loc');

  function onDropdownChange(dropdown, taxonomy) {
    location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?" + taxonomy + "=" + dropdown.options[dropdown.selectedIndex].value;
  }

  catDropdown.onchange = function() { onDropdownChange(catDropdown, 'cat'); }
  locDropdown.onchange = function() { onDropdownChange(locDropdown, 'location'); }
</script>
