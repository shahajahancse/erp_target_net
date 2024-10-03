/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */

// Sample desktop configuration


<!-- 
//============================================================================================================

// ===================================================================
// Author: Matt Kruse <matt@mattkruse.com>
// WWW: http://www.mattkruse.com/
//
// NOTICE: You may use this code for any purpose, commercial or
// private, without any further permission from the author. You may
// remove this notice from your final code if you wish, however it is
// appreciated by the author if at least my web site address is kept.
//
// You may *NOT* re-distribute this code in any way except through its
// use. That means, you can include it in your product, or your web
// site, or any other form where the code is actually being used. You
// may not put the plain javascript up on your site for download or
// include it in your javascript libraries for download. 
// If you wish to share this code with others, please just point them
// to the URL instead.
// Please DO NOT link directly to my .js files from your site. Copy
// the files to your server and use them there. Thank you.
// ===================================================================

/* SOURCE FILE: AnchorPosition.js */
function getAnchorPosition(anchorname){var useWindow=false;var coordinates=new Object();var x=0,y=0;var use_gebi=false, use_css=false, use_layers=false;if(document.getElementById){use_gebi=true;}else if(document.all){use_css=true;}else if(document.layers){use_layers=true;}if(use_gebi && document.all){x=AnchorPosition_getPageOffsetLeft(document.all[anchorname]);y=AnchorPosition_getPageOffsetTop(document.all[anchorname]);}else if(use_gebi){var o=document.getElementById(anchorname);x=AnchorPosition_getPageOffsetLeft(o);y=AnchorPosition_getPageOffsetTop(o);}else if(use_css){x=AnchorPosition_getPageOffsetLeft(document.all[anchorname]);y=AnchorPosition_getPageOffsetTop(document.all[anchorname]);}else if(use_layers){var found=0;for(var i=0;i<document.anchors.length;i++){if(document.anchors[i].name==anchorname){found=1;break;}}if(found==0){coordinates.x=0;coordinates.y=0;return coordinates;}x=document.anchors[i].x;y=document.anchors[i].y;}else{coordinates.x=0;coordinates.y=0;return coordinates;}coordinates.x=x;coordinates.y=y;return coordinates;}
function getAnchorWindowPosition(anchorname){var coordinates=getAnchorPosition(anchorname);var x=0;var y=0;if(document.getElementById){if(isNaN(window.screenX)){x=coordinates.x-document.body.scrollLeft+window.screenLeft;y=coordinates.y-document.body.scrollTop+window.screenTop;}else{x=coordinates.x+window.screenX+(window.outerWidth-window.innerWidth)-window.pageXOffset;y=coordinates.y+window.screenY+(window.outerHeight-24-window.innerHeight)-window.pageYOffset;}}else if(document.all){x=coordinates.x-document.body.scrollLeft+window.screenLeft;y=coordinates.y-document.body.scrollTop+window.screenTop;}else if(document.layers){x=coordinates.x+window.screenX+(window.outerWidth-window.innerWidth)-window.pageXOffset;y=coordinates.y+window.screenY+(window.outerHeight-24-window.innerHeight)-window.pageYOffset;}coordinates.x=x;coordinates.y=y;return coordinates;}
function AnchorPosition_getPageOffsetLeft(el){var ol=el.offsetLeft;while((el=el.offsetParent) != null){ol += el.offsetLeft;}return ol;}
function AnchorPosition_getWindowOffsetLeft(el){return AnchorPosition_getPageOffsetLeft(el)-document.body.scrollLeft;}
function AnchorPosition_getPageOffsetTop(el){var ot=el.offsetTop;while((el=el.offsetParent) != null){ot += el.offsetTop;}return ot;}
function AnchorPosition_getWindowOffsetTop(el){return AnchorPosition_getPageOffsetTop(el)-document.body.scrollTop;}

/* SOURCE FILE: date.js */
var MONTH_NAMES=new Array('January','February','March','April','May','June','July','August','September','October','November','December','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');var DAY_NAMES=new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sun','Mon','Tue','Wed','Thu','Fri','Sat');
function LZ(x){return(x<0||x>9?"":"0")+x}
function isDate(val,format){var date=getDateFromFormat(val,format);if(date==0){return false;}return true;}
function compareDates(date1,dateformat1,date2,dateformat2){var d1=getDateFromFormat(date1,dateformat1);var d2=getDateFromFormat(date2,dateformat2);if(d1==0 || d2==0){return -1;}else if(d1 > d2){return 1;}return 0;}
function formatDate(date,format){format=format+"";var result="";var i_format=0;var c="";var token="";var y=date.getYear()+"";var M=date.getMonth()+1;var d=date.getDate();var E=date.getDay();var H=date.getHours();var m=date.getMinutes();var s=date.getSeconds();var yyyy,yy,MMM,MM,dd,hh,h,mm,ss,ampm,HH,H,KK,K,kk,k;var value=new Object();if(y.length < 4){y=""+(y-0+1900);}value["y"]=""+y;value["yyyy"]=y;value["yy"]=y.substring(2,4);value["M"]=M;value["MM"]=LZ(M);value["MMM"]=MONTH_NAMES[M-1];value["NNN"]=MONTH_NAMES[M+11];value["d"]=d;value["dd"]=LZ(d);value["E"]=DAY_NAMES[E+7];value["EE"]=DAY_NAMES[E];value["H"]=H;value["HH"]=LZ(H);if(H==0){value["h"]=12;}else if(H>12){value["h"]=H-12;}else{value["h"]=H;}value["hh"]=LZ(value["h"]);if(H>11){value["K"]=H-12;}else{value["K"]=H;}value["k"]=H+1;value["KK"]=LZ(value["K"]);value["kk"]=LZ(value["k"]);if(H > 11){value["a"]="PM";}else{value["a"]="AM";}value["m"]=m;value["mm"]=LZ(m);value["s"]=s;value["ss"]=LZ(s);while(i_format < format.length){c=format.charAt(i_format);token="";while((format.charAt(i_format)==c) &&(i_format < format.length)){token += format.charAt(i_format++);}if(value[token] != null){result=result + value[token];}else{result=result + token;}}return result;}
function _isInteger(val){var digits="1234567890";for(var i=0;i < val.length;i++){if(digits.indexOf(val.charAt(i))==-1){return false;}}return true;}
function _getInt(str,i,minlength,maxlength){for(var x=maxlength;x>=minlength;x--){var token=str.substring(i,i+x);if(token.length < minlength){return null;}if(_isInteger(token)){return token;}}return null;}
function getDateFromFormat(val,format){val=val+"";format=format+"";var i_val=0;var i_format=0;var c="";var token="";var token2="";var x,y;var now=new Date();var year=now.getYear();var month=now.getMonth()+1;var date=1;var hh=now.getHours();var mm=now.getMinutes();var ss=now.getSeconds();var ampm="";while(i_format < format.length){c=format.charAt(i_format);token="";while((format.charAt(i_format)==c) &&(i_format < format.length)){token += format.charAt(i_format++);}if(token=="yyyy" || token=="yy" || token=="y"){if(token=="yyyy"){x=4;y=4;}if(token=="yy"){x=2;y=2;}if(token=="y"){x=2;y=4;}year=_getInt(val,i_val,x,y);if(year==null){return 0;}i_val += year.length;if(year.length==2){if(year > 70){year=1900+(year-0);}else{year=2000+(year-0);}}}else if(token=="MMM"||token=="NNN"){month=0;for(var i=0;i<MONTH_NAMES.length;i++){var month_name=MONTH_NAMES[i];if(val.substring(i_val,i_val+month_name.length).toLowerCase()==month_name.toLowerCase()){if(token=="MMM"||(token=="NNN"&&i>11)){month=i+1;if(month>12){month -= 12;}i_val += month_name.length;break;}}}if((month < 1)||(month>12)){return 0;}}else if(token=="EE"||token=="E"){for(var i=0;i<DAY_NAMES.length;i++){var day_name=DAY_NAMES[i];if(val.substring(i_val,i_val+day_name.length).toLowerCase()==day_name.toLowerCase()){i_val += day_name.length;break;}}}else if(token=="MM"||token=="M"){month=_getInt(val,i_val,token.length,2);if(month==null||(month<1)||(month>12)){return 0;}i_val+=month.length;}else if(token=="dd"||token=="d"){date=_getInt(val,i_val,token.length,2);if(date==null||(date<1)||(date>31)){return 0;}i_val+=date.length;}else if(token=="hh"||token=="h"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<1)||(hh>12)){return 0;}i_val+=hh.length;}else if(token=="HH"||token=="H"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<0)||(hh>23)){return 0;}i_val+=hh.length;}else if(token=="KK"||token=="K"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<0)||(hh>11)){return 0;}i_val+=hh.length;}else if(token=="kk"||token=="k"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<1)||(hh>24)){return 0;}i_val+=hh.length;hh--;}else if(token=="mm"||token=="m"){mm=_getInt(val,i_val,token.length,2);if(mm==null||(mm<0)||(mm>59)){return 0;}i_val+=mm.length;}else if(token=="ss"||token=="s"){ss=_getInt(val,i_val,token.length,2);if(ss==null||(ss<0)||(ss>59)){return 0;}i_val+=ss.length;}else if(token=="a"){if(val.substring(i_val,i_val+2).toLowerCase()=="am"){ampm="AM";}else if(val.substring(i_val,i_val+2).toLowerCase()=="pm"){ampm="PM";}else{return 0;}i_val+=2;}else{if(val.substring(i_val,i_val+token.length)!=token){return 0;}else{i_val+=token.length;}}}if(i_val != val.length){return 0;}if(month==2){if( ((year%4==0)&&(year%100 != 0) ) ||(year%400==0) ){if(date > 29){return 0;}}else{if(date > 28){return 0;}}}if((month==4)||(month==6)||(month==9)||(month==11)){if(date > 30){return 0;}}if(hh<12 && ampm=="PM"){hh=hh-0+12;}else if(hh>11 && ampm=="AM"){hh-=12;}var newdate=new Date(year,month-1,date,hh,mm,ss);return newdate.getTime();}
function parseDate(val){var preferEuro=(arguments.length==2)?arguments[1]:false;generalFormats=new Array('y-M-d','MMM d, y','MMM d,y','y-MMM-d','d-MMM-y','MMM d');monthFirst=new Array('M/d/y','M-d-y','M.d.y','MMM-d','M/d','M-d');dateFirst =new Array('d/M/y','d-M-y','d.M.y','d-MMM','d/M','d-M');var checkList=new Array('generalFormats',preferEuro?'dateFirst':'monthFirst',preferEuro?'monthFirst':'dateFirst');var d=null;for(var i=0;i<checkList.length;i++){var l=window[checkList[i]];for(var j=0;j<l.length;j++){d=getDateFromFormat(val,l[j]);if(d!=0){return new Date(d);}}}return null;}

