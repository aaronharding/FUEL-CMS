<div id="main_top_panel">
	<h2><?=lang('h2_activty')?></h2>
</div>

<div class="clear"></div>

<?=$this->form->open(array('action' => fuel_url('manage/activity'), 'method' => 'post', 'id' => 'form_table'))?>

<div id="action">


	<div id="filters">
		<table border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td><?=$this->form->search('search_term', $params['search_term'])?> </td>
					<td class="search"><?=$this->form->submit('Search')?></td>
					<td class="show">Show: <?=$this->form->select('limit', array('25' => '25', '50' => '50', '100' => '100'), $params['limit'])?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		
	</div>
	
	
</div>
<div id="notification" class="notification">
	<div id="pagination"><?=$pagination?></div>
</div>

<div id="main_content">

	<div id="list_container">
		<div id="data_table_container">
			<?=$table?>
		</div>
	</div>

</div>
<?=$this->form->close()?>
