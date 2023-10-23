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

    $('form').on('submit', function(){
        console.log(this);
        let insertHtml=`
        <!-- loading -->
        <div id="loading"">
            <div class="cv-spinner">
                <span class="spinner"></span>
                <p>...少々お待ち下さい。</p>
            </div>
        </div>
        <!-- loading -->
        `
        let insertCSS=`
        <style>
            #loading{
                position: fixed;
                top: 0;
                left: 0;
                z-index: 999;
                width: 100%;
                height:100%;
                background: rgba(0,0,0,0.6);
            }
            #loading .cv-spinner {
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #loading .spinner {
                width: 40px;
                height: 40px;
                border: 4px #ddd solid;
                border-top: 4px #999 solid;
                border-radius: 50%;
                animation: sp-anime 0.8s infinite linear;
            }
            #loading p {
                line-height: 40px;
                margin: 0 0 0 8px;
                text-align: center;
                color: #ddd
            }
            @keyframes sp-anime {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(359deg); }
            }
            #loading.is-hide{
                display:none;
            }
        </style>
        `
        document.getElementsByTagName('head')[0].insertAdjacentHTML('beforeend', insertCSS);
        document.getElementsByTagName('body')[0].insertAdjacentHTML('afterbegin', insertHtml);
    });

    $('#delete').on('click',function(e){
        let result = window.confirm('この投稿を削除しますか？')
        if(result){
            $('#delete').off();
        }else{
            e.preventDefault();
            console.log('end');
        }
    })

}); //ここまでJquery

/* preview */


// エリアセレクトのモーダル
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

//アニメーション

const myFunc = ()=>{

    const form = document.forms[0];
    const button = form.querySelector('button');
    const loader = form.querySelector('.loader');

    button.addEventListener('click', (e)=>{

        //ローダーを表示する
        loader.style.display = 'block';

        //～
        //非同期処理追加
        //～

    }, false);
};
myFunc();



