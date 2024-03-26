/*SHA*/
var sha256 = function sha256(ascii) {
	function rightRotate(value, amount) {
		return (value>>>amount) | (value<<(32 - amount));
	};
	
	var mathPow = Math.pow;
	var maxWord = mathPow(2, 32);
	var lengthProperty = 'length'
	var i, j; // Used as a counter across the whole file
	var result = ''

	var words = [];
	var asciiBitLength = ascii[lengthProperty]*8;
	
	//* caching results is optional - remove/add slash from front of this line to toggle
	// Initial hash value: first 32 bits of the fractional parts of the square roots of the first 8 primes
	// (we actually calculate the first 64, but extra values are just ignored)
	var hash = sha256.h = sha256.h || [];
	// Round constants: first 32 bits of the fractional parts of the cube roots of the first 64 primes
	var k = sha256.k = sha256.k || [];
	var primeCounter = k[lengthProperty];
	/*/
	var hash = [], k = [];
	var primeCounter = 0;
	//*/

	var isComposite = {};
	for (var candidate = 2; primeCounter < 64; candidate++) {
		if (!isComposite[candidate]) {
			for (i = 0; i < 313; i += candidate) {
				isComposite[i] = candidate;
			}
			hash[primeCounter] = (mathPow(candidate, .5)*maxWord)|0;
			k[primeCounter++] = (mathPow(candidate, 1/3)*maxWord)|0;
		}
	}
	
	ascii += '\x80' // Append ?' bit (plus zero padding)
	while (ascii[lengthProperty]%64 - 56) ascii += '\x00' // More zero padding
	for (i = 0; i < ascii[lengthProperty]; i++) {
		j = ascii.charCodeAt(i);
		if (j>>8) return; // ASCII check: only accept characters in range 0-255
		words[i>>2] |= j << ((3 - i)%4)*8;
	}
	words[words[lengthProperty]] = ((asciiBitLength/maxWord)|0);
	words[words[lengthProperty]] = (asciiBitLength)
	
	// process each chunk
	for (j = 0; j < words[lengthProperty];) {
		var w = words.slice(j, j += 16); // The message is expanded into 64 words as part of the iteration
		var oldHash = hash;
		// This is now the undefinedworking hash", often labelled as variables a...g
		// (we have to truncate as well, otherwise extra entries at the end accumulate
		hash = hash.slice(0, 8);
		
		for (i = 0; i < 64; i++) {
			var i2 = i + j;
			// Expand the message into 64 words
			// Used below if 
			var w15 = w[i - 15], w2 = w[i - 2];

			// Iterate
			var a = hash[0], e = hash[4];
			var temp1 = hash[7]
				+ (rightRotate(e, 6) ^ rightRotate(e, 11) ^ rightRotate(e, 25)) // S1
				+ ((e&hash[5])^((~e)&hash[6])) // ch
				+ k[i]
				// Expand the message schedule if needed
				+ (w[i] = (i < 16) ? w[i] : (
						w[i - 16]
						+ (rightRotate(w15, 7) ^ rightRotate(w15, 18) ^ (w15>>>3)) // s0
						+ w[i - 7]
						+ (rightRotate(w2, 17) ^ rightRotate(w2, 19) ^ (w2>>>10)) // s1
					)|0
				);
			// This is only used once, so *could* be moved below, but it only saves 4 bytes and makes things unreadble
			var temp2 = (rightRotate(a, 2) ^ rightRotate(a, 13) ^ rightRotate(a, 22)) // S0
				+ ((a&hash[1])^(a&hash[2])^(hash[1]&hash[2])); // maj
			
			hash = [(temp1 + temp2)|0].concat(hash); // We don't bother trimming off the extra ones, they're harmless as long as we're truncating when we do the slice()
			hash[4] = (hash[4] + temp1)|0;
		}
		
		for (i = 0; i < 8; i++) {
			hash[i] = (hash[i] + oldHash[i])|0;
		}
	}
	
	for (i = 0; i < 8; i++) {
		for (j = 3; j + 1; j--) {
			var b = (hash[i]>>(j*8))&255;
			result += ((b < 16) ? 0 : '') + b.toString(16);
		}
	}
	return result;
};



/*SHA*/


var frmNameMain;
var submit = false;
var frmError = false;
function in_array(needle, haystack, argStrict) {
    var key = '',
    strict = !!argStrict;

    if (strict) {
        for (key in haystack) {
            if (haystack[key] === needle) {
                return true;
            }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) {
                return true;
            }
        }
    }

    return false;
}




/**
*@about 
*
*
*/
function Validator(frmname)
{
    this.validate_on_killfocus = false;
    this.formobj = document.forms[frmname];
    if (!this.formobj)
    {
        console.log("Error: could not get Form object " + frmname);
        return;
    }
    if (this.formobj.onsubmit)
    {    
        //alert("now submitting");
        this.formobj.old_onsubmit = this.formobj.onsubmit;
        this.formobj.onsubmit = null;
        
    }
    else
    {
        this.formobj.old_onsubmit = null;
    }
    
    
    this.formobj._sfm_form_name = frmname;
    //this.formobj.onsubmit = form_submit_handler;
    //alert(frmname)
    frmNameMain=frmname;
    this.formobj.onsubmit = form_submit_handler;
    this.addValidation = add_validation;

    this.formobj.addnlvalidations = new Array();
    this.addAddnlValidationFunction = add_addnl_vfunction;
    this.formobj.runAddnlValidations = run_addnl_validations;
    this.setAddnlValidationFunction = set_addnl_vfunction;//for backward compatibility


    this.clearAllValidations = clear_all_validations;
    this.focus_disable_validations = false;

    document.error_disp_handler = new sfm_ErrorDisplayHandler();

    this.EnableOnPageErrorDisplay = validator_enable_OPED;
    this.EnableOnPageErrorDisplaySingleBox = validator_enable_OPED_SB;

    this.show_errors_together = false;
    this.EnableMsgsTogether = sfm_enable_show_msgs_together;
    document.set_focus_onerror = true;
    this.EnableFocusOnError = sfm_validator_enable_focus;

    this.formobj.error_display_loc = 'right';
    this.SetMessageDisplayPos = sfm_validator_message_disp_pos;

    this.formobj.DisableValidations = sfm_disable_validations;
    this.formobj.validatorobj = this;
    
    //this.submitFormAjax = false;
    this.frmConfirm = false;
    this.frmConfmsg = '';
    this.ajaxSubFuc='';
    this.nonASCII = false;
}


function sfm_validator_enable_focus(enable)
{
    document.set_focus_onerror = enable;
}

