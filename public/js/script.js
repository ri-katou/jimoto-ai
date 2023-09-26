'use strict';
$(document).ready(function(){

  // ボタンの動き
// let btnOrange = document.getElementsByClassName('btn-orange');
// btnOrange.on('click'.function (){
//   this.addClass('btn-click');
// });

// 編集ボタンを押すと入力フォームの出現
let togleForm = $(this).parent().parent().next();
if (togleForm.is([value!=''])){
  togleForm.removeClass("hidden");
}
$('.edit-btn').on('click',function(){
  togleForm.removeClass("hidden");
})

})




