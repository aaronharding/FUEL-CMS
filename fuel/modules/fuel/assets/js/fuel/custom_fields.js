//fuel = top.window.initFuelNamespace();
if (fuel == undefined){
	var fuel = {};
}
fuel.fields = {};

// date picker field
fuel.fields.datetime_field = function(context, options){
	var o = {
		dateFormat : 'mm/dd/yy',
		firstDay : 0,
		minDate : null,
		maxDate : null,
		region : '',
		showButtonPanel : false,
		showOn: 'button',
	    buttonText: 'Click to show the calendar',
	    buttonImageOnly: true, 
	    buttonImage: jqx.config.imgPath + 'calendar.png'
	}
	o = $.extend(o, options);
	$.datepicker.regional[o.region];
	$('.datepicker', context).datepicker(o);
}

// multi combo box selector
fuel.fields.multi_field = function(context){

	var comboOptions = function(elem){
		var comboOpts = {};
		comboOpts.valuesEmptyString = fuel.lang('comboselect_values_empty');
		comboOpts.selectedEmptyString = fuel.lang('comboselect_selected_empty');
		comboOpts.defaultSearchBoxString = fuel.lang('comboselect_filter');
		
		var $sortingElem = $(elem).parent().find('.sorting');
		if ($sortingElem.size()){
			comboOpts.autoSort = false;
			comboOpts.isSortable = true;
			comboOpts.selectedOrdering = eval(unescape($sortingElem.val()));
		}
		return comboOpts;
	}
	// set up supercomboselects
	$('select[multiple]', context).not('.no_combo').each(function(i){
		var comboOpts = comboOptions(this);
		$(this).supercomboselect(comboOpts);
	});
	
	fuel.fields.inline_edit_field(context);
}

