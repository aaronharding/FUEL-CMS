	<div id="fuel_left_panel">
		<div id="fuel_left_panel_inner">
			
<?php 
	// // Get all modules
	// $modules = $this->fuel_modules->get_modules();
	// $mods = array();
	//         
	// foreach($modules as $mod)
	// {
	//     if(isset($mod['module_uri']))
	//     {
	//         // Index modules by their uri so we know which module belongs to a specific nav item
	//         $mods[$mod['module_uri']] = isset($mod['permission']) ? $mod['permission'] : '';
	//     }
	// }
	// 
	foreach($nav as $section => $nav_items)
	{
		if (is_array($nav_items))
		{
			$header_written = FALSE;
			
			foreach($nav_items as $key => $val)
			{
				$segments = explode('/', $key);
				$url = $key;
				
				// Check for a specific module's permission                                
		//		$key = isset($mods[$key]) ? $mods[$key] : $key;
				
				if (($this->fuel->auth->has_permission($key)) || $key == 'dashboard')
				{
					if  (!$header_written)
					{
						$section_hdr = lang('section_'.$section);
						if (empty($section_hdr))
						{
							$section_hdr = ucfirst(str_replace('_', ' ', $section));
						}
						echo "<div class=\"left_nav_section\" id=\"leftnav_".$section."\">\n";
						echo "\t<h3>".$section_hdr."</h3>\n";
						echo "\t<ul>\n";
					}
					echo "\t\t<li";
					if (preg_match('#^'.$nav_selected.'$#', $url))
					{
						echo ' class="active"';
					}
					echo "><a href=\"".fuel_url($url)."\" class=\"ico ico_".url_title(str_replace('/', '_', $key),'_', TRUE)."\">".$val."</a></li>\n";
					$header_written = TRUE;
				} 
			}
		}
		if  ($header_written)
		{
			echo "\t</ul>\n";
			echo "</div>\n";
		}
		
	}
?>
				
			<?php 
				$user_data = $this->fuel->auth->user_data();
				if (isset($user_data['recent'])) : ?>
			<div class="left_nav_section" id="leftnav_recent">
				<h3><?=lang('section_recently_viewed')?></h3>
				<ul>
					<?php foreach($user_data['recent'] as $val) : ?>
					<li><a href="<?=site_url($val['link'])?>" class="ico ico_<?=$val['type']?>" title="<?=$val['name']?>"><?=$val['name']?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

		</div>
	</div>