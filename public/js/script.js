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
    $('.aria-check').click(function(){
        console.log($(this).prop('checked'));
        if($(this).prop('cheked')){
            let area_id = $(this).attr('class');
            console.log('hello');
            $('.'+ area_id).prop('checked',true)
        } else {
            console.log('else');
        }
    })
    //プロフィール編集にてエリアを選ぶと表記変更
    $('.profile-edit-eria-change').change(function(){
        let neweria = $('[name=eria] option:selected').text();

        $('.profile-eria-output').text(neweria);

    })

});

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
