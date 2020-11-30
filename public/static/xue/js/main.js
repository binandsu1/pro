$(function () {
    // 控制文字输入
    function statInputNum(textArea,numItem,wordSum) {
        if(textArea[0]){
            var max = wordSum.text(),
                curLength;
            // var regRule = /[^\u4E00-\u9FA5|\d|\a-zA-Z|\r\n\s,.?!，。？;；：:''""“”’‘！…—&$=()-+/*{}[\]]|\s/g;    
            var regRule = /[^\a-\z\A-\Z0-9\u4E00-\u9FA5\ \.\。\,\，\?\？\！\!\、\;\；\"\'\“\”\‘\’\<\>\-\——\=\@\+\$\_]/g;    
            // textArea.attr("maxlength", max);
            curLength = textArea.val().length;
            numItem.text(curLength);
            textArea.on('input propertychange', function () {
                var param = $(this).val();
                $(this).val(param.replace(regRule,""));
                numItem.text($(this).val().length);
            });
        }
    }
    var wordCount = $(".wordCount-wrap"),
        textArea = wordCount.find("textarea"),
        word = wordCount.find(".word"),
        wordSum = wordCount.find(".word-sum");
        statInputNum(textArea,word,wordSum);
// 加载弹窗
    $("body").on("click", ".xdo-remote", function (e) {
        e.preventDefault();
        remoteContent(this);
    });
    function remoteContent(target){
        var $this = $(target);
        var title = $this.attr("title") || $this.text();
        var url = $this.attr("href") || $this.data("url");
        var size = $this.attr("data-size") || "";
        var loadTip = layer.load(2, {shade: 0,area: '32px'});
        $.get(
            url,
            function (xhr) {
                var me = layer.open({
                    type: 1,
                    title: title,
                    shadeClose: true,
                    area: size,
                    skin: 'custom-win',
                    content: xhr ,
                    anim: 5,
                    success: function (curr, me) {
                        layer.close(loadTip);
                    }
                });
            },
            "html"
        ).fail(function (xhr) {
            layer.close(loadTip);
            layer.msg(getErrMsg(xhr));
        });
    };

    $(".auout-content,.xue-loginboxwrap").parents('.xue-doc').addClass('bg-fa');
    
});
