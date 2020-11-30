var beforeFormLoadContent =
    '<div style="height:150px;padding-top:2.5em;text-align:center">' +
    '<i style="font-size:4em;" class="text-gray fa fa-spinner fa-spin"></i>' +
    '<p class="text-black" style="margin-top:1em;">正在加载....<p>' +
    "</div>";

function cloneObj(obj) {
    var json = JSON.stringify(obj);
    return JSON.parse(json);
}
/**
 *
 * @param {获取返回xhr对象的错误信息} xhr
 */
function getErrMsg(xhr) {
    return decodeURI(xhr.getResponseHeader("XdoErrorMessage"));
}

/**
 *
 * @param {时间格式话} target
 */
function xdoDtInit(target) {
    var target = target || document.body;
    var $this = $(target);

    $this.find("input.xdo-dt").each(function (i, item) {
        var $item = $(item);
        if ($item.data("dtInit")) return;
        var settings = {
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            // format: 'xdoll',
            calendarWeeks: true,
            sideBySide: true,
            showClear: true,
            showClose: true,
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        };
        if ($item.attr("xdo-date-only") !== undefined) {
            settings["format"] = "LL";
        }
        if ($item.attr("xdo-time-only") !== undefined) {
            settings["format"] = "LT";
        }
        if ($item.attr("xdo-date-min") !== undefined){
          settings["minDate"] = $item.attr("xdo-date-min");
          settings["useCurrent"] = false;
        }
        if ($item.attr("xdo-date-max") !== undefined){
            settings["maxDate"] = $item.attr("xdo-date-max");
            settings["useCurrent"] = false;
        }
        if ($item.parent("div.input-group:first").length === 1) {
            $item.parent("div.input-group:first").datetimepicker(settings);
        }

        $item.datetimepicker(settings);
        $item.data("dtInit", true);
    });
}

/**
 *
 * @param {获取显示远程表单} target
 */
function remoteForm(target) {
    var $this = $(target);
    var refresh = $this.data("ms-refresh");
    var title = $this.attr("title") || $this.text();
    var url = $this.attr("href") || $this.data("url");
    var size = $this.data("size") || "middle";
    var areaWidth = {
        small: "35%",
        middle: "45%;",
        large: "65%",
        huge: "75%"
    } [size];
    var loadTip = layer.load(2, {
        shade: [0.2, "#fff"]
    });
    $.get(
        url,
        function (xhr) {
            layer.close(loadTip);
            var me = layer.open({
                title: title,
                id: "_xdo-remote-form",
                // skin: 'layui-layer-imgbar',
                type: 1,
                fixed: false,
                moveType: 1,
                content: '<div class="xdo-remote-form-box">' + xhr + "</div>",
                area: [areaWidth],
                maxmin: false,
                scrollbar: true,
                offset: "100px",
                btn: ["保存", "取消"],
                btnAlign: "c",
                anim: 5,
                yes: function () {
                    var $me = $("#_xdo-remote-form");
                    var Form = $me.find("form:first");
                    var formAction = Form.attr("action") || url;
                    var loadTip;
                    var options = {
                        url: url,
                        beforeSend: function () {
                            loadTip = layer.load(2, {
                                shade: [0.2, "#fff"]
                            });
                        },
                        complete: function () {
                            layer.close(loadTip);
                        },
                        success: function (xhr) {
                            if (xhr.status == 9999) {
                                layer.closeAll();
                                if (!refresh) {
                                    window.location.reload();
                                }
                            } else {
                                var requireClose = 0;
                                    if (typeof xhr.data.isClose != undefined) {
                                        requireClose = xhr.data.isClose
                                    }
                                if (requireClose == 1) {
                                    layer.closeAll()
                                }
                                // 显示自定义错误
                                layer.msg(xhr.msg);
                            }
                        },
                        error: function (xhr) {
                            var data = xhr.responseJSON;
                            if (xhr.status == 422) {
                                for (var field in data.errors) {
                                    var msg = data.errors[field][0];
                                    var target = $me.find(
                                        "[name=" + field + "]"
                                    );
                                    var formGroup = target.parents("div:first");
                                    if (formGroup.hasClass("input-group")) {
                                        formGroup = formGroup.parents(
                                            "div:first"
                                        );
                                    }
                                    formGroup.addClass("has-error");
                                    formGroup.find("span.help-block").remove();
                                    var inputGroup = formGroup.find(
                                        "div.input-group"
                                    );
                                    if (inputGroup.length > 0) {
                                        formGroup.append(
                                            '<span class="help-block">' +
                                            msg +
                                            "</span>"
                                        );
                                    } else {
                                        target
                                            .parent()
                                            .append(
                                                '<span class="help-block">' +
                                                msg +
                                                "</span>"
                                            );
                                    }
                                }
                            } else {
                                // 其他错误
                                if (xhr.status == 500) {
                                    layer.msg(getErrMsg(xhr));
                                } else {
                                    layer.msg(data.message);
                                }
                            }
                        }
                    };
                    Form.ajaxSubmit(options);
                },
                success: function () {
                    var $me = $("#_xdo-remote-form");
                    $me.find("input,textarea").each(function (index, item) {
                        $(item).on("focus", function (e) {
                            var formGroup = $(this).parents("div:first");
                            formGroup.removeClass("has-error");
                            formGroup.find("span.help-block").remove();
                        });
                    });
                    $me.find("select").each(function (index, item) {
                        $(item).on("change", function (e) {
                            var formGroup = $(this).parents("div:first");
                            formGroup.removeClass("has-error");
                            formGroup.find("span.help-block").remove();
                        });
                    });
                    $me.find("select.xdo-select2").each(function (index, item) {
                        $(item).select2({
                            dropdownParent: $(".layui-layer-page")
                        });
                    });
                    xdoDtInit($me);
                    $me.xdoSingleUpload();
                    $me.xdoMultiUpload();
                },
                no: function () {
                    layer.closeAll();
                }
            });
        },
        "html"
    ).fail(function (xhr) {
        layer.close(loadTip);
        layer.msg(getErrMsg(xhr));
    });
}

