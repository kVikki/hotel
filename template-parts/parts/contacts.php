<?php
  if($footer):
    $contact_class='col-md-3 mb-5 pr-md-5 contact-info';    
  else:
    $contact_class='col-md-10 ml-auto contact-info';
    $text_class='text-black';
  endif;

?>

<div class="<?= $contact_class;?>">

  <?php 
    $contacts = get_field('contacts_menu', pll_current_language('slug'));
    if( $contacts):
      foreach( $contacts as $contact ):
        $icon=$contact['contact_icon'];
        if($footer):
          $contact_row_class='ion-ios-'.$icon.' h5 mr-3 text-primary';
        endif;?>
        <p>
          <span class="d-block">
            <span class="<?= $contact_row_class;?>"></span>
              <?=$contact['contact_name']?>
            </span>
          <span class="<?= $text_class;?>">
            <?=$contact['contact_info']?>
          </span>
        </p>
        <?php
      endforeach;
    endif;			
  ?>

</div>