function CompareDates(fdate,tdate) //input should dd/mm/yyy
{   
    var str1 = tdate;
    var str2 = fdate;
    var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 > date1)
    {
        return false;
        //tdate shuld be grtr then fdate
    } 
    
}

function add_addnl_vfunction()
{
    var proc =
    {
    };
    proc.func = arguments[0];
    proc.arguments = [];

    for (var i = 1; i < arguments.length; i++)
    {
        proc.arguments.push(arguments[i]);
    }
    this.formobj.addnlvalidations.push(proc);
}

function set_addnl_vfunction(functionname)
{
    if(functionname.constructor == String)
    {
        alert("Pass the function name like this: validator.setAddnlValidationFunction(DoCustomValidation)\n "+
            "rather than passing the function name as string");
        return;
    }
    this.addAddnlValidationFunction(functionname);
}

function run_addnl_validations()
{
    var ret = true;
    for (var f = 0; f < this.addnlvalidations.length; f++)
    {
        var proc = this.addnlvalidations[f];
        var args = proc.arguments || [];
        if (!proc.func.apply(null, args))
        {
            ret = false;
        }
    }
    return ret;
}

function sfm_set_focus(objInput)
{

    if (document.set_focus_onerror)
    {
        if (!objInput.disabled && objInput.type != 'hidden' && objInput.style.display!='none' && document.getElementById(objInput.id)!=null)
        {

            try{
                objInput.focus();
            }
            catch(er)
            {
                //ignore and continue, or do something else
            }
            
        }
    }
}

function sfm_disable_validations()
{
    if (this.old_onsubmit)
    {
        this.onsubmit = this.old_onsubmit;
    }
    else
    {
        this.onsubmit = null;
    }
}

function sfm_enable_show_msgs_together()
{
    this.show_errors_together = true;
    this.formobj.show_errors_together = true;
}

function sfm_validator_message_disp_pos(pos)
{
    this.formobj.error_display_loc = pos;
}

function clear_all_validations()
{
    for (var itr = 0; itr < this.formobj.elements.length; itr++)
    {
        this.formobj.elements[itr].validationset = null;
    }
}


function form_submit_handler(frmname)
{

    var bRet = true;
    document.error_disp_handler.clear_msgs();

    for (var itr = 0; itr < this.elements.length; itr++)
    {    
        //console.log($(this.elements[itr]).is(':visible'))
        //console.log($(this.elements[itr]).attr('name'))        
        if (this.elements[itr].validationset && !this.elements[itr].validationset.validate()&& $(this.elements[itr]).is(':visible'))
        {            
            bRet = false;
        }
        if (!bRet && !this.show_errors_together)
        {
            break;
        } 

    }
    
    if (this.show_errors_together || bRet && !this.show_errors_together)
    {
        if (!this.runAddnlValidations())
        {
            bRet = false;
        }
    }
    
    

    
    if (!bRet){
        document.error_disp_handler.FinalShowMsg();        
        return false;
    }
    else{
        //console.log("frmConfirmFlage:"+this.validatorobj.frmConfirm);
        //console.log("frmConfirmMessage:"+this.validatorobj.frmConfmsg);
        //console.log(this.validatorobj.ajaxSubFuc)
        if(this.validatorobj.frmConfirm){
            if(confirm(this.validatorobj.frmConfmsg,'Confirmation')==false){                
                return false;       
            }
        }
        //console.log(frmNameMain)
        /*FormHandFlage=true;       
        if(frmNameMain!=="formLogin" && frmNameMain!=="formNC"){
            if(confirm('Are you sure to Submit this Form???','Confirmation')==false){
                FormHandFlage=false;
                return false;       
            }
        } */
    }
    

    $.each($('input', '#' + this.id), function(k) {        
        if ($(this).attr('name') != "" && $(this).data('validate') != "" && typeof $(this).data('validate')!='undefined') {
            var hK=5
            
            for(hK in $(this).data('validate').split("|"))
            {
                
                if($(this).data('validate').split("|")[hK].indexOf("hidein=")>-1)
                {
                    var hideR=$(this).data('validate').split("|")[hK].split("=")[1];
                    
                    console.log("hideR:"+hideR);
                    
                   // alert(hideR);
                   //alert($(this).attr('name') +"-->"+document.getElementById($(this).attr('id')).value+"--"+hideR)
                  // alert(document.getElementById($(this).attr('id')).value);
                    //var encStr=MD5(document.getElementById($(this).attr('id')).value);
                    // MD5(document.getElementById($(this).attr('id')).value);
                    var encStr=$('#'+this.id).md5();
                    console.log("this.id:"+this.id);
                     console.log("encStr:"+encStr);
                        var encStrSHA=sha256 (encStr);
                    console.log("encStrSHA:"+encStrSHA);
                  //  alert(encStr+"/n"+encStrSHA)
                    if(document.getElementById(hideR).value!='')
                    {
                        //console.log("lp-st");
                      //  alert(hideR)
                       // alert("key--"+encStr)
                        //encStr=MD5(document.getElementById(hideR).value+encStr);
                      /*  console.log("hideR:"+hideR);
                        console.log("encStr:"+encStr);*/
                        
                      /*  console.log("HIM-MD5:"+encStr);
                        console.log("HIM-KY:"+document.getElementById(hideR).value);
                        console.log("HIM-SHA:"+sha256(encStr));
                        console.log("HIM-SLTSHA:"+sha256(document.getElementById(hideR).value+encStr));*/
                        
                        encStr=sha256(encStr);
                        encStrSHA=sha256(sha256(document.getElementById(hideR).value)+encStr);
                        document.getElementById(hideR).value=sha256(document.getElementById(hideR).value);
                        /*OLD ONE*/
                        //encStr=$('#'+hideR).md5({key:encStr});
                        
                        //encStrSHA=sha256(encStr);
                         /*OLD ONE*/
                        
                      /*  console.log("encStr:"+encStr);
                        console.log("encStrSHA:"+encStrSHA);*/
                        
                        
                        
                        
                        //console.log("lp-ed");
                        
                    }
		
                    //console.log('NewMD5:'+encStr);
                    //alert(hideR+"--"+encStr);
                   $('#'+hideR+' ,#'+$(this).attr('id')).val('');
                  // $('#'+hideR).val(encStr);
                   $('#'+hideR).val(encStrSHA);
                    //document.getElementById(hideR).value='';
                    //document.getElementById(hideR).value=encStr;
                    //document.getElementById($(this).attr('id')).value='';
                }
            }
        }
    });
    /*set the gloable variable for ajax control*/
    if ($.isFunction(this.validatorobj.ajaxSubFuc)) {
        //window[functionName]("hello");
        this.validatorobj.ajaxSubFuc();
        return false
    }
    else
        return true;
}

