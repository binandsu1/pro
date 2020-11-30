<form class="form-horizontal" method="post" action="<?=route('admin.laravel.artisan-add')?>">
    <input type="hidden" name="id" value="{{return_data($data,'id')}}"/>
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="id-txt">*</span> 标题</label>
            <div class="col-sm-8">
                <input type="text" name="title" value="{{return_data($data,'title')}}" class="form-control" placeholder="请输入标题"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> 命令</label>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{return_data($data,'name')}}" class="form-control" placeholder="请输入命令"/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">简介</label>
            <div class="col-sm-10">
                <textarea name="desc" class="form-control" rows="3" placeholder="脚本简介">{{return_data($data,'desc')}} </textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">操作人</label>
            <div class="col-sm-10">
                <input type="text" name="admin" readonly="readonly" value="<?=auth('web')->user()->name?>" class="form-control" placeholder="广告位名称"/>
            </div>
        </div>
    </div>
</form>