/* SOURCE FILE: PopupWindow.js */
function PopupWindow_getXYPosition(anchorname){var coordinates;if(this.type == "WINDOW"){coordinates = getAnchorWindowPosition(anchorname);}else{coordinates = getAnchorPosition(anchorname);}this.x = coordinates.x;this.y = coordinates.y;}
function PopupWindow_setSize(width,height){this.width = width;this.height = height;}
function PopupWindow_populate(contents){this.contents = contents;this.populated = false;}
function PopupWindow_setUrl(url){this.url = url;}
function PopupWindow_setWindowProperties(props){this.windowProperties = props;}
function PopupWindow_refresh(){if(this.divName != null){if(this.use_gebi){document.getElementById(this.divName).innerHTML = this.contents;}else if(this.use_css){document.all[this.divName].innerHTML = this.contents;}else if(this.use_layers){var d = document.layers[this.divName];d.document.open();d.document.writeln(this.contents);d.document.close();}}else{if(this.popupWindow != null && !this.popupWindow.closed){if(this.url!=""){this.popupWindow.location.href=this.url;}else{this.popupWindow.document.open();this.popupWindow.document.writeln(this.contents);this.popupWindow.document.close();}this.popupWindow.focus();}}}
function PopupWindow_showPopup(anchorname){this.getXYPosition(anchorname);this.x += this.offsetX;this.y += this.offsetY;if(!this.populated &&(this.contents != "")){this.populated = true;this.refresh();}if(this.divName != null){if(this.use_gebi){document.getElementById(this.divName).style.left = this.x + "px";document.getElementById(this.divName).style.top = this.y + "px";document.getElementById(this.divName).style.visibility = "visible";}else if(this.use_css){document.all[this.divName].style.left = this.x;document.all[this.divName].style.top = this.y;document.all[this.divName].style.visibility = "visible";}else if(this.use_layers){document.layers[this.divName].left = this.x;document.layers[this.divName].top = this.y;document.layers[this.divName].visibility = "visible";}}else{if(this.popupWindow == null || this.popupWindow.closed){if(this.x<0){this.x=0;}if(this.y<0){this.y=0;}if(screen && screen.availHeight){if((this.y + this.height) > screen.availHeight){this.y = screen.availHeight - this.height;}}if(screen && screen.availWidth){if((this.x + this.width) > screen.availWidth){this.x = screen.availWidth - this.width;}}var avoidAboutBlank = window.opera ||( document.layers && !navigator.mimeTypes['*']) || navigator.vendor == 'KDE' ||( document.childNodes && !document.all && !navigator.taintEnabled);this.popupWindow = window.open(avoidAboutBlank?"":"about:blank","window_"+anchorname,this.windowProperties+",width="+this.width+",height="+this.height+",screenX="+this.x+",left="+this.x+",screenY="+this.y+",top="+this.y+"");}this.refresh();}}
function PopupWindow_hidePopup(){if(this.divName != null){if(this.use_gebi){document.getElementById(this.divName).style.visibility = "hidden";}else if(this.use_css){document.all[this.divName].style.visibility = "hidden";}else if(this.use_layers){document.layers[this.divName].visibility = "hidden";}}else{if(this.popupWindow && !this.popupWindow.closed){this.popupWindow.close();this.popupWindow = null;}}}
function PopupWindow_isClicked(e){if(this.divName != null){if(this.use_layers){var clickX = e.pageX;var clickY = e.pageY;var t = document.layers[this.divName];if((clickX > t.left) &&(clickX < t.left+t.clip.width) &&(clickY > t.top) &&(clickY < t.top+t.clip.height)){return true;}else{return false;}}else if(document.all){var t = window.event.srcElement;while(t.parentElement != null){if(t.id==this.divName){return true;}t = t.parentElement;}return false;}else if(this.use_gebi && e){var t = e.originalTarget;while(t.parentNode != null){if(t.id==this.divName){return true;}t = t.parentNode;}return false;}return false;}return false;}
function PopupWindow_hideIfNotClicked(e){if(this.autoHideEnabled && !this.isClicked(e)){this.hidePopup();}}
function PopupWindow_autoHide(){this.autoHideEnabled = true;}
function PopupWindow_hidePopupWindows(e){for(var i=0;i<popupWindowObjects.length;i++){if(popupWindowObjects[i] != null){var p = popupWindowObjects[i];p.hideIfNotClicked(e);}}}
function PopupWindow_attachListener(){if(document.layers){document.captureEvents(Event.MOUSEUP);}window.popupWindowOldEventListener = document.onmouseup;if(window.popupWindowOldEventListener != null){document.onmouseup = new Function("window.popupWindowOldEventListener();PopupWindow_hidePopupWindows();");}else{document.onmouseup = PopupWindow_hidePopupWindows;}}
function PopupWindow(){if(!window.popupWindowIndex){window.popupWindowIndex = 0;}if(!window.popupWindowObjects){window.popupWindowObjects = new Array();}if(!window.listenerAttached){window.listenerAttached = true;PopupWindow_attachListener();}this.index = popupWindowIndex++;popupWindowObjects[this.index] = this;this.divName = null;this.popupWindow = null;this.width=0;this.height=0;this.populated = false;this.visible = false;this.autoHideEnabled = false;this.contents = "";this.url="";this.windowProperties="toolbar=no,location=no,status=no,menubar=no,scrollbars=auto,resizable,alwaysRaised,dependent,titlebar=no";if(arguments.length>0){this.type="DIV";this.divName = arguments[0];}else{this.type="WINDOW";}this.use_gebi = false;this.use_css = false;this.use_layers = false;if(document.getElementById){this.use_gebi = true;}else if(document.all){this.use_css = true;}else if(document.layers){this.use_layers = true;}else{this.type = "WINDOW";}this.offsetX = 0;this.offsetY = 0;this.getXYPosition = PopupWindow_getXYPosition;this.populate = PopupWindow_populate;this.setUrl = PopupWindow_setUrl;this.setWindowProperties = PopupWindow_setWindowProperties;this.refresh = PopupWindow_refresh;this.showPopup = PopupWindow_showPopup;this.hidePopup = PopupWindow_hidePopup;this.setSize = PopupWindow_setSize;this.isClicked = PopupWindow_isClicked;this.autoHide = PopupWindow_autoHide;this.hideIfNotClicked = PopupWindow_hideIfNotClicked;}


