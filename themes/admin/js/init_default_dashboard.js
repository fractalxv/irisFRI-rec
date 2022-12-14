//fungsi global yang ada di index.php
$(function() {
	$( window ).resize(function() {
			ToggleDisplayMenu();
		});
});

$(document).ready(function() {
	$(document).on("click",".shorten",function() {
		var temp = "";
		if($(this).html()=="more") { //open it			
			temp = $(this).siblings(".Dtext").html();			
			$(this).siblings(".Dtext").html($(this).attr("swap"));
			$(this).attr("swap",temp);			
			$(this).html("less");
			$(this).attr("title","click to see less");
		}
		else { //close it
			temp = $(this).siblings(".Dtext").html();
			$(this).siblings(".Dtext").html($(this).attr("swap"));
			$(this).attr("swap",temp);
			$(this).html("more");
			$(this).attr("title","click to see more");
		}
	});
});

function seeMore(string, length) {
	if(string.length>length) {
		return "<span class='Dtext'>"+string.substring(0,length)+"</span> <span class='shorten' title='click to see more' style='cursor:pointer;color:blue;' swap='"+string+"'>more</span>";
	}
	else {
		return string;
	}
}

function Terbilang(x) {
	var x = Math.abs(x);
	var angka = new Array("", "satu", "dua", "tiga", "empat", "lima",
		"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	
	var temp = "";
	x=Math.floor(x);
	if (x <12)
		temp = " "+ angka[x];
	else if (x <20)
		temp = Terbilang(x - 10)+ " belas";
	else if (x <100)
		temp = Terbilang(x / 10)+" puluh"+ Terbilang(x % 10);
	else if (x <200)
		temp = " seratus" + Terbilang(x - 100);
	else if (x <1000)
		temp = Terbilang(x / 100) + " ratus" + Terbilang(x % 100);
	else if (x <2000)
		temp = " seribu" + Terbilang(x - 1000);
	else if (x <1000000)
		temp = Terbilang(x / 1000) + " ribu" + Terbilang(x % 1000);
	else if (x <1000000000)
		temp = Terbilang(x / 1000000) + " juta" + Terbilang(x % 1000000);
	
	return temp;
}

function convertToCurrencyDisplayFormat(str)
{
		var regex = /(-?[0-9]+)([0-9]{3})/;
			str += '';
			while (regex.test(str)) {
				str = str.replace(regex, '$1.$2');
			}
			str += '';
			return str;
			
}

function stripNonNumeric(str) {
			str += '';
			str = str.replace(/[^0-9]/g, '');
			return str;
};
			
$(function(){
	//penanganan event pada dropdown list user grup
	/*$("#switchUserGroup").change(function(){
		$.ajax({
			type:"post",
			dataType:"html",
			url:libraryAjaxUrl+"ajax.util.php?act=switch_user_group",
			data:{ "id" : $(this).val() },
			success:function(data){
				self.location.href = currentUrl;
			},
			failed:function(){	
			}
		});	
		return false;
	});
	//penanganan event pada dropdown semester yang aktif
	$("#switchSemester").change(function(){
		$.ajax({
			type:"post",
			dataType:"html",
			url:libraryAjaxUrl+"ajax.util.php?act=switch_semester",
			data:{ "id" : $(this).val() },
			success:function(data){
				self.location.href = currentUrl;
			},
			failed:function(){	
			}
		});	
	}); */
	
	
	
	 

	//penanganan event pada aksi pengubahan bahasa yang aktif
	$(".switch_language").click(function(){
		$(".switchLanguageSpan").html("Loading...");
		$.ajax({
			type:"post",
			dataType:"html",
			url:libraryAjaxUrl+"ajax.util.php?act=switch_language",
			data:{ "id" : $(this).attr('rel') },
			success:function(data){
				self.location.href = currentUrl;
			},
			failed:function(){	
				$(".switchLanguageSpan").html("Failed.");
			}
		});			
	});
});
var cDialog,dialogObject,dialogObjectConfirmation;
$(document).ready(function(){
	var arr = window.location.toString().split("://");
	if(arr[0].toLowerCase()=='https') {
		currentUrl = "https://"+arr[1];
	}
	$(".message").delay(4000).fadeOut(1000); // animasi pada notifikasi pesan yang tampil
	$(".generatedMessage").delay(4000).fadeOut(1000); // animasi pada notifikasi pesan yang tampil
	$(".confirmDiv").css('width','500px');
	cDialog=$(".confirmDiv").clone(); 
	
	cDialog.attr('class','messageDiv');
	$('body').append(cDialog);	
	$(".focusInfo").each(function(index){
		$(this).val($(this).attr('defaultValue'));
	});
	$(".focusInfo").bind('focus',function(){
		if($(this).val()!=""){
			$(this).val("");
		}
	});
	$(".focusInfo").bind('blur',function(){
		if($(this).val()==""){
			$(this).val($(this).attr('defaultValue'));
		}
	});
	$('.clearDiv a').click(function() {
	   var elementClicked = $(this).attr("href");
	   //var destination = $(elementClicked).offset().top;
	   $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0}, 1200 );
	   return false;
	});
	$('.backtotop_link').click(function() {
	   var elementClicked = $("body");
	   var destination = $(elementClicked).offset().top;
	   $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 1500 );
	   return false;
	});
	
	ToggleDisplayMenu();
	//$('#pagenav').css('height','auto');
	
});

