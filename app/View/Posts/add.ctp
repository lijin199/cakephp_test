<h1>Add Post</h1>
<?php echo $this->Html->link("返回列表页",array("action"=>"index")); ?>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' =>'3'));
echo $this->Form->end('Save Post');
?>
