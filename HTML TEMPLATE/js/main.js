
$(document).ready(function(){
  $('#btn-toggle-open').on('click',function(){
    $('.menu ul').css('display','flex');
    $('.btn-toggle-open').css('display','none');
    $('.btn-toggle-close').css('display','block');
  });
  $('#btn-toggle-close').on('click',function(){
    $('.menu ul').css('display','none');
    $('.btn-toggle-close').css('display','none');
    $('.btn-toggle-open').css('display','block');
  });

});