function ToggleDisplayMenu(){
	return false;
	$('#additional_menu').remove();
	var idxPos=1000;
	var widthTotal=170;
	$('#dashboardMenu').nextAll().each(function(idx, elmt){
		widthTotal += $(elmt).outerWidth();
		if(widthTotal>$(document).width()&&idx<idxPos){
			
			idxPos = idx;
			
		}
		
	});
	if(idxPos!=1000){		
		 $('<li class="page_item" id="additional_menu"><a title="Show Menu" onclick="return toggleMenu(this);" href="<?=base_url()?>themes/login/#" target="">Show >></a></li>').insertAfter($('#pagenav ul').children(':eq('+(idxPos)+')'));
			$('#additional_menu').nextAll().hide();
	}else{
		$('#pagenav ul').children().show();
	}
}
function toggleMenu(elm) {
		$.ajax({
			url:javaScriptUrl+"ui/jquery.effects.core.min.js",
			dataType:"script",
			cache:true,
			async:false,
			type:"get"		
		});
		$.ajax({
			url:javaScriptUrl+"ui/jquery.effects.blind.min.js",
			dataType:"script",
			cache:true,
			async:false,
			type:"get"		
		});
		if($(elm).text()=="Show >>"){
			$(elm).html("<< Show");
		}else{
			$(elm).html("Show >>");
		}
	   $(elm).parent().prevAll(":not(#dashboardMenu,#notification,#settings_button,#logout_button,#user_account)").toggle("blind", { direction: "horizontal" }, 500);
	   $(elm).parent().nextAll().toggle("blind", { direction: "horizontal" }, 500);
	   return false;
	}
//fungsi untuk menampilkan pesan notifkasi dalam bentuk dialog UI
function ShowNotification(msg, msgType){
	var imageType = "information.png";
	switch(msgType.toLowerCase()){
		case "information":
			break;
		case "error":
			imageType = "error.png";
			break;
		case "failed":
			imageType = "error.png";
			break;
		case "warning":
			imageType = "warning.png";
			break;
		case "help":
			imageType = "help.png";
			break;
		case "success":
			imageType = "success.png";
			break;
	}
	var stringDiv = $("<div><div style='float:left;width:120px;vertical-align:middle' align='center' class='img_notification'><img src='"+imageUrl+"notification/"+imageType+"' widht='90px' height='90px'/></div>  <div>"+msg+"</div></div");
	ShowMessage(stringDiv);
}

function ShowMessage(msg,timeOut){	
	if(dialogObject==null){
		loadDialogScript();
		dialogObject=cDialog.dialog({
			title:"Message",
			modal:true,
			width:'500px',
			autoOpen:false,
			resizable:true,
			position:'midle',
			buttons:{
				"  Close  ":function(){
					$(this).dialog('close');
				},
			}
		});
	}else{
		dialogObject.dialog({
				title:"Message",
				modal:true,
				width:'500px',
				autoOpen:false,
				resizable:true,
				position:'midle',
				buttons:{
					"  Close  ":function(){
						$(this).dialog('close');
					},
				}
			});
	}
	$("#loading_box",cDialog).hide();
	$("#isi_pesan",cDialog).show();
	$("#isi_pesan",cDialog).html(msg);
	cDialog.dialog('option', 'position', 'center');
	cDialog.dialog('open');
	
	if(timeOut!=null)
	{
		setTimeout(function() {
			$("a.ui-dialog-titlebar-close").last().click();
		}, timeOut); 
	}
	 
	
	
}

function ShowLoading(msg){	
	
	if(dialogObject==null){
		loadDialogScript();
		dialogObject=cDialog.dialog({
			title:"Loading",
			modal:true,
			width:'500px',
			autoOpen:false,
			resizable:true,
			position:'midle',
			buttons:{}
		});
	}else{
		dialogObject.dialog({
				title:"Loading",
				modal:true,
				width:'500px',
				autoOpen:false,
				resizable:true,
				position:'midle',
				buttons:{}
			});
	}
	$("#loading_box",cDialog).hide();
	$("#isi_pesan",cDialog).show();
	var stringDiv = $("<div><div style='float:left;width:100%;vertical-align:middle;margin:10px;' align='center' class='div_loader'></div><div style='clear:both:widht:100%' align='center' class=''></div>  <span>"+(msg?msg:" ")+"</span></div");
	$(".div_loader", stringDiv).append($("#loading_box:eq(0) img").clone());
	$("#isi_pesan",cDialog).html(stringDiv);
	cDialog.dialog('open');
	
}