function add_validation(itemname, descriptor, errstr)
{    
    var condition = null;
    if (arguments.length > 3)
    {
        condition = arguments[3];
    }
    if (!this.formobj)
    {
        alert("Error: The form object is not set properly");
        return;
    } //if

    
    //var itemobj = this.formobj[itemname];
    var itemobj = $('[name="'+itemname+'"]').get(0);
    //alert(itemobj)
//alert($(itemobj).length)
    //alert($('[name="'+itemname+'"]').length)
    //if (itemobj.length && isNaN(itemobj.selectedIndex))
    //for radio button; don't do for 'select' item
    //alert(itemobj.selectedIndex)
    //if ($('[name="'+itemname+'"]').length && isNaN(itemobj.selectedIndex))
    if (itemobj.length && isNaN(itemobj.selectedIndex))
    {
        itemobj = itemobj[0];        
    }
    //alert(itemobj)
    if (!itemobj)
    {
        alert("Error: Couldnot get the input object named: " + itemname);
        return;
    }
    if (true == this.validate_on_killfocus)
    {
        itemobj.onblur = handle_item_on_killfocus;
    }
    if (!itemobj.validationset)
    {
        itemobj.validationset = new ValidationSet(itemobj, this.show_errors_together);
    }
    itemobj.validationset.add(descriptor, errstr, condition);
    itemobj.validatorobj = this;
}

function handle_item_on_killfocus()
{
    if (this.validatorobj.focus_disable_validations == true)
    {
        /*  
        To avoid repeated looping message boxes
        */
        this.validatorobj.focus_disable_validations = false;
        return false;
    }

    if (null != this.validationset)
    {
        document.error_disp_handler.clear_msgs();
        if (false == this.validationset.validate())
        {
            document.error_disp_handler.FinalShowMsg();
            return false;
        }
    }
}

function validator_enable_OPED()
{
    document.error_disp_handler.EnableOnPageDisplay(false);
}

function validator_enable_OPED_SB()
{
    document.error_disp_handler.EnableOnPageDisplay(true);
}

function sfm_ErrorDisplayHandler()
{
    this.msgdisplay = new AlertMsgDisplayer();
    this.EnableOnPageDisplay = edh_EnableOnPageDisplay;
    this.ShowMsg = edh_ShowMsg;
    this.FinalShowMsg = edh_FinalShowMsg;
    this.all_msgs = new Array();
    this.clear_msgs = edh_clear_msgs;
}

function edh_clear_msgs()
{
    this.msgdisplay.clearmsg(this.all_msgs);
    this.all_msgs = new Array();
}

function edh_FinalShowMsg()
{
    if (this.all_msgs.length == 0)
    {
        return;
    }
    this.msgdisplay.showmsg(this.all_msgs);
}

function edh_EnableOnPageDisplay(single_box)
{
    if (true == single_box)
    {
        this.msgdisplay = new SingleBoxErrorDisplay();
    }
    else
    {
        this.msgdisplay = new DivMsgDisplayer();
    }
}

function edh_ShowMsg(msg, input_element)
{
    var objmsg = new Array();
    objmsg["input_element"] = input_element;
    objmsg["msg"] = msg;
    this.all_msgs.push(objmsg);
}

function AlertMsgDisplayer()
{
    this.showmsg = alert_showmsg;
    this.clearmsg = alert_clearmsg;
}

function alert_clearmsg(msgs)
{

}

function alert_showmsg(msgs)
{
    var whole_msg = "";
    var first_elmnt = null;
    for (var m = 0; m < msgs.length; m++)
    {
        if (null == first_elmnt)
        {
            first_elmnt = msgs[m]["input_element"];
        }
        whole_msg += msgs[m]["msg"] + "\n";
    }

    alert(whole_msg);

    if (null != first_elmnt)
    {
        sfm_set_focus(first_elmnt);
    }
}

function sfm_show_error_msg(msg, input_elmt)
{
    // console.log('Msg:' + msg) 
    // console.log('Ele:' + input_elmt) 
   // alert("caller is " + arguments.callee.caller.toString());
   document.error_disp_handler.ShowMsg(msg, input_elmt);
}

function SingleBoxErrorDisplay()
{
    this.showmsg = sb_div_showmsg;
    this.clearmsg = sb_div_clearmsg;
}

function sb_div_clearmsg(msgs)
{
    var divname = form_error_div_name(msgs);
    sfm_show_div_msg(divname, "");
}

function sb_div_showmsg(msgs)
{
 //   alert("hi")
 var whole_msg = "<ul>\n";
 for (var m = 0; m < msgs.length; m++)
 {
     whole_msg += "<li>" + msgs[m]["msg"] + "</li>\n";
 }
 whole_msg += "</ul>";
 var divname = form_error_div_name(msgs);
 var anc_name = divname + "_loc";
 whole_msg = "<a name='" + anc_name + "' >" + whole_msg;

 sfm_show_div_msg(divname, whole_msg);

 window.location.hash = anc_name;
}

function form_error_div_name(msgs)
{
   // alert("hi1")
   // alert("hello")
   var input_element = null;

   for (var m in msgs)
   {
       input_element = msgs[m]["input_element"];
       if (input_element)
       {
           break;
       }
   }

   var divname = "";
   if (input_element)
   {
       divname = input_element.form._sfm_form_name + "_errorloc";
   }
    //alert(divname);
    return divname;
}

