<?php
$menus = auth('admin')->getAdminMenus();
//dd($menus);
$action = request()->action();
//$section = $action ? $action['section']: 1;
$section =1;

?>
  <section class="sidebar" style="height: auto;">
    <ul class="sidebar-menu tree" data-widget="tree" data-animation-speed="120">
      <li class="header">
        <div class="row xdo-sec-box">
          <div class="col-sm-6" style="padding:0px 5px 0px 10px">
            <button data-section="1" class="xdo-sec-btn btn btn-xs btn-block <?=ifelse($section == 1, 'btn-danger', 'btn-default')?>">
              Laravel
            </button>
          </div>
          <div class="col-sm-6" style="padding:0px 0px 0px 5px">
            <button data-section="2" class="xdo-sec-btn btn btn-xs btn-block <?=ifelse($section == 2, 'btn-danger', 'btn-default')?>">
              其他学习
            </button>
          </div>
        </div>
      </li>
      <?php foreach($menus as $menu):?>

      <?php if($menu['active']):?>
      <li class="treeview menu-open" style="display:<?=ifelse($section == $menu['section'], 'block','none')?>"
          xdo_section="<?=$menu['section']?>">
      <?php else:?>
      <li class="treeview" style="display:<?=ifelse($section == $menu['section'], 'block', 'none')?>"
          xdo_section="<?=$menu['section']?>">
      <?php endif;?>
        <a href="#">
          <i class="<?=$menu['icon']?> <?=array_get($menu, 'color')?>"></i>
          <span style="font-size: 12.5px;"><?=$menu['name']?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <?php if($menu['active']):?>
          <ul class="treeview-menu" style="display:block">
        <?php else:?>
          <ul class="treeview-menu">
        <?php endif;?>
          <?php foreach($menu['children'] as $nav):?>
              <?php if($nav['active']):?>
                <li class="active">
              <?php else:?>
          <li>
              <?php endif;?>
            <a href="<?=route($nav['route'])?>">
              <i class="fa fa-circle-o"></i> <?=$nav['name']?>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
      </li>
      <?php endforeach;?>
    </ul>
  </section>
  <script>
  $(function(){
    var $sideBar = $('.sidebar');
    var $secBox = $('.xdo-sec-box');
    var $secBtns = $secBox.find('.xdo-sec-btn');
    $secBox.find('.xdo-sec-btn').on('click', function(e){
      e.preventDefault();
      var $this = $(this);
      $secBtns.removeClass('btn-danger');
      $secBtns.addClass('btn-default');
      $this.removeClass('btn-default');
      $this.addClass('btn-danger');
      var currSection = $this.data('section');
      var hideSection = currSection == '1'? '2': '1';
      $sideBar.find('li[xdo_section='+hideSection+']').slideUp(100);
      setTimeout(function(){
        $sideBar.find('li[xdo_section='+currSection+']').slideDown(100);
      }, 100)
    });
  });
  </script>
