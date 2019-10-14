<h3>Подтвердите свой голос</h3>
<form action="/vote/add.php">
    <input type="hidden" name="id" value="<?php echo (int) $id; ?>">
    
    <div class="captcha"></div>
    
    <input type="submit" value="Проголосовать">
</form>
<script>
    grecaptcha.render($('.captcha')[0], <?php echo json_encode(array('sitekey' => ReCaptcha::PUBLIC_KEY, 'theme' => 'light')); ?>);
</script>