/* SOURCE FILE: CalendarPopup.js */
function CP_stop(e) { if (e && e.stopPropagation) { e.stopPropagation(); } }
function CalendarPopup(){var c;if(arguments.length>0){c = new PopupWindow(arguments[0]);}else{c = new PopupWindow();c.setSize(150,175);}c.offsetX = -152;c.offsetY = 25;c.autoHide();c.monthNames = new Array("January","February","March","April","May","June","July","August","September","October","November","December");c.monthAbbreviations = new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");c.dayHeaders = new Array("S","M","T","W","T","F","S");c.returnFunction = "CP_tmpReturnFunction";c.returnMonthFunction = "CP_tmpReturnMonthFunction";c.returnQuarterFunction = "CP_tmpReturnQuarterFunction";c.returnYearFunction = "CP_tmpReturnYearFunction";c.weekStartDay = 0;c.isShowYearNavigation = false;c.displayType = "date";c.disabledWeekDays = new Object();c.disabledDatesExpression = "";c.yearSelectStartOffset = 2;c.currentDate = null;c.todayText="Today";c.cssPrefix="";c.isShowNavigationDropdowns=false;c.isShowYearNavigationInput=false;window.CP_calendarObject = null;window.CP_targetInput = null;window.CP_dateFormat = "MM/dd/yyyy";c.copyMonthNamesToWindow = CP_copyMonthNamesToWindow;c.setReturnFunction = CP_setReturnFunction;c.setReturnMonthFunction = CP_setReturnMonthFunction;c.setReturnQuarterFunction = CP_setReturnQuarterFunction;c.setReturnYearFunction = CP_setReturnYearFunction;c.setMonthNames = CP_setMonthNames;c.setMonthAbbreviations = CP_setMonthAbbreviations;c.setDayHeaders = CP_setDayHeaders;c.setWeekStartDay = CP_setWeekStartDay;c.setDisplayType = CP_setDisplayType;c.setDisabledWeekDays = CP_setDisabledWeekDays;c.addDisabledDates = CP_addDisabledDates;c.setYearSelectStartOffset = CP_setYearSelectStartOffset;c.setTodayText = CP_setTodayText;c.showYearNavigation = CP_showYearNavigation;c.showCalendar = CP_showCalendar;c.hideCalendar = CP_hideCalendar;c.getStyles = getCalendarStyles;c.refreshCalendar = CP_refreshCalendar;c.getCalendar = CP_getCalendar;c.select = CP_select;c.setCssPrefix = CP_setCssPrefix;c.showNavigationDropdowns = CP_showNavigationDropdowns;c.showYearNavigationInput = CP_showYearNavigationInput;c.copyMonthNamesToWindow();return c;}
function CP_copyMonthNamesToWindow(){if(typeof(window.MONTH_NAMES)!="undefined" && window.MONTH_NAMES!=null){window.MONTH_NAMES = new Array();for(var i=0;i<this.monthNames.length;i++){window.MONTH_NAMES[window.MONTH_NAMES.length] = this.monthNames[i];}for(var i=0;i<this.monthAbbreviations.length;i++){window.MONTH_NAMES[window.MONTH_NAMES.length] = this.monthAbbreviations[i];}}}
function CP_tmpReturnFunction(y,m,d){if(window.CP_targetInput!=null){var dt = new Date(y,m-1,d,0,0,0);if(window.CP_calendarObject!=null){window.CP_calendarObject.copyMonthNamesToWindow();}window.CP_targetInput.value = formatDate(dt,window.CP_dateFormat);}else{alert('Use setReturnFunction() to define which function will get the clicked results!');}}
function CP_tmpReturnMonthFunction(y,m){alert('Use setReturnMonthFunction() to define which function will get the clicked results!\nYou clicked: year='+y+' , month='+m);}
function CP_tmpReturnQuarterFunction(y,q){alert('Use setReturnQuarterFunction() to define which function will get the clicked results!\nYou clicked: year='+y+' , quarter='+q);}
function CP_tmpReturnYearFunction(y){alert('Use setReturnYearFunction() to define which function will get the clicked results!\nYou clicked: year='+y);}
function CP_setReturnFunction(name){this.returnFunction = name;}
function CP_setReturnMonthFunction(name){this.returnMonthFunction = name;}
function CP_setReturnQuarterFunction(name){this.returnQuarterFunction = name;}
function CP_setReturnYearFunction(name){this.returnYearFunction = name;}
function CP_setMonthNames(){for(var i=0;i<arguments.length;i++){this.monthNames[i] = arguments[i];}this.copyMonthNamesToWindow();}
function CP_setMonthAbbreviations(){for(var i=0;i<arguments.length;i++){this.monthAbbreviations[i] = arguments[i];}this.copyMonthNamesToWindow();}
function CP_setDayHeaders(){for(var i=0;i<arguments.length;i++){this.dayHeaders[i] = arguments[i];}}
function CP_setWeekStartDay(day){this.weekStartDay = day;}
function CP_showYearNavigation(){this.isShowYearNavigation =(arguments.length>0)?arguments[0]:true;}
function CP_setDisplayType(type){if(type!="date"&&type!="week-end"&&type!="month"&&type!="quarter"&&type!="year"){alert("Invalid display type! Must be one of: date,week-end,month,quarter,year");return false;}this.displayType=type;}
function CP_setYearSelectStartOffset(num){this.yearSelectStartOffset=num;}
function CP_setDisabledWeekDays(){this.disabledWeekDays = new Object();for(var i=0;i<arguments.length;i++){this.disabledWeekDays[arguments[i]] = true;}}
function CP_addDisabledDates(start, end){if(arguments.length==1){end=start;}if(start==null && end==null){return;}if(this.disabledDatesExpression!=""){this.disabledDatesExpression+= "||";}if(start!=null){start = parseDate(start);start=""+start.getFullYear()+LZ(start.getMonth()+1)+LZ(start.getDate());}if(end!=null){end=parseDate(end);end=""+end.getFullYear()+LZ(end.getMonth()+1)+LZ(end.getDate());}if(start==null){this.disabledDatesExpression+="(ds<="+end+")";}else if(end  ==null){this.disabledDatesExpression+="(ds>="+start+")";}else{this.disabledDatesExpression+="(ds>="+start+"&&ds<="+end+")";}}
function CP_setTodayText(text){this.todayText = text;}
function CP_setCssPrefix(val){this.cssPrefix = val;}
function CP_showNavigationDropdowns(){this.isShowNavigationDropdowns =(arguments.length>0)?arguments[0]:true;}
function CP_showYearNavigationInput(){this.isShowYearNavigationInput =(arguments.length>0)?arguments[0]:true;}
function CP_hideCalendar(){if(arguments.length > 0){window.popupWindowObjects[arguments[0]].hidePopup();}else{this.hidePopup();}}
function CP_refreshCalendar(index){var calObject = window.popupWindowObjects[index];if(arguments.length>1){calObject.populate(calObject.getCalendar(arguments[1],arguments[2],arguments[3],arguments[4],arguments[5]));}else{calObject.populate(calObject.getCalendar());}calObject.refresh();}
function CP_showCalendar(anchorname){if(arguments.length>1){if(arguments[1]==null||arguments[1]==""){this.currentDate=new Date();}else{this.currentDate=new Date(parseDate(arguments[1]));}}this.populate(this.getCalendar());this.showPopup(anchorname);}
function CP_select(inputobj, linkname, format){var selectedDate=(arguments.length>3)?arguments[3]:null;if(!window.getDateFromFormat){alert("calendar.select: To use this method you must also include 'date.js' for date formatting");return;}if(this.displayType!="date"&&this.displayType!="week-end"){alert("calendar.select: This function can only be used with displayType 'date' or 'week-end'");return;}if(inputobj.type!="text" && inputobj.type!="hidden" && inputobj.type!="textarea"){alert("calendar.select: Input object passed is not a valid form input object");window.CP_targetInput=null;return;}if(inputobj.disabled){return;}window.CP_targetInput = inputobj;window.CP_calendarObject = this;this.currentDate=null;var time=0;if(selectedDate!=null){time = getDateFromFormat(selectedDate,format)}else if(inputobj.value!=""){time = getDateFromFormat(inputobj.value,format);}if(selectedDate!=null || inputobj.value!=""){if(time==0){this.currentDate=null;}else{this.currentDate=new Date(time);}}window.CP_dateFormat = format;this.showCalendar(linkname);}
function getCalendarStyles(){var result = "";var p = "";if(this!=null && typeof(this.cssPrefix)!="undefined" && this.cssPrefix!=null && this.cssPrefix!=""){p=this.cssPrefix;}result += "<STYLE>\n";result += "."+p+"cpYearNavigation,."+p+"cpMonthNavigation{background-color:#C0C0C0;text-align:center;vertical-align:center;text-decoration:none;color:#000000;font-weight:bold;}\n";result += "."+p+"cpDayColumnHeader, ."+p+"cpYearNavigation,."+p+"cpMonthNavigation,."+p+"cpCurrentMonthDate,."+p+"cpCurrentMonthDateDisabled,."+p+"cpOtherMonthDate,."+p+"cpOtherMonthDateDisabled,."+p+"cpCurrentDate,."+p+"cpCurrentDateDisabled,."+p+"cpTodayText,."+p+"cpTodayTextDisabled,."+p+"cpText{font-family:arial;font-size:8pt;}\n";result += "TD."+p+"cpDayColumnHeader{text-align:right;border:solid thin #C0C0C0;border-width:0px 0px 1px 0px;}\n";result += "."+p+"cpCurrentMonthDate, ."+p+"cpOtherMonthDate, ."+p+"cpCurrentDate{text-align:right;text-decoration:none;}\n";result += "."+p+"cpCurrentMonthDateDisabled, ."+p+"cpOtherMonthDateDisabled, ."+p+"cpCurrentDateDisabled{color:#D0D0D0;text-align:right;text-decoration:line-through;}\n";result += "."+p+"cpCurrentMonthDate, .cpCurrentDate{color:#000000;}\n";result += "."+p+"cpOtherMonthDate{color:#808080;}\n";result += "TD."+p+"cpCurrentDate{color:white;background-color: #C0C0C0;border-width:1px;border:solid thin #800000;}\n";result += "TD."+p+"cpCurrentDateDisabled{border-width:1px;border:solid thin #FFAAAA;}\n";result += "TD."+p+"cpTodayText, TD."+p+"cpTodayTextDisabled{border:solid thin #C0C0C0;border-width:1px 0px 0px 0px;}\n";result += "A."+p+"cpTodayText, SPAN."+p+"cpTodayTextDisabled{height:20px;}\n";result += "A."+p+"cpTodayText{color:black;}\n";result += "."+p+"cpTodayTextDisabled{color:#D0D0D0;}\n";result += "."+p+"cpBorder{border:solid thin #808080;}\n";result += "</STYLE>\n";return result;}
function CP_getCalendar(){var now = new Date();if(this.type == "WINDOW"){var windowref = "window.opener.";}else{var windowref = "";}var result = "";if(this.type == "WINDOW"){result += "<HTML><HEAD><TITLE>Calendar</TITLE>"+this.getStyles()+"</HEAD><BODY MARGINWIDTH=0 MARGINHEIGHT=0 TOPMARGIN=0 RIGHTMARGIN=0 LEFTMARGIN=0>\n";result += '<CENTER><TABLE WIDTH=100% BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>\n';}else{result += '<TABLE CLASS="'+this.cssPrefix+'cpBorder" WIDTH=144 BORDER=1 BORDERWIDTH=1 CELLSPACING=0 CELLPADDING=1>\n';result += '<TR><TD ALIGN=CENTER>\n';result += '<CENTER>\n';}if(this.displayType=="date" || this.displayType=="week-end"){if(this.currentDate==null){this.currentDate = now;}if(arguments.length > 0){var month = arguments[0];}else{var month = this.currentDate.getMonth()+1;}if(arguments.length > 1 && arguments[1]>0 && arguments[1]-0==arguments[1]){var year = arguments[1];}else{var year = this.currentDate.getFullYear();}var daysinmonth= new Array(0,31,28,31,30,31,30,31,31,30,31,30,31);if( ((year%4 == 0)&&(year%100 != 0) ) ||(year%400 == 0) ){daysinmonth[2] = 29;}var current_month = new Date(year,month-1,1);var display_year = year;var display_month = month;var display_date = 1;var weekday= current_month.getDay();var offset = 0;offset =(weekday >= this.weekStartDay) ? weekday-this.weekStartDay : 7-this.weekStartDay+weekday ;if(offset > 0){display_month--;if(display_month < 1){display_month = 12;display_year--;}display_date = daysinmonth[display_month]-offset+1;}var next_month = month+1;var next_month_year = year;if(next_month > 12){next_month=1;next_month_year++;}var last_month = month-1;var last_month_year = year;if(last_month < 1){last_month=12;last_month_year--;}var date_class;if(this.type!="WINDOW"){result += "<TABLE WIDTH=144 BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>";}result += '<TR>\n';var refresh = windowref+'CP_refreshCalendar';var refreshLink = 'javascript:' + refresh;if(this.isShowNavigationDropdowns){result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="78" COLSPAN="3"><select CLASS="'+this.cssPrefix+'cpMonthNavigation" name="cpMonth" onmouseup="CP_stop(event)" onChange="'+refresh+'('+this.index+',this.options[this.selectedIndex].value-0,'+(year-0)+');">';for( var monthCounter=1;monthCounter<=12;monthCounter++){var selected =(monthCounter==month) ? 'SELECTED' : '';result += '<option value="'+monthCounter+'" '+selected+'>'+this.monthNames[monthCounter-1]+'</option>';}result += '</select></TD>';result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10">&nbsp;</TD>';result += '<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="56" COLSPAN="3"><select CLASS="'+this.cssPrefix+'cpYearNavigation" name="cpYear" onmouseup="CP_stop(event)" onChange="'+refresh+'('+this.index+','+month+',this.options[this.selectedIndex].value-0);">';for( var yearCounter=year-this.yearSelectStartOffset;yearCounter<=year+this.yearSelectStartOffset;yearCounter++){var selected =(yearCounter==year) ? 'SELECTED' : '';result += '<option value="'+yearCounter+'" '+selected+'>'+yearCounter+'</option>';}result += '</select></TD>';}else{if(this.isShowYearNavigation){result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+last_month+','+last_month_year+');">&lt;</A></TD>';result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="58"><SPAN CLASS="'+this.cssPrefix+'cpMonthNavigation">'+this.monthNames[month-1]+'</SPAN></TD>';result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+next_month+','+next_month_year+');">&gt;</A></TD>';result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10">&nbsp;</TD>';result += '<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="'+refreshLink+'('+this.index+','+month+','+(year-1)+');">&lt;</A></TD>';if(this.isShowYearNavigationInput){result += '<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="36"><INPUT NAME="cpYear" CLASS="'+this.cssPrefix+'cpYearNavigation" SIZE="4" MAXLENGTH="4" VALUE="'+year+'" onBlur="'+refresh+'('+this.index+','+month+',this.value-0);"></TD>';}else{result += '<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="36"><SPAN CLASS="'+this.cssPrefix+'cpYearNavigation">'+year+'</SPAN></TD>';}result += '<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="'+refreshLink+'('+this.index+','+month+','+(year+1)+');">&gt;</A></TD>';}else{result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+last_month+','+last_month_year+');">&lt;&lt;</A></TD>\n';result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="100"><SPAN CLASS="'+this.cssPrefix+'cpMonthNavigation">'+this.monthNames[month-1]+' '+year+'</SPAN></TD>\n';result += '<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+next_month+','+next_month_year+');">&gt;&gt;</A></TD>\n';}}result += '</TR></TABLE>\n';result += '<TABLE WIDTH=120 BORDER=0 CELLSPACING=0 CELLPADDING=1 ALIGN=CENTER>\n';result += '<TR>\n';for(var j=0;j<7;j++){result += '<TD CLASS="'+this.cssPrefix+'cpDayColumnHeader" WIDTH="14%"><SPAN CLASS="'+this.cssPrefix+'cpDayColumnHeader">'+this.dayHeaders[(this.weekStartDay+j)%7]+'</TD>\n';}result += '</TR>\n';for(var row=1;row<=6;row++){result += '<TR>\n';for(var col=1;col<=7;col++){var disabled=false;if(this.disabledDatesExpression!=""){var ds=""+display_year+LZ(display_month)+LZ(display_date);eval("disabled=("+this.disabledDatesExpression+")");}var dateClass = "";if((display_month == this.currentDate.getMonth()+1) &&(display_date==this.currentDate.getDate()) &&(display_year==this.currentDate.getFullYear())){dateClass = "cpCurrentDate";}else if(display_month == month){dateClass = "cpCurrentMonthDate";}else{dateClass = "cpOtherMonthDate";}if(disabled || this.disabledWeekDays[col-1]){result += '	<TD CLASS="'+this.cssPrefix+dateClass+'"><SPAN CLASS="'+this.cssPrefix+dateClass+'Disabled">'+display_date+'</SPAN></TD>\n';}else{var selected_date = display_date;var selected_month = display_month;var selected_year = display_year;if(this.displayType=="week-end"){var d = new Date(selected_year,selected_month-1,selected_date,0,0,0,0);d.setDate(d.getDate() +(7-col));selected_year = d.getYear();if(selected_year < 1000){selected_year += 1900;}selected_month = d.getMonth()+1;selected_date = d.getDate();}result += '	<TD CLASS="'+this.cssPrefix+dateClass+'"><A HREF="javascript:'+windowref+this.returnFunction+'('+selected_year+','+selected_month+','+selected_date+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+this.cssPrefix+dateClass+'">'+display_date+'</A></TD>\n';}display_date++;if(display_date > daysinmonth[display_month]){display_date=1;display_month++;}if(display_month > 12){display_month=1;display_year++;}}result += '</TR>';}var current_weekday = now.getDay() - this.weekStartDay;if(current_weekday < 0){current_weekday += 7;}result += '<TR>\n';result += '	<TD COLSPAN=7 ALIGN=CENTER CLASS="'+this.cssPrefix+'cpTodayText">\n';if(this.disabledDatesExpression!=""){var ds=""+now.getFullYear()+LZ(now.getMonth()+1)+LZ(now.getDate());eval("disabled=("+this.disabledDatesExpression+")");}if(disabled || this.disabledWeekDays[current_weekday+1]){result += '		<SPAN CLASS="'+this.cssPrefix+'cpTodayTextDisabled">'+this.todayText+'</SPAN>\n';}else{result += '		<A CLASS="'+this.cssPrefix+'cpTodayText" HREF="javascript:'+windowref+this.returnFunction+'(\''+now.getFullYear()+'\',\''+(now.getMonth()+1)+'\',\''+now.getDate()+'\');'+windowref+'CP_hideCalendar(\''+this.index+'\');">'+this.todayText+'</A>\n';}result += '		<BR>\n';result += '	</TD></TR></TABLE></CENTER></TD></TR></TABLE>\n';}if(this.displayType=="month" || this.displayType=="quarter" || this.displayType=="year"){if(arguments.length > 0){var year = arguments[0];}else{if(this.displayType=="year"){var year = now.getFullYear()-this.yearSelectStartOffset;}else{var year = now.getFullYear();}}if(this.displayType!="year" && this.isShowYearNavigation){result += "<TABLE WIDTH=144 BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>";result += '<TR>\n';result += '	<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year-1)+');">&lt;&lt;</A></TD>\n';result += '	<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="100">'+year+'</TD>\n';result += '	<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year+1)+');">&gt;&gt;</A></TD>\n';result += '</TR></TABLE>\n';}}if(this.displayType=="month"){result += '<TABLE WIDTH=120 BORDER=0 CELLSPACING=1 CELLPADDING=0 ALIGN=CENTER>\n';for(var i=0;i<4;i++){result += '<TR>';for(var j=0;j<3;j++){var monthindex =((i*3)+j);result += '<TD WIDTH=33% ALIGN=CENTER><A CLASS="'+this.cssPrefix+'cpText" HREF="javascript:'+windowref+this.returnMonthFunction+'('+year+','+(monthindex+1)+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+date_class+'">'+this.monthAbbreviations[monthindex]+'</A></TD>';}result += '</TR>';}result += '</TABLE></CENTER></TD></TR></TABLE>\n';}if(this.displayType=="quarter"){result += '<BR><TABLE WIDTH=120 BORDER=1 CELLSPACING=0 CELLPADDING=0 ALIGN=CENTER>\n';for(var i=0;i<2;i++){result += '<TR>';for(var j=0;j<2;j++){var quarter =((i*2)+j+1);result += '<TD WIDTH=50% ALIGN=CENTER><BR><A CLASS="'+this.cssPrefix+'cpText" HREF="javascript:'+windowref+this.returnQuarterFunction+'('+year+','+quarter+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+date_class+'">Q'+quarter+'</A><BR><BR></TD>';}result += '</TR>';}result += '</TABLE></CENTER></TD></TR></TABLE>\n';}if(this.displayType=="year"){var yearColumnSize = 4;result += "<TABLE WIDTH=144 BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>";result += '<TR>\n';result += '	<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="50%"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year-(yearColumnSize*2))+');">&lt;&lt;</A></TD>\n';result += '	<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="50%"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year+(yearColumnSize*2))+');">&gt;&gt;</A></TD>\n';result += '</TR></TABLE>\n';result += '<TABLE WIDTH=120 BORDER=0 CELLSPACING=1 CELLPADDING=0 ALIGN=CENTER>\n';for(var i=0;i<yearColumnSize;i++){for(var j=0;j<2;j++){var currentyear = year+(j*yearColumnSize)+i;result += '<TD WIDTH=50% ALIGN=CENTER><A CLASS="'+this.cssPrefix+'cpText" HREF="javascript:'+windowref+this.returnYearFunction+'('+currentyear+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+date_class+'">'+currentyear+'</A></TD>';}result += '</TR>';}result += '</TABLE></CENTER></TD></TR></TABLE>\n';}if(this.type == "WINDOW"){result += "</BODY></HTML>\n";}return result;}