// markItUp! and CKeditor field
fuel.fields.wysiwyg_field = function(context){
	
	$editors = $ckEditor = $('textarea', context).not('.no_editor');
	var module = fuel.getModule();
	var _previewPath = myMarkItUpSettings.previewParserPath;

	var createMarkItUp = function(elem){
		var q = 'module=' + escape(module) + '&field=' + escape($(elem).attr('name'));
		var markitUpClass = $(elem).attr('class');
		if (markitUpClass.length){
			var previewPath = markitUpClass.split(' ');
			if (previewPath.length && previewPath[0] != 'no_editor'){
				q += '&preview=' + previewPath[previewPath.length - 1];
			}
		}
		myMarkItUpSettings.previewParserPath = _previewPath + '?' + q;
		$(elem).not('.markItUpEditor').markItUp(myMarkItUpSettings);
		
		// set the width of the preview to match the width of the textarea
		$('.markItUpPreviewFrame', context).each(function(){
			var width = $(this).parent().find('textarea').width();
			console.log(width)
			$(this).width(width);
		})
	}
	
	// fix ">" within template syntax
	var fixCKEditorOutput = function(elem){
		var elemVal = $(elem).val();
		var re = new RegExp('([=|-])&gt;', 'g');
		var newVal = elemVal.replace(re, '$1>');
		$(elem).val(newVal);
	}
	
	var createCKEditor = function(elem){
		//window.CKEDITOR_BASEPATH = jqx.config.jsPath + 'editors/ckeditor/'; // only worked once in jqx_header.php file
		var ckId = $(elem).attr('id');
		var sourceButton = '<a href="#" id="' + ckId + '_viewsource" class="btn_field editor_viewsource">' + fuel.lang('btn_view_source') + '</a>';
		// cleanup
		if (CKEDITOR.instances[ckId]) {
			CKEDITOR.remove(CKEDITOR.instances[ckId]);
		}
		
		CKEDITOR.replace(ckId, jqx.config.ckeditorConfig);

		// add this so that we can set that the page has changed
		CKEDITOR.instances[ckId].on('instanceReady', function(e){
			editor = e.editor;
			this.document.on('keyup', function(e){
				editor.updateElement();
			});
			
			// so the formatting doesn't get too crazy from ckeditor
			this.dataProcessor.writer.setRules( 'p',
			{
				indent : false,
				breakBeforeOpen : true,
				breakAfterOpen : false,
				breakBeforeClose : false,
				breakAfterClose : true
			});
		})
		CKEDITOR.instances[ckId].resetDirty();
		
		// needed so it doesn't update the content before submission which we need to clean up... 
		// our keyup event took care of the update
		CKEDITOR.config.autoUpdateElement = false;
		
		CKEDITOR.instances[ckId].hidden = false; // for toggling
		
		if ($('#' + ckId).parent().find('.editor_viewsource').size() == 0){
			
			$('#' + ckId).parent().append(sourceButton);

			$('#' + ckId + '_viewsource').click(function(){

				$elem = $(elem);
				ckInstance = CKEDITOR.instances[ckId];

				//if (!$('#cke_' + ckId).is(':hidden')){
				if (!CKEDITOR.instances[ckId].hidden){
					CKEDITOR.instances[ckId].hidden = true;
					if (!$elem.hasClass('markItUpEditor')){
						createMarkItUp(elem);
						$elem.show();
					}
					$('#cke_' + ckId).hide();
					$elem.css({visibility: 'visible'}).closest('.html').css({position: 'static'}); // used instead of show/hide because of issue with it not showing textarea
					//$elem.closest('.html').show();
				
					$('#' + ckId + '_viewsource').text(fuel.lang('btn_view_editor'));
				
					if (!ckInstance.checkDirty()){
						$.changeChecksaveValue('#' + ckId, ckInstance.getData())
					}

					// update the info
					ckInstance.updateElement();
				
				
				} else {
					CKEDITOR.instances[ckId].hidden = false;
				
					$('#cke_' + ckId).show();
				
					$elem.closest('.html').css({position: 'absolute', 'left': '-100000px', overflow: 'hidden'}); // used instead of show/hide because of issue with it not showing textarea
					//$elem.show().closest('.html').hide();
					$('#' + ckId + '_viewsource').text(fuel.lang('btn_view_source'))
				
					ckInstance.setData($elem.val());
				}
			
				fixCKEditorOutput(elem);
				return false;
			})
		}
	}
	$editors.each(function(i) {
		var _this = this;
		var ckId = $(this).attr('id');
		if ((jqx.config.editor.toLowerCase() == 'ckeditor' && $(this).is('textarea[class!="markitup"]')) || $(this).hasClass('wysiwyg')){
//			createCKEditor(this);
			setTimeout(function(){
				createCKEditor(_this);
			}, 250) // hackalicious... to prevent CKeditor errors when the content is ajaxed in... this patch didn't seem to work http://dev.ckeditor.com/attachment/ticket/8226/8226_5.patch
		} else {
			createMarkItUp(this);
		}
		
		// setup update of element on save just in case
		$(this).parents('form').submit(function(){
			if (CKEDITOR && CKEDITOR.instances[ckId] != undefined && CKEDITOR.instances[ckId].hidden == false){
				CKEDITOR.instances[ckId].updateElement();
			}
		})
	});
}

// file upload field
fuel.fields.file_upload_field = function(context){
	
	// hackalicious... to prevent issues when things get ajaxed in
	setTimeout(function(){
		// setup multi-file naming convention
		$.fn.MultiFile.options.accept = jqx.config.assetsAccept;
		$multiFile = $('.multifile:file');

		// get accept types and then remove the attribute from the DOM to prevent issue with Chrome
		var acceptTypes = $multiFile.attr('accept');
		$multiFile.addClass('accept-' + acceptTypes); // accepts from class as well as attribute so we'll use the class instead
		$multiFile.removeAttr('accept');// for Chrome bug
		$multiFile.MultiFile({ namePattern: '$name___$i'});
	}, 500)
	
}

