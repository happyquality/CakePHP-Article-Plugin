
<p class="right"><?PHP echo $this->Html->link('新規追加', array('action' => 'add'), array('class' => 'btn btn-primary')); ?></p>
<?PHP echo $this->element('paginator', array('paginatorModel' => 'Article')); ?>
<table class="list">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('title'); ?></th>
		<th><?php echo $this->Paginator->sort('content'); ?></th>
		<th><?php echo $this->Paginator->sort('article_category_id'); ?></th>
		<th><?php echo $this->Paginator->sort('published'); ?></th>
		<th><?php echo $this->Paginator->sort('deleted'); ?></th>
		<th><?php echo $this->Paginator->sort('posted'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th>編集</th>
		<th>削除</th>
	</tr>
<?php
$dataCount = count($articles);foreach ($articles as $key => $article): ?>
	<tr>
		<td class="center"><?php echo h($article['Article']['id']); ?></td>
		<td><?php echo h($article['Article']['title']); ?></td>
		<td><?php echo h($article['Article']['content']); ?></td>
		<td><?php echo h($article['Article']['article_category_id']); ?></td>
		<td><?php echo h($article['Article']['published']); ?></td>
		<td class="center">
		<?PHP
			if ($article['Article']['deleted']) {
				echo '非表示';
			} else {
				echo '表示';
			}
		?>
		</td>
		<td><?php echo h($article['Article']['posted']); ?></td>
		<td><?php echo h($article['Article']['created']); ?></td>
		<td><?php echo h($article['Article']['modified']); ?></td>
		<td class="center">
			<?php echo $this->Html->link('編集', array('action' => 'edit', $article['Article']['id'])); ?>
		</td>
		<td class="center">
			<?php echo $this->Form->postLink('削除', array('action' => 'delete', $article['Article']['id']), null, __('このデータを削除してもよろしいですか？ # %s?', $article['Article']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?PHP echo $this->element('paginator', array('paginatorModel' => 'Article')); ?>