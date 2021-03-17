<style>
    .a{
        margin-top: 10px;
        margin-left: 10px;

    }
    .dd{
        margin-top: 10px;
    }
</style>
@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Layer
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">前端功能</li>
            <li class="active">Layer</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid" id="layerDemo">
{{--            按鈕--}}
            <div class="no-padding box-body" style="overflow:hidden;">
                <fieldset class="layui-elem-field site-demo-button" style="margin-top: 30px;">
                    <div class="a">
                        <button type="button" class="layui-btn layui-btn-primary">原始按钮</button>
                        <button type="button" class="layui-btn">默认按钮</button>
                        <button type="button" class="layui-btn layui-btn-normal">百搭按钮</button>
                        <button type="button" class="layui-btn layui-btn-warm">暖色按钮</button>
                        <button type="button" class="layui-btn layui-btn-danger">警告按钮</button>
                        <button type="button" class="layui-btn layui-btn-disabled">禁用按钮</button>
                        <button type="button" class="layui-btn layui-btn-primary" onclick="t1()">弹</button>
                        <button type="button" class="layui-btn layui-btn-primary" onclick="t2()">弹</button>
                        <button type="button" class="layui-btn layui-btn-primary" onclick="t3()">弹</button>
                        <button type="button" class="layui-btn layui-btn-primary" onclick="z1()">转</button>
                        <button type="button" class="layui-btn layui-btn-primary" onclick="z2()">转</button>
                        <button type="button" class="layui-btn layui-btn-primary" onclick="z3()">转</button>
                        <button data-method="setTop" class="layui-btn">多弹屏</button>
                    </div>
                    <div class="a">
                        <button type="button" class="layui-btn layui-btn-warm layui-btn-lg ">大型按钮</button>
                        <button type="button" class="layui-btn layui-btn-primary">默认按钮</button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm">小型按钮</button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-xs">迷你按钮</button>
                        <br>


                        <div  style="width: 216px; margin-top: 10px"  >
                            <button type="button" class="layui-btn layui-btn-fluid">流体按钮</button>
                        </div>
                    </div>
                    <div class="a">
                        <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn"><i class="layui-icon"></i></button>

                        <br>

                        <br>

                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>

                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>

                        <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
                    </div>
                    <div class="a">
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-radius">原始按钮</button>
                        <button type="button" class="layui-btn layui-btn-radius">默认按钮</button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-radius">百搭按钮</button>
                        <button type="button" class="layui-btn layui-btn-warm layui-btn-radius">暖色按钮</button>
                        <button type="button" class="layui-btn layui-btn-danger layui-btn-radius">警告按钮</button>
                        <button type="button" class="layui-btn layui-btn-disabled layui-btn-radius">禁用按钮</button>
                    </div>
                    <div class="a">
                        <button type="button" class="layui-btn layui-btn-lg layui-btn-primary layui-btn-radius">大型加圆角</button>
                        <a href="http://www.layui.com/doc/element/button.html" class="layui-btn" target="_blank">跳转的按钮</a>
                        <button type="button" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon"></i> 删除</button>
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-disabled"><i class="layui-icon"></i> 分享</button>
                    </div>
                    <div class="layui-btn-group a">
                        <button type="button" class="layui-btn">增加</button>
                        <button type="button" class="layui-btn ">编辑</button>
                        <button type="button" class="layui-btn">删除</button>
                    </div>
                    <div class="layui-btn-group a">
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
                    </div>
                    <div class="layui-btn-group a">
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm">文字</button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
                    </div>
                    <br>
                    <br>
                </fieldset>
            </div>

            {{--            按鈕--}}
            <div class="no-padding box-body" style="overflow:hidden;">

                <fieldset class="" style="margin-top: 50px;">
                    <legend>&nbsp;&nbsp;一号表单</legend>
                </fieldset>
                    <form class="layui-form" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">单行输入框</label>
                            <div class="layui-input-block">
                                <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">验证必填项</label>
                            <div class="layui-input-block">
                                <input type="text" name="username" lay-verify="required" lay-reqtext="我直接放在input里面验证了" placeholder="请输入" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">验证手机</label>
                                <div class="layui-input-block">
                                    <input type="tel" name="phone" lay-verify="required|phone" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">验证邮箱</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">多规则验证</label>
                                <div class="layui-input-block">
                                    <input type="text" name="number" lay-verify="required|number" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">验证日期</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="date" id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">验证链接</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="url" lay-verify="url" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">验证身份证</label>
                            <div class="layui-input-block">
                                <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">自定义验证</label>
                            <div class="layui-input-inline">
                                <input type="password" name="password" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">范围</label>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_min" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid">-</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_max" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">单行选择框</label>
                            <div class="layui-input-inline">
                                <select name="interest" lay-filter="aihao">
                                    <option value=""></option>
                                    <option value="0">写作</option>
                                    <option value="1" selected="">阅读</option>
                                    <option value="2">游戏</option>
                                    <option value="3">音乐</option>
                                    <option value="4">旅行</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择" value="阅读" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择</dd><dd lay-value="0" class="">写作</dd><dd lay-value="1" class="layui-this">阅读</dd><dd lay-value="2" class="">游戏</dd><dd lay-value="3" class="">音乐</dd><dd lay-value="4" class="">旅行</dd></dl></div>
                            </div>
                        </div>


                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">分组选择框</label>
                                <div class="layui-input-inline">
                                    <select name="quiz">
                                        <option value="">请选择问题</option>
                                        <optgroup label="城市记忆">
                                            <option value="你工作的第一个城市">你工作的第一个城市</option>
                                        </optgroup>
                                        <optgroup label="学生时代">
                                            <option value="你的工号">你的工号</option>
                                            <option value="你最喜欢的老师">你最喜欢的老师</option>
                                        </optgroup>
                                    </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择问题" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit layui-select-group"><dd lay-value="" class="layui-select-tips">请选择问题</dd><dt>城市记忆</dt><dd lay-value="你工作的第一个城市" class="">你工作的第一个城市</dd><dt>学生时代</dt><dd lay-value="你的工号" class="">你的工号</dd><dd lay-value="你最喜欢的老师" class="">你最喜欢的老师</dd></dl></div>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">搜索选择框</label>
                                <div class="layui-input-inline">
                                    <select name="modules" lay-verify="required" lay-search="">
                                        <option value="">直接选择或搜索选择</option>
                                        <option value="1">layer</option>
                                        <option value="2">form</option>
                                        <option value="3">layim</option>
                                        <option value="4">element</option>
                                        <option value="5">laytpl</option>
                                        <option value="6">upload</option>
                                        <option value="7">laydate</option>
                                        <option value="8">laypage</option>
                                        <option value="9">flow</option>
                                        <option value="10">util</option>
                                        <option value="11">code</option>
                                        <option value="12">tree</option>
                                        <option value="13">layedit</option>
                                        <option value="14">nav</option>
                                        <option value="15">tab</option>
                                        <option value="16">table</option>
                                        <option value="17">select</option>
                                        <option value="18">checkbox</option>
                                        <option value="19">switch</option>
                                        <option value="20">radio</option>
                                    </select><div class="layui-form-select"><div class="layui-select-title"><input type="text" placeholder="直接选择或搜索选择" value="" class="layui-input"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">直接选择或搜索选择</dd><dd lay-value="1" class="">layer</dd><dd lay-value="2" class="">form</dd><dd lay-value="3" class="">layim</dd><dd lay-value="4" class="">element</dd><dd lay-value="5" class="">laytpl</dd><dd lay-value="6" class="">upload</dd><dd lay-value="7" class="">laydate</dd><dd lay-value="8" class="">laypage</dd><dd lay-value="9" class="">flow</dd><dd lay-value="10" class="">util</dd><dd lay-value="11" class="">code</dd><dd lay-value="12" class="">tree</dd><dd lay-value="13" class="">layedit</dd><dd lay-value="14" class="">nav</dd><dd lay-value="15" class="">tab</dd><dd lay-value="16" class="">table</dd><dd lay-value="17" class="">select</dd><dd lay-value="18" class="">checkbox</dd><dd lay-value="19" class="">switch</dd><dd lay-value="20" class="">radio</dd></dl></div>
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">联动选择框</label>
                            <div class="layui-input-inline">
                                <select name="quiz1">
                                    <option value="">请选择省</option>
                                    <option value="浙江" selected="">浙江省</option>
                                    <option value="你的工号">江西省</option>
                                    <option value="你最喜欢的老师">福建省</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择省" value="浙江省" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择省</dd><dd lay-value="浙江" class="layui-this">浙江省</dd><dd lay-value="你的工号" class="">江西省</dd><dd lay-value="你最喜欢的老师" class="">福建省</dd></dl></div>
                            </div>
                            <div class="layui-input-inline">
                                <select name="quiz2">
                                    <option value="">请选择市</option>
                                    <option value="杭州">杭州</option>
                                    <option value="宁波" disabled="">宁波</option>
                                    <option value="温州">温州</option>
                                    <option value="温州">台州</option>
                                    <option value="温州">绍兴</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择市" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择市</dd><dd lay-value="杭州" class="">杭州</dd><dd lay-value="宁波" class=" layui-disabled">宁波</dd><dd lay-value="温州" class="">温州</dd><dd lay-value="温州" class="">台州</dd><dd lay-value="温州" class="">绍兴</dd></dl></div>
                            </div>
                            <div class="layui-input-inline">
                                <select name="quiz3">
                                    <option value="">请选择县/区</option>
                                    <option value="西湖区">西湖区</option>
                                    <option value="余杭区">余杭区</option>
                                    <option value="拱墅区">临安市</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择县/区" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择县/区</dd><dd lay-value="西湖区" class="">西湖区</dd><dd lay-value="余杭区" class="">余杭区</dd><dd lay-value="拱墅区" class="">临安市</dd></dl></div>
                            </div>
                            <div class="layui-form-mid layui-word-aux">此处只是演示联动排版，并未做联动交互</div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">复选框</label>
                            <div class="layui-input-block">
                                <input type="checkbox" name="like[write]" title="写作"><div class="layui-unselect layui-form-checkbox"><span>写作</span><i class="layui-icon layui-icon-ok"></i></div>
                                <input type="checkbox" name="like[read]" title="阅读" checked=""><div class="layui-unselect layui-form-checkbox layui-form-checked"><span>阅读</span><i class="layui-icon layui-icon-ok"></i></div>
                                <input type="checkbox" name="like[game]" title="游戏"><div class="layui-unselect layui-form-checkbox"><span>游戏</span><i class="layui-icon layui-icon-ok"></i></div>
                            </div>
                        </div>