//============================================================================================================

var eempid=null;
var personalinfo = new Array();


function empty()
{
	personalinfo=null;	
	//document.getElementById('pi_empid').value="";
	document.getElementById('empid').value="";
	document.getElementById('name').value="";
 	document.getElementById('mname').value="";
 	document.getElementById('fname').value="";
 	document.getElementById('dob').value="";
 }
 
function empty_pi(){
	
	document.getElementById('com_empid').value = "";
	document.getElementById('idcard').value = "";

	//document.cominfo.dept.options.length=0;
	document.cominfo.sec.options.length=0;
	document.cominfo.line.options.length=0;
	document.cominfo.desig.options.length=0;
	document.cominfo.salg.options.length=0;
	document.cominfo.empstat.options.length=0;
	document.getElementById('ejd').value = "";

}
 
 function empty_edu_skill(){
	
	document.getElementById('edu_empid').value="";
	document.getElementById('emp_last_dg').value="";
 	document.getElementById('pass_year').value="";
 	document.getElementById('edu_insti').value="";
 	document.getElementById('skill_dept').value="";
	document.getElementById('skill_year').value="";
	document.getElementById('skill_com_na').value="";
}

function ajaxInsert(){
var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 var empid 	= document.getElementById('empid').value;
 
  if(empid=='' || empid==null){
 	alert("Please insert employee ID");
	return;
 }
 
 var name 	= document.getElementById('name').value;
 var mname 	= document.getElementById('mname').value;
 var fname	= document.getElementById('fname').value;
 var dob 	= document.getElementById('dob').value;
 var reli 	= document.getElementById('reli').value;
 var sex 	= document.getElementById('sex').value;
 var bgroup = document.getElementById('bgroup').value;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&bgroup="+bgroup;
 
 ajaxRequest.open("POST", "index.php/payroll_con/per_info/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty();
		alert(resp);
		
			
	}
}
}