/**
 *
 * @param {获取显示远程内容} target
 */
function remoteContent(target) {
    var $this = $(target);
    var refresh = $this.data("ms-refresh");
    var title = $this.attr("title") || $this.text();
    var url = $this.attr("href") || $this.data("url");
    var size = $this.data("size") || "middle";
    var areaWidth = {
        small: "35%",
        middle: "45%;",
        large: "65%",
        huge: "75%",
        full: "75%"
    } [size];

    var loadTip = layer.load(2, {
        shade: [0.2, "#fff"]
    });

    var offset = size == "huge" || size == "full" ? "50px" : "100px";

    var loadTip = layer.load(2, {
        shade: [0.2, "#fff"]
    });
    $.get(
        url,
        function (xhr) {
            layer.close(loadTip);

            var me = layer.open({
                title: title,
                id: "_xdo-remote-content",
                type: 1,
                fixed: false,
                moveType: 1,
                content: '<div id="_xdo-remote-content" class="xdo-remote-form-box">' +
                    xhr +
                    "</div>",
                area: [areaWidth],
                maxmin: false,
                scrollbar: true,
                offset: offset,
                btnAlign: "c",
                anim: 5,
                success: function (curr, me) {
                    var $me = $("#_xdo-remote-content");
                    xdoDtInit($me);
                    $me.xdoSingleUpload();
                    $me.xdoMultiUpload();
                    $me.data("source", $this);
                    $me.data("me", me);
                }
            });
            if (size == "full") {
                layer.full(me);
            }
        },
        "html"
    ).fail(function (xhr) {
        layer.close(loadTip);
        layer.msg(getErrMsg(xhr));
    });
}

/**
 * @param {确认是否执行操作动作} target
 */
function xdoConfirm(target, cb) {
    var $this = $(target);
    var url = $this.prop("href") || $this.data("url");
    var msg = $this.prop("title") || "您确认进行该操作吗?";
    layer.msg(msg, {
        time: 0, // 不自动关闭
        btn: ["确认", "取消"],
        yes: function (index) {
            cb
                ?
                layer.closeAll() || cb(target) :
                $.get(url, function (xhr) {
                    if (xhr.status == 9999) {
                        window.location.reload();
                    } else {
                        layer.msg(xhr.msg, {
                            icon: 6
                        });
                    }
                }).fail(function (xhr) {
                    layer.msg(getErrMsg(xhr));
                });
        }
    });
}

