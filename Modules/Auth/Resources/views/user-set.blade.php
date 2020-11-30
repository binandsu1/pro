@extends('layouts.admin')
@section('content')
<style>
  #_xdo-avatar{border-radius:0}
</style>
    <section class="content-header">
      <h1>
        管理员个人中心
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li class="active">管理员个人中心</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-default box-solid">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle"
                   src="" alt="s">
              <h3 class="profile-username text-center">w</h3>
              <p class="text-muted text-center">学管 & 咨询师</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>默认校区:</b> <a class="pull-right">a</a>
                </li>
                <li class="list-group-item">
                  <b>就职状态:</b> <a class="pull-right">b</a>
                </li>
                <li class="list-group-item">
                  <b>手<span style="margin-left:2em;">机:<span></b><a class="pull-right">x</a>
                </li>
                <li class="list-group-item">
                  <b>最近登录:</b> <a class="pull-right">d</a>
                </li>
              </ul>
              {{--<a href="#" class="btn btn-danger btn-block">修改密码</a>--}}
            </div>
          </div>
        </div>
        <div class="col-md-9" style="padding-left:0px;">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">基本信息</a></li>
              <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">组织&权限</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity" style="height:800px;">
                <form class="form-horizontal xdo-form" method="post" action="" >
                  @csrf
                  <input type="hidden" name="aid" value="xz">
                  <div>
                    <div class="col-md-4">
                      <span>二维码</span><span>请保存微信二维码名片中的图片后上传，图片大小600*600</span>
                    </div>
                    <div class="col-md-8">
                      {{--{{ Widget::AvatarUpload([--}}
                    {{--'name' => 'qrcode',--}}
                    {{--'value' => old('qrcode')?:$user->qrcode,--}}
                    {{--'avatarUrl' => old('qrcode')?:$user->qrcode_url--}}
                {{--]) }}--}}
                    </div>
                    <button type="submit" class="btn btn-success">确认提交</button>
                  </div>

                </form>
              </div>
              <div class="tab-pane" id="timeline" style="height:800px">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
