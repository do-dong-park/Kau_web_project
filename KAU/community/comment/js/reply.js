$(document).ready(function(){


    $(".modify_reply").click(function(){
        /* dat_edit_bt클래스 클릭시 동작(댓글 수정) */
        var obj = $(this).closest(".reply_list").find(".reply_modify_input");
        obj.dialog({
            modal:true,
            width:650,
            height:300,
            title:"댓글 수정"});
    });

    $(".add_child_reply").click(function(){
        var obj = $(this).closest(".reply_list").find(".reply_reply_input").css("display");
        /* dat_edit_bt클래스 클릭시 동작(댓글 수정) */
        if (obj == "none") {
            $(this).closest(".reply_list").find(".reply_reply_input").css("display", "block");
        } else {
            $(this).closest(".reply_list").find(".reply_reply_input").css("display", "none");
        }
    });



});