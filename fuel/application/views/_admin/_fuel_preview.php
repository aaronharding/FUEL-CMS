<?php
$preview_body = parse_template_syntax(auto_typography($body));
// $vars['body'] = '<div class="preview_body">'.markdown(strip_javascript($preview_body)).'</div>';
$vars['body'] = $preview_body;
$this->load->view('_layouts/plain', $vars);
//echo $preview_body;
?>