<?php
!isset($hide)? $hide=true : null;
!isset($excel)? $excel=false: true;
?>
<form class="form-inline" method="get" id="_page-search">
    <div class="box xdo-search-box" style="margin:5px;">
        <div class="box-header with-border">
            <div class="col-sm-1 xdo-search-title text-left"><span class="text-gray"><i class="fa fa-filter"></i> 筛选</span></div>
            <div class="col-sm-10 text-center">
                {{ $slot }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-warning btn-xs to-search">
                    <i class="fa fa-search"></i> 搜索</button>

                <a href="<?=$resetUrl?>" type="reset" class="btn btn-danger btn-xs">
                    <i class="fa fa-times"></i> 重置 </a>

                <?php if($excel):?>
                <button type="submit" name="excel" value="1" class="btn btn-success btn-xs">
                    <i class="fa fa-file-excel-o"></i> Excel</button>
                <?php endif;?>
            </div>
            <div class="col-sm-1 xdo-search-btn-box">
                <a href="#" class="xdo-search-more-toggle">
                    <?php if($hide):?>
                    <i class="fa fa-plus"></i> 展开
                    <?php else:?>
                    <i class="fa fa-minus"></i> 折叠
                    <?php endif;?>
                </a>
            </div>
        </div>
        <div class="box-body" <?=ifelse($hide, 'style="display:none"')?>>
            {{ $more }}
        </div>
    </div>
</form>
