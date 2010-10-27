<h1>FUEL helper</h1>

<p>Contains FUEL specific functions. This helper actually exists in the <dfn>fuel</dfn> module and
should be loaded the following way:
</p>

<pre class="brush: php">
$this->load->module_helper(FUEL_FOLDER, 'fuel');
</pre>

<p>The following functions are available:</p>

<h2>fuel_block(<var>params</var>)</h2>
<p>Allows you to load a view and pass data to it.
The <dfn>params</dfn> parameter is an associative array that can have the following values:
</p>
<ul>
	<li><strong>view</strong> - a view file located in the <dfn>views/_blocks</dfn></li>
	<li><strong>view_string</strong> - a string value to be used for the view</li>
	<li><strong>is_block</strong> - should the data results be iterated through or is it a single result?</li>
	<li><strong>module</strong> - the module to get data</li>
	<li><strong>find</strong> - the find method to use on the module model</li>
	<li><strong>where</strong> - the where condition to be used in the find query</li>
	<li><strong>order</strong> - order the data results and sort them </li>
	<li><strong>limit</strong> - limit the number of data results returned</li>
	<li><strong>offset</strong> - offset the data results</li>
	<li><strong>return_method</strong> - the return method to use which can be an object or an array</li>
	<li><strong>assoc_key</strong> - the field to be used as an associative key for the data results</li>
	<li><strong>var</strong> - the variable name to assign the data returned from the module model query</li>
	<li><strong>data</strong> - data to be passed to the view if a module isn't provided</li>
	<li><strong>editable</strong> - insert in inline editing</li>
	<li><strong>label_field</strong> - label field for inline editing</li>
</ul>


<h2>fuel_model(<var>module</var>, <var>params</var>)</h2>
<p>Loads a module's model and creates a variable that you can use to merge data into your view.
The <dfn>params</dfn> parameter is an associative array that can have the following values:
</p>
<ul>
	<li><strong>find</strong> - the find method to use on the module model</li>
	<li><strong>where</strong> - the where condition to be used in the find query</li>
	<li><strong>order</strong> - order the data results and sort them </li>
	<li><strong>limit</strong> - limit the number of data results returned</li>
	<li><strong>offset</strong> - offset the data results</li>
	<li><strong>return_method</strong> - the return method to use which can be an object or an array</li>
	<li><strong>assoc_key</strong> - the field to be used as an associative key for the data results</li>
	<li><strong>var</strong> - the variable name to assign the data returned from the module model query</li>
	<li><strong>folder</strong> - specifies the module folder name to find the model</li>
</ul>

<h2>fuel_nav(<var>params</var>)</h2>
<p>Creates a menu structure. 
The <dfn>params</dfn> parameter is an array of options to be used with the <a href="<?=user_guide_url('libraries/menu')?>">Menu class</a>.
If FUEL's configuration mode is set to either <dfn>auto</dfn> or <dfn>cms</dfn>,
then it will first look for data from the FUEL navigation module. Otherwise it will by default look for the file <dfn>views/_variables/nav.php</dfn>
(you can change the name of the file it looks for in the <dfn>file</dfn> parameter passed). That file should contain an array of menu information (see <a href="<?=user_guide_url('libraries/menu')?>">Menu class</a> for more information on the required
data structure). The parameter values are very similar to the <a href="<?=user_guide_url('libraries/menu')?>">Menu class</a>, with a few additions shown below:
</p>
<ul>
	<li><strong>file</strong> - the name of the file containing the navigation information</li>
	<li><strong>var</strong> - the variable name in the file to use</li>
	<li><strong>exclude</strong> - nav items to exclude from the menu</li>
</ul>

<p class="important">For more information see the <a href="<?=user_guide_url('libraries/menu')?>">Menu class</a>.</p>

<h2>fuel_set_var(<var>key</var>, <var>val</var>)</h2>
<p>Sets a variable for all views to use no matter what view it is declared in.</p>


<h2>fuel_set_var(<var>key</var>, <var>[default]</var>, <var>[edit_module]</var>, <var>[evaluate]</var>)</h2>
<p>Returns a variable and allows for a default value. 
The <dfn>default</dfn> parameter will be used if the variable does not exist.
The <dfn>edit_module</dfn> parameter specifies the module to include for inline editing.
The <dfn>evaluate</dfn> parameter specifies whether to evaluate any php in the variables.
</p>


<h2>fuel_edit(<var>id</var>, <var>[label]</var>, <var>[module]</var>, <var>[xOffset]</var>, <var>[yOffset]</var>)</h2>
<p>Sets a variable marker (pencil icon) in a page which can be used for inline editing.
The <dfn>id</dfn> parameter is the unique id that will be used to query the module. You can also pass an id value
and a field like so <dfn>id|field</dfn>. This will display only a certain field instead of the entire module form.
The <dfn>label</dfn> parameter specifies the label to display next to the pencil icon.
The <dfn>xOffset</dfn> and <dfn>yOffset</dfn> are pixel values to offset the pencil icon.
</p>


<h2>fuel_cache_id(<var>[location]</var>)</h2>
<p>Creates the cache ID for the fuel page based on the URI. 
If no <dfn>location</dfn> value is passed, it will default to the current <a href="<?=user_guide_url('my_url_helper')?>">uri_path</a>.
</p>


<h2>fuel_url(<var>[uri]</var>)</h2>
<p>Creates the admin URL for FUEL (e.g. http://localhost/MY_PROJECT/fuel/admin).</p>


<h2>fuel_uri(<var>[uri]</var>)</h2>
<p>Returns the FUEL admin URI path.</p>


<h2>fuel_uri_segment(<var>[seg_index]</var>, <var>[rerouted]</var>)</h2>
<p>Returns the uri segment based on the FUEL admin path.</p>


<h2>fuel_uri_index(<var>[seg_index]</var>)</h2>
<p>Returns the uri index number based on the FUEL admin path.</p>


<h2>fuel_uri_string(<var>[from]</var>, <var>[to]</var>, <var>[rerouted]</var>)</h2>
<p>Returns the uri string based on the FUEL admin path.</p>


<h2>is_fuelified()</h2>
<p>Check to see if you are logged in and can use inline editing.</p>