//fungsi untuk menyembunyikan dialog box
function HideDialogBox(){
	if(dialogObject!=null){
		if(dialogObject.dialog( "isOpen" ))
			dialogObject.dialog("close");
	}
}

//fungsi untuk menutup facebox yang aktif pada page dokumen
function CloseFacebox(){
	
	jQuery(document).trigger('close.facebox');
}
//fungsi untuk menampilkan pesan konfirmasi dalam bentuk dialog UI
function ShowConfirmation(msg,okFunction, cancelFunction){	
	if(dialogObject==null){
		loadDialogScript();
		dialogObject=cDialog.dialog({
			title:"Confirmation",
			modal:true,
			width:'500px',
			autoOpen:false,
			resizable:true,
			position:'center',
			buttons:{
				"  OK  ":function(){
					$(this).dialog('close');
					okFunction();
				},
				"  Cancel  ":function(){
					$(this).dialog('close');
					if(jQuery.isFunction(cancelFunction))
						cancelFunction();
				},
			}
		});
	}else{
		cDialog.dialog({
				title:"Confirmation",
				modal:true,
				width:'500px',
				autoOpen:false,
				resizable:true,
				position:'center',
				buttons:{	
					"  OK  ":function(){
						$(this).dialog('close');
						okFunction();
					},
					"  Cancel  ":function(){
						$(this).dialog('close');
						if(jQuery.isFunction(cancelFunction))
							cancelFunction();
					}
				}
		});
	}
	$("#loading_box",cDialog).hide();
	$("#isi_pesan",cDialog).show();
	var stringDiv = $("<div><div style='float:left;width:120px;vertical-align:middle' align='center' class='img_notification'><img src='"+imageUrl+"notification/help.png' widht='90px' height='90px'/></div>  <div id='messageContentArea'></div></div");
	$("#messageContentArea", stringDiv).append(msg);
	$("#isi_pesan",cDialog).html(stringDiv);
	cDialog.dialog('open');
}
//fungsi untuk validasi input berupa bilangan bulat
function checkNumber(evt){
	evt=(evt)?evt:window.event
	var charCode=(evt.which)?evt.which:evt.keyCode
	if(charCode>31&&(charCode<48||charCode>57)){
		status="This field accepts numbers only."
		return false;
	}
	status=""
	return true
}
//fungsi untuk validasi input berupa bilangan real
function checkReal(evt){
	evt=(evt)?evt:window.event
	var charCode=(evt.which)?evt.which:evt.keyCode
	if((charCode>47 && charCode<58) || charCode==46 || charCode==8){
		status="";
		return true;		
	}
	else {
		status="This field accepts numbers only.";
		return false;
	}
}
//fungsi untuk me-load script-script penting untuk dialog UI dengan mekanisme ajax
function loadDialogScript(){
	$.ajax({
		url:javaScriptUrl+"ui/jquery.ui.mouse.min.js",
		dataType:"script",
		async:false,
		type:"get"		
	});
	$.ajax({
		url:javaScriptUrl+"ui/jquery.ui.button.min.js",
		dataType:"script",
		async:false,
		type:"get"		
	});
	$.ajax({
		url:javaScriptUrl+"ui/jquery.ui.draggable.min.js",
		dataType:"script",
		async:false,
		type:"get"		
	});
	$.ajax({
		url:javaScriptUrl+"ui/jquery.ui.position.min.js",
		dataType:"script",
		async:false,
		type:"get"		
	});
	$.ajax({
		url:javaScriptUrl+"ui/jquery.ui.resizable.min.js",
		dataType:"script",
		async:false,
		type:"get"		
	});
	$.ajax({
		url:javaScriptUrl+"ui/jquery.ui.dialog.min.js",
		dataType:"script",
		async:false,
		type:"get"		
	});
}
function redirectPage(pageid){
	self.location.href="<?=base_url()?>themes/login/index.php?pageid="+pageid;
}
function toMoneyFormat(str){
	var counter=0,temp=0;
	var output="";
	counter=str.length;
	for(var i=1;i<(counter);i++){
		if(i%3==0){
			output=str[counter-i]+output;
			output="."+output;
		}
		else{
			output=str[counter-i]+output;		
		}
	}
	output=str[0]+output;
	return output;
}

