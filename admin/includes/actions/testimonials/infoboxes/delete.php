<?php
/*
  $Id$

  CE Phoenix, E-Commerce made Easy
  https://phoenixcart.org

  Copyright (c) 2022 Phoenix Cart

  Released under the GNU General Public License
*/

  $heading = TEXT_INFO_HEADING_DELETE_TESTIMONIAL;
  $tInfo = &$GLOBALS['table_definition']['info'];
  $GLOBALS['link']->set_parameter('tID', $tInfo->testimonials_id);

  $contents = ['form' => new Form('testimonials', (clone $GLOBALS['link'])->set_parameter('action', 'delete_confirm'))];
  $contents[] = ['text' => TEXT_INFO_DELETE_TESTIMONIAL_INTRO];
  $contents[] = [
    'class' => 'text-center',
    'text' => new Button(IMAGE_DELETE, 'fas fa-trash', 'btn-danger me-2')
            . $GLOBALS['Admin']->button(IMAGE_CANCEL, 'fas fa-times', 'btn-light', $GLOBALS['link'])];
