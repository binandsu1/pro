<style>
    .class1{
        background: #444;
        color: #eee;
    }
</style>


@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Vue
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 前段功能 </a></li>
            <li class="active">Vue</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">
                </span>
                <div class="box-tools pull-right">
                </div>
            </div>

            <div class=" box-body" id="demo1" style="overflow:hidden;">
                @{{ message }}
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
               demo1
                <p>
                    el: '#demo1', 指定容器
                    data: { message: 'Hello Vue.js'} 传值
                    @{{ message }} 显示
                </p>
            </div>


            <div class=" box-body" id="demo2" style="overflow:hidden;">
                <p>name: @{{name}}</p>
                <p>age : @{{age}}</p>
                <p>@{{like()}}</p>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo2
                <p>
                    var data = { name:'素仔', age:'18'} 传值

                    el:'#demo2',指定容器
                    data: data, 传值
                    methods:{
                     like:function (){
                        return this.name + ' is my best love';
                      }
                    } 方法
                    @{{name}} 展示变量  @{{like()}} 展示方法

                </p>
            </div>

            <div class=" box-body" id="demo3">
                <div v-html="message"></div>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo3
                <p>
                    v-html="message"
                </p>
            </div>


            <div class=" box-body" id="demo4">
                <div v-bind:class="{'class1': use}">
                    <input type="checkbox" v-model="use" id="r1">
                     v-bind:class 指令
                </div>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo4
                <p>
                    v-bind:class="{'class1': use}" 绑定class 如果use true 给 else 不给
                </p>
            </div>



            <div class=" box-body" id="demo5">
                {{5+5}}<br>
                @{{ ok ? 'YES' : 'NO' }}<br>
                @{{ message.split('').reverse().join(',') }}
                <div v-bind:id="'list-' + id"> id v-bind 绑定</div>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo5
                <p>
                    v-bind:id="'list-' + id" 绑定ID
                </p>
            </div>

            <div class=" box-body" id="demo6">
                <p v-if="seen">show</p>
                <p v-if="ok">time</p>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo6
                <p>
                    v-if="ok" 是否展示 ok true / false
                </p>
            </div>


            <div class=" box-body" id="demo7">
              <a v-bind:href="url">菜鸟教程</a>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo7
                <p>
                    v-bind:href="url" 绑定URL
                </p>
            </div>

            <div class=" box-body" id="demo8">
                <p v-on:click="ttt"> onclick </p>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo8
                <p>
                    v-on:click="ttt" 触发方法
                    methods: {
                    ttt:function (){
                    alert('弹弹弹');
                    }
                    }
                </p>
            </div>


            <div class=" box-body" id="demo9">
                <p>@{{ message }}</p>
                <input v-model="message">
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo9
                <p>
                    v-model="message"  双向数据绑定
                </p>
            </div>


            <div class=" box-body" id="demo10">
                <p>@{{ message }}</p>
                <button v-on:click="reverseMessage">反转字符串</button>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo10
                <p>
                    v-on:click="reverseMessage"  还是触发方法
                </p>
            </div>


            <div class=" box-body" id="demo11">
                @{{ message | capitalize }}
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo11
                <p>
                   message | capitalize 过滤器
                    filters: {
                    capitalize: function (value) {
                    if (!value) return ''
                    value = value.toString()
                    return value.charAt(0).toUpperCase() + value.slice(1)
                    }
                    }

                </p>
            </div>


            <div class=" box-body" id="demo12">
            </div>
            <div class=" box-body alert alert-error alert-dismissible " >
                <!-- 完整语法 -->
                完整语法 v-bind:href="url"<br>
                <!-- 缩写 -->
                缩写 :href="url"<br>
                <!-- 完整语法 -->
                完整语法 v-on:click="doSomething"<br>
                <!-- 缩写 -->
                缩写 @click="doSomething"<br>
                </p>
            </div>

            <div class=" box-body alert alert-error alert-dismissible " >
                demo13
            </div>

            <div class=" box-body" id="demo13">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc "><input type="checkbox" v-model="checkAll" @change="checkAllfun()"></th>
                        <th width="10%" class="tcc ">姓名</th>
                        <th width="10%" class="tcc">性别</th>
                        <th width="10%" class="tcc">地区</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(list,index) in lists" :key="index">
                            <td class="tcc id-txt"> <input type="checkbox" v-model="list.check" @change="checkone()"> </td>
                            <td class="tcc id-txt">@{{list.name}} </td>
                            <td class="tcc " > @{{list.sex}}  </td>
                            <td class="tcc " > @{{list.address}}   </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class=" box-body" id="demo14">

                <div id = "computed_props">
                    千米 : <input type = "text" v-model = "kilometers">
                    米 : <input type = "text" v-model = "meters">
                </div>


            </div>
            <div class=" box-body alert alert-error alert-dismissible " >
                <p id="info"></p>
            </div>

        </div>
    </section>

    <script>

        var vm14 = new Vue({
            el: '#computed_props',
            data: {
                kilometers : 0,
                meters:0
            },
            methods: {
            },
            computed :{
            },
            watch : {
                kilometers:function(val) {
                    this.kilometers = val;
                    this.meters = this.kilometers * 1000
                },
                meters : function (val) {
                    this.kilometers = val/ 1000;
                    this.meters = val;
                }
            }
        });
        // $watch 是一个实例方法
        vm14.$watch('kilometers', function (newValue, oldValue) {
            // 这个回调将在 vm.kilometers 改变后调用
            document.getElementById ("info").innerHTML = "修改前值为: " + oldValue + "，修改后值为: " + newValue;
        })



       var vm13 = new Vue({
            el: '#demo13',
            data(){
               return {
                   checkAll:false,//全选
                   lists:''
               }
           },
            methods:{
                getLists:function (){
                    var apiUrl = '<?=route('laravel.get-data')?>';
                    $.get(apiUrl,function (xhr) {
                        vm13.lists = xhr;
                           console.log('sssss');
                            console.log(vm13.lists);
                            console.log('sssss');
                    }, 'json')

                },
                checkAllfun:function (){
                    for(var i=0;i<vm13.lists.length;i++){
                        vm13.lists[i].check = vm13.checkAll;
                    }
                },
                checkone:function (){
                    vm13.checkAll = vm13.lists.every(function (item){return item.check});
                }
            },
            mounted:function (){
                this.getLists();
            }
        })


        new Vue({
            el: '#demo1',
            data: {
                message: 'Hello Vue.js'
            }
        })

        var data = { name:'素仔', age:'18'}
        var vm = new Vue({
            el:'#demo2',
            data: data,
            methods:{
                like:function (){
                    return this.name + ' is my best love';
                }
            }
        })
        vm.name = 'haha';
        data.name = '素素';

        new Vue({
            el: '#demo3',
            data: {
                message: '菜鸟教程'
            }
        })

        new Vue({
            el: '#demo4',
            data:{
                use: false
            }
        });

        new Vue({
            el: '#demo5',
            data: {
                ok: true,
                message: 'Hello word',
                id : 2
            }
        })

        new Vue({
            el: '#demo6',
            data: {
                seen: true,
                ok: true
            }
        })


        new Vue({
            el: '#demo7',
            data: {
                url: 'http://www.runoob.com'
            }
        })

        new Vue({
            el: '#demo8',
            methods: {
                ttt:function (){
                    alert('弹弹弹');
                }
            }
        })

        new Vue({
            el: '#demo9',
            data: {
                message: 'Runoob!'
            }
        })

        new Vue({
            el: '#demo10',
            data: {
                message: 'Hello'
            },
            methods: {
                reverseMessage: function () {
                    this.message = this.message.split('').reverse().join('')
                }
            }
        })

        new Vue({
            el: '#demo11',
            data: {
                message: 'runoob'
            },
            filters: {
                capitalize: function (value) {
                    if (!value) return ''
                    value = value.toString()
                    return value.charAt(0).toUpperCase() + value.slice(1)
                }
            }
        })


    </script>
@stop
