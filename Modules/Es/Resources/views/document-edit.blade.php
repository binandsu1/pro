<form class="form-horizontal" method="post" action="<?=route('laravel.es.document-edit')?>">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"><span class="id-txt">*</span> index</label>
            <div class="col-sm-8">
                <input type="text" name="index" value="{{$data["index"]}}" class="form-control" readonly placeholder="type"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> type</label>
            <div class="col-sm-8">
                <input type="text" name="type" value="{{$data["type"]}}" class="form-control" readonly placeholder="type"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"> Id</label>
            <div class="col-sm-8">
                <input type="text" name="id" value="{{$data["id"]}}" class="form-control"  readonly placeholder="可选不填系统自动生成"/>
            </div>
        </div>
        <div class="form-group">
            <label for="_video_title" class="col-sm-2 control-label"><span class="id-txt">*</span> body</label>
            <div class="col-sm-8">
                <input type="text" name="body" value="{{$data["para_str"]}}" class="form-control" placeholder="格式 title=xxx,age=18"/>
            </div>
        </div>
    </div>
</form>


