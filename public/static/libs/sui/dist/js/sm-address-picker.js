/*!
 * =====================================================
 * SUI Mobile - http://m.sui.taobao.org/
 *
 * =====================================================
 */
// jshint ignore: start
+function($){
    var data=[];
    $.ajax({
        type: 'GET',
        async: false,
        url: '/static/h5/js/areaTown.json',
        dataType: 'json',
        success: function(res){
            data=res;
        },
        error: function(err) {
        },
        complete: function() {
        }
    });
    $.smConfig.rawCitiesData=data;

}(Zepto);
// jshint ignore: end

/* jshint unused:false*/

+ function($) {
    "use strict";
    var format = function(data) {
        var result=[]
        for(var i=0;i<data.length;i++) {
            var d = data[i];
            if(d.title === "请选择") continue;
            result.push({name:d.title,id:d.area_id});
        }
        // console.log(result)
        if(result.length) return result;
        return [{}];

    };

    var sub = function(data) {
        if(!data.children) return [];
        return format(data.children);
    };

    var getCities = function(d) {
        for(var i=0;i< raw.length;i++) {
            if(raw[i].title === d) return sub(raw[i]);
        }
        return [{}];
    };

    var getDistricts = function(p, c) {
        for(var i=0;i< raw.length;i++) {
            if(raw[i].title === p) {
                for(var j=0;j< raw[i].children.length;j++) {
                    if(raw[i].children[j].title === c) {
                        return sub(raw[i].children[j]);
                    }
                }
            }
        }
        return [{}];
    };

    // var getAreas = function(p, c, d) {
    //     for(var i=0;i< raw.length;i++) {
    //         if(raw[i].title === p) {
    //             for(var j=0;j< raw[i].children.length;j++) {
    //                 if(raw[i].children[j].title === c) {
    //                     for(var k=0;k< raw[i].children[j].children.length;k++){
    //                         if(raw[i].children[j].children[k].title === d){
    //                             return sub(raw[i].children[j].children[k]);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     return [{}];
    // };

    var raw = $.smConfig.rawCitiesData;
    var provinces = raw.map(function(d) {
        return d.title;
    });
    var provincesId = raw.map(function(d) {
        return d.area_id;
    });
    var initCities = sub(raw[0]).map(function(d) {
        return d.name;
    });
    var initCitiesId = sub(raw[0]).map(function(d) {
        return d.id;
    });
    var initDistricts = [];
    var initDistrictsId = [];
    // var initAreas = [];
    // var initAreasId = [];

    var currentProvince = provinces[0];
    var currentCity = initCities[0];
    var currentDistrict = initDistricts[0];
    // var currentArea = initAreas[0];
    var t;
    var defaults = {
        cssClass: "city-picker",
        rotateEffect: false,

        onChange: function (picker, values, displayValues) {
            var newProvince = picker.cols[0].displayValue;
            var newCity;
            var newDistrict;
            if(newProvince !== currentProvince) {
                // 如果Province变化，节流以提高reRender性能
                // clearTimeout(t);

                // t = setTimeout(function(){
                var citiesObject = getCities(newProvince);
                var newCities = citiesObject.map(function(e) {
                    return e.name;
                });
                var newCitiesId = citiesObject.map(function(e) {
                    return e.id;
                });
                newCity = newCities[0];
                var districtsObject = getDistricts(newProvince, newCity);
                var newDistricts = districtsObject.map(function(e) {
                    return e.name;
                });
                var newDistrictsId = districtsObject.map(function(e) {
                    return e.id;
                });
                // newDistrict = newDistricts[0];
                // var areasObject = getAreas(newProvince, newCity,newDistrict);
                // var newAreas = areasObject.map(function(e) {
                //     return e.name||[];
                // });
                // var newAreasId = areasObject.map(function(e) {
                //     return e.id||[];
                // });
                picker.cols[1].replaceValues(newCitiesId,newCities);
                picker.cols[2].replaceValues(newDistrictsId,newDistricts);
                // picker.cols[3].replaceValues(newAreasId,newAreas);
                currentProvince = newProvince;
                currentCity = newCity;
                // currentDistrict = newDistrict;
                picker.updateValue();
                // }, 200);
                // return;
            }
            newCity = picker.cols[1].displayValue;
            if(newCity !== currentCity) {
                var districtsObject = getDistricts(newProvince, newCity);
                picker.cols[2].replaceValues(districtsObject.map(function(e) {
                    return e.id||[];
                }),districtsObject.map(function(e) {
                    return e.name||[];
                }));
                currentCity = newCity;
                picker.updateValue();
            }
            // newDistrict = picker.cols[2].displayValue;
            // if(newDistrict !== currentDistrict) {
            //     var areasObject = getAreas(newProvince, newCity, newDistrict);
            //     picker.cols[3].replaceValues(areasObject.map(function(e) {
            //         return e.id||[];
            //     }),areasObject.map(function(e) {
            //         return e.name||[];
            //     }));
            //     currentDistrict = newDistrict;
            //     picker.updateValue();
            // }
        },

        cols: [
            {
                textAlign: 'center',
                values: provincesId,
                displayValues:provinces
            },
            {
                textAlign: 'center',
                values: initCitiesId,
                displayValues:initCities
            },
            {
                textAlign: 'center',
                values: initDistrictsId,
                displayValues:initDistricts
            }
            // ,
            // {
            //     textAlign: 'center',
            //     values: initAreasId,
            //     displayValues:initAreas
            // }
        ]
    };

    $.fn.cityPicker = function(params) {
        return this.each(function() {
            if(!this) return;
            var p = $.extend(defaults, params);
            //计算value
            if (p.displayValue) {
                $(this).val(p.displayValue.join(' '));
            } else {
                var val = $(this).val();
                val && (p.displayValue = val.split(' '));
            }

            if (p.displayValue) {
                //p.value = val.split(" ");
                if(p.displayValue[0]) {
                    currentProvince = p.displayValue[0];
                    p.cols[1].values = getCities(p.displayValue[0]).map(function(e) {
                        return e.id;
                    });
                    p.cols[1].displayValues = getCities(p.displayValue[0]).map(function(e) {
                        return e.name;
                    });
                }
                if(p.displayValue[1]) {
                    currentCity = p.displayValue[1];
                    p.cols[2].values = getDistricts(p.displayValue[0], p.displayValue[1]).map(function(e) {
                        return e.id;
                    });
                    p.cols[2].displayValues = getDistricts(p.displayValue[0], p.displayValue[1]).map(function(e) {
                        return e.name;
                    });
                }
                // if(p.displayValue[2]){
                //     currentDistrict = p.displayValue[2];
                //     p.cols[3].values = getAreas(p.displayValue[0], p.displayValue[1], p.displayValue[2]).map(function(e) {
                //         return e.id;
                //     });
                //     p.cols[3].displayValues = getAreas(p.displayValue[0], p.displayValue[1], p.displayValue[2]).map(function(e) {
                //         return e.name;
                //     });
                // }
                // else {
                //     p.cols[2].values = getDistricts(p.value[0], p.cols[1].values[0]);
                // }
                !p.displayValue[2] && (p.displayValue[2] = '');
                currentDistrict = p.displayValue[2];
            }
            $(this).picker(p);
        });
    };

}(Zepto);