function sfm_show_div_msg(divname,msgstring)
{
  //  alert("hi2")
  if(divname.length<=0) return false;

  if(document.layers)
  {
      divlayer = document.layers[divname];
      if(!divlayer){return;}
      divlayer.document.open();
      divlayer.document.write(msgstring);
      divlayer.document.close();
  }
  else
      if(document.all)
      {
          divlayer = document.all[divname];
          if(!divlayer){return;}
          divlayer.innerHTML=msgstring;
      }
      else
          if(document.getElementById)
          {
              divlayer = document.getElementById(divname);
              if(!divlayer){return;}
              divlayer.innerHTML =msgstring;
          }
          divlayer.style.visibility="visible";   
          return false;
      }

      function DivMsgDisplayer()
      {
          this.showmsg = div_showmsg;
          this.clearmsg = div_clearmsg;
      }

      function div_clearmsg(msgs)
      {
          for (var m in msgs)
          {        
              var divname = element_div_name(msgs[m]["input_element"]);        
              if(msgs[m]["input_element"].name.indexOf("[]")!=-1)
                  show_div_msg(msgs[m]["input_element"].name, "",msgs[m]["input_element"]);
              else
                  show_div_msg(divname, "",msgs[m]["input_element"]);
          }
      }

      function element_div_name(input_element)
      {

          var divname = input_element.form._sfm_form_name + "_" + input_element.name + "_errorloc";
          divname = divname.replace(/[\[\]]/gi, "");

          return divname;
      }

      function div_showmsg(msgs)
      {
   //alert("hi3")   
   var whole_msg;
   var first_elmnt = null;
   for (var m in msgs)
   {
        // alert(msgs[m]["msg"])
        if (null == first_elmnt)
        {
            first_elmnt = msgs[m]["input_element"];
        }
        var divname = element_div_name(msgs[m]["input_element"]);        
        
        if(msgs[m]["input_element"].name.indexOf("[]")!=-1)
            show_div_msg(msgs[m]["input_element"].name, msgs[m]["msg"],msgs[m]["input_element"]);
        else
            show_div_msg(divname, msgs[m]["msg"],msgs[m]["input_element"]);    
        
        //alert(divname+" "+msgs[m]["msg"]+" "+msgs[m]["input_element"].name)        
        
    }
    if (null != first_elmnt)
    {
        sfm_set_focus(first_elmnt);
    }
}

function show_div_msg(divname, msgstring,elemnt)
{

    // console.log("DivName:"+divname+" MsgString:"+msgstring+" EleName:"+elemnt.name+" FormName:"+elemnt.form._sfm_form_name);
    if (divname.length <= 0) return false;
    
    if(divname.indexOf("[]")==-1)
    {
        if(msgstring.length < 1)
        {
            msgstring = msgstring;
        }
        else
        {
            msgstring="<div class='alert alert-danger alert-dismissible cus_error'><span class='glyphicon glyphicon-remove-circle'></span><span class='close' data-dismiss='alert' aria-label='close'>&times;</span> "+msgstring+" </div>";    
        }
        
        if (document.layers)
        {
            divlayer = document.layers[divname];
            if (!divlayer)
            {
                return;
            }
            divlayer.document.open();
            divlayer.document.write(msgstring);
            divlayer.document.close();
        }
        else if (document.all)
        {
            divlayer = document.all[divname];
            if (!divlayer)
            {
                return;
            }
            divlayer.innerHTML = msgstring;
        }
        else if (document.getElementById)
        {
            divlayer = document.getElementById(divname);
            if (!divlayer)
            {
                return;
            }
            divlayer.innerHTML = msgstring;
        }
        divlayer.style.visibility = "visible";
        divlayer.style.display = "block";
    }
    else //case of chk[]
    {
        if(msgstring.length < 1){
            msgstring = msgstring;
        }
        else{
            msgstring="<div class='alert alert-danger alert-dismissible cus_error'><span class='glyphicon glyphicon-remove-circle'></span><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> "+msgstring+" </div>";    
        }
        
        //alert(elemnt.form._sfm_form_name+"_"+divname+"_errorloc")
        document.getElementById(elemnt.form._sfm_form_name+"_"+divname+"_errorloc").innerHTML=msgstring;
        document.getElementById(elemnt.form._sfm_form_name+"_"+divname+"_errorloc").style.display="block";
    }
    
}



function show_div_msgAdd(elementID, msgstring)
{

    var divname=elementID+"_addErr";
    //if(document.getElementById(divname)==null)
      //  $('#'+elementID).after("<div id="+divname+" class='error_strings'>Invalid value</div>");

      msgstring=" "+msgstring+" ";
      if (document.layers)
      {
          divlayer = document.layers[divname];
          if (!divlayer)
          {
              return;
          }
          divlayer.document.open();
          divlayer.document.write(msgstring);
          divlayer.document.close();
      }
      else if (document.all)
      {
          divlayer = document.all[divname];
          if (!divlayer)
          {
              return;
          }
          divlayer.innerHTML = msgstring;
      }
      else if (document.getElementById)
      {
          divlayer = document.getElementById(divname);
          if (!divlayer)
          {
              return;
          }
          divlayer.innerHTML = msgstring;
      }
      divlayer.style.visibility = "visible";
  }

  function ValidationDesc(inputitem, desc, error, condition)
  {
      this.desc = desc;
      this.error = error;
      this.itemobj = inputitem;
      this.condition = condition;
      this.validate = vdesc_validate;
  }

  function vdesc_validate()
  {
      if (this.condition != null)
      {
          if (!eval(this.condition))
          {
              return true;
          }
      }
    //console.log(this.itemobj.validatorobj.nonASCII)    
    if (!validateInput(this.desc, this.itemobj, this.error, this.itemobj.validatorobj.nonASCII))
    {
        this.itemobj.validatorobj.focus_disable_validations = true;
        sfm_set_focus(this.itemobj);        
        return false;
    }
    else{        
        return true;        
    }            
    
}

function ValidationSet(inputitem, msgs_together)
{
    this.vSet = new Array();
    this.add = add_validationdesc;
    this.validate = vset_validate;
    this.itemobj = inputitem;
    this.msgs_together = msgs_together;
}

function add_validationdesc(desc, error, condition)
{
    this.vSet[this.vSet.length] =
    new ValidationDesc(this.itemobj, desc, error, condition);
}

function vset_validate()
{
    var bRet = true;
    for (var itr = 0; itr < this.vSet.length; itr++)
    {
        bRet = bRet && this.vSet[itr].validate();
        if (!bRet && !this.msgs_together)
        {
            break;
        }
    }
    return bRet;
}

/*  checks the validity of an email address entered 
*   returns true or false 
*/
function validateEmail(email)
{
    var splitted = email.match("^(.+)@(.+)$");
    if (splitted == null) return false;
    if (splitted[1] != null)
    {
        var regexp_user = /^\"?[\w-_\.]*\"?$/;
        if (splitted[1].match(regexp_user) == null) return false;
    }
    if (splitted[2] != null)
    {
        var regexp_domain = /^[\w-\.]*\.[A-Za-z]{2,4}$/;
        if (splitted[2].match(regexp_domain) == null)
        {
            var regexp_ip = /^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
            if (splitted[2].match(regexp_ip) == null) return false;
        } // if
        return true;
    }
    return false;
}



