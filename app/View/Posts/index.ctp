<?php $this->extend('/Posts/includes'); ?>
<!--<?php echo $this->fetch('sidebar'); ?>-->
<!--<?php $this->set('title_for_layout', "1111"); ?>-->

<h1>Blog posts</h1>
<table>
    <?php echo $this->Html->link(
        'Add Post',
        array('controller' => 'posts', 'action' => 'add')
    ); ?>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Delete</th>
        <th>Created</th>
    </tr>

    <!-- 遍历 $posts 数组, 输入post的信息 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $this->Html->link("Edit",array("action" =>"edit",$post['Post']['id'])); ?></td>
        <td><?php echo $this->Form->postLink("Delete",array("action"=>"delete",$post['Post']['id']),array("action"=>"confirm","你确定？")); ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