var cal = new CalendarPopup();


function ajaxupdate(){
	
 var okyes;
 okyes=confirm('Are you sure you want to Update this?');
if(okyes==false) return;
	  var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var empid 	= document.getElementById('empid').value;
  if(empid=='' || empid==null){
 	alert("Please insert employee ID");
	return;
 }
 var name 	= document.getElementById('name').value;
 var mname 	= document.getElementById('mname').value;
 var fname	= document.getElementById('fname').value;
 var dob 	= document.getElementById('dob').value;
 var reli 	= document.getElementById('reli').value;
 var sex 	= document.getElementById('sex').value;
 var bgroup = document.getElementById('bgroup').value;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&bgroup="+bgroup;
 
 ajaxRequest.open("POST", "index.php/payroll_con/per_update/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Employee ID does not exist"){
			alert(resp);
			empty();
			return;
			}
		alert(resp);
		
			
	}
}

 
}




function ajaxDelete(){
 var okyes;
 okyes=confirm('Are you sure you want to Delete this?');
 if(okyes==false) return;
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.


 var empid 	= document.getElementById('empid').value;
 
 if(empid=='' || empid==null){
 	alert("Please insert employee ID");
	return;
 }

 var queryString="empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/per_delete/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty();
		alert(resp);
			
	}
}

 
}




function ajaxSearch(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }

 
 disable_pi_save();
 
 var empid 	= document.getElementById('pi_empid').value;
 

 var queryString="empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == "Employee ID does not exist"){
			alert(resp);
			empty();
			return;
			}
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('empid').value = personalinfo[0];
		document.getElementById('name').value = personalinfo[1];
		document.getElementById('mname').value = personalinfo[2];
		document.getElementById('fname').value = personalinfo[3];
		document.getElementById('dob').value = personalinfo[4];
		document.getElementById('reli').value = personalinfo[5];
		document.getElementById('sex').value = personalinfo[6];
		document.getElementById('bgroup').value = personalinfo[7];
		
	
		
		//ajaxpeakdata();
		
	}
}

eempid = empid;

//ajaxcominfo();
}


function ajaxpeakdata(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 } 
		//alert(personalinfo[3]);
		document.getElementById("dept").value = personalinfo[3];
		document.getElementById("sec").value  = personalinfo[4];
		
		
	 
}

/// functions for company information===============================================================================

function com_info_insert(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var com_empid = document.getElementById("com_empid").value;
 var idcard = document.getElementById('idcard').value;
 if(com_empid=='' || com_empid==null){
 	alert("Please insert employee ID");
 }
 else if(idcard=='' || idcard==null){
 	alert("Please insert ID card number");
 }
 else
 {
	
	var idcard = document.getElementById('idcard').value;
	var dept = document.getElementById('dept').value;
	var sec = document.getElementById('sec').value;
	var line = document.getElementById('line').value;
	var desig = document.getElementById('desig').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var ejd = document.getElementById('ejd').value;
 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&salg="+salg+"&empstat="+empstat+"&ejd="+ejd;
	//alert(desig);
	ajaxRequest.open("POST", "index.php/payroll_con/com_info_insert/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.cominfo.dept.options.length=0;
		empty_pi();
		alert(resp);
	}
}


}
}

function com_info_edit(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var com_empid = document.getElementById("com_empid").value;
 var idcard = document.getElementById('idcard').value;
 if(com_empid=='' || com_empid==null){
 	alert("Please insert employee ID");
 }
 else if(idcard=='' || idcard==null){
 	alert("Please insert ID card number");
 }
 else
 {
	
	var idcard = document.getElementById('idcard').value;
	var dept = document.getElementById('dept').value;
	var sec = document.getElementById('sec').value;
	var line = document.getElementById('line').value;
	var desig = document.getElementById('desig').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var ejd = document.getElementById('ejd').value;
 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&salg="+salg+"&empstat="+empstat+"&ejd="+ejd;
	
	ajaxRequest.open("POST", "index.php/payroll_con/com_info_edit/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}


}
}

/*function com_info_delete(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var com_empid = document.getElementById("com_empid").value;
 if(com_empid=='' || com_empid==null){
 	alert("Please insert employee ID");
 }
 else
 {
	
	var queryString="com_empid="+com_empid;

	ajaxRequest.open("POST", "index.php/payroll_con/com_info_delete/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}


}
}*/


function com_info_Search(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 disable_save();
 var empid 	= document.getElementById('search_empid').value;
 

 var queryString="empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/com_info_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Employee ID does not exist"){
			alert(resp);
			document.cominfo.dept.options.length=0;
			empty_pi();
			return;
			}
		alldata = resp.split("-*-");
		
		companyinfo = alldata[0].split("=*=");
		
		dept_id_name = alldata[1].split("===");
		dept_id = dept_id_name[0].split("=*=");
		dept_name = dept_id_name[1].split("=*=");
		
		sec_id_name = alldata[2].split("===");
		sec_id = sec_id_name[0].split("***");
		sec_name = sec_id_name[1].split("***");
		
		line_id_name = alldata[3].split("===");
		line_id = line_id_name[0].split("***");
		line_name = line_id_name[1].split("***");
		
		desig_id_name = alldata[4].split("===");
		desig_id = desig_id_name[0].split("***");
		desig_name = desig_id_name[1].split("***");
		
		salg_id_name = alldata[5].split("===");
		salg_id = salg_id_name[0].split("***");
		salg_name = salg_id_name[1].split("***");
		
		empstat_id_name = alldata[6].split("===");
		empstat_id = empstat_id_name[0].split("***");
		empstat_name = empstat_id_name[1].split("***");
		//alert(sec_name);
			
		document.getElementById('com_empid').value = empid;
		
		document.cominfo.idcard.value = companyinfo[1];
		
		document.cominfo.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( companyinfo[2] == dept_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.dept.options[0]=new Option(dept_name[i],dept_id[i], true, false);
			}
		}
		
		document.cominfo.sec.options.length=0;
		for (i=0; i<sec_id.length; i++){
			if( companyinfo[3] == sec_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false,true);
			}
			else
			document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false, false);
			
		}
		
		document.cominfo.line.options.length=0;
		for (i=0; i<line_id.length; i++){
			if( companyinfo[4] == line_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false,true);
			}
			else
			document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false, false);
			
		}
		
		document.cominfo.desig.options.length=0;
		for (i=0; i<desig_id.length; i++){
			if( companyinfo[5] == desig_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false,true);
			}
			else
			document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false, false);
			
		}
		
		document.cominfo.salg.options.length=0;
		for (i=0; i<salg_id.length; i++){
			if( companyinfo[6] == salg_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false,true);
			}
			else
			document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false, false);
			
		}
		
		document.cominfo.empstat.options.length=0;
		for (i=0; i<empstat_id.length; i++){
			if( companyinfo[7] == empstat_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false,true);
			}
			else
			document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false, false);
			
		}
		
		document.getElementById('ejd').value = companyinfo[8];
	}
}

eempid = empid;
}



