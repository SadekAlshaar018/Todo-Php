<h3>Login Form</h3>
<?php $attributes = array('id' => 'login_form', 'class' => 'form-horizontal');  ?>

<!-- user/login:: user == class in controller && login:: methode inside user class -->
<?php echo form_open('user/login', $attributes); ?>


<!-- SIGNUP FORM BY PHP LIKE HTML -->
<p>
  <!-- USERNAME INPUT -->
<?php echo form_label('Username:'); ?>
<?php
    $data = array('name'        => 'username',
                  'placeholder' => 'Enter your name',
                  'style'       => 'width:90%',
                  'value'       => set_value('username'));
?>
<?php echo form_input($data);?>
</p>
<p>
  <!-- PASSWORD INPUT -->
<?php echo form_label('Password:'); ?>
<?php
    $data = array('name'        => 'password',
                  'placeholder' => 'Enter password',
                  'style'       => 'width:90%',
                  'value'       => set_value('password'));
?>
<?php echo form_password($data);?>
</p>

<p>
  <!-- SUBMIT BUTTON INPUT -->
<?php
    $data = array('name'        => 'submit',
                  'class'       => 'btn btn-primary',
                  'value'       => 'Login');
?>
<?php echo form_submit($data);?>
</p>


<?php echo form_close(); ?>