{{--                        <div class="layui-form-item" pane="">--}}
{{--                            <label class="layui-form-label">原始复选框</label>--}}
{{--                            <div class="layui-input-block">--}}
{{--                                <input type="checkbox" name="like1[write]" lay-skin="primary" title="写作" checked=""><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><span>写作</span><i class="layui-icon layui-icon-ok"></i></div>--}}
{{--                                <input type="checkbox" name="like1[read]" lay-skin="primary" title="阅读"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>阅读</span><i class="layui-icon layui-icon-ok"></i></div>--}}
{{--                                <input type="checkbox" name="like1[game]" lay-skin="primary" title="游戏" disabled=""><div class="layui-unselect layui-form-checkbox layui-checkbox-disbaled layui-disabled" lay-skin="primary"><span>游戏</span><i class="layui-icon layui-icon-ok"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="layui-form-item">
                            <label class="layui-form-label">开关-默认关</label>
                            <div class="layui-input-block">
                                <input type="checkbox" name="close" lay-skin="switch" lay-text="开心|难过"><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">开关-默认开</label>
                            <div class="layui-input-block">
                                <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em>ON</em><i></i></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">单选框</label>
                            <div class="layui-input-block">
                                <input type="radio" name="sex" value="男" title="男" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><div>男</div></div>
                                <input type="radio" name="sex" value="女" title="女"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div>
                                <input type="radio" name="sex" value="禁" title="禁用" disabled=""><div class="layui-unselect layui-form-radio layui-radio-disbaled layui-disabled"><i class="layui-anim layui-icon"></i><div>禁用</div></div>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">普通文本域</label>
                            <div class="layui-input-block">
                                <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                          <label class="layui-form-label">编辑器</label>
                          <div class="layui-input-block">
                            <textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="LAY_demo_editor"></textarea>
                          </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">提交one</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </form>





                    <fieldset class="" style="margin-top: 50px;">
                        <legend>&nbsp;&nbsp;二号表单</legend>
                    </fieldset>
                    <form class="layui-form" action="" lay-filter="example">
                        <div class="layui-form-item">
                            <label class="layui-form-label">输入框</label>
                            <div class="layui-input-block">
                                <input type="text" name="username" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">密码框</label>
                            <div class="layui-input-block">
                                <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">选择框</label>
                            <div class="layui-input-block">
                                <select name="interest" lay-filter="aihao">
                                    <option value=""></option>
                                    <option value="0">写作</option>
                                    <option value="1">阅读</option>
                                    <option value="2">游戏</option>
                                    <option value="3">音乐</option>
                                    <option value="4">旅行</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择</dd><dd lay-value="0" class="">写作</dd><dd lay-value="1" class="">阅读</dd><dd lay-value="2" class="">游戏</dd><dd lay-value="3" class="">音乐</dd><dd lay-value="4" class="">旅行</dd></dl></div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">复选框</label>
                            <div class="layui-input-block">
                                <input type="checkbox" name="like[write]" title="写作"><div class="layui-unselect layui-form-checkbox"><span>写作</span><i class="layui-icon layui-icon-ok"></i></div>
                                <input type="checkbox" name="like[read]" title="阅读"><div class="layui-unselect layui-form-checkbox"><span>阅读</span><i class="layui-icon layui-icon-ok"></i></div>
                                <input type="checkbox" name="like[daze]" title="发呆"><div class="layui-unselect layui-form-checkbox"><span>发呆</span><i class="layui-icon layui-icon-ok"></i></div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">开关</label>
                            <div class="layui-input-block">
                                <input type="checkbox" name="close" lay-skin="switch" lay-text="ON|OFF"><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">单选框</label>
                            <div class="layui-input-block">
                                <input type="radio" name="sex" value="男" title="男" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><div>男</div></div>
                                <input type="radio" name="sex" value="女" title="女"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">文本域</label>
                            <div class="layui-input-block">
                                <textarea placeholder="请输入内容" class="layui-textarea" name="desc"></textarea>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="button" class="layui-btn layui-btn-normal" id="LAY-component-form-setval">赋值</button>
                                <button type="button" class="layui-btn layui-btn-normal" id="LAY-component-form-getval">取值</button>
                                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">提交two</button>
                            </div>
                        </div>
                    </form>


                    <fieldset class="" style="margin-top: 50px;">
                        <legend>&nbsp;&nbsp;三号表单</legend>
                    </fieldset>
                    <form class="layui-form layui-form-pane" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">长输入框</label>
                            <div class="layui-input-block">
                                <input type="text" name="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">短输入框</label>
                            <div class="layui-input-inline">
                                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">日期选择</label>
                                <div class="layui-input-block">
                                    <input type="text" name="date" id="date1" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">行内表单</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="number" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="password" placeholder="请输入密码" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">请务必填写用户名</div>
                        </div>

                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">范围</label>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_min" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid">-</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_max" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">单行选择框</label>
                            <div class="layui-input-block">
                                <select name="interest" lay-filter="aihao">
                                    <option value=""></option>
                                    <option value="0">写作</option>
                                    <option value="1" selected="">阅读</option>
                                    <option value="2">游戏</option>
                                    <option value="3">音乐</option>
                                    <option value="4">旅行</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择" value="阅读" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择</dd><dd lay-value="0" class="">写作</dd><dd lay-value="1" class="layui-this">阅读</dd><dd lay-value="2" class="">游戏</dd><dd lay-value="3" class="">音乐</dd><dd lay-value="4" class="">旅行</dd></dl></div>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">行内选择框</label>
                            <div class="layui-input-inline">
                                <select name="quiz1">
                                    <option value="">请选择省</option>
                                    <option value="浙江" selected="">浙江省</option>
                                    <option value="你的工号">江西省</option>
                                    <option value="你最喜欢的老师">福建省</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择省" value="浙江省" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择省</dd><dd lay-value="浙江" class="layui-this">浙江省</dd><dd lay-value="你的工号" class="">江西省</dd><dd lay-value="你最喜欢的老师" class="">福建省</dd></dl></div>
                            </div>
                            <div class="layui-input-inline">
                                <select name="quiz2">
                                    <option value="">请选择市</option>
                                    <option value="杭州">杭州</option>
                                    <option value="宁波" disabled="">宁波</option>
                                    <option value="温州">温州</option>
                                    <option value="温州">台州</option>
                                    <option value="温州">绍兴</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择市" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择市</dd><dd lay-value="杭州" class="">杭州</dd><dd lay-value="宁波" class=" layui-disabled">宁波</dd><dd lay-value="温州" class="">温州</dd><dd lay-value="温州" class="">台州</dd><dd lay-value="温州" class="">绍兴</dd></dl></div>
                            </div>
                            <div class="layui-input-inline">
                                <select name="quiz3">
                                    <option value="">请选择县/区</option>
                                    <option value="西湖区">西湖区</option>
                                    <option value="余杭区">余杭区</option>
                                    <option value="拱墅区">临安市</option>
                                </select><div class="layui-unselect layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择县/区" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择县/区</dd><dd lay-value="西湖区" class="">西湖区</dd><dd lay-value="余杭区" class="">余杭区</dd><dd lay-value="拱墅区" class="">临安市</dd></dl></div>
                            </div>
                        </div>
                        <div class="layui-form-item" pane="">
                            <label class="layui-form-label">开关-开</label>
                            <div class="layui-input-block">
                                <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" title="开关"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em></em><i></i></div>
                            </div>
                        </div>
                        <div class="layui-form-item" pane="">
                            <label class="layui-form-label">单选框</label>
                            <div class="layui-input-block">
                                <input type="radio" name="sex" value="男" title="男" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><div>男</div></div>
                                <input type="radio" name="sex" value="女" title="女"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><div>女</div></div>
                                <input type="radio" name="sex" value="禁" title="禁用" disabled=""><div class="layui-unselect layui-form-radio layui-radio-disbaled layui-disabled"><i class="layui-anim layui-icon"></i><div>禁用</div></div>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">文本域</label>
                            <div class="layui-input-block">
                                <textarea placeholder="请输入内容" class="layui-textarea"></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn" lay-submit="" lay-filter="demo2">跳转式提交</button>
                        </div>
                    </form>
                </fieldset>

            </div>

            <div class="layui-bg-red dd">&nbsp;</div>
            <div class="layui-bg-orange dd">&nbsp;</div>
            <div class="layui-bg-green dd">&nbsp;</div>
            <div class="layui-bg-cyan dd">&nbsp;</div>
            <div class="layui-bg-blue dd">&nbsp;</div>
            <div class="layui-bg-black dd">&nbsp;</div>

            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">tab1</li>
                    <li>tab2</li>
                    <li>tab3</li>
                    <li>tab4</li>
                    <li>tab5</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">tab1 content</div>
                    <div class="layui-tab-item">tab2 content</div>
                    <div class="layui-tab-item">tab3 content</div>
                    <div class="layui-tab-item">tab4 content</div>
                    <div class="layui-tab-item">tab5 content</div>
                </div>
            </div>

            <script>
                //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
                layui.use('element', function(){
                    var element = layui.element;

                    //…
                });
            </script>


            <div class="box-footer text-center">
            </div>
        </div>
    </section>

    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;

            //日期
            laydate.render({
                elem: '#date'
            });
            laydate.render({
                elem: '#date1'
            });

            //创建一个编辑器
            var editIndex = layedit.build('LAY_demo_editor');

            //自定义验证规则
            form.verify({
                title: function(value){
                    if(value.length < 5){
                        return '我是js的form.verify';
                    }
                }
                ,pass: [
                    /^[\S]{6,12}$/
                    ,'密码必须6到12位，且不能出现空格'
                ]
                ,content: function(value){
                    layedit.sync(editIndex);
                }
            });

            //监听指定开关
            form.on('switch(switchTest)', function(data){
                layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                    offset: '6px'
                });
                layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
            });

            //监听提交
            form.on('submit(demo1)', function(data){
                layer.alert(JSON.stringify(data.field), {
                    title: '最终的提交信息'
                })
                return false;
            });

            //表单赋值
            layui.$('#LAY-component-form-setval').on('click', function(){
                form.val('example', {
                    "username": "素素" // "name": "value"
                    ,"password": "123456"
                    ,"interest": 1
                    ,"like[write]": true //复选框选中状态
                    ,"close": true //开关状态
                    ,"sex": "女"
                    ,"desc": "peace ha"
                });
            });

            //表单取值
            layui.$('#LAY-component-form-getval').on('click', function(){
                var data = form.val('example');
                alert(JSON.stringify(data));
            });

        });

        function t1(){
            layer.msg('hello');
        }
        function t2(){
            layer.alert('酷毙了', {icon: 1});
        }
        function t3(){
            layer.msg('不开心。。', {icon: 5});
        }
        function z1(){
            layer.load(1,{time: 3*1000});

        }
        function z2(){
            layer.load(2,{time: 3*1000});
            // window.setTimeout(function(){
            //     window.location.reload();
            // }, 3000);
        }
        function z3(){
            layer.load(3,{time: 3*1000});

        }

    </script>.

    <script>
        layui.use('layer', function(){ //独立版的layer无需执行这一句
            //触发事件
            var active = {
                setTop: function(){
                    var that = this;
                    //多窗口模式，层叠置顶
                    layer.open({
                        type: 2 //此处以iframe举例
                        ,title: '标题'
                        ,area: ['390px', '260px']
                        ,shade: 0
                        ,maxmin: true
                        ,offset: [ //为了演示，随机坐标
                            Math.random()*($(window).height()-300)
                            ,Math.random()*($(window).width()-390)
                        ]
                        ,content: '//layer.layui.com/test/settop.html'
                        ,btn: ['继续弹出', '全部关闭'] //只是为了演示
                        ,yes: function(){
                            $(that).click();
                        }
                        ,btn2: function(){
                            layer.closeAll();
                        }

                        ,zIndex: layer.zIndex //重点1
                        ,success: function(layero){
                            layer.setTop(layero); //重点2
                        }
                    });
                }
                ,confirmTrans: function(){
                    //配置一个透明的询问框
                    layer.msg('大部分参数都是可以公用的<br>合理搭配，展示不一样的风格', {
                        time: 20000, //20s后自动关闭
                        btn: ['明白了', '知道了', '哦']
                    });
                }
                ,notice: function(){
                    //示范一个公告层
                    layer.open({
                        type: 1
                        ,title: false //不显示标题栏
                        ,closeBtn: false
                        ,area: '300px;'
                        ,shade: 0.8
                        ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                        ,btn: ['火速围观', '残忍拒绝']
                        ,btnAlign: 'c'
                        ,moveType: 1 //拖拽模式，0或者1
                        ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">你知道吗？亲！<br>layer ≠ layui<br><br>layer只是作为Layui的一个弹层模块，由于其用户基数较大，所以常常会有人以为layui是layerui<br><br>layer虽然已被 Layui 收编为内置的弹层模块，但仍然会作为一个独立组件全力维护、升级。<br><br>我们此后的征途是星辰大海 ^_^</div>'
                        ,success: function(layero){
                            var btn = layero.find('.layui-layer-btn');
                            btn.find('.layui-layer-btn0').attr({
                                href: 'http://www.layui.com/'
                                ,target: '_blank'
                            });
                        }
                    });
                }
                ,offset: function(othis){
                    var type = othis.data('type')
                        ,text = othis.text();

                    layer.open({
                        type: 1
                        ,offset: type //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
                        ,id: 'layerDemo'+type //防止重复弹出
                        ,content: '<div style="padding: 20px 100px;">'+ text +'</div>'
                        ,btn: '关闭全部'
                        ,btnAlign: 'c' //按钮居中
                        ,shade: 0 //不显示遮罩
                        ,yes: function(){
                            layer.closeAll();
                        }
                    });
                }
            };

            $('#layerDemo .layui-btn').on('click', function(){
                var othis = $(this), method = othis.data('method');
                active[method] ? active[method].call(this, othis) : '';
            });

        });
    </script>

@stop
