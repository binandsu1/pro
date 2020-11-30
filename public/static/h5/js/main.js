$(function () {
    //控制输入框文字
    function statInputNum(textArea,numItem,wordSum) {
        if(textArea[0]){
            var max = wordSum.text(),
                curLength;
            var regRule = /[^\u4E00-\u9FA5|\d|\a-zA-Z|\r\n\s,.?!，。？！…—&$=()-+/*{}[\]]|\s/g;    
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
        word = wordCount.find(".word");
        wordSum = wordCount.find(".word-sum");
        statInputNum(textArea,word,wordSum);
});
