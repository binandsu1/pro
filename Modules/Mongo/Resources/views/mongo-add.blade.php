<form class="form-horizontal" method="post" action="<?=route('admin.mongo.mongo-add')?>">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <div class="col-sm-6">
                <input type="text" name="num" value="" class="form-control" placeholder="生成数据条数"/>
            </div>
        </div>
    </div>
</form>


