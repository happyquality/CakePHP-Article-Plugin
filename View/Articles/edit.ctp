<p class="left"><?PHP echo $this->Html->link('更新せずに一覧に戻る', array('action' => 'index'), array('class' => 'btn')); ?>
</p><?PHP
	echo $this->Form->create('Article', array(
		'type' => 'file',
		'inputDefaults' => array(
			'label' => false,
			'legend' => false,
		),
	));
?>
<table class="form">
	<tr>
		<th colspan="2" class="title"><?PHP echo $this->request->data['Article']['name']; ?> - 編集</th>
	</tr>
	<tr>
		<td class="title">ID</td>
		<td class="contents">
			<?PHP echo $this->request->data['Article']['id']; ?>
			<?PHP echo $this->Form->input('id'); ?>
		</td>
	</tr>
	<tr>
		<td class="title">タイトル</td>
		<td class="contents">
			<p class="manual">manual</p>
			<?PHP echo $this->Form->input('title', array('after' => '')); ?>
		</td>
	</tr>
	<tr>
		<td class="title">タイトル</td>
		<td class="contents">
			<p class="manual">manual</p>
			<?PHP echo $this->Form->input('content', array('after' => '')); ?>
		</td>
	</tr>
	<tr>
		<td class="title">タイトル</td>
		<td class="contents">
			<p class="manual">manual</p>
			<?PHP echo $this->Form->input('article_category_id', array('after' => '')); ?>
		</td>
	</tr>
	<tr>
		<td class="title">タイトル</td>
		<td class="contents">
			<p class="manual">manual</p>
			<?PHP echo $this->Form->input('published', array('after' => '')); ?>
		</td>
	</tr>
	<tr>
		<td class="title">表示・非表示</td>
		<td class="contents">
			<?PHP echo $this->Form->input('deleted', array('type' => 'checkbox', 'label' => '非表示にする')); ?>
		</td>
	</tr>
	<tr>
		<td class="title">タイトル</td>
		<td class="contents">
			<p class="manual">manual</p>
			<?PHP echo $this->Form->input('posted', array('after' => '')); ?>
		</td>
	</tr>
</table>
<?PHP echo $this->Form->submit($this->request->data['Article']['name'].'を更新する', array('class' => 'btn btn-large', 'name' => 'submit')); ?>
<?PHP echo $this->Form->end(); ?>