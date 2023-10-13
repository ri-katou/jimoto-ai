"use strict";
$(document).ready(function () {
    // もどるボタン
    $(".return").on("click", function () {
        history.back();
    });

    // 編集ボタンを押すと入力フォームの出現

    $(".edit-btn").on("click", function () {
        let togleForm = $(this).parent().parent().next();
        togleForm.toggleClass("hidden");
        $(this).toggleClass("hidden");
    });

    // 大項目をチェックすると小項目が全部チェックされる

    // 1. 「全選択」する

    $(".check").on("click", function () {
        let check = $(this).parent().next().children().children().children();
        if ($(this).children().is(":checked")) {
            $(check).prop("checked", this.click);

        } else {
            $(check).prop("checked", false);
            $(this).prop("checked", false);
        }
    });

    $(".aria-check").click(function () {
        console.log($(this).prop("checked"));
        if ($(this).prop("cheked")) {
            let area_id = $(this).attr("class");
            console.log("hello");
            $("." + area_id).prop("checked", true);
        } else {
            console.log("else");
        }
    });
    // 行ってみたいボタン
    $(".fav_btn-interest-icon").on("click", function () {
        var origin = location.origin;
        var $syoukaijouId = $(this).parent().parent().attr('id');
        var $myId = $(this).parent().parent().data('me');
        let $interestIcon = $(this);
        console.log($myId);
        console.log($syoukaijouId);
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        });
        $.ajax({
            url: origin + "/interest ",
            type: 'post',
            data: {
                'syoukaijou_id': $syoukaijouId,
                'user_id': $myId,
            }, success: function (data) {
                console.log(data);
                if (data == 1) {
                    $interestIcon.addClass('interest-active');
                } else {
                    $interestIcon.removeClass('interest-active');
                }
            }
        });
        return false;
    });
    // 行ったよボタン
    $(".fav_btn-visited-icon").on("click", function () {
        var origin = location.origin;
        var $syoukaijouId = $(this).parent().parent().attr('id');
        var $myId = $(this).parent().parent().data('me');
        let $visitedIcon = $(this);
        console.log($myId);
        console.log($syoukaijouId);
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        });
        $.ajax({
            url: origin + "/visited ",
            type: 'post',
            data: {
                'syoukaijou_id': $syoukaijouId,
                'user_id': $myId,
            }, success: function (data) {
                console.log(data);
                if (data == 1) {

                    $visitedIcon.addClass('visited-active');
                } else {
                    $visitedIcon.removeClass('visited-active');
                }
            }
        });
        return false;
    });


    //プロフィール編集にてエリアを選ぶと表記変更
    $(".profile-edit-eria-change").change(function () {
        let neweria = $("[name=eria] option:selected").text();

        $(".profile-eria-output").text(neweria);
    });

    let moji = $(".syoukaijou-day-sam").text().slice(10).replace("-", "/");
    console.log(moji);

    $(".area_choice").change(function () {
        let areatext = $(this).parent().text();
        $(".area-text").text(areatext);
    });

    $(".sourtselect").on('change', function(){
        let setvalue = $('option:selected').val();
        $(".keywordserch").attr('name', setvalue);
        
        $(".keywordserch").submit();
    })


}); //ここまでJquery

/* preview */


モーダル
let show = false;

document.getElementById("answer").onclick = function () {
    document.getElementById("modal").classList.add("show"); // 画面表示
    document.getElementById("mask").classList.remove("hidden"); //マスク表示
    show = true;
};

document.getElementById("close").onclick = function () {
    // flag = 0;
    document.getElementById("modal").classList.remove("show"); // 閉じる
    document.getElementById("mask").classList.add("hidden"); //マスク非表示
};
document.querySelector("#mask").onclick = function () {
    // flag = 0;
    if (document.getElementById("modal").classList.contains("show")) {
        document.getElementById("modal").classList.remove("show"); // 閉じる
        document.getElementById("mask").classList.add("hidden"); //マスク非表示
    }
};



