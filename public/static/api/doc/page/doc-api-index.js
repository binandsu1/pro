(function(){
// start
var options = {
    el : '#doc-api-index',
    data : {
        apiList:  {},
        allExcept:  {},
        currApi:  {},
        request:  {headers:{map:{}}},
        response: {headers:{map:{}}},
        false : false,
    },
    created : function() {
        var that = this;
        this.$http.get('/doc/api/fetch-list').then(function(resp){
            this.apiList = resp.body;
        }, function(){

        })
        this.$http.get('/doc/info/all-except').then(function(resp){
            this.allExcept = resp.body;
            console.dir(this.allExcept);
        }, function(){

        })
    },

    methods : {

        /*
        attachFile : function(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.file = files[0];
            console.dir(this.file);
        },*/
    
        getParams : function() {
            var that = this;
            var _params = _.flatMap(that.currApi.params);
            var retval = {};
            for(key in _params) {
                var item = _params[key];
                if ( typeof item.value == undefined || _.trim(item.value) == '') {
                    continue;
                }
                retval[item.field] = item.value;
            }
            return retval;
        },

        clickApi:function(api) {
            if ( !api['flag'] ) {
                // api项目修正初始化
                for(item in api['params']) {
                    item['value']="";
                }
                api['params'] = _.chunk(api['params'], 2);
                api['flag'] = 1;
                api['showUrl'] = api.url.substr(5)
            }
            this.currApi = api;
            this.request = {headers:{map:{}}};
            this.response = {headers:{map:{}}};
            $('#json-box-view').empty();
            this.file = false;
        },

        send: function() {
            var that = this;
            if ( !that.currApi['url'] ) {
                alert('请选择api');
                return;
            }

            this.request = {headers:{map:{}}};
            this.response = {headers:{map:{}}};

            var method = that.currApi.method.toUpperCase();
            var apiUrl = that.makeUrl(that.currApi.url);
            var params = that.getParams();
            var params = that.makeParams(_.cloneDeep(params));

            var options = {
                url: apiUrl,
                method: method,
                before: function(req) {
                    that.request = _.cloneDeep(req);
                }
            }
            
            if ( method == 'GET' ) {
                options['params'] = params;
            } else {
                options['body'] = $.param(params);
                options['headers'] =  {
                    'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            }

            that.$http(options).then(function(resp){
                that.response = _.cloneDeep(resp);
                $('#json-box-view').JSONView(
                   that.response.body
                );


            }, function(resp){
                $('#html-box-view').append($(resp.body));
            })



        }
    }

};
var page = new Vue(options);
window._page = page;
// end
})();