function TestComparison(objValue, strCompareElement, strvalidator, strError)
{
    var bRet = true;
    var objCompare = null;
    if (!objValue.form)
    {
        sfm_show_error_msg("Error: No Form object!", objValue);
        return false
    }
    objCompare = objValue.form.elements[strCompareElement];
    if (!objCompare)
    {
        sfm_show_error_msg("Error: Element with name" + strCompareElement + " not found !", objValue);
        return false;
    }

    var objval_value = objValue.value;
    var objcomp_value = objCompare.value;

    if (strvalidator != "eqelmnt" && strvalidator != "neelmnt")
    {
        objval_value = objval_value.replace(/\,/g, "");
        objcomp_value = objcomp_value.replace(/\,/g, "");

        if (isNaN(objval_value))
        {
            sfm_show_error_msg(objValue.name + ": Should be a number ", objValue);
            return false;
        } //if 
        if (isNaN(objcomp_value))
        {
            sfm_show_error_msg(objCompare.name + ": Should be a number ", objCompare);
            return false;
        } //if    
    } //if
    var cmpstr = "";
    switch (strvalidator)
    {
        case "eqelmnt":
        {
            if (objval_value != objcomp_value)
            {
                cmpstr = " should be equal to ";
                bRet = false;
            } //if
            break;
        } //case
        case "ltelmnt":
        {
            if (eval(objval_value) >= eval(objcomp_value))
            {
                cmpstr = " should be less than ";
                bRet = false;
            }
            break;
        } //case
        case "leelmnt":
        {
            if (eval(objval_value) > eval(objcomp_value))
            {
                cmpstr = " should be less than or equal to";
                bRet = false;
            }
            break;
        } //case     
        case "gtelmnt":
        {
            if (eval(objval_value) <= eval(objcomp_value))
            {
                cmpstr = " should be greater than";
                bRet = false;
            }
            break;
        } //case
        case "geelmnt":
        {
            if (eval(objval_value) < eval(objcomp_value))
            {
                cmpstr = " should be greater than or equal to";
                bRet = false;
            }
            break;
        } //case
        case "neelmnt":
        {
            if (objval_value.length > 0 && objcomp_value.length > 0 && objval_value == objcomp_value)
            {
                cmpstr = " should be different from ";
                bRet = false;
            } //if
            break;
        }
    } //switch
    if (bRet == false)
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + cmpstr + objCompare.name;
        } //if
        sfm_show_error_msg(strError, objValue);
    } //if
    return bRet;
}

function TestSelMin(objValue, strMinSel, strError)
{
    var bret = true;
    //var objcheck = objValue.form.elements[objValue.name];
    var objcheck = document.getElementsByName(objValue.name);
    var chkcount = 0;
    //alert(objcheck.length)
    if (objcheck.length)
    {
        for (var c = 0; c < objcheck.length; c++)
        {            
            if (objcheck[c].checked == "1")
            {                
                chkcount++;
            } //if
        } //for
    }
    else
    {
        chkcount = (objcheck.checked == "1") ? 1 : 0;
    }
    
    var minsel = eval(strMinSel);
    if (chkcount < minsel)
    {

        if (!strError || strError.length == 0)
        {
            strError = "Please Select atleast" + minsel + " check boxes for" + objValue.name;
        } //if

        sfm_show_error_msg(strError, objValue);
        bret = false;
    }    
    return bret;
}

function TestSelMax(objValue, strMaxSel, strError)
{
    var bret = true;
   // var objcheck = objValue.form.elements[objValue.name];
   var objcheck = document.getElementsByName(objValue.name);
   var chkcount = 0;
   if (objcheck.length)
   {
       for (var c = 0; c < objcheck.length; c++)
       {
           if (objcheck[c].checked == "1")
           {
               chkcount++;
            } //if
        } //for
    }
    else
    {
        chkcount = (objcheck.checked == "1") ? 1 : 0;
    }
    var maxsel = eval(strMaxSel);
    if (chkcount > maxsel)
    {
        if (!strError || strError.length == 0)
        {
            strError = "Please Select atmost " + maxsel + " check boxes for" + objValue.name;
        } //if                                                               
        sfm_show_error_msg(strError, objValue);
        bret = false;
    }
    return bret;
}

function IsCheckSelected(objValue, chkValue)
{
    var selected = false;
   // var objcheck = objValue.form.elements[objValue.name];
   var objcheck = document.getElementsByName(objValue.name);
   if (objcheck.length)
   {
       var idxchk = -1;
       for (var c = 0; c < objcheck.length; c++)
       {
           if (objcheck[c].value == chkValue)
           {
               idxchk = c;
               break;
            } //if
        } //for
        if (idxchk >= 0)
        {
            if (objcheck[idxchk].checked == "1")
            {
                selected = true;
            }
        } //if
    }
    else
    {
        if (objValue.checked == "1")
        {
            selected = true;
        } //if
    } //else  
    return selected;
}

function TestDontSelectChk(objValue, chkValue, strError)
{
    var pass = true;
    pass = IsCheckSelected(objValue, chkValue) ? false : true;

    if (pass == false)
    {
        if (!strError || strError.length == 0)
        {
            strError = "Can't Proceed as you selected " + objValue.name;
        } //if          
        sfm_show_error_msg(strError, objValue);

    }
    return pass;
}

function TestShouldSelectChk(objValue, chkValue, strError)
{
    var pass = true;

    pass = IsCheckSelected(objValue, chkValue) ? true : false;

    if (pass == false)
    {
        if (!strError || strError.length == 0)
        {
            strError = "You should select" + objValue.name;
        } //if          
        sfm_show_error_msg(strError, objValue);

    }
    return pass;
}

function TestRequiredInput(objValue, strError)
{
    //alert(objValue.name);
    //alert(objValue.value);
    var ret = true;
    if (VWZ_IsEmpty(objValue.value))
    {
        ret = false;
    } //if 
    else if (objValue.getcal && !objValue.getcal())
    {
        ret = false;
    }

    if (!ret)
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + " : Required Field";
        } //if 
        sfm_show_error_msg(strError, objValue);
    }
    return ret;
}



function TestFileExtension(objValue, cmdvalue, strError)
{
    var ret = false;
    var found = false;
    if (objValue.value.length <= 0)
    { 
        return true;
    }


    var pattern =  /\\/;
    var filesplit =  objValue.value.split(pattern);     
    var fileName  = (filesplit[filesplit.length-1]);

    var pattern = /^[a-zA-Z0-9]+\.[a-z0-9]{3,4}$/i;
    if (!(pattern.test(fileName))==false){
        var ext =  objValue.value.substring(objValue.value.lastIndexOf('.')+1, objValue.value.length);
        ext = ext.toLowerCase();
     // console.log(ext);
     var extns = cmdvalue.split(";");
     for (var i = 0; i < extns.length; i++){
         if (ext == extns[i].toLowerCase()){
             found = true;
             break;
         }
     }
 }

 if (!found)
 {
     if (!strError || strError.length == 0)
     {
         strError = objValue.name + " allowed file extensions are: " + cmdvalue;
     }
     sfm_show_error_msg(strError, objValue);        
 }
 else
 {
     ret = true;
 }
 return ret;
}

