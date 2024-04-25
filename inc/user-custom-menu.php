<?php

// Adicionar novo menu
function magnifico_custom_menu($menu_links) {
  $menu_links = array_slice($menu_links, 0, 5, true)
  + ['certificados' => 'Certificados']
  + array_slice($menu_links, 5, NULL, true);

  unset($menu_links['downloads']);
  unset($menu_links['certificados']);

  return $menu_links;
}

add_filter('woocommerce_account_menu_items', 'magnifico_custom_menu');
