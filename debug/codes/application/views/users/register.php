<?php if(!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <div class="error"><?= $error ?></div>
    <?php } ?>
    <?php
    // Manually clear the flashdata after displaying it
    $this->session->unset_userdata('input_errors');
    ?>
<?php } ?>

        <h1>Register</h1>

        <form action="<?= base_url("/users/process_registration") ?>" method="POST">
            First name: <input type="text" name="first_name">
            Last name: <input type="text" name="last_name">
            Email address: <input type="text" name="email">
            Password: <input type="password" name="password">
            Confirm Password: <input type="password" name="confirm_password"><br>
            
            <input type="submit" value="Register">
            <a href="signin">Already have an account? Log in</a>
        </form>

        
    </body>
</html>