$(function () {
    // iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: "icheckbox_minimal-red",
        radioClass: "iradio_minimal-red"
    });
    $("body").on("click", ".xdo-remote-content", function (e) {
        e.preventDefault();
        remoteContent(this);
    });
    $("body").on("click", ".xdo-remote-form", function (e) {
        e.preventDefault();
        remoteForm(this);
    });
    // confirm
    $("body").on("click", ".xdo-confirm", function (e) {
        e.preventDefault();
        xdoConfirm(this);
    });
    $("body").on("click", ".xdo-confirm-content", function (e) {
        e.preventDefault();
        xdoConfirm(this, remoteContent);
    });
    $("body").on("click", ".xdo-confirm-form", function (e) {
        e.preventDefault();
        xdoConfirm(this, remoteForm);
    });

    $("body").on("click", ".xdo-file-btn", function (e) {
        e.preventDefault();
        var $this = $(this);
        var fileInput = $("#" + $this.data("target"));
        fileInput.trigger("click");
        // TODO
    });
    // search-box
    $("body").on("click", ".xdo-search-more-toggle", function (e) {
        var $this = $(this);
        var target = $this
            .parents(".xdo-search-box:first")
            .find("div.box-body");
        if (target.is(":hidden")) {
            $this.html('<i class="fa fa-minus"></i> 折叠');
        } else {
            $this.html('<i class="fa fa-plus"></i> 展开');
        }
        target.slideToggle(100);
    });

    // ajax提交
    $("body").on("click", ".xdo-ajax", function(e){
        e.preventDefault();
        var $this = $(this);
        var url = $this.prop("href") || $this.data("url");
        var loadTip = layer.load(2, {
            shade: [0.2, "#fff"]
        });
        $.get(url, function (xhr) {
            layer.close(loadTip);
            if (xhr.status == 9999) {
                window.location.reload();
            } else {
                layer.msg(xhr.msg);
            }
        }).fail(function(xhr){
            layer.close(loadTip);
            layer.msg(getErrMsg(xhr));
        });
    });

    $(document).on("submit", "form.xdo-ajax-form", function (e) {
        e.preventDefault();
        var $this = $(this);

        var loadTip = layer.load(2, {
            shade: [0.2, "#fff"]
        });
        $this.ajaxSubmit({
            success: function (xhr) {
                if (xhr.status == 9999) {
                    layer.closeAll();
                    if (xhr.data.backUrl) {
                        window.location.href = xhr.data.backUrl
                    } else {
                        window.location.reload();
                    }
                    console.log(xhr);
                } else {
                    var requireClose = 0;
                    if (typeof xhr.data.isClose != undefined) {
                        requireClose = xhr.data.isClose
                    }
                    if (requireClose == 1) {
                        layer.closeAll()
                    }
                    // 显示自定义错误
                    layer.msg(xhr.msg);
                }
            },
            complete: function (xhr) {
                layer.close(loadTip);
            },
            error: function (xhr, status, err) {
                var data = xhr.responseJSON;
                if (xhr.status == 422) {
                    for (var field in data.errors) {
                        var msg = data.errors[field][0];
                        var target = $this.find("[name=" + field + "]");
                        var formGroup = target.parents("div:first");
                        if (formGroup.hasClass("input-group")) {
                            formGroup = formGroup.parents("div:first");
                        }
                        formGroup.addClass("has-error");
                        formGroup.find("span.help-block").remove();
                        var inputGroup = formGroup.find("div.input-group");
                        if (inputGroup.length > 0) {
                            formGroup.append(
                                '<span class="help-block">' + msg + "</span>"
                            );
                        } else {
                            target
                                .parent()
                                .append(
                                    '<span class="help-block">' +
                                    msg +
                                    "</span>"
                                );
                        }
                    }
                } else {
                    // 其他错误
                    // layer.msg(data.message);
                    if (xhr.status == 500) {
                        layer.msg(getErrMsg(xhr));
                    } else {
                        layer.msg(data.message);
                    }
                }
            }
        });
    });

    /*
    var formBox = $(".xdo-search-box");
    var target = "input[type=radio],input[type=checkbox]";
    formBox.find(target).on("change", function (e) {
        formBox.parents("form:first").submit();
    });*/

    // 如果存在datepicker插件

    xdoDtInit();

    if (
        typeof xdoFormErrors !== "undefined" &&
        xdoFormErrors.length == undefined
    ) {
        var $me = $(".xdo-form");
        for (var field in xdoFormErrors) {
            var msg = xdoFormErrors[field][0];
            var target = $me.find("[name=" + field + "]");
            var formGroup = target.parents("div:first");
            formGroup.addClass("has-error");
            formGroup.find("span.help-block").remove();
            var inputGroup = formGroup.find("div.input-group");
            formGroup.append('<span class="help-block">' + msg + "</span>");
        }
    }

    // 单文件上传
    (function ($) {
        $.fn.xdoSingleUpload = function () {
            // var $this = $(this)
            var $that = $(this);

            var progressBar = $that.find("._upload_process");
            var realFileIpt = $that.find("._xdo-real-file-input");
            var fileIpt = $that.find("input[rel=xdo-file-field]");
            var imgDiv = $that.find(".xdo-single-uploader-img");

            $that.find(".xdo-upload-btn").on("click", function (e) {
                e.preventDefault();
                realFileIpt.trigger("click");
            });

            var processProgress = function (d) {
                var p = parseInt((100 * d.loaded) / d.total);
                var v = p + "%";
                progressBar.css({
                    width: v
                });
                if (v == "100%") {
                    progressBar.fadeOut("slow", function () {
                        $(this).css({
                            width: "0%"
                        });
                        $(this).show();
                    });
                }
            };

            realFileIpt.on("change", function (e) {
                var $this = $(e.target);
                if (e.target.files.length == 0) return;
                var file = e.target.files[0];

                console.log(file);

                var formData = new FormData();
                formData.append("file", file);
                formData.append("driver", $that.data("driver"));
                formData.append("prefix", $that.data("prefix"));

                $.ajax({
                    url: "/system/upload",
                    type: "POST",
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: formData,

                    xhr: function () {
                        myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            myXhr.upload.addEventListener(
                                "progress",
                                processProgress,
                                false
                            );
                        }
                        return myXhr;
                    },
                    beforeSend: function () {
                        progressBar.css({
                            width: "0%"
                        });
                        // 请求前的处理
                    },
                    success: function (data) {
                        fileIpt.val(data.path);
                        imgDiv.css({
                            backgroundImage: "url(" + data.url + ")"
                        });
                        progressBar.css({
                            width: "0%"
                        });
                    },
                    complete: function () {
                        // 请求完成的处理
                        progressBar.css({
                            width: "0%"
                        });
                    },
                    error: function () {
                        // 请求出错处理
                    }
                });
            });
        };
    })(jQuery);

    /**
     * 多文件上传
     */
    (function ($) {
        $.fn.xdoMultiUpload = function () {
            var $that = $(this);

            var inputName = $that.data("name");

            var realFileIpt = $that.find("._xdo-real-file-input");
            var filesBox = $that.find(".xdo-multi-file-box");
            var tpl = $that.find("._tpl:first");

            var imgDiv = $that.find(".xdo-single-uploader-img");

            $that.find(".xdo-upload-btn").on("click", function (e) {
                e.preventDefault();
                realFileIpt.trigger("click");
            });

            function processUpload(file, liElem) {
                var progressBar = liElem.find("._upload_process");
                var idIpt = liElem.find("input[rel=xdo-file-field-id]");
                var fileIpt = liElem.find("input[rel=xdo-file-field-url]");
                var nameIpt = liElem.find("input[rel=xdo-file-field-name]");

                var processProgress = function (d) {
                    var p = parseInt((100 * d.loaded) / d.total);
                    var v = p + "%";
                    progressBar.css({
                        width: v
                    });
                    if (v == "100%") {
                        progressBar.fadeOut("slow", function () {
                            $(this).css({
                                width: "0%"
                            });
                            $(this).show();
                        });
                    }
                };

                var formData = new FormData();
                formData.append("file", file);
                formData.append("driver", $that.data("driver"));

                $.ajax({
                    url: "/system/upload",
                    type: "POST",
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: formData,

                    xhr: function () {
                        myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            myXhr.upload.addEventListener(
                                "progress",
                                processProgress,
                                false
                            );
                        }
                        return myXhr;
                    },
                    beforeSend: function () {
                        progressBar.css({
                            width: "0%"
                        });
                        // 请求前的处理
                    },
                    success: function (data) {
                        fileIpt.val(data.path);
                        nameIpt.val(file.name);
                        progressBar.css({
                            width: "0%"
                        });
                    },
                    complete: function () {
                        // 请求完成的处理
                        progressBar.css({
                            width: "0%"
                        });
                    },
                    error: function () {
                        // 请求出错处理
                    }
                });
            }

            realFileIpt.on("change", function (e) {
                var $this = $(e.target);
                if (e.target.files.length == 0) return;
                var files = e.target.files;

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var content = tpl.html();
                    var liElem = $(content);
                    liElem.find(".xdo-mutil-file-name").text(file.name);
                    filesBox.append(liElem);
                    processUpload(file, liElem);
                }
            });

            filesBox.on("click", "button", function (e) {
                e.preventDefault();
                $(this)
                    .parents("li:first")
                    .remove();
            });
        };
    })(jQuery);

    /**
     * 正常排课时间选择
     */
    (function ($) {
        $.fn.xdoSchDateTime = function (targets) {
            return this.each(function (index, target) {
                var idStr = "_mutl-select-id" + +new Date();
                var $this = $(target);
                var addSeriesBtn = $this.find("button.add-series-btn");
                var addDtBtn = $this.find("button.add-dt-btn");
                var cleanDtBtn = $this.find("button.clean-dt-btn");
                var dtItemBox = $this.find("div.dt-item-box");
                var dtItem = dtItemBox.find("div.dt-item:first").clone();

                var cleanItemBox = function () {
                    dtItemBox
                        .find("div.dt-item input.xdo-dt")
                        .each(function (index, item) {
                            if (!$.trim($(item).val())) {
                                $(item)
                                    .parents("div.dt-item:first")
                                    .remove();
                            }
                        });
                };

                cleanDtBtn.on("click", function (e) {
                    e.preventDefault();
                    dtItemBox
                        .find("div.dt-item input.xdo-dt")
                        .each(function (index, item) {
                            $(item)
                                .parents("div.dt-item:first")
                                .remove();
                        });
                    var _item = dtItem.clone();
                    _item.val("");
                    xdoDtInit(_item);
                    dtItemBox.append(_item);
                });

                dtItemBox.on("click", "button.del-dt-item", function (e) {
                    var $this = $(this);
                    var len = dtItemBox.find("div.dt-item").length;
                    var $thisDtItem = $this.parents("div.dt-item:first");
                    if (len > 1) {
                        $thisDtItem.remove();
                    } else {
                        $thisDtItem.find("input").val("");
                    }
                });

                addSeriesBtn.on("click", function (e) {
                    e.preventDefault();

                    var html =
                        '<form class="form-horizontal" id="' +
                        idStr +
                        '">' +
                        '<div class="box-body">' +
                        '<div class="form-group">' +
                        '<label class="col-sm-2 control-label">连续天数：</label>' +
                        '<div class="col-sm-6">' +
                        '<input type="number" min="1" max="100" name="seriesDay" value="2" class="form-control input-sm" placeholder="连续天数">' +
                        "</div>" +
                        "</div>" +
                        '<div class="form-group">' +
                        '<label class="col-sm-2 control-label">选择时间：</label>' +
                        '<div class="col-sm-10">' +
                        '<div class="_mult-select-dt-input"></div>' +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</form>";

                    var _dt = null;
                    var _datetime = +new Date();
                    var _count = 2;
                    var me = layer.open({
                        title: "选择时间",
                        id: "_xdo-dt-select-form",
                        type: 1,
                        fixed: false,
                        moveType: 1,
                        content: '<div style="overflow:hidden;height:450px;" class="xdo-dy-mult-select-box">' +
                            html +
                            "</div>",
                        area: ["590px", "400px"],
                        maxmin: false,
                        scrollbar: true,
                        offset: "100px",
                        btn: ["保存", "取消"],
                        btnAlign: "c",
                        anim: 5,
                        yes: function () {
                            var days = [];
                            var oneDay = 24 * 60 * 60 * 1000;
                            for (var i = 0; i < _count; i++) {
                                var d = _datetime + i * oneDay;
                                var dt = new Date();
                                dt.setTime(d);
                                var dtStr =
                                    dt.getFullYear() +
                                    "-" +
                                    (dt.getMonth() + 1) +
                                    "-" +
                                    dt.getDate() +
                                    " " +
                                    dt.getHours() +
                                    ":" +
                                    dt.getMinutes();
                                var _item = dtItem.clone();
                                _item.find("input").val(dtStr);
                                xdoDtInit(_item);
                                dtItemBox.append(_item);
                            }
                            cleanItemBox();
                            layer.closeAll();
                        },
                        success: function (e) {
                            var formElem = $("#" + idStr);
                            var dt = formElem.find("div._mult-select-dt-input");
                            var seriesCount = formElem.find(
                                "input[name=seriesDay]"
                            );
                            _dt = dt.datetimepicker({
                                inline: true,
                                sideBySide: true
                            });
                            _dt.on("dp.change", function (e) {
                                _datetime = e.date.valueOf();
                            });
                            seriesCount.on("change", function (e) {
                                _count = seriesCount.val();
                            });
                            formElem.find("input");
                        },
                        no: function () {
                            layer.closeAll();
                        }
                    });
                });
                addDtBtn.on("click", function (e) {
                    e.preventDefault();
                    var _item = dtItem.clone();
                    _item.val("");
                    xdoDtInit(_item);
                    dtItemBox.append(_item);
                });
            });
        };
    })(jQuery);

    $(".xdo-select-date-time").xdoSchDateTime();
    $(".xdo-single-uploader").each(function (index, item) {
        $(item).xdoSingleUpload();
    });
    $(".xdo-mutil-uploader").xdoMultiUpload();
    $(".xdo-goback").on("click", function () {
        window.history.go(-1);
    });
});
