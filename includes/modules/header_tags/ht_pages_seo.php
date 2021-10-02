<?php
/*
  $Id$

  CE Phoenix, E-Commerce made Easy
  https://phoenixcart.org

  Copyright (c) 2021 Phoenix Cart

  Released under the GNU General Public License
*/

  class ht_pages_seo extends abstract_executable_module {

    const CONFIG_KEY_BASE = 'MODULE_HEADER_TAGS_PAGES_SEO_';

    public function __construct() {
      parent::__construct(__FILE__);

      $this->description .= '<div class="alert alert-warning">' . MODULE_HEADER_TAGS_PAGES_SEO_HELPER . '</div>';
    }

    public function execute() {
      global $Template, $page;

      if ( (defined('META_SEO_TITLE')) && (strlen(META_SEO_TITLE) > 0) || (!empty($page['navbar_title'])) || (!empty($page['pages_title'])) ) {
        $title = defined('META_SEO_TITLE') ? META_SEO_TITLE : $page['navbar_title'] ?? $page['pages_title'] ?? null;
        if (!Text::is_empty($title)) {
          $Template->set_title(Text::output($title)  . MODULE_HEADER_TAGS_PAGES_SEO_SEPARATOR . $Template->get_title());
        }
      }

      if ( (defined('META_SEO_DESCRIPTION')) && (strlen(META_SEO_DESCRIPTION) > 0) || (!empty($page['pages_seo_description'])) ) {
        $desc = defined('META_SEO_DESCRIPTION') ? META_SEO_DESCRIPTION : $page['pages_seo_description'] ?? null;
        if (!Text::is_empty($desc)) {
          $Template->add_block('<meta name="description" content="' . Text::output($desc) . '" />' . "\n", $this->group);
        }
      }
    }

    protected function get_parameters() {
      return [
        'MODULE_HEADER_TAGS_PAGES_SEO_STATUS' => [
          'title' => 'Enable Pages SEO Module',
          'value' => 'True',
          'desc' => 'Do you want to allow this module to write SEO to your Pages?',
          'set_func' => "Config::select_one(['True', 'False'], ",
        ],
        'MODULE_HEADER_TAGS_PAGES_SEO_SORT_ORDER' => [
          'title' => 'Sort Order',
          'value' => '0',
          'desc' => 'Sort order of display. Lowest is displayed first.',
        ],
      ];
    }

  }
