<?php
$route =isset($route) ? $route : '';
$size  =isset($size) ? 'btn-'.$size: 'btn-xs';
$type  =isset($type) ? $type: 'btn-default';
$icon  =isset($icon) ? $icon : 'fa fa-circle-thin';
$bname  =isset($bname) ? $bname : '';
?>

<?php //if(canUse($route)):?>
<a href="<?=$route?>"  class="btn <?=$size?>  <?=$type?>"><i class="<?=$icon?>" style="margin-right:.3em;"></i>  <?=$bname?>  </a>
 {{--route <?=$route?> size <?=$size?> type <?=$type?> icon <?=$icon?> slot <?=$slot?>--}}
<?php //endif;?>
