<h3>Login Form</h3>
<?php $attributes = array('id' => 'login_form', 'class' => 'form-horizontal');  ?>

<!-- user/login:: user == class in controller && login:: methode inside user class -->
<?php echo form_open('users/login', $attributes); ?>


<!-- SIGNUP FORM BY PHP LIKE HTML -->
<p>
<?php echo form_label('Email Address:'); ?>
<?php
$data = array(
              'name'        => 'email',
              'placeholder' => 'Enter Your Email',
              'style'       => 'width:90%',
              'value'       => set_value('email')
            );
?>
<?php echo form_input($data); ?>
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
