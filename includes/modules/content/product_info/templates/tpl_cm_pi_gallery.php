<div class="col-sm-<?= (int)MODULE_CONTENT_PI_GALLERY_CONTENT_WIDTH ?> cm-pi-gallery">
  <?php
  $pi_image .= '<a href="#lightbox" class="lb" data-toggle="modal" data-slide="0">';
  $pi_image .= new Image('images/' . $active_image['image'], htmlspecialchars( $active_image['htmlcontent']));
  $pi_image .= '</a>';

  $first_img_indicator = '<li data-target="#carousel" data-slide-to="0" class="pointer active"></li>';
  $first_img = '<div class="carousel-item text-center active">';
  $first_img .= new Image('images/' . $active_image['image'], ['alt' => htmlspecialchars($active_image['htmlcontent']), 'loading' => 'lazy']);
  $first_img .= '</div>';

// now create the thumbs
  if (count($other_images) > 0) {
    $pi_thumb .= '<div class="row">';
    foreach ($other_images as $k => $v) {
      $n = $k+1;
      $pi_thumb .= '<div class="' . MODULE_CONTENT_PI_GALLERY_CONTENT_WIDTH_EACH . '">';
      $pi_thumb .= '<a href="#lightbox" class="lb" data-toggle="modal" data-slide="' . $n . '">';
      $pi_thumb .= new Image('images/' . $v['image'], ['loading' => 'lazy']);
      $pi_thumb .= '</a>';
      $pi_thumb .= '</div>';
    }
    $pi_thumb .= '</div>';

    $other_img_indicator = $other_img = '';
    foreach ($other_images as $k => $v) {
      $n = $k+1;
      $other_img_indicator .= '<li data-target="#carousel" data-slide-to="' . $n . '" class="pointer"></li>';
      $other_img .= '<div class="carousel-item text-center">';
      $other_img .= new Image('images/' . $v['image'], ['loading' => 'lazy']);
      if (!Text::is_empty($v['htmlcontent'])) {
        $other_img .= '<div class="carousel-caption d-none d-md-block">';
        $other_img .= $v['htmlcontent'];
        $other_img .= '</div>';
      }
      $other_img .= '</div>';
    }

    $swipe_arrows = '';
    if (MODULE_CONTENT_PI_GALLERY_SWIPE_ARROWS == 'True') {
      $swipe_arrows = <<<'EOHTML'
<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
<a class="carousel-control-next" href="#carousel" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>

EOHTML;
    }

    if (MODULE_CONTENT_PI_GALLERY_INDICATORS == 'True') {
      $indicators = '<ol class="carousel-indicators">';
      $indicators .= $first_img_indicator;
      $indicators .= $other_img_indicator;
      $indicators .= '</ol>';
    } else {
      $indicators = '';
    }

    $modal_gallery_footer = <<<"EOHTML"
<div id="lightbox" class="modal fade" role="dialog">
  <div class="modal-dialog {$modal_size}" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="carousel slide" data-ride="carousel" tabindex="-1" id="carousel">
          {$indicators}
          <div class="carousel-inner">
            {$first_img}{$other_img}
          </div>
          {$swipe_arrows}
        </div>
      </div>
      <div class="modal-footer">
        <h5 class="text-uppercase mr-auto">{$album_name}</h5>
        <a href="#" role="button" data-dismiss="modal" class="btn btn-primary px-3">{$album_exit}</a>
      </div>
    </div>
  </div>
</div>
EOHTML;

    $GLOBALS['Template']->add_block($modal_gallery_footer, 'footer_scripts');

    $modal_clicker = <<<'EOJS'
<script>$(document).ready(function() { $('a.lb').click(function(e) { var s = $(this).data('slide'); $('#lightbox').carousel(s); }); });</script>
EOJS;
    $GLOBALS['Template']->add_block($modal_clicker, 'footer_scripts');
  }

  echo $pi_image;
  echo $pi_thumb;
?>

</div>

<?php
/*
  $Id$

  CE Phoenix, E-Commerce made Easy
  https://phoenixcart.org

  Copyright (c) 2021 Phoenix Cart

  Released under the GNU General Public License
*/
?>
