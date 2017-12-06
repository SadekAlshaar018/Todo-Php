<ul id="actions">
  <h3>dash lists</h3>
  <li><a href="<?php echo base_url(); ?>tasks/add/<?php echo $list->id; ?>">Add</a></li>
  <li><a href="<?php echo base_url(); ?>lists/edit/<?php echo $list->id; ?>">Edit</a></li>
  <li>
    <a href="<?php echo base_url(); ?>lists/delete/<?php echo $list->id;?>"
       onclick="return confirm('Do you want delete a list?')">Delete</a>
  </li>
</ul>

<h2><?php echo $list->list_name; ?></h2>
Created at : <p><?php echo date("n-j-y",strtotime($list->created_at)); ?> </p><br>
<div class="">
  <?php echo $list->list_body; ?>
</div><br>
