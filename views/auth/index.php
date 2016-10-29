<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.10.16
 * Time: 19:42
 */
?>
<body>
    <div class="main-signin">
        <div class="main-signin__head">
            <p>Авторизация<p>
        </div>
        <div class="main-signin__middle">
            <div class="middle__form">
                <input type="text"     placeholder="Логин или Email">
                <input type="password" placeholder="Пароль">
                <input type="submit"   value="Войти">
            </div>
        </div>
        <div class="main-signin__foot">
            <div class="foot">
                <p>Вы еще не зарегистрированы?</p>
                <input class="reg" type="submit" value="Регистрация" />
                <label><input type="checkbox" class="checkReg" />Запомнить меня</label>
                <label><input type="checkbox" class="checkReg" />Я принимаю правила сайта (<span><a class="aMore" href="#">подробнее</a></span>)</label>
            </div>
        </div>
    </div>
    <div id="footerSlice">
        <div class="other">
            <div class="otherField"><p>Привет всем! Это пробный див. Рад всех видеть.Привет всем!</p></div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        setInterval(function() {
            $('.aMore').on('mouseover', function() {
                $('.other').css({'display':'table'});
                $('.other').animate({'margin-top':'-70px', 'opacity':'1'}, {queue:false, duration:500});
            });
        }, 500);
        setInterval(function() {
            $('.aMore').on('mouseout', function() {
                $('.other').animate({'margin-top':'20px', 'opacity':'0'}, {queue:false, duration:500});
            })
        }, 500);
    });
</script>