function createDynamicYear(element,startindex){
	var selectedYear=parseInt($("option:selected",element).val());
	if($("option:selected",element).index()==($(element).children().length-1)){
		for(var i=(selectedYear-1);i>=(selectedYear-5);i--)	
			$(element).append("<option value='"+i+"' > "+i+" </option>");
	}else if($("option:selected",element).index()==startindex){
		for(var i=(selectedYear+1);i<=(selectedYear+5);i++)	
			$(":eq(0)",element).after("<option value='"+i+"' > "+i+" </option>");
	}
}
function replaceNull(aData,value){
	for(var i=0;i<aData.length;i++){
		if(aData[i]==""){
			aData[i]=value;
		}
	}
	return aData;
}
function truncateString(stringContent,startIndex,endIndex,stringContd){
	var stringContdAdd=(stringContd.length==0?"...":stringContd);
	if(jQuery.trim(stringContent)=="-"){
		return stringContent;
	}else if(stringContent==""||stringContent.length<=endIndex){
		return stringContent;
	}else{
		return stringContent.substring(startIndex,endIndex)+stringContdAdd;
	}
}
//menambahkan animasi loading ketika menunggu respon dari mekanisme ajax ke server
function addLoadingInfoTo(element){
	var obj=$(element);
	obj.after($("#loading_info").show().clone());
}
//menghapus animasi loading ketika respone mekanisme ajax dari server sudah diterima.
function deleteLoadingInfoFrom(element){
	var obj=$(element);
	obj.next("#loading_info").remove();;
}
function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

						
function ToggleTableCheckbox(element){
	var parentTable = $(element).parents("table");
	if($(element).attr('checked')){	
		$("tbody .checkable", parentTable).each(function(index, elm){
			$(elm).attr('checked','checked');
			var tempTR = $(elm).parents('tr');
			$(tempTR).addClass('row_selected');
		});
	
	}else{
		$("tbody .checkable", parentTable).each(function(index, elm){
			$(elm).removeAttr('checked');
			var tempTR = $(elm).parents('tr');
			$(tempTR).removeClass('row_selected');
		});
		
	}
}

function CreateStringArrayContent(arrayData, separator, lastItemInfo, nullInfo){
	var str = "";
	var lastItemInfoValue = lastItemInfo?lastItemInfo:"and";
	var separatorValue = separator?separator:", ";
	
	if(arrayData.length>0){
		for(var i=0;i<arrayData.length;i++){
			str += arrayData[i];
			if(arrayData.length>1&&i==arrayData.length-2){
				str += separatorValue+lastItemInfoValue+" ";
			}else if(i<arrayData.length-1){
				str += separatorValue;
			}
		}
	}else{
		str = nullInfo?nullInfo:"";
	}
	return str;
}


function GetCurrentTime()
{
	var d = new Date();
	return d.getTime();
}

$.fn.clearForm = function() {
  return this.each(function() {
 var type = this.type, tag = this.tagName.toLowerCase();
 if (tag == 'form')
   return $(':input',this).clearForm();
 if (type == 'text' || type == 'password' || tag == 'textarea')
   this.value = '';
 else if (type == 'checkbox' || type == 'radio')
   this.checked = false;
 else if (tag == 'select')
   this.selectedIndex = 0;
  });
};



function ConfirmMessage(msg,id,className){ 
	$('#confirmMessage').html(msg); 
	$('#idForm').val(id);
	$('#delete').addClass(className);
	$('#confirmation').modal('show');
}

function NotifMessage(msg, msgType){ 
	var css = "alert alert-block alert-info fade in";
	var header = "Info";
	switch(msgType.toLowerCase()){
		case "error": {
				css 	= "alert alert-block alert-error fade in";
				header 	= "Error";
				break; 
			}
		case "success": {
				css 	= "alert alert-block alert-success fade in";
				header 	= "Success";
				break;
			}
		case "warning": {
				css = "alert alert-block alert-warning fade in";
				header 	= "Warning";
				break;
			}
	}
	
	$('#notifHead').html(header);
	$('#notifMessage').html(msg);
	$('#notifColour').removeClass();
	$('#notifColour').addClass(css);
	$('#notif').modal('show');
}

function SpanSchoolYear(schoolYear) {
    var thn1 = schoolYear.substr(0, 2);
    var thn2 = schoolYear.substr(2, 2);
    return GetFullYear(thn1) + "/" + GetFullYear(thn2);
}

function GetFullYear(year) {
    var thn = parseInt(year);
    if (thn < 10) {
        thn = "0" + thn;
    }
    if (parseInt(thn) < 80) {
        thn = "20" + thn;
    } else {
        thn = "19" + thn;
    }
    return thn;
}
