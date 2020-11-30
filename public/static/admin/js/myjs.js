// 按钮状态
$(function(){
$(".btn-common").hover(function () {
    $(this).css({
        backgroundColor: '#f94848',
        boxShadow: '0 4px 8px rgba(244,57,57,0.6)'
    });
},function(){
    $(this).css({
        backgroundColor: '#f43939',
        boxShadow: '0 4px 8px rgba(244,57,57,0.6)'
    });
});
$(".btn-common").mousedown(function () {
    $(this).css({
        backgroundColor: '#d52c2c',
        boxShadow: '0 2px 4px rgba(244,57,57,0.6)'
    });;
});
$(".btn-common").mouseup(function () {
    $(this).css({
        backgroundColor: '#f43939',
        boxShadow: '0 4px 8px rgba(244,57,57,0.6)'
    });
});
});