// asset select field
fuel.fields.asset_field = function(context, options){
	
	var selectedAssetFolder = 'images';
	var activeField = null;

	var showAssetsSelect = function(){
		var url = jqx.config.fuelPath + '/assets/select/' + selectedAssetFolder + '/?selected=' + escape($('#' + activeField).val());
		var html = '<iframe src="' + url +'" id="asset_inline_iframe" class="inline_iframe" frameborder="0" scrolling="no" style="border: none; height: 480px; width: 850px;"></iframe>';
		$modal = fuel.modalWindow(html, 'inline_edit_modal', false);
		
		// // bind listener here because iframe gets removed on close so we can't grab the id value on close
		$modal.find('iframe#asset_inline_iframe').bind('load', function(){

			var iframeContext = this.contentDocument;
			$assetSelect = $('#asset_select', iframeContext);
			$assetPreview = $('#asset_preview', iframeContext);
			$('.cancel', iframeContext).add('.modal_close').click(function(){
				$modal.jqmHide();
				
				if ($(this).is('.save')){
					var $activeField = $('#' + activeField);
					var assetVal = jQuery.trim($activeField.val());
					var selectedVal = $assetSelect.val();
					var separator = $activeField.attr('data-separator');
					var multiple = parseInt($activeField.attr('data-multiple')) == 1;
					if (multiple){
						if (assetVal.length) assetVal += separator;
						assetVal += selectedVal;
					} else {
						assetVal = selectedVal;
					}
					$('#' + activeField).val(assetVal);
				}
				return false;
			});
		})
		return false;
	}
	
	
	var _this = this;
	$('.asset_select', context).each(function(i){
		if ($(this).parent().find('.asset_upload_button').size() == 0){
			var assetTypeClasses = ($(this).attr('class') != undefined) ? $(this).attr('class').split(' ') : [];
			var assetFolder = (assetTypeClasses.length > 1) ? assetTypeClasses[assetTypeClasses.length - 1] : 'images';
			var btnLabel = '';
			switch(assetFolder.split('/')[0].toLowerCase()){
				case 'pdf':
					btnLabel = fuel.lang('btn_pdf');
					break;
				case 'images': case 'img': case '_img':
					btnLabel = fuel.lang('btn_image');
					break;
				case 'swf': case 'flash':
					btnLabel = fuel.lang('btn_flash');
					break;
				default :
					btnLabel = fuel.lang('btn_asset');
			}
			$(this).after('&nbsp;<a href="'+ jqx.config.fuelPath + '/assets/select/' + assetFolder + '" class="btn_field asset_select_button ' + assetFolder + '">' + fuel.lang('btn_select') + ' ' + btnLabel + '</a>');
		}
	});

	$('.asset_select_button', context).click(function(e){
		activeField = $(e.target).parent().find('input,textarea:first').attr('id');
		var assetTypeClasses = $(e.target).attr('class').split(' ');
		selectedAssetFolder = (assetTypeClasses.length > 0) ? assetTypeClasses[(assetTypeClasses.length - 1)] : 'images';
		showAssetsSelect();
		return false;
	});
	
	
	// asset upload 
	var showAssetUpload = function(url){
		var html = '<iframe src="' + url +'" id="add_edit_inline_iframe" class="inline_iframe" frameborder="0" scrolling="no" style="border: none; height: 0px; width: 0px;"></iframe>';
		$modal = fuel.modalWindow(html, 'inline_edit_modal', true);
		
		// // bind listener here because iframe gets removed on close so we can't grab the id value on close
		$modal.find('iframe#add_edit_inline_iframe').bind('load', function(){
			var iframeContext = this.contentDocument;
			selected = $('#uploaded_file_name', iframeContext).val();
			if (selected && selected.length){
				$('#' + activeField).val(selected);
				$modal.jqmHide();
			}
		})
		return false;
	}
	$('.asset_upload', context).each(function(i){
		if ($(this).parent().find('.asset_upload_button').size() == 0){
			var assetTypeClasses = ($(this).attr('class') != undefined) ? $(this).attr('class').split(' ') : [];
			var assetFolder = (assetTypeClasses.length > 1) ? assetTypeClasses[assetTypeClasses.length - 1] : 'images';
			var btnLabel = fuel.lang('btn_upload_asset');
			$(this).after('&nbsp;<a href="'+ jqx.config.fuelPath + '/assets/inline_create/" class="btn_field asset_upload_button ' + assetFolder + '">' + btnLabel + '</a>');
		}
	});
	
	$('.asset_upload_button', context).click(function(e){
		activeField = $(e.target).parent().find('input:first').attr('id');
		var assetTypeClasses = $(e.target).attr('class').split(' ');
		selectedAssetFolder = (assetTypeClasses.length > 0) ? assetTypeClasses[(assetTypeClasses.length - 1)] : 'images';
		var url = $(this).attr('href');
		url = url + '?asset_folder=' + selectedAssetFolder;
		showAssetUpload(url);
		return false;
		
	});
}

