/* 
* @Author: liuli
* @Date:   2015-10-29 13:58:34
* @Last Modified by:   anchen
* @Last Modified time: 2015-10-31 11:07:23
*/

window.onload = function(){
    $("#guide").css({'height':$(document).height()});
    $("#guide").show();

    $('#getCode').on('click',function(){
        alert('验证码已发送！');
    })


    var a_em = $('.radiobox label em');
    var a_b =  $('.radiobox label em b')
    $('.radiobox label').on('click',function(){
        console.log(123);
        if(!$(this).find('em').hasClass('em_hover')){
            console.log(23);
            $(this).find('em').addClass('em_hover').end().siblings().find('em').removeClass('em_hover');
            $(this).find('b').addClass('b_hover').end().siblings().find('b').removeClass('b_hover');
            // a_em.addClass('em_hover');
            // a_b.addClass('b_hover');
        }else{
        }
        // a_em.removeClass('em_default');
        //a_b.css('display','inline-block');
    })

    $('.btn_ok').on('click',function(){

        var username = $('#username').val();
        var phone = $('#phone').val();
        var code = $('#code').val();
        var birthday = $('#birthday').val();
        var sale = $('#sale').text();
        var user = $('#user').text();

        console.log(username);
        console.log(phone);
        console.log(code);
        console.log(birthday);
        console.log(sale);
        console.log(user);


        if(username == '' || username == null){
            $('.error-warning').show();
        }
        if(phone == '' || phone == null){
            $('.error-warning').show();
            var telReg = !!phone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
            if(telReg == false){
                $('.error-warning').show();
                $('.error-warning').html('手机号码输入有误，请重新输入');
                window.location.href = 'sale.html';
            }else{
            }
        }
        if(birthday == '' || birthday == null){
            $('.error-warning').show();
        }

    })
    
    

    $('.j_change_address').on('click',function(){
        window.location.href = 'order.html';
    })
    
}