function com_info_dept(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 var dept = document.getElementById('dept').value;
  
 if(dept=='Select'){
	 alert("Please select Department");
	 return;
	}

 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{

 var queryString="dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/dept_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 

 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.section.options.length=0;
		document.cominfo.section.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_section(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 

 
 var sec = document.getElementById('sec').value;
 var dept = document.getElementById('dept').value;
 
/* if(dept==1){
	 com_info_desig(dept);
	 }*/

 if(sec=='Select'){
	 alert("Please select Section");
	 return;
	}
	
  if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
	
 var queryString="sec="+sec+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/section_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.line.options.length=0;
		/*if(dept!=1){
			document.cominfo.line.options[0]=new Option("Select","Select", true, false); 
		 }*/
		document.cominfo.line.options[0]=new Option("Select","Select", true, false); 
		
		for (i=0; i<sec_id.length; i++){
			document.cominfo.line.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_desig(dept_id){

	var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 

 
 if(dept_id){
	 dept = dept_id;
	 
	 }
	 else{
		 var dept = document.getElementById('dept').value;
		 var line = document.getElementById('line').value;

	if(line=='Select'){
	 alert("Please select Line number");
	 return;
	}
	 }

  if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{

	
	
 var queryString="dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/desig_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.desig.options.length=0;
		document.cominfo.desig.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.desig.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
	}
	

function com_info_grade(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 
 
 var desig = document.getElementById('desig').value;

if(desig=='Select'){
	 alert("Please select Designation");
	 return;
	}

 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
	
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/grade_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.salg.options.length=0;
		document.cominfo.salg.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.salg.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_empstat(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 
		 
 var salg = document.getElementById('salg').value;

if(salg=='Select'){
	 alert("Please select Salary grade");
	 return;
	}
	
 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
	
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/empstat_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.empstat.options.length=0;
		document.cominfo.empstat.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.empstat.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_alert()
{
	var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 var empstat = document.getElementById('empstat').value;

if(empstat=='Select'){
	 alert("Please select Employee status");
	 return;
	}
}

//=================================================================================================================================================================================
//Extra functions

function enable_pi_save(){
	
	document.com_per_info.pi_save.disabled = false;
	document.com_per_info.nempid.focus();
	document.getElementById('pi_empid').value="";
	empty();
	
	}
function disable_pi_save(){
	document.com_per_info.pi_save.disabled = true;
}

function edu_enable_save(){
	document.eduskill.edu_save.disabled = false;
	document.eduskill.edu_empid.focus();
	document.getElementById('edu_skill_empid').value="";
	empty_edu_skill();
}

function edu_disable_save(){
	document.eduskill.edu_save.disabled = true;
}

function enable_save(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/dept/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		dept_idname = resp.split("===");
		dept_id = dept_idname[0].split("=*=");
		dept_name = dept_idname[1].split("=*=");
		
		document.cominfo.dept.options.length=0;
		document.cominfo.dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.cominfo.dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
	document.getElementById('search_empid').value="";
	empty_pi();
	
	document.cominfo.save.disabled = false;
	
	document.cominfo.com_empid.focus();
	}
}
}

function disable_save(){
	document.cominfo.save.disabled = true;
}


//=====================================================================================================================================================================


//-->

MyDesktop = new Ext.app.App({
	init :function(){
		Ext.QuickTips.init();
	},

	getModules : function(){
		return [
		//	new MyDesktop.GridWindow(),
            new MyDesktop.TabWindow(),
            new MyDesktop.AccordionWindow(),
          //  new MyDesktop.BogusMenuModule(),
           // new MyDesktop.BogusModule(),
			new MyDesktop.SalaryGrade(),
			new MyDesktop.Section(),
			new MyDesktop.AttReport()
		];
	},

    // config for the start menu
    getStartConfig : function(){
        return {
            title: 'Payroll System',
            iconCls: 'user',
            toolItems: [{
                text:'',
                iconCls:'',
                scope:this
            },'-',{
                text:'',
                iconCls:'',
                scope:this
            }]
        };
    }
});


/* validation    */
function validateForm()
{
var x=document.forms["eduskill"]["edu_empid"].value
if (x==null || x=="")
  {
  alert("First Employee ID must be filled out");
  return false;
  }
}




//==============================================================================Start Education & Skill=========================================================================

//====================insert=====================================
function ajax_edu_skill_Insert(){
	var validid=validateForm();
	if(validid==false)
	{
		return;
	}
	var okyes;
 okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 var edu_empid 	= document.getElementById('edu_empid').value;
 var edu_last_dg 	= document.getElementById('emp_last_dg').value;
 var edu_pass_year 	= document.getElementById('pass_year').value;
 var edu_istitute	= document.getElementById('edu_insti').value;
 var edu_skil_dept 	= document.getElementById('skill_dept').value;
 var edu_skill_year 	= document.getElementById('skill_year').value;
 var edu_skill_company 	= document.getElementById('skill_com_na').value;


 var queryString="edu_empid="+edu_empid+"&edu_last_dg="+edu_last_dg+"&edu_pass_year="+edu_pass_year+"&edu_istitute="+edu_istitute+"&edu_skil_dept="+edu_skil_dept+"&edu_skill_year="+edu_skill_year+"&edu_skill_company="+edu_skill_company;
 
 ajaxRequest.open("POST", "index.php/payroll_con/edu_skill_insert/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_edu_skl();
		alert(resp);
		
			
	}
}
}


//-------------------------------end----------------------------------
//=======================emty edu skill field==========================
 function empty_edu_skl()
{
	personalinfo=null;	
	document.getElementById('edu_empid').value="";
	document.getElementById('emp_last_dg').value="";
 	document.getElementById('pass_year').value="";
 	document.getElementById('edu_insti').value="";
 	document.getElementById('skill_dept').value="";
	document.getElementById('skill_year').value="";
	document.getElementById('skill_com_na').value="";
	
 }
//-------------------------edu delete-------------------------------
/*function ajax_edu_Delete()
{
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }

 var edu_empid 	= document.getElementById('edu_empid').value;

 var queryString="edu_empid="+edu_empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/ajax_edu_delete/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_edu_skl();
		alert(resp);
			
	}
}

 

	
	}*/
//--------------------------end---------------------------------------
//====================search===============================

function ajaxSearch_edu_skill(){
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 var empid 	= document.getElementById('edu_skill_empid').value;
 document.eduskill.edu_save.disabled = true;


 var queryString="edu_empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/ajaxSearch_edu_skill/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Employee does not exist"){
			alert(resp);
			empty_edu_skill();
			return;
			}
		
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		
		document.getElementById('edu_empid').value = personalinfo[0];
		document.getElementById('emp_last_dg').value = personalinfo[1];
		document.getElementById('pass_year').value = personalinfo[2];
		document.getElementById('edu_insti').value = personalinfo[3];
		document.getElementById('skill_dept').value = personalinfo[4];
		document.getElementById('skill_year').value = personalinfo[5];
		document.getElementById('skill_com_na').value = personalinfo[6];
		//ajaxpeakdata();
		
	}
}


//ajaxcominfo();
}
//============================end search=================================

//===============================start edit education table========================
function ajaxu_edu_update(){
	
 //var okyes;
// okyes=confirm('Are you sure you want to Update this?');
//if(okyes==false) return;
	  var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 var edu_empid 	= document.getElementById('edu_empid').value;
if(edu_empid=='' || edu_empid==null){
 	alert("Please insert employee ID");
	return;
 } 
 var edu_last_dg 	= document.getElementById('emp_last_dg').value;
 var edu_pass_year 	= document.getElementById('pass_year').value;
 var edu_istitute	= document.getElementById('edu_insti').value;
 var edu_skil_dept 	= document.getElementById('skill_dept').value;
 var edu_skill_year 	= document.getElementById('skill_year').value;
 var edu_skill_company 	= document.getElementById('skill_com_na').value;


 var queryString="edu_empid="+edu_empid+"&edu_last_dg="+edu_last_dg+"&edu_pass_year="+edu_pass_year+"&edu_istitute="+edu_istitute+"&edu_skil_dept="+edu_skil_dept+"&edu_skill_year="+edu_skill_year+"&edu_skill_company="+edu_skill_company;
 
 ajaxRequest.open("POST", "index.php/payroll_con/edu_update/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//empty_edu_skl();
		alert(resp);
		
			
	}
}

 
}
//===============================end edit======================

//==========================end emty skill field=================

//==============================================================================End Education & Skill=========================================================================
//==========================================sayed===============================
//=================================Insert================================

function ajax_grade_Insert(){

var validid=validateForm_grade();
if(validid==false)
	{
		return;
	}
var okyes;
 okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 var gr_name 	= document.getElementById('gr_name').value;
 var gr_str_basic 	= document.getElementById('gr_str_basic').value;
 var gr_end_basic 	= document.getElementById('gr_end_basic').value;
 var gr_incr1	= document.getElementById('gr_incr1').value;
 var gr_1st_phase 	= document.getElementById('gr_1st_phase').value;
 var gr_incr2 	= document.getElementById('gr_incr2').value;
 var gr_2nd_phase 	= document.getElementById('gr_2nd_phase').value;


 var queryString="gr_name="+gr_name+"&gr_str_basic="+gr_str_basic+"&gr_end_basic="+gr_end_basic+"&gr_incr1="+gr_incr1+"&gr_1st_phase="+gr_1st_phase+"&gr_incr2="+gr_incr2+"&gr_2nd_phase="+gr_2nd_phase;
 
 ajaxRequest.open("POST", "index.php/payroll_con/grade_insert/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_grade()
		alert(resp);
	}
}
}
//--------------validation for  grade-------------------
function validateForm_grade()
{
var x=document.forms["myForm_grade"]["gr_name"].value
if (x==null || x=="")
  {
  alert("Employee Grade must be filled out");
  return false;
  }
}
//--------------------------for empty------------------------------------
function empty_grade()
{
	personalinfo=null;	
	//document.getElementById('gr_name').value="";
	document.getElementById('gr_str_basic').value="";
	document.getElementById('gr_end_basic').value="";
	document.getElementById('gr_incr1').value="";
	document.getElementById('gr_1st_phase').value="";
	document.getElementById('gr_incr2').value="";
 	document.getElementById('gr_2nd_phase').value="";
	
 }
//==================================insert end===========================

//===================update start=========================================
function ajax_grade_update(){

 //var okyes;
// okyes=confirm('Are you sure you want to Update this?');
//if(okyes==false) return;
  var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.

 var gr_name 	= document.getElementById('gr_name').value;
 var gr_str_basic 	= document.getElementById('gr_str_basic').value;
 var gr_end_basic 	= document.getElementById('gr_end_basic').value;
 var gr_incr1	= document.getElementById('gr_incr1').value;
 var gr_1st_phase 	= document.getElementById('gr_1st_phase').value;
 var gr_incr2 	= document.getElementById('gr_incr2').value;
 var gr_2nd_phase 	= document.getElementById('gr_2nd_phase').value;


 var queryString="gr_name="+gr_name+"&gr_str_basic="+gr_str_basic+"&gr_end_basic="+gr_end_basic+"&gr_incr1="+gr_incr1+"&gr_1st_phase="+gr_1st_phase+"&gr_incr2="+gr_incr2+"&gr_2nd_phase="+gr_2nd_phase;
 
 
 ajaxRequest.open("POST", "index.php/payroll_con/grade_update/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_grade();
		alert(resp);
	}
}

 
}


