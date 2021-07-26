<form class="form-horizontal" method="post" action="<?=route('laravel.es.document-add')?>">
    <input type="hidden" name="id" value=""/>
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="id-txt">*</span> index</label>
            <div class="col-sm-8">
                <select class="form-control  input-sm" name="index">
                    <option>请选择</option>
                    @foreach($index_list as $k=>$v)
                        <option value="{{$k}}">{{$k}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> type</label>
            <div class="col-sm-8">
                <input type="text" name="type" value="" class="form-control" placeholder="type"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"> Id</label>
            <div class="col-sm-8">
                <input type="text" name="id" value="" class="form-control" placeholder="可选不填系统自动生成"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> body</label>
            <div class="col-sm-8">
                <input type="text" name="body" value="title=,like=,price=,address=" class="form-control" placeholder="格式 title=xxx,age=18"/>
            </div>
        </div>

    </div>
</form>


