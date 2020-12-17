<section class="content">
    <div class="box box-solid">

        <div class="no-padding box-body" style="overflow:hidden;">
            <table class="table table-bordered" style="margin-top: 10px">
                <thead>
                <tr>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="tcc id-txt" style="width: 10%;"> ID</td>
                    <td class=" id-txt"> {{$list->id}} </td>
                </tr>
                <tr>
                    <td class="tcc id-txt">操作动作</td>
                    <td class=" id-txt"> {{$list->act}} </td>
                </tr>
                <tr>
                    <td class="tcc id-txt"> 操作表</td>
                    <td class=" id-txt"> {{$list->table}} </td>
                </tr>
                <tr>
                    <td class="tcc id-txt"> 操作表id</td>
                    <td class=" id-txt"> {{$list->t_id}} </td>
                </tr>
                <tr>
                    <td class="tcc id-txt"> 操作人</td>
                    <td class=" id-txt"> {{$list->admin_name}} </td>
                </tr>
                <tr>
                    @if($list->act != 'delete')
                        <td class="tcc id-txt"> 操作时间</td>
                    @else
                        <td class="tcc id-txt"> 删除时间</td>
                    @endif
                    <td class=" id-txt"> {{$list->created_at}} </td>
                </tr>

                </tbody>
            </table>

            @if($list->act != 'delete')
                <table class="table table-bordered" style="margin-top: 10px">
                    <thead>
                    <tr>
                        <td class="tcc id-txt" colspan="4"> 操作详情</td>
                    </tr>
                    <tr>
                        <td class="tcc id-txt" colspan="2"> 变动前</td>
                        <td class="tcc id-txt" colspan="2"> 变动后</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $befor = !empty($list->befor_data) ? json_decode($list->befor_data) : [];
                    $data = json_decode($list->data);
                    ?>
                    @foreach($data as $key=>$value)
                        <tr>
                            <td class="id-txt" style="width: 10%"> {{$key}}</td>
                            <td class="id-txt" style="width: 40%"> {{return_data($befor,$key)}}</td>
                            <td class="id-txt" style="width: 10%"> {{$key}}</td>
                            <td class="id-txt" style="width: 40%"> {{$value}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
