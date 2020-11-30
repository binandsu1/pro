<form class="form-horizontal" method="post" action="<?=route('admin.laravel.artisan-add')?>">
    <input type="hidden" name="id" value="{{return_data($data,'id')}}"/>
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="id-txt">*</span> 姓名</label>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{return_data($data,'name')}}" class="form-control" placeholder="请输入姓名"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> 手机号</label>
            <div class="col-sm-8">
                <input type="number" name="phone" value="{{return_data($data,'phone')}}" class="form-control" placeholder="请输入手机号"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> 年龄</label>
            <div class="col-sm-8">
                <input type="number" name="age" value="{{return_data($data,'age')}}" class="form-control" placeholder="请输入年龄"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> 年级</label>
            <div class="col-sm-8">
                <select class="form-control input-sm" name="grade" id="phases" class="col-sm-2">
                    {{--<option value="">请选择年级</option>--}}
                    <?=genOptions(config('curd.grade'), old('grade') ?: return_data($data,'grade'))?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
            <div class="col-sm-10">
                <textarea name="address" class="form-control" rows="3" placeholder="地址">{{return_data($data,'address')}} </textarea>
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


