<?php if($this->session->flashdata('registered')) : ?>
  <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('registered');  ?></p>
<?php endif;?>
<?php if($this->session->flashdata('login_success')) : ?>
  <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('login_success');  ?></p>
<?php endif;?>
<?php if($this->session->flashdata('login_failed')) : ?>
  <p class="alert alert-dismissable alert-danger"><?php echo $this->session->flashdata('login_failed');  ?></p>
<?php endif;?>
<?php if($this->session->flashdata('noaccess')) : ?>
  <p class="alert alert-dismissable alert-danger"><?php echo $this->session->flashdata('noaccess');  ?></p>
<?php endif;?>
<h1>Welcome to myTodo!</h1>
<p>myTodo us a simple and helpful application to help you manage your day to day tasks.
    You can add as many task lists as you want and as many tasks as you want.
    myTodo is absolutely free! Have fun.</p> <br />
<h3>My Lists</h3>
<table class="table table-striped">
  <tr>
    <th>List Name</th>
    <th>Created</th>
    <th>View</th>
  </tr>
  <?php if(isset($lists)) : ?>
    <?php foreach($lists as $list) : ?>
  <tr>
    <td><?php echo $list->list_name; ?></td>
    <td><?php echo $list->created_at; ?></td>
    <td><a href="<?php echo base_url(); ?>lists/show/<?php echo $list->id; ?>">View list</a></td>
  </tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
