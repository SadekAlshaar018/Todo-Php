<ul id="actions">
  <h4>Task</h4>
  <li><a href="<?php echo base_url();?>tasks/add/<?php echo $task->list_id;?>">Add Task</a></li>
  <li><a href="<?php echo base_url();?>tasks/edit/<?php echo $task->id;?>">Edit Task</a></li>
<?php if($is_complete) : ?>
  <li><a href="<?php echo base_url();?>tasks/mark_new/<?php echo $task->id;?>">Mark New</a> </li>
<?php else : ?>
  <li><a href="<?php echo base_url();?>tasks/mark_complete/<?php echo $task->id;?>">Mark Complete</a> </li>
<?php endif; ?>
  <li><a onclick="return confirm('Are u sure?')" href="<?php echo base_url();?>tasks/delete/<?php echo $task->id;?>/<?php echo $this->uri->segment(3); ?>">Delete Task</a></li>
</ul>
<h1><?php echo $task->task_name; ?></h1>
<ul id="info">
  <li>Created On: <?php echo date("n-j-y",strtotime($task->create_date)); ?></li>
  <?php  if($task->is_complete === 0) : ?>
    <li>Status: Uncomplete</li>
  <?php else : ?>
    <li>Status: completed</li>
  <?php endif; ?>
  <li>Due Date : <?php   echo date("n-j-y",strtotime($task->create_date)); ?></li>
</ul><br />
<div style="max-width: 500px;">
  <?php echo $task->task_body; ?>
</div><br /><hr />
