<div class="login_form">
    <div style="width:100%;height:100%;text-align:center">
        <h2>Login</h2>
        <div class="well" style="width:220px;margin:auto;padding-bottom:0">
            <?php echo form_open('login/validate_login') ?>
            <label for="username" style="text-align:left">Username </label><?php echo form_input('username') ?><br/>
            <label for="password" style="text-align:left">Password </label><?php echo form_password('password') ?><br/><br/>
            <?php echo form_submit('submit', 'Login'); ?>
            <?php echo form_close(); ?>
        </div>
        <div style="width:300px;margin:auto;margin-top:20px;"<? $this->notify->output()?>
    </div>
</div>