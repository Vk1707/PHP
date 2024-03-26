(function($) {
	$.fn.extend({
		tableAddCounter: function(options) {
			var defaults = {
				title: '#',
				start: 1,
				id: false,
				cssClass: false,
				posAt: 'first-child',
			};
			var options = $.extend({}, defaults, options);
			return $(this).each(function() {
				if ($(this).is('table')) {
					if (!options.title) options.title = '';
					$('th:' + options.posAt + ', thead td:' + options.posAt + '', this).each(function() {
						var tagName = $(this).prop('tagName');
						if (options.pos == 'first-child') $(this).before('<' + tagName + ' rowspan="' + $('thead tr').length + '" class="' + options.cssClass + '" id="' + options.id + '">' + options.title + '</' + tagName + '>');
						else$(this).after('<' + tagName + ' rowspan="' + $('thead tr').length + '" class="' + options.cssClass + '" id="' + options.id + '">' + options.title + '</' + tagName + '>');
					});
					$('tbody td:' + options.posAt + '', this).each(function(i) {
						if (options.posAt == 'first-child') $(this).before('<td>' + (options.start + i) + '</td>');
						else$(this).after('<td>' + (options.start + i) + '</td>');
					});
				}
			});
		},
		loadGrid: function(options) {
			var defaults = {
				pageName: '',
				fillTo: $(this)
			};
			var options = $.extend({}, defaults, options);
			return $.ajax({
				type: "POST",
				dataType: "html",
				cache: false,
				url: options.pageName,
				beforeSend: function() {
					$.fn.ajaxLoading();
				},
				success: function(data) {
					options.fillTo.html(data);
				},
				error: function() {
					$.fn.custom_alert({
						msg: 'Something went wrong, Please try again!'
					});
				},
				complete: function() {
					$.fn.ajaxLoading({
						show: false
					});
				}
			})
		},
		CheckAll: function(options) {
			var defaults = {
				chkName: $(this),
				ckFlage: true
			};
			var options = $.extend({}, defaults, options);
			if (options.ckFlage) {
				$("input[type='checkbox'][name='" + options.chkName + "']").each(function() {
					this.checked = true;
				});
			} else {
				$("input[type='checkbox'][name='" + options.chkName + "']").each(function() {
					this.checked = false;
				});
			}
		},
		FillData: function(options) {
			var defaults = {
				url: '',
				Arr: '',
				Fill_To: '',
				FillHtml: true,
				Async: true
			};
			var options = $.extend({}, defaults, options);
			$.ajax({
				type: 'POST',
				url: options.url,
				data: options.Arr,
				beforeSend: function() {
					$.fn.ajaxLoading();
				},
				success: function(data, status) {
					if (options.FillHtml == false) {
						var dropval = data.toString().split('|');
						var x = 0;
						var FinalStr = '';
						$("#" + options.Fill_To).empty();
						for (x in dropval) {
							var temp = dropval[x].split('#$#');
							$("#" + options.Fill_To).append($('<option></option>').val(temp[0]).html(temp[1]));
						};
					} else {
						// console.log(options.Fill_To);
						var el = $("#" + options.Fill_To);
						if (el.attr('type') !== undefined && el.attr('type') === 'text') {
							el.val(data);
						} else {
							el.html(data);
						}
					}
				},
				complete: function() {
					$.fn.ajaxLoading({
						show: false
					});
				},
				async: options.Async
			});
		}
	});
	$.fn.ShowError = function(frmJsonEncodeError) {
		$.each(frmJsonEncodeError, function(index, eDom) {
			var eleErrDom = $("#" + eDom[0] + "_" + eDom[1] + "_errorloc");
			try {
				if (eleErrDom.length == 0) {
					eDom[1] = eDom[1] + '[]';
					var tId = eDom[1].replace(/[[]/g, '\\[');
					tId = tId.replace(/]/g, '\\]');
					eleErrDom = $("#" + eDom[0] + "_" + tId + "_errorloc");
				}
				eleErrDom.html("<div class='alert alert-danger alert-dismissible cus_error'><span class='glyphicon glyphicon-remove-circle'></span><span class='close' data-dismiss='alert' aria-label='close'>&times;</span> " + eDom[3] + '</div>').css({
					'display': 'block'
				});

				if(eleErrDom.length==0){
					$('#ShowMsgPop').ShowMsg({msg:eDom[3]});
				}
			} catch (err) {
				console.log('Exception: ' + err.message)
			}
		});
	};
	$.fn.ShowMsg = function(options) {
		var defaults = {
			colwidth: 'col-md-4',
			coloffset: 'col-md-offset-4',
			alertClass: 'alert-info',
			msg: '',
			dismiss: true
		};
		var settings = $.extend({}, defaults, options);
		var dismisHtml = (settings.dismiss) ? "<span class='close' data-dismiss='alert' aria-label='close'>&times;</span>" : '';
		$(this.selector).html("<div class='alert fade in " + settings.colwidth + " " + settings.coloffset + " model-width " + settings.alertClass + "'>" + dismisHtml + settings.msg + "</div>");
		$(this.selector).fadeTo(5000, 500).slideUp(900, function() {
			$(this.selector).slideUp(900);
		});
	};
	$.fn.OpenPop = function(options) {
		var defaults = {
			url: '',
			dialogId: 'PopWind',
			backdrop: 'static',
			keyboard: true
		};
		var settings = $.extend({}, defaults, options);
		$(this.selector).load(settings.url, function(response, status, xhr) {
			if ($('#' + settings.dialogId).length == 0) {
				$.fn.custom_alert({
					msg: 'Unable to complete your Request! Please contact to Administrator!',
					title: 'Information'
				});
			}
			$('#' + settings.dialogId).modal({
				backdrop: settings.backdrop,
				keyboard: settings.keyboard,
				show: true
			});
		})
	};
	$.fn.ajaxLoading = function(options) {
		var defaults = {
			forDialog: false,
			show: true,
			AppedTo: 'body',
		};
		var settings = $.extend({}, defaults, options);
		var chkExist = $('.model').length;
		if (settings.forDialog == false && chkExist == 0) {
			modDiv = $('<div />').addClass('model').appendTo(settings.AppedTo);
			lodDiv = $('<div />').addClass('loader-container').appendTo(settings.AppedTo);
		} else if (settings.forDialog == true && chkExist == 0) {
			modDiv = $('<div />').addClass('model_1').appendTo(settings.AppedTo);
			lodDiv = $('<div />').addClass('loader-container_1').appendTo(settings.AppedTo);
		}
		if (settings.show) {
			modDiv.fadeIn();
			lodDiv.fadeIn();
		} else {
			modDiv.fadeOut();
			lodDiv.fadeOut();
		}
	};
	$.fn.highlight = function(pat) {
		function innerHighlight(node, pat) {
			var skip = 0;
			if (node.nodeType == 3) {
				var pos = node.data.toUpperCase().indexOf(pat);
				if (pos >= 0) {
					var spannode = document.createElement('span');
					spannode.className = 'highlight';
					var middlebit = node.splitText(pos);
					var endbit = middlebit.splitText(pat.length);
					var middleclone = middlebit.cloneNode(true);
					spannode.appendChild(middleclone);
					middlebit.parentNode.replaceChild(spannode, middlebit);
					skip = 1;
				}
			} else if (node.nodeType == 1 && node.childNodes && !/(script|style)/i.test(node.tagName)) {
				for (var i = 0; i < node.childNodes.length; ++i) {
					i += innerHighlight(node.childNodes[i], pat);
				}
			}
			return skip;
		}
		return this.each(function() {
			innerHighlight(this, pat.toUpperCase());
		});
	};
	$.fn.removeHighlight = function() {
		return this.find("span.highlight").each(function() {
			this.parentNode.firstChild.nodeName;
			/*with(this.parentNode) {
				replaceChild(this.firstChild, this);
				normalize();
			}*/
		}).end();
	};

	$.fn.PrintMe = function(options){
		var defaults = {
			print_type: 0 //0=normal print, 1=generate pdf
		};
		var settings = $.extend({}, defaults, options);

	    var allC='';
	    $("link[rel='stylesheet']").each(function() {
	        var cssLink = $(this).attr('href');
	            allC=allC + '<link rel="stylesheet" type="text/css" href="' + cssLink + '">';
	    });
	    //console.log(allC)
	    //var allC='';
	    $('script[type="text/javascript"]').each(function() {
	        var scrLink = $(this).attr('src');
	        //console.log(scrLink)
	        //allC=(scrLink!='undefined')?allC + '<script src="' + scrLink + '">':'';
	    });
	    //console.log(allC);
	    if (settings.print_type == 1) {
	        var params = [
	            'height=0',
	            'width=0',
	            'fullscreen=yes', // only works in IE, but here for completeness
	            'target=_blank',

	        ].join(',');
	    }
	    else{
	        var params = [
	            'height='+screen.height,
	            'width='+(screen.width*0.80),
	            'fullscreen=yes', // only works in IE, but here for completeness
	            'target=_blank',

	        ].join(',');
	    }

	    var win = window.open("",'printwindow', params);
	    win.moveTo(0,0);
	    wTitle=document.title;
	    win.document.write('<!DOCTYPE HTML><html><head><title>Print Version of ( ' + wTitle + ' )</title>' + allC + '</head><body class="no-rep"><div class="container-body">');
	            var pDom=$(this.selector).clone(true);
	            var printContents=pDom.find('a').replaceWith(function(){ return this.innerHTML; }).end().html();

	            //
	            lefBlock=pDom.find('#print-container .col-md-9').prev('div .col-md-3');
	            printContents=pDom.find('#print-container .col-md-9').after(lefBlock).switchClass('col-md-9','col-md-12').prev('div .col-md-3').remove().end().html();
	            //

	            printContents=pDom.find('.new-for-print').removeClass('hidden').end().html();
	            //getting the link name and add on*/
	            lName=$('.breadcrumb li.active').prev().text();
	            printContents=pDom.find('.text-for').html(lName).end().html();
	            $(printContents).find('script').remove();
	            //console.log(printContents)
	    win.document.write('<div class="print-version" id="print-version">' + printContents + '</div>');
	    win.document.write('</div></body></html>');

	    //console.log(win.document.documentElement.outerHTML)
	    //console.log(printContents);

	    if (settings.print_type == 1) {
	        /*$.base64.utf8encode = true;
	        $.ajax({
	            type     : "POST",
	            dataType: "html",
	            cache    : false,
	            url      : '<?php echo "getPdf.php"; ?>',
	            data     : {'data':$.base64.btoa(printContents),'link_name':$.base64.btoa($('#link_name').text().trim()),<?php echo $GLOBALS['csrf']['token']; ?>},
	            beforeSend: function(){
	                $.fn.ajaxLoading();
	            },
	            success  : function(data) {
	                data=$.parseJSON($.base64.atob(data));
	                try{
	                    console.log(data)
	                    win.location.href='getPdf.php?fname=' + data.fname;
	                    win.resizeTo(screen.height, (screen.width*0.80)); // Resizes the new window
	                    win.focus();
	                }
	                catch(err) {
	                    $('#ShowMsg1').ShowMsg({msg:"<strong>Error:</strong> Unexpected Response received, You may try again!",alertClass:'alert-warning'});
	                }

	            },
	            error:function(){
	                $.fn.custom_alert({msg:'Something went wrong, Please try again!'});
	            },
	            complete: function(){
	                $.fn.ajaxLoading({show:false});
	            },
	        });*/
	    }
	    else{
	        var runWhenReady = function(){
	            // Wait for the availability of the function
	            var el = win.document.querySelector(".print-version");
	            if (!el){
	                //console.log(el)
	                setTimeout(runWhenReady, 50);
	                return;
	            }
	            //console.log('Trying to call function...');

	            setTimeout(
	                function() {
	                    win.print();
	                    win.close();
	                }, 200);

	        };
	        runWhenReady();
	    }

	};
}(jQuery));