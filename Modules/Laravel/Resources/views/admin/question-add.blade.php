<form class="form-horizontal" method="post" action="<?=route('admin.laravel.question-add')?>">
    <input type="hidden" name="id" value="{{return_data($data,'id')}}"/>
    <input type="hidden" name="type" value="question"/>
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="id-txt">*</span> 问题</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="{{return_data($data,'title')}}" class="form-control" placeholder="请输入问题"/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">解决方案</label>
            <div class="col-sm-10">
                <textarea name="desc" class="form-control" rows="3" placeholder="脚本简介">{{return_data($data,'desc')}} </textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="id-txt"> </span> 来源</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{return_data($data,'name')}}" class="form-control" placeholder="请输入来源"/>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">记录人</label>
            <div class="col-sm-10">
                <input type="text" name="admin" readonly="readonly" value="<?=auth('web')->user()->name?>" class="form-control" placeholder=""/>
            </div>
        </div>
    </div>
</form>