//------------------------------upadte end----------------------------

//===============================search start===========================
function ajaxSearch_grade(){
	var ajaxRequest;  // The variable that makes Ajax possible!
 try{
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         alert("Your browser broke!");
         return false;
      }
   }
 }
 var gr_name 	= document.getElementById('gr_name').value;
 var queryString="gr_name="+gr_name;
 ajaxRequest.open("POST", "index.php/payroll_con/ajaxSearch_con_grade/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		personalinfo = resp.split("-*-");
		//document.getElementById('gr_id').value = personalinfo[0];
		//document.getElementById('gr_name').value = personalinfo[1];
		document.getElementById('gr_str_basic').value = personalinfo[2];
		document.getElementById('gr_end_basic').value = personalinfo[3];
		document.getElementById('gr_incr1').value = personalinfo[4];
		document.getElementById('gr_1st_phase').value = personalinfo[5];
		document.getElementById('gr_incr2').value = personalinfo[6];
		document.getElementById('gr_2nd_phase').value = personalinfo[7];
	}
}
	
	
	}

//=================================search end==========================

//==========================delete start ===================================
function ajax_grade_Delete()
{
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }

 var gr_name 	= document.getElementById('gr_name').value;

 var queryString="gr_name="+gr_name;
 
 ajaxRequest.open("POST", "index.php/payroll_con/ajax_grade_delete/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alert(resp);
			
	}
}

 

	
}

//=============================delete end===================================
//============================================================================Grade end=====================================================================================

//============================================================================Department  and section start========================================================================

//-----------------------------------insert separtment---------------------------

function validateForm_dept()
{
var x=document.forms["dept_section"]["dpt_name"].value
if (x==null || x=="")
  {
  alert("Department Name must be filled out");
  return false;
  }
}





function ajax_deparment_Insert(){

var validid=validateForm_dept();
if(validid==false)
	{
		return;

	}
var okyes;
okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
 
 var dpt_name 	= document.getElementById('dpt_name').value;

 var queryString="dpt_name="+dpt_name;
 
 ajaxRequest.open("POST", "index.php/payroll_con/department_insert/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp=="Sorry! Duplicate Department Name not allow")
		{
			alert(resp);
			return;
		}
		dept_idname = resp.split("===");
		dept_id = dept_idname[0].split("***");
		dept_name = dept_idname[1].split("***");
		
		document.dept_section.select_dept.options.length=0;
		document.dept_section.select_dept.options[0]=new Option("Select","Select", true, false);
				for (i=0; i<dept_id.length; i++){
					document.dept_section.select_dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);
				
				}
				
		}
	
		//empty_grade()
		//alert(resp);
	}
}

function absent_report()
{
	
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
 var ajaxRequest;  // The variable that makes Ajax possible!
	
 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
        // alert("Your browser broke!");
         return false;
      }
   }
 }
start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;

hostname = window.location.hostname;

url =  "http://"+hostname+"/payroll/index.php/payroll_con/find_late/"+start_date+"/"+end_date;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,width=900,height=300");
myRef.moveTo(0,0);

/* var queryString="null";
 
 ajaxRequest.open("POST", "index.php/payroll_con/find_late/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alert(resp);
			
		}
	}*/

}

//===========================================end sayed==========================
/*
 * Example windows
 */
//MyDesktop.GridWindow = Ext.extend(Ext.app.Module, {//
//    id:'grid-win',
//    init : function(){
//        this.launcher = {
//            text: 'Grid Window',
//            iconCls:'icon-grid',
//            handler : this.createWindow,
//            scope: this
//        }
//    },
//
//    createWindow : function(){
//        var desktop = this.app.getDesktop();
//        var win = desktop.getWindow('grid-win');
//        if(!win){
//            win = desktop.createWindow({
//                id: 'grid-win',
//                title:'Grid Window',
//                width:540,
//                height:480,
//                iconCls: 'icon-grid',
//                shim:false,
//                animCollapse:false,
//                constrainHeader:true,
//
//                layout: 'fit',
//                items:
//                    new Ext.grid.GridPanel({
//                        border:false,
//                        ds: new Ext.data.Store({
//                            reader: new Ext.data.ArrayReader({}, [
//                               {name: 'company'},
//                               {name: 'price', type: 'float'},
//                               {name: 'change', type: 'float'},
//                               {name: 'pctChange', type: 'float'}
//                            ]),
//                            data: Ext.grid.dummyData
//                        }),
//                        cm: new Ext.grid.ColumnModel([
//                            new Ext.grid.RowNumberer(),
//                            {header: "Company", width: 120, sortable: true, dataIndex: 'company'},
//                            {header: "Price", width: 70, sortable: true, renderer: Ext.util.Format.usMoney, dataIndex: 'price'},
//                            {header: "Change", width: 70, sortable: true, dataIndex: 'change'},
//                            {header: "% Change", width: 70, sortable: true, dataIndex: 'pctChange'}
//                        ]),
//
//                        viewConfig: {
//                            forceFit:true
//                        },
//                        autoExpandColumn:'company',
//
//                        tbar:[{
//                            text:'Add Something',
//                            tooltip:'Add a new row',
//                            iconCls:'add'
//                        }, '-', {
//                            text:'Options',
//                            tooltip:'Blah blah blah blaht',
//                            iconCls:'option'
//                        },'-',{
//                            text:'Remove Something',
//                            tooltip:'Remove the selected item',
//                            iconCls:'remove'
//                        }]
//                    })
//            });
//        }
//        win.show();
//    }
//});



MyDesktop.TabWindow = Ext.extend(Ext.app.Module, {
    id:'tab-win',
    init : function(){
        this.launcher = {
            text: 'Employee Setup',
            iconCls:'tabs',
            handler : this.createWindow,
            scope: this
        }
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('tab-win');
        if(!win){
            win = desktop.createWindow({
                id: 'tab-win',
                title:'Employee Setup',
                width:540,
                height:350,
                iconCls: 'tabs',
                shim:false,
                animCollapse:false,
                border:false,
                constrainHeader:true,
				

                layout: 'fit',
                items:
                    new Ext.TabPanel({
                        activeTab:0,

                        items: [{
                            title: 'Personal Info',
                            header:false,
							html : "<br/><form  name='com_per_info' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='30%'>Emp Id</td><td><input type='text' size='40px' name='nempid' id='empid' ></td></tr><tr><td width='20%'>Full Name</td><td><input type='text' size='40px' id='name'></td></tr><tr><td width='20%'>Mother Name</td><td><input type='text' size='40px' id='mname'></td></tr><tr><td width='20%'>Father Name</td><td><input type='text' size='40px' id='fname'></td></tr><tr><td width='20%'>Date Of Birth</td><td><input type='text' size='40px' id='dob' ></td></tr><tr><td width='20%'>Religion</td><td><select id='reli'><option value='1'>Islam</option><option value='2'>Hindu</option><option value='3'>Christian</option><option value='4'>Buddish</option></select></td></tr><tr><td width='20%'>Sex</td><td><select id='sex'><option value='1'>Male</option><option value='2'>Female</option></select></td></tr><tr><td width='20%'>Blood Group</td><td><select id='bgroup'><option value='1'>A+</option><option value='2'>A-</option><option value='3'>B+</option><option value='4'>B-</option><option value='5'>AB+</option><option value='6'>AB-</option><option value='7'>O+</option><option value='8'>O-</option></select></td></tr><br/><tr><td align='right' width='20%'>Find ID:</td><td><input style='background-color:yellow;' type='text' size='15px' name='pi_empid' id='pi_empid' onchange='ajaxSearch()'>&nbsp;<input type='button' name='add' onclick='enable_pi_save()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='ajaxInsert()' value='SAVE'/>&nbsp;<input type='button' onclick='ajaxupdate()' value='EDIT'/>&nbsp;<input type='button' onclick='ajaxDelete()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Company Info',
                            header:false,
                            html : "<br/><script type='text/javascript' src='D:/xampplite/htdocs/payroll/js/jscal/calender.js'></script><form name='cominfo'><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='30%'>Emp ID</td><td><input type='text' size='40px' id='com_empid' name='com_empid'></td></tr><tr><td width='20%'>ID Card #</td><td><input type='text' size='40px' id='idcard'></td></tr><tr><td width='20%'>Department</td><td><select id='dept' name='sele' onchange='com_info_dept()'><option value=''></option></select></td></tr><tr><td width='20%'>Section</td><td><select id='sec' name='section' onchange='com_info_section()'><option value=''></option></select></td></tr><tr><td width='20%'>Line Number</td><td><select id='line' name='line' onchange='com_info_desig()'><option value=''></option></select></td></tr><tr><td width='20%'>Designation</td><td><select id='desig' name='desig' onchange='com_info_grade()'><option value=''></option></select></td></tr><tr><td width='20%'>Salary Grade</td><td><select id='salg' name='salg' onchange='com_info_empstat()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp Status</td><td><select id='empstat' name='empstat' onchange='com_info_alert()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp join date</td><td><input style='width:100px;' type='text' size='40px' id='ejd' name='ejd'><A HREF='' onClick='cal.select(document.forms['cominfo'].ejd,'anchor1','MM/dd/yyyy'); return false;' NAME='anchor1' ID='anchor1'>select</A></td></tr><br/><tr><td align='center' colspan='2'>Find ID :<input style='background-color:yellow;' type='text' size='15px' id='search_empid' name='search_empid' onchange='com_info_Search()'>&nbsp;<input type='button' name='add' onclick='enable_save()' value='NEW'/>&nbsp;<input type='button' name='save' disabled='disabled' onclick='com_info_insert()' value='SAVE'/>&nbsp;<input type='button' onclick='com_info_edit()' value='EDIT'/></td></tr></table></form>",
                            border:false
                        },{
                            title: 'Education & Skill',
                            header:false,
                            html : "<br/><form  name='eduskill' ><table width='100%' border='0' align='center'><tr><td width='30%'>Emp ID</td><td><input type='text' size='30px' id='edu_empid' ></td></tr><tr><td width='30%'>Emp Last Dgree</td><td><input type='text' size='30px' id='emp_last_dg'></td></tr><tr><td width='20%'>Passing year</td><td><input type='text' size='30px' id='pass_year'></td></tr><tr><td width='30%'>Passing Institute</td><td><input type='text' size='30px' id='edu_insti'></td></tr><tr><td width='20%'>Emp skill dept.</td><td><input type='text' size='30px' id='skill_dept'></td></tr><tr><td width='30%'>Year of Skill</td><td><input type='text' size='30px' id='skill_year'></td></tr><tr><td width='20%'>Company Name</td><td><input type='text' size='30px' id='skill_com_na'></td></tr><br/><tr><td align='right' width='20%'>Find ID :</td><td><input style='background-color:yellow;' type='text' size='15px' id='edu_skill_empid' onchange='ajaxSearch_edu_skill()' ><input type='button' name='add' onclick='edu_enable_save()' value='NEW'/><input type='button' name='edu_save' disabled='disabled' onclick='ajax_edu_skill_Insert()' value='SAVE'/><input type='button' onclick='ajaxu_edu_update()' value='EDIT'/></td></tr></table></form>",
                            border:false
                        }]
                    })
            });
        }
        win.show();
    }
});