// inline editing of another module
fuel.fields.inline_edit_field = function(context){

	//fuel.fields.multi_field(context);

	var topWindowContext = window.top.document;
	
	var displayError = function($form, html){
		$form.find('.inline_errors').addClass('notification error ico_error').html(html).animate( { backgroundColor: '#ee6060'}, 1500);
	}
	
	var $modal = null;
	var selected = null;
	var editModule = function(url, onLoadCallback, onCloseCallback){
		var html = '<iframe src="' + url +'" id="add_edit_inline_iframe" class="inline_iframe" frameborder="0" scrolling="no" style="border: none; height: 0px; width: 0px;"></iframe>';
		$modal = fuel.modalWindow(html, true, 'inline_edit_modal', onLoadCallback, onCloseCallback);
		
		// bind listener here because iframe gets removed on close so we can't grab the id value on close
		$modal.find('iframe#add_edit_inline_iframe').bind('load', function(){
			var iframeContext = this.contentDocument;
			selected = $('#id', iframeContext).val();
		})
		return false;
	}
	
	$('.add_edit', context).each(function(i){
		var $field = $(this);
		var fieldId = $field.attr('id');
		var $form = $field.closest('form');
		var className = ($field.attr('class') != undefined) ? $field.attr('class').split(' ') : [];
		var module = '';
		
		var isMulti = ($field.attr('multiple')) ? true : false;
		
		if (className.length > 1){
			module = className[className.length -1];
		} else {
			module = fieldId.substr(0, fieldId.length - 3) + 's'; // eg id = client_id so module would be clients
		}
		var parentModule = fuel.getModuleURI(context);
		
		var url = jqx.config.fuelPath + '/' + module + '/inline_';
		var addCss = 'add_inline_button';
		
		if (!$field.parent().find('.' + addCss).size()) $field.after('&nbsp;<a href="' + url + 'create" class="btn_field ' + addCss + '">' + fuel.lang('btn_add') + '</a>');
		if (!$field.parent().find('.edit_inline_button').size()) $field.after('&nbsp;<a href="' + url + 'edit/" class="btn_field edit_inline_button">' + fuel.lang('btn_edit') + '</a>');
		if (isMulti) addCss += ' float_left';
		
		var refreshField = function(){
			
			// if no value added,then no need to refresh
			if (!selected) return;
			var refreshUrl = jqx.config.fuelPath + '/' + parentModule + '/refresh_field';
			var params = { field:fieldId, field_id: fieldId, values: $field.val(), selected:selected};
							
			// fix for pages... a bit kludgy
			if (module == 'pages'){
				params['layout'] = $('#layout').val();
			}

			$.post(refreshUrl, params, function(html){
				$('#notification').html('<ul class="success ico_success"><li>Successfully added to module ' + module + '</li></ul>')
				fuel.notifications();
				$modal.jqmHide();
				$('#' + fieldId, context).replaceWith(html);
				
				// already inited with custom fields
				
				//console.log($form.formBuilder())
				//$form.formBuilder().call('inline_edit');
				// refresh field with formBuilder jquery
				
				fuel.fields.multi_field(context)
				
				$('#' + fieldId, context).change(function(){
					changeField($(this));
				});
				changeField($('#' + fieldId, context));
			});
		}
		
		var changeField = function($this){
			if (($this.val() == '' || $this.attr('multiple')) || $this.find('option').size() == 0){
				if ($this.is('select') && $this.find('option').size() == 0){
					$this.hide();
				}
				if ($this.is('input, select')) $this.next('.btn_field').hide();
			} else {
				$this.next('.btn_field').show();
			}	
		}
		
		$('.add_inline_button', context).click(function(e){
			editModule($(this).attr('href'), null, refreshField);
			$(context).scrollTo('body', 800);
			return false;
		});

		$('.edit_inline_button', context).click(function(e){
			var url = $(this).attr('href') + $(this).prev().val();
			editModule(url, null, refreshField);
			return false;
		});

		$field.change(function(){
			changeField($(this));
		});
		changeField($field);
	});
}

