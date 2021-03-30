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
  $data = auth()->roles();
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
      @foreach($data['role_list'] as $k=>$item)
          <tr class="active">
              <td class="tcc">{{$item->role_name}}</td>
              <td class="tcc"></td>
              <td class="tcc">&nbsp;</td>
              <td class="options">
                  @if($data['admin_info']->curr_role_id == $item->id)
                      <a href="" class="btn  bg-red-gradient btn-xs"> 当前 </a>
                  @else
                      <a href="<?=route('laravel.system.role-change', ['id'=>$item->id,'admin_id'=>$data['admin_info']->id])?> " class="btn  bg-green btn-xs"> 切换 </a>
                  @endif
              </td>
          </tr>
      @endforeach

      </tbody>
    </table>
  </div>
</div>
