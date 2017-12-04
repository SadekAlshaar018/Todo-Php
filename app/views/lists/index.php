<h1>Lists</h1>
<p>Your lists below</p>
<ul class="list_items">
  <?php foreach ($lists as $list) : ?>
      <li>
        <div class="list_name">
            <a href="<?php echo base_url(); ?>lists/show/<?php echo $list->id; ?>">
              <?php echo $list->list_name.'<br>'; ?>
            </a>
        </div>
        <div class="list_body">
            <?php echo $list->list_body; ?>
        </div>

      </li>
  <?php endforeach; ?>
</ul><br>
<a href="<?php echo base_url(); ?>lists/add">create a New list</a>
