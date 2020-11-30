<style>
.control-sidebar-bg, .control-sidebar {
  right: -405px;
  width: 405px!important;
}

table.xdo-role-box td {
  border-top: 1px solid #787878!important;
  font-size:0.8em;
}
.xdo-role-box tr.active td,
.xdo-role-box tr.active th{
  background-color: #424242!important;
  color:#fefefe;
}
</style>
<?php
  $roleList = auth()->roles()
?>
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
  <li class="active">
    <a href="#control-sidebar-1" data-toggle="tab" aria-expanded="true">
      所有角色
    </a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane active no-padding" id="control-sidebar-1">
    <table class="table table-condensed xdo-role-box">
      <tbody>
      <?php foreach($roleList as $c):?>
        <?php foreach($c['roles'] as $r):?>

          <?php if($r['schools']):?>
          <?php foreach($r['schools'] as $s):?>
          <?php $isCurr = $auth->isCurrRole($c['id'], $r['id'], $s['id'])?>
          <?php $query = ['cid'=>$c['id'], 'rid'=>$r['id'],'sid'=>$s['id']]?>
          <tr class="<?=ifelse($isCurr, 'active')?>">
            <td class="tcc"><?=$c['name']?> </td> 
            <td class="tcc"><?=$r['group_name']?></td> 
            <td class="tcc"><?=$s['name_short']?></td>
            <td class="options">
              <a href="<?=route('admin.auth.toggle-role', $query)?>"
                class="btn <?=ifelse($isCurr, 'disabled')?> bg-red-gradient btn-xs">
                <?=ifelse($isCurr, '当前', '切换')?>
              </a>
            </td>
          </tr>
          <?php endforeach;?>
          <?php else:?>
          <?php $isCurr = $auth->isCurrRole($c['id'], $r['id'], 0) ?>
          <?php $query = ['cid'=> $c['id'], 'rid'=> $r['id'],'sid'=> 0]?>
          <tr class="<?=ifelse($isCurr, 'active')?>">
            <td class="tcc"><?=$c['name']?></td> 
            <td class="tcc"><?=$r['group_name']?></td> 
            <td class="tcc">&nbsp;</td>
            <td class="options">
              <a href="<?=route('admin.auth.toggle-role', $query)?>"
                class="btn <?=ifelse($isCurr, 'disabled')?> bg-red-gradient btn-xs">
                <?=ifelse($isCurr, '当前', '切换')?>
              </a>
            </td>
          </tr>
          <?php endif;?>
        <?php endforeach;?>
      <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>