<form class="form-horizontal" method="post" action="<?=route('laravel.system.role-add')?>">
    <input type="hidden" name="id" value="{{return_data($data,'id')}}"/>
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="id-txt">*</span> 角色名称</label>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{return_data($data,'role_name')}}" class="form-control" placeholder="请输入角色名称"/>
            </div>
        </div>
    </div>
</form>