function sayed()
{
	alert("ssfsfs");
	}

MyDesktop.AccordionWindow = Ext.extend(Ext.app.Module, {
    id:'acc-win',
    init : function(){
        this.launcher = {
            text: 'Accordion Window',
            iconCls:'accordion',
          //  handler : this.createWindow,
			//url = "http://localhost/payroll/index.php/payroll_con/find_late/";
			//myRef = window.open(url,'mywin',"menubar=1,resizable=1,width=900,height=300");
		//	myRef.moveTo(0,0);
            scope: this
			
			
        }
    }

//    createWindow : function(){
//		
//		
//        var desktop = this.app.getDesktop();
//        var win = desktop.getWindow('acc-win');
//        if(!win){
//            win = desktop.createWindow({html :"<input type='button' onclick='ajaxu_edu_update()' value='EDIT'/>"});
//        }
//        win.show();
//    }
//sayed();
});

// for example purposes
var windowIndex = 0;

//MyDesktop.BogusModule = Ext.extend(Ext.app.Module, {//
//    init : function(){
//        this.launcher = {
//            text: 'Window '+(++windowIndex),
//            iconCls:'bogus',
//            handler : this.createWindow,
//            scope: this,
//            windowId:windowIndex
//        }
//    },
//
//    createWindow : function(src){
//        var desktop = this.app.getDesktop();
//        var win = desktop.getWindow('bogus'+src.windowId);
//        if(!win){
//            win = desktop.createWindow({
//                id: 'bogus'+src.windowId,
//                title:src.text,
//                width:540,
//                height:480,
//                html : '<p>Something useful would be in here.</p>',
//                iconCls: 'bogus',
//                shim:false,
//                animCollapse:false,
//                constrainHeader:true
//            });
//        }
//        win.show();
//    }
//});

//----------------------------------------salary grate-----------------------
MyDesktop.SalaryGrade = Ext.extend(Ext.app.Module, {
	id:'bogus-salg',
    init : function(){
        this.launcher = {
            text: 'Salary Grade ',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('bogus-salg');
        if(!win){
            win = desktop.createWindow({
                id:'bogus-salg',
                title:src.text,
                width:640,
                height:480,
                html : "<br/><br/><form  name='myForm_grade'><table width='90%' border='1' align='center'><tr><td width='40%'>Grade Name</td><td><input type='text' size='40px' id='gr_name' onchange='ajaxSearch_grade()' ></td></tr><tr><td width='40%'>Basic Salary(Start)</td><td><input type='text' size='40px' id='gr_str_basic'></td></tr><tr><td width='20%'>Basic Salary (End)</td><td><input type='text' size='40px' id='gr_end_basic'></td></tr><tr><td width='20%'>Grade Incriment (1st)</td><td><input type='text' size='40px' id='gr_incr1'></td></tr><tr><td width='20%'>Grade phase (1st)</td><td><input type='text' size='40px' id='gr_1st_phase'></td></tr><tr><td width='20%'>Grade Incriment (2nd)</td><td><input type='text' size='40px' id='gr_incr2'></td></tr><tr><td width='20%'>Grade Phase(2nd)</td><td><input type='text' size='40px' id='gr_2nd_phase'></td></tr><tr><td align='right' colspan='2'><input type='button' onclick='ajax_grade_Insert()' value='INSERT'/><input type='button' onclick='ajax_grade_update()' value='UPDATE'/><input type='button' onclick='ajax_grade_Delete()' value='DELETE'/</td></tr></table></form>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});


MyDesktop.AttReport = Ext.extend(Ext.app.Module, {
	id:'bogus-att-report',
    init : function(){
        this.launcher = {
            text: 'Attendance Report',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('bogus-att-report');
        if(!win){
            win = desktop.createWindow({
                id: 'bogus-att-report',
                title:src.text,
                width:540,
                height:350,
                html : "<form  name='attendance_report'><br/><table width='100%' border='1' align='center'><tr><td>Start Date<input type='text' size='20px' id='start_date' onchange='start_date()' ></td><td>End Date<input type='text' size='20px' id='end_date' onchange='end_date()' ></td></tr><tr><td align='center' colspan='2'><input type='button' onclick='late_commer_report()' value='Late comer report'/><input type='button' onclick='absent_report()' value='Absent report'/><input type='button' onclick='attendance_report()' value='Attendance report'/></td></tr></table></from>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});





MyDesktop.Section = Ext.extend(Ext.app.Module, {
    init : function(){
        this.launcher = {
            text: 'Section',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('bogus'+src.windowId);
        if(!win){
            win = desktop.createWindow({
                id: 'bogus'+src.windowId,
                title:src.text,
                width:640,
                height:380,
                html : "<form  name='dept_section'><br/><br/><div style='border:#0000FF 1px solid;'><br/><br/><table width='90%' border='1' align='center'><tr><td width='40%'>Depertment name</td><td><input type='text' size='40px' id='dpt_name' onchange='ajaxSearch_deparment()' ></td></tr><tr><td align='center' colspan='2'><input type='button' onclick='ajax_deparment_Insert()' value='INSERT'/><input type='button' onclick='ajax_deparment_Delete()' value='DELETE'  /></td></tr></table><br/><br/></div><br/><br/><div style='border:#0000FF 1px solid;'><br/><br/><table width='90%' border='1' align='center'><tr><td width='40%'>Section name</td><td><input type='text' size='40px' id='section_name' onchange='ajaxSearch_section()' ></td></tr><tr><tr><td width='40%'>Department name</td><td><select name='select_dept'><option value=''></option></select></td></tr><tr><td align='center' colspan='2'><input type='button' onclick='ajax_section_Insert()' value='INSERT'/><input type='button' onclick='ajax_section_update()' value='UPDATE'/><input type='button' onclick='ajax_section_Delete()' value='DELETE'  /></td></tr><br/><br/></table></div><table><tr><td><tr><td align='center' colspan='2'><input type='button' onclick='report_not_attend()' value='Late'/></td></tr></table></form>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});


//MyDesktop.BogusMenuModule = Ext.extend(MyDesktop.BogusModule, {//
//    init : function(){
//        this.launcher = {
//            text: 'Bogus Submenu',
//            iconCls: 'bogus',
//            handler: function() {
//				return false;
//			},
//            menu: {
//                items:[{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                }]
//            }
//        }
//    }
//});


// Array data for the grid
Ext.grid.dummyData = [
    ['3m Co',71.72,0.02,0.03,'9/1 12:00am'],
    ['Alcoa Inc',29.01,0.42,1.47,'9/1 12:00am'],
    ['American Express Company',52.55,0.01,0.02,'9/1 12:00am'],
    ['American International Group, Inc.',64.13,0.31,0.49,'9/1 12:00am'],
    ['AT&T Inc.',31.61,-0.48,-1.54,'9/1 12:00am'],
    ['Caterpillar Inc.',67.27,0.92,1.39,'9/1 12:00am'],
    ['Citigroup, Inc.',49.37,0.02,0.04,'9/1 12:00am'],
    ['Exxon Mobil Corp',68.1,-0.43,-0.64,'9/1 12:00am'],
    ['General Electric Company',34.14,-0.08,-0.23,'9/1 12:00am'],
    ['General Motors Corporation',30.27,1.09,3.74,'9/1 12:00am'],
    ['Hewlett-Packard Co.',36.53,-0.03,-0.08,'9/1 12:00am'],
    ['Honeywell Intl Inc',38.77,0.05,0.13,'9/1 12:00am'],
    ['Intel Corporation',19.88,0.31,1.58,'9/1 12:00am'],
    ['Johnson & Johnson',64.72,0.06,0.09,'9/1 12:00am'],
    ['Merck & Co., Inc.',40.96,0.41,1.01,'9/1 12:00am'],
    ['Microsoft Corporation',25.84,0.14,0.54,'9/1 12:00am'],
    ['The Coca-Cola Company',45.07,0.26,0.58,'9/1 12:00am'],
    ['The Procter & Gamble Company',61.91,0.01,0.02,'9/1 12:00am'],
    ['Wal-Mart Stores, Inc.',45.45,0.73,1.63,'9/1 12:00am'],
    ['Walt Disney Company (The) (Holding Company)',29.89,0.24,0.81,'9/1 12:00am']
];