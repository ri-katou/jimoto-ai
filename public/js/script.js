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
});

//ここまでJquery

function previewFile(file) {
    // プレビュー画像を追加する要素
    const preview = document.getElementById("preview");

    // FileReaderオブジェクトを作成
    const reader = new FileReader();

    // ファイルが読み込まれたときに実行する
    reader.onload = function (e) {
        const imageUrl = e.target.result; // 画像のURLはevent.target.resultで呼び出せる
        const img = document.createElement("img"); // img要素を作成
        img.src = imageUrl; // 画像のURLをimg要素にセット
        preview.appendChild(img); // #previewの中に追加
    };

    // いざファイルを読み込む
    reader.readAsDataURL(file);
}

// <input>でファイルが選択されたときの処理
const fileInput = document.getElementById("example");
const handleFileSelect = () => {
    const files = fileInput.files;
    for (let i = 0; i < files.length; i++) {
        previewFile(files[i]);
    }
};
// fileInput.addEventListener("change", handleFileSelect);

/* preview */

//画像を配列に格納する
var img = new Array();

img[0] = new Image();
img[0].src = "image/0.jpg";
img[1] = new Image();
img[1].src = "image/1.jpg";
img[2] = new Image();
img[2].src = "image/2.jpg";

//画像番号用のグローバル変数
var cnt = 0;

//画像切り替え関数
function changeIMG() {
    //画像番号を進める
    if (cnt == 2) {
        cnt = 0;
    } else {
        cnt++;
    }

    //画像を切り替える
    document.getElementById("gazo").src = img[cnt].src;
}

// モーダル
// let show = false;

// document.getElementById("answer").onclick = function () {
//     document.getElementById("modal").classList.add("show"); // 画面表示
//     document.getElementById("mask").classList.remove("hidden"); //マスク表示
//     show = true;
// };

// document.getElementById("close").onclick = function () {
//     // flag = 0;
//     document.getElementById("modal").classList.remove("show"); // 閉じる
//     document.getElementById("mask").classList.add("hidden"); //マスク非表示
// };
// document.querySelector("#mask").onclick = function () {
//     // flag = 0;
//     if (document.getElementById("modal").classList.contains("show")) {
//         document.getElementById("modal").classList.remove("show"); // 閉じる
//         document.getElementById("mask").classList.add("hidden"); //マスク非表示
//     }
// };

// let selectElement = document.querySelector('select[name="area_choice"]');
// let selectedOption = selectElement.options[selectElement.selectedIndex];
// let selectedOptionText = selectedOption.textContent;
// let resultElement = document.getElementById("area_text");
// console.log(resultElement);
// resultElement.textContent = "area_text" + selectedOptionText;
