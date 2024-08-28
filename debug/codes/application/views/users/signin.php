<?php if(!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <div class="error"><?= $error ?></div>
    <?php } ?>
    <?php
    // Manually clear the flashdata after displaying it
    $this->session->unset_userdata('input_errors');
    ?>
<?php } ?>

        <h1>Login</h1>
        <form action="signin/validate" method="POST">            
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            Email address: <input type="text" name="email">
            Password: <input type="password" name="password">
        
            <input type="submit" value="Signin">
            <a href="register">Don't have an account? Register</a>
        </form>
        
    </body>
</html>