function TestMaxLen(objValue, strMaxLen, strError)
{
    var ret = true;
    var dLength = 0;
    if(objValue.type=='file')
        dLength = eval(Math.round(objValue.files[0].size/1024));
    else
        dLength = eval(objValue.value.length)

    if (eval(dLength) > eval(strMaxLen))
    {
        if (!strError || strError.length == 0)
        {
            if(objValue.type=='file')
                strError = objValue.name + " : " + strMaxLen + " size maximum ";
            else
                strError = objValue.name + " : " + strMaxLen + " characters maximum ";
        } //if 
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if 
    return ret;
}

function TestMinLen(objValue, strMinLen, strError)
{
    // console.warn(eval(objValue.value.length) + '::' + strMinLen)
    var ret = true;
    var dLength = 0;
    if(objValue.type=='file')
        dLength = eval(Math.round(objValue.files[0].size/1024));
    else
        dLength = eval(objValue.value.length)

    if (dLength < eval(strMinLen))
    {
        if (!strError || strError.length == 0)
        {
            if(objValue.type=='file')
                strError = objValue.name + " : " + strMinLen + " size minimum  ";
            else
                strError = objValue.name + " : " + strMinLen + " characters minimum  ";
        } //if               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if 
    return ret;
}

function TestInputType(objValue, strRegExp, strError, strDefaultError)
{
    var ret = true;
    if(in_array('rtf',($('#'+objValue.id).data('validate')).split("|"),false)==false){
        var charpos = objValue.value.search(strRegExp);
        if (objValue.value.length > 0 && charpos >= 0)
        {
            if (!strError || strError.length == 0)
            {
                strError = strDefaultError;
        } //if 
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if 
}
return ret;
}

function TestEmail(objValue, strError)
{
    var ret = true;
    if (objValue.value.length > 0 && !validateEmail(objValue.value))
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + ": Enter a valid Email address ";
        } //if                                               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if 
    return ret;
}


function TestURL(objValue, strError) {
    var ret = true;
    var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    if (objValue.value.length > 0 && !pattern.test(objValue.value)) {
        if (!strError || strError.length == 0) {
            strError = objValue.name + ": Enter a valid URL ";
        } //if                                               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if
    return ret;
}


function TestLessThan(objValue, strLessThan, strError)
{
    var ret = true;
    var obj_value = objValue.value.replace(/\,/g, "");
    strLessThan = strLessThan.replace(/\,/g, "");

    if (isNaN(obj_value))
    {
        sfm_show_error_msg(objValue.name + ": Should be a number ", objValue);
        ret = false;
    } //if 
    else if (eval(obj_value) >= eval(strLessThan))
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + " : value should be less than " + strLessThan;
        } //if               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if   
    return ret;
}

function TestGreaterThan(objValue, strGreaterThan, strError)
{
    var ret = true;
    var obj_value = objValue.value.replace(/\,/g, "");
    strGreaterThan = strGreaterThan.replace(/\,/g, "");

    if (isNaN(obj_value))
    {
        sfm_show_error_msg(objValue.name + ": Should be a number ", objValue);
        ret = false;
    } //if 
    else if (eval(obj_value) <= eval(strGreaterThan))
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + " : value should be greater than " + strGreaterThan;
        } //if               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if  
    return ret;
}

function TestRegExp(objValue, strRegExp, strError)
{
    var ret = true;
    if (objValue.value.length > 0 && !objValue.value.match(strRegExp))
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + ": Invalid characters found ";
        } //if                                                               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if 
    return ret;
}

function TestDontSelect(objValue, dont_sel_value, strError)
{    
    var ret = true;
    if (objValue.value == null)
    {
        sfm_show_error_msg("Error: dontselect command for non-select Item", objValue);
        ret = false;
    }
    else if (objValue.value == dont_sel_value)
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + ": Please Select one option ";
        } //if                                                               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    }
    return ret;
}

function TestSelectOneRadio(objValue, strError)
{
    var objradio = objValue.form.elements[objValue.name];
    var one_selected = false;
    for (var r = 0; r < objradio.length; r++)
    {
        if (objradio[r].checked == "1")
        {
            one_selected = true;
            break;
        }
    }
    if (false == one_selected)
    {
        if (!strError || strError.length == 0)
        {
            strError = "Please select one option from " + objValue.name;
        }
        sfm_show_error_msg(strError, objValue);
    }
    return one_selected;
}

function TestSelectRadio(objValue, cmdvalue, strError, testselect)
{
    var objradio = objValue.form.elements[objValue.name];
    var selected = false;

    for (var r = 0; r < objradio.length; r++)
    {
        if (objradio[r].value == cmdvalue && objradio[r].checked == "1")
        {
            selected = true;
            break;
        }
    }
    if (testselect == true && false == selected || testselect == false && true == selected)
    {
        sfm_show_error_msg(strError, objValue);
        return false;
    }
    return true;
}



function nonASCIICarc(str){

    var filter=/[^\x00-\x7F]+/;
    if(str.match(filter)){
        return true;
        //console.log('true')
    }
    else{
        return false;
        //console.log('false')
    }   
}


//*  Checks each field in a form 

function countOcurrences(str, value){
    var regExp = new RegExp(value, "gi");
    return str.match(regExp) ? str.match(regExp).length : 0;  
}

