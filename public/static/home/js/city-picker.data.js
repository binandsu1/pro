/*!
 * Distpicker v1.0.2
 * https://github.com/tshi0912/city-picker
 *
 * Copyright (c) 2014-2016 Tao Shi
 * Released under the MIT license
 *
 * Date: 2016-02-29T12:11:36.473Z
 */

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as anonymous module.
        define('ChineseDistricts', [], factory);
    } else {
        // Browser globals.
        factory();
    }
})(function () {
    var ChineseDistricts=[];
    $.ajax({
        type: 'GET',
        async: false,
        url: '/static/h5/js/areaTown.json',
        dataType: 'json',
        success: function(res){
            var dataarr={};
                dataarr[86]={}
            for(var i=0;i< res.length;i++) {
                dataarr[86][res[i].area_id]=res[i].title;
                dataarr[res[i].area_id]={}
                for(var j=0;j< res[i].children.length;j++) {
                    dataarr[res[i].area_id][res[i].children[j].area_id]=res[i].children[j].title;
                    dataarr[res[i].children[j].area_id]={}
                    for(var k=0;k< res[i].children[j].children.length;k++) {
                        dataarr[res[i].children[j].area_id][res[i].children[j].children[k].area_id]=res[i].children[j].children[k].title;
                    }
                }
            }
            ChineseDistricts=dataarr;
        },
        error: function(err) {
        },
        complete: function() {
        }
    });

    if (typeof window !== 'undefined') {
        window.ChineseDistricts = ChineseDistricts;
    }

    return ChineseDistricts;

});
