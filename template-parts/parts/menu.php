<div class="food-menu-tabs" data-aos="fade">
  <?php
    $menus = get_field('menu_category');
    
    if( $menus ):
      /*  Making array out of array*/
      $category_titles = array_column($menus, 'category_title');
      /* ****** */
      ?>
      <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
        <?php
          $active='active';
          $aria_selected = 'true';
          foreach( $category_titles as $category_title):?>
            <li class="nav-item">
              <a class="nav-link letter-spacing-2 <?=$active?>"
                  id="<?=$category_title.'-tab'?>"
                  data-toggle="tab" href="<?='#'.$category_title?>"
                  role="tab" aria-controls="<?=$category_title?>"
                  aria-selected="<?=$aria_selected;?>">
                <?php
                  echo $category_title;
                  $active = ''; /* убираем 'active' для следующих */ 
                  $aria_selected = 'false';
                ?>
              </a>
            </li>
            <?php
          endforeach;
        ?>
      </ul>

      <div class="tab-content py-5" id="myTabContent">

        <?php
          $active_show ='active show';
          foreach( $category_titles as $category_title ): 
            $menu_items = array_column($menus,'menu_items', 'category_title' );
            ?>
            <div class="tab-pane fade text-left <?=$active_show;?>" id="<?=$category_title?>" role="tabpanel" aria-labelledby="<?=$category_title.'-tab'?>">
              <div class="row">
                <?php
                  $active_show ='';
                  $items=$menu_items[$category_title];                         
                  foreach( $items as $item ):?>
                    <div class="col-md-6">
                      <div class="food-menu mb-5">                               
                        <span class="d-block text-primary h4 mb-3">
                          <?= $item['item_price'];?>
                        </span>
                        <h3 class="text-white">
                          <a href="#" class="text-white">
                            <?= $item['item_title'];?>
                          </a>
                        </h3>
                        <p class="text-white text-opacity-7">
                          <?= $item['item_description'];?>
                        </p>
                      </div>
                    </div>
                    <?php
                  endforeach;
                ?>
              </div>
            </div>
            <?php   
          endforeach;
        ?> 

      </div>
      <?php  
    endif;
          
  ?>
</div>

             