// creates a field that will use apply it's value when typed it to another field after passing it through a transformation function
fuel.fields.linked_field = function(context){
	
	var _this = this;
	var module = fuel.getModule();
	
	// needed for enclosure
	var bindLinkedKeyup = function(slave, master, func){
		var slaveId = fuel.getFieldId(slave, context);
		var masterId = fuel.getFieldId(master, context);
		if ($('#' + slaveId).val() == ''){
			$('#' + masterId).keyup(function(e){

				// for most common cases
				if (func){
					var newVal = func($(this).val());
					$('#' + slaveId).val(newVal);
				}

			});
		}
		
		// setup ajax on blur to do server side processing if no javascript function exists
		if (!func){
			$('#' + masterId).blur(function(e){
				var url = __FUEL_PATH__ + '/' + module + '/process_linked';
				var parameters = {
					master_field:master, 
					master_value:$(this).val(), 
					slave_field:slave
				};
				$.post(url, parameters, function(response){
					$('#' + slaveId).val(response);
				});
			});
		}
		
	}

	// needed for enclosure
	var bindLinked = function(slave, master, func){

		if ($('#' + fuel.getFieldId(slave, context)).val() == ''){
			if (typeof(master) == 'string'){
				bindLinkedKeyup(slave, master, url_title);
			} else if (typeof(master) == 'object'){

				for (var o in master){
					var func = false;
					var funcName = master[o];
					var val = $('#' + fuel.getFieldId(o, context)).val();
					if (funcName == 'url_title'){
						var func = url_title;
					// check for function scope, first check local function, then class, then global window object
					} else if (funcName != 'url_title'){
						if (this[funcName]){
							var func = this[funcName];
						} else if (window[funcName]){
							var func = window[funcName];
						}
					}
					bindLinkedKeyup(slave, o, func);
					break; // stop after first one
				}
			}
		}
	}
	
	$('.linked', context).each(function(i){
		// go all the way up to the value containing element because error messages insert HTML that won't allow us to use prev()
		var linkedInfo = $(this).parents('.value').find('.linked_info').text();
		if (linkedInfo.length){
			bindLinked($(this).attr('id'), eval('(' + linkedInfo + ')'));
		}
	});
	
}

// create fillin property fields... placeholder value is really all you need though and this may be deprecated
fuel.fields.fillin_field = function(context){
	$('.fillin', context).each(function(i){
		var placeholder = unescape($(this).attr('placeholder'));
		$(this).fillin(placeholder);
	});
}

// create fillin property fields... placeholder value is really all you need though and this may be deprecated
fuel.fields.number_field = function(context, options){
	$('.numeric', context).each(function(i){
		var o = {decimal: false, negative: false}
		o = $.extend(o, options);
		if ($(this).attr('data-decimal') == "1" || $(this).attr('data-decimal').toLowerCase() == "yes"){
			o.decimal = '.';
		} else {
			o.decimal = false;
		}
		if ($(this).attr('data-negative') == "1" || $(this).attr('data-negative').toLowerCase() == "yes"){
			o.negative = true;
		} else {
			o.negative = false;
		}
		$(this).numeric(o);
	});
}

// create a repeatable field
fuel.fields.template_field = function(context, options){
	if (!options) options = {};

	var repeatable = function($repeatable){
		var currentCKTexts = {};

		// hack required for CKEditor so it will allow you to sort and not lose the data 
		$repeatable.bind('sortStarted', function(e){
			if (CKEDITOR != undefined){
				for(var n in CKEDITOR.instances){
					currentCKTexts[n] = CKEDITOR.instances[n].getData();
				}
			}
		})

		$repeatable.bind('sortStopped', function(e){
			if (CKEDITOR != undefined){
				for(var n in CKEDITOR.instances){
					currentCKTexts[n] = CKEDITOR.instances[n].setData(currentCKTexts[n]);
				}
			}
		})
		
		// set individual options based on the data-max attribute
		$repeatable.each(function(i){
			options.max = $(this).attr('data-max');
			options.min = $(this).attr('data-min');
			options.dblClickBehavior = $(this).attr('data-dblclick');
			options.initDisplay = $(this).attr('data-init_display');
			options.addButtonText = fuel.lang('btn_add_another');
			options.removeButtonText = fuel.lang('btn_remove');
			options.warnBeforeDeleteMessage = fuel.lang('warn_before_delete_msg');
			$(this).repeatable(options);
		})
	}
	
	// get nested ones first
	$elems = $('.repeatable .repeatable', context).parent();
	repeatable($elems);
	
	// then the parents
	$elems = $('.repeatable', context).not('.repeatable .repeatable').parent();
	repeatable($elems);
	
	('.repeatable', context).live('cloned', function(e){
		$('#form').formBuilder().initialize(e.clonedNode);
	})

}