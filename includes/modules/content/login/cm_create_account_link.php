<?php
/*
  $Id$

  CE Phoenix, E-Commerce made Easy
  https://phoenixcart.org

  Copyright (c) 2021 Phoenix Cart

  Released under the GNU General Public License
*/

  class cm_create_account_link extends abstract_executable_module {

    const CONFIG_KEY_BASE = 'MODULE_CONTENT_CREATE_ACCOUNT_LINK_';

    function __construct() {
      parent::__construct(__FILE__);
    }

    function execute() {
      $tpl_data = [ 'group' => $this->group, 'file' => __FILE__ ];
      include 'includes/modules/content/cm_template.php';
    }

    protected function get_parameters() {
      return [
        'MODULE_CONTENT_CREATE_ACCOUNT_LINK_STATUS' => [
          'title' => 'Enable Module',
          'value' => 'True',
          'desc' => 'Do you want to enable this module?',
          'set_func' => "Config::select_one(['True', 'False'], ",
        ],
        'MODULE_CONTENT_CREATE_ACCOUNT_LINK_CONTENT_WIDTH' => [
          'title' => 'Content Container',
          'value' => 'col-sm-6',
          'desc' => 'What container should the content be shown in? (col-*-12 = full width, col-*-6 = half width).',
        ],
        'MODULE_CONTENT_CREATE_ACCOUNT_LINK_SORT_ORDER' => [
          'title' => 'Sort Order',
          'value' => '2000',
          'desc' => 'Sort order of display. Lowest is displayed first.',
        ],
      ];
    }

  }
