Vue.config.silent = false;
// Vue.config.optionMergeStrategies
Vue.devtools = true;
// Vue.ignoredElements
// Vue.keyCodes
Vue.errorHandler = function(err, VM) 
{
    console.log('未被捕获的错误：%s', err);
}

var DocPlugin = {};

DocPlugin.install = function (Vue, options) {

    Vue.mixin({
        data: function(){
            return {}
        },

        methods : {
            makeUrl : function(url)
            {
                return ApiConfig.baseUrl + url;
            },
            makeParams : function(params) {
                params['api_key'] = ApiConfig.apiKey;
                var strs = [];
                var keys = _.keys(params);
                var keys = keys.sort();
                for(var i = 0; i < keys.length; i++) {
                    // token 不参与签章计算
                    if ( keys[i] == 'token' ) continue;
                    strs.push(keys[i]+'='+params[keys[i]]);
                }
                console.log(strs)
                strs = strs.join('&');
                console.log(strs);
                params['api_sig'] = md5(strs + ApiConfig.sharedSecret);
                return params;
            }
        },
    });

    Vue.clone = function(obj){
        var str, newobj = obj.constructor === Array ? [] : {};
        if(typeof obj !== 'object'){
            return;
        } else if(window.JSON){
            str = JSON.stringify(obj), //系列化对象
            newobj = JSON.parse(str); //还原
        } else {
            for(var i in obj){
                newobj[i] = typeof obj[i] === 'object' ? 
                Vue.clone(obj[i]) : obj[i]; 
            }
        }
        return newobj;
    };

    Vue.dd = function(obj) {
        var d = JSON.parse(JSON.stringify(obj));
        console.dir(d);
    };


};

// start
Vue.use(DocPlugin)
