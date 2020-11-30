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
                    <td class="tcc id-txt" style="width: 10%"> ID </td>
                    <td class=" id-txt"> {{$data->id}} </td>
                </tr>
                <tr>
                    <td class="tcc id-txt"> 问题 </td>
                    <td class=" id-txt"> {{$data->title}} </td>
                </tr>
                <tr>
                    <td class="tcc id-txt"> 解决方案 </td>
                    <td class=" id-txt"> {{$data->desc}} </td>
                </tr>
                <tr>
                    <td class="tcc id-txt"> 来源 </td>
                    <td class=" id-txt"> {{$data->name}} </td>
                </tr>
                </tbody>
            </table>
        </div>
