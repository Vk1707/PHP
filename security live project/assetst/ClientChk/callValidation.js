(function ( $ ) {
    /*Getting the version of Jquery*/
    $.fn.showVersion=function(){
        console.log(jQuery.fn.jquery);        
        return this;
    };
    
    /**
    * build the validation
    *
    */
    $.fn.formChecks=function(options){
        //console.log($(this.selector).length)
        //debug( $(this).attr('id') );
        var defaults = {
            formName: "",
            DomType: "div",
            addlFunc: "",
            ShowValStr:false,
            allChksArr :new Array(),
            allChks:true,
            reqShow:true,
            reqChar:'*',
            reqPlacement:'after',
            showStr:false,
            frmConfirm:false,
            frmConfMsg:"Are you sure to Submit this Form???",
            //submitFormAjax:false,
            ajaxSubFunc: "",
            nonASCII: false,
        };        
        // These are the defaults.
        var settings = $.extend( {}, defaults, options );           
        //console.log($(this.selector).attr('name'))
        settings.formName=(settings.formName!='')?(settings.formName):$(this.selector).attr('name');     
        var JDom='';
        //console.log(settings.formName)
        //console.log(settings.ajaxSubFunc)
        //console.log(settings.nonASCII)
        //console.log($('form[id='+settings.formName+']').length)     
        if($('form[id='+settings.formName+']').length>0 && $(this.selector).length>0){
            //console.log('Debugg');
            var frmvalidator  = new Validator(settings.formName);            
            frmvalidator.EnableOnPageErrorDisplay();
            frmvalidator.EnableMsgsTogether();
            //setting the frmConfirm
            frmvalidator.frmConfirm=settings.frmConfirm;
            //setting the confirm message            
            frmvalidator.frmConfmsg=settings.frmConfMsg;
            //frmvalidator.submitFormAjax=settings.submitFormAjax;
            frmvalidator.ajaxSubFuc=settings.ajaxSubFunc;
            
            frmvalidator.nonASCII=settings.nonASCII;
            //console.log($(this).attr('name'))            
                                    
            $.each($('input, select ,textarea, radio, checkbox', '#' + settings.formName), function(k) {
                //debug(this)
                // console.log($(this).attr('name'))
                JDom=$(this);
                //console.log(JDom.data('validate'))
                if (JDom.attr('name') != "" && JDom.data('validate') != "" && JDom.attr('type') != "hidden" && JDom.css('display')!="none" && JDom.attr('data-validate') != undefined) {
                    //console.log(JDom.attr('data-validate'))
                    var fieldReq = "";
                    if (JDom.attr('data-validate').split("|")[2].toLowerCase() == "y" && JDom.attr('data-validate').split("|")[1].toLowerCase() == "file")
                        fieldReq = "req_file";
                    else if (JDom.attr('data-validate').split("|")[2].toLowerCase() == "y" && JDom.attr('data-validate').split("|")[1].toLowerCase() != "file")
                        fieldReq = "req";
            
                    var fieldMnn = "";
                    if (JDom.attr('data-validate').split("|")[3].toLowerCase() != "" && isNaN(JDom.attr('data-validate').split("|")[3].toLowerCase()) == false)
                        fieldMnn = "minlen=" + JDom.attr('data-validate').split("|")[3].toLowerCase();
            
                    var fieldMxn = "";
                    if (JDom.attr('data-validate').split("|")[4].toLowerCase() != "" && isNaN(JDom.attr('data-validate').split("|")[4].toLowerCase()) == false)
                        fieldMxn = "maxlen=" + JDom.attr('data-validate').split("|")[4].toLowerCase();
            
                    var fieldErr = "";
                    if (JDom.attr('data-validate').split("|")[(JDom.attr('data-validate').split("|").length) - 1] != "")
                        fieldErr = JDom.attr('data-validate').split("|")[(JDom.attr('data-validate').split("|").length) - 1];
            
                    var othChks = "";
                    for (var ai = 5; ai < JDom.attr('data-validate').split("|").length - 1; ai++) {
                        if (JDom.attr('data-validate').split("|")[ai] !== undefined) {
                            othChks = othChks + "|" + JDom.attr('data-validate').split("|")[ai];
                        }
                    }
            
                    var mainChkStr = JDom.attr('name') + "|~|" + fieldReq + "|" + fieldMnn + "|" + fieldMxn + othChks + "|~|" + fieldErr;
                    var fldReqChk = mainChkStr.split("|~|");
                    var fieldName = JDom.attr('name');
                    var fldChks = fldReqChk[1].split("|");
                    var fldChksMsgs = fldReqChk[2].split("|");
                    if (in_array(mainChkStr, settings.allChksArr, false) == false)
                        settings.allChksArr.push(mainChkStr);
            
                    /*var span = document.createElement('span');        
                    span.setAttribute("id", "spdot_" + fieldName);     
                    span.setAttribute("style", "color:red;width:15px; position: relative; vertical-align:top; padding-right:2px;padding-left:2px");
                    span.innerHTML=(settings.reqShow)?settings.reqChar:'&nbsp;';*/
                    var span = $('<span />').attr({'id':"spdot_" + fieldName}).addClass('showAstric').html((settings.reqShow)?settings.reqChar:'&nbsp;');
                    
                    
                    //console.log($('#'+fieldName).parent().hasClass('input-group'))                
                    //console.log(JDom.parent().hasClass('input-group'))
                    //alert(fldReqChk[1]);  
                    var inputGroup=false;
                    var spanID = document.getElementById("spdot_" + fieldName);     
                    var span_err = document.createElement('label');
                    span_err.setAttribute("id", settings.formName + "_" + fieldName + "_errorloc");
                    span_err.setAttribute("class", "msghidden");
                    span_err.setAttribute("style", "display:none");
                    span_err.innerHTML='&nbsp;';
                    TfieldName = fieldName;
                    fieldName = fieldName.replace('[]', '\\[\\]');
                    $('#'+settings.formName + "_" + fieldName + "_errorloc").remove();
                    if($('#'+settings.formName + "_" + fieldName + "_errorloc").length<=0){
                        var span_errID = document.getElementById(settings.formName + "_" + TfieldName + "_errorloc");
                        if(JDom.parent().hasClass('input-group')){    
                            inputGroup=true;
                            JDom.closest('div:not(".input-group")').append( "<span class='error_msg_container msg_"+ TfieldName +"_err'></span>" );
                        }
                        else
                            JDom.wrap( "<span class='error_msg_container msg_"+ TfieldName +"_err'></span>" );
                        
                        if(JDom.is('input')){
                            if(JDom.attr('type') == 'radio' || JDom.attr('type') == 'checkbox'){
                                //JDom.parents().parents().append(span_err);            
                                JDom.closest('div').append(span_err);
                            }
                            else{
                                if(inputGroup)
                                    JDom.closest('div:not(".input-group")').append(span_err);
                                else
                                    JDom.after(span_err);   
                            }    
                        }
                        
                        if(JDom.is('select')){
                            JDom.after(span_err);
                        }
                        
                        if(JDom.is('textarea')){
                            JDom.after(span_err);
                        }       
                    }        
                    
                    
                    $('.msg_'+fieldName +'_err').wrapInner( "<span class='error_msg_container_inner inner_msg_"+TfieldName+"_err'></span>" );
                    
                    
                    
                    //alert(TfieldName)
                    //alert($(document.forms[formName][TfieldName]).is(":checkbox"))
                    //if ($(document.forms[formName][TfieldName]).get(0).tagName.toLowerCase() != 'radio' && $(document.forms[formName][TfieldName]).get(0).tagName.toLowerCase() != 'checkbox') {
                    if ($(document.forms[settings.formName][TfieldName]).is(":radio")==false && $(document.forms[settings.formName][TfieldName]).is(":checkbox") == false) {
                        if (in_array('req', (fldReqChk[1].split("|")), false) == true || in_array('req_file', (fldReqChk[1].split("|")), false) == true) {
                            if (!spanID) {
                                var labels = document.getElementsByTagName('label'), l, label;
                                for (l in labels) {
                                    if (labels[l]['htmlFor'] == fieldName) {
                                        label = labels[l];
                                        if (settings.reqPlacement == 'before') {
                                            $(label).before(span);
                                        } else {
                                            $(label).after(span);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    else {
                        if (in_array('req', (fldReqChk[1].split("|")), false) == true || in_array('req_file', (fldReqChk[1].split("|")), false) == true) {
                            //alert(TfieldName)
                            if (!spanID) {
                                var labels = document.getElementsByTagName('label'), l, label;
                                for (l in labels) {
                                    //alert(labels[l]['htmlFor'])
                                    if (labels[l]['htmlFor'] == TfieldName) {
                                        label = labels[l];
                                        if (settings.reqPlacement == 'before') {
                                            $(label).before(span);
                                        } else {
                                            $(label).after(span);
                                        }
                                    }
                                }
                            }
                        }
                        //alert($(document.forms[formName].elements[TfieldName]).length)            
                        if($(document.forms[settings.formName].elements[TfieldName]).length==null)
                        {
                            document.forms[settings.formName].appendChild(span_err);
                        }   
                        else{ }
                    }
                    
                    
                    for (fl in fldChks) {
                        var intlMsg = "Field Required";
                        if (fldChksMsgs[0] && fldChksMsgs[0] != "")
                            intlMsg = fldChksMsgs[0];
            
                        var chkNode = fldChks[fl];
                        var chkNodeMsg = "";
                        if (!fldChksMsgs[fl] || fldChksMsgs[fl] == "")
                            chkNodeMsg = intlMsg;
                        else
                            chkNodeMsg = fldChksMsgs[fl];
            
                        frmvalidator.addValidation(fieldName, chkNode, chkNodeMsg);
                    }

                    // validate all files names
                    if(JDom.attr('type')=='file'){                                                                      
                        $( "#" + TfieldName ).bind( "change", function() {
                            // console.log(this)
                            // allowed_extn = $(this).data('validate').match(/(?<=file_extn=).*(?=\|)/i);
                            let rule_str = $(this).data('validate').split('file_extn=');
                            rule_str = rule_str[1].split('|');
                            let allowed_extn = rule_str[0];
                            // console.log(allowed_extn)
                            let f_err_dom = $('#' + settings.formName + '_' + $(this).attr('id') + '_errorloc');
                            f_err_dom.html('');
                            if(!TestFileExtension(this, allowed_extn, fldChksMsgs)){
                                $(this).val('');
                                show_div_msg(settings.formName + '_' + $(this).attr('id') + '_errorloc', fldChksMsgs, this);
                            }
                        });
                    }
            
                }
            })
            
            
            for (alc in settings.allChksArr) {
                if(settings.allChks==false)
                    settings.allChks=settings.allChksArr[alc];
                else
                    settings.allChks = settings.allChks+"|$$|"+settings.allChksArr[alc];
            }
            if (settings.showStr == true) {
                var input = document.createElement('span');
                input.setAttribute("id", settings.formName + "_frmchks");
                input.innerHTML = settings.allChks;
                document.forms[settings.formName].appendChild(input);
            }
        }
        
        if(settings.addlFunc!="" && settings.addlFunc!=null){    
            frmvalidator.setAddnlValidationFunction(window[settings.addlFunc]);            
            //frmvalidator.setAddnlValidationFunction(settings.addlFunc);
        }
        //frmvalidator.submitFormAjax=true;
        //console.log('FrmAjaxFlage:'+frmvalidator.submitFormAjax);
        //console.log('FormValidErrorFlage:'+frmvalidator.frmError);
        return this;
    };
    
    
    
    
    $.fn.custom_alert = function(options){
        var defaults = {
            msg:'No Message to Display!',
            title:'Message',
        };
        var settings = $.extend( {}, defaults, options );
        
        $("<div class='cust-alert'></div>").html(settings.msg).dialog({
            title: settings.title,
            resizable: false,
            modal: true,
            buttons: {
                "Ok": function(){
                    $( this ).dialog( "close" );
                }
            }
        });
    },
    
    $.fn.SetToFirstFocus = function(options){
        var defaults = {
            formName:'',
        };
        var settings = $.extend( {}, defaults, options );           
        //console.log($(this.selector).attr('id'))
        settings.formName=(settings.formName!='')?(settings.formName):$(this.selector).attr('id');
        $('form#'+settings.formName+':first *:input[type!=hidden]:first').focus();
    }
    
    
    // Private function for debugging.
    function debug( obj ) {
        if ( window.console && window.console.log ) {
            window.console.log( "Total DOM count: " + obj.length );
        }
    }; 
}( jQuery ));