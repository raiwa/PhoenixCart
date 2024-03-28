<?php
/*
  $Id$

  CE Phoenix, E-Commerce made Easy
  https://phoenixcart.org

  Copyright (c) 2022 Phoenix Cart

  Released under the GNU General Public License
*/

  require 'includes/application_top.php';
  $link = $Admin->link()->retain_query_except(['action', 'nID']);

  require 'includes/segments/process_action.php';

  require 'includes/template_top.php';
?>

  <div class="row">
    <div class="col">
      <h1 class="display-4 mb-2"><?= HEADING_TITLE ?></h1>
    </div>
    <div class="col text-right align-self-center">
      <?=
      $Admin->button('<img src="images/icon_phoenix.png" class="mr-2">' . GET_HELP, '', 'btn-dark mr-2', GET_HELP_LINK, ['newwindow' => true]), 
        empty($action)
      ? $Admin->button(IMAGE_NEW_NEWSLETTER, 'fas fa-newspaper', 'btn-danger', $Admin->link()->set_parameter('action', 'new'))
      : $Admin->button(IMAGE_BACK, 'fas fa-angle-left', 'btn-light', $link)
      ?>
    </div>
  </div>

<?php
  if ($view_file = $Admin->locate('/views', $action)) {
    require $view_file;
  }

  require 'includes/template_bottom.php';
  require 'includes/application_bottom.php';
?>