function ValidatePass(objValue, strError)
{
    var ret = true;
    var pattern = /^(?=(?:.*[A-Z]){2,})(?=(?:.*[a-z]){2,})(?=(?:.*\d){2,})(?=(?:.*[!@#$%^&*()\-_=+{};:,<.>]){2,})(?!.*(.)\1{2})([A-Za-z0-9!@#$%^&*()\-_=+{};:,<.>]{8,20})$/;
    // if (objValue.value.match(pattern) == null) return false;
    
    if (objValue.value.length > 0 && !pattern.test(objValue.value))
    {
        if (!strError || strError.length == 0)
        {
            strError = objValue.name + ": Please Enter New Password with atleast 8 characters. Password should contain 2 Special, 2 Upper Case, 2 Lower Case Aplhabets and 2 Numeric Values !";
        } //if                                               
        sfm_show_error_msg(strError, objValue);
        ret = false;
    } //if 
    return ret;
}

function validateInput(strValidateStr, objValue, strError, nonASCII)
{
    //alert("im");
    var ret = true;
    var fldReqChk ="";
    var reqFactr=false;
    var epos = strValidateStr.search("=");
    var command = "";
    var cmdvalue = "";
    if (epos >= 0)
    {
        command = strValidateStr.substring(0, epos);
        cmdvalue = strValidateStr.substr(epos + 1);
    }
    else
    {
        command = strValidateStr;
    }

    if($(objValue).attr('type')=='radio' || $(objValue).attr('type')=='checkbox')
    {

        for (var ki = document.forms[objValue.form.name].elements[objValue.name].length-1; ki > 0; ki--) {
            if(fldReqChk==""){
                fldReqChk = $(document.forms[objValue.form.name].elements[objValue.name][ki]).data('validate');
                break;
            }
        }
    }
    else
    {
        fldReqChk = $(objValue).data('validate');
    }
    //alert(fldReqChk[1]+" "+$(objValue).attr('type')+" "+$(objValue).data('validate'));
    if (in_array('y', (fldReqChk.split("|")), false) == true || in_array('y', (fldReqChk.split("|")), false) == true)
        reqFactr=true;


  //  alert("gege");

  switch (command)
  {
      case "req":
      case "required":
      {
            //if (in_array('rtf', (fldReqChk.split("|")), false) == false)
            //{
                //alert("he" + objValue.id +fldReqChk);
                ret = TestRequiredInput(objValue, strError)
                break;
            //}
            

        }
        case "rtf":
        {
            if(reqFactr==true){
                //var rtfData=eval('CKEDITOR.instances.'+objValue.id+'.getData()');
                var rtfData=tinymce.get(objValue.id).getContent();
                var chk=true;
                if(rtfData.length>0){
                    //var DISALLOWED_TAGS = ["html", "head", "title", "link", "body"];
                    var DISALLOWED_TAGS = ["!DOCTYPE html","html", "head", "title", "link", "body"];
                    for(ai=0;ai<=DISALLOWED_TAGS.length-1;ai++)
                    {
                        var re= new RegExp('<'+DISALLOWED_TAGS[ai]+'[^><]*>|<.'+DISALLOWED_TAGS[ai]+'[^><]*>','g')
                        rtfData = $.trim(rtfData.replace(re,''));
                    }
                    rtfData=rtfData.replace(/&nbsp;/g,"");
                   // alert(rtfData.length+"  "+rtfData+"  "+ (parseInt(fldReqChk.split("|")[4]) +100));
                   if(parseInt(rtfData.length)<parseInt(fldReqChk.split("|")[3]) || $.trim(rtfData)=="" || parseInt(rtfData.length)>(parseInt(fldReqChk.split("|")[4]) +100)){
                       if($.trim(rtfData)=="" && parseInt(rtfData.length)<(parseInt(fldReqChk.split("|")[4]) +100)){
                           sfm_show_error_msg(strError, objValue);
                       }
                       else{
                           sfm_show_error_msg("Data Length Cannot Exceed "+fldReqChk.split("|")[4]+" Chars.", objValue);
                       }
                      //  alert("chk")
                      ret = false;
                      break;
                  }

              }
              else{
                     //alert("chk1")
                     sfm_show_error_msg(strError, objValue);
                     ret = false;
                     break;
                 }
             }

         }    
         case "maxlength":
         case "maxlen":
         {
             if(objValue.value.length>0 && in_array('rtf', (fldReqChk.split("|")), false) == false){
                 ret = TestMaxLen(objValue, cmdvalue, strError)
                 break;
             }
         }
         case "minlength":
         case "minlen":
         {
             if(objValue.value.length>0 && in_array('rtf', (fldReqChk.split("|")), false) == false){
                 ret = TestMinLen(objValue, cmdvalue, strError)
                 break;
             }
         }
         case "alnum":
         case "alphanumeric":
         {
             if(objValue.value.length>0){
                 ret = TestInputType(objValue, "[^A-Za-z0-9\\r\n]", strError, objValue.name + ": Only alpha-numeric characters allowed ");
                 break;
             }
         }
         case "alnum_s":
         case "alphanumeric_space":
         {
             if(objValue.value.length>0){
                 ret = TestInputType(objValue, "[^A-Za-z0-9\\s\r\n\/]", strError, objValue.name + ": Only alpha-numeric characters and space allowed ");
                 break;
             }
         }
         case "alnum_spc":
         case "alphanumeric_spc":
         {
         //   /^[a-zA-Z_0-9@\!#\$\^%&*()+=\-[]\\\';,\.\/\{\}\|\":<>\? ]+$/;
         if(objValue.value.length>0){
             var filter=/^[a-zA-Z0-9 \r\n!#@%&_+\-=\[\];:\\|,.\/?]*$/;
             if(!objValue.value.match(filter)){
                    //console.log('aaaaa'+nonASCII)
                    if(nonASCII){
                        //console.log(nonASCIICarc(objValue.value));
                        if(nonASCIICarc(objValue.value)==true){                            
                            break;
                        }
                    }
                    sfm_show_error_msg("Spl Characters like '~ ` $ ^ * ( ) { } < >' are not allowed!", objValue);
                    ret = false;
                  //  break;

              }
          }
          break;



      }
      case "alnum_spcA":
      case "alphanumeric_spcA":
      {         
          if(objValue.value.length>0){
              var filter=/^[a-zA-Z0-9 \r\n!#@%&_+\-=\[\];:\\|,.\'\"\/?()]*$/;
              if(!objValue.value.match(filter)){
                  if(!objValue.value.match(filter)){
                        //console.log('aaaaa'+nonASCII)
                        if(nonASCII){
                            //console.log(nonASCIICarc(objValue.value));
                            if(nonASCIICarc(objValue.value)==true){                            
                                break;
                            }
                        }
                        sfm_show_error_msg("Spl Characters like '~ $ ^ * { } < >' are not allowed!", objValue);
                        ret = false;
                    }
                }
            }
            break;
            

            
        }    
        case "num":
        case "numeric":
        {
            if (objValue.value.length > 0 && !objValue.value.match(/^[\-\+]?[\d\,]*\.?[\d]*$/))
            {
                sfm_show_error_msg(strError, objValue);
                ret = false;
            } //if 
            break;
        }
        case "dec":
        case "decimal":
        {

            if (objValue.value.length > 0 && !objValue.value.match(/^[\-\+]?[\d\,]*\.?[\d]*$/)) {
                sfm_show_error_msg(strError, objValue);
                ret = false;
                break;
            }
            if (isNaN(objValue.value) == true) //if
            {
                sfm_show_error_msg("Only Numbers with 1 Decimal/Dot is allowed", objValue);
                ret = false;
                break;
            }
            var decPos = (objValue.value.split(".").length - 1);
            if (decPos > 0) {

                var nosDec = (objValue.value.split(".").length - 1);
                if (nosDec != 1) {
                    //alert("i m here 4")
                    sfm_show_error_msg("Only Numbers with 1 Decimal/Dot is allowed", objValue);
                    ret = false;
                }
                var parts = objValue.value.split('.');
                if (parts[1].length > cmdvalue) {
                    sfm_show_error_msg("Only " + cmdvalue + " digits are allowed after Decimal Point", objValue);
                    ret = false;
                    break;
                }


                if (parts[0].length == 0)
                    objValue.value = "0." + parts[1];

            }
            else {
                if (objValue.value.length > 0)
                    objValue.value = parseFloat(objValue.value).toFixed(cmdvalue);

            }
            break;
        }    
        case "alphabetic":
        case "alpha":
        {
            if(objValue.value.length>0){
                ret = TestInputType(objValue, "[^A-Za-z]", strError, objValue.name + ": Only alphabetic characters allowed ");
                break;
            }
        }
        case "alphabetic_space":
        case "alpha_s":
        {
            if(objValue.value.length>0){
                ret = TestInputType(objValue, "[^A-Za-z\\s]", strError, objValue.name + ": Only alphabetic characters and space allowed ");
                break;
            }
        }
        case "url":
        {
            if(objValue.value.length>0){
                ret = TestURL(objValue, strError);
                break;
            }
        }    
        case "email":
        {
            if(objValue.value.length>0){
                ret = TestEmail(objValue, strError);
                break;
            }
        }
        case "lt":
        case "lessthan":
        {
            ret = TestLessThan(objValue, cmdvalue, strError);
            break;
        }
        case "gt":
        case "greaterthan":
        {
            ret = TestGreaterThan(objValue, cmdvalue, strError);
            break;
        }
        case "regexp":
        {
            ret = TestRegExp(objValue, cmdvalue, strError);
            break;
        }
        case "dt":
        {
            //if(reqFactr==true){
                if (objValue.value.length > 0 && !objValue.value.match(/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/))
                {
                    sfm_show_error_msg(strError, objValue);
                    ret = false;
                } //if 
                break;
            //} 
        }
        case "dtltr":
        {
            //alert(cmdvalue)
            if(objValue.value.length>0 && cmdvalue!=="")
            {
                //alert(objValue)
                //alert("obj:"+objValue.value+" comp:"+document.getElementById(cmdvalue).value);
                if(CompareDates(objValue.value,document.getElementById(cmdvalue).value)==false)
                {
                    sfm_show_error_msg(strError, objValue);
                    ret = false;
                } //if 
                break;
            }
            
        }
        case "dtgtr":
        {
            //alert(cmdvalue)
            if(objValue.value.length>0 && cmdvalue!=="")
            {
               // alert(objValue)
                //alert("obj:"+objValue.value+" comp:"+document.getElementById(cmdvalue).value);
                if(CompareDates(document.getElementById(cmdvalue).value,objValue.value)==false)
                {
                    sfm_show_error_msg(strError, objValue);
                    ret = false;
                } //if 
                break;
            }

        }
        case "ti":
        case "time":
        {
            if(objValue.value.length>0 && !objValue.value.match(/^(2[0-3]|[01]?[0-9]):([0-5]?[0-9])$/)){
                sfm_show_error_msg(strError, objValue);
                ret = false;
                break;            
            }

        }        
        case "dontselect":
        {
            if(reqFactr==true)
            {
                ret = TestDontSelect(objValue, cmdvalue, strError)
                break;
            }
            
        }
        case "dontselectchk":
        {
            ret = TestDontSelectChk(objValue, cmdvalue, strError)
            break;
        }
        case "shouldselchk":
        {
            if(reqFactr==true){
                ret = TestShouldSelectChk(objValue, cmdvalue, strError)
                break;
            }
        }
        case "selmin":
        {
            if(reqFactr==true){
                ret = TestSelMin(objValue, cmdvalue, strError);                                
                break;
            } 
        }
        case "selmax":
        {
            ret = TestSelMax(objValue, cmdvalue, strError);
            break;
        }
        case "selone_radio":
        case "selone":
        {
            if(reqFactr==true){
                ret = TestSelectOneRadio(objValue, strError);
                break;
            }
        }
        case "dontselectradio":
        {
            ret = TestSelectRadio(objValue, cmdvalue, strError, false);
            break;
        }
        case "selectradio":
        {
            ret = TestSelectRadio(objValue, cmdvalue, strError, true);
            break;
        }
        //Comparisons
        case "eqelmnt":
        case "ltelmnt":
        case "leelmnt":
        case "gtelmnt":
        case "geelmnt":
        case "neelmnt":
        {
            return TestComparison(objValue, cmdvalue, command, strError);
            break;
        }
        case "passpolicy":
        case "pp":
        {
            ret = ValidatePass(objValue, strError);
            break;
        }
        case "req_file":
        {
            ret = TestRequiredInput(objValue, strError);
            break;
        }
        case "file_extn":
        {
            ret = TestFileExtension(objValue, cmdvalue, strError);
            break;
        }

    } //switch 
    
    console.log(strValidateStr+" "+objValue.name+" "+ret)
    return ret;
}

function VWZ_IsListItemSelected(listname, value)
{
    for (var i = 0; i < listname.options.length; i++)
    {
        if (listname.options[i].selected == true && listname.options[i].value == value)
        {
            return true;
        }
    }
    return false;
}

function VWZ_IsChecked(objcheck, value)
{
    if (objcheck.length)
    {
        for (var c = 0; c < objcheck.length; c++)
        {
            if (objcheck[c].checked == "1" && objcheck[c].value == value)
            {
                return true;
            }
        }
    }
    else
    {
        if (objcheck.checked == "1")
        {
            return true;
        }
    }
    return false;
}

function sfm_str_trim(strIn)
{
    return strIn.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}

function VWZ_IsEmpty(value)
{
    value = sfm_str_trim(value);
    return (value.length) == 0 ? true : false;
}
/*
	Copyright (C) 2003-2011 JavaScript-Coder.com . All rights reserved.
*/