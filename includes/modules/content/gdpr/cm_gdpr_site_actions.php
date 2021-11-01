<?php
/*
  $Id$

  CE Phoenix, E-Commerce made Easy
  https://phoenixcart.org

  Copyright (c) 2021 Phoenix Cart

  Released under the GNU General Public License
*/

  class cm_gdpr_site_actions extends abstract_executable_module {

    const CONFIG_KEY_BASE = 'MODULE_CONTENT_GDPR_SITE_ACTIONS_';

    public function __construct() {
      parent::__construct(__FILE__);
      $this->description .= '<div class="alert alert-warning">' . MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION . '</div>';
    }

    public function execute() {
      global $port_my_data;

      $actions_query = $GLOBALS['db']->query("SELECT * FROM action_recorder WHERE user_id = " . (int)$_SESSION['customer_id'] . " AND module != 'ar_admin_login' ORDER BY id DESC");

      $num_actions = mysqli_num_rows($actions_query);

      if ($num_actions) {
        $port_my_data['YOU']['ACTIONS']['COUNT'] = $num_actions;
        $a = 1;
        while ($actions = $actions_query->fetch_assoc()) {
          $port_my_data['YOU']['ACTIONS']['LIST'][$a]['ACTION'] = constant($actions['module']);
          $port_my_data['YOU']['ACTIONS']['LIST'][$a]['DATE'] = $actions['date_added'];
          $a++;
        }

        $tpl_data = [ 'group' => $this->group, 'file' => __FILE__ ];
        include 'includes/modules/content/cm_template.php';
      }
    }

    protected function get_parameters() {
      return [
        'MODULE_CONTENT_GDPR_SITE_ACTIONS_STATUS' => [
          'title' => 'Enable Site Actions Module',
          'value' => 'True',
          'desc' => 'Should this module be shown on the GDPR page?',
          'set_func' => "Config::select_one(['True', 'False'], ",
        ],
        'MODULE_CONTENT_GDPR_SITE_ACTIONS_CONTENT_WIDTH' => [
          'title' => 'Content Width',
          'value' => '12',
          'desc' => 'What width container should the content be shown in?',
          'set_func' => "Config::select_one(['12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1'], ",
        ],
        'MODULE_CONTENT_GDPR_SITE_ACTIONS_SORT_ORDER' => [
          'title' => 'Sort Order',
          'value' => '225',
          'desc' => 'Sort order of display. Lowest is displayed first.',
        ],
      ];
    }

  }
