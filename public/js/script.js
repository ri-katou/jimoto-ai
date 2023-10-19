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
        if ($(this).prop("cheked")) {
            let area_id = $(this).attr("class");
            $("." + area_id).prop("checked", true);
        } else {
            console.log("else");
        }
    });
    // // 行ってみたいボタン
    //  function interest () {
    //     console.log('ok');
    //     var origin = location.origin;
    //     var $syoukaijouId = $(this).parent().parent().attr('id');
    //     var $myId = $(this).parent().parent().data('me');
    //     let $interestIcon = $(this);
    //     $.ajaxSetup({
    //         headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
    //     });
    //     $.ajax({
    //         url: origin + "/interest ",
    //         type: 'post',
    //         data: {
    //             'syoukaijou_id': $syoukaijouId,
    //             'user_id': $myId,
    //         }, success: function (data) {
    //             if (data == 1) {
    //                 $interestIcon.addClass('interest-active');
    //                 let countNow = Number($interestIcon.next().text());
    //                 $interestIcon.next().text(countNow + 1);
    //             } else {
    //                 $interestIcon.removeClass('interest-active');
    //                 let countNow = Number($interestIcon.next().text());
    //                 $interestIcon.next().text(countNow - 1);
    //             }
    //         }
    //     });
    //     return false;
    // }
    // 行ったよボタン
    // $(".fav_btn-visited-icon").on("click", function () {
    //     var origin = location.origin;
    //     var $syoukaijouId = $(this).parent().parent().attr('id');
    //     var $myId = $(this).parent().parent().data('me');
    //     let $visitedIcon = $(this);
    //     $.ajaxSetup({
    //         headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
    //     });
    //     $.ajax({
    //         url: origin + "/visited ",
    //         type: 'post',
    //         data: {
    //             'syoukaijou_id': $syoukaijouId,
    //             'user_id': $myId,
    //         }, success: function (data) {
    //             if (data == 1) {

    //                 $visitedIcon.addClass('visited-active');
    //                 let countNow = Number($visitedIcon.next().text());
    //                 $visitedIcon.next().text(countNow + 1);
    //             } else {
    //                 $visitedIcon.removeClass('visited-active');
    //                 let countNow = Number($visitedIcon.next().text());
    //                 $visitedIcon.next().text(countNow - 1);
    //             }
    //         }
    //     });
    //     return false;
    // });


    //プロフィール編集にてエリアを選ぶと表記変更
    $(".profile-edit-eria-change").change(function () {
        let neweria = $("[name=eria] option:selected").text();

        $(".profile-eria-output").text(neweria);
    });

    $(".area_choice").change(function () {
        let areatext = $(this).parent().text();
        $(".area-text").text(areatext);
    });

    // 日付のフォーマット
    $(".syoukaijou-day-sam").text().replaceAll('-', '/').slice(0, 10);


    // $("#answer").on('click',function(){
    //     $("#modal").addClass('show');
    //     $("#mask").removeClass('hidden');
    //     show = true;
    // })

    //ソート
    //  行ってみたい順
    $(".sourtselect").on('change', function () {
        if ($(".sourtselect").val() == 'sourtInterest') {
            let sortSyoukaijou = '';
            sortSyoukaijou = $('.syou').sort(function (a, b) {
                if ($(a).data("interest") < $(b).data("interest")) {
                    return 1;
                } else {
                    return -1;
                }
            })
            $('.syoukaijou-card').empty();
            sortSyoukaijou.each(function () {
                $('.syoukaijou-card').append($(this));
            });
        };
    });
    //  行ったよ順
    $(".sourtselect").on('change', function () {
        if ($(".sourtselect").val() == 'sourtVisited') {
            let sortSyoukaijou = '';
            sortSyoukaijou = $('.syou').sort(function (a, b) {
                if ($(a).data("visited") < $(b).data("visited")) {
                    return 1;
                } else {
                    return -1;
                }
            })
            $('.syoukaijou-card').empty();
            sortSyoukaijou.each(function () {
                $('.syoukaijou-card').append($(this));
            });
        };
    });
    // 新着順（再読み込みするだけ）
    $(".sourtselect").on('change', function () {
        if ($(".sourtselect").val() == 'sourtNew') {
            location.reload();
        };
    });

    //マイページの画像変更
    $(function () {
        $('.profile-img-edit-input').change(function () {
            var file = $(this).prop('files')[0];

            // 画像以外は処理を停止
            if (!file.type.match('image.*')) {
                // クリア
                $(this).val('');
                $('.profile-icon').html('');
                return;
            }
            var reader = new FileReader();
            reader.onload = function () {
                var img_src = $('.profile-icon-img').attr('src', reader.result);

            }
            reader.readAsDataURL(file);
            $('#profile-img-edit-form').submit();
        });
    });

}); //ここまでJquery

/* preview */


// モーダル
let show = false;

document.getElementById("answer").addEventListener('click', function () {
    document.getElementById("modal").classList.add("show"); // 画面表示
    document.getElementById("mask").classList.remove("hidden"); //マスク表示
    show = true;
});

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



