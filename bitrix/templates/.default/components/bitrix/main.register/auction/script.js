$(document).ready(function () {

    $('[name="register_submit_button"]').click(function () {

        $('[name="regform"] p.error').remove();

        let checkbox = $('[type="checkbox"][name="UF_AGREE"]:checked').length;
        let passNum = $('[name="UF_PAS_NUM"]').val();

        if(checkbox !== 0 && passNum.length != 0)
            return true;
        else{
            $('[name="regform"]').prepend('<p class="error"><font class="errortext">  Не заполнены обязательные поля</font></p>')
            return false;
        }

    })

})