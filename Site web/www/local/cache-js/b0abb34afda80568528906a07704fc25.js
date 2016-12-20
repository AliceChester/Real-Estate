/* compact [
	../prive/javascript/jquery.js
	../prive/javascript/jquery.form.js
	../prive/javascript/ajaxCallback.js
	../prive/javascript/jquery.cookie.js
	../prive/javascript/layer.js
	../prive/javascript/presentation.js
	../prive/javascript/gadgets.js
	../extensions/porte_plume/javascript/xregexp-min.js
	../extensions/porte_plume/javascript/jquery.markitup_pour_spip.js
	../extensions/porte_plume/javascript/jquery.previsu_spip.js
	page=porte_plume_start.js(lang=fr)
	../extensions/porte_plume/javascript/porte_plume_forcer_hauteur.js
	../plugins/auto/forms_et_tables_2_0/javascript/iautocompleter.js
	../plugins/auto/forms_et_tables_2_0/javascript/interface.js
	../plugins/auto/forms_et_tables_2_0/javascript/forms_lier_donnees.js
	../local/couteau-suisse/header_prive.js
	page=ckeditor4spip.js
] 71.7% */

/* ../prive/javascript/jquery.js */

(function(window,undefined){
var document=window.document;
var jQuery=(function(){
var jQuery=function(selector,context){
return new jQuery.fn.init(selector,context)},
_jQuery=window.jQuery,
_$=window.$,
rootjQuery,
quickExpr=/^(?:[^<]*(<[\w\W]+>)[^>]*$|#([\w\-]+)$)/,
isSimple=/^.[^:#\[\.,]*$/,
rnotwhite=/\S/,
rwhite=/\s/,
trimLeft=/^\s+/,
trimRight=/\s+$/,
rnonword=/\W/,
rdigit=/\d/,
rsingleTag=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,
rvalidchars=/^[\],:{}\s]*$/,
rvalidescape=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,
rvalidtokens=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,
rvalidbraces=/(?:^|:|,)(?:\s*\[)+/g,
rwebkit=/(webkit)[ \/]([\w.]+)/,
ropera=/(opera)(?:.*version)?[ \/]([\w.]+)/,
rmsie=/(msie) ([\w.]+)/,
rmozilla=/(mozilla)(?:.*? rv:([\w.]+))?/,
userAgent=navigator.userAgent,
browserMatch,
readyBound=false,
readyList=[],
DOMContentLoaded,
toString=Object.prototype.toString,
hasOwn=Object.prototype.hasOwnProperty,
push=Array.prototype.push,
slice=Array.prototype.slice,
trim=String.prototype.trim,
indexOf=Array.prototype.indexOf,
class2type={};
jQuery.fn=jQuery.prototype={
init:function(selector,context){
var match,elem,ret,doc;
if(!selector){
return this}
if(selector.nodeType){
this.context=this[0]=selector;
this.length=1;
return this}
if(selector==="body"&&!context&&document.body){
this.context=document;
this[0]=document.body;
this.selector="body";
this.length=1;
return this}
if(typeof selector==="string"){
match=quickExpr.exec(selector);
if(match&&(match[1]||!context)){
if(match[1]){
doc=(context?context.ownerDocument||context:document);
ret=rsingleTag.exec(selector);
if(ret){
if(jQuery.isPlainObject(context)){
selector=[document.createElement(ret[1])];
jQuery.fn.attr.call(selector,context,true)}else{
selector=[doc.createElement(ret[1])]}
}else{
ret=jQuery.buildFragment([match[1]],[doc]);
selector=(ret.cacheable?ret.fragment.cloneNode(true):ret.fragment).childNodes}
return jQuery.merge(this,selector)}else{
elem=document.getElementById(match[2]);
if(elem&&elem.parentNode){
if(elem.id!==match[2]){
return rootjQuery.find(selector)}
this.length=1;
this[0]=elem}
this.context=document;
this.selector=selector;
return this}
}else if(!context&&!rnonword.test(selector)){
this.selector=selector;
this.context=document;
selector=document.getElementsByTagName(selector);
return jQuery.merge(this,selector)}else if(!context||context.jquery){
return(context||rootjQuery).find(selector)}else{
return jQuery(context).find(selector)}
}else if(jQuery.isFunction(selector)){
return rootjQuery.ready(selector)}
if(selector.selector!==undefined){
this.selector=selector.selector;
this.context=selector.context}
return jQuery.makeArray(selector,this)},
selector:"",
jquery:"1.4.4",
length:0,
size:function(){
return this.length},
toArray:function(){
return slice.call(this,0)},
get:function(num){
return num==null?
this.toArray():
(num<0?this.slice(num)[0]:this[num])},
pushStack:function(elems,name,selector){
var ret=jQuery();
if(jQuery.isArray(elems)){
push.apply(ret,elems)}else{
jQuery.merge(ret,elems)}
ret.prevObject=this;
ret.context=this.context;
if(name==="find"){
ret.selector=this.selector+(this.selector?" ":"")+selector}else if(name){
ret.selector=this.selector+"."+name+"("+selector+")"}
return ret},
each:function(callback,args){
return jQuery.each(this,callback,args)},
ready:function(fn){
jQuery.bindReady();
if(jQuery.isReady){
fn.call(document,jQuery)}else if(readyList){
readyList.push(fn)}
return this},
eq:function(i){
return i===-1?
this.slice(i):
this.slice(i,+i+1)},
first:function(){
return this.eq(0)},
last:function(){
return this.eq(-1)},
slice:function(){
return this.pushStack(slice.apply(this,arguments),
"slice",slice.call(arguments).join(","))},
map:function(callback){
return this.pushStack(jQuery.map(this,function(elem,i){
return callback.call(elem,i,elem)}))},
end:function(){
return this.prevObject||jQuery(null)},
push:push,
sort:[].sort,
splice:[].splice
};
jQuery.fn.init.prototype=jQuery.fn;
jQuery.extend=jQuery.fn.extend=function(){
var options,name,src,copy,copyIsArray,clone,
target=arguments[0]||{},
i=1,
length=arguments.length,
deep=false;
if(typeof target==="boolean"){
deep=target;
target=arguments[1]||{};
i=2}
if(typeof target!=="object"&&!jQuery.isFunction(target)){
target={}}
if(length===i){
target=this;
--i}
for(;i<length;i++){
if((options=arguments[i])!=null){
for(name in options){
src=target[name];
copy=options[name];
if(target===copy){
continue}
if(deep&&copy&&(jQuery.isPlainObject(copy)||(copyIsArray=jQuery.isArray(copy)))){
if(copyIsArray){
copyIsArray=false;
clone=src&&jQuery.isArray(src)?src:[]}else{
clone=src&&jQuery.isPlainObject(src)?src:{}}
target[name]=jQuery.extend(deep,clone,copy)}else if(copy!==undefined){
target[name]=copy}
}
}
}
return target};
jQuery.extend({
noConflict:function(deep){
window.$=_$;
if(deep){
window.jQuery=_jQuery}
return jQuery},
isReady:false,
readyWait:1,
ready:function(wait){
if(wait===true){
jQuery.readyWait--}
if(!jQuery.readyWait||(wait!==true&&!jQuery.isReady)){
if(!document.body){
return setTimeout(jQuery.ready,1)}
jQuery.isReady=true;
if(wait!==true&&--jQuery.readyWait>0){
return}
if(readyList){
var fn,
i=0,
ready=readyList;
readyList=null;
while((fn=ready[i++])){
fn.call(document,jQuery)}
if(jQuery.fn.trigger){
jQuery(document).trigger("ready").unbind("ready")}
}
}
},
bindReady:function(){
if(readyBound){
return}
readyBound=true;
if(document.readyState==="complete"){
return setTimeout(jQuery.ready,1)}
if(document.addEventListener){
document.addEventListener("DOMContentLoaded",DOMContentLoaded,false);
window.addEventListener("load",jQuery.ready,false)}else if(document.attachEvent){
document.attachEvent("onreadystatechange",DOMContentLoaded);
window.attachEvent("onload",jQuery.ready);
var toplevel=false;
try{
toplevel=window.frameElement==null}catch(e){}
if(document.documentElement.doScroll&&toplevel){
doScrollCheck()}
}
},
isFunction:function(obj){
return jQuery.type(obj)==="function"},
isArray:Array.isArray||function(obj){
return jQuery.type(obj)==="array"},
isWindow:function(obj){
return obj&&typeof obj==="object"&&"setInterval"in obj},
isNaN:function(obj){
return obj==null||!rdigit.test(obj)||isNaN(obj)},
type:function(obj){
return obj==null?
String(obj):
class2type[toString.call(obj)]||"object"},
isPlainObject:function(obj){
if(!obj||jQuery.type(obj)!=="object"||obj.nodeType||jQuery.isWindow(obj)){
return false}
if(obj.constructor&&
!hasOwn.call(obj,"constructor")&&
!hasOwn.call(obj.constructor.prototype,"isPrototypeOf")){
return false}
var key;
for(key in obj){}
return key===undefined||hasOwn.call(obj,key)},
isEmptyObject:function(obj){
for(var name in obj){
return false}
return true},
error:function(msg){
throw msg},
parseJSON:function(data){
if(typeof data!=="string"||!data){
return null}
data=jQuery.trim(data);
if(rvalidchars.test(data.replace(rvalidescape,"@")
.replace(rvalidtokens,"]")
.replace(rvalidbraces,""))){
return window.JSON&&window.JSON.parse?
window.JSON.parse(data):
(new Function("return "+data))()}else{
jQuery.error("Invalid JSON: "+data)}
},
noop:function(){},
globalEval:function(data){
if(data&&rnotwhite.test(data)){
var head=document.getElementsByTagName("head")[0]||document.documentElement,
script=document.createElement("script");
script.type="text/javascript";
if(jQuery.support.scriptEval){
script.appendChild(document.createTextNode(data))}else{
script.text=data}
head.insertBefore(script,head.firstChild);
head.removeChild(script)}
},
nodeName:function(elem,name){
return elem.nodeName&&elem.nodeName.toUpperCase()===name.toUpperCase()},
each:function(object,callback,args){
var name,i=0,
length=object.length,
isObj=length===undefined||jQuery.isFunction(object);
if(args){
if(isObj){
for(name in object){
if(callback.apply(object[name],args)===false){
break}
}
}else{
for(;i<length;){
if(callback.apply(object[i++],args)===false){
break}
}
}
}else{
if(isObj){
for(name in object){
if(callback.call(object[name],name,object[name])===false){
break}
}
}else{
for(var value=object[0];
i<length&&callback.call(value,i,value)!==false;value=object[++i]){}
}
}
return object},
trim:trim?
function(text){
return text==null?
"":
trim.call(text)}:
function(text){
return text==null?
"":
text.toString().replace(trimLeft,"").replace(trimRight,"")},
makeArray:function(array,results){
var ret=results||[];
if(array!=null){
var type=jQuery.type(array);
if(array.length==null||type==="string"||type==="function"||type==="regexp"||jQuery.isWindow(array)){
push.call(ret,array)}else{
jQuery.merge(ret,array)}
}
return ret},
inArray:function(elem,array){
if(array.indexOf){
return array.indexOf(elem)}
for(var i=0,length=array.length;i<length;i++){
if(array[i]===elem){
return i}
}
return-1},
merge:function(first,second){
var i=first.length,
j=0;
if(typeof second.length==="number"){
for(var l=second.length;j<l;j++){
first[i++]=second[j]}
}else{
while(second[j]!==undefined){
first[i++]=second[j++]}
}
first.length=i;
return first},
grep:function(elems,callback,inv){
var ret=[],retVal;
inv=!!inv;
for(var i=0,length=elems.length;i<length;i++){
retVal=!!callback(elems[i],i);
if(inv!==retVal){
ret.push(elems[i])}
}
return ret},
map:function(elems,callback,arg){
var ret=[],value;
for(var i=0,length=elems.length;i<length;i++){
value=callback(elems[i],i,arg);
if(value!=null){
ret[ret.length]=value}
}
return ret.concat.apply([],ret)},
guid:1,
proxy:function(fn,proxy,thisObject){
if(arguments.length===2){
if(typeof proxy==="string"){
thisObject=fn;
fn=thisObject[proxy];
proxy=undefined}else if(proxy&&!jQuery.isFunction(proxy)){
thisObject=proxy;
proxy=undefined}
}
if(!proxy&&fn){
proxy=function(){
return fn.apply(thisObject||this,arguments)}}
if(fn){
proxy.guid=fn.guid=fn.guid||proxy.guid||jQuery.guid++}
return proxy},
access:function(elems,key,value,exec,fn,pass){
var length=elems.length;
if(typeof key==="object"){
for(var k in key){
jQuery.access(elems,k,key[k],exec,fn,value)}
return elems}
if(value!==undefined){
exec=!pass&&exec&&jQuery.isFunction(value);
for(var i=0;i<length;i++){
fn(elems[i],key,exec?value.call(elems[i],i,fn(elems[i],key)):value,pass)}
return elems}
return length?fn(elems[0],key):undefined},
now:function(){
return(new Date()).getTime()},
uaMatch:function(ua){
ua=ua.toLowerCase();
var match=rwebkit.exec(ua)||
ropera.exec(ua)||
rmsie.exec(ua)||
ua.indexOf("compatible")<0&&rmozilla.exec(ua)||
[];
return{browser:match[1]||"",version:match[2]||"0"}},
browser:{}
});
jQuery.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(i,name){
class2type["[object "+name+"]"]=name.toLowerCase()});
browserMatch=jQuery.uaMatch(userAgent);
if(browserMatch.browser){
jQuery.browser[browserMatch.browser]=true;
jQuery.browser.version=browserMatch.version}
if(jQuery.browser.webkit){
jQuery.browser.safari=true}
if(indexOf){
jQuery.inArray=function(elem,array){
return indexOf.call(array,elem)}}
if(!rwhite.test("\xA0")){
trimLeft=/^[\s\xA0]+/;
trimRight=/[\s\xA0]+$/}
rootjQuery=jQuery(document);
if(document.addEventListener){
DOMContentLoaded=function(){
document.removeEventListener("DOMContentLoaded",DOMContentLoaded,false);
jQuery.ready()}}else if(document.attachEvent){
DOMContentLoaded=function(){
if(document.readyState==="complete"){
document.detachEvent("onreadystatechange",DOMContentLoaded);
jQuery.ready()}
}}
function doScrollCheck(){
if(jQuery.isReady){
return}
try{
document.documentElement.doScroll("left")}catch(e){
setTimeout(doScrollCheck,1);
return}
jQuery.ready()}
return(window.jQuery=window.$=jQuery)})();
(function(){
jQuery.support={};
var root=document.documentElement,
script=document.createElement("script"),
div=document.createElement("div"),
id="script"+jQuery.now();
div.style.display="none";
div.innerHTML="   <link/><table></table><a href='/a' style='color:red;float:left;opacity:.55;'>a</a><input type='checkbox'/>";
var all=div.getElementsByTagName("*"),
a=div.getElementsByTagName("a")[0],
select=document.createElement("select"),
opt=select.appendChild(document.createElement("option"));
if(!all||!all.length||!a){
return}
jQuery.support={
leadingWhitespace:div.firstChild.nodeType===3,
tbody:!div.getElementsByTagName("tbody").length,
htmlSerialize:!!div.getElementsByTagName("link").length,
style:/red/.test(a.getAttribute("style")),
hrefNormalized:a.getAttribute("href")==="/a",
opacity:/^0.55$/.test(a.style.opacity),
cssFloat:!!a.style.cssFloat,
checkOn:div.getElementsByTagName("input")[0].value==="on",
optSelected:opt.selected,
deleteExpando:true,
optDisabled:false,
checkClone:false,
scriptEval:false,
noCloneEvent:true,
boxModel:null,
inlineBlockNeedsLayout:false,
shrinkWrapBlocks:false,
reliableHiddenOffsets:true
};
select.disabled=true;
jQuery.support.optDisabled=!opt.disabled;
script.type="text/javascript";
try{
script.appendChild(document.createTextNode("window."+id+"=1;"))}catch(e){}
root.insertBefore(script,root.firstChild);
if(window[id]){
jQuery.support.scriptEval=true;
delete window[id]}
try{
delete script.test}catch(e){
jQuery.support.deleteExpando=false}
root.removeChild(script);
if(div.attachEvent&&div.fireEvent){
div.attachEvent("onclick",function click(){
jQuery.support.noCloneEvent=false;
div.detachEvent("onclick",click)});
div.cloneNode(true).fireEvent("onclick")}
div=document.createElement("div");
div.innerHTML="<input type='radio' name='radiotest' checked='checked'/>";
var fragment=document.createDocumentFragment();
fragment.appendChild(div.firstChild);
jQuery.support.checkClone=fragment.cloneNode(true).cloneNode(true).lastChild.checked;
jQuery(function(){
var div=document.createElement("div");
div.style.width=div.style.paddingLeft="1px";
document.body.appendChild(div);
jQuery.boxModel=jQuery.support.boxModel=div.offsetWidth===2;
if("zoom"in div.style){
div.style.display="inline";
div.style.zoom=1;
jQuery.support.inlineBlockNeedsLayout=div.offsetWidth===2;
div.style.display="";
div.innerHTML="<div style='width:4px;'></div>";
jQuery.support.shrinkWrapBlocks=div.offsetWidth!==2}
div.innerHTML="<table><tr><td style='padding:0;display:none'></td><td>t</td></tr></table>";
var tds=div.getElementsByTagName("td");
jQuery.support.reliableHiddenOffsets=tds[0].offsetHeight===0;
tds[0].style.display="";
tds[1].style.display="none";
jQuery.support.reliableHiddenOffsets=jQuery.support.reliableHiddenOffsets&&tds[0].offsetHeight===0;
div.innerHTML="";
document.body.removeChild(div).style.display="none";
div=tds=null});
var eventSupported=function(eventName){
var el=document.createElement("div");
eventName="on"+eventName;
var isSupported=(eventName in el);
if(!isSupported){
el.setAttribute(eventName,"return;");
isSupported=typeof el[eventName]==="function"}
el=null;
return isSupported};
jQuery.support.submitBubbles=eventSupported("submit");
jQuery.support.changeBubbles=eventSupported("change");
root=script=div=all=a=null})();
var windowData={},
rbrace=/^(?:\{.*\}|\[.*\])$/;
jQuery.extend({
cache:{},
uuid:0,
expando:"jQuery"+jQuery.now(),
noData:{
"embed":true,
"object":"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
"applet":true
},
data:function(elem,name,data){
if(!jQuery.acceptData(elem)){
return}
elem=elem==window?
windowData:
elem;
var isNode=elem.nodeType,
id=isNode?elem[jQuery.expando]:null,
cache=jQuery.cache,thisCache;
if(isNode&&!id&&typeof name==="string"&&data===undefined){
return}
if(!isNode){
cache=elem}else if(!id){
elem[jQuery.expando]=id=++jQuery.uuid}
if(typeof name==="object"){
if(isNode){
cache[id]=jQuery.extend(cache[id],name)}else{
jQuery.extend(cache,name)}
}else if(isNode&&!cache[id]){
cache[id]={}}
thisCache=isNode?cache[id]:cache;
if(data!==undefined){
thisCache[name]=data}
return typeof name==="string"?thisCache[name]:thisCache},
removeData:function(elem,name){
if(!jQuery.acceptData(elem)){
return}
elem=elem==window?
windowData:
elem;
var isNode=elem.nodeType,
id=isNode?elem[jQuery.expando]:elem,
cache=jQuery.cache,
thisCache=isNode?cache[id]:id;
if(name){
if(thisCache){
delete thisCache[name];
if(isNode&&jQuery.isEmptyObject(thisCache)){
jQuery.removeData(elem)}
}
}else{
if(isNode&&jQuery.support.deleteExpando){
delete elem[jQuery.expando]}else if(elem.removeAttribute){
elem.removeAttribute(jQuery.expando)}else if(isNode){
delete cache[id]}else{
for(var n in elem){
delete elem[n]}
}
}
},
acceptData:function(elem){
if(elem.nodeName){
var match=jQuery.noData[elem.nodeName.toLowerCase()];
if(match){
return!(match===true||elem.getAttribute("classid")!==match)}
}
return true}
});
jQuery.fn.extend({
data:function(key,value){
var data=null;
if(typeof key==="undefined"){
if(this.length){
var attr=this[0].attributes,name;
data=jQuery.data(this[0]);
for(var i=0,l=attr.length;i<l;i++){
name=attr[i].name;
if(name.indexOf("data-")===0){
name=name.substr(5);
dataAttr(this[0],name,data[name])}
}
}
return data}else if(typeof key==="object"){
return this.each(function(){
jQuery.data(this,key)})}
var parts=key.split(".");
parts[1]=parts[1]?"."+parts[1]:"";
if(value===undefined){
data=this.triggerHandler("getData"+parts[1]+"!",[parts[0]]);
if(data===undefined&&this.length){
data=jQuery.data(this[0],key);
data=dataAttr(this[0],key,data)}
return data===undefined&&parts[1]?
this.data(parts[0]):
data}else{
return this.each(function(){
var $this=jQuery(this),
args=[parts[0],value];
$this.triggerHandler("setData"+parts[1]+"!",args);
jQuery.data(this,key,value);
$this.triggerHandler("changeData"+parts[1]+"!",args)})}
},
removeData:function(key){
return this.each(function(){
jQuery.removeData(this,key)})}
});
function dataAttr(elem,key,data){
if(data===undefined&&elem.nodeType===1){
data=elem.getAttribute("data-"+key);
if(typeof data==="string"){
try{
data=data==="true"?true:
data==="false"?false:
data==="null"?null:
!jQuery.isNaN(data)?parseFloat(data):
rbrace.test(data)?jQuery.parseJSON(data):
data}catch(e){}
jQuery.data(elem,key,data)}else{
data=undefined}
}
return data}
jQuery.extend({
queue:function(elem,type,data){
if(!elem){
return}
type=(type||"fx")+"queue";
var q=jQuery.data(elem,type);
if(!data){
return q||[]}
if(!q||jQuery.isArray(data)){
q=jQuery.data(elem,type,jQuery.makeArray(data))}else{
q.push(data)}
return q},
dequeue:function(elem,type){
type=type||"fx";
var queue=jQuery.queue(elem,type),
fn=queue.shift();
if(fn==="inprogress"){
fn=queue.shift()}
if(fn){
if(type==="fx"){
queue.unshift("inprogress")}
fn.call(elem,function(){
jQuery.dequeue(elem,type)})}
}
});
jQuery.fn.extend({
queue:function(type,data){
if(typeof type!=="string"){
data=type;
type="fx"}
if(data===undefined){
return jQuery.queue(this[0],type)}
return this.each(function(i){
var queue=jQuery.queue(this,type,data);
if(type==="fx"&&queue[0]!=="inprogress"){
jQuery.dequeue(this,type)}
})},
dequeue:function(type){
return this.each(function(){
jQuery.dequeue(this,type)})},
delay:function(time,type){
time=jQuery.fx?jQuery.fx.speeds[time]||time:time;
type=type||"fx";
return this.queue(type,function(){
var elem=this;
setTimeout(function(){
jQuery.dequeue(elem,type)},time)})},
clearQueue:function(type){
return this.queue(type||"fx",[])}
});
var rclass=/[\n\t]/g,
rspaces=/\s+/,
rreturn=/\r/g,
rspecialurl=/^(?:href|src|style)$/,
rtype=/^(?:button|input)$/i,
rfocusable=/^(?:button|input|object|select|textarea)$/i,
rclickable=/^a(?:rea)?$/i,
rradiocheck=/^(?:radio|checkbox)$/i;
jQuery.props={
"for":"htmlFor",
"class":"className",
readonly:"readOnly",
maxlength:"maxLength",
cellspacing:"cellSpacing",
rowspan:"rowSpan",
colspan:"colSpan",
tabindex:"tabIndex",
usemap:"useMap",
frameborder:"frameBorder"
};
jQuery.fn.extend({
attr:function(name,value){
return jQuery.access(this,name,value,true,jQuery.attr)},
removeAttr:function(name,fn){
return this.each(function(){
jQuery.attr(this,name,"");
if(this.nodeType===1){
this.removeAttribute(name)}
})},
addClass:function(value){
if(jQuery.isFunction(value)){
return this.each(function(i){
var self=jQuery(this);
self.addClass(value.call(this,i,self.attr("class")))})}
if(value&&typeof value==="string"){
var classNames=(value||"").split(rspaces);
for(var i=0,l=this.length;i<l;i++){
var elem=this[i];
if(elem.nodeType===1){
if(!elem.className){
elem.className=value}else{
var className=" "+elem.className+" ",
setClass=elem.className;
for(var c=0,cl=classNames.length;c<cl;c++){
if(className.indexOf(" "+classNames[c]+" ")<0){
setClass+=" "+classNames[c]}
}
elem.className=jQuery.trim(setClass)}
}
}
}
return this},
removeClass:function(value){
if(jQuery.isFunction(value)){
return this.each(function(i){
var self=jQuery(this);
self.removeClass(value.call(this,i,self.attr("class")))})}
if((value&&typeof value==="string")||value===undefined){
var classNames=(value||"").split(rspaces);
for(var i=0,l=this.length;i<l;i++){
var elem=this[i];
if(elem.nodeType===1&&elem.className){
if(value){
var className=(" "+elem.className+" ").replace(rclass," ");
for(var c=0,cl=classNames.length;c<cl;c++){
className=className.replace(" "+classNames[c]+" "," ")}
elem.className=jQuery.trim(className)}else{
elem.className=""}
}
}
}
return this},
toggleClass:function(value,stateVal){
var type=typeof value,
isBool=typeof stateVal==="boolean";
if(jQuery.isFunction(value)){
return this.each(function(i){
var self=jQuery(this);
self.toggleClass(value.call(this,i,self.attr("class"),stateVal),stateVal)})}
return this.each(function(){
if(type==="string"){
var className,
i=0,
self=jQuery(this),
state=stateVal,
classNames=value.split(rspaces);
while((className=classNames[i++])){
state=isBool?state:!self.hasClass(className);
self[state?"addClass":"removeClass"](className)}
}else if(type==="undefined"||type==="boolean"){
if(this.className){
jQuery.data(this,"__className__",this.className)}
this.className=this.className||value===false?"":jQuery.data(this,"__className__")||""}
})},
hasClass:function(selector){
var className=" "+selector+" ";
for(var i=0,l=this.length;i<l;i++){
if((" "+this[i].className+" ").replace(rclass," ").indexOf(className)>-1){
return true}
}
return false},
val:function(value){
if(!arguments.length){
var elem=this[0];
if(elem){
if(jQuery.nodeName(elem,"option")){
var val=elem.attributes.value;
return!val||val.specified?elem.value:elem.text}
if(jQuery.nodeName(elem,"select")){
var index=elem.selectedIndex,
values=[],
options=elem.options,
one=elem.type==="select-one";
if(index<0){
return null}
for(var i=one?index:0,max=one?index+1:options.length;i<max;i++){
var option=options[i];
if(option.selected&&(jQuery.support.optDisabled?!option.disabled:option.getAttribute("disabled")===null)&&
(!option.parentNode.disabled||!jQuery.nodeName(option.parentNode,"optgroup"))){
value=jQuery(option).val();
if(one){
return value}
values.push(value)}
}
return values}
if(rradiocheck.test(elem.type)&&!jQuery.support.checkOn){
return elem.getAttribute("value")===null?"on":elem.value}
return(elem.value||"").replace(rreturn,"")}
return undefined}
var isFunction=jQuery.isFunction(value);
return this.each(function(i){
var self=jQuery(this),val=value;
if(this.nodeType!==1){
return}
if(isFunction){
val=value.call(this,i,self.val())}
if(val==null){
val=""}else if(typeof val==="number"){
val+=""}else if(jQuery.isArray(val)){
val=jQuery.map(val,function(value){
return value==null?"":value+""})}
if(jQuery.isArray(val)&&rradiocheck.test(this.type)){
this.checked=jQuery.inArray(self.val(),val)>=0}else if(jQuery.nodeName(this,"select")){
var values=jQuery.makeArray(val);
jQuery("option",this).each(function(){
this.selected=jQuery.inArray(jQuery(this).val(),values)>=0});
if(!values.length){
this.selectedIndex=-1}
}else{
this.value=val}
})}
});
jQuery.extend({
attrFn:{
val:true,
css:true,
html:true,
text:true,
data:true,
width:true,
height:true,
offset:true
},
attr:function(elem,name,value,pass){
if(!elem||elem.nodeType===3||elem.nodeType===8){
return undefined}
if(pass&&name in jQuery.attrFn){
return jQuery(elem)[name](value)}
var notxml=elem.nodeType!==1||!jQuery.isXMLDoc(elem),
set=value!==undefined;
name=notxml&&jQuery.props[name]||name;
var special=rspecialurl.test(name);
if(name==="selected"&&!jQuery.support.optSelected){
var parent=elem.parentNode;
if(parent){
parent.selectedIndex;
if(parent.parentNode){
parent.parentNode.selectedIndex}
}
}
if((name in elem||elem[name]!==undefined)&&notxml&&!special){
if(set){
if(name==="type"&&rtype.test(elem.nodeName)&&elem.parentNode){
jQuery.error("type property can't be changed")}
if(value===null){
if(elem.nodeType===1){
elem.removeAttribute(name)}
}else{
elem[name]=value}
}
if(jQuery.nodeName(elem,"form")&&elem.getAttributeNode(name)){
return elem.getAttributeNode(name).nodeValue}
if(name==="tabIndex"){
var attributeNode=elem.getAttributeNode("tabIndex");
return attributeNode&&attributeNode.specified?
attributeNode.value:
rfocusable.test(elem.nodeName)||rclickable.test(elem.nodeName)&&elem.href?
0:
undefined}
return elem[name]}
if(!jQuery.support.style&&notxml&&name==="style"){
if(set){
elem.style.cssText=""+value}
return elem.style.cssText}
if(set){
elem.setAttribute(name,""+value)}
if(!elem.attributes[name]&&(elem.hasAttribute&&!elem.hasAttribute(name))){
return undefined}
var attr=!jQuery.support.hrefNormalized&&notxml&&special?
elem.getAttribute(name,2):
elem.getAttribute(name);
return attr===null?undefined:attr}
});
var rnamespaces=/\.(.*)$/,
rformElems=/^(?:textarea|input|select)$/i,
rperiod=/\./g,
rspace=/ /g,
rescape=/[^\w\s.|`]/g,
fcleanup=function(nm){
return nm.replace(rescape,"\\$&")},
focusCounts={focusin:0,focusout:0};
jQuery.event={
add:function(elem,types,handler,data){
if(elem.nodeType===3||elem.nodeType===8){
return}
if(jQuery.isWindow(elem)&&(elem!==window&&!elem.frameElement)){
elem=window}
if(handler===false){
handler=returnFalse}else if(!handler){
return}
var handleObjIn,handleObj;
if(handler.handler){
handleObjIn=handler;
handler=handleObjIn.handler}
if(!handler.guid){
handler.guid=jQuery.guid++}
var elemData=jQuery.data(elem);
if(!elemData){
return}
var eventKey=elem.nodeType?"events":"__events__",
events=elemData[eventKey],
eventHandle=elemData.handle;
if(typeof events==="function"){
eventHandle=events.handle;
events=events.events}else if(!events){
if(!elem.nodeType){
elemData[eventKey]=elemData=function(){}}
elemData.events=events={}}
if(!eventHandle){
elemData.handle=eventHandle=function(){
return typeof jQuery!=="undefined"&&!jQuery.event.triggered?
jQuery.event.handle.apply(eventHandle.elem,arguments):
undefined}}
eventHandle.elem=elem;
types=types.split(" ");
var type,i=0,namespaces;
while((type=types[i++])){
handleObj=handleObjIn?
jQuery.extend({},handleObjIn):
{handler:handler,data:data};
if(type.indexOf(".")>-1){
namespaces=type.split(".");
type=namespaces.shift();
handleObj.namespace=namespaces.slice(0).sort().join(".")}else{
namespaces=[];
handleObj.namespace=""}
handleObj.type=type;
if(!handleObj.guid){
handleObj.guid=handler.guid}
var handlers=events[type],
special=jQuery.event.special[type]||{};
if(!handlers){
handlers=events[type]=[];
if(!special.setup||special.setup.call(elem,data,namespaces,eventHandle)===false){
if(elem.addEventListener){
elem.addEventListener(type,eventHandle,false)}else if(elem.attachEvent){
elem.attachEvent("on"+type,eventHandle)}
}
}
if(special.add){
special.add.call(elem,handleObj);
if(!handleObj.handler.guid){
handleObj.handler.guid=handler.guid}
}
handlers.push(handleObj);
jQuery.event.global[type]=true}
elem=null},
global:{},
remove:function(elem,types,handler,pos){
if(elem.nodeType===3||elem.nodeType===8){
return}
if(handler===false){
handler=returnFalse}
var ret,type,fn,j,i=0,all,namespaces,namespace,special,eventType,handleObj,origType,
eventKey=elem.nodeType?"events":"__events__",
elemData=jQuery.data(elem),
events=elemData&&elemData[eventKey];
if(!elemData||!events){
return}
if(typeof events==="function"){
elemData=events;
events=events.events}
if(types&&types.type){
handler=types.handler;
types=types.type}
if(!types||typeof types==="string"&&types.charAt(0)==="."){
types=types||"";
for(type in events){
jQuery.event.remove(elem,type+types)}
return}
types=types.split(" ");
while((type=types[i++])){
origType=type;
handleObj=null;
all=type.indexOf(".")<0;
namespaces=[];
if(!all){
namespaces=type.split(".");
type=namespaces.shift();
namespace=new RegExp("(^|\\.)"+
jQuery.map(namespaces.slice(0).sort(),fcleanup).join("\\.(?:.*\\.)?")+"(\\.|$)")}
eventType=events[type];
if(!eventType){
continue}
if(!handler){
for(j=0;j<eventType.length;j++){
handleObj=eventType[j];
if(all||namespace.test(handleObj.namespace)){
jQuery.event.remove(elem,origType,handleObj.handler,j);
eventType.splice(j--,1)}
}
continue}
special=jQuery.event.special[type]||{};
for(j=pos||0;j<eventType.length;j++){
handleObj=eventType[j];
if(handler.guid===handleObj.guid){
if(all||namespace.test(handleObj.namespace)){
if(pos==null){
eventType.splice(j--,1)}
if(special.remove){
special.remove.call(elem,handleObj)}
}
if(pos!=null){
break}
}
}
if(eventType.length===0||pos!=null&&eventType.length===1){
if(!special.teardown||special.teardown.call(elem,namespaces)===false){
jQuery.removeEvent(elem,type,elemData.handle)}
ret=null;
delete events[type]}
}
if(jQuery.isEmptyObject(events)){
var handle=elemData.handle;
if(handle){
handle.elem=null}
delete elemData.events;
delete elemData.handle;
if(typeof elemData==="function"){
jQuery.removeData(elem,eventKey)}else if(jQuery.isEmptyObject(elemData)){
jQuery.removeData(elem)}
}
},
trigger:function(event,data,elem){
var type=event.type||event,
bubbling=arguments[3];
if(!bubbling){
event=typeof event==="object"?
event[jQuery.expando]?event:
jQuery.extend(jQuery.Event(type),event):
jQuery.Event(type);
if(type.indexOf("!")>=0){
event.type=type=type.slice(0,-1);
event.exclusive=true}
if(!elem){
event.stopPropagation();
if(jQuery.event.global[type]){
jQuery.each(jQuery.cache,function(){
if(this.events&&this.events[type]){
jQuery.event.trigger(event,data,this.handle.elem)}
})}
}
if(!elem||elem.nodeType===3||elem.nodeType===8){
return undefined}
event.result=undefined;
event.target=elem;
data=jQuery.makeArray(data);
data.unshift(event)}
event.currentTarget=elem;
var handle=elem.nodeType?
jQuery.data(elem,"handle"):
(jQuery.data(elem,"__events__")||{}).handle;
if(handle){
handle.apply(elem,data)}
var parent=elem.parentNode||elem.ownerDocument;
try{
if(!(elem&&elem.nodeName&&jQuery.noData[elem.nodeName.toLowerCase()])){
if(elem["on"+type]&&elem["on"+type].apply(elem,data)===false){
event.result=false;
event.preventDefault()}
}
}catch(inlineError){}
if(!event.isPropagationStopped()&&parent){
jQuery.event.trigger(event,data,parent,true)}else if(!event.isDefaultPrevented()){
var old,
target=event.target,
targetType=type.replace(rnamespaces,""),
isClick=jQuery.nodeName(target,"a")&&targetType==="click",
special=jQuery.event.special[targetType]||{};
if((!special._default||special._default.call(elem,event)===false)&&
!isClick&&!(target&&target.nodeName&&jQuery.noData[target.nodeName.toLowerCase()])){
try{
if(target[targetType]){
old=target["on"+targetType];
if(old){
target["on"+targetType]=null}
jQuery.event.triggered=true;
target[targetType]()}
}catch(triggerError){}
if(old){
target["on"+targetType]=old}
jQuery.event.triggered=false}
}
},
handle:function(event){
var all,handlers,namespaces,namespace_re,events,
namespace_sort=[],
args=jQuery.makeArray(arguments);
event=args[0]=jQuery.event.fix(event||window.event);
event.currentTarget=this;
all=event.type.indexOf(".")<0&&!event.exclusive;
if(!all){
namespaces=event.type.split(".");
event.type=namespaces.shift();
namespace_sort=namespaces.slice(0).sort();
namespace_re=new RegExp("(^|\\.)"+namespace_sort.join("\\.(?:.*\\.)?")+"(\\.|$)")}
event.namespace=event.namespace||namespace_sort.join(".");
events=jQuery.data(this,this.nodeType?"events":"__events__");
if(typeof events==="function"){
events=events.events}
handlers=(events||{})[event.type];
if(events&&handlers){
handlers=handlers.slice(0);
for(var j=0,l=handlers.length;j<l;j++){
var handleObj=handlers[j];
if(all||namespace_re.test(handleObj.namespace)){
event.handler=handleObj.handler;
event.data=handleObj.data;
event.handleObj=handleObj;
var ret=handleObj.handler.apply(this,args);
if(ret!==undefined){
event.result=ret;
if(ret===false){
event.preventDefault();
event.stopPropagation()}
}
if(event.isImmediatePropagationStopped()){
break}
}
}
}
return event.result},
props:"altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode layerX layerY metaKey newValue offsetX offsetY pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "),
fix:function(event){
if(event[jQuery.expando]){
return event}
var originalEvent=event;
event=jQuery.Event(originalEvent);
for(var i=this.props.length,prop;i;){
prop=this.props[--i];
event[prop]=originalEvent[prop]}
if(!event.target){
event.target=event.srcElement||document}
if(event.target.nodeType===3){
event.target=event.target.parentNode}
if(!event.relatedTarget&&event.fromElement){
event.relatedTarget=event.fromElement===event.target?event.toElement:event.fromElement}
if(event.pageX==null&&event.clientX!=null){
var doc=document.documentElement,
body=document.body;
event.pageX=event.clientX+(doc&&doc.scrollLeft||body&&body.scrollLeft||0)-(doc&&doc.clientLeft||body&&body.clientLeft||0);
event.pageY=event.clientY+(doc&&doc.scrollTop||body&&body.scrollTop||0)-(doc&&doc.clientTop||body&&body.clientTop||0)}
if(event.which==null&&(event.charCode!=null||event.keyCode!=null)){
event.which=event.charCode!=null?event.charCode:event.keyCode}
if(!event.metaKey&&event.ctrlKey){
event.metaKey=event.ctrlKey}
if(!event.which&&event.button!==undefined){
event.which=(event.button&1?1:(event.button&2?3:(event.button&4?2:0)))}
return event},
guid:1E8,
proxy:jQuery.proxy,
special:{
ready:{
setup:jQuery.bindReady,
teardown:jQuery.noop
},
live:{
add:function(handleObj){
jQuery.event.add(this,
liveConvert(handleObj.origType,handleObj.selector),
jQuery.extend({},handleObj,{handler:liveHandler,guid:handleObj.handler.guid}))},
remove:function(handleObj){
jQuery.event.remove(this,liveConvert(handleObj.origType,handleObj.selector),handleObj)}
},
beforeunload:{
setup:function(data,namespaces,eventHandle){
if(jQuery.isWindow(this)){
this.onbeforeunload=eventHandle}
},
teardown:function(namespaces,eventHandle){
if(this.onbeforeunload===eventHandle){
this.onbeforeunload=null}
}
}
}
};
jQuery.removeEvent=document.removeEventListener?
function(elem,type,handle){
if(elem.removeEventListener){
elem.removeEventListener(type,handle,false)}
}:
function(elem,type,handle){
if(elem.detachEvent){
elem.detachEvent("on"+type,handle)}
};
jQuery.Event=function(src){
if(!this.preventDefault){
return new jQuery.Event(src)}
if(src&&src.type){
this.originalEvent=src;
this.type=src.type}else{
this.type=src}
this.timeStamp=jQuery.now();
this[jQuery.expando]=true};
function returnFalse(){
return false}
function returnTrue(){
return true}
jQuery.Event.prototype={
preventDefault:function(){
this.isDefaultPrevented=returnTrue;
var e=this.originalEvent;
if(!e){
return}
if(e.preventDefault){
e.preventDefault()}else{
e.returnValue=false}
},
stopPropagation:function(){
this.isPropagationStopped=returnTrue;
var e=this.originalEvent;
if(!e){
return}
if(e.stopPropagation){
e.stopPropagation()}
e.cancelBubble=true},
stopImmediatePropagation:function(){
this.isImmediatePropagationStopped=returnTrue;
this.stopPropagation()},
isDefaultPrevented:returnFalse,
isPropagationStopped:returnFalse,
isImmediatePropagationStopped:returnFalse
};
var withinElement=function(event){
var parent=event.relatedTarget;
try{
while(parent&&parent!==this){
parent=parent.parentNode}
if(parent!==this){
event.type=event.data;
jQuery.event.handle.apply(this,arguments)}
}catch(e){}
},
delegate=function(event){
event.type=event.data;
jQuery.event.handle.apply(this,arguments)};
jQuery.each({
mouseenter:"mouseover",
mouseleave:"mouseout"
},function(orig,fix){
jQuery.event.special[orig]={
setup:function(data){
jQuery.event.add(this,fix,data&&data.selector?delegate:withinElement,orig)},
teardown:function(data){
jQuery.event.remove(this,fix,data&&data.selector?delegate:withinElement)}
}});
if(!jQuery.support.submitBubbles){
jQuery.event.special.submit={
setup:function(data,namespaces){
if(this.nodeName.toLowerCase()!=="form"){
jQuery.event.add(this,"click.specialSubmit",function(e){
var elem=e.target,
type=elem.type;
if((type==="submit"||type==="image")&&jQuery(elem).closest("form").length){
e.liveFired=undefined;
return trigger("submit",this,arguments)}
});
jQuery.event.add(this,"keypress.specialSubmit",function(e){
var elem=e.target,
type=elem.type;
if((type==="text"||type==="password")&&jQuery(elem).closest("form").length&&e.keyCode===13){
e.liveFired=undefined;
return trigger("submit",this,arguments)}
})}else{
return false}
},
teardown:function(namespaces){
jQuery.event.remove(this,".specialSubmit")}
}}
if(!jQuery.support.changeBubbles){
var changeFilters,
getVal=function(elem){
var type=elem.type,val=elem.value;
if(type==="radio"||type==="checkbox"){
val=elem.checked}else if(type==="select-multiple"){
val=elem.selectedIndex>-1?
jQuery.map(elem.options,function(elem){
return elem.selected}).join("-"):
""}else if(elem.nodeName.toLowerCase()==="select"){
val=elem.selectedIndex}
return val},
testChange=function testChange(e){
var elem=e.target,data,val;
if(!rformElems.test(elem.nodeName)||elem.readOnly){
return}
data=jQuery.data(elem,"_change_data");
val=getVal(elem);
if(e.type!=="focusout"||elem.type!=="radio"){
jQuery.data(elem,"_change_data",val)}
if(data===undefined||val===data){
return}
if(data!=null||val){
e.type="change";
e.liveFired=undefined;
return jQuery.event.trigger(e,arguments[1],elem)}
};
jQuery.event.special.change={
filters:{
focusout:testChange,
beforedeactivate:testChange,
click:function(e){
var elem=e.target,type=elem.type;
if(type==="radio"||type==="checkbox"||elem.nodeName.toLowerCase()==="select"){
return testChange.call(this,e)}
},
keydown:function(e){
var elem=e.target,type=elem.type;
if((e.keyCode===13&&elem.nodeName.toLowerCase()!=="textarea")||
(e.keyCode===32&&(type==="checkbox"||type==="radio"))||
type==="select-multiple"){
return testChange.call(this,e)}
},
beforeactivate:function(e){
var elem=e.target;
jQuery.data(elem,"_change_data",getVal(elem))}
},
setup:function(data,namespaces){
if(this.type==="file"){
return false}
for(var type in changeFilters){
jQuery.event.add(this,type+".specialChange",changeFilters[type])}
return rformElems.test(this.nodeName)},
teardown:function(namespaces){
jQuery.event.remove(this,".specialChange");
return rformElems.test(this.nodeName)}
};
changeFilters=jQuery.event.special.change.filters;
changeFilters.focus=changeFilters.beforeactivate}
function trigger(type,elem,args){
args[0].type=type;
return jQuery.event.handle.apply(elem,args)}
if(document.addEventListener){
jQuery.each({focus:"focusin",blur:"focusout"},function(orig,fix){
jQuery.event.special[fix]={
setup:function(){
if(focusCounts[fix]++===0){
document.addEventListener(orig,handler,true)}
},
teardown:function(){
if(--focusCounts[fix]===0){
document.removeEventListener(orig,handler,true)}
}
};
function handler(e){
e=jQuery.event.fix(e);
e.type=fix;
return jQuery.event.trigger(e,null,e.target)}
})}
jQuery.each(["bind","one"],function(i,name){
jQuery.fn[name]=function(type,data,fn){
if(typeof type==="object"){
for(var key in type){
this[name](key,data,type[key],fn)}
return this}
if(jQuery.isFunction(data)||data===false){
fn=data;
data=undefined}
var handler=name==="one"?jQuery.proxy(fn,function(event){
jQuery(this).unbind(event,handler);
return fn.apply(this,arguments)}):fn;
if(type==="unload"&&name!=="one"){
this.one(type,data,fn)}else{
for(var i=0,l=this.length;i<l;i++){
jQuery.event.add(this[i],type,handler,data)}
}
return this}});
jQuery.fn.extend({
unbind:function(type,fn){
if(typeof type==="object"&&!type.preventDefault){
for(var key in type){
this.unbind(key,type[key])}
}else{
for(var i=0,l=this.length;i<l;i++){
jQuery.event.remove(this[i],type,fn)}
}
return this},
delegate:function(selector,types,data,fn){
return this.live(types,data,fn,selector)},
undelegate:function(selector,types,fn){
if(arguments.length===0){
return this.unbind("live")}else{
return this.die(types,null,fn,selector)}
},
trigger:function(type,data){
return this.each(function(){
jQuery.event.trigger(type,data,this)})},
triggerHandler:function(type,data){
if(this[0]){
var event=jQuery.Event(type);
event.preventDefault();
event.stopPropagation();
jQuery.event.trigger(event,data,this[0]);
return event.result}
},
toggle:function(fn){
var args=arguments,
i=1;
while(i<args.length){
jQuery.proxy(fn,args[i++])}
return this.click(jQuery.proxy(fn,function(event){
var lastToggle=(jQuery.data(this,"lastToggle"+fn.guid)||0)%i;
jQuery.data(this,"lastToggle"+fn.guid,lastToggle+1);
event.preventDefault();
return args[lastToggle].apply(this,arguments)||false}))},
hover:function(fnOver,fnOut){
return this.mouseenter(fnOver).mouseleave(fnOut||fnOver)}
});
var liveMap={
focus:"focusin",
blur:"focusout",
mouseenter:"mouseover",
mouseleave:"mouseout"
};
jQuery.each(["live","die"],function(i,name){
jQuery.fn[name]=function(types,data,fn,origSelector){
var type,i=0,match,namespaces,preType,
selector=origSelector||this.selector,
context=origSelector?this:jQuery(this.context);
if(typeof types==="object"&&!types.preventDefault){
for(var key in types){
context[name](key,data,types[key],selector)}
return this}
if(jQuery.isFunction(data)){
fn=data;
data=undefined}
types=(types||"").split(" ");
while((type=types[i++])!=null){
match=rnamespaces.exec(type);
namespaces="";
if(match){
namespaces=match[0];
type=type.replace(rnamespaces,"")}
if(type==="hover"){
types.push("mouseenter"+namespaces,"mouseleave"+namespaces);
continue}
preType=type;
if(type==="focus"||type==="blur"){
types.push(liveMap[type]+namespaces);
type=type+namespaces}else{
type=(liveMap[type]||type)+namespaces}
if(name==="live"){
for(var j=0,l=context.length;j<l;j++){
jQuery.event.add(context[j],"live."+liveConvert(type,selector),
{data:data,selector:selector,handler:fn,origType:type,origHandler:fn,preType:preType})}
}else{
context.unbind("live."+liveConvert(type,selector),fn)}
}
return this}});
function liveHandler(event){
var stop,maxLevel,related,match,handleObj,elem,j,i,l,data,close,namespace,ret,
elems=[],
selectors=[],
events=jQuery.data(this,this.nodeType?"events":"__events__");
if(typeof events==="function"){
events=events.events}
if(event.liveFired===this||!events||!events.live||event.button&&event.type==="click"){
return}
if(event.namespace){
namespace=new RegExp("(^|\\.)"+event.namespace.split(".").join("\\.(?:.*\\.)?")+"(\\.|$)")}
event.liveFired=this;
var live=events.live.slice(0);
for(j=0;j<live.length;j++){
handleObj=live[j];
if(handleObj.origType.replace(rnamespaces,"")===event.type){
selectors.push(handleObj.selector)}else{
live.splice(j--,1)}
}
match=jQuery(event.target).closest(selectors,event.currentTarget);
for(i=0,l=match.length;i<l;i++){
close=match[i];
for(j=0;j<live.length;j++){
handleObj=live[j];
if(close.selector===handleObj.selector&&(!namespace||namespace.test(handleObj.namespace))){
elem=close.elem;
related=null;
if(handleObj.preType==="mouseenter"||handleObj.preType==="mouseleave"){
event.type=handleObj.preType;
related=jQuery(event.relatedTarget).closest(handleObj.selector)[0]}
if(!related||related!==elem){
elems.push({elem:elem,handleObj:handleObj,level:close.level})}
}
}
}
for(i=0,l=elems.length;i<l;i++){
match=elems[i];
if(maxLevel&&match.level>maxLevel){
break}
event.currentTarget=match.elem;
event.data=match.handleObj.data;
event.handleObj=match.handleObj;
ret=match.handleObj.origHandler.apply(match.elem,arguments);
if(ret===false||event.isPropagationStopped()){
maxLevel=match.level;
if(ret===false){
stop=false}
if(event.isImmediatePropagationStopped()){
break}
}
}
return stop}
function liveConvert(type,selector){
return(type&&type!=="*"?type+".":"")+selector.replace(rperiod,"`").replace(rspace,"&")}
jQuery.each(("blur focus focusin focusout load resize scroll unload click dblclick "+
"mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave "+
"change select submit keydown keypress keyup error").split(" "),function(i,name){
jQuery.fn[name]=function(data,fn){
if(fn==null){
fn=data;
data=null}
return arguments.length>0?
this.bind(name,data,fn):
this.trigger(name)};
if(jQuery.attrFn){
jQuery.attrFn[name]=true}
});
if(window.attachEvent&&!window.addEventListener){
jQuery(window).bind("unload",function(){
for(var id in jQuery.cache){
if(jQuery.cache[id].handle){
try{
jQuery.event.remove(jQuery.cache[id].handle.elem)}catch(e){}
}
}
})}
(function(){
var chunker=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,
done=0,
toString=Object.prototype.toString,
hasDuplicate=false,
baseHasDuplicate=true;
[0,0].sort(function(){
baseHasDuplicate=false;
return 0});
var Sizzle=function(selector,context,results,seed){
results=results||[];
context=context||document;
var origContext=context;
if(context.nodeType!==1&&context.nodeType!==9){
return[]}
if(!selector||typeof selector!=="string"){
return results}
var m,set,checkSet,extra,ret,cur,pop,i,
prune=true,
contextXML=Sizzle.isXML(context),
parts=[],
soFar=selector;
do{
chunker.exec("");
m=chunker.exec(soFar);
if(m){
soFar=m[3];
parts.push(m[1]);
if(m[2]){
extra=m[3];
break}
}
}while(m);
if(parts.length>1&&origPOS.exec(selector)){
if(parts.length===2&&Expr.relative[parts[0]]){
set=posProcess(parts[0]+parts[1],context)}else{
set=Expr.relative[parts[0]]?
[context]:
Sizzle(parts.shift(),context);
while(parts.length){
selector=parts.shift();
if(Expr.relative[selector]){
selector+=parts.shift()}
set=posProcess(selector,set)}
}
}else{
if(!seed&&parts.length>1&&context.nodeType===9&&!contextXML&&
Expr.match.ID.test(parts[0])&&!Expr.match.ID.test(parts[parts.length-1])){
ret=Sizzle.find(parts.shift(),context,contextXML);
context=ret.expr?
Sizzle.filter(ret.expr,ret.set)[0]:
ret.set[0]}
if(context){
ret=seed?
{expr:parts.pop(),set:makeArray(seed)}:
Sizzle.find(parts.pop(),parts.length===1&&(parts[0]==="~"||parts[0]==="+")&&context.parentNode?context.parentNode:context,contextXML);
set=ret.expr?
Sizzle.filter(ret.expr,ret.set):
ret.set;
if(parts.length>0){
checkSet=makeArray(set)}else{
prune=false}
while(parts.length){
cur=parts.pop();
pop=cur;
if(!Expr.relative[cur]){
cur=""}else{
pop=parts.pop()}
if(pop==null){
pop=context}
Expr.relative[cur](checkSet,pop,contextXML)}
}else{
checkSet=parts=[]}
}
if(!checkSet){
checkSet=set}
if(!checkSet){
Sizzle.error(cur||selector)}
if(toString.call(checkSet)==="[object Array]"){
if(!prune){
results.push.apply(results,checkSet)}else if(context&&context.nodeType===1){
for(i=0;checkSet[i]!=null;i++){
if(checkSet[i]&&(checkSet[i]===true||checkSet[i].nodeType===1&&Sizzle.contains(context,checkSet[i]))){
results.push(set[i])}
}
}else{
for(i=0;checkSet[i]!=null;i++){
if(checkSet[i]&&checkSet[i].nodeType===1){
results.push(set[i])}
}
}
}else{
makeArray(checkSet,results)}
if(extra){
Sizzle(extra,origContext,results,seed);
Sizzle.uniqueSort(results)}
return results};
Sizzle.uniqueSort=function(results){
if(sortOrder){
hasDuplicate=baseHasDuplicate;
results.sort(sortOrder);
if(hasDuplicate){
for(var i=1;i<results.length;i++){
if(results[i]===results[i-1]){
results.splice(i--,1)}
}
}
}
return results};
Sizzle.matches=function(expr,set){
return Sizzle(expr,null,null,set)};
Sizzle.matchesSelector=function(node,expr){
return Sizzle(expr,null,null,[node]).length>0};
Sizzle.find=function(expr,context,isXML){
var set;
if(!expr){
return[]}
for(var i=0,l=Expr.order.length;i<l;i++){
var match,
type=Expr.order[i];
if((match=Expr.leftMatch[type].exec(expr))){
var left=match[1];
match.splice(1,1);
if(left.substr(left.length-1)!=="\\"){
match[1]=(match[1]||"").replace(/\\/g,"");
set=Expr.find[type](match,context,isXML);
if(set!=null){
expr=expr.replace(Expr.match[type],"");
break}
}
}
}
if(!set){
set=context.getElementsByTagName("*")}
return{set:set,expr:expr}};
Sizzle.filter=function(expr,set,inplace,not){
var match,anyFound,
old=expr,
result=[],
curLoop=set,
isXMLFilter=set&&set[0]&&Sizzle.isXML(set[0]);
while(expr&&set.length){
for(var type in Expr.filter){
if((match=Expr.leftMatch[type].exec(expr))!=null&&match[2]){
var found,item,
filter=Expr.filter[type],
left=match[1];
anyFound=false;
match.splice(1,1);
if(left.substr(left.length-1)==="\\"){
continue}
if(curLoop===result){
result=[]}
if(Expr.preFilter[type]){
match=Expr.preFilter[type](match,curLoop,inplace,result,not,isXMLFilter);
if(!match){
anyFound=found=true}else if(match===true){
continue}
}
if(match){
for(var i=0;(item=curLoop[i])!=null;i++){
if(item){
found=filter(item,match,i,curLoop);
var pass=not^!!found;
if(inplace&&found!=null){
if(pass){
anyFound=true}else{
curLoop[i]=false}
}else if(pass){
result.push(item);
anyFound=true}
}
}
}
if(found!==undefined){
if(!inplace){
curLoop=result}
expr=expr.replace(Expr.match[type],"");
if(!anyFound){
return[]}
break}
}
}
if(expr===old){
if(anyFound==null){
Sizzle.error(expr)}else{
break}
}
old=expr}
return curLoop};
Sizzle.error=function(msg){
throw"Syntax error, unrecognized expression: "+msg};
var Expr=Sizzle.selectors={
order:["ID","NAME","TAG"],
match:{
ID:/#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
CLASS:/\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,
ATTR:/\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,
TAG:/^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,
CHILD:/:(only|nth|last|first)-child(?:\((even|odd|[\dn+\-]*)\))?/,
POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,
PSEUDO:/:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/
},
leftMatch:{},
attrMap:{
"class":"className",
"for":"htmlFor"
},
attrHandle:{
href:function(elem){
return elem.getAttribute("href")}
},
relative:{
"+":function(checkSet,part){
var isPartStr=typeof part==="string",
isTag=isPartStr&&!/\W/.test(part),
isPartStrNotTag=isPartStr&&!isTag;
if(isTag){
part=part.toLowerCase()}
for(var i=0,l=checkSet.length,elem;i<l;i++){
if((elem=checkSet[i])){
while((elem=elem.previousSibling)&&elem.nodeType!==1){}
checkSet[i]=isPartStrNotTag||elem&&elem.nodeName.toLowerCase()===part?
elem||false:
elem===part}
}
if(isPartStrNotTag){
Sizzle.filter(part,checkSet,true)}
},
">":function(checkSet,part){
var elem,
isPartStr=typeof part==="string",
i=0,
l=checkSet.length;
if(isPartStr&&!/\W/.test(part)){
part=part.toLowerCase();
for(;i<l;i++){
elem=checkSet[i];
if(elem){
var parent=elem.parentNode;
checkSet[i]=parent.nodeName.toLowerCase()===part?parent:false}
}
}else{
for(;i<l;i++){
elem=checkSet[i];
if(elem){
checkSet[i]=isPartStr?
elem.parentNode:
elem.parentNode===part}
}
if(isPartStr){
Sizzle.filter(part,checkSet,true)}
}
},
"":function(checkSet,part,isXML){
var nodeCheck,
doneName=done++,
checkFn=dirCheck;
if(typeof part==="string"&&!/\W/.test(part)){
part=part.toLowerCase();
nodeCheck=part;
checkFn=dirNodeCheck}
checkFn("parentNode",part,doneName,checkSet,nodeCheck,isXML)},
"~":function(checkSet,part,isXML){
var nodeCheck,
doneName=done++,
checkFn=dirCheck;
if(typeof part==="string"&&!/\W/.test(part)){
part=part.toLowerCase();
nodeCheck=part;
checkFn=dirNodeCheck}
checkFn("previousSibling",part,doneName,checkSet,nodeCheck,isXML)}
},
find:{
ID:function(match,context,isXML){
if(typeof context.getElementById!=="undefined"&&!isXML){
var m=context.getElementById(match[1]);
return m&&m.parentNode?[m]:[]}
},
NAME:function(match,context){
if(typeof context.getElementsByName!=="undefined"){
var ret=[],
results=context.getElementsByName(match[1]);
for(var i=0,l=results.length;i<l;i++){
if(results[i].getAttribute("name")===match[1]){
ret.push(results[i])}
}
return ret.length===0?null:ret}
},
TAG:function(match,context){
return context.getElementsByTagName(match[1])}
},
preFilter:{
CLASS:function(match,curLoop,inplace,result,not,isXML){
match=" "+match[1].replace(/\\/g,"")+" ";
if(isXML){
return match}
for(var i=0,elem;(elem=curLoop[i])!=null;i++){
if(elem){
if(not^(elem.className&&(" "+elem.className+" ").replace(/[\t\n]/g," ").indexOf(match)>=0)){
if(!inplace){
result.push(elem)}
}else if(inplace){
curLoop[i]=false}
}
}
return false},
ID:function(match){
return match[1].replace(/\\/g,"")},
TAG:function(match,curLoop){
return match[1].toLowerCase()},
CHILD:function(match){
if(match[1]==="nth"){
var test=/(-?)(\d*)n((?:\+|-)?\d*)/.exec(
match[2]==="even"&&"2n"||match[2]==="odd"&&"2n+1"||
!/\D/.test(match[2])&&"0n+"+match[2]||match[2]);
match[2]=(test[1]+(test[2]||1))-0;
match[3]=test[3]-0}
match[0]=done++;
return match},
ATTR:function(match,curLoop,inplace,result,not,isXML){
var name=match[1].replace(/\\/g,"");
if(!isXML&&Expr.attrMap[name]){
match[1]=Expr.attrMap[name]}
if(match[2]==="~="){
match[4]=" "+match[4]+" "}
return match},
PSEUDO:function(match,curLoop,inplace,result,not){
if(match[1]==="not"){
if((chunker.exec(match[3])||"").length>1||/^\w/.test(match[3])){
match[3]=Sizzle(match[3],null,null,curLoop)}else{
var ret=Sizzle.filter(match[3],curLoop,inplace,true^not);
if(!inplace){
result.push.apply(result,ret)}
return false}
}else if(Expr.match.POS.test(match[0])||Expr.match.CHILD.test(match[0])){
return true}
return match},
POS:function(match){
match.unshift(true);
return match}
},
filters:{
enabled:function(elem){
return elem.disabled===false&&elem.type!=="hidden"},
disabled:function(elem){
return elem.disabled===true},
checked:function(elem){
return elem.checked===true},
selected:function(elem){
elem.parentNode.selectedIndex;
return elem.selected===true},
parent:function(elem){
return!!elem.firstChild},
empty:function(elem){
return!elem.firstChild},
has:function(elem,i,match){
return!!Sizzle(match[3],elem).length},
header:function(elem){
return(/h\d/i).test(elem.nodeName)},
text:function(elem){
return"text"===elem.type},
radio:function(elem){
return"radio"===elem.type},
checkbox:function(elem){
return"checkbox"===elem.type},
file:function(elem){
return"file"===elem.type},
password:function(elem){
return"password"===elem.type},
submit:function(elem){
return"submit"===elem.type},
image:function(elem){
return"image"===elem.type},
reset:function(elem){
return"reset"===elem.type},
button:function(elem){
return"button"===elem.type||elem.nodeName.toLowerCase()==="button"},
input:function(elem){
return(/input|select|textarea|button/i).test(elem.nodeName)}
},
setFilters:{
first:function(elem,i){
return i===0},
last:function(elem,i,match,array){
return i===array.length-1},
even:function(elem,i){
return i%2===0},
odd:function(elem,i){
return i%2===1},
lt:function(elem,i,match){
return i<match[3]-0},
gt:function(elem,i,match){
return i>match[3]-0},
nth:function(elem,i,match){
return match[3]-0===i},
eq:function(elem,i,match){
return match[3]-0===i}
},
filter:{
PSEUDO:function(elem,match,i,array){
var name=match[1],
filter=Expr.filters[name];
if(filter){
return filter(elem,i,match,array)}else if(name==="contains"){
return(elem.textContent||elem.innerText||Sizzle.getText([elem])||"").indexOf(match[3])>=0}else if(name==="not"){
var not=match[3];
for(var j=0,l=not.length;j<l;j++){
if(not[j]===elem){
return false}
}
return true}else{
Sizzle.error("Syntax error, unrecognized expression: "+name)}
},
CHILD:function(elem,match){
var type=match[1],
node=elem;
switch(type){
case"only":
case"first":
while((node=node.previousSibling)){
if(node.nodeType===1){
return false}
}
if(type==="first"){
return true}
node=elem;
case"last":
while((node=node.nextSibling)){
if(node.nodeType===1){
return false}
}
return true;
case"nth":
var first=match[2],
last=match[3];
if(first===1&&last===0){
return true}
var doneName=match[0],
parent=elem.parentNode;
if(parent&&(parent.sizcache!==doneName||!elem.nodeIndex)){
var count=0;
for(node=parent.firstChild;node;node=node.nextSibling){
if(node.nodeType===1){
node.nodeIndex=++count}
}
parent.sizcache=doneName}
var diff=elem.nodeIndex-last;
if(first===0){
return diff===0}else{
return(diff%first===0&&diff/first>=0)}
}
},
ID:function(elem,match){
return elem.nodeType===1&&elem.getAttribute("id")===match},
TAG:function(elem,match){
return(match==="*"&&elem.nodeType===1)||elem.nodeName.toLowerCase()===match},
CLASS:function(elem,match){
return(" "+(elem.className||elem.getAttribute("class"))+" ")
.indexOf(match)>-1},
ATTR:function(elem,match){
var name=match[1],
result=Expr.attrHandle[name]?
Expr.attrHandle[name](elem):
elem[name]!=null?
elem[name]:
elem.getAttribute(name),
value=result+"",
type=match[2],
check=match[4];
return result==null?
type==="!=":
type==="="?
value===check:
type==="*="?
value.indexOf(check)>=0:
type==="~="?
(" "+value+" ").indexOf(check)>=0:
!check?
value&&result!==false:
type==="!="?
value!==check:
type==="^="?
value.indexOf(check)===0:
type==="$="?
value.substr(value.length-check.length)===check:
type==="|="?
value===check||value.substr(0,check.length+1)===check+"-":
false},
POS:function(elem,match,i,array){
var name=match[2],
filter=Expr.setFilters[name];
if(filter){
return filter(elem,i,match,array)}
}
}
};
var origPOS=Expr.match.POS,
fescape=function(all,num){
return"\\"+(num-0+1)};
for(var type in Expr.match){
Expr.match[type]=new RegExp(Expr.match[type].source+(/(?![^\[]*\])(?![^\(]*\))/.source));
Expr.leftMatch[type]=new RegExp(/(^(?:.|\r|\n)*?)/.source+Expr.match[type].source.replace(/\\(\d+)/g,fescape))}
var makeArray=function(array,results){
array=Array.prototype.slice.call(array,0);
if(results){
results.push.apply(results,array);
return results}
return array};
try{
Array.prototype.slice.call(document.documentElement.childNodes,0)[0].nodeType}catch(e){
makeArray=function(array,results){
var i=0,
ret=results||[];
if(toString.call(array)==="[object Array]"){
Array.prototype.push.apply(ret,array)}else{
if(typeof array.length==="number"){
for(var l=array.length;i<l;i++){
ret.push(array[i])}
}else{
for(;array[i];i++){
ret.push(array[i])}
}
}
return ret}}
var sortOrder,siblingCheck;
if(document.documentElement.compareDocumentPosition){
sortOrder=function(a,b){
if(a===b){
hasDuplicate=true;
return 0}
if(!a.compareDocumentPosition||!b.compareDocumentPosition){
return a.compareDocumentPosition?-1:1}
return a.compareDocumentPosition(b)&4?-1:1}}else{
sortOrder=function(a,b){
var al,bl,
ap=[],
bp=[],
aup=a.parentNode,
bup=b.parentNode,
cur=aup;
if(a===b){
hasDuplicate=true;
return 0}else if(aup===bup){
return siblingCheck(a,b)}else if(!aup){
return-1}else if(!bup){
return 1}
while(cur){
ap.unshift(cur);
cur=cur.parentNode}
cur=bup;
while(cur){
bp.unshift(cur);
cur=cur.parentNode}
al=ap.length;
bl=bp.length;
for(var i=0;i<al&&i<bl;i++){
if(ap[i]!==bp[i]){
return siblingCheck(ap[i],bp[i])}
}
return i===al?
siblingCheck(a,bp[i],-1):
siblingCheck(ap[i],b,1)};
siblingCheck=function(a,b,ret){
if(a===b){
return ret}
var cur=a.nextSibling;
while(cur){
if(cur===b){
return-1}
cur=cur.nextSibling}
return 1}}
Sizzle.getText=function(elems){
var ret="",elem;
for(var i=0;elems[i];i++){
elem=elems[i];
if(elem.nodeType===3||elem.nodeType===4){
ret+=elem.nodeValue}else if(elem.nodeType!==8){
ret+=Sizzle.getText(elem.childNodes)}
}
return ret};
(function(){
var form=document.createElement("div"),
id="script"+(new Date()).getTime(),
root=document.documentElement;
form.innerHTML="<a name='"+id+"'/>";
root.insertBefore(form,root.firstChild);
if(document.getElementById(id)){
Expr.find.ID=function(match,context,isXML){
if(typeof context.getElementById!=="undefined"&&!isXML){
var m=context.getElementById(match[1]);
return m?
m.id===match[1]||typeof m.getAttributeNode!=="undefined"&&m.getAttributeNode("id").nodeValue===match[1]?
[m]:
undefined:
[]}
};
Expr.filter.ID=function(elem,match){
var node=typeof elem.getAttributeNode!=="undefined"&&elem.getAttributeNode("id");
return elem.nodeType===1&&node&&node.nodeValue===match}}
root.removeChild(form);
root=form=null})();
(function(){
var div=document.createElement("div");
div.appendChild(document.createComment(""));
if(div.getElementsByTagName("*").length>0){
Expr.find.TAG=function(match,context){
var results=context.getElementsByTagName(match[1]);
if(match[1]==="*"){
var tmp=[];
for(var i=0;results[i];i++){
if(results[i].nodeType===1){
tmp.push(results[i])}
}
results=tmp}
return results}}
div.innerHTML="<a href='#'></a>";
if(div.firstChild&&typeof div.firstChild.getAttribute!=="undefined"&&
div.firstChild.getAttribute("href")!=="#"){
Expr.attrHandle.href=function(elem){
return elem.getAttribute("href",2)}}
div=null})();
if(document.querySelectorAll){
(function(){
var oldSizzle=Sizzle,
div=document.createElement("div"),
id="__sizzle__";
div.innerHTML="<p class='TEST'></p>";
if(div.querySelectorAll&&div.querySelectorAll(".TEST").length===0){
return}
Sizzle=function(query,context,extra,seed){
context=context||document;
query=query.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");
if(!seed&&!Sizzle.isXML(context)){
if(context.nodeType===9){
try{
return makeArray(context.querySelectorAll(query),extra)}catch(qsaError){}
}else if(context.nodeType===1&&context.nodeName.toLowerCase()!=="object"){
var old=context.getAttribute("id"),
nid=old||id;
if(!old){
context.setAttribute("id",nid)}
try{
return makeArray(context.querySelectorAll("#"+nid+" "+query),extra)}catch(pseudoError){
}finally{
if(!old){
context.removeAttribute("id")}
}
}
}
return oldSizzle(query,context,extra,seed)};
for(var prop in oldSizzle){
Sizzle[prop]=oldSizzle[prop]}
div=null})()}
(function(){
var html=document.documentElement,
matches=html.matchesSelector||html.mozMatchesSelector||html.webkitMatchesSelector||html.msMatchesSelector,
pseudoWorks=false;
try{
matches.call(document.documentElement,"[test!='']:sizzle")}catch(pseudoError){
pseudoWorks=true}
if(matches){
Sizzle.matchesSelector=function(node,expr){
expr=expr.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");
if(!Sizzle.isXML(node)){
try{
if(pseudoWorks||!Expr.match.PSEUDO.test(expr)&&!/!=/.test(expr)){
return matches.call(node,expr)}
}catch(e){}
}
return Sizzle(expr,null,null,[node]).length>0}}
})();
(function(){
var div=document.createElement("div");
div.innerHTML="<div class='test e'></div><div class='test'></div>";
if(!div.getElementsByClassName||div.getElementsByClassName("e").length===0){
return}
div.lastChild.className="e";
if(div.getElementsByClassName("e").length===1){
return}
Expr.order.splice(1,0,"CLASS");
Expr.find.CLASS=function(match,context,isXML){
if(typeof context.getElementsByClassName!=="undefined"&&!isXML){
return context.getElementsByClassName(match[1])}
};
div=null})();
function dirNodeCheck(dir,cur,doneName,checkSet,nodeCheck,isXML){
for(var i=0,l=checkSet.length;i<l;i++){
var elem=checkSet[i];
if(elem){
var match=false;
elem=elem[dir];
while(elem){
if(elem.sizcache===doneName){
match=checkSet[elem.sizset];
break}
if(elem.nodeType===1&&!isXML){
elem.sizcache=doneName;
elem.sizset=i}
if(elem.nodeName.toLowerCase()===cur){
match=elem;
break}
elem=elem[dir]}
checkSet[i]=match}
}
}
function dirCheck(dir,cur,doneName,checkSet,nodeCheck,isXML){
for(var i=0,l=checkSet.length;i<l;i++){
var elem=checkSet[i];
if(elem){
var match=false;
elem=elem[dir];
while(elem){
if(elem.sizcache===doneName){
match=checkSet[elem.sizset];
break}
if(elem.nodeType===1){
if(!isXML){
elem.sizcache=doneName;
elem.sizset=i}
if(typeof cur!=="string"){
if(elem===cur){
match=true;
break}
}else if(Sizzle.filter(cur,[elem]).length>0){
match=elem;
break}
}
elem=elem[dir]}
checkSet[i]=match}
}
}
if(document.documentElement.contains){
Sizzle.contains=function(a,b){
return a!==b&&(a.contains?a.contains(b):true)}}else if(document.documentElement.compareDocumentPosition){
Sizzle.contains=function(a,b){
return!!(a.compareDocumentPosition(b)&16)}}else{
Sizzle.contains=function(){
return false}}
Sizzle.isXML=function(elem){
var documentElement=(elem?elem.ownerDocument||elem:0).documentElement;
return documentElement?documentElement.nodeName!=="HTML":false};
var posProcess=function(selector,context){
var match,
tmpSet=[],
later="",
root=context.nodeType?[context]:context;
while((match=Expr.match.PSEUDO.exec(selector))){
later+=match[0];
selector=selector.replace(Expr.match.PSEUDO,"")}
selector=Expr.relative[selector]?selector+"*":selector;
for(var i=0,l=root.length;i<l;i++){
Sizzle(selector,root[i],tmpSet)}
return Sizzle.filter(later,tmpSet)};
jQuery.find=Sizzle;
jQuery.expr=Sizzle.selectors;
jQuery.expr[":"]=jQuery.expr.filters;
jQuery.unique=Sizzle.uniqueSort;
jQuery.text=Sizzle.getText;
jQuery.isXMLDoc=Sizzle.isXML;
jQuery.contains=Sizzle.contains})();
var runtil=/Until$/,
rparentsprev=/^(?:parents|prevUntil|prevAll)/,
rmultiselector=/,/,
isSimple=/^.[^:#\[\.,]*$/,
slice=Array.prototype.slice,
POS=jQuery.expr.match.POS;
jQuery.fn.extend({
find:function(selector){
var ret=this.pushStack("","find",selector),
length=0;
for(var i=0,l=this.length;i<l;i++){
length=ret.length;
jQuery.find(selector,this[i],ret);
if(i>0){
for(var n=length;n<ret.length;n++){
for(var r=0;r<length;r++){
if(ret[r]===ret[n]){
ret.splice(n--,1);
break}
}
}
}
}
return ret},
has:function(target){
var targets=jQuery(target);
return this.filter(function(){
for(var i=0,l=targets.length;i<l;i++){
if(jQuery.contains(this,targets[i])){
return true}
}
})},
not:function(selector){
return this.pushStack(winnow(this,selector,false),"not",selector)},
filter:function(selector){
return this.pushStack(winnow(this,selector,true),"filter",selector)},
is:function(selector){
return!!selector&&jQuery.filter(selector,this).length>0},
closest:function(selectors,context){
var ret=[],i,l,cur=this[0];
if(jQuery.isArray(selectors)){
var match,selector,
matches={},
level=1;
if(cur&&selectors.length){
for(i=0,l=selectors.length;i<l;i++){
selector=selectors[i];
if(!matches[selector]){
matches[selector]=jQuery.expr.match.POS.test(selector)?
jQuery(selector,context||this.context):
selector}
}
while(cur&&cur.ownerDocument&&cur!==context){
for(selector in matches){
match=matches[selector];
if(match.jquery?match.index(cur)>-1:jQuery(cur).is(match)){
ret.push({selector:selector,elem:cur,level:level})}
}
cur=cur.parentNode;
level++}
}
return ret}
var pos=POS.test(selectors)?
jQuery(selectors,context||this.context):null;
for(i=0,l=this.length;i<l;i++){
cur=this[i];
while(cur){
if(pos?pos.index(cur)>-1:jQuery.find.matchesSelector(cur,selectors)){
ret.push(cur);
break}else{
cur=cur.parentNode;
if(!cur||!cur.ownerDocument||cur===context){
break}
}
}
}
ret=ret.length>1?jQuery.unique(ret):ret;
return this.pushStack(ret,"closest",selectors)},
index:function(elem){
if(!elem||typeof elem==="string"){
return jQuery.inArray(this[0],
elem?jQuery(elem):this.parent().children())}
return jQuery.inArray(
elem.jquery?elem[0]:elem,this)},
add:function(selector,context){
var set=typeof selector==="string"?
jQuery(selector,context||this.context):
jQuery.makeArray(selector),
all=jQuery.merge(this.get(),set);
return this.pushStack(isDisconnected(set[0])||isDisconnected(all[0])?
all:
jQuery.unique(all))},
andSelf:function(){
return this.add(this.prevObject)}
});
function isDisconnected(node){
return!node||!node.parentNode||node.parentNode.nodeType===11}
jQuery.each({
parent:function(elem){
var parent=elem.parentNode;
return parent&&parent.nodeType!==11?parent:null},
parents:function(elem){
return jQuery.dir(elem,"parentNode")},
parentsUntil:function(elem,i,until){
return jQuery.dir(elem,"parentNode",until)},
next:function(elem){
return jQuery.nth(elem,2,"nextSibling")},
prev:function(elem){
return jQuery.nth(elem,2,"previousSibling")},
nextAll:function(elem){
return jQuery.dir(elem,"nextSibling")},
prevAll:function(elem){
return jQuery.dir(elem,"previousSibling")},
nextUntil:function(elem,i,until){
return jQuery.dir(elem,"nextSibling",until)},
prevUntil:function(elem,i,until){
return jQuery.dir(elem,"previousSibling",until)},
siblings:function(elem){
return jQuery.sibling(elem.parentNode.firstChild,elem)},
children:function(elem){
return jQuery.sibling(elem.firstChild)},
contents:function(elem){
return jQuery.nodeName(elem,"iframe")?
elem.contentDocument||elem.contentWindow.document:
jQuery.makeArray(elem.childNodes)}
},function(name,fn){
jQuery.fn[name]=function(until,selector){
var ret=jQuery.map(this,fn,until);
if(!runtil.test(name)){
selector=until}
if(selector&&typeof selector==="string"){
ret=jQuery.filter(selector,ret)}
ret=this.length>1?jQuery.unique(ret):ret;
if((this.length>1||rmultiselector.test(selector))&&rparentsprev.test(name)){
ret=ret.reverse()}
return this.pushStack(ret,name,slice.call(arguments).join(","))}});
jQuery.extend({
filter:function(expr,elems,not){
if(not){
expr=":not("+expr+")"}
return elems.length===1?
jQuery.find.matchesSelector(elems[0],expr)?[elems[0]]:[]:
jQuery.find.matches(expr,elems)},
dir:function(elem,dir,until){
var matched=[],
cur=elem[dir];
while(cur&&cur.nodeType!==9&&(until===undefined||cur.nodeType!==1||!jQuery(cur).is(until))){
if(cur.nodeType===1){
matched.push(cur)}
cur=cur[dir]}
return matched},
nth:function(cur,result,dir,elem){
result=result||1;
var num=0;
for(;cur;cur=cur[dir]){
if(cur.nodeType===1&&++num===result){
break}
}
return cur},
sibling:function(n,elem){
var r=[];
for(;n;n=n.nextSibling){
if(n.nodeType===1&&n!==elem){
r.push(n)}
}
return r}
});
function winnow(elements,qualifier,keep){
if(jQuery.isFunction(qualifier)){
return jQuery.grep(elements,function(elem,i){
var retVal=!!qualifier.call(elem,i,elem);
return retVal===keep})}else if(qualifier.nodeType){
return jQuery.grep(elements,function(elem,i){
return(elem===qualifier)===keep})}else if(typeof qualifier==="string"){
var filtered=jQuery.grep(elements,function(elem){
return elem.nodeType===1});
if(isSimple.test(qualifier)){
return jQuery.filter(qualifier,filtered,!keep)}else{
qualifier=jQuery.filter(qualifier,filtered)}
}
return jQuery.grep(elements,function(elem,i){
return(jQuery.inArray(elem,qualifier)>=0)===keep})}
var rinlinejQuery=/ jQuery\d+="(?:\d+|null)"/g,
rleadingWhitespace=/^\s+/,
rxhtmlTag=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,
rtagName=/<([\w:]+)/,
rtbody=/<tbody/i,
rhtml=/<|&#?\w+;/,
rnocache=/<(?:script|object|embed|option|style)/i,
rchecked=/checked\s*(?:[^=]|=\s*.checked.)/i,
raction=/\=([^="'>\s]+\/)>/g,
wrapMap={
option:[1,"<select multiple='multiple'>","</select>"],
legend:[1,"<fieldset>","</fieldset>"],
thead:[1,"<table>","</table>"],
tr:[2,"<table><tbody>","</tbody></table>"],
td:[3,"<table><tbody><tr>","</tr></tbody></table>"],
col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],
area:[1,"<map>","</map>"],
_default:[0,"",""]
};
wrapMap.optgroup=wrapMap.option;
wrapMap.tbody=wrapMap.tfoot=wrapMap.colgroup=wrapMap.caption=wrapMap.thead;
wrapMap.th=wrapMap.td;
if(!jQuery.support.htmlSerialize){
wrapMap._default=[1,"div<div>","</div>"]}
jQuery.fn.extend({
text:function(text){
if(jQuery.isFunction(text)){
return this.each(function(i){
var self=jQuery(this);
self.text(text.call(this,i,self.text()))})}
if(typeof text!=="object"&&text!==undefined){
return this.empty().append((this[0]&&this[0].ownerDocument||document).createTextNode(text))}
return jQuery.text(this)},
wrapAll:function(html){
if(jQuery.isFunction(html)){
return this.each(function(i){
jQuery(this).wrapAll(html.call(this,i))})}
if(this[0]){
var wrap=jQuery(html,this[0].ownerDocument).eq(0).clone(true);
if(this[0].parentNode){
wrap.insertBefore(this[0])}
wrap.map(function(){
var elem=this;
while(elem.firstChild&&elem.firstChild.nodeType===1){
elem=elem.firstChild}
return elem}).append(this)}
return this},
wrapInner:function(html){
if(jQuery.isFunction(html)){
return this.each(function(i){
jQuery(this).wrapInner(html.call(this,i))})}
return this.each(function(){
var self=jQuery(this),
contents=self.contents();
if(contents.length){
contents.wrapAll(html)}else{
self.append(html)}
})},
wrap:function(html){
return this.each(function(){
jQuery(this).wrapAll(html)})},
unwrap:function(){
return this.parent().each(function(){
if(!jQuery.nodeName(this,"body")){
jQuery(this).replaceWith(this.childNodes)}
}).end()},
append:function(){
return this.domManip(arguments,true,function(elem){
if(this.nodeType===1){
this.appendChild(elem)}
})},
prepend:function(){
return this.domManip(arguments,true,function(elem){
if(this.nodeType===1){
this.insertBefore(elem,this.firstChild)}
})},
before:function(){
if(this[0]&&this[0].parentNode){
return this.domManip(arguments,false,function(elem){
this.parentNode.insertBefore(elem,this)})}else if(arguments.length){
var set=jQuery(arguments[0]);
set.push.apply(set,this.toArray());
return this.pushStack(set,"before",arguments)}
},
after:function(){
if(this[0]&&this[0].parentNode){
return this.domManip(arguments,false,function(elem){
this.parentNode.insertBefore(elem,this.nextSibling)})}else if(arguments.length){
var set=this.pushStack(this,"after",arguments);
set.push.apply(set,jQuery(arguments[0]).toArray());
return set}
},
remove:function(selector,keepData){
for(var i=0,elem;(elem=this[i])!=null;i++){
if(!selector||jQuery.filter(selector,[elem]).length){
if(!keepData&&elem.nodeType===1){
jQuery.cleanData(elem.getElementsByTagName("*"));
jQuery.cleanData([elem])}
if(elem.parentNode){
elem.parentNode.removeChild(elem)}
}
}
return this},
empty:function(){
for(var i=0,elem;(elem=this[i])!=null;i++){
if(elem.nodeType===1){
jQuery.cleanData(elem.getElementsByTagName("*"))}
while(elem.firstChild){
elem.removeChild(elem.firstChild)}
}
return this},
clone:function(events){
var ret=this.map(function(){
if(!jQuery.support.noCloneEvent&&!jQuery.isXMLDoc(this)){
var html=this.outerHTML,
ownerDocument=this.ownerDocument;
if(!html){
var div=ownerDocument.createElement("div");
div.appendChild(this.cloneNode(true));
html=div.innerHTML}
return jQuery.clean([html.replace(rinlinejQuery,"")
.replace(raction,'="$1">')
.replace(rleadingWhitespace,"")],ownerDocument)[0]}else{
return this.cloneNode(true)}
});
if(events===true){
cloneCopyEvent(this,ret);
cloneCopyEvent(this.find("*"),ret.find("*"))}
return ret},
html:function(value){
if(value===undefined){
return this[0]&&this[0].nodeType===1?
this[0].innerHTML.replace(rinlinejQuery,""):
null}else if(typeof value==="string"&&!rnocache.test(value)&&
(jQuery.support.leadingWhitespace||!rleadingWhitespace.test(value))&&
!wrapMap[(rtagName.exec(value)||["",""])[1].toLowerCase()]){
value=value.replace(rxhtmlTag,"<$1></$2>");
try{
for(var i=0,l=this.length;i<l;i++){
if(this[i].nodeType===1){
jQuery.cleanData(this[i].getElementsByTagName("*"));
this[i].innerHTML=value}
}
}catch(e){
this.empty().append(value)}
}else if(jQuery.isFunction(value)){
this.each(function(i){
var self=jQuery(this);
self.html(value.call(this,i,self.html()))})}else{
this.empty().append(value)}
return this},
replaceWith:function(value){
if(this[0]&&this[0].parentNode){
if(jQuery.isFunction(value)){
return this.each(function(i){
var self=jQuery(this),old=self.html();
self.replaceWith(value.call(this,i,old))})}
if(typeof value!=="string"){
value=jQuery(value).detach()}
return this.each(function(){
var next=this.nextSibling,
parent=this.parentNode;
jQuery(this).remove();
if(next){
jQuery(next).before(value)}else{
jQuery(parent).append(value)}
})}else{
return this.pushStack(jQuery(jQuery.isFunction(value)?value():value),"replaceWith",value)}
},
detach:function(selector){
return this.remove(selector,true)},
domManip:function(args,table,callback){
var results,first,fragment,parent,
value=args[0],
scripts=[];
if(!jQuery.support.checkClone&&arguments.length===3&&typeof value==="string"&&rchecked.test(value)){
return this.each(function(){
jQuery(this).domManip(args,table,callback,true)})}
if(jQuery.isFunction(value)){
return this.each(function(i){
var self=jQuery(this);
args[0]=value.call(this,i,table?self.html():undefined);
self.domManip(args,table,callback)})}
if(this[0]){
parent=value&&value.parentNode;
if(jQuery.support.parentNode&&parent&&parent.nodeType===11&&parent.childNodes.length===this.length){
results={fragment:parent}}else{
results=jQuery.buildFragment(args,this,scripts)}
fragment=results.fragment;
if(fragment.childNodes.length===1){
first=fragment=fragment.firstChild}else{
first=fragment.firstChild}
if(first){
table=table&&jQuery.nodeName(first,"tr");
for(var i=0,l=this.length;i<l;i++){
callback.call(
table?
root(this[i],first):
this[i],
i>0||results.cacheable||this.length>1?
fragment.cloneNode(true):
fragment
)}
}
if(scripts.length){
jQuery.each(scripts,evalScript)}
}
return this}
});
function root(elem,cur){
return jQuery.nodeName(elem,"table")?
(elem.getElementsByTagName("tbody")[0]||
elem.appendChild(elem.ownerDocument.createElement("tbody"))):
elem}
function cloneCopyEvent(orig,ret){
var i=0;
ret.each(function(){
if(this.nodeName!==(orig[i]&&orig[i].nodeName)){
return}
var oldData=jQuery.data(orig[i++]),
curData=jQuery.data(this,oldData),
events=oldData&&oldData.events;
if(events){
delete curData.handle;
curData.events={};
for(var type in events){
for(var handler in events[type]){
jQuery.event.add(this,type,events[type][handler],events[type][handler].data)}
}
}
})}
jQuery.buildFragment=function(args,nodes,scripts){
var fragment,cacheable,cacheresults,
doc=(nodes&&nodes[0]?nodes[0].ownerDocument||nodes[0]:document);
if(args.length===1&&typeof args[0]==="string"&&args[0].length<512&&doc===document&&
!rnocache.test(args[0])&&(jQuery.support.checkClone||!rchecked.test(args[0]))){
cacheable=true;
cacheresults=jQuery.fragments[args[0]];
if(cacheresults){
if(cacheresults!==1){
fragment=cacheresults}
}
}
if(!fragment){
fragment=doc.createDocumentFragment();
jQuery.clean(args,doc,fragment,scripts)}
if(cacheable){
jQuery.fragments[args[0]]=cacheresults?fragment:1}
return{fragment:fragment,cacheable:cacheable}};
jQuery.fragments={};
jQuery.each({
appendTo:"append",
prependTo:"prepend",
insertBefore:"before",
insertAfter:"after",
replaceAll:"replaceWith"
},function(name,original){
jQuery.fn[name]=function(selector){
var ret=[],
insert=jQuery(selector),
parent=this.length===1&&this[0].parentNode;
if(parent&&parent.nodeType===11&&parent.childNodes.length===1&&insert.length===1){
insert[original](this[0]);
return this}else{
for(var i=0,l=insert.length;i<l;i++){
var elems=(i>0?this.clone(true):this).get();
jQuery(insert[i])[original](elems);
ret=ret.concat(elems)}
return this.pushStack(ret,name,insert.selector)}
}});
jQuery.extend({
clean:function(elems,context,fragment,scripts){
context=context||document;
if(typeof context.createElement==="undefined"){
context=context.ownerDocument||context[0]&&context[0].ownerDocument||document}
var ret=[];
for(var i=0,elem;(elem=elems[i])!=null;i++){
if(typeof elem==="number"){
elem+=""}
if(!elem){
continue}
if(typeof elem==="string"&&!rhtml.test(elem)){
elem=context.createTextNode(elem)}else if(typeof elem==="string"){
elem=elem.replace(rxhtmlTag,"<$1></$2>");
var tag=(rtagName.exec(elem)||["",""])[1].toLowerCase(),
wrap=wrapMap[tag]||wrapMap._default,
depth=wrap[0],
div=context.createElement("div");
div.innerHTML=wrap[1]+elem+wrap[2];
while(depth--){
div=div.lastChild}
if(!jQuery.support.tbody){
var hasBody=rtbody.test(elem),
tbody=tag==="table"&&!hasBody?
div.firstChild&&div.firstChild.childNodes:
wrap[1]==="<table>"&&!hasBody?
div.childNodes:
[];
for(var j=tbody.length-1;j>=0;--j){
if(jQuery.nodeName(tbody[j],"tbody")&&!tbody[j].childNodes.length){
tbody[j].parentNode.removeChild(tbody[j])}
}
}
if(!jQuery.support.leadingWhitespace&&rleadingWhitespace.test(elem)){
div.insertBefore(context.createTextNode(rleadingWhitespace.exec(elem)[0]),div.firstChild)}
elem=div.childNodes}
if(elem.nodeType){
ret.push(elem)}else{
ret=jQuery.merge(ret,elem)}
}
if(fragment){
for(i=0;ret[i];i++){
if(scripts&&jQuery.nodeName(ret[i],"script")&&(!ret[i].type||ret[i].type.toLowerCase()==="text/javascript")){
scripts.push(ret[i].parentNode?ret[i].parentNode.removeChild(ret[i]):ret[i])}else{
if(ret[i].nodeType===1){
ret.splice.apply(ret,[i+1,0].concat(jQuery.makeArray(ret[i].getElementsByTagName("script"))))}
fragment.appendChild(ret[i])}
}
}
return ret},
cleanData:function(elems){
var data,id,cache=jQuery.cache,
special=jQuery.event.special,
deleteExpando=jQuery.support.deleteExpando;
for(var i=0,elem;(elem=elems[i])!=null;i++){
if(elem.nodeName&&jQuery.noData[elem.nodeName.toLowerCase()]){
continue}
id=elem[jQuery.expando];
if(id){
data=cache[id];
if(data&&data.events){
for(var type in data.events){
if(special[type]){
jQuery.event.remove(elem,type)}else{
jQuery.removeEvent(elem,type,data.handle)}
}
}
if(deleteExpando){
delete elem[jQuery.expando]}else if(elem.removeAttribute){
elem.removeAttribute(jQuery.expando)}
delete cache[id]}
}
}
});
function evalScript(i,elem){
if(elem.src){
jQuery.ajax({
url:elem.src,
async:false,
dataType:"script"
})}else{
jQuery.globalEval(elem.text||elem.textContent||elem.innerHTML||"")}
if(elem.parentNode){
elem.parentNode.removeChild(elem)}
}
var ralpha=/alpha\([^)]*\)/i,
ropacity=/opacity=([^)]*)/,
rdashAlpha=/-([a-z])/ig,
rupper=/([A-Z])/g,
rnumpx=/^-?\d+(?:px)?$/i,
rnum=/^-?\d/,
cssShow={position:"absolute",visibility:"hidden",display:"block"},
cssWidth=["Left","Right"],
cssHeight=["Top","Bottom"],
curCSS,
getComputedStyle,
currentStyle,
fcamelCase=function(all,letter){
return letter.toUpperCase()};
jQuery.fn.css=function(name,value){
if(arguments.length===2&&value===undefined){
return this}
return jQuery.access(this,name,value,true,function(elem,name,value){
return value!==undefined?
jQuery.style(elem,name,value):
jQuery.css(elem,name)})};
jQuery.extend({
cssHooks:{
opacity:{
get:function(elem,computed){
if(computed){
var ret=curCSS(elem,"opacity","opacity");
return ret===""?"1":ret}else{
return elem.style.opacity}
}
}
},
cssNumber:{
"zIndex":true,
"fontWeight":true,
"opacity":true,
"zoom":true,
"lineHeight":true
},
cssProps:{
"float":jQuery.support.cssFloat?"cssFloat":"styleFloat"
},
style:function(elem,name,value,extra){
if(!elem||elem.nodeType===3||elem.nodeType===8||!elem.style){
return}
var ret,origName=jQuery.camelCase(name),
style=elem.style,hooks=jQuery.cssHooks[origName];
name=jQuery.cssProps[origName]||origName;
if(value!==undefined){
if(typeof value==="number"&&isNaN(value)||value==null){
return}
if(typeof value==="number"&&!jQuery.cssNumber[origName]){
value+="px"}
if(!hooks||!("set"in hooks)||(value=hooks.set(elem,value))!==undefined){
try{
style[name]=value}catch(e){}
}
}else{
if(hooks&&"get"in hooks&&(ret=hooks.get(elem,false,extra))!==undefined){
return ret}
return style[name]}
},
css:function(elem,name,extra){
var ret,origName=jQuery.camelCase(name),
hooks=jQuery.cssHooks[origName];
name=jQuery.cssProps[origName]||origName;
if(hooks&&"get"in hooks&&(ret=hooks.get(elem,true,extra))!==undefined){
return ret}else if(curCSS){
return curCSS(elem,name,origName)}
},
swap:function(elem,options,callback){
var old={};
for(var name in options){
old[name]=elem.style[name];
elem.style[name]=options[name]}
callback.call(elem);
for(name in options){
elem.style[name]=old[name]}
},
camelCase:function(string){
return string.replace(rdashAlpha,fcamelCase)}
});
jQuery.curCSS=jQuery.css;
jQuery.each(["height","width"],function(i,name){
jQuery.cssHooks[name]={
get:function(elem,computed,extra){
var val;
if(computed){
if(elem.offsetWidth!==0){
val=getWH(elem,name,extra)}else{
jQuery.swap(elem,cssShow,function(){
val=getWH(elem,name,extra)})}
if(val<=0){
val=curCSS(elem,name,name);
if(val==="0px"&&currentStyle){
val=currentStyle(elem,name,name)}
if(val!=null){
return val===""||val==="auto"?"0px":val}
}
if(val<0||val==null){
val=elem.style[name];
return val===""||val==="auto"?"0px":val}
return typeof val==="string"?val:val+"px"}
},
set:function(elem,value){
if(rnumpx.test(value)){
value=parseFloat(value);
if(value>=0){
return value+"px"}
}else{
return value}
}
}});
if(!jQuery.support.opacity){
jQuery.cssHooks.opacity={
get:function(elem,computed){
return ropacity.test((computed&&elem.currentStyle?elem.currentStyle.filter:elem.style.filter)||"")?
(parseFloat(RegExp.$1)/100)+"":
computed?"1":""},
set:function(elem,value){
var style=elem.style;
style.zoom=1;
var opacity=jQuery.isNaN(value)?
"":
"alpha(opacity="+value*100+")",
filter=style.filter||"";
style.filter=ralpha.test(filter)?
filter.replace(ralpha,opacity):
style.filter+' '+opacity}
}}
if(document.defaultView&&document.defaultView.getComputedStyle){
getComputedStyle=function(elem,newName,name){
var ret,defaultView,computedStyle;
name=name.replace(rupper,"-$1").toLowerCase();
if(!(defaultView=elem.ownerDocument.defaultView)){
return undefined}
if((computedStyle=defaultView.getComputedStyle(elem,null))){
ret=computedStyle.getPropertyValue(name);
if(ret===""&&!jQuery.contains(elem.ownerDocument.documentElement,elem)){
ret=jQuery.style(elem,name)}
}
return ret}}
if(document.documentElement.currentStyle){
currentStyle=function(elem,name){
var left,rsLeft,
ret=elem.currentStyle&&elem.currentStyle[name],
style=elem.style;
if(!rnumpx.test(ret)&&rnum.test(ret)){
left=style.left;
rsLeft=elem.runtimeStyle.left;
elem.runtimeStyle.left=elem.currentStyle.left;
style.left=name==="fontSize"?"1em":(ret||0);
ret=style.pixelLeft+"px";
style.left=left;
elem.runtimeStyle.left=rsLeft}
return ret===""?"auto":ret}}
curCSS=getComputedStyle||currentStyle;
function getWH(elem,name,extra){
var which=name==="width"?cssWidth:cssHeight,
val=name==="width"?elem.offsetWidth:elem.offsetHeight;
if(extra==="border"){
return val}
jQuery.each(which,function(){
if(!extra){
val-=parseFloat(jQuery.css(elem,"padding"+this))||0}
if(extra==="margin"){
val+=parseFloat(jQuery.css(elem,"margin"+this))||0}else{
val-=parseFloat(jQuery.css(elem,"border"+this+"Width"))||0}
});
return val}
if(jQuery.expr&&jQuery.expr.filters){
jQuery.expr.filters.hidden=function(elem){
var width=elem.offsetWidth,
height=elem.offsetHeight;
return(width===0&&height===0)||(!jQuery.support.reliableHiddenOffsets&&(elem.style.display||jQuery.css(elem,"display"))==="none")};
jQuery.expr.filters.visible=function(elem){
return!jQuery.expr.filters.hidden(elem)}}
var jsc=jQuery.now(),
rscript=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
rselectTextarea=/^(?:select|textarea)/i,
rinput=/^(?:color|date|datetime|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
rnoContent=/^(?:GET|HEAD)$/,
rbracket=/\[\]$/,
jsre=/\=\?(&|$)/,
rquery=/\?/,
rts=/([?&])_=[^&]*/,
rurl=/^(\w+:)?\/\/([^\/?#]+)/,
r20=/%20/g,
rhash=/#.*$/,
_load=jQuery.fn.load;
jQuery.fn.extend({
load:function(url,params,callback){
if(typeof url!=="string"&&_load){
return _load.apply(this,arguments)}else if(!this.length){
return this}
var off=url.indexOf(" ");
if(off>=0){
var selector=url.slice(off,url.length);
url=url.slice(0,off)}
var type="GET";
if(params){
if(jQuery.isFunction(params)){
callback=params;
params=null}else if(typeof params==="object"){
params=jQuery.param(params,jQuery.ajaxSettings.traditional);
type="POST"}
}
var self=this;
jQuery.ajax({
url:url,
type:type,
dataType:"html",
data:params,
complete:function(res,status){
if(status==="success"||status==="notmodified"){
self.html(selector?
jQuery("<div>")
.append(res.responseText.replace(rscript,""))
.find(selector):
res.responseText)}
if(callback){
self.each(callback,[res.responseText,status,res])}
}
});
return this},
serialize:function(){
return jQuery.param(this.serializeArray())},
serializeArray:function(){
return this.map(function(){
return this.elements?jQuery.makeArray(this.elements):this})
.filter(function(){
return this.name&&!this.disabled&&
(this.checked||rselectTextarea.test(this.nodeName)||
rinput.test(this.type))})
.map(function(i,elem){
var val=jQuery(this).val();
return val==null?
null:
jQuery.isArray(val)?
jQuery.map(val,function(val,i){
return{name:elem.name,value:val}}):
{name:elem.name,value:val}}).get()}
});
jQuery.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(i,o){
jQuery.fn[o]=function(f){
return this.bind(o,f)}});
jQuery.extend({
get:function(url,data,callback,type){
if(jQuery.isFunction(data)){
type=type||callback;
callback=data;
data=null}
return jQuery.ajax({
type:"GET",
url:url,
data:data,
success:callback,
dataType:type
})},
getScript:function(url,callback){
return jQuery.get(url,null,callback,"script")},
getJSON:function(url,data,callback){
return jQuery.get(url,data,callback,"json")},
post:function(url,data,callback,type){
if(jQuery.isFunction(data)){
type=type||callback;
callback=data;
data={}}
return jQuery.ajax({
type:"POST",
url:url,
data:data,
success:callback,
dataType:type
})},
ajaxSetup:function(settings){
jQuery.extend(jQuery.ajaxSettings,settings)},
ajaxSettings:{
url:location.href,
global:true,
type:"GET",
contentType:"application/x-www-form-urlencoded",
processData:true,
async:true,
xhr:function(){
return new window.XMLHttpRequest()},
accepts:{
xml:"application/xml, text/xml",
html:"text/html",
script:"text/javascript, application/javascript",
json:"application/json, text/javascript",
text:"text/plain",
_default:"*/*"
}
},
ajax:function(origSettings){
var s=jQuery.extend(true,{},jQuery.ajaxSettings,origSettings),
jsonp,status,data,type=s.type.toUpperCase(),noContent=rnoContent.test(type);
s.url=s.url.replace(rhash,"");
s.context=origSettings&&origSettings.context!=null?origSettings.context:s;
if(s.data&&s.processData&&typeof s.data!=="string"){
s.data=jQuery.param(s.data,s.traditional)}
if(s.dataType==="jsonp"){
if(type==="GET"){
if(!jsre.test(s.url)){
s.url+=(rquery.test(s.url)?"&":"?")+(s.jsonp||"callback")+"=?"}
}else if(!s.data||!jsre.test(s.data)){
s.data=(s.data?s.data+"&":"")+(s.jsonp||"callback")+"=?"}
s.dataType="json"}
if(s.dataType==="json"&&(s.data&&jsre.test(s.data)||jsre.test(s.url))){
jsonp=s.jsonpCallback||("jsonp"+jsc++);
if(s.data){
s.data=(s.data+"").replace(jsre,"="+jsonp+"$1")}
s.url=s.url.replace(jsre,"="+jsonp+"$1");
s.dataType="script";
var customJsonp=window[jsonp];
window[jsonp]=function(tmp){
if(jQuery.isFunction(customJsonp)){
customJsonp(tmp)}else{
window[jsonp]=undefined;
try{
delete window[jsonp]}catch(jsonpError){}
}
data=tmp;
jQuery.handleSuccess(s,xhr,status,data);
jQuery.handleComplete(s,xhr,status,data);
if(head){
head.removeChild(script)}
}}
if(s.dataType==="script"&&s.cache===null){
s.cache=false}
if(s.cache===false&&noContent){
var ts=jQuery.now();
var ret=s.url.replace(rts,"$1_="+ts);
s.url=ret+((ret===s.url)?(rquery.test(s.url)?"&":"?")+"_="+ts:"")}
if(s.data&&noContent){
s.url+=(rquery.test(s.url)?"&":"?")+s.data}
if(s.global&&jQuery.active++===0){
jQuery.event.trigger("ajaxStart")}
var parts=rurl.exec(s.url),
remote=parts&&(parts[1]&&parts[1].toLowerCase()!==location.protocol||parts[2].toLowerCase()!==location.host);
if(s.dataType==="script"&&type==="GET"&&remote){
var head=document.getElementsByTagName("head")[0]||document.documentElement;
var script=document.createElement("script");
if(s.scriptCharset){
script.charset=s.scriptCharset}
script.src=s.url;
if(!jsonp){
var done=false;
script.onload=script.onreadystatechange=function(){
if(!done&&(!this.readyState||
this.readyState==="loaded"||this.readyState==="complete")){
done=true;
jQuery.handleSuccess(s,xhr,status,data);
jQuery.handleComplete(s,xhr,status,data);
script.onload=script.onreadystatechange=null;
if(head&&script.parentNode){
head.removeChild(script)}
}
}}
head.insertBefore(script,head.firstChild);
return undefined}
var requestDone=false;
var xhr=s.xhr();
if(!xhr){
return}
if(s.username){
xhr.open(type,s.url,s.async,s.username,s.password)}else{
xhr.open(type,s.url,s.async)}
try{
if((s.data!=null&&!noContent)||(origSettings&&origSettings.contentType)){
xhr.setRequestHeader("Content-Type",s.contentType)}
if(s.ifModified){
if(jQuery.lastModified[s.url]){
xhr.setRequestHeader("If-Modified-Since",jQuery.lastModified[s.url])}
if(jQuery.etag[s.url]){
xhr.setRequestHeader("If-None-Match",jQuery.etag[s.url])}
}
if(!remote){
xhr.setRequestHeader("X-Requested-With","XMLHttpRequest")}
xhr.setRequestHeader("Accept",s.dataType&&s.accepts[s.dataType]?
s.accepts[s.dataType]+", */*; q=0.01":
s.accepts._default)}catch(headerError){}
if(s.beforeSend&&s.beforeSend.call(s.context,xhr,s)===false){
if(s.global&&jQuery.active--===1){
jQuery.event.trigger("ajaxStop")}
xhr.abort();
return false}
if(s.global){
jQuery.triggerGlobal(s,"ajaxSend",[xhr,s])}
var onreadystatechange=xhr.onreadystatechange=function(isTimeout){
if(!xhr||xhr.readyState===0||isTimeout==="abort"){
if(!requestDone){
jQuery.handleComplete(s,xhr,status,data)}
requestDone=true;
if(xhr){
xhr.onreadystatechange=jQuery.noop}
}else if(!requestDone&&xhr&&(xhr.readyState===4||isTimeout==="timeout")){
requestDone=true;
xhr.onreadystatechange=jQuery.noop;
status=isTimeout==="timeout"?
"timeout":
!jQuery.httpSuccess(xhr)?
"error":
s.ifModified&&jQuery.httpNotModified(xhr,s.url)?
"notmodified":
"success";
var errMsg;
if(status==="success"){
try{
data=jQuery.httpData(xhr,s.dataType,s)}catch(parserError){
status="parsererror";
errMsg=parserError}
}
if(status==="success"||status==="notmodified"){
if(!jsonp){
jQuery.handleSuccess(s,xhr,status,data)}
}else{
jQuery.handleError(s,xhr,status,errMsg)}
if(!jsonp){
jQuery.handleComplete(s,xhr,status,data)}
if(isTimeout==="timeout"){
xhr.abort()}
if(s.async){
xhr=null}
}
};
try{
var oldAbort=xhr.abort;
xhr.abort=function(){
if(xhr){
Function.prototype.call.call(oldAbort,xhr)}
onreadystatechange("abort")}}catch(abortError){}
if(s.async&&s.timeout>0){
setTimeout(function(){
if(xhr&&!requestDone){
onreadystatechange("timeout")}
},s.timeout)}
try{
xhr.send(noContent||s.data==null?null:s.data)}catch(sendError){
jQuery.handleError(s,xhr,null,sendError);
jQuery.handleComplete(s,xhr,status,data)}
if(!s.async){
onreadystatechange()}
return xhr},
param:function(a,traditional){
var s=[],
add=function(key,value){
value=jQuery.isFunction(value)?value():value;
s[s.length]=encodeURIComponent(key)+"="+encodeURIComponent(value)};
if(traditional===undefined){
traditional=jQuery.ajaxSettings.traditional}
if(jQuery.isArray(a)||a.jquery){
jQuery.each(a,function(){
add(this.name,this.value)})}else{
for(var prefix in a){
buildParams(prefix,a[prefix],traditional,add)}
}
return s.join("&").replace(r20,"+")}
});
function buildParams(prefix,obj,traditional,add){
if(jQuery.isArray(obj)&&obj.length){
jQuery.each(obj,function(i,v){
if(traditional||rbracket.test(prefix)){
add(prefix,v)}else{
buildParams(prefix+"["+(typeof v==="object"||jQuery.isArray(v)?i:"")+"]",v,traditional,add)}
})}else if(!traditional&&obj!=null&&typeof obj==="object"){
if(jQuery.isEmptyObject(obj)){
add(prefix,"")}else{
jQuery.each(obj,function(k,v){
buildParams(prefix+"["+k+"]",v,traditional,add)})}
}else{
add(prefix,obj)}
}
jQuery.extend({
active:0,
lastModified:{},
etag:{},
handleError:function(s,xhr,status,e){
if(s.error){
s.error.call(s.context,xhr,status,e)}
if(s.global){
jQuery.triggerGlobal(s,"ajaxError",[xhr,s,e])}
},
handleSuccess:function(s,xhr,status,data){
if(s.success){
s.success.call(s.context,data,status,xhr)}
if(s.global){
jQuery.triggerGlobal(s,"ajaxSuccess",[xhr,s])}
},
handleComplete:function(s,xhr,status){
if(s.complete){
s.complete.call(s.context,xhr,status)}
if(s.global){
jQuery.triggerGlobal(s,"ajaxComplete",[xhr,s])}
if(s.global&&jQuery.active--===1){
jQuery.event.trigger("ajaxStop")}
},
triggerGlobal:function(s,type,args){
(s.context&&s.context.url==null?jQuery(s.context):jQuery.event).trigger(type,args)},
httpSuccess:function(xhr){
try{
return!xhr.status&&location.protocol==="file:"||
xhr.status>=200&&xhr.status<300||
xhr.status===304||xhr.status===1223}catch(e){}
return false},
httpNotModified:function(xhr,url){
var lastModified=xhr.getResponseHeader("Last-Modified"),
etag=xhr.getResponseHeader("Etag");
if(lastModified){
jQuery.lastModified[url]=lastModified}
if(etag){
jQuery.etag[url]=etag}
return xhr.status===304},
httpData:function(xhr,type,s){
var ct=xhr.getResponseHeader("content-type")||"",
xml=type==="xml"||!type&&ct.indexOf("xml")>=0,
data=xml?xhr.responseXML:xhr.responseText;
if(xml&&data.documentElement.nodeName==="parsererror"){
jQuery.error("parsererror")}
if(s&&s.dataFilter){
data=s.dataFilter(data,type)}
if(typeof data==="string"){
if(type==="json"||!type&&ct.indexOf("json")>=0){
data=jQuery.parseJSON(data)}else if(type==="script"||!type&&ct.indexOf("javascript")>=0){
jQuery.globalEval(data)}
}
return data}
});
if(window.ActiveXObject){
jQuery.ajaxSettings.xhr=function(){
if(window.location.protocol!=="file:"){
try{
return new window.XMLHttpRequest()}catch(xhrError){}
}
try{
return new window.ActiveXObject("Microsoft.XMLHTTP")}catch(activeError){}
}}
jQuery.support.ajax=!!jQuery.ajaxSettings.xhr();
var elemdisplay={},
rfxtypes=/^(?:toggle|show|hide)$/,
rfxnum=/^([+\-]=)?([\d+.\-]+)(.*)$/,
timerId,
fxAttrs=[
["height","marginTop","marginBottom","paddingTop","paddingBottom"],
["width","marginLeft","marginRight","paddingLeft","paddingRight"],
["opacity"]
];
jQuery.fn.extend({
show:function(speed,easing,callback){
var elem,display;
if(speed||speed===0){
return this.animate(genFx("show",3),speed,easing,callback)}else{
for(var i=0,j=this.length;i<j;i++){
elem=this[i];
display=elem.style.display;
if(!jQuery.data(elem,"olddisplay")&&display==="none"){
display=elem.style.display=""}
if(display===""&&jQuery.css(elem,"display")==="none"){
jQuery.data(elem,"olddisplay",defaultDisplay(elem.nodeName))}
}
for(i=0;i<j;i++){
elem=this[i];
display=elem.style.display;
if(display===""||display==="none"){
elem.style.display=jQuery.data(elem,"olddisplay")||""}
}
return this}
},
hide:function(speed,easing,callback){
if(speed||speed===0){
return this.animate(genFx("hide",3),speed,easing,callback)}else{
for(var i=0,j=this.length;i<j;i++){
var display=jQuery.css(this[i],"display");
if(display!=="none"){
jQuery.data(this[i],"olddisplay",display)}
}
for(i=0;i<j;i++){
this[i].style.display="none"}
return this}
},
_toggle:jQuery.fn.toggle,
toggle:function(fn,fn2,callback){
var bool=typeof fn==="boolean";
if(jQuery.isFunction(fn)&&jQuery.isFunction(fn2)){
this._toggle.apply(this,arguments)}else if(fn==null||bool){
this.each(function(){
var state=bool?fn:jQuery(this).is(":hidden");
jQuery(this)[state?"show":"hide"]()})}else{
this.animate(genFx("toggle",3),fn,fn2,callback)}
return this},
fadeTo:function(speed,to,easing,callback){
return this.filter(":hidden").css("opacity",0).show().end()
.animate({opacity:to},speed,easing,callback)},
animate:function(prop,speed,easing,callback){
var optall=jQuery.speed(speed,easing,callback);
if(jQuery.isEmptyObject(prop)){
return this.each(optall.complete)}
return this[optall.queue===false?"each":"queue"](function(){
var opt=jQuery.extend({},optall),p,
isElement=this.nodeType===1,
hidden=isElement&&jQuery(this).is(":hidden"),
self=this;
for(p in prop){
var name=jQuery.camelCase(p);
if(p!==name){
prop[name]=prop[p];
delete prop[p];
p=name}
if(prop[p]==="hide"&&hidden||prop[p]==="show"&&!hidden){
return opt.complete.call(this)}
if(isElement&&(p==="height"||p==="width")){
opt.overflow=[this.style.overflow,this.style.overflowX,this.style.overflowY];
if(jQuery.css(this,"display")==="inline"&&
jQuery.css(this,"float")==="none"){
if(!jQuery.support.inlineBlockNeedsLayout){
this.style.display="inline-block"}else{
var display=defaultDisplay(this.nodeName);
if(display==="inline"){
this.style.display="inline-block"}else{
this.style.display="inline";
this.style.zoom=1}
}
}
}
if(jQuery.isArray(prop[p])){
(opt.specialEasing=opt.specialEasing||{})[p]=prop[p][1];
prop[p]=prop[p][0]}
}
if(opt.overflow!=null){
this.style.overflow="hidden"}
opt.curAnim=jQuery.extend({},prop);
jQuery.each(prop,function(name,val){
var e=new jQuery.fx(self,opt,name);
if(rfxtypes.test(val)){
e[val==="toggle"?hidden?"show":"hide":val](prop)}else{
var parts=rfxnum.exec(val),
start=e.cur()||0;
if(parts){
var end=parseFloat(parts[2]),
unit=parts[3]||"px";
if(unit!=="px"){
jQuery.style(self,name,(end||1)+unit);
start=((end||1)/e.cur())*start;
jQuery.style(self,name,start+unit)}
if(parts[1]){
end=((parts[1]==="-="?-1:1)*end)+start}
e.custom(start,end,unit)}else{
e.custom(start,val,"")}
}
});
return true})},
stop:function(clearQueue,gotoEnd){
var timers=jQuery.timers;
if(clearQueue){
this.queue([])}
this.each(function(){
for(var i=timers.length-1;i>=0;i--){
if(timers[i].elem===this){
if(gotoEnd){
timers[i](true)}
timers.splice(i,1)}
}
});
if(!gotoEnd){
this.dequeue()}
return this}
});
function genFx(type,num){
var obj={};
jQuery.each(fxAttrs.concat.apply([],fxAttrs.slice(0,num)),function(){
obj[this]=type});
return obj}
jQuery.each({
slideDown:genFx("show",1),
slideUp:genFx("hide",1),
slideToggle:genFx("toggle",1),
fadeIn:{opacity:"show"},
fadeOut:{opacity:"hide"},
fadeToggle:{opacity:"toggle"}
},function(name,props){
jQuery.fn[name]=function(speed,easing,callback){
return this.animate(props,speed,easing,callback)}});
jQuery.extend({
speed:function(speed,easing,fn){
var opt=speed&&typeof speed==="object"?jQuery.extend({},speed):{
complete:fn||!fn&&easing||
jQuery.isFunction(speed)&&speed,
duration:speed,
easing:fn&&easing||easing&&!jQuery.isFunction(easing)&&easing
};
opt.duration=jQuery.fx.off?0:typeof opt.duration==="number"?opt.duration:
opt.duration in jQuery.fx.speeds?jQuery.fx.speeds[opt.duration]:jQuery.fx.speeds._default;
opt.old=opt.complete;
opt.complete=function(){
if(opt.queue!==false){
jQuery(this).dequeue()}
if(jQuery.isFunction(opt.old)){
opt.old.call(this)}
};
return opt},
easing:{
linear:function(p,n,firstNum,diff){
return firstNum+diff*p},
swing:function(p,n,firstNum,diff){
return((-Math.cos(p*Math.PI)/2)+0.5)*diff+firstNum}
},
timers:[],
fx:function(elem,options,prop){
this.options=options;
this.elem=elem;
this.prop=prop;
if(!options.orig){
options.orig={}}
}
});
jQuery.fx.prototype={
update:function(){
if(this.options.step){
this.options.step.call(this.elem,this.now,this)}
(jQuery.fx.step[this.prop]||jQuery.fx.step._default)(this)},
cur:function(){
if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null)){
return this.elem[this.prop]}
var r=parseFloat(jQuery.css(this.elem,this.prop));
return r&&r>-10000?r:0},
custom:function(from,to,unit){
var self=this,
fx=jQuery.fx;
this.startTime=jQuery.now();
this.start=from;
this.end=to;
this.unit=unit||this.unit||"px";
this.now=this.start;
this.pos=this.state=0;
function t(gotoEnd){
return self.step(gotoEnd)}
t.elem=this.elem;
if(t()&&jQuery.timers.push(t)&&!timerId){
timerId=setInterval(fx.tick,fx.interval)}
},
show:function(){
this.options.orig[this.prop]=jQuery.style(this.elem,this.prop);
this.options.show=true;
this.custom(this.prop==="width"||this.prop==="height"?1:0,this.cur());
jQuery(this.elem).show()},
hide:function(){
this.options.orig[this.prop]=jQuery.style(this.elem,this.prop);
this.options.hide=true;
this.custom(this.cur(),0)},
step:function(gotoEnd){
var t=jQuery.now(),done=true;
if(gotoEnd||t>=this.options.duration+this.startTime){
this.now=this.end;
this.pos=this.state=1;
this.update();
this.options.curAnim[this.prop]=true;
for(var i in this.options.curAnim){
if(this.options.curAnim[i]!==true){
done=false}
}
if(done){
if(this.options.overflow!=null&&!jQuery.support.shrinkWrapBlocks){
var elem=this.elem,
options=this.options;
jQuery.each(["","X","Y"],function(index,value){
elem.style["overflow"+value]=options.overflow[index]})}
if(this.options.hide){
jQuery(this.elem).hide()}
if(this.options.hide||this.options.show){
for(var p in this.options.curAnim){
jQuery.style(this.elem,p,this.options.orig[p])}
}
this.options.complete.call(this.elem)}
return false}else{
var n=t-this.startTime;
this.state=n/this.options.duration;
var specialEasing=this.options.specialEasing&&this.options.specialEasing[this.prop];
var defaultEasing=this.options.easing||(jQuery.easing.swing?"swing":"linear");
this.pos=jQuery.easing[specialEasing||defaultEasing](this.state,n,0,1,this.options.duration);
this.now=this.start+((this.end-this.start)*this.pos);
this.update()}
return true}
};
jQuery.extend(jQuery.fx,{
tick:function(){
var timers=jQuery.timers;
for(var i=0;i<timers.length;i++){
if(!timers[i]()){
timers.splice(i--,1)}
}
if(!timers.length){
jQuery.fx.stop()}
},
interval:13,
stop:function(){
clearInterval(timerId);
timerId=null},
speeds:{
slow:600,
fast:200,
_default:400
},
step:{
opacity:function(fx){
jQuery.style(fx.elem,"opacity",fx.now)},
_default:function(fx){
if(fx.elem.style&&fx.elem.style[fx.prop]!=null){
fx.elem.style[fx.prop]=(fx.prop==="width"||fx.prop==="height"?Math.max(0,fx.now):fx.now)+fx.unit}else{
fx.elem[fx.prop]=fx.now}
}
}
});
if(jQuery.expr&&jQuery.expr.filters){
jQuery.expr.filters.animated=function(elem){
return jQuery.grep(jQuery.timers,function(fn){
return elem===fn.elem}).length}}
function defaultDisplay(nodeName){
if(!elemdisplay[nodeName]){
var elem=jQuery("<"+nodeName+">").appendTo("body"),
display=elem.css("display");
elem.remove();
if(display==="none"||display===""){
display="block"}
elemdisplay[nodeName]=display}
return elemdisplay[nodeName]}
var rtable=/^t(?:able|d|h)$/i,
rroot=/^(?:body|html)$/i;
if("getBoundingClientRect"in document.documentElement){
jQuery.fn.offset=function(options){
var elem=this[0],box;
if(options){
return this.each(function(i){
jQuery.offset.setOffset(this,options,i)})}
if(!elem||!elem.ownerDocument){
return null}
if(elem===elem.ownerDocument.body){
return jQuery.offset.bodyOffset(elem)}
try{
box=elem.getBoundingClientRect()}catch(e){}
var doc=elem.ownerDocument,
docElem=doc.documentElement;
if(!box||!jQuery.contains(docElem,elem)){
return box||{top:0,left:0}}
var body=doc.body,
win=getWindow(doc),
clientTop=docElem.clientTop||body.clientTop||0,
clientLeft=docElem.clientLeft||body.clientLeft||0,
scrollTop=(win.pageYOffset||jQuery.support.boxModel&&docElem.scrollTop||body.scrollTop),
scrollLeft=(win.pageXOffset||jQuery.support.boxModel&&docElem.scrollLeft||body.scrollLeft),
top=box.top+scrollTop-clientTop,
left=box.left+scrollLeft-clientLeft;
return{top:top,left:left}}}else{
jQuery.fn.offset=function(options){
var elem=this[0];
if(options){
return this.each(function(i){
jQuery.offset.setOffset(this,options,i)})}
if(!elem||!elem.ownerDocument){
return null}
if(elem===elem.ownerDocument.body){
return jQuery.offset.bodyOffset(elem)}
jQuery.offset.initialize();
var computedStyle,
offsetParent=elem.offsetParent,
prevOffsetParent=elem,
doc=elem.ownerDocument,
docElem=doc.documentElement,
body=doc.body,
defaultView=doc.defaultView,
prevComputedStyle=defaultView?defaultView.getComputedStyle(elem,null):elem.currentStyle,
top=elem.offsetTop,
left=elem.offsetLeft;
while((elem=elem.parentNode)&&elem!==body&&elem!==docElem){
if(jQuery.offset.supportsFixedPosition&&prevComputedStyle.position==="fixed"){
break}
computedStyle=defaultView?defaultView.getComputedStyle(elem,null):elem.currentStyle;
top-=elem.scrollTop;
left-=elem.scrollLeft;
if(elem===offsetParent){
top+=elem.offsetTop;
left+=elem.offsetLeft;
if(jQuery.offset.doesNotAddBorder&&!(jQuery.offset.doesAddBorderForTableAndCells&&rtable.test(elem.nodeName))){
top+=parseFloat(computedStyle.borderTopWidth)||0;
left+=parseFloat(computedStyle.borderLeftWidth)||0}
prevOffsetParent=offsetParent;
offsetParent=elem.offsetParent}
if(jQuery.offset.subtractsBorderForOverflowNotVisible&&computedStyle.overflow!=="visible"){
top+=parseFloat(computedStyle.borderTopWidth)||0;
left+=parseFloat(computedStyle.borderLeftWidth)||0}
prevComputedStyle=computedStyle}
if(prevComputedStyle.position==="relative"||prevComputedStyle.position==="static"){
top+=body.offsetTop;
left+=body.offsetLeft}
if(jQuery.offset.supportsFixedPosition&&prevComputedStyle.position==="fixed"){
top+=Math.max(docElem.scrollTop,body.scrollTop);
left+=Math.max(docElem.scrollLeft,body.scrollLeft)}
return{top:top,left:left}}}
jQuery.offset={
initialize:function(){
var body=document.body,container=document.createElement("div"),innerDiv,checkDiv,table,td,bodyMarginTop=parseFloat(jQuery.css(body,"marginTop"))||0,
html="<div style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;'><div></div></div><table style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;' cellpadding='0' cellspacing='0'><tr><td></td></tr></table>";
jQuery.extend(container.style,{position:"absolute",top:0,left:0,margin:0,border:0,width:"1px",height:"1px",visibility:"hidden"});
container.innerHTML=html;
body.insertBefore(container,body.firstChild);
innerDiv=container.firstChild;
checkDiv=innerDiv.firstChild;
td=innerDiv.nextSibling.firstChild.firstChild;
this.doesNotAddBorder=(checkDiv.offsetTop!==5);
this.doesAddBorderForTableAndCells=(td.offsetTop===5);
checkDiv.style.position="fixed";
checkDiv.style.top="20px";
this.supportsFixedPosition=(checkDiv.offsetTop===20||checkDiv.offsetTop===15);
checkDiv.style.position=checkDiv.style.top="";
innerDiv.style.overflow="hidden";
innerDiv.style.position="relative";
this.subtractsBorderForOverflowNotVisible=(checkDiv.offsetTop===-5);
this.doesNotIncludeMarginInBodyOffset=(body.offsetTop!==bodyMarginTop);
body.removeChild(container);
body=container=innerDiv=checkDiv=table=td=null;
jQuery.offset.initialize=jQuery.noop},
bodyOffset:function(body){
var top=body.offsetTop,
left=body.offsetLeft;
jQuery.offset.initialize();
if(jQuery.offset.doesNotIncludeMarginInBodyOffset){
top+=parseFloat(jQuery.css(body,"marginTop"))||0;
left+=parseFloat(jQuery.css(body,"marginLeft"))||0}
return{top:top,left:left}},
setOffset:function(elem,options,i){
var position=jQuery.css(elem,"position");
if(position==="static"){
elem.style.position="relative"}
var curElem=jQuery(elem),
curOffset=curElem.offset(),
curCSSTop=jQuery.css(elem,"top"),
curCSSLeft=jQuery.css(elem,"left"),
calculatePosition=(position==="absolute"&&jQuery.inArray('auto',[curCSSTop,curCSSLeft])>-1),
props={},curPosition={},curTop,curLeft;
if(calculatePosition){
curPosition=curElem.position()}
curTop=calculatePosition?curPosition.top:parseInt(curCSSTop,10)||0;
curLeft=calculatePosition?curPosition.left:parseInt(curCSSLeft,10)||0;
if(jQuery.isFunction(options)){
options=options.call(elem,i,curOffset)}
if(options.top!=null){
props.top=(options.top-curOffset.top)+curTop}
if(options.left!=null){
props.left=(options.left-curOffset.left)+curLeft}
if("using"in options){
options.using.call(elem,props)}else{
curElem.css(props)}
}
};
jQuery.fn.extend({
position:function(){
if(!this[0]){
return null}
var elem=this[0],
offsetParent=this.offsetParent(),
offset=this.offset(),
parentOffset=rroot.test(offsetParent[0].nodeName)?{top:0,left:0}:offsetParent.offset();
offset.top-=parseFloat(jQuery.css(elem,"marginTop"))||0;
offset.left-=parseFloat(jQuery.css(elem,"marginLeft"))||0;
parentOffset.top+=parseFloat(jQuery.css(offsetParent[0],"borderTopWidth"))||0;
parentOffset.left+=parseFloat(jQuery.css(offsetParent[0],"borderLeftWidth"))||0;
return{
top:offset.top-parentOffset.top,
left:offset.left-parentOffset.left
}},
offsetParent:function(){
return this.map(function(){
var offsetParent=this.offsetParent||document.body;
while(offsetParent&&(!rroot.test(offsetParent.nodeName)&&jQuery.css(offsetParent,"position")==="static")){
offsetParent=offsetParent.offsetParent}
return offsetParent})}
});
jQuery.each(["Left","Top"],function(i,name){
var method="scroll"+name;
jQuery.fn[method]=function(val){
var elem=this[0],win;
if(!elem){
return null}
if(val!==undefined){
return this.each(function(){
win=getWindow(this);
if(win){
win.scrollTo(
!i?val:jQuery(win).scrollLeft(),
i?val:jQuery(win).scrollTop()
)}else{
this[method]=val}
})}else{
win=getWindow(elem);
return win?("pageXOffset"in win)?win[i?"pageYOffset":"pageXOffset"]:
jQuery.support.boxModel&&win.document.documentElement[method]||
win.document.body[method]:
elem[method]}
}});
function getWindow(elem){
return jQuery.isWindow(elem)?
elem:
elem.nodeType===9?
elem.defaultView||elem.parentWindow:
false}
jQuery.each(["Height","Width"],function(i,name){
var type=name.toLowerCase();
jQuery.fn["inner"+name]=function(){
return this[0]?
parseFloat(jQuery.css(this[0],type,"padding")):
null};
jQuery.fn["outer"+name]=function(margin){
return this[0]?
parseFloat(jQuery.css(this[0],type,margin?"margin":"border")):
null};
jQuery.fn[type]=function(size){
var elem=this[0];
if(!elem){
return size==null?null:this}
if(jQuery.isFunction(size)){
return this.each(function(i){
var self=jQuery(this);
self[type](size.call(this,i,self[type]()))})}
if(jQuery.isWindow(elem)){
return elem.document.compatMode==="CSS1Compat"&&elem.document.documentElement["client"+name]||
elem.document.body["client"+name]}else if(elem.nodeType===9){
return Math.max(
elem.documentElement["client"+name],
elem.body["scroll"+name],elem.documentElement["scroll"+name],
elem.body["offset"+name],elem.documentElement["offset"+name]
)}else if(size===undefined){
var orig=jQuery.css(elem,type),
ret=parseFloat(orig);
return jQuery.isNaN(ret)?orig:ret}else{
return this.css(type,typeof size==="string"?size:size+"px")}
}})})(window);


/* ../prive/javascript/jquery.form.js */

;(function($){
$.fn.ajaxSubmit=function(options){
if(!this.length){
log('ajaxSubmit: skipping submit process - no element selected');
return this}
if(typeof options=='function')
options={success:options};
var url=$.trim(this.attr('action'));
if(url){
url=(url.match(/^([^#]+)/)||[])[1]}
url=url||window.location.href||'';
options=$.extend({
url:url,
type:this.attr('method')||'GET',
iframeSrc:/^https/i.test(window.location.href||'')?'javascript:false':'about:blank'
},options||{});
var veto={};
this.trigger('form-pre-serialize',[this,options,veto]);
if(veto.veto){
log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');
return this}
if(options.beforeSerialize&&options.beforeSerialize(this,options)===false){
log('ajaxSubmit: submit aborted via beforeSerialize callback');
return this}
var a=this.formToArray(options.semantic);
if(options.data){
options.extraData=options.data;
for(var n in options.data){
if(options.data[n]instanceof Array){
for(var k in options.data[n])
a.push({name:n,value:options.data[n][k]})}
else
a.push({name:n,value:options.data[n]})}
}
if(options.beforeSubmit&&options.beforeSubmit(a,this,options)===false){
log('ajaxSubmit: submit aborted via beforeSubmit callback');
return this}
this.trigger('form-submit-validate',[a,this,options,veto]);
if(veto.veto){
log('ajaxSubmit: submit vetoed via form-submit-validate trigger');
return this}
var q=$.param(a);
if(options.type.toUpperCase()=='GET'){
options.url+=(options.url.indexOf('?')>=0?'&':'?')+q;
options.data=null}
else
options.data=q;
var $form=this,callbacks=[];
if(options.resetForm)callbacks.push(function(){$form.resetForm()});
if(options.clearForm)callbacks.push(function(){$form.clearForm()});
if(!options.dataType&&options.target){
var oldSuccess=options.success||function(){};
callbacks.push(function(data){
$(options.target).html(data).each(oldSuccess,arguments)})}
else if(options.success)
callbacks.push(options.success);
options.success=function(data,status){
for(var i=0,max=callbacks.length;i<max;i++)
callbacks[i].apply(options,[data,status,$form])};
var files=$('input:file',this).fieldValue();
var found=false;
for(var j=0;j<files.length;j++)
if(files[j])
found=true;
var multipart=false;
if((files.length&&options.iframe!==false)||options.iframe||found||multipart){
if(options.closeKeepAlive)
$.get(options.closeKeepAlive,fileUpload);
else
fileUpload()}
else
$.ajax(options);
this.trigger('form-submit-notify',[this,options]);
return this;
function fileUpload(){
var form=$form[0];
if($(':input[name=submit]',form).length){
alert('Error: Form elements must not be named "submit".');
return}
var opts=$.extend({},$.ajaxSettings,options);
var s=$.extend(true,{},$.extend(true,{},$.ajaxSettings),opts);
var id='jqFormIO'+(new Date().getTime());
var $io=$('<iframe id="'+id+'" name="'+id+'" src="'+opts.iframeSrc+'" />');
var io=$io[0];
$io.css({position:'absolute',top:'-1000px',left:'-1000px'});
var xhr={aborted:0,
responseText:null,
responseXML:null,
status:0,
statusText:'n/a',
getAllResponseHeaders:function(){},
getResponseHeader:function(){},
setRequestHeader:function(){},
abort:function(){
this.aborted=1;
$io.attr('src',opts.iframeSrc)}
};
var g=opts.global;
if(g&&!$.active++)$.event.trigger("ajaxStart");
if(g)$.event.trigger("ajaxSend",[xhr,opts]);
if(s.beforeSend&&s.beforeSend(xhr,s)===false){
s.global&&$.active--;
return}
if(xhr.aborted)
return;
var cbInvoked=0;
var timedOut=0;
var sub=form.clk;
if(sub){
var n=sub.name;
if(n&&!sub.disabled){
options.extraData=options.extraData||{};
options.extraData[n]=sub.value;
if(sub.type=="image"){
options.extraData[name+'.x']=form.clk_x;
options.extraData[name+'.y']=form.clk_y}
}
}
setTimeout(function(){
var t=$form.attr('target'),a=$form.attr('action');
form.setAttribute('target',id);
if(form.getAttribute('method')!='POST')
form.setAttribute('method','POST');
if(form.getAttribute('action')!=opts.url)
form.setAttribute('action',opts.url);
if(!options.skipEncodingOverride){
$form.attr({
encoding:'multipart/form-data',
enctype:'multipart/form-data'
})}
if(opts.timeout)
setTimeout(function(){timedOut=true;cb()},opts.timeout);
var extraInputs=[];
try{
if(options.extraData)
for(var n in options.extraData)
extraInputs.push(
$('<input type="hidden" name="'+n+'" value="'+options.extraData[n]+'" />')
.appendTo(form)[0]);
$io.appendTo('body');
io.attachEvent?io.attachEvent('onload',cb):io.addEventListener('load',cb,false);
form.submit()}
finally{
form.setAttribute('action',a);
t?form.setAttribute('target',t):$form.removeAttr('target');
$(extraInputs).remove()}
},10);
var domCheckCount=50;
function cb(){
if(cbInvoked++)return;
io.detachEvent?io.detachEvent('onload',cb):io.removeEventListener('load',cb,false);
var ok=true;
try{
if(timedOut)throw'timeout';
var data,doc;
doc=io.contentWindow?io.contentWindow.document:io.contentDocument?io.contentDocument:io.document;
var isXml=opts.dataType=='xml'||doc.XMLDocument||$.isXMLDoc(doc);
log('isXml='+isXml);
if(!isXml&&(doc.body==null||doc.body.innerHTML=='')){
if(--domCheckCount){
cbInvoked=0;
setTimeout(cb,100);
return}
log('Could not access iframe DOM after 50 tries.');
return}
xhr.responseText=doc.body?doc.body.innerHTML:null;
xhr.responseXML=doc.XMLDocument?doc.XMLDocument:doc;
xhr.getResponseHeader=function(header){
var headers={'content-type':opts.dataType};
return headers[header]};
if(opts.dataType=='json'||opts.dataType=='script'){
var ta=doc.getElementsByTagName('textarea')[0];
if(ta)
xhr.responseText=ta.value;
else{
var pre=doc.getElementsByTagName('pre')[0];
if(pre)
xhr.responseText=pre.innerHTML}
}
else if(opts.dataType=='xml'&&!xhr.responseXML&&xhr.responseText!=null){
xhr.responseXML=toXml(xhr.responseText)}
data=$.httpData(xhr,opts.dataType)}
catch(e){
ok=false;
$.handleError(opts,xhr,'error',e)}
if(ok){
opts.success(data,'success');
if(g)$.event.trigger("ajaxSuccess",[xhr,opts])}
if(g)$.event.trigger("ajaxComplete",[xhr,opts]);
if(g&&!--$.active)$.event.trigger("ajaxStop");
if(opts.complete)opts.complete(xhr,ok?'success':'error');
setTimeout(function(){
$io.remove();
xhr.responseXML=null},100)};
function toXml(s,doc){
if(window.ActiveXObject){
doc=new ActiveXObject('Microsoft.XMLDOM');
doc.async='false';
doc.loadXML(s)}
else
doc=(new DOMParser()).parseFromString(s,'text/xml');
return(doc&&doc.documentElement&&doc.documentElement.tagName!='parsererror')?doc:null}}};
$.fn.ajaxForm=function(options){
return this.ajaxFormUnbind().bind('submit.form-plugin',function(){
$(this).ajaxSubmit(options);
return false}).bind('click.form-plugin',function(e){
var target=e.target;
var $el=$(target);
if(!($el.is(":submit,input:image"))){
var t=$el.closest(':submit');
if(t.length==0)
return;
target=t[0]}
var form=this;
form.clk=target;
if(target.type=='image'){
if(e.offsetX!=undefined){
form.clk_x=e.offsetX;
form.clk_y=e.offsetY}else if(typeof $.fn.offset=='function'){var offset=$el.offset();
form.clk_x=e.pageX-offset.left;
form.clk_y=e.pageY-offset.top}else{
form.clk_x=e.pageX-target.offsetLeft;
form.clk_y=e.pageY-target.offsetTop}
}
setTimeout(function(){form.clk=form.clk_x=form.clk_y=null},100)})};
$.fn.ajaxFormUnbind=function(){
return this.unbind('submit.form-plugin click.form-plugin')};
$.fn.formToArray=function(semantic){
var a=[];
if(this.length==0)return a;
var form=this[0];
var els=semantic?form.getElementsByTagName('*'):form.elements;
if(!els)return a;
for(var i=0,max=els.length;i<max;i++){
var el=els[i];
var n=el.name;
if(!n)continue;
if(semantic&&form.clk&&el.type=="image"){
if(!el.disabled&&form.clk==el){
a.push({name:n,value:$(el).val()});
a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y})}
continue}
var v=$.fieldValue(el,true);
if(v&&v.constructor==Array){
for(var j=0,jmax=v.length;j<jmax;j++)
a.push({name:n,value:v[j]})}
else if(v!==null&&typeof v!='undefined')
a.push({name:n,value:v})}
if(!semantic&&form.clk){
var $input=$(form.clk),input=$input[0],n=input.name;
if(n&&!input.disabled&&input.type=='image'){
a.push({name:n,value:$input.val()});
a.push({name:n+'.x',value:form.clk_x},{name:n+'.y',value:form.clk_y})}
}
return a};
$.fn.formSerialize=function(semantic){
return $.param(this.formToArray(semantic))};
$.fn.fieldSerialize=function(successful){
var a=[];
this.each(function(){
var n=this.name;
if(!n)return;
var v=$.fieldValue(this,successful);
if(v&&v.constructor==Array){
for(var i=0,max=v.length;i<max;i++)
a.push({name:n,value:v[i]})}
else if(v!==null&&typeof v!='undefined')
a.push({name:this.name,value:v})});
return $.param(a)};
$.fn.fieldValue=function(successful){
for(var val=[],i=0,max=this.length;i<max;i++){
var el=this[i];
var v=$.fieldValue(el,successful);
if(v===null||typeof v=='undefined'||(v.constructor==Array&&!v.length))
continue;
v.constructor==Array?$.merge(val,v):val.push(v)}
return val};
$.fieldValue=function(el,successful){
var n=el.name,t=el.type,tag=el.tagName.toLowerCase();
if(typeof successful=='undefined')successful=true;
if(successful&&(!n||el.disabled||t=='reset'||t=='button'||
(t=='checkbox'||t=='radio')&&!el.checked||
(t=='submit'||t=='image')&&el.form&&el.form.clk!=el||
tag=='select'&&el.selectedIndex==-1))
return null;
if(tag=='select'){
var index=el.selectedIndex;
if(index<0)return null;
var a=[],ops=el.options;
var one=(t=='select-one');
var max=(one?index+1:ops.length);
for(var i=(one?index:0);i<max;i++){
var op=ops[i];
if(op.selected){
var v=op.value;
if(!v)v=(op.attributes&&op.attributes['value']&&!(op.attributes['value'].specified))?op.text:op.value;
if(one)return v;
a.push(v)}
}
return a}
return el.value};
$.fn.clearForm=function(){
return this.each(function(){
$('input,select,textarea',this).clearFields()})};
$.fn.clearFields=$.fn.clearInputs=function(){
return this.each(function(){
var t=this.type,tag=this.tagName.toLowerCase();
if(t=='text'||t=='password'||tag=='textarea')
this.value='';
else if(t=='checkbox'||t=='radio')
this.checked=false;
else if(tag=='select')
this.selectedIndex=-1})};
$.fn.resetForm=function(){
return this.each(function(){
if(typeof this.reset=='function'||(typeof this.reset=='object'&&!this.reset.nodeType))
this.reset()})};
$.fn.enable=function(b){
if(b==undefined)b=true;
return this.each(function(){
this.disabled=!b})};
$.fn.selected=function(select){
if(select==undefined)select=true;
return this.each(function(){
var t=this.type;
if(t=='checkbox'||t=='radio')
this.checked=select;
else if(this.tagName.toLowerCase()=='option'){
var $sel=$(this).parent('select');
if(select&&$sel[0]&&$sel[0].type=='select-one'){
$sel.find('option').selected(false)}
this.selected=select}
})};
function log(){
if($.fn.ajaxSubmit.debug&&window.console&&window.console.log)
window.console.log('[jquery.form] '+Array.prototype.join.call(arguments,''))}})(jQuery);


/* ../prive/javascript/ajaxCallback.js */
if(!jQuery.load_handlers){
jQuery.load_handlers=new Array();
function onAjaxLoad(f){
jQuery.load_handlers.push(f)};
function triggerAjaxLoad(root){
for(var i=0;i<jQuery.load_handlers.length;i++)
jQuery.load_handlers[i].apply(root)};
jQuery.fn._ACBload=jQuery.fn.load;
jQuery.fn.load=function(url,params,callback){
callback=callback||function(){};
if(params){
if(params.constructor==Function){
callback=params;
params=null}
}
var callback2=function(res,status){triggerAjaxLoad(this);callback.call(this,res,status)};
return this._ACBload(url,params,callback2)};
jQuery._ACBajax=jQuery.ajax;
jQuery.ajax=function(type){
var s=jQuery.extend(true,{},jQuery.ajaxSettings,type);
var callbackContext=s.context||s;
if(jQuery.ajax.caller==jQuery.fn._load)return jQuery._ACBajax(type);
var orig_complete=s.complete||function(){};
type.complete=function(res,status){
var dataType=type.dataType;
var ct=(res&&(typeof res.getResponseHeader=='function'))
?res.getResponseHeader("content-type"):'';
var xml=!dataType&&ct&&ct.indexOf("xml")>=0;
orig_complete.call(callbackContext,res,status);
if(!dataType&&!xml||dataType=="html")triggerAjaxLoad(document)};
return jQuery._ACBajax(type)}}
jQuery.fn.animeajax=function(end){
this.children().css('opacity',0.5);
if(typeof ajax_image_searching!='undefined'){
var i=(this).find('.image_loading');
if(i.length)i.eq(0).html(ajax_image_searching);
else this.prepend('<span class="image_loading">'+ajax_image_searching+'</span>')}
return this}
jQuery.fn.positionner=function(force){
var offset=jQuery(this).offset();
var hauteur=parseInt(jQuery(this).css('height'));
var scrolltop=self['pageYOffset']||
jQuery.boxModel&&document.documentElement['scrollTop']||
document.body['scrollTop'];
var h=jQuery(window).height();
var scroll=0;
if(force||offset['top']-5<=scrolltop)
scroll=offset['top']-5;
else if(offset['top']+hauteur-h+5>scrolltop)
scroll=Math.min(offset['top']-5,offset['top']+hauteur-h+15);
if(scroll)
jQuery('html,body')
.animate({scrollTop:scroll},300);
jQuery(jQuery('*',this).filter('input[type=text],textarea')[0]).focus();
return this}
var virtualbuffer_id='spip_virtualbufferupdate';
function initReaderBuffer(){
if(jQuery('#'+virtualbuffer_id).length)return;
jQuery('body').append('<p style="float:left;width:0;height:0;position:absolute;left:-5000;top:-5000;"><input type="hidden" name="'+virtualbuffer_id+'" id="'+virtualbuffer_id+'" value="0" /></p>')}
function updateReaderBuffer(){
var i=jQuery('#'+virtualbuffer_id);
if(!i.length)return;
i.attr('value',parseInt(i.attr('value'))+1)}
jQuery.fn.formulaire_dyn_ajax=function(target){
if(this.length)
initReaderBuffer();
return this.each(function(){
var cible=target||this;
jQuery('form:not(.noajax,.bouton_action_post)',this).each(function(){
var leform=this;
var leclk,leclk_x,leclk_y;
jQuery(this).prepend("<input type='hidden' name='var_ajax' value='form' />")
.ajaxForm({
beforeSubmit:function(){
leclk=leform.clk;
if(leclk){
var n=leclk.name;
if(n&&!leclk.disabled&&leclk.type=="image"){
leclk_x=leform.clk_x;
leclk_y=leform.clk_y}
}
jQuery(cible).addClass('loading').animeajax()},
success:function(c){
if(c=='noajax'){
jQuery("input[name=var_ajax]",leform).remove();
if(leclk){
var n=leclk.name;
if(n&&!leclk.disabled){
jQuery(leform).prepend("<input type='hidden' name='"+n+"' value='"+leclk.value+"' />");
if(leclk.type=="image"){
jQuery(leform).prepend("<input type='hidden' name='"+n+".x' value='"+leform.clk_x+"' />");
jQuery(leform).prepend("<input type='hidden' name='"+n+".y' value='"+leform.clk_y+"' />")}
}
}
jQuery(leform).ajaxFormUnbind().submit()}
else{
var recu=jQuery('<div><\/div>').html(c);
var d=jQuery('div.ajax',recu);
if(d.length)
c=d.html();
jQuery(cible)
.removeClass('loading')
.html(c);
var a=jQuery('a:first',recu).eq(0);
if(a.length
&&a.is('a[name=ajax_ancre]')
&&jQuery(a.attr('href'),cible).length){
a=a.attr('href');
if(jQuery(a,cible).length)
setTimeout(function(){
jQuery(a,cible).positionner(true)},10)}
else{
jQuery(cible).positionner(false);
if(a.length&&a.is('a[name=ajax_redirect]')){
a=a.attr('href');
jQuery(cible).addClass('loading').animeajax();
setTimeout(function(){
document.location.replace(a)},10)}
}
triggerAjaxLoad(cible);
updateReaderBuffer()}
},
iframe:jQuery.browser.msie
})
.addClass('noajax')})})}
var ajax_confirm=true;
var ajax_confirm_date=0;
var spip_confirm=window.confirm;
function _confirm(message){
ajax_confirm=spip_confirm(message);
if(!ajax_confirm){
var d=new Date();
ajax_confirm_date=d.getTime()}
return ajax_confirm}
window.confirm=_confirm;
var preloaded_urls={};
var ajaxbloc_selecteur;
jQuery.fn.ajaxbloc=function(){
if(this.length)
initReaderBuffer();
return this.each(function(){
jQuery('div.ajaxbloc',this).ajaxbloc();var blocfrag=jQuery(this);
var on_pagination=function(c){
jQuery(blocfrag)
.html(c)
.removeClass('loading');
var a=jQuery('a:first',jQuery(blocfrag)).eq(0);
if(a.length
&&a.is('a[name=ajax_ancre]')
&&jQuery(a.attr('href'),blocfrag).length){
a=a.attr('href')
setTimeout(function(){
jQuery(a,blocfrag).positionner(true)},10)}
else{
jQuery(blocfrag).positionner(false)}
updateReaderBuffer()}
var ajax_env=(""+blocfrag.attr('class')).match(/env-([^ ]+)/);
if(!ajax_env||ajax_env==undefined)return;
ajax_env=ajax_env[1];
if(ajaxbloc_selecteur==undefined)
ajaxbloc_selecteur='.pagination a,a.ajax';
jQuery(ajaxbloc_selecteur,this).not('.noajax').each(function(){
var url=this.href.split('#');
url[0]+=(url[0].indexOf("?")>0?'&':'?')+'var_ajax=1&var_ajax_env='+encodeURIComponent(ajax_env);
if(url[1])
url[0]+="&var_ajax_ancre="+url[1];
if(jQuery(this).is('.preload')&&!preloaded_urls[url[0]]){
jQuery.ajax({"url":url[0],"success":function(r){preloaded_urls[url[0]]=r}})}
jQuery(this).click(function(){
if(!ajax_confirm){
ajax_confirm=true;
var d=new Date();
if((d.getTime()-ajax_confirm_date)<=2)
return false}
jQuery(blocfrag)
.animeajax()
.addClass('loading');
if(preloaded_urls[url[0]]){
on_pagination(preloaded_urls[url[0]]);
triggerAjaxLoad(document)}else{
jQuery.ajax({
url:url[0],
success:function(c){
on_pagination(c);
preloaded_urls[url[0]]=c}
})}
return false})}).addClass('noajax');jQuery('form.bouton_action_post.ajax:not(.noajax)',this).each(function(){
var leform=this;
var url=jQuery(this).attr('action').split('#');
jQuery(this)
.prepend("<input type='hidden' name='var_ajax' value='1' /><input type='hidden' name='var_ajax_env' value='"+(ajax_env)+"' />"+(url[1]?"<input type='hidden' name='var_ajax_ancre' value='"+url[1]+"' />":""))
.ajaxForm({
beforeSubmit:function(){
jQuery(blocfrag).addClass('loading').animeajax()},
success:function(c){
on_pagination(c);
preloaded_urls={};jQuery(blocfrag)
.ajaxbloc()},
iframe:jQuery.browser.msie
})
.addClass('noajax')})})};
jQuery(function(){
jQuery('form:not(.bouton_action_post)').parents('div.ajax')
.formulaire_dyn_ajax();
jQuery('div.ajaxbloc').ajaxbloc()});
onAjaxLoad(function(){
if(jQuery){
jQuery('form:not(.bouton_action_post)',this).parents('div.ajax')
.formulaire_dyn_ajax();
jQuery('div.ajaxbloc',this)
.ajaxbloc()}
});


/* ../prive/javascript/jquery.cookie.js */

jQuery.cookie=function(name,value,options){
if(typeof value!='undefined'){options=options||{};
if(value===null){
value='';
options.expires=-1}
var expires='';
if(options.expires&&(typeof options.expires=='number'||options.expires.toUTCString)){
var date;
if(typeof options.expires=='number'){
date=new Date();
date.setTime(date.getTime()+(options.expires*24*60*60*1000))}else{
date=options.expires}
expires='; expires='+date.toUTCString()}
var path=options.path?'; path='+(options.path):'';
var domain=options.domain?'; domain='+(options.domain):'';
var secure=options.secure?'; secure':'';
document.cookie=[name,'=',encodeURIComponent(value),expires,path,domain,secure].join('')}else{var cookieValue=null;
if(document.cookie&&document.cookie!=''){
var cookies=document.cookie.split(';');
for(var i=0;i<cookies.length;i++){
var cookie=jQuery.trim(cookies[i]);
if(cookie.substring(0,name.length+1)==(name+'=')){
cookieValue=decodeURIComponent(cookie.substring(name.length+1));
break}
}
}
return cookieValue}
};


/* ../prive/javascript/layer.js */
var memo_obj=new Array();
var url_chargee=new Array();
var xhr_actifs={};
function findObj_test_forcer(n,forcer){
var p,i,x;
if(memo_obj[n]&&!forcer){
return memo_obj[n]}
var d=document;
if((p=n.indexOf("?"))>0&&parent.frames.length){
d=parent.frames[n.substring(p+1)].document;
n=n.substring(0,p)}
if(!(x=d[n])&&d.all){
x=d.all[n]}
for(i=0;!x&&i<d.forms.length;i++){
if(d.forms[i][n]){
if(d.forms[i][n].id==n)
x=d.forms[i][n]}
}
for(i=0;!x&&d.layers&&i<d.layers.length;i++)x=findObj(n,d.layers[i].document);
if(!x&&document.getElementById)x=document.getElementById(n);
if(!forcer)memo_obj[n]=x;
return x}
function findObj(n){
return findObj_test_forcer(n,false)}
function findObj_forcer(n){
return findObj_test_forcer(n,true)}
function hide_obj(obj){
var element;
if(element=findObj(obj)){
jQuery(element).css("visibility","hidden")}
}
jQuery.fn.showother=function(cible){
var me=this;
if(me.is('.replie')){
me.addClass('deplie').removeClass('replie');
jQuery(cible)
.slideDown('fast',
function(){
jQuery(me)
.addClass('blocdeplie')
.removeClass('blocreplie')
.removeClass('togglewait')}
).trigger('deplie')}
return this}
jQuery.fn.hideother=function(cible){
var me=this;
if(!me.is('.replie')){
me.addClass('replie').removeClass('deplie');
jQuery(cible)
.slideUp('fast',
function(){
jQuery(me)
.addClass('blocreplie')
.removeClass('blocdeplie')
.removeClass('togglewait')}
).trigger('replie')}
return this}
jQuery.fn.toggleother=function(cible){
if(this.is('.deplie'))
return this.hideother(cible);
else
return this.showother(cible)}
jQuery.fn.depliant=function(cible){
if(!this.is('.depliant')){
var time=400;
var me=this;
this
.addClass('depliant');
if(!me.is('.deplie')){
me.addClass('hover')
.addClass('togglewait');
var t=setTimeout(function(){
me.toggleother(cible);
t=null},time)}
me
.hover(function(e){
me
.addClass('hover');
if(!me.is('.deplie')){
me.addClass('togglewait');
if(t){clearTimeout(t);t=null}
t=setTimeout(function(){
me.toggleother(cible);
t=null},time)}
}
,function(e){
if(t){clearTimeout(t);t=null}
me
.removeClass('hover')})
.end()}
return this}
jQuery.fn.depliant_clicancre=function(cible){
var me=this.parent();
if(me.is('.togglewait'))return false;
me.toggleother(cible);
return false}
function slide_horizontal(couche,slide,align,depart,etape){
var obj=findObj_forcer(couche);
if(!obj)return;
if(!etape){
if(align=='left')depart=obj.scrollLeft;
else depart=obj.firstChild.offsetWidth-obj.scrollLeft;
etape=0}
etape=Math.round(etape)+1;
pos=Math.round(depart)+Math.round(((slide-depart)/10)*etape);
if(align=='left')obj.scrollLeft=pos;
else obj.scrollLeft=obj.firstChild.offsetWidth-pos;
if(etape<10)setTimeout("slide_horizontal('"+couche+"', '"+slide+"', '"+align+"', '"+depart+"', '"+etape+"')",60)}
function changerhighlight(couche){
jQuery(couche)
.removeClass('off')
.siblings()
.not(couche)
.addClass('off')}
function aff_selection(arg,idom,url,event){
noeud=findObj_forcer(idom);
if(noeud){
noeud.style.display="none";
charger_node_url(url+arg,noeud,'','',event)}
return false}
function aff_selection_titre(titre,id,idom,nid)
{
t=findObj_forcer('titreparent');
t.value=titre;
t=findObj_forcer(nid);
t.value=id;
jQuery(t).trigger('change');t=findObj_forcer(idom);
t.style.display='none';
p=$(t).parents('form');
if(p.is('.submit_plongeur'))p.get(p.length-1).submit()}
function admin_tech_selection_titre(titre,id,idom,nid)
{
nom=titre.replace(/\W+/g,'_');
findObj_forcer("znom_sauvegarde").value=nom;
findObj_forcer("nom_sauvegarde").value=nom;
aff_selection_titre(titre,id,idom,nid)}
function aff_selection_provisoire(id,racine,url,col,sens,informer,event)
{
charger_id_url(url.href,
racine+'_col_'+(col+1),
function(){
slide_horizontal(racine+'_principal',((col-1)*150),sens);
aff_selection(id,racine+"_selection",informer)},
event);
return false}
function onkey_rechercher(valeur,rac,url,img,nid,init){
var Field=findObj_forcer(rac);
if(!valeur.length){
init=findObj_forcer(init);
if(init&&init.href){charger_node_url(init.href,Field)}
}else{
charger_node_url(url+valeur,
Field,
function(){
var n=Field.childNodes.length-1;
if((n==1)){
noeud=Field.childNodes[n].firstChild;
if(noeud.title)
aff_selection_titre(noeud.firstChild.nodeValue,noeud.title,rac,nid)}
},
img)}
return false}
var verifForm_clicked=false;
function verifForm(racine){
if(!jQuery.browser.msie)
jQuery('form',racine||document)
.keypress(function(e){
if(
((e.ctrlKey&&(
(((e.charCode||e.keyCode)==115)||((e.charCode||e.keyCode)==83))
||(e.charCode==19&&e.keyCode==19)
)
)
||(e.keyCode==19&&jQuery.browser.opera))
&&!verifForm_clicked
){
verifForm_clicked=true;
jQuery(this).find('input[type=submit]')
.click();
return false}
});
else
jQuery('form',racine||document)
.keydown(function(e){
if(!e.charCode&&e.keyCode==119&&!verifForm_clicked){
verifForm_clicked=true;
jQuery(this).find('input[type=submit]')
.click();
return false}
})}
function AjaxSqueeze(trig,id,callback,event)
{
var target=jQuery('#'+id);
if(!target.size()){return true}
return!AjaxSqueezeNode(trig,target,callback,event)}
function AjaxSqueezeNode(trig,target,f,event)
{
var i,callback;
if(!f){
callback=function(){verifForm(this)}
}
else{
callback=function(res,status){
f.apply(this,[res,status]);
verifForm(this)}
}
valid=false;
if(typeof(window['_OUTILS_DEVELOPPEURS'])!='undefined'){
if(!(navigator.userAgent.toLowerCase().indexOf("firefox/1.0")))
valid=(typeof event=='object')&&(event.altKey||event.metaKey)}
if(typeof(trig)=='string'){
if(valid){
window.open(trig+'&transformer_xml=valider_xml')}else{
jQuery(target).animeajax()}
res=jQuery.ajax({
"url":trig,
"complete":function(r,s){
AjaxRet(r,s,target,callback)}
});
return res}
if(valid){
var doc=window.open("","valider").document;
doc.open();
doc.close();
target=doc.body}
else{
jQuery(target).animeajax()}
jQuery(trig).ajaxSubmit({
"target":target,
"success":function(res,status){
if(status=='error')return this.html('Erreur HTTP');
callback.apply(this,[res,status])},
"beforeSubmit":function(vars){
if(valid)
vars.push({"name":"transformer_xml","value":"valider_xml"});
return true}
});
return true}
function AjaxNamedSubmit(input){
jQuery('<input type="hidden" />')
.attr('name',input.name)
.attr('value',input.value)
.insertAfter(input);
return true}
function AjaxRet(res,status,target,callback){
if(res.aborted)return;
if(status=='error')return jQuery(target).html('HTTP Error');
jQuery(target)
.html(res.responseText)
.each(callback,[res.responseText,status])}
function charger_id_url(myUrl,myField,jjscript,event)
{
var Field=findObj_forcer(myField);
if(!Field)return true;
if(!myUrl){
jQuery(Field).empty();
retour_id_url(Field,jjscript);
return true}else return charger_node_url(myUrl,Field,jjscript,findObj_forcer('img_'+myField),event)}
function charger_node_url(myUrl,Field,jjscript,img,event)
{
if(url_chargee[myUrl]){
var el=jQuery(Field).html(url_chargee[myUrl])[0];
retour_id_url(el,jjscript);
triggerAjaxLoad(el);
return false}else{
if(img)img.style.visibility="visible";
if(xhr_actifs[Field]){xhr_actifs[Field].aborted=true;xhr_actifs[Field].abort()}
xhr_actifs[Field]=AjaxSqueezeNode(myUrl,
Field,
function(r){
xhr_actifs[Field]=undefined;
if(img)img.style.visibility="hidden";
url_chargee[myUrl]=r;
retour_id_url(Field,jjscript);
slide_horizontal($(Field).children().attr("id")+'_principal',$(Field).width(),$(Field).css("text-align"))},
event);
return false}
}
function retour_id_url(Field,jjscript)
{
jQuery(Field).css({'visibility':'visible','display':'block'});
if(jjscript)jjscript()}
function charger_node_url_si_vide(url,noeud,gifanime,jjscript,event){
if(noeud.style.display!='none'){
noeud.style.display='none'}
else{
if(noeud.innerHTML!=""){
noeud.style.visibility="visible";
noeud.style.display="block"}else{
charger_node_url(url,noeud,'',gifanime,event)}
}
return false}
function charger_id_url_si_vide(myUrl,myField,jjscript,event){
var Field=findObj_forcer(myField);if(!Field)return;
if(Field.innerHTML==""){
charger_id_url(myUrl,myField,jjscript,event)
}
else{
Field.style.visibility="visible";
Field.style.display="block"}
}


/* ../prive/javascript/presentation.js */

$.fn.hoverClass=function(c){
return this.each(function(){
$(this).hover(
function(){$(this).addClass(c)},
function(){$(this).removeClass(c)}
)})};
var bandeau_elements=false;
var dir_page=$("html").attr("dir");
function getBiDiOffset(el){
var offset=el.offsetLeft;
if(dir_page=="rtl")
offset=(window.innerWidth||el.offsetParent.clientWidth)-(offset+el.offsetWidth);
return offset}
function decaleSousMenu(){
var sousMenu=$("div.bandeau_sec",this).css({visibility:'hidden',display:'block'});
if(!sousMenu.length)return;
var left;
if($.browser.msie){
if(sousMenu.bgIframe)sousMenu.bgIframe();
left=getBiDiOffset(sousMenu[0].parentNode)+getBiDiOffset($("#bandeau-principal div")[0])}else left=getBiDiOffset(sousMenu[0]);
if(left>0){
var demilargeur=Math.floor(sousMenu[0].offsetWidth/2);
var gauche=left-demilargeur
+Math.floor(largeur_icone/2);
if(gauche<0)gauche=0;
sousMenu.css(dir_page=="rtl"?"right":"left",gauche+"px")}
sousMenu.css({display:'',visibility:''})}
function changestyle(id_couche,element,style){
if(!bandeau_elements){
bandeau_elements=$('#haut-page div.bandeau')}
var select=$(bandeau_elements).not('#'+id_couche);
if(id_couche=='garder-recherche')select.not('#bandeaurecherche');
select.css({'visibility':'hidden','display':'none'});
if(element)
$('#'+id_couche).css({element:style});
else
$('#'+id_couche).css({'visibility':'visible','display':'block'})}
var accepter_change_statut=false;
function selec_statut(id,type,decal,puce,script){
node=findObj('imgstatut'+type+id);
if(!accepter_change_statut)
accepter_change_statut=confirm(confirm_changer_statut);
if(!accepter_change_statut||!node)return;
$('#statutdecal'+type+id)
.css('marginLeft',decal+'px')
.removeClass('on');
$.get(script,function(c){
if(!c)
node.src=puce;
else{
r=window.open();
r.document.write(c);
r.document.close()}
})}
function prepare_selec_statut(nom,type,id,action)
{
$('#'+nom+type+id)
.hoverClass('on')
.addClass('on')
.load(action+'&type='+type+'&id='+id)}
function changeclass(objet,myClass){
objet.className=myClass}
function hauteurFrame(nbCol){
hauteur=$(window).height()-40;
hauteur=hauteur-$('#haut-page').height();
if(findObj('brouteur_hierarchie'))
hauteur=hauteur-$('#brouteur_hierarchie').height();
for(i=0;i<nbCol;i++){
$('#iframe'+i)
.height(hauteur+'px')}
}
function changeVisible(input,id,select,nonselect){
if(input){
element=findObj_forcer(id);
if(element.style.display!=select)element.style.display=select}else{
element=findObj_forcer(id);
if(element.style.display!=nonselect)element.style.display=nonselect}
}
var antifocus=false;
var antifocus_mots=new Array();
function puce_statut(selection){
if(selection=="publie"){
return"puce-verte.gif"}
if(selection=="prepa"){
return"puce-blanche.gif"}
if(selection=="prop"){
return"puce-orange.gif"}
if(selection=="refuse"){
return"puce-rouge.gif"}
if(selection=="poubelle"){
return"puce-poubelle.gif"}
}


/* ../prive/javascript/gadgets.js */
function init_gadgets(url_toutsite,url_navrapide,url_agenda,html_messagerie){
jQuery('#boutonbandeautoutsite')
.one('mouseover',function(event){
if((typeof(window['_OUTILS_DEVELOPPEURS'])=='undefined')||((event.altKey||event.metaKey)!=true)){
changestyle('bandeautoutsite');
jQuery('#gadget-rubriques')
.load(url_toutsite)}else{window.open(url_toutsite+'&transformer_xml=valider_xml')}
})
.one('focus',function(){jQuery(this).mouseover()});
jQuery('#boutonbandeaunavrapide')
.one('mouseover',function(event){
if((typeof(window['_OUTILS_DEVELOPPEURS'])=='undefined')||((event.altKey||event.metaKey)!=true)){
changestyle('bandeaunavrapide');
jQuery('#gadget-navigation')
.load(url_navrapide)}else{window.open(url_navrapide+'&transformer_xml=valider_xml')}
})
.one('focus',function(){jQuery(this).mouseover()});
jQuery('#boutonbandeauagenda')
.one('mouseover',function(event){
if((typeof(window['_OUTILS_DEVELOPPEURS'])=='undefined')||((event.altKey||event.metaKey)!=true)){
changestyle('bandeauagenda');
jQuery('#gadget-agenda')
.load(url_agenda)}else{window.open(url_agenda+'&transformer_xml=valider_xml')}
})
.one('focus',function(){jQuery(this).mouseover()});
jQuery('#gadget-messagerie')
.html(html_messagerie);
jQuery('#form_recherche')
.one('click',function(){this.value=''})}


/* ../extensions/porte_plume/javascript/xregexp-min.js */
var XRegExp;if(!XRegExp){(function(){XRegExp=function(r,l){if(XRegExp.isRegExp(r)){if(l!==undefined){throw TypeError("can't supply flags when constructing one RegExp from another")}return r.addFlags("")}if(h){throw Error("can't call the XRegExp constructor within token definition functions")}var l=l||"",k=[],s=0,p=XRegExp.OUTSIDE_CLASS,m={hasNamedCapture:false,captureNames:[],hasFlag:function(u){if(u.length>1){throw SyntaxError("flag can't be more than one character")}return l.indexOf(u)>-1}},n,q,o,t;while(s<r.length){n=j(r,s,p,m);if(n){k.push(n.output);s+=Math.max(n.matchLength,1)}else{o=r.charAt(s);if(q=i.exec.call(f[p],r.slice(s))){k.push(q[0]);s+=q[0].length}else{if(o==="["){p=XRegExp.INSIDE_CLASS}else{if(o==="]"){p=XRegExp.OUTSIDE_CLASS}}k.push(o);s++}}}t=RegExp(k.join(""),i.replace.call(l,e,""));t._xregexp={source:r,captureNames:m.hasNamedCapture?m.captureNames:null};return t};var b=/\$(?:(\d\d?|[$&`'])|{([$\w]+)})/g,e=/[^gimy]+|(.)(?=[\s\S]*\1)/g,a=/()??/.exec("")[1]===undefined,c=function(){var k=/^/g;k.test("");return!k.lastIndex}(),d=function(){var k=/x/g;"x".replace(k,"");return!k.lastIndex}(),i={exec:RegExp.prototype.exec,match:String.prototype.match,replace:String.prototype.replace,split:String.prototype.split,test:RegExp.prototype.test},j=function(s,n,r,q){var p=g.length,l,o,k;h=true;while(p--){o=g[p];if((r&o.scope)&&(!o.trigger||o.trigger.call(q))){o.pattern.lastIndex=n;k=o.pattern.exec(s);if(k&&k.index===n){l={output:o.handler.call(q,k,r),matchLength:k[0].length};break}}}h=false;return l},h=false,f={},g=[];XRegExp.INSIDE_CLASS=1;XRegExp.OUTSIDE_CLASS=2;f[XRegExp.INSIDE_CLASS]=/^(?:\\(?:[0-3][0-7]{0,2}|[4-7][0-7]?|x[\dA-Fa-f]{2}|u[\dA-Fa-f]{4}|c[A-Za-z]|[\s\S]))/;f[XRegExp.OUTSIDE_CLASS]=/^(?:\\(?:0(?:[0-3][0-7]{0,2}|[4-7][0-7]?)?|[1-9]\d*|x[\dA-Fa-f]{2}|u[\dA-Fa-f]{4}|c[A-Za-z]|[\s\S])|\(\?[:=!]|[?*+]\?|{\d+(?:,\d*)?}\??)/;XRegExp.addToken=function(n,m,l,k){g.push({pattern:XRegExp(n).addFlags("g"),handler:m,scope:l||XRegExp.OUTSIDE_CLASS,trigger:k||null})};RegExp.prototype.exec=function(o){var m=i.exec.apply(this,arguments),l,k;if(m){if(!a&&m.length>1&&XRegExp._indexOf(m,"")>-1){k=RegExp("^"+this.source+"$(?!\\s)",XRegExp._getNativeFlags(this));i.replace.call(m[0],k,function(){for(var p=1;p<arguments.length-2;p++){if(arguments[p]===undefined){m[p]=undefined}}})}if(this._xregexp&&this._xregexp.captureNames){for(var n=1;n<m.length;n++){l=this._xregexp.captureNames[n-1];if(l){m[l]=m[n]}}}if(!c&&this.global&&this.lastIndex>(m.index+m[0].length)){this.lastIndex--}}return m};if(!c){RegExp.prototype.test=function(l){var k=i.exec.call(this,l);if(k&&this.global&&this.lastIndex>(k.index+k[0].length)){this.lastIndex--}return!!k}}String.prototype.match=function(l){if(!XRegExp.isRegExp(l)){l=RegExp(l)}if(l.global){var k=i.match.apply(this,arguments);l.lastIndex=0;return k}return l.exec(this)};String.prototype.replace=function(m,n){var o=XRegExp.isRegExp(m),l,k,p;if(o&&typeof n.valueOf()==="string"&&n.indexOf("${")===-1&&d){return i.replace.apply(this,arguments)}if(!o){m=m+""}else{if(m._xregexp){l=m._xregexp.captureNames}}if(typeof n==="function"){k=i.replace.call(this,m,function(){if(l){arguments[0]=new String(arguments[0]);for(var q=0;q<l.length;q++){if(l[q]){arguments[0][l[q]]=arguments[q+1]}}}if(o&&m.global){m.lastIndex=arguments[arguments.length-2]+arguments[0].length}return n.apply(null,arguments)})}else{p=this+"";k=i.replace.call(p,m,function(){var q=arguments;return i.replace.call(n,b,function(s,r,v){if(r){switch(r){case"$":return"$";case"&":return q[0];case"`":return q[q.length-1].slice(0,q[q.length-2]);case"'":return q[q.length-1].slice(q[q.length-2]+q[0].length);default:var t="";r=+r;if(!r){return s}while(r>q.length-3){t=String.prototype.slice.call(r,-1)+t;r=Math.floor(r/10)}return(r?q[r]||"":"$")+t}}else{var u=+v;if(u<=q.length-3){return q[u]}u=l?XRegExp._indexOf(l,v):-1;return u>-1?q[u+1]:s}})})}if(o&&m.global){m.lastIndex=0}return k};String.prototype.split=function(o,k){if(!XRegExp.isRegExp(o)){return i.split.apply(this,arguments)}var q=this+"",m=[],p=0,n,l;if(k===undefined||+k<0){k=Infinity}else{k=Math.floor(+k);if(!k){return[]}}o=o.addFlags("g");while(n=o.exec(q)){if(o.lastIndex>p){m.push(q.slice(p,n.index));if(n.length>1&&n.index<q.length){Array.prototype.push.apply(m,n.slice(1))}l=n[0].length;p=o.lastIndex;if(m.length>=k){break}}if(!n[0].length){o.lastIndex++}}if(p===q.length){if(!i.test.call(o,"")||l){m.push("")}}else{m.push(q.slice(p))}return m.length>k?m.slice(0,k):m}})();RegExp.prototype.addFlags=function(b){var c=XRegExp(this.source,(b||"")+XRegExp._getNativeFlags(this)),a=this._xregexp;if(a){c._xregexp={source:a.source,captureNames:a.captureNames?a.captureNames.slice(0):null}}return c};RegExp.prototype.apply=function(b,a){return this.exec(a[0])};RegExp.prototype.call=function(a,b){return this.exec(b)};RegExp.prototype.forEachExec=function(e,f,c){var d=this.addFlags("g"),b=-1,a;while(a=d.exec(e)){f.call(c,a,++b,e,d);if(!a[0].length){d.lastIndex++}}if(this.global){this.lastIndex=0}};RegExp.prototype.validate=function(b){var a=RegExp("^(?:"+this.source+")$(?!\\s)",XRegExp._getNativeFlags(this));if(this.global){this.lastIndex=0}return b.search(a)===0};XRegExp.cache=function(c,a){var b="/"+c+"/"+(a||"");return XRegExp.cache[b]||(XRegExp.cache[b]=XRegExp(c,a))};XRegExp.escape=function(a){return a.replace(/[-[\]{}()*+?.\\^$|,#\s]/g,"\\$&")};XRegExp.freezeTokens=function(){XRegExp.addToken=null};XRegExp.isRegExp=function(a){return Object.prototype.toString.call(a)==="[object RegExp]"};XRegExp.matchWithinChain=function(e,a,b){var c;function d(g,l){var j=a[l].addFlags("g"),f=[],k,h;for(h=0;h<g.length;h++){if(b){k=[];j.forEachExec(g[h][0],function(i){i.index+=g[h].index;k.push(i)})}else{k=g[h].match(j)}if(k){f.push(k)}}f=Array.prototype.concat.apply([],f);if(a[l].global){a[l].lastIndex=0}return l===a.length-1?f:d(f,l+1)}if(b){c={"0":e,index:0}}return d([b?c:e],0)};XRegExp._getNativeFlags=function(a){return(a.global?"g":"")+(a.ignoreCase?"i":"")+(a.multiline?"m":"")+(a.extended?"x":"")+(a.sticky?"y":"")};XRegExp._indexOf=function(d,b,c){for(var a=c||0;a<d.length;a++){if(d[a]===b){return a}}return-1};(function(){var a=/^(?:[?*+]|{\d+(?:,\d*)?})\??/;XRegExp.addToken(/\(\?#[^)]*\)/,function(b){return a.test(b.input.slice(b.index+b[0].length))?"":"(?:)"});XRegExp.addToken(/\((?!\?)/,function(){this.captureNames.push(null);return"("});XRegExp.addToken(/\(\?<([$\w]+)>/,function(b){this.captureNames.push(b[1]);this.hasNamedCapture=true;return"("});XRegExp.addToken(/\\k<([\w$]+)>/,function(c){var b=XRegExp._indexOf(this.captureNames,c[1]);return b>-1?"\\"+(b+1)+(isNaN(c.input.charAt(c.index+c[0].length))?"":"(?:)"):c[0]});XRegExp.addToken(/\[\^?]/,function(b){return b[0]==="[]"?"\\b\\B":"[\\s\\S]"});XRegExp.addToken(/(?:\s+|#.*)+/,function(b){return a.test(b.input.slice(b.index+b[0].length))?"":"(?:)"},XRegExp.OUTSIDE_CLASS,function(){return this.hasFlag("x")});XRegExp.addToken(/\./,function(){return"[\\s\\S]"},XRegExp.OUTSIDE_CLASS,function(){return this.hasFlag("s")})})();XRegExp.version="1.2.0"};


/* ../extensions/porte_plume/javascript/jquery.markitup_pour_spip.js */

;(function($){
$.fn.markItUp=function(settings,extraSettings){
var options,ctrlKey,shiftKey,altKey;
ctrlKey=shiftKey=altKey=false;
options={id:'',
nameSpace:'',
root:'',
lang:'',
previewInWindow:'',previewAutoRefresh:true,
previewPosition:'after',
previewTemplatePath:'~/templates/preview.html',
previewParserPath:'',
previewParserVar:'data',
resizeHandle:true,
beforeInsert:'',
afterInsert:'',
onEnter:{},
onShiftEnter:{},
onCtrlEnter:{},
onTab:{},
markupSet:[{}]
};
$.extend(options,settings,extraSettings);
if(!options.root){
$('script').each(function(a,tag){
miuScript=$(tag).get(0).src.match(/(.*)jquery\.markitup(\.pack)?\.js$/);
if(miuScript!==null){
options.root=miuScript[1]}
})}
return this.each(function(){
var $$,textarea,levels,scrollPosition,caretPosition,caretEffectivePosition,
clicked,hash,header,footer,previewWindow,template,iFrame,abort,
before,after;
$$=$(this);
textarea=this;
levels=[];
abort=false;
scrollPosition=caretPosition=0;
options.previewParserPath=localize(options.previewParserPath);
options.previewTemplatePath=localize(options.previewTemplatePath);
function localize(data,inText){
if(inText){
return data.replace(/("|')~\//g,"$1"+options.root)}
return data.replace(/^~\//,options.root)}
function init(){
id='';nameSpace='';
if(options.id){
id='id="'+options.id+'"'}else if($$.attr("id")){
id='id="markItUp'+($$.attr("id").substr(0,1).toUpperCase())+($$.attr("id").substr(1))+'"'}
if(options.nameSpace){
nameSpace='class="'+options.nameSpace+'"'}
$$.wrap('<div '+nameSpace+'></div>');
$$.wrap('<div '+id+' class="markItUp"></div>');
$$.wrap('<div class="markItUpContainer"></div>');
$$.addClass("markItUpEditor");
header=$('<div class="markItUpHeader"></div>').insertBefore($$);
$(dropMenus(options.markupSet)).appendTo(header);
$(header).find("li.markItUpDropMenu ul:empty").parent().remove();
footer=$('<div class="markItUpFooter"></div>').insertAfter($$);
if(options.resizeHandle===true&&$.browser.safari!==true){
resizeHandle=$('<div class="markItUpResizeHandle"></div>')
.insertAfter($$)
.bind("mousedown",function(e){
var h=$$.height(),y=e.clientY,mouseMove,mouseUp;
mouseMove=function(e){
$$.css("height",Math.max(20,e.clientY+h-y)+"px");
return false};
mouseUp=function(e){
$("html").unbind("mousemove",mouseMove).unbind("mouseup",mouseUp);
return false};
$("html").bind("mousemove",mouseMove).bind("mouseup",mouseUp)});
footer.append(resizeHandle)}
$$.keydown(keyPressed).keyup(keyPressed);
$$.bind("insertion",function(e,settings){
if(settings.target!==false){
get()}
if(textarea===$.markItUp.focused){
markup(settings)}
});
$$.focus(function(){
$.markItUp.focused=this})}
function dropMenus(markupSet){
var ul=$('<ul></ul>'),i=0;
var lang=($$.attr('lang')||options.lang);
$('li:hover > ul',ul).css('display','block');
$.each(markupSet,function(){
var button=this,t='',title,li,j;
if((!lang||!button.lang||($.inArray(lang,button.lang)!=-1))
&&(!button.lang_not||($.inArray(lang,button.lang_not)==-1))){
title=(button.key)?(button.name||'')+' [Ctrl+'+button.key+']':(button.name||'');
key=(button.key)?'accesskey="'+button.key+'"':'';
if(button.separator){
li=$('<li class="markItUpSeparator">'+(button.separator||'')+'</li>').appendTo(ul)}else{
i++;
for(j=levels.length-1;j>=0;j--){
t+=levels[j]+"-"}
li=$('<li class="markItUpButton markItUpButton'+t+(i)+' '+(button.className||'')+'"><a href="" '+key+' title="'+title+'"><b>'+(button.name||'')+'</b></a></li>')
.bind("contextmenu",function(){return false}).click(function(){
return false}).focusin(function(){
$$.focus()}).mousedown(function(){
if(button.call){
eval(button.call)()}
setTimeout(function(){markup(button)},1);
return false}).hover(function(){
$('> ul',this).show();
$(document).one('click',function(){$('ul ul',header).hide()}
)},function(){
$('> ul',this).hide()}
).appendTo(ul);
if(button.dropMenu){
levels.push(i);
$(li).addClass('markItUpDropMenu').append(dropMenus(button.dropMenu))}
}
}
});
levels.pop();
return ul}
function magicMarkups(string){
if(string){
string=string.toString();
string=string.replace(/\(\!\(([\s\S]*?)\)\!\)/g,
function(x,a){
var b=a.split('|!|');
if(altKey===true){
return(b[1]!==undefined)?b[1]:b[0]}else{
return(b[1]===undefined)?"":b[0]}
}
);
string=string.replace(/\[\!\[([\s\S]*?)\]\!\]/g,
function(x,a){
var b=a.split(':!:');
if(abort===true){
return false}
value=prompt(b[0],(b[1])?b[1]:'');
if(value===null){
abort=true}
return value}
);
return string}
return""}
function prepare(action){
if($.isFunction(action)){
action=action(hash)}
return magicMarkups(action)}
function build(string){
openWith=prepare(clicked.openWith);
placeHolder=prepare(clicked.placeHolder);
replaceWith=prepare(clicked.replaceWith);
closeWith=prepare(clicked.closeWith);
if(replaceWith!==""){
block=openWith+replaceWith+closeWith}else if(selection===''&&placeHolder!==''){
block=openWith+placeHolder+closeWith}else{
block=openWith+(string||selection)+closeWith}
return{block:block,
openWith:openWith,
replaceWith:replaceWith,
placeHolder:placeHolder,
closeWith:closeWith
}}
function selectWord(){
selectionBeforeAfter(/\s|[.,;:!¡?¿()]/);
selectionSave()}
function selectLine(){
selectionBeforeAfter(/\r?\n/);
selectionSave()}
function selectionRemoveLast(pattern){
if(!pattern)pattern=/\s/;
last=selection[selection.length-1];
if(last&&last.match(pattern)){
set(caretPosition,selection.length-1);
get();
$.extend(hash,{caretPosition:caretPosition,scrollPosition:scrollPosition})}
}
function selectionBeforeAfter(pattern){
if(!pattern)pattern=/\s/;
before=textarea.value.substring(0,caretEffectivePosition);
after=textarea.value.substring(caretEffectivePosition+selection.length-fixIeBug(selection));
before=before.split(pattern);
after=after.split(pattern)}
function selectionSave(){
nb_before=before?before[before.length-1].length:0;
nb_after=after?after[0].length:0;
nb=nb_before+selection.length+nb_after-fixIeBug(selection);
caretPosition=caretPosition-nb_before;
set(caretPosition,nb);
get();
$.extend(hash,{selection:selection,caretPosition:caretPosition,scrollPosition:scrollPosition})}
function markup(button){
var len,j,n,i;
hash=clicked=button;
get();
$.extend(hash,{line:"",
root:options.root,
textarea:textarea,
selection:(selection||''),
caretPosition:caretPosition,
ctrlKey:ctrlKey,
shiftKey:shiftKey,
altKey:altKey
}
);
if(button.selectionType){
if(button.selectionType=="word"){
if(!selection){
selectWord()}else{
selectionRemoveLast(/\s/)}
}
if(button.selectionType=="line"){
selectLine()}
if(button.selectionType=="return"){
selectionBeforeAfter(/\r?\n/);
before_last=before[before.length-1];
after='';
if(r=before_last.match(/^-([*#]+) ?(.*)$/)){
if(r[2]){
button.replaceWith="\n-"+r[1]+' ';
before_last=''}else{
button.replaceWith="\n"}
}else{
before_last='';
button.replaceWith="\n"}
before[before.length-1]=before_last;
selectionSave()}
}
prepare(options.beforeInsert);
prepare(clicked.beforeInsert);
if(ctrlKey===true&&shiftKey===true){
prepare(clicked.beforeMultiInsert)}
$.extend(hash,{line:1});
if((button.forceMultiline===true&&selection.length)
||(ctrlKey===true&&shiftKey===true)){
lines=selection.split(/\r?\n/);
for(j=0,n=lines.length,i=0;i<n;i++){
if($.trim(lines[i])!==''){
$.extend(hash,{line:++j,selection:lines[i]});
lines[i]=build(lines[i]).block}else{
lines[i]=""}
}
string={block:lines.join('\n')};
start=caretPosition;
len=string.block.length+(($.browser.opera)?n-1:0)}else if(ctrlKey===true){
string=build(selection);
start=caretPosition+string.openWith.length;
len=string.block.length-string.openWith.length-string.closeWith.length;
len-=fixIeBug(string.block)}else if(shiftKey===true){
string=build(selection);
start=caretPosition;
len=string.block.length;
len-=fixIeBug(string.block)}else{
string=build(selection);
start=caretPosition+string.block.length;
len=0;
start-=fixIeBug(string.block)}
if(selection===''){
start+=fixOperaBug(string.replaceWith)}
$.extend(hash,{caretPosition:caretPosition,scrollPosition:scrollPosition});
if(string.block!==selection&&abort===false){
insert(string.block);
set(start,len)}
get();
$.extend(hash,{line:'',selection:selection});
if((button.forceMultiline===true)
||(ctrlKey===true&&shiftKey===true)){
prepare(clicked.afterMultiInsert)}
prepare(clicked.afterInsert);
prepare(options.afterInsert);
if(previewWindow&&options.previewAutoRefresh){
refreshPreview()}
shiftKey=altKey=ctrlKey=abort=false}
function fixOperaBug(string){
if($.browser.opera){
return string.length-string.replace(/\n*/g,'').length}
return 0}
function fixIeBug(string){
if($.browser.msie){
return string.length-string.replace(/\r*/g,'').length}
return 0}
function insert(block){
if(document.selection){
var newSelection=document.selection.createRange();
newSelection.text=block}else{
textarea.value=textarea.value.substring(0,caretEffectivePosition)+block+textarea.value.substring(caretEffectivePosition+selection.length,textarea.value.length)}
}
function set(start,len){
if(textarea.createTextRange){
range=textarea.createTextRange();
range.collapse(true);
range.moveStart('character',start);
range.moveEnd('character',len);
range.select()}else if(textarea.setSelectionRange){
textarea.setSelectionRange(start,start+len)}
textarea.scrollTop=scrollPosition;
textarea.focus()}
function get(){
textarea.focus();
scrollPosition=textarea.scrollTop;
if(document.selection){
selection=document.selection.createRange().text;
if($.browser.msie){var range=document.selection.createRange(),rangeCopy=range.duplicate();
rangeCopy.moveToElementText(textarea);
caretPosition=-1;
while(rangeCopy.inRange(range)){
rangeCopy.moveStart('character');
caretPosition++}
caretEffectivePosition=caretPosition}else{caretPosition=textarea.selectionStart;
lenSelection=selection.length;
set(0,caretPosition);
opBefore=document.selection.createRange().text;
caretEffectivePosition=opBefore.length-fixOperaBug(opBefore);
set(caretPosition,lenSelection);
selection=document.selection.createRange().text}
}else{caretPosition=textarea.selectionStart;
caretEffectivePosition=caretPosition;
selection=textarea.value.substring(caretPosition,textarea.selectionEnd)}
return selection}
function preview(){
if(!previewWindow||previewWindow.closed){
if(options.previewInWindow){
previewWindow=window.open('','preview',options.previewInWindow);
$(window).unload(function(){
previewWindow.close()})}else{
iFrame=$('<iframe class="markItUpPreviewFrame"></iframe>');
if(options.previewPosition=='after'){
iFrame.insertAfter(footer)}else{
iFrame.insertBefore(header)}
previewWindow=iFrame[iFrame.length-1].contentWindow||frame[iFrame.length-1]}
}else if(altKey===true){
if(iFrame){
iFrame.remove()}else{
previewWindow.close()}
previewWindow=iFrame=false}
if(!options.previewAutoRefresh){
refreshPreview()}
if(options.previewInWindow){
previewWindow.focus()}
}
function refreshPreview(){
renderPreview()}
function renderPreview(){
var phtml;
if(options.previewParserPath!==''){
$.ajax({
type:'POST',
url:options.previewParserPath,
data:options.previewParserVar+'='+encodeURIComponent($$.val()),
success:function(data){
writeInPreview(localize(data,1))}
})}else{
if(!template){
$.ajax({
url:options.previewTemplatePath,
success:function(data){
writeInPreview(localize(data,1).replace(/<!-- content -->/g,$$.val()))}
})}
}
return false}
function writeInPreview(data){
if(previewWindow.document){
try{
sp=previewWindow.document.documentElement.scrollTop
}catch(e){
sp=0}
previewWindow.document.open();
previewWindow.document.write(data);
previewWindow.document.close();
previewWindow.document.documentElement.scrollTop=sp}
}
function keyPressed(e){
if(e.type==='keydown'){
if(e.which===18){e.altKey=true}if(e.which===17){e.ctrlKey=true}if(e.which===16){e.shiftKey=true}}
shiftKey=e.shiftKey;
altKey=e.altKey;
ctrlKey=(!(e.altKey&&e.ctrlKey))?e.ctrlKey:false;
if(e.type==='keydown'){
if(ctrlKey===true){
li=$("a[accesskey="+String.fromCharCode(e.which)+"]",header).parent('li');
if(li.length!==0){
ctrlKey=false;
setTimeout(function(){
li.triggerHandler('mousedown')},1);
return false}
}
if(!$.browser.opera){
if(e.which===13||e.which===10){if(ctrlKey===true){ctrlKey=false;
markup(options.onCtrlEnter);
return options.onCtrlEnter.keepDefault}else if(shiftKey===true){shiftKey=false;
markup(options.onShiftEnter);
return options.onShiftEnter.keepDefault}else{markup(options.onEnter);
return options.onEnter.keepDefault}
}
if(e.which===9){if(shiftKey==true||ctrlKey==true||altKey==true){
return false}
markup(options.onTab);
return options.onTab.keepDefault}
}
}
}
init()})};
$.fn.markItUpRemove=function(){
return this.each(function(){
var $$=$(this).unbind().removeClass('markItUpEditor');
$$.parent('div').parent('div.markItUp').parent('div').replaceWith($$)}
)};
$.markItUp=function(settings){
var options={target:false};
$.extend(options,settings);
if(options.target){
return $(options.target).each(function(){
$(this).focus();
$(this).trigger('insertion',[options])})}else{
$('textarea').trigger('insertion',[options])}
}})(jQuery);


/* ../extensions/porte_plume/javascript/jquery.previsu_spip.js */
;(function($){
$.fn.previsu_spip=function(settings){
var options;
options={
previewParserPath:'',
previewParserVar:'data',
textEditer:'Editer',
textVoir:'Voir'
};
$.extend(options,settings);
return this.each(function(){
var $$,textarea,tabs,preview;
$$=$(this);
textarea=this;
function init(){
$$.addClass("pp_previsualisation");
tabs=$('<div class="markItUpTabs"></div>').prependTo($$.parent());
$(tabs).append(
'<a href="#previsuVoir" class="previsuVoir">'+options.textVoir+'</a>'+
'<a href="#previsuEditer" class="previsuEditer on">'+options.textEditer+'</a>'
);
preview=$('<div class="markItUpPreview"></div>').insertAfter(tabs);
preview.hide();
$('.previsuVoir').click(function(){
mark=$(this).parent().parent();
objet=mark.parents('.formulaire_spip')[0].className.match(/formulaire_editer_(\w+)/);
champ=mark.parents('li')[0].className.match(/editer_(\w+)/);
$(mark).find('.markItUpPreview').height(
$(mark).find('.markItUpHeader').height()
+$(mark).find('.markItUpEditor').height()
+$(mark).find('.markItUpFooter').height()
);
$(mark).find('.markItUpHeader').hide();
$(mark).find('.markItUpEditor').hide();
$(mark).find('.markItUpFooter').hide();
$(this).addClass('on').next().removeClass('on');
$(mark).find('.markItUpPreview').show()
.addClass('ajaxLoad')
.html(renderPreview(
$(mark).find('textarea.pp_previsualisation').val(),
champ[1].toUpperCase(),
objet[1])
)
.removeClass('ajaxLoad');
return false});
$('.previsuEditer').click(function(){
mark=$(this).parent().parent();
$(mark).find('.markItUpPreview').hide();
$(mark).find('.markItUpHeader').show();
$(mark).find('.markItUpEditor').show();
$(mark).find('.markItUpFooter').show();
$(this).addClass('on').prev().removeClass('on');
return false})}
function renderPreview(val,champ,objet){
var phtml;
if(options.previewParserPath!==''){
$.ajax({
type:'POST',
async:false,
url:options.previewParserPath,
data:'champ='+champ
+'&objet='+objet
+'&'+options.previewParserVar+'='+encodeURIComponent(val),
success:function(data){
phtml=data}
})}
return phtml}
init()})}})(jQuery);


/* page=porte_plume_start.js(lang=fr) */
barre_outils_edition={"nameSpace":"edition","previewAutoRefresh":false,"onEnter":{"keepDefault":false,"selectionType":"return","replaceWith":"\n"}
,"onShiftEnter":{"keepDefault":false,"replaceWith":"\n_ "}
,"onCtrlEnter":{"keepDefault":false,"replaceWith":"\n\n"}
,"onTab":{"keepDefault":false,"replaceWith":"	"}
,"markupSet":[{"name":"Transformer en {{{intertitre}}}","key":"H","className":"outil_header1","openWith":"\n{{{","closeWith":"}}}\n","selectionType":"line"}
,{"name":"Mettre en {{gras}}","key":"B","className":"outil_bold","replaceWith":function(h){return espace_si_accolade(h,'{{','}}')},"selectionType":"word"}
,{"name":"Mettre en {italique}","key":"I","className":"outil_italic","replaceWith":function(h){return espace_si_accolade(h,'{','}')},"selectionType":"word"}
,{"name":"Mettre en liste","className":"outil_liste_ul","replaceWith":function(h){return outil_liste(h,'*')},"selectionType":"line","forceMultiline":true,"dropMenu":[{"id":"liste_ol","name":"Mettre en liste numérotée","className":"outil_liste_ol","replaceWith":function(h){return outil_liste(h,'#')},"display":true,"selectionType":"line","forceMultiline":true}
,{"id":"desindenter","name":"Désindenter une liste","className":"outil_desindenter","replaceWith":function(h){return outil_desindenter(h)},"display":true,"selectionType":"line","forceMultiline":true}
,{"id":"indenter","name":"Indenter une liste","className":"outil_indenter","replaceWith":function(h){return outil_indenter(h)},"display":true,"selectionType":"line","forceMultiline":true}
]
}
,{"separator":"---------------"}
,{"name":"Transformer en [lien hypertexte->http://...]","key":"L","className":"outil_link","openWith":"[","closeWith":"->[![Veuillez indiquer l'adresse de votre lien (vous pouvez indiquer une adresse Internet sous la forme http://www.monsite.com, une adresse courriel, ou simplement indiquer le numéro d'un article de ce site.]!]]"}
,{"name":"Transformer en [[Note de bas de page]]","className":"outil_notes","openWith":"[[","closeWith":"]]","selectionType":"word"}
,{"separator":"---------------"}
,{"name":"<quote>Citer un message</quote>","key":"Q","className":"outil_quote","openWith":"\n<quote>","closeWith":"</quote>\n","selectionType":"word"}
,{"name":"Entourer de « guillemets »","className":"outil_guillemets","openWith":"«","closeWith":"»","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"Entourer de “guillemets de second niveau”","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"Entourer de « guillemets »","className":"outil_guillemets_de","openWith":"„","closeWith":"“","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"Entourer de “guillemets de second niveau”","className":"outil_guillemets_de_simples","openWith":"&sbquo;","closeWith":"‘","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"Entourer de « guillemets »","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"Entourer de “guillemets de second niveau”","className":"outil_guillemets_uniques","openWith":"‘","closeWith":"’","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"separator":"---------------"}
,{"name":"Insérer des caractères spécifiques","className":"outil_caracteres","dropMenu":[{"id":"A_grave","name":"Insérer un A accent grave majuscule","className":"outil_a_maj_grave","replaceWith":"À","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"E_aigu","name":"Insérer un E accent aigu majuscule","className":"outil_e_maj_aigu","replaceWith":"É","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"E_grave","name":"Insérer un E majuscule accent grave","className":"outil_e_maj_grave","replaceWith":"È","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"aelig","name":"Insérer un E dans l'A","className":"outil_aelig","replaceWith":"æ","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"AElig","name":"Insérer un E dans l'A majuscule","className":"outil_aelig_maj","replaceWith":"Æ","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"oe","name":"Insérer un E dans l'O","className":"outil_oe","replaceWith":"œ","display":true,"lang":["fr"]
}
,{"id":"OE","name":"Insérer un E dans l'O majuscule","className":"outil_oe_maj","replaceWith":"Œ","display":true,"lang":["fr"]
}
,{"id":"Ccedil","name":"Insérer un C cédille majuscule","className":"outil_ccedil_maj","replaceWith":"Ç","display":true,"lang":["fr","eo","cpf"]
}
,{"id":"uppercase","name":"Passer en majuscules","className":"outil_uppercase","replaceWith":function(markitup){return markitup.selection.toUpperCase()},"display":true,"lang":["fr","en"]
}
,{"id":"lowercase","name":"Passer en minuscules","className":"outil_lowercase","replaceWith":function(markitup){return markitup.selection.toLowerCase()},"display":true,"lang":["fr","en"]
}
]
}
,{"name":"Utiliser un outil du Couteau Suisse","className":"couteau_suisse_drop","replaceWith":"","dropMenu":[{"id":"decoupe_pages","name":"Insérer un séparateur de page ou d'onglet","className":"decoupe_pages","replaceWith":"\n++++\n","display":true}
,{"id":"decoupe_onglets","name":"Insérer un système d'onglet","className":"decoupe_onglets","replaceWith":"\n<onglets>Titre 1\n\nPlacez votre texte ici\n\n++++Titre 2\n\nPlacez votre texte ici\n\n++++Titre 3\n\nPlacez votre texte ici\n\n</onglets>\n","display":true}
,{"id":"blocs_bloc","name":"Insérer un bloc replié","className":"blocs_bloc","replaceWith":"\n<bloc>Un titre\n\nPlacez votre texte ici\n</bloc>\n","display":true}
,{"id":"blocs_visible","name":"Insérer un bloc déplié","className":"blocs_visible","replaceWith":"\n<visible>Un titre\n\nPlacez votre texte ici\n</visible>\n","display":true}
]
}
]
}
function outil_liste(h,c){
if((s=h.selection)&&(r=s.match(/^-([*#]+) (.*)$/))){
r[1]=r[1].replace(/[#*]/g,c);
s='-'+r[1]+' '+r[2]}else{
s='-'+c+' '+s}
return s}
function outil_indenter(h){
if(s=h.selection){
if(s.substr(0,2)=='-*'){
s='-**'+s.substr(2)}else if(s.substr(0,2)=='-#'){
s='-##'+s.substr(2)}else{
s='-* '+s}
}
return s}
function outil_desindenter(h){
if(s=h.selection){
if(s.substr(0,3)=='-**'){
s='-*'+s.substr(3)}else if(s.substr(0,3)=='-* '){
s=s.substr(3)}else if(s.substr(0,3)=='-##'){
s='-#'+s.substr(3)}else if(s.substr(0,3)=='-# '){
s=s.substr(3)}
}
return s}
function espace_si_accolade(h,openWith,closeWith){
if(s=h.selection){
if(s.charAt(0)=='{'){
return openWith+' '+s+' '+closeWith}
else if(c=h.textarea.selectionStart){
if(h.textarea.value.charAt(c-1)=='{'){
return' '+openWith+s+closeWith+' '}
}
}
return openWith+s+closeWith}
barre_outils_forum={"nameSpace":"forum","previewAutoRefresh":false,"onEnter":{"keepDefault":false,"selectionType":"return","replaceWith":"\n"}
,"onShiftEnter":{"keepDefault":false,"replaceWith":"\n_ "}
,"onCtrlEnter":{"keepDefault":false,"replaceWith":"\n\n"}
,"onTab":{"keepDefault":false,"replaceWith":"	"}
,"markupSet":[{"name":"Mettre en {{gras}}","key":"B","className":"outil_bold","replaceWith":function(h){return espace_si_accolade(h,'{{','}}')},"selectionType":"word"}
,{"name":"Mettre en {italique}","key":"I","className":"outil_italic","replaceWith":function(h){return espace_si_accolade(h,'{','}')},"selectionType":"word"}
,{"separator":"---------------"}
,{"name":"Transformer en [lien hypertexte->http://...]","key":"L","className":"outil_link","openWith":"[","closeWith":"->[![Veuillez indiquer l'adresse de votre lien (vous pouvez indiquer une adresse Internet sous la forme http://www.monsite.com, une adresse courriel, ou simplement indiquer le numéro d'un article de ce site.]!]]"}
,{"separator":"---------------"}
,{"name":"<quote>Citer un message</quote>","key":"Q","className":"outil_quote","openWith":"\n<quote>","closeWith":"</quote>\n","selectionType":"word"}
,{"name":"Entourer de « guillemets »","className":"outil_guillemets","openWith":"«","closeWith":"»","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"Entourer de “guillemets de second niveau”","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang":["fr","eo","cpf","ar","es"]
,"selectionType":"word"}
,{"name":"Entourer de « guillemets »","className":"outil_guillemets_de","openWith":"„","closeWith":"“","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"Entourer de “guillemets de second niveau”","className":"outil_guillemets_de_simples","openWith":"&sbquo;","closeWith":"‘","lang":["bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"Entourer de « guillemets »","className":"outil_guillemets_simples","openWith":"“","closeWith":"”","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"name":"Entourer de “guillemets de second niveau”","className":"outil_guillemets_uniques","openWith":"‘","closeWith":"’","lang_not":["fr","eo","cpf","ar","es","bg","de","pl","hr","src"]
,"selectionType":"word"}
,{"separator":"---------------"}
,{"name":"Utiliser un outil du Couteau Suisse","className":"couteau_suisse_drop","replaceWith":"","dropMenu":[{"id":"decoupe_onglets","name":"Insérer un système d'onglet","className":"decoupe_onglets","replaceWith":"\n<onglets>Titre 1\n\nPlacez votre texte ici\n\n++++Titre 2\n\nPlacez votre texte ici\n\n++++Titre 3\n\nPlacez votre texte ici\n\n</onglets>\n","display":true}
,{"id":"blocs_bloc","name":"Insérer un bloc replié","className":"blocs_bloc","replaceWith":"\n<bloc>Un titre\n\nPlacez votre texte ici\n</bloc>\n","display":true}
,{"id":"blocs_visible","name":"Insérer un bloc déplié","className":"blocs_visible","replaceWith":"\n<visible>Un titre\n\nPlacez votre texte ici\n</visible>\n","display":true}
]
}
]
}
function outil_liste(h,c){
if((s=h.selection)&&(r=s.match(/^-([*#]+) (.*)$/))){
r[1]=r[1].replace(/[#*]/g,c);
s='-'+r[1]+' '+r[2]}else{
s='-'+c+' '+s}
return s}
function outil_indenter(h){
if(s=h.selection){
if(s.substr(0,2)=='-*'){
s='-**'+s.substr(2)}else if(s.substr(0,2)=='-#'){
s='-##'+s.substr(2)}else{
s='-* '+s}
}
return s}
function outil_desindenter(h){
if(s=h.selection){
if(s.substr(0,3)=='-**'){
s='-*'+s.substr(3)}else if(s.substr(0,3)=='-* '){
s=s.substr(3)}else if(s.substr(0,3)=='-##'){
s='-#'+s.substr(3)}else if(s.substr(0,3)=='-# '){
s=s.substr(3)}
}
return s}
function espace_si_accolade(h,openWith,closeWith){
if(s=h.selection){
if(s.charAt(0)=='{'){
return openWith+' '+s+' '+closeWith}
else if(c=h.textarea.selectionStart){
if(h.textarea.value.charAt(c-1)=='{'){
return' '+openWith+s+closeWith+' '}
}
}
return openWith+s+closeWith}
;(function($){
$.fn.barre_outils=function(nom,settings){
options={
lang:'fr'
};
$.extend(options,settings);
return $(this)
.not('.markItUpEditor, .no_barre')
.markItUp(eval('barre_outils_'+nom),{lang:options.lang})};
$.fn.barre_previsualisation=function(settings){
options={
previewParserPath:"index.php?action=porte_plume_previsu",textEditer:"&Eacute;diter",
textVoir:"Voir"
};
$.extend(options,settings);
return $(this)
.not('.pp_previsualisation, .no_previsualisation')
.previsu_spip(options)};
$(window).load(function(){
function barrebouilles(){
$('.formulaire_spip textarea.inserer_barre_forum').barre_outils('forum');
$('.formulaire_spip textarea.inserer_barre_edition').barre_outils('edition');
$('.formulaire_spip textarea.inserer_previsualisation').barre_previsualisation();
$('textarea.textarea_forum').barre_outils('forum');
$('.formulaire_forum textarea[name=texte]').barre_outils('forum');
$('.formulaire_spip textarea[name=texte]')
.barre_outils('edition')
.barre_previsualisation()}
barrebouilles();
onAjaxLoad(barrebouilles)})})(jQuery);


/* ../extensions/porte_plume/javascript/porte_plume_forcer_hauteur.js */
function barre_forcer_hauteur(){
jQuery(".markItUpEditor").each(function(){
var hauteur_min=jQuery(this).height();
var hauteur_max=parseInt(jQuery(window).height())-200;
var hauteur=hauteur_min;
var signes=jQuery(this).val().length;
if(signes){
var hauteur_signes=Math.round(signes/4)+50;
if(hauteur_signes>hauteur_min&&hauteur_signes<hauteur_max)
hauteur=hauteur_signes;
else
if(hauteur_signes>hauteur_max)
hauteur=hauteur_max;
jQuery(this).height(hauteur)}
})}
jQuery(window).bind("load",function(){
barre_forcer_hauteur()});


/* ../plugins/auto/forms_et_tables_2_0/javascript/iautocompleter.js */

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[(function(e){return d[e]})];e=(function(){return'\\w+'});c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('2.1C={49:f(e,s){n l=0;n t=0;n 1i=0;n 1s=0;n w=2.d(e,\'1G\');n h=2.d(e,\'1H\');n 10=e.22;n Q=e.1V;2o(e.20){l+=e.24+(e.K?k(e.K.1A)||0:0);t+=e.25+(e.K?k(e.K.1y)||0:0);5(s){1i+=e.21.14||0;1s+=e.21.11||0}e=e.20}l+=e.24+(e.K?k(e.K.1A)||0:0);t+=e.25+(e.K?k(e.K.1y)||0:0);1s=t-1s;1i=l-1i;m{x:l,y:t,4i:1i,4j:1s,w:w,h:h,10:10,Q:Q}},2y:f(e){n x=0;n y=0;n 2q=B;v=e.Y;5(2(e).d(\'N\')==\'Z\'){1M=v.18;1R=v.H;v.18=\'2W\';v.N=\'1I\';v.H=\'1D\';2q=12}8=e;2o(8){x+=8.24+(8.K&&!2.28.2V?k(8.K.1A)||0:0);y+=8.25+(8.K&&!2.28.2V?k(8.K.1y)||0:0);8=8.20}8=e;2o(8&&8.2r.1X()!=\'D\'){x-=8.14||0;y-=8.11||0;8=8.21}5(2q){v.N=\'Z\';v.H=1R;v.18=1M}m{x:x,y:y}},2z:f(e){n w=2.d(e,\'1G\');n h=2.d(e,\'1H\');n 10=0;n Q=0;v=e.Y;5(2(e).d(\'N\')!=\'Z\'){10=e.22;Q=e.1V}A{1M=v.18;1R=v.H;v.18=\'2W\';v.N=\'1I\';v.H=\'1D\';10=e.22;Q=e.1V;v.N=\'Z\';v.H=1R;v.18=1M}m{w:w,h:h,10:10,Q:Q}},2Z:f(e){5(e){w=e.1o;h=e.1j}A{1m=j.O;w=E.1Y||1O.1Y||(1m&&1m.1o)||j.D.1o;h=E.1Z||1O.1Z||(1m&&1m.1j)||j.D.1j}m{w:w,h:h}},30:f(e){5(e){t=e.11;l=e.14;w=e.2p;h=e.2j;1U=0;1N=0}A{5(j.O&&j.O.11){t=j.O.11;l=j.O.14;w=j.O.2p;h=j.O.2j}A 5(j.D){t=j.D.11;l=j.D.14;w=j.D.2p;h=j.D.2j}1U=1O.1Y||j.O.1o||j.D.1o||0;1N=1O.1Z||j.O.1j||j.D.1j||0}m{t:t,l:l,w:w,h:h,1U:1U,1N:1N}},44:f(e,1b){8=2(e);t=8.d(\'32\')||\'\';r=8.d(\'33\')||\'\';b=8.d(\'34\')||\'\';l=8.d(\'3Z\')||\'\';5(1b)m{t:k(t)||0,r:k(r)||0,b:k(b)||0,l:k(l)};A m{t:t,r:r,b:b,l:l}},39:f(e,1b){8=2(e);t=8.d(\'3a\')||\'\';r=8.d(\'3b\')||\'\';b=8.d(\'3c\')||\'\';l=8.d(\'3d\')||\'\';5(1b)m{t:k(t)||0,r:k(r)||0,b:k(b)||0,l:k(l)};A m{t:t,r:r,b:b,l:l}},3e:f(e,1b){8=2(e);t=8.d(\'1y\')||\'\';r=8.d(\'3f\')||\'\';b=8.d(\'3g\')||\'\';l=8.d(\'1A\')||\'\';5(1b)m{t:k(t)||0,r:k(r)||0,b:k(b)||0,l:k(l)||0};A m{t:t,r:r,b:b,l:l}},3i:f(u){x=u.3j||(u.3k+(j.O.14||j.D.14))||0;y=u.3l||(u.3m+(j.O.11||j.D.11))||0;m{x:x,y:y}}};2.3={q:p,1q:p,I:p,17:p,G:p,1J:p,4:p,c:p,o:p,1a:f(){2.3.1q.1a();5(2.3.I){2.3.I.26()}},X:f(){2.3.o=p;2.3.c=p;2.3.G=2.3.4.a;5(2.3.q.d(\'N\')==\'1I\'){5(2.3.4.6.g){2g(2.3.4.6.g.T){J\'2a\':2.3.q.3A(2.3.4.6.g.S,2.3.1a);L;J\'1d\':2.3.q.3z(2.3.4.6.g.S,2.3.1a);L;J\'1z\':2.3.q.3q(2.3.4.6.g.S,2.3.1a);L}}A{2.3.q.26()}5(2.3.I)2.3.I.26();5(2.3.4.6.19)2.3.4.6.19.1T(2.3.4,[2.3.q,2.3.I])}A{2.3.1a}E.2l(2.3.17)},2N:f(){n 4=2.3.4;5(4&&4.a!=2.3.G&&4.a.P>=4.6.1x){2.3.G=4.a;2.3.1J=4.a;1g={C:$(4).2x(\'3t\')||\'C\',a:4.a};2.3u({T:\'3w\',1g:$.3x(1g),3B:f(2w){4.6.M=$(\'2i\',2w);R=4.6.M.R();5(R>0){n V=\'\';4.6.M.2n(f(1K){V+=\'<1t 1n="\'+$(\'a\',7).U()+\'" 1p="\'+1K+\'" Y="2G: 2H;">\'+$(\'U\',7).U()+\'</1t>\'});5(4.6.1E){4.a=$(\'a\',4.6.M.F(0)).U();2.3.1u(4,2.3.1J.P,4.a.P)}5(R>0){2.3.2s(4,V)}A{2.3.X()}}A{2.3.X()}},3E:4.6.1w})}},2s:f(4,V){2.3.1q.3F(V);2.3.o=$(\'1t\',2.3.1q.F(0));2.3.o.3H(2.3.2S).3I(2.3.2T);H=2.1C.2y(4);R=2.1C.2z(4);2.3.q.d(\'2c\',H.y+R.Q+\'16\').d(\'2d\',H.x+\'16\').3L(4.6.1L);5(2.3.I){2.3.I.d(\'2c\',H.y+R.Q+\'16\').d(\'2d\',H.x+\'16\').d(\'1G\',2.3.q.d(\'1G\')+\'16\').d(\'1H\',2.3.q.d(\'1H\')+\'16\').d(\'N\',\'1I\')}2.3.c=0;2.3.o.F(0).1h=4.6.1c;5(2.3.q.d(\'N\')==\'Z\'){5(4.6.g){2g(4.6.g.T){J\'2a\':2.3.q.3R(4.6.g.S);L;J\'1d\':2.3.q.3S(4.6.g.S);L;J\'1z\':2.3.q.3T(4.6.g.S);L}}A{2.3.q.3U()}5(2.3.4.6.1e)2.3.4.6.1e.1T(2.3.4,[2.3.q,2.3.I])}},2M:f(){n 4=7;5(4.6.M){2.3.G=4.a;2.3.1J=4.a;n V=\'\';4.6.M.2n(f(1K){a=$(\'a\',7).U().1X();2F=4.a.1X();5(a.3V(2F)==0){V+=\'<1t 1n="\'+$(\'a\',7).U()+\'" 1p="\'+1K+\'" Y="2G: 2H;">\'+$(\'U\',7).U()+\'</1t>\'}});5(V!=\'\'){2.3.2s(4,V);7.6.1F=12;m}}4.6.M=p;7.6.1F=B},1u:f(C,1P,1Q){5(C.2I){n 1k=C.2I();1k.3W(12);1k.3X("2J",1P);1k.42("2J",1Q);1k.43()}A 5(C.2K){C.2K(1P,1Q)}A{5(C.2L){C.2L=1P;C.47=1Q}}C.2C()},2e:f(e){E.2l(2.3.17);1l=e.2t||e.2u||-1;5(/13|27|35|36|38|40/.2b(1l)&&2.3.o){5(E.u){E.u.2v=12;E.u.2A=B}A{e.23();e.2m()}5(2.3.c!=p)2.3.o.F(2.3.c).1h=\'\';A 2.3.c=-1;2g(1l){J 13:5(2.3.c==-1)2.3.c=0;c=2.3.o.F(2.3.c);7.a=c.15(\'1n\');2.3.G=7.a;2.3.1u(7,2.3.G.P,7.a.P);2.3.X();5(7.6.W){1v=k(c.15(\'1p\'))||0;2.3.1W(7,7.6.M.F(1v))}5(7.1f)7.1f(B);m B;L;J 27:7.a=2.3.G;7.6.M=p;2.3.X();5(7.1f)7.1f(B);m B;L;J 35:2.3.c=2.3.o.R()-1;L;J 36:2.3.c=0;L;J 38:2.3.c--;5(2.3.c<0)2.3.c=2.3.o.R()-1;L;J 40:2.3.c++;5(2.3.c==2.3.o.R())2.3.c=0;L}2.3.o.F(2.3.c).1h=7.6.1c;5(2.3.o.F(2.3.c).1f)2.3.o.F(2.3.c).1f(B);5(7.6.1E){7.a=2.3.o.F(2.3.c).15(\'1n\');2.3.1u(7,2.3.G.P,7.a.P)}m B}2.3.2M.1T(7);5(7.6.1F==B){5(7.a!=2.3.G&&7.a.P>=7.6.1x)2.3.17=E.2P(2.3.2N,7.6.1r);5(2.3.o){2.3.X()}}m 12},1W:f(C,2i){5(C.6.W){n 1g={};1S=2i.4a(\'*\');4b(i=0;i<1S.P;i++){1g[1S[i].2r]=1S[i].4f.4g}C.6.W.1T(C,[1g])}},2S:f(e){5(2.3.o){5(2.3.c!=p)2.3.o.F(2.3.c).1h=\'\';2.3.o.F(2.3.c).1h=\'\';2.3.c=k(7.15(\'1p\'))||0;2.3.o.F(2.3.c).1h=2.3.4.6.1c}},2T:f(u){E.2l(2.3.17);u=u||2.u.4k(E.u);u.23();u.2m();2.3.4.a=7.15(\'1n\');2.3.G=2.3.4.a;2.3.1u(2.3.4,2.3.G.P,2.3.4.a.P);2.3.X();5(2.3.4.6.W){1v=k(7.15(\'1p\'))||0;2.3.1W(2.3.4,2.3.4.6.M.F(1v))}m B},2U:f(e){1l=e.2t||e.2u||-1;5(/13|27|35|36|38|40/.2b(1l)&&2.3.o){5(E.u){E.u.2v=12;E.u.2A=B}A{e.23();e.2m()}m B}},2X:f(9){5(!9.1w||!2.1C){m}5(!2.3.q){5($.28.3n){$(\'D\',j).2D(\'<I Y="N:Z;H:1D;3p:3r:3s.3v.3y(3C=0);" 2E="2B" 3G="3J:B;" 3K="0" 3M="3O"></I>\');2.3.I=$(\'#2B\')}$(\'D\',j).2D(\'<2Q 2E="2R" Y="H: 1D; 2c: 0; 2d: 0; z-2O: 3Y; N: Z;"><2k Y="45: 0;46: 0; 48-Y: Z; z-2O: 4c;">&4e;</2k></2Q>\');2.3.q=$(\'#2R\');2.3.1q=$(\'2k\',2.3.q)}m 7.2n(f(){5(7.2r!=\'2Y\'&&7.15(\'T\')!=\'U\')m;7.6={};7.6.1w=9.1w;7.6.1x=2f.2h(k(9.1x)||1);7.6.1L=9.1L?9.1L:\'\';7.6.1c=9.1c?9.1c:\'\';7.6.W=9.W&&9.W.1B==29?9.W:p;7.6.1e=9.1e&&9.1e.1B==29?9.1e:p;7.6.19=9.19&&9.19.1B==29?9.19:p;7.6.1E=9.1E?12:B;7.6.1r=2f.2h(k(9.1r)||3D);5(9.g&&9.g.1B==3N){5(!9.g.T||!/2a|1d|1z/.2b(9.g.T)){9.g.T=\'1d\'}5(9.g.T==\'1d\'&&!2.g.1d)m;5(9.g.T==\'1z\'&&!2.g.41)m;9.g.S=2f.2h(k(9.g.S)||4d);5(9.g.S>7.6.1r){9.g.S=7.6.1r-4l}7.6.g=9.g}7.6.M=p;7.6.1F=B;$(7).2x(\'2e\',\'3P\').2C(f(){2.3.4=7;2.3.G=7.a}).4h(2.3.2U).31(2.3.2e).3o(f(){2.3.17=E.2P(2.3.X,37)})})}};2.3h.3Q=2.3.2X;',62,270,'||jQuery|iAuto|subject|if|autoCFG|this|el|options|value||selectedItem|css||function|fx|||document|parseInt||return|var|items|null|helper||||event|es|||||else|false|field|body|window|get|lastValue|position|iframe|case|currentStyle|break|lastSuggestion|display|documentElement|length|hb|size|duration|type|text|toWrite|onSelect|clear|style|none|wb|scrollTop|true||scrollLeft|getAttribute|px|timer|visibility|onHide|empty|toInteger|selectClass|slide|onShow|scrollIntoView|data|className|sl|clientHeight|selRange|pressedKey|de|rel|clientWidth|dir|content|delay|st|li|selection|iteration|source|minchars|borderTopWidth|blind|borderLeftWidth|constructor|iUtil|absolute|autofill|inCache|width|height|block|currentValue|nr|helperClass|oldVisibility|ih|self|start|end|oldPosition|childs|apply|iw|offsetHeight|applyOnSelect|toLowerCase|innerWidth|innerHeight|offsetParent|parentNode|offsetWidth|preventDefault|offsetLeft|offsetTop|hide||browser|Function|fade|test|top|left|autocomplete|Math|switch|abs|item|scrollHeight|ul|clearTimeout|stopPropagation|each|while|scrollWidth|restoreStyle|tagName|whiteItems|charCode|keyCode|cancelBubble|xml|attr|getPosition|getSize|returnValue|autocompleteIframe|focus|append|id|inputValue|cursor|default|createTextRange|character|setSelectionRange|selectionStart|checkCache|update|index|setTimeout|div|autocompleteHelper|hoverItem|clickItem|protect|opera|hidden|build|INPUT|getClient|getScroll|keyup|marginTop|marginRight|marginBottom|||200||getPadding|paddingTop|paddingRight|paddingBottom|paddingLeft|getBorder|borderRightWidth|borderBottomWidth|fn|getPointer|pageX|clientX|pageY|clientY|msie|blur|filter|BlindUp|progid|DXImageTransform|name|ajax|Microsoft|POST|param|Alpha|SlideOutUp|fadeOut|success|opacity|1000|url|html|src|mouseover|click|javascript|frameborder|addClass|scrolling|Object|no|off|Autocomplete|fadeIn|SlideInUp|BlindDown|show|indexOf|collapse|moveStart|30001|marginLeft||BlindDirection|moveEnd|select|getMargins|margin|padding|selectionEnd|list|getPos|getElementsByTagName|for|30002|400|nbsp|firstChild|nodeValue|keypress|sx|sy|fix|100'.split('|'),0,{}))


/* ../plugins/auto/forms_et_tables_2_0/javascript/interface.js */

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('k.f2={2r:u(M){E q.1E(u(){if(!M.aR||!M.aZ)E;D el=q;el.2l={aq:M.aq||cO,aR:M.aR,aZ:M.aZ,8e:M.8e||\'fV\',aJ:M.aJ||\'fV\',2Y:M.2Y&&2g M.2Y==\'u\'?M.2Y:I,3i:M.2Y&&2g M.3i==\'u\'?M.3i:I,7U:M.7U&&2g M.7U==\'u\'?M.7U:I,as:k(M.aR,q),8f:k(M.aZ,q),H:M.H||8J,67:M.67||0};el.2l.8f.2G().B(\'W\',\'9R\').eq(0).B({W:el.2l.aq+\'U\',19:\'2B\'}).2T();el.2l.as.1E(u(2N){q.7X=2N}).gC(u(){k(q).2R(el.2l.aJ)},u(){k(q).4i(el.2l.aJ)}).1J(\'5h\',u(e){if(el.2l.67==q.7X)E;el.2l.as.eq(el.2l.67).4i(el.2l.8e).2T().eq(q.7X).2R(el.2l.8e).2T();el.2l.8f.eq(el.2l.67).5w({W:0},el.2l.H,u(){q.14.19=\'1o\';if(el.2l.3i){el.2l.3i.1D(el,[q])}}).2T().eq(q.7X).1Y().5w({W:el.2l.aq},el.2l.H,u(){q.14.19=\'2B\';if(el.2l.2Y){el.2l.2Y.1D(el,[q])}}).2T();if(el.2l.7U){el.2l.7U.1D(el,[q,el.2l.8f.K(q.7X),el.2l.as.K(el.2l.67),el.2l.8f.K(el.2l.67)])}el.2l.67=q.7X}).eq(0).2R(el.2l.8e).2T();k(q).B(\'W\',k(q).B(\'W\')).B(\'2U\',\'2K\')})}};k.fn.gN=k.f2.2r;k.aA={2r:u(M){E q.1E(u(){D el=q;D 7E=2*18.2Q/f1;D an=2*18.2Q;if(k(el).B(\'Y\')!=\'2s\'&&k(el).B(\'Y\')!=\'1P\'){k(el).B(\'Y\',\'2s\')}el.1l={1R:k(M.1R,q),2F:M.2F,6q:M.6q,aD:M.aD,an:an,1N:k.1a.2o(q),Y:k.1a.3w(q),26:18.2Q/2,bi:M.bi,8p:M.6r,6r:[],aG:I,7E:2*18.2Q/f1};el.1l.fB=(el.1l.1N.w-el.1l.2F)/2;el.1l.7D=(el.1l.1N.h-el.1l.6q-el.1l.6q*el.1l.8p)/2;el.1l.2D=2*18.2Q/el.1l.1R.1N();el.1l.ba=el.1l.1N.w/2;el.1l.b9=el.1l.1N.h/2-el.1l.6q*el.1l.8p;D ak=1h.3F(\'22\');k(ak).B({Y:\'1P\',3I:1,Q:0,O:0});k(el).1S(ak);el.1l.1R.1E(u(2N){a6=k(\'1T\',q).K(0);W=T(el.1l.6q*el.1l.8p);if(k.3a.4t){3E=1h.3F(\'1T\');k(3E).B(\'Y\',\'1P\');3E.2J=a6.2J;3E.14.5E=\'gE 9n:9w.9y.cC(1G=60, 14=1, gB=0, gA=0, gv=0, gF=0)\'}P{3E=1h.3F(\'3E\');if(3E.fD){4L=3E.fD("2d");3E.14.Y=\'1P\';3E.14.W=W+\'U\';3E.14.Z=el.1l.2F+\'U\';3E.W=W;3E.Z=el.1l.2F;4L.gu();4L.gO(0,W);4L.gk(1,-1);4L.gp(a6,0,0,el.1l.2F,W);4L.6H();4L.gm="gG-4l";D ap=4L.hy(0,0,0,W);ap.fs(1,"fr(1V, 1V, 1V, 1)");ap.fs(0,"fr(1V, 1V, 1V, 0.6)");4L.hx=ap;if(hA.hB.3J(\'hw\')!=-1){4L.hv()}P{4L.hu(0,0,el.1l.2F,W)}}}el.1l.6r[2N]=3E;k(ak).1S(3E)}).1J(\'9z\',u(e){el.1l.aG=1b;el.1l.H=el.1l.7E*0.1*el.1l.H/18.3S(el.1l.H);E I}).1J(\'8B\',u(e){el.1l.aG=I;E I});k.aA.7T(el);el.1l.H=el.1l.7E*0.2;el.1l.ht=1X.6V(u(){el.1l.26+=el.1l.H;if(el.1l.26>an)el.1l.26=0;k.aA.7T(el)},20);k(el).1J(\'8B\',u(){el.1l.H=el.1l.7E*0.2*el.1l.H/18.3S(el.1l.H)}).1J(\'3D\',u(e){if(el.1l.aG==I){1s=k.1a.4a(e);fz=el.1l.1N.w-1s.x+el.1l.Y.x;el.1l.H=el.1l.bi*el.1l.7E*(el.1l.1N.w/2-fz)/(el.1l.1N.w/2)}})})},7T:u(el){el.1l.1R.1E(u(2N){b8=el.1l.26+2N*el.1l.2D;x=el.1l.fB*18.5H(b8);y=el.1l.7D*18.83(b8);f9=T(2a*(el.1l.7D+y)/(2*el.1l.7D));fk=(el.1l.7D+y)/(2*el.1l.7D);Z=T((el.1l.2F-el.1l.aD)*fk+el.1l.aD);W=T(Z*el.1l.6q/el.1l.2F);q.14.Q=el.1l.b9+y-W/2+"U";q.14.O=el.1l.ba+x-Z/2+"U";q.14.Z=Z+"U";q.14.W=W+"U";q.14.3I=f9;el.1l.6r[2N].14.Q=T(el.1l.b9+y+W-1-W/2)+"U";el.1l.6r[2N].14.O=T(el.1l.ba+x-Z/2)+"U";el.1l.6r[2N].14.Z=Z+"U";el.1l.6r[2N].14.W=T(W*el.1l.8p)+"U"})}};k.fn.hI=k.aA.2r;k.23({G:{c8:u(p,n,1W,1H,1m){E((-18.5H(p*18.2Q)/2)+0.5)*1H+1W},hK:u(p,n,1W,1H,1m){E 1H*(n/=1m)*n*n+1W},fl:u(p,n,1W,1H,1m){E-1H*((n=n/1m-1)*n*n*n-1)+1W},hm:u(p,n,1W,1H,1m){if((n/=1m/2)<1)E 1H/2*n*n*n*n+1W;E-1H/2*((n-=2)*n*n*n-2)+1W},8l:u(p,n,1W,1H,1m){if((n/=1m)<(1/2.75)){E 1H*(7.aB*n*n)+1W}P if(n<(2/2.75)){E 1H*(7.aB*(n-=(1.5/2.75))*n+.75)+1W}P if(n<(2.5/2.75)){E 1H*(7.aB*(n-=(2.25/2.75))*n+.gY)+1W}P{E 1H*(7.aB*(n-=(2.h2/2.75))*n+.gX)+1W}},cr:u(p,n,1W,1H,1m){if(k.G.8l)E 1H-k.G.8l(p,1m-n,0,1H,1m)+1W;E 1W+1H},gW:u(p,n,1W,1H,1m){if(k.G.cr&&k.G.8l)if(n<1m/2)E k.G.cr(p,n*2,0,1H,1m)*.5+1W;E k.G.8l(p,n*2-1m,0,1H,1m)*.5+1H*.5+1W;E 1W+1H},gQ:u(p,n,1W,1H,1m){D a,s;if(n==0)E 1W;if((n/=1m)==1)E 1W+1H;a=1H*0.3;p=1m*.3;if(a<18.3S(1H)){a=1H;s=p/4}P{s=p/(2*18.2Q)*18.cb(1H/a)}E-(a*18.6b(2,10*(n-=1))*18.83((n*1m-s)*(2*18.2Q)/p))+1W},gT:u(p,n,1W,1H,1m){D a,s;if(n==0)E 1W;if((n/=1m/2)==2)E 1W+1H;a=1H*0.3;p=1m*.3;if(a<18.3S(1H)){a=1H;s=p/4}P{s=p/(2*18.2Q)*18.cb(1H/a)}E a*18.6b(2,-10*n)*18.83((n*1m-s)*(2*18.2Q)/p)+1H+1W},gV:u(p,n,1W,1H,1m){D a,s;if(n==0)E 1W;if((n/=1m/2)==2)E 1W+1H;a=1H*0.3;p=1m*.3;if(a<18.3S(1H)){a=1H;s=p/4}P{s=p/(2*18.2Q)*18.cb(1H/a)}if(n<1){E-.5*(a*18.6b(2,10*(n-=1))*18.83((n*1m-s)*(2*18.2Q)/p))+1W}E a*18.6b(2,-10*(n-=1))*18.83((n*1m-s)*(2*18.2Q)/p)*.5+1H+1W}}});k.6n={2r:u(M){E q.1E(u(){D el=q;el.1F={1R:k(M.1R,q),1Z:k(M.1Z,q),1M:k.1a.3w(q),2F:M.2F,ax:M.ax,7Y:M.7Y,ge:M.ge,51:M.51,6x:M.6x};k.6n.aH(el,0);k(1X).1J(\'gU\',u(){el.1F.1M=k.1a.3w(el);k.6n.aH(el,0);k.6n.7T(el)});k.6n.7T(el);el.1F.1R.1J(\'9z\',u(){k(el.1F.ax,q).K(0).14.19=\'2B\'}).1J(\'8B\',u(){k(el.1F.ax,q).K(0).14.19=\'1o\'});k(1h).1J(\'3D\',u(e){D 1s=k.1a.4a(e);D 5s=0;if(el.1F.51&&el.1F.51==\'cv\')D aI=1s.x-el.1F.1M.x-(el.4c-el.1F.2F*el.1F.1R.1N())/2-el.1F.2F/2;P if(el.1F.51&&el.1F.51==\'2L\')D aI=1s.x-el.1F.1M.x-el.4c+el.1F.2F*el.1F.1R.1N();P D aI=1s.x-el.1F.1M.x;D fP=18.6b(1s.y-el.1F.1M.y-el.5W/2,2);el.1F.1R.1E(u(2N){45=18.ez(18.6b(aI-2N*el.1F.2F,2)+fP);45-=el.1F.2F/2;45=45<0?0:45;45=45>el.1F.7Y?el.1F.7Y:45;45=el.1F.7Y-45;bB=el.1F.6x*45/el.1F.7Y;q.14.Z=el.1F.2F+bB+\'U\';q.14.O=el.1F.2F*2N+5s+\'U\';5s+=bB});k.6n.aH(el,5s)})})},aH:u(el,5s){if(el.1F.51)if(el.1F.51==\'cv\')el.1F.1Z.K(0).14.O=(el.4c-el.1F.2F*el.1F.1R.1N())/2-5s/2+\'U\';P if(el.1F.51==\'O\')el.1F.1Z.K(0).14.O=-5s/el.1F.1R.1N()+\'U\';P if(el.1F.51==\'2L\')el.1F.1Z.K(0).14.O=(el.4c-el.1F.2F*el.1F.1R.1N())-5s/2+\'U\';el.1F.1Z.K(0).14.Z=el.1F.2F*el.1F.1R.1N()+5s+\'U\'},7T:u(el){el.1F.1R.1E(u(2N){q.14.Z=el.1F.2F+\'U\';q.14.O=el.1F.2F*2N+\'U\'})}};k.fn.hi=k.6n.2r;k.N={1c:S,8R:S,3A:S,2I:S,4y:S,cl:S,1d:S,2h:S,1R:S,5o:u(){k.N.8R.5o();if(k.N.3A){k.N.3A.2G()}},4w:u(){k.N.1R=S;k.N.2h=S;k.N.4y=k.N.1d.2y;if(k.N.1c.B(\'19\')==\'2B\'){if(k.N.1d.1f.fx){3m(k.N.1d.1f.fx.1u){1e\'c6\':k.N.1c.7a(k.N.1d.1f.fx.1m,k.N.5o);1r;1e\'1z\':k.N.1c.fq(k.N.1d.1f.fx.1m,k.N.5o);1r;1e\'a7\':k.N.1c.g3(k.N.1d.1f.fx.1m,k.N.5o);1r}}P{k.N.1c.2G()}if(k.N.1d.1f.3i)k.N.1d.1f.3i.1D(k.N.1d,[k.N.1c,k.N.3A])}P{k.N.5o()}1X.bH(k.N.2I)},dQ:u(){D 1d=k.N.1d;D 4d=k.N.aY(1d);if(1d&&4d.3o!=k.N.4y&&4d.3o.1g>=1d.1f.aL){k.N.4y=4d.3o;k.N.cl=4d.3o;81={2n:k(1d).1p(\'hj\')||\'2n\',2y:4d.3o};k.hl({1u:\'hk\',81:k.hf(81),he:u(fZ){1d.1f.4e=k(\'3o\',fZ);1N=1d.1f.4e.1N();if(1N>0){D 5p=\'\';1d.1f.4e.1E(u(2N){5p+=\'<8P 4I="\'+k(\'2y\',q).3g()+\'" 8K="\'+2N+\'" 14="9b: ad;">\'+k(\'3g\',q).3g()+\'</8P>\'});if(1d.1f.aU){D 3M=k(\'2y\',1d.1f.4e.K(0)).3g();1d.2y=4d.3j+3M+1d.1f.3N+4d.66;k.N.6J(1d,4d.3o.1g!=3M.1g?(4d.3j.1g+4d.3o.1g):3M.1g,4d.3o.1g!=3M.1g?(4d.3j.1g+3M.1g):3M.1g)}if(1N>0){k.N.cj(1d,5p)}P{k.N.4w()}}P{k.N.4w()}},5N:1d.1f.aN})}},cj:u(1d,5p){k.N.8R.3x(5p);k.N.1R=k(\'8P\',k.N.8R.K(0));k.N.1R.9z(k.N.di).1J(\'5h\',k.N.dj);D Y=k.1a.3w(1d);D 1N=k.1a.2o(1d);k.N.1c.B(\'Q\',Y.y+1N.hb+\'U\').B(\'O\',Y.x+\'U\').2R(1d.1f.aM);if(k.N.3A){k.N.3A.B(\'19\',\'2B\').B(\'Q\',Y.y+1N.hb+\'U\').B(\'O\',Y.x+\'U\').B(\'Z\',k.N.1c.B(\'Z\')).B(\'W\',k.N.1c.B(\'W\'))}k.N.2h=0;k.N.1R.K(0).3l=1d.1f.7H;k.N.8Q(1d,1d.1f.4e.K(0),\'7J\');if(k.N.1c.B(\'19\')==\'1o\'){if(1d.1f.bV){D cp=k.1a.aT(1d,1b);D cm=k.1a.6U(1d,1b);k.N.1c.B(\'Z\',1d.4c-(k.dF?(cp.l+cp.r+cm.l+cm.r):0)+\'U\')}if(1d.1f.fx){3m(1d.1f.fx.1u){1e\'c6\':k.N.1c.7f(1d.1f.fx.1m);1r;1e\'1z\':k.N.1c.fo(1d.1f.fx.1m);1r;1e\'a7\':k.N.1c.gb(1d.1f.fx.1m);1r}}P{k.N.1c.1Y()}if(k.N.1d.1f.2Y)k.N.1d.1f.2Y.1D(k.N.1d,[k.N.1c,k.N.3A])}},dO:u(){D 1d=q;if(1d.1f.4e){k.N.4y=1d.2y;k.N.cl=1d.2y;D 5p=\'\';1d.1f.4e.1E(u(2N){2y=k(\'2y\',q).3g().6c();fY=1d.2y.6c();if(2y.3J(fY)==0){5p+=\'<8P 4I="\'+k(\'2y\',q).3g()+\'" 8K="\'+2N+\'" 14="9b: ad;">\'+k(\'3g\',q).3g()+\'</8P>\'}});if(5p!=\'\'){k.N.cj(1d,5p);q.1f.9x=1b;E}}1d.1f.4e=S;q.1f.9x=I},6J:u(2n,26,2T){if(2n.b1){D 6t=2n.b1();6t.hp(1b);6t.dI("ck",26);6t.ha("ck",-2T+26);6t.8C()}P if(2n.aF){2n.aF(26,2T)}P{if(2n.5q){2n.5q=26;2n.dN=2T}}2n.6K()},f0:u(2n){if(2n.5q)E 2n.5q;P if(2n.b1){D 6t=1h.6J.dZ();D eX=6t.h9();E 0-eX.dI(\'ck\',-h6)}},aY:u(2n){D 4P={2y:2n.2y,3j:\'\',66:\'\',3o:\'\'};if(2n.1f.aQ){D 8N=I;D 5q=k.N.f0(2n)||0;D 4T=4P.2y.7C(2n.1f.3N);24(D i=0;i<4T.1g;i++){if((4P.3j.1g+4T[i].1g>=5q||5q==0)&&!8N){if(4P.3j.1g<=5q)4P.3o=4T[i];P 4P.66+=4T[i]+(4T[i]!=\'\'?2n.1f.3N:\'\');8N=1b}P if(8N){4P.66+=4T[i]+(4T[i]!=\'\'?2n.1f.3N:\'\')}if(!8N){4P.3j+=4T[i]+(4T.1g>1?2n.1f.3N:\'\')}}}P{4P.3o=4P.2y}E 4P},bU:u(e){1X.bH(k.N.2I);D 1d=k.N.aY(q);D 3K=e.7L||e.7K||-1;if(/13|27|35|36|38|40|9/.48(3K)&&k.N.1R){if(1X.2k){1X.2k.bT=1b;1X.2k.c0=I}P{e.aP();e.aW()}if(k.N.2h!=S)k.N.1R.K(k.N.2h||0).3l=\'\';P k.N.2h=-1;3m(3K){1e 9:1e 13:if(k.N.2h==-1)k.N.2h=0;D 2h=k.N.1R.K(k.N.2h||0);D 3M=2h.5C(\'4I\');q.2y=1d.3j+3M+q.1f.3N+1d.66;k.N.4y=1d.3o;k.N.6J(q,1d.3j.1g+3M.1g+q.1f.3N.1g,1d.3j.1g+3M.1g+q.1f.3N.1g);k.N.4w();if(q.1f.68){4u=T(2h.5C(\'8K\'))||0;k.N.8Q(q,q.1f.4e.K(4u),\'68\')}if(q.7W)q.7W(I);E 3K!=13;1r;1e 27:q.2y=1d.3j+k.N.4y+q.1f.3N+1d.66;q.1f.4e=S;k.N.4w();if(q.7W)q.7W(I);E I;1r;1e 35:k.N.2h=k.N.1R.1N()-1;1r;1e 36:k.N.2h=0;1r;1e 38:k.N.2h--;if(k.N.2h<0)k.N.2h=k.N.1R.1N()-1;1r;1e 40:k.N.2h++;if(k.N.2h==k.N.1R.1N())k.N.2h=0;1r}k.N.8Q(q,q.1f.4e.K(k.N.2h||0),\'7J\');k.N.1R.K(k.N.2h||0).3l=q.1f.7H;if(k.N.1R.K(k.N.2h||0).7W)k.N.1R.K(k.N.2h||0).7W(I);if(q.1f.aU){D aK=k.N.1R.K(k.N.2h||0).5C(\'4I\');q.2y=1d.3j+aK+q.1f.3N+1d.66;if(k.N.4y.1g!=aK.1g)k.N.6J(q,1d.3j.1g+k.N.4y.1g,1d.3j.1g+aK.1g)}E I}k.N.dO.1D(q);if(q.1f.9x==I){if(1d.3o!=k.N.4y&&1d.3o.1g>=q.1f.aL)k.N.2I=1X.9T(k.N.dQ,q.1f.54);if(k.N.1R){k.N.4w()}}E 1b},8Q:u(2n,3o,1u){if(2n.1f[1u]){D 81={};ar=3o.f3(\'*\');24(i=0;i<ar.1g;i++){81[ar[i].4Y]=ar[i].7c.h4}2n.1f[1u].1D(2n,[81])}},di:u(e){if(k.N.1R){if(k.N.2h!=S)k.N.1R.K(k.N.2h||0).3l=\'\';k.N.1R.K(k.N.2h||0).3l=\'\';k.N.2h=T(q.5C(\'8K\'))||0;k.N.1R.K(k.N.2h||0).3l=k.N.1d.1f.7H}},dj:u(2k){1X.bH(k.N.2I);2k=2k||k.2k.gS(1X.2k);2k.aP();2k.aW();D 1d=k.N.aY(k.N.1d);D 3M=q.5C(\'4I\');k.N.1d.2y=1d.3j+3M+k.N.1d.1f.3N+1d.66;k.N.4y=q.5C(\'4I\');k.N.6J(k.N.1d,1d.3j.1g+3M.1g+k.N.1d.1f.3N.1g,1d.3j.1g+3M.1g+k.N.1d.1f.3N.1g);k.N.4w();if(k.N.1d.1f.68){4u=T(q.5C(\'8K\'))||0;k.N.8Q(k.N.1d,k.N.1d.1f.4e.K(4u),\'68\')}E I},eJ:u(e){3K=e.7L||e.7K||-1;if(/13|27|35|36|38|40/.48(3K)&&k.N.1R){if(1X.2k){1X.2k.bT=1b;1X.2k.c0=I}P{e.aP();e.aW()}E I}},2r:u(M){if(!M.aN||!k.1a){E}if(!k.N.1c){if(k.3a.4t){k(\'2e\',1h).1S(\'<3A 14="19:1o;Y:1P;5E:9n:9w.9y.cC(1G=0);" id="ds" 2J="ek:I;" ej="0" ep="cD"></3A>\');k.N.3A=k(\'#ds\')}k(\'2e\',1h).1S(\'<22 id="dr" 14="Y: 1P; Q: 0; O: 0; z-cZ: h3; 19: 1o;"><9h 14="6w: 0;8F: 0; h1-14: 1o; z-cZ: h0;">&7k;</9h></22>\');k.N.1c=k(\'#dr\');k.N.8R=k(\'9h\',k.N.1c)}E q.1E(u(){if(q.4Y!=\'ch\'&&q.5C(\'1u\')!=\'3g\')E;q.1f={};q.1f.aN=M.aN;q.1f.aL=18.3S(T(M.aL)||1);q.1f.aM=M.aM?M.aM:\'\';q.1f.7H=M.7H?M.7H:\'\';q.1f.68=M.68&&M.68.1K==2A?M.68:S;q.1f.2Y=M.2Y&&M.2Y.1K==2A?M.2Y:S;q.1f.3i=M.3i&&M.3i.1K==2A?M.3i:S;q.1f.7J=M.7J&&M.7J.1K==2A?M.7J:S;q.1f.bV=M.bV||I;q.1f.aQ=M.aQ||I;q.1f.3N=q.1f.aQ?(M.3N||\', \'):\'\';q.1f.aU=M.aU?1b:I;q.1f.54=18.3S(T(M.54)||aC);if(M.fx&&M.fx.1K==7M){if(!M.fx.1u||!/c6|1z|a7/.48(M.fx.1u)){M.fx.1u=\'1z\'}if(M.fx.1u==\'1z\'&&!k.fx.1z)E;if(M.fx.1u==\'a7\'&&!k.fx.61)E;M.fx.1m=18.3S(T(M.fx.1m)||8J);if(M.fx.1m>q.1f.54){M.fx.1m=q.1f.54-2a}q.1f.fx=M.fx}q.1f.4e=S;q.1f.9x=I;k(q).1p(\'bU\',\'eN\').6K(u(){k.N.1d=q;k.N.4y=q.2y}).dH(k.N.eJ).6y(k.N.bU).5B(u(){k.N.2I=1X.9T(k.N.4w,hM)})})}};k.fn.hR=k.N.2r;k.1y={2I:S,4Q:S,29:S,2D:10,26:u(el,4J,2D,eG){k.1y.4Q=el;k.1y.29=4J;k.1y.2D=T(2D)||10;k.1y.2I=1X.6V(k.1y.eF,T(eG)||40)},eF:u(){24(i=0;i<k.1y.29.1g;i++){if(!k.1y.29[i].2X){k.1y.29[i].2X=k.23(k.1a.7G(k.1y.29[i]),k.1a.74(k.1y.29[i]),k.1a.6z(k.1y.29[i]))}P{k.1y.29[i].2X.t=k.1y.29[i].3d;k.1y.29[i].2X.l=k.1y.29[i].3c}if(k.1y.4Q.A&&k.1y.4Q.A.7q==1b){69={x:k.1y.4Q.A.2v,y:k.1y.4Q.A.2q,1C:k.1y.4Q.A.1B.1C,hb:k.1y.4Q.A.1B.hb}}P{69=k.23(k.1a.7G(k.1y.4Q),k.1a.74(k.1y.4Q))}if(k.1y.29[i].2X.t>0&&k.1y.29[i].2X.y+k.1y.29[i].2X.t>69.y){k.1y.29[i].3d-=k.1y.2D}P if(k.1y.29[i].2X.t<=k.1y.29[i].2X.h&&k.1y.29[i].2X.t+k.1y.29[i].2X.hb<69.y+69.hb){k.1y.29[i].3d+=k.1y.2D}if(k.1y.29[i].2X.l>0&&k.1y.29[i].2X.x+k.1y.29[i].2X.l>69.x){k.1y.29[i].3c-=k.1y.2D}P if(k.1y.29[i].2X.l<=k.1y.29[i].2X.hP&&k.1y.29[i].2X.l+k.1y.29[i].2X.1C<69.x+69.1C){k.1y.29[i].3c+=k.1y.2D}}},8o:u(){1X.5T(k.1y.2I);k.1y.4Q=S;k.1y.29=S;24(i in k.1y.29){k.1y.29[i].2X=S}}};k.11={1c:S,F:S,4U:u(){E q.1E(u(){if(q.9I){q.A.5e.3q(\'5v\',k.11.bN);q.A=S;q.9I=I;if(k.3a.4t){q.bE="eN"}P{q.14.hq=\'\';q.14.e1=\'\';q.14.e7=\'\'}}})},bN:u(e){if(k.11.F!=S){k.11.9A(e);E I}D C=q.3U;k(1h).1J(\'3D\',k.11.bX).1J(\'5P\',k.11.9A);C.A.1s=k.1a.4a(e);C.A.4B=C.A.1s;C.A.7q=I;C.A.ho=q!=q.3U;k.11.F=C;if(C.A.5i&&q!=q.3U){bS=k.1a.3w(C.31);bQ=k.1a.2o(C);bR={x:T(k.B(C,\'O\'))||0,y:T(k.B(C,\'Q\'))||0};dx=C.A.4B.x-bS.x-bQ.1C/2-bR.x;dy=C.A.4B.y-bS.y-bQ.hb/2-bR.y;k.3b.5c(C,[dx,dy])}E k.7n||I},ea:u(e){D C=k.11.F;C.A.7q=1b;D 9G=C.14;C.A.7V=k.B(C,\'19\');C.A.4n=k.B(C,\'Y\');if(!C.A.cz)C.A.cz=C.A.4n;C.A.2c={x:T(k.B(C,\'O\'))||0,y:T(k.B(C,\'Q\'))||0};C.A.9B=0;C.A.ai=0;if(k.3a.4t){D bW=k.1a.6U(C,1b);C.A.9B=bW.l||0;C.A.ai=bW.t||0}C.A.1B=k.23(k.1a.3w(C),k.1a.2o(C));if(C.A.4n!=\'2s\'&&C.A.4n!=\'1P\'){9G.Y=\'2s\'}k.11.1c.5o();D 5g=C.fI(1b);k(5g).B({19:\'2B\',O:\'2P\',Q:\'2P\'});5g.14.5K=\'0\';5g.14.5z=\'0\';5g.14.5k=\'0\';5g.14.5j=\'0\';k.11.1c.1S(5g);D 3Y=k.11.1c.K(0).14;if(C.A.bD){3Y.Z=\'9F\';3Y.W=\'9F\'}P{3Y.W=C.A.1B.hb+\'U\';3Y.Z=C.A.1B.1C+\'U\'}3Y.19=\'2B\';3Y.5K=\'2P\';3Y.5z=\'2P\';3Y.5k=\'2P\';3Y.5j=\'2P\';k.23(C.A.1B,k.1a.2o(5g));if(C.A.2V){if(C.A.2V.O){C.A.2c.x+=C.A.1s.x-C.A.1B.x-C.A.2V.O;C.A.1B.x=C.A.1s.x-C.A.2V.O}if(C.A.2V.Q){C.A.2c.y+=C.A.1s.y-C.A.1B.y-C.A.2V.Q;C.A.1B.y=C.A.1s.y-C.A.2V.Q}if(C.A.2V.2L){C.A.2c.x+=C.A.1s.x-C.A.1B.x-C.A.1B.hb+C.A.2V.2L;C.A.1B.x=C.A.1s.x-C.A.1B.1C+C.A.2V.2L}if(C.A.2V.4D){C.A.2c.y+=C.A.1s.y-C.A.1B.y-C.A.1B.hb+C.A.2V.4D;C.A.1B.y=C.A.1s.y-C.A.1B.hb+C.A.2V.4D}}C.A.2v=C.A.2c.x;C.A.2q=C.A.2c.y;if(C.A.8s||C.A.2p==\'94\'){8U=k.1a.6U(C.31,1b);C.A.1B.x=C.8t+(k.3a.4t?0:k.3a.7I?-8U.l:8U.l);C.A.1B.y=C.8G+(k.3a.4t?0:k.3a.7I?-8U.t:8U.t);k(C.31).1S(k.11.1c.K(0))}if(C.A.2p){k.11.c5(C);C.A.5t.2p=k.11.ce}if(C.A.5i){k.3b.ct(C)}3Y.O=C.A.1B.x-C.A.9B+\'U\';3Y.Q=C.A.1B.y-C.A.ai+\'U\';3Y.Z=C.A.1B.1C+\'U\';3Y.W=C.A.1B.hb+\'U\';k.11.F.A.9E=I;if(C.A.gx){C.A.5t.6a=k.11.c7}if(C.A.3I!=I){k.11.1c.B(\'3I\',C.A.3I)}if(C.A.1G){k.11.1c.B(\'1G\',C.A.1G);if(1X.71){k.11.1c.B(\'5E\',\'8V(1G=\'+C.A.1G*2a+\')\')}}if(C.A.7O){k.11.1c.2R(C.A.7O);k.11.1c.K(0).7c.14.19=\'1o\'}if(C.A.4o)C.A.4o.1D(C,[5g,C.A.2c.x,C.A.2c.y]);if(k.1x&&k.1x.8D>0){k.1x.ed(C)}if(C.A.46==I){9G.19=\'1o\'}E I},c5:u(C){if(C.A.2p.1K==b0){if(C.A.2p==\'94\'){C.A.28=k.23({x:0,y:0},k.1a.2o(C.31));D 8S=k.1a.6U(C.31,1b);C.A.28.w=C.A.28.1C-8S.l-8S.r;C.A.28.h=C.A.28.hb-8S.t-8S.b}P if(C.A.2p==\'1h\'){D bY=k.1a.bm();C.A.28={x:0,y:0,w:bY.w,h:bY.h}}}P if(C.A.2p.1K==7F){C.A.28={x:T(C.A.2p[0])||0,y:T(C.A.2p[1])||0,w:T(C.A.2p[2])||0,h:T(C.A.2p[3])||0}}C.A.28.dx=C.A.28.x-C.A.1B.x;C.A.28.dy=C.A.28.y-C.A.1B.y},9H:u(F){if(F.A.8s||F.A.2p==\'94\'){k(\'2e\',1h).1S(k.11.1c.K(0))}k.11.1c.5o().2G().B(\'1G\',1);if(1X.71){k.11.1c.B(\'5E\',\'8V(1G=2a)\')}},9A:u(e){k(1h).3q(\'3D\',k.11.bX).3q(\'5P\',k.11.9A);if(k.11.F==S){E}D F=k.11.F;k.11.F=S;if(F.A.7q==I){E I}if(F.A.44==1b){k(F).B(\'Y\',F.A.4n)}D 9G=F.14;if(F.5i){k.11.1c.B(\'9b\',\'8j\')}if(F.A.7O){k.11.1c.4i(F.A.7O)}if(F.A.6N==I){if(F.A.fx>0){if(!F.A.1O||F.A.1O==\'4j\'){D x=12 k.fx(F,{1m:F.A.fx},\'O\');x.1L(F.A.2c.x,F.A.8y)}if(!F.A.1O||F.A.1O==\'49\'){D y=12 k.fx(F,{1m:F.A.fx},\'Q\');y.1L(F.A.2c.y,F.A.8v)}}P{if(!F.A.1O||F.A.1O==\'4j\')F.14.O=F.A.8y+\'U\';if(!F.A.1O||F.A.1O==\'49\')F.14.Q=F.A.8v+\'U\'}k.11.9H(F);if(F.A.46==I){k(F).B(\'19\',F.A.7V)}}P if(F.A.fx>0){F.A.9E=1b;D dh=I;if(k.1x&&k.1t&&F.A.44){dh=k.1a.3w(k.1t.1c.K(0))}k.11.1c.5w({O:dh?dh.x:F.A.1B.x,Q:dh?dh.y:F.A.1B.y},F.A.fx,u(){F.A.9E=I;if(F.A.46==I){F.14.19=F.A.7V}k.11.9H(F)})}P{k.11.9H(F);if(F.A.46==I){k(F).B(\'19\',F.A.7V)}}if(k.1x&&k.1x.8D>0){k.1x.eO(F)}if(k.1t&&F.A.44){k.1t.fC(F)}if(F.A.2Z&&(F.A.8y!=F.A.2c.x||F.A.8v!=F.A.2c.y)){F.A.2Z.1D(F,F.A.b3||[0,0,F.A.8y,F.A.8v])}if(F.A.3T)F.A.3T.1D(F);E I},c7:u(x,y,dx,dy){if(dx!=0)dx=T((dx+(q.A.gx*dx/18.3S(dx))/2)/q.A.gx)*q.A.gx;if(dy!=0)dy=T((dy+(q.A.gy*dy/18.3S(dy))/2)/q.A.gy)*q.A.gy;E{dx:dx,dy:dy,x:0,y:0}},ce:u(x,y,dx,dy){dx=18.3L(18.3r(dx,q.A.28.dx),q.A.28.w+q.A.28.dx-q.A.1B.1C);dy=18.3L(18.3r(dy,q.A.28.dy),q.A.28.h+q.A.28.dy-q.A.1B.hb);E{dx:dx,dy:dy,x:0,y:0}},bX:u(e){if(k.11.F==S||k.11.F.A.9E==1b){E}D F=k.11.F;F.A.4B=k.1a.4a(e);if(F.A.7q==I){45=18.ez(18.6b(F.A.1s.x-F.A.4B.x,2)+18.6b(F.A.1s.y-F.A.4B.y,2));if(45<F.A.6M){E}P{k.11.ea(e)}}D dx=F.A.4B.x-F.A.1s.x;D dy=F.A.4B.y-F.A.1s.y;24(D i in F.A.5t){D 3y=F.A.5t[i].1D(F,[F.A.2c.x+dx,F.A.2c.y+dy,dx,dy]);if(3y&&3y.1K==7M){dx=i!=\'7R\'?3y.dx:(3y.x-F.A.2c.x);dy=i!=\'7R\'?3y.dy:(3y.y-F.A.2c.y)}}F.A.2v=F.A.1B.x+dx-F.A.9B;F.A.2q=F.A.1B.y+dy-F.A.ai;if(F.A.5i&&(F.A.3H||F.A.2Z)){k.3b.3H(F,F.A.2v,F.A.2q)}if(F.A.4m)F.A.4m.1D(F,[F.A.2c.x+dx,F.A.2c.y+dy]);if(!F.A.1O||F.A.1O==\'4j\'){F.A.8y=F.A.2c.x+dx;k.11.1c.K(0).14.O=F.A.2v+\'U\'}if(!F.A.1O||F.A.1O==\'49\'){F.A.8v=F.A.2c.y+dy;k.11.1c.K(0).14.Q=F.A.2q+\'U\'}if(k.1x&&k.1x.8D>0){k.1x.al(F)}E I},2r:u(o){if(!k.11.1c){k(\'2e\',1h).1S(\'<22 id="e8"></22>\');k.11.1c=k(\'#e8\');D el=k.11.1c.K(0);D 4J=el.14;4J.Y=\'1P\';4J.19=\'1o\';4J.9b=\'8j\';4J.eu=\'1o\';4J.2U=\'2K\';if(1X.71){el.bE="e4"}P{4J.gi=\'1o\';4J.e7=\'1o\';4J.e1=\'1o\'}}if(!o){o={}}E q.1E(u(){if(q.9I||!k.1a)E;if(1X.71){q.gh=u(){E I};q.gj=u(){E I}}D el=q;D 5e=o.3v?k(q).gf(o.3v):k(q);if(k.3a.4t){5e.1E(u(){q.bE="e4"})}P{5e.B(\'-gI-7R-8C\',\'1o\');5e.B(\'7R-8C\',\'1o\');5e.B(\'-gH-7R-8C\',\'1o\')}q.A={5e:5e,6N:o.6N?1b:I,46:o.46?1b:I,44:o.44?o.44:I,5i:o.5i?o.5i:I,8s:o.8s?o.8s:I,3I:o.3I?T(o.3I)||0:I,1G:o.1G?2m(o.1G):I,fx:T(o.fx)||S,6R:o.6R?o.6R:I,5t:{},1s:{},4o:o.4o&&o.4o.1K==2A?o.4o:I,3T:o.3T&&o.3T.1K==2A?o.3T:I,2Z:o.2Z&&o.2Z.1K==2A?o.2Z:I,1O:/49|4j/.48(o.1O)?o.1O:I,6M:o.6M?T(o.6M)||0:0,2V:o.2V?o.2V:I,bD:o.bD?1b:I,7O:o.7O||I};if(o.5t&&o.5t.1K==2A)q.A.5t.7R=o.5t;if(o.4m&&o.4m.1K==2A)q.A.4m=o.4m;if(o.2p&&((o.2p.1K==b0&&(o.2p==\'94\'||o.2p==\'1h\'))||(o.2p.1K==7F&&o.2p.1g==4))){q.A.2p=o.2p}if(o.2O){q.A.2O=o.2O}if(o.6a){if(2g o.6a==\'gz\'){q.A.gx=T(o.6a)||1;q.A.gy=T(o.6a)||1}P if(o.6a.1g==2){q.A.gx=T(o.6a[0])||1;q.A.gy=T(o.6a[1])||1}}if(o.3H&&o.3H.1K==2A){q.A.3H=o.3H}q.9I=1b;5e.1E(u(){q.3U=el});5e.1J(\'5v\',k.11.bN)})}};k.fn.23({aS:k.11.4U,7t:k.11.2r});k.1x={du:u(5J,5G,7Q,7S){E 5J<=k.11.F.A.2v&&(5J+7Q)>=(k.11.F.A.2v+k.11.F.A.1B.w)&&5G<=k.11.F.A.2q&&(5G+7S)>=(k.11.F.A.2q+k.11.F.A.1B.h)?1b:I},cV:u(5J,5G,7Q,7S){E!(5J>(k.11.F.A.2v+k.11.F.A.1B.w)||(5J+7Q)<k.11.F.A.2v||5G>(k.11.F.A.2q+k.11.F.A.1B.h)||(5G+7S)<k.11.F.A.2q)?1b:I},1s:u(5J,5G,7Q,7S){E 5J<k.11.F.A.4B.x&&(5J+7Q)>k.11.F.A.4B.x&&5G<k.11.F.A.4B.y&&(5G+7S)>k.11.F.A.4B.y?1b:I},5r:I,3Q:{},8D:0,3P:{},ed:u(C){if(k.11.F==S){E}D i;k.1x.3Q={};D bJ=I;24(i in k.1x.3P){if(k.1x.3P[i]!=S){D 1j=k.1x.3P[i].K(0);if(k(k.11.F).is(\'.\'+1j.1i.a)){if(1j.1i.m==I){1j.1i.p=k.23(k.1a.7G(1j),k.1a.74(1j));1j.1i.m=1b}if(1j.1i.ac){k.1x.3P[i].2R(1j.1i.ac)}k.1x.3Q[i]=k.1x.3P[i];if(k.1t&&1j.1i.s&&k.11.F.A.44){1j.1i.el=k(\'.\'+1j.1i.a,1j);C.14.19=\'1o\';k.1t.cT(1j);1j.1i.ay=k.1t.8x(k.1p(1j,\'id\')).7l;C.14.19=C.A.7V;bJ=1b}if(1j.1i.9i){1j.1i.9i.1D(k.1x.3P[i].K(0),[k.11.F])}}}}if(bJ){k.1t.26()}},dS:u(){k.1x.3Q={};24(i in k.1x.3P){if(k.1x.3P[i]!=S){D 1j=k.1x.3P[i].K(0);if(k(k.11.F).is(\'.\'+1j.1i.a)){1j.1i.p=k.23(k.1a.7G(1j),k.1a.74(1j));if(1j.1i.ac){k.1x.3P[i].2R(1j.1i.ac)}k.1x.3Q[i]=k.1x.3P[i];if(k.1t&&1j.1i.s&&k.11.F.A.44){1j.1i.el=k(\'.\'+1j.1i.a,1j);C.14.19=\'1o\';k.1t.cT(1j);C.14.19=C.A.7V}}}}},al:u(e){if(k.11.F==S){E}k.1x.5r=I;D i;D bK=I;D eQ=0;24(i in k.1x.3Q){D 1j=k.1x.3Q[i].K(0);if(k.1x.5r==I&&k.1x[1j.1i.t](1j.1i.p.x,1j.1i.p.y,1j.1i.p.1C,1j.1i.p.hb)){if(1j.1i.hc&&1j.1i.h==I){k.1x.3Q[i].2R(1j.1i.hc)}if(1j.1i.h==I&&1j.1i.7x){bK=1b}1j.1i.h=1b;k.1x.5r=1j;if(k.1t&&1j.1i.s&&k.11.F.A.44){k.1t.1c.K(0).3l=1j.1i.eV;k.1t.al(1j)}eQ++}P if(1j.1i.h==1b){if(1j.1i.7y){1j.1i.7y.1D(1j,[e,k.11.1c.K(0).7c,1j.1i.fx])}if(1j.1i.hc){k.1x.3Q[i].4i(1j.1i.hc)}1j.1i.h=I}}if(k.1t&&!k.1x.5r&&k.11.F.44){k.1t.1c.K(0).14.19=\'1o\'}if(bK){k.1x.5r.1i.7x.1D(k.1x.5r,[e,k.11.1c.K(0).7c])}},eO:u(e){D i;24(i in k.1x.3Q){D 1j=k.1x.3Q[i].K(0);if(1j.1i.ac){k.1x.3Q[i].4i(1j.1i.ac)}if(1j.1i.hc){k.1x.3Q[i].4i(1j.1i.hc)}if(1j.1i.s){k.1t.7s[k.1t.7s.1g]=i}if(1j.1i.9l&&1j.1i.h==1b){1j.1i.h=I;1j.1i.9l.1D(1j,[e,1j.1i.fx])}1j.1i.m=I;1j.1i.h=I}k.1x.3Q={}},4U:u(){E q.1E(u(){if(q.9j){if(q.1i.s){id=k.1p(q,\'id\');k.1t.5L[id]=S;k(\'.\'+q.1i.a,q).aS()}k.1x.3P[\'d\'+q.c2]=S;q.9j=I;q.f=S}})},2r:u(o){E q.1E(u(){if(q.9j==1b||!o.3C||!k.1a||!k.11){E}q.1i={a:o.3C,ac:o.9J||I,hc:o.a5||I,eV:o.58||I,9l:o.gq||o.9l||I,7x:o.7x||o.dC||I,7y:o.7y||o.fO||I,9i:o.9i||I,t:o.6I&&(o.6I==\'du\'||o.6I==\'cV\')?o.6I:\'1s\',fx:o.fx?o.fx:I,m:I,h:I};if(o.cQ==1b&&k.1t){id=k.1p(q,\'id\');k.1t.5L[id]=q.1i.a;q.1i.s=1b;if(o.2Z){q.1i.2Z=o.2Z;q.1i.ay=k.1t.8x(id).7l}}q.9j=1b;q.c2=T(18.6o()*c9);k.1x.3P[\'d\'+q.c2]=k(q);k.1x.8D++})}};k.fn.23({dR:k.1x.4U,do:k.1x.2r});k.gD=k.1x.dS;k.3B={1c:S,8L:u(){3g=q.2y;if(!3g)E;14={dz:k(q).B(\'dz\')||\'\',4A:k(q).B(\'4A\')||\'\',8Z:k(q).B(\'8Z\')||\'\',dP:k(q).B(\'dP\')||\'\',dT:k(q).B(\'dT\')||\'\',dU:k(q).B(\'dU\')||\'\',c3:k(q).B(\'c3\')||\'\',dY:k(q).B(\'dY\')||\'\'};k.3B.1c.B(14);3x=k.3B.dX(3g);3x=3x.4E(12 bb("\\\\n","g"),"<br />");k.3B.1c.3x(\'gL\');ci=k.3B.1c.K(0).4c;k.3B.1c.3x(3x);Z=k.3B.1c.K(0).4c+ci;if(q.6l.2M&&Z>q.6l.2M[0]){Z=q.6l.2M[0]}q.14.Z=Z+\'U\';if(q.4Y==\'cf\'){W=k.3B.1c.K(0).5W+ci;if(q.6l.2M&&W>q.6l.2M[1]){W=q.6l.2M[1]}q.14.W=W+\'U\'}},dX:u(3g){cg={\'&\':\'&gK;\',\'<\':\'&gJ;\',\'>\':\'&gt;\',\'"\':\'&gs;\'};24(i in cg){3g=3g.4E(12 bb(i,\'g\'),cg[i])}E 3g},2r:u(2M){if(k.3B.1c==S){k(\'2e\',1h).1S(\'<22 id="dE" 14="Y: 1P; Q: 0; O: 0; 3n: 2K;"></22>\');k.3B.1c=k(\'#dE\')}E q.1E(u(){if(/cf|ch/.48(q.4Y)){if(q.4Y==\'ch\'){dB=q.5C(\'1u\');if(!/3g|gr/.48(dB)){E}}if(2M&&(2M.1K==bn||(2M.1K==7F&&2M.1g==2))){if(2M.1K==bn)2M=[2M,2M];P{2M[0]=T(2M[0])||8J;2M[1]=T(2M[1])||8J}q.6l={2M:2M}}k(q).5B(k.3B.8L).6y(k.3B.8L).dH(k.3B.8L);k.3B.8L.1D(q)}})}};k.fn.kc=k.3B.2r;k.4K=u(e){if(/^kd$|^ke$|^ka$|^6L$|^k9$|^k5$|^k4$|^k6$|^k7$|^2e$|^k8$|^kf$|^kg$|^kn$|^ko$|^kp$|^kq$/i.48(e.9N))E I;P E 1b};k.fx.a0=u(e,65){D c=e.7c;D cs=c.14;cs.Y=65.Y;cs.5K=65.3G.t;cs.5j=65.3G.l;cs.5k=65.3G.b;cs.5z=65.3G.r;cs.Q=65.Q+\'U\';cs.O=65.O+\'U\';e.31.ew(c,e);e.31.km(e)};k.fx.9P=u(e){if(!k.4K(e))E I;D t=k(e);D es=e.14;D 73=I;if(t.B(\'19\')==\'1o\'){5Y=t.B(\'3n\');t.B(\'3n\',\'2K\').1Y();73=1b}D V={};V.Y=t.B(\'Y\');V.1q=k.1a.2o(e);V.3G=k.1a.cy(e);D co=e.4Z?e.4Z.ei:t.B(\'hU\');V.Q=T(t.B(\'Q\'))||0;V.O=T(t.B(\'O\'))||0;D eo=\'kl\'+T(18.6o()*c9);D 6u=1h.3F(/^1T$|^br$|^kh$|^hr$|^8C$|^kj$|^8T$|^3A$|^kk$|^k3$|^k2$|^9h$|^dl$|^jM$/i.48(e.9N)?\'22\':e.9N);k.1p(6u,\'id\',eo);D jN=k(6u).2R(\'jO\');D 4h=6u.14;D Q=0;D O=0;if(V.Y==\'2s\'||V.Y==\'1P\'){Q=V.Q;O=V.O}4h.Q=Q+\'U\';4h.O=O+\'U\';4h.Y=V.Y!=\'2s\'&&V.Y!=\'1P\'?\'2s\':V.Y;4h.W=V.1q.hb+\'U\';4h.Z=V.1q.1C+\'U\';4h.5K=V.3G.t;4h.5z=V.3G.r;4h.5k=V.3G.b;4h.5j=V.3G.l;4h.2U=\'2K\';if(k.3a.4t){4h.ei=co}P{4h.jK=co}if(k.3a=="4t"){es.5E="8V(1G="+0.ex*2a+")"}es.1G=0.ex;e.31.ew(6u,e);6u.jF(e);es.5K=\'2P\';es.5z=\'2P\';es.5k=\'2P\';es.5j=\'2P\';es.Y=\'1P\';es.eu=\'1o\';es.Q=\'2P\';es.O=\'2P\';if(73){t.2G();es.3n=5Y}E{V:V,3p:k(6u)}};k.fx.8E={jE:[0,1V,1V],jG:[eD,1V,1V],jH:[e6,e6,jI],jP:[0,0,0],ks:[0,0,1V],jY:[dv,42,42],jZ:[0,1V,1V],k0:[0,0,7w],k1:[0,7w,7w],jX:[cn,cn,cn],jS:[0,2a,0],jR:[jT,jU,eb],jV:[7w,0,7w],kr:[85,eb,47],kP:[1V,eA,0],kN:[kO,50,kx],kF:[7w,0,0],kD:[ku,f8,kt],ky:[kH,0,9C],kL:[1V,0,1V],kM:[1V,kJ,0],kv:[0,6C,0],kA:[75,0,kE],kC:[eD,eB,eA],kG:[kI,kB,eB],kw:[e0,1V,1V],kz:[eL,kK,eL],kQ:[9C,9C,9C],jC:[1V,iy,iz],iA:[1V,1V,e0],iB:[0,1V,0],ix:[1V,0,1V],iv:[6C,0,0],iq:[0,0,6C],ip:[6C,6C,0],ir:[1V,dv,0],it:[1V,ah,iu],iC:[6C,0,6C],iD:[1V,0,0],iK:[ah,ah,ah],iL:[1V,1V,1V],iM:[1V,1V,0]};k.fx.6D=u(4x,dm){if(k.fx.8E[4x])E{r:k.fx.8E[4x][0],g:k.fx.8E[4x][1],b:k.fx.8E[4x][2]};P if(2W=/^6Y\\(\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*,\\s*([0-9]{1,3})\\s*\\)$/.a4(4x))E{r:T(2W[1]),g:T(2W[2]),b:T(2W[3])};P if(2W=/6Y\\(\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*,\\s*([0-9]+(?:\\.[0-9]+)?)\\%\\s*\\)$/.a4(4x))E{r:2m(2W[1])*2.55,g:2m(2W[2])*2.55,b:2m(2W[3])*2.55};P if(2W=/^#([a-fA-79-9])([a-fA-79-9])([a-fA-79-9])$/.a4(4x))E{r:T("77"+2W[1]+2W[1]),g:T("77"+2W[2]+2W[2]),b:T("77"+2W[3]+2W[3])};P if(2W=/^#([a-fA-79-9]{2})([a-fA-79-9]{2})([a-fA-79-9]{2})$/.a4(4x))E{r:T("77"+2W[1]),g:T("77"+2W[2]),b:T("77"+2W[3])};P E dm==1b?I:{r:1V,g:1V,b:1V}};k.fx.dD={5Q:1,5b:1,5O:1,4S:1,4D:1,4A:1,W:1,O:1,c3:1,iI:1,5k:1,5j:1,5z:1,5K:1,8b:1,6x:1,8c:1,av:1,1G:1,iE:1,iF:1,5n:1,4X:1,5U:1,5M:1,2L:1,jD:1,Q:1,Z:1,3I:1};k.fx.dA={7i:1,iG:1,iH:1,io:1,im:1,4x:1,i2:1};k.fx.8A=[\'i3\',\'i4\',\'i5\',\'i1\'];k.fx.cc={\'cd\':[\'2E\',\'dK\'],\'a8\':[\'2E\',\'bh\'],\'6w\':[\'6w\',\'\'],\'8F\':[\'8F\',\'\']};k.fn.23({5w:u(5X,H,G,J){E q.1w(u(){D a1=k.H(H,G,J);D e=12 k.dM(q,a1,5X)})},c4:u(H,J){E q.1w(u(){D a1=k.H(H,J);D e=12 k.c4(q,a1)})},8o:u(2D){E q.1E(u(){if(q.6d)k.by(q,2D)})},i0:u(2D){E q.1E(u(){if(q.6d)k.by(q,2D);if(q.1w&&q.1w[\'fx\'])q.1w.fx=[]})}});k.23({c4:u(2f,M){D z=q,3t;z.2D=u(){if(k.fQ(M.21))M.21.1D(2f)};z.2I=6V(u(){z.2D()},M.1m);2f.6d=z},G:{c8:u(p,n,1W,1H,1m){E((-18.5H(p*18.2Q)/2)+0.5)*1H+1W}},dM:u(2f,M,5X){D z=q,3t;D y=2f.14;D fR=k.B(2f,"2U");D 72=k.B(2f,"19");D 2j={};z.9O=(12 7g()).7z();M.G=M.G&&k.G[M.G]?M.G:\'c8\';z.ag=u(2w,43){if(k.fx.dD[2w]){if(43==\'1Y\'||43==\'2G\'||43==\'3R\'){if(!2f.6v)2f.6v={};D r=2m(k.6E(2f,2w));2f.6v[2w]=r&&r>-c9?r:(2m(k.B(2f,2w))||0);43=43==\'3R\'?(72==\'1o\'?\'1Y\':\'2G\'):43;M[43]=1b;2j[2w]=43==\'1Y\'?[0,2f.6v[2w]]:[2f.6v[2w],0];if(2w!=\'1G\')y[2w]=2j[2w][0]+(2w!=\'3I\'&&2w!=\'8Z\'?\'U\':\'\');P k.1p(y,"1G",2j[2w][0])}P{2j[2w]=[2m(k.6E(2f,2w)),2m(43)||0]}}P if(k.fx.dA[2w])2j[2w]=[k.fx.6D(k.6E(2f,2w)),k.fx.6D(43)];P if(/^6w$|8F$|2E$|a8$|cd$/i.48(2w)){D m=43.4E(/\\s+/g,\' \').4E(/6Y\\s*\\(\\s*/g,\'6Y(\').4E(/\\s*,\\s*/g,\',\').4E(/\\s*\\)/g,\')\').d5(/([^\\s]+)/g);3m(2w){1e\'6w\':1e\'8F\':1e\'cd\':1e\'a8\':m[3]=m[3]||m[1]||m[0];m[2]=m[2]||m[0];m[1]=m[1]||m[0];24(D i=0;i<k.fx.8A.1g;i++){D 64=k.fx.cc[2w][0]+k.fx.8A[i]+k.fx.cc[2w][1];2j[64]=2w==\'a8\'?[k.fx.6D(k.6E(2f,64)),k.fx.6D(m[i])]:[2m(k.6E(2f,64)),2m(m[i])]}1r;1e\'2E\':24(D i=0;i<m.1g;i++){D bd=2m(m[i]);D a9=!hX(bd)?\'dK\':(!/cu|1o|2K|hY|hZ|i6|i7|ii|ij|ik|il/i.48(m[i])?\'bh\':I);if(a9){24(D j=0;j<k.fx.8A.1g;j++){64=\'2E\'+k.fx.8A[j]+a9;2j[64]=a9==\'bh\'?[k.fx.6D(k.6E(2f,64)),k.fx.6D(m[i])]:[2m(k.6E(2f,64)),bd]}}P{y[\'ie\']=m[i]}}1r}}P{y[2w]=43}E I};24(p in 5X){if(p==\'14\'){D 5f=k.bl(5X[p]);24(7A in 5f){q.ag(7A,5f[7A])}}P if(p==\'3l\'){if(1h.af)24(D i=0;i<1h.af.1g;i++){D 7e=1h.af[i].7e||1h.af[i].i9||S;if(7e){24(D j=0;j<7e.1g;j++){if(7e[j].i8==\'.\'+5X[p]){D 6X=12 bb(\'\\.\'+5X[p]+\' {\');D 5Z=7e[j].14.9X;D 5f=k.bl(5Z.4E(6X,\'\').4E(/}/g,\'\'));24(7A in 5f){q.ag(7A,5f[7A])}}}}}}P{q.ag(p,5X[p])}}y.19=72==\'1o\'?\'2B\':72;y.2U=\'2K\';z.2D=u(){D t=(12 7g()).7z();if(t>M.1m+z.9O){5T(z.2I);z.2I=S;24(p in 2j){if(p=="1G")k.1p(y,"1G",2j[p][1]);P if(2g 2j[p][1]==\'8T\')y[p]=\'6Y(\'+2j[p][1].r+\',\'+2j[p][1].g+\',\'+2j[p][1].b+\')\';P y[p]=2j[p][1]+(p!=\'3I\'&&p!=\'8Z\'?\'U\':\'\')}if(M.2G||M.1Y)24(D p in 2f.6v)if(p=="1G")k.1p(y,p,2f.6v[p]);P y[p]="";y.19=M.2G?\'1o\':(72!=\'1o\'?72:\'2B\');y.2U=fR;2f.6d=S;if(k.fQ(M.21))M.21.1D(2f)}P{D n=t-q.9O;D 8w=n/M.1m;24(p in 2j){if(2g 2j[p][1]==\'8T\'){y[p]=\'6Y(\'+T(k.G[M.G](8w,n,2j[p][0].r,(2j[p][1].r-2j[p][0].r),M.1m))+\',\'+T(k.G[M.G](8w,n,2j[p][0].g,(2j[p][1].g-2j[p][0].g),M.1m))+\',\'+T(k.G[M.G](8w,n,2j[p][0].b,(2j[p][1].b-2j[p][0].b),M.1m))+\')\'}P{D bz=k.G[M.G](8w,n,2j[p][0],(2j[p][1]-2j[p][0]),M.1m);if(p=="1G")k.1p(y,"1G",bz);P y[p]=bz+(p!=\'3I\'&&p!=\'8Z\'?\'U\':\'\')}}}};z.2I=6V(u(){z.2D()},13);2f.6d=z},by:u(2f,2D){if(2D)2f.6d.9O-=iO;P{1X.5T(2f.6d.2I);2f.6d=S;k.2H(2f,"fx")}}});k.bl=u(5Z){D 5f={};if(2g 5Z==\'4V\'){5Z=5Z.6c().7C(\';\');24(D i=0;i<5Z.1g;i++){6X=5Z[i].7C(\':\');if(6X.1g==2){5f[k.g6(6X[0].4E(/\\-(\\w)/g,u(m,c){E c.jo()}))]=k.g6(6X[1])}}}E 5f};k.fn.23({g3:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.61(q,H,J,\'4F\',G)})},gb:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.61(q,H,J,\'4r\',G)})},jl:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.61(q,H,J,\'fJ\',G)})},jk:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.61(q,H,J,\'O\',G)})},jg:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.61(q,H,J,\'2L\',G)})},jf:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.61(q,H,J,\'fh\',G)})}});k.fx.61=u(e,H,J,2S,G){if(!k.4K(e)){k.2H(e,\'1n\');E I}D z=q;z.el=k(e);z.1N=k.1a.2o(e);z.G=2g J==\'4V\'?J:G||S;if(!e.4s)e.4s=z.el.B(\'19\');if(2S==\'fJ\'){2S=z.el.B(\'19\')==\'1o\'?\'4r\':\'4F\'}P if(2S==\'fh\'){2S=z.el.B(\'19\')==\'1o\'?\'2L\':\'O\'}z.el.1Y();z.H=H;z.J=2g J==\'u\'?J:S;z.fx=k.fx.9P(e);z.2S=2S;z.21=u(){if(z.J&&z.J.1K==2A){z.J.1D(z.el.K(0))}if(z.2S==\'4r\'||z.2S==\'2L\'){z.el.B(\'19\',z.el.K(0).4s==\'1o\'?\'2B\':z.el.K(0).4s)}P{z.el.2G()}k.fx.a0(z.fx.3p.K(0),z.fx.V);k.2H(z.el.K(0),\'1n\')};3m(z.2S){1e\'4F\':63=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,z.21),\'W\');63.1L(z.fx.V.1q.hb,0);1r;1e\'4r\':z.fx.3p.B(\'W\',\'9R\');z.el.1Y();63=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,z.21),\'W\');63.1L(0,z.fx.V.1q.hb);1r;1e\'O\':63=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,z.21),\'Z\');63.1L(z.fx.V.1q.1C,0);1r;1e\'2L\':z.fx.3p.B(\'Z\',\'9R\');z.el.1Y();63=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,z.21),\'Z\');63.1L(0,z.fx.V.1q.1C);1r}};k.fn.ji=u(5D,J){E q.1w(\'1n\',u(){if(!k.4K(q)){k.2H(q,\'1n\');E I}D e=12 k.fx.f4(q,5D,J);e.bp()})};k.fx.f4=u(e,5D,J){D z=q;z.el=k(e);z.el.1Y();z.J=J;z.5D=T(5D)||40;z.V={};z.V.Y=z.el.B(\'Y\');z.V.Q=T(z.el.B(\'Q\'))||0;z.V.O=T(z.el.B(\'O\'))||0;if(z.V.Y!=\'2s\'&&z.V.Y!=\'1P\'){z.el.B(\'Y\',\'2s\')}z.3V=5;z.5y=1;z.bp=u(){z.5y++;z.e=12 k.fx(z.el.K(0),{1m:jj,21:u(){z.e=12 k.fx(z.el.K(0),{1m:80,21:u(){z.5D=T(z.5D/2);if(z.5y<=z.3V)z.bp();P{z.el.B(\'Y\',z.V.Y).B(\'Q\',z.V.Q+\'U\').B(\'O\',z.V.O+\'U\');k.2H(z.el.K(0),\'1n\');if(z.J&&z.J.1K==2A){z.J.1D(z.el.K(0))}}}},\'Q\');z.e.1L(z.V.Q-z.5D,z.V.Q)}},\'Q\');z.e.1L(z.V.Q,z.V.Q-z.5D)}};k.fn.23({jy:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'4r\',\'4l\',G)})},jz:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'4r\',\'in\',G)})},jA:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'4r\',\'3R\',G)})},jB:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'4F\',\'4l\',G)})},jx:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'4F\',\'in\',G)})},jw:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'4F\',\'3R\',G)})},js:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'O\',\'4l\',G)})},jt:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'O\',\'in\',G)})},ju:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'O\',\'3R\',G)})},jv:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'2L\',\'4l\',G)})},je:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'2L\',\'in\',G)})},jd:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.4f(q,H,J,\'2L\',\'3R\',G)})}});k.fx.4f=u(e,H,J,2S,1u,G){if(!k.4K(e)){k.2H(e,\'1n\');E I}D z=q;z.el=k(e);z.G=2g J==\'4V\'?J:G||S;z.V={};z.V.Y=z.el.B(\'Y\');z.V.Q=z.el.B(\'Q\');z.V.O=z.el.B(\'O\');if(!e.4s)e.4s=z.el.B(\'19\');if(1u==\'3R\'){1u=z.el.B(\'19\')==\'1o\'?\'in\':\'4l\'}z.el.1Y();if(z.V.Y!=\'2s\'&&z.V.Y!=\'1P\'){z.el.B(\'Y\',\'2s\')}z.1u=1u;J=2g J==\'u\'?J:S;8H=1;3m(2S){1e\'4F\':z.e=12 k.fx(z.el.K(0),k.H(H-15,z.G,J),\'Q\');z.62=2m(z.V.Q)||0;z.9K=z.fG;8H=-1;1r;1e\'4r\':z.e=12 k.fx(z.el.K(0),k.H(H-15,z.G,J),\'Q\');z.62=2m(z.V.Q)||0;z.9K=z.fG;1r;1e\'2L\':z.e=12 k.fx(z.el.K(0),k.H(H-15,z.G,J),\'O\');z.62=2m(z.V.O)||0;z.9K=z.fy;1r;1e\'O\':z.e=12 k.fx(z.el.K(0),k.H(H-15,z.G,J),\'O\');z.62=2m(z.V.O)||0;z.9K=z.fy;8H=-1;1r}z.e2=12 k.fx(z.el.K(0),k.H(H,z.G,u(){z.el.B(z.V);if(z.1u==\'4l\'){z.el.B(\'19\',\'1o\')}P z.el.B(\'19\',z.el.K(0).4s==\'1o\'?\'2B\':z.el.K(0).4s);k.2H(z.el.K(0),\'1n\')}),\'1G\');if(1u==\'in\'){z.e.1L(z.62+2a*8H,z.62);z.e2.1L(0,1)}P{z.e.1L(z.62,z.62+2a*8H);z.e2.1L(1,0)}};k.fn.23({j0:u(H,W,J,G){E q.1w(\'1n\',u(){12 k.fx.9L(q,H,W,J,\'fp\',G)})},iW:u(H,W,J,G){E q.1w(\'1n\',u(){12 k.fx.9L(q,H,W,J,\'9M\',G)})},iV:u(H,W,J,G){E q.1w(\'1n\',u(){12 k.fx.9L(q,H,W,J,\'3R\',G)})}});k.fx.9L=u(e,H,W,J,1u,G){if(!k.4K(e)){k.2H(e,\'1n\');E I}D z=q;z.el=k(e);z.G=2g J==\'4V\'?J:G||S;z.J=2g J==\'u\'?J:S;if(1u==\'3R\'){1u=z.el.B(\'19\')==\'1o\'?\'9M\':\'fp\'}z.H=H;z.W=W&&W.1K==bn?W:20;z.fx=k.fx.9P(e);z.1u=1u;z.21=u(){if(z.J&&z.J.1K==2A){z.J.1D(z.el.K(0))}if(z.1u==\'9M\'){z.el.1Y()}P{z.el.2G()}k.fx.a0(z.fx.3p.K(0),z.fx.V);k.2H(z.el.K(0),\'1n\')};if(z.1u==\'9M\'){z.el.1Y();z.fx.3p.B(\'W\',z.W+\'U\').B(\'Z\',\'9R\');z.ef=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,u(){z.ef=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,z.21),\'W\');z.ef.1L(z.W,z.fx.V.1q.hb)}),\'Z\');z.ef.1L(0,z.fx.V.1q.1C)}P{z.ef=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,u(){z.ef=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G,z.21),\'Z\');z.ef.1L(z.fx.V.1q.1C,0)}),\'W\');z.ef.1L(z.fx.V.1q.hb,z.W)}};k.fn.iR=u(H,4x,J,G){E q.1w(\'fv\',u(){q.6W=k(q).1p("14")||\'\';G=2g J==\'4V\'?J:G||S;J=2g J==\'u\'?J:S;D 9S=k(q).B(\'7i\');D 8I=q.31;7d(9S==\'cu\'&&8I){9S=k(8I).B(\'7i\');8I=8I.31}k(q).B(\'7i\',4x);if(2g q.6W==\'8T\')q.6W=q.6W["9X"];k(q).5w({\'7i\':9S},H,G,u(){k.2H(q,\'fv\');if(2g k(q).1p("14")==\'8T\'){k(q).1p("14")["9X"]="";k(q).1p("14")["9X"]=q.6W}P{k(q).1p("14",q.6W)}if(J)J.1D(q)})})};k.fn.23({iT:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.5m(q,H,J,\'49\',\'6g\',G)})},iU:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.5m(q,H,J,\'4j\',\'6g\',G)})},j1:u(H,J,G){E q.1w(\'1n\',u(){if(k.B(q,\'19\')==\'1o\'){12 k.fx.5m(q,H,J,\'4j\',\'6Z\',G)}P{12 k.fx.5m(q,H,J,\'4j\',\'6g\',G)}})},j2:u(H,J,G){E q.1w(\'1n\',u(){if(k.B(q,\'19\')==\'1o\'){12 k.fx.5m(q,H,J,\'49\',\'6Z\',G)}P{12 k.fx.5m(q,H,J,\'49\',\'6g\',G)}})},j9:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.5m(q,H,J,\'49\',\'6Z\',G)})},ja:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.5m(q,H,J,\'4j\',\'6Z\',G)})}});k.fx.5m=u(e,H,J,2S,1u,G){if(!k.4K(e)){k.2H(e,\'1n\');E I}D z=q;D 73=I;z.el=k(e);z.G=2g J==\'4V\'?J:G||S;z.J=2g J==\'u\'?J:S;z.1u=1u;z.H=H;z.2i=k.1a.2o(e);z.V={};z.V.Y=z.el.B(\'Y\');z.V.19=z.el.B(\'19\');if(z.V.19==\'1o\'){5Y=z.el.B(\'3n\');z.el.1Y();73=1b}z.V.Q=z.el.B(\'Q\');z.V.O=z.el.B(\'O\');if(73){z.el.2G();z.el.B(\'3n\',5Y)}z.V.Z=z.2i.w+\'U\';z.V.W=z.2i.h+\'U\';z.V.2U=z.el.B(\'2U\');z.2i.Q=T(z.V.Q)||0;z.2i.O=T(z.V.O)||0;if(z.V.Y!=\'2s\'&&z.V.Y!=\'1P\'){z.el.B(\'Y\',\'2s\')}z.el.B(\'2U\',\'2K\').B(\'W\',1u==\'6Z\'&&2S==\'49\'?1:z.2i.h+\'U\').B(\'Z\',1u==\'6Z\'&&2S==\'4j\'?1:z.2i.w+\'U\');z.21=u(){z.el.B(z.V);if(z.1u==\'6g\')z.el.2G();P z.el.1Y();k.2H(z.el.K(0),\'1n\')};3m(2S){1e\'49\':z.eh=12 k.fx(z.el.K(0),k.H(H-15,z.G,J),\'W\');z.et=12 k.fx(z.el.K(0),k.H(z.H,z.G,z.21),\'Q\');if(z.1u==\'6g\'){z.eh.1L(z.2i.h,0);z.et.1L(z.2i.Q,z.2i.Q+z.2i.h/2)}P{z.eh.1L(0,z.2i.h);z.et.1L(z.2i.Q+z.2i.h/2,z.2i.Q)}1r;1e\'4j\':z.eh=12 k.fx(z.el.K(0),k.H(H-15,z.G,J),\'Z\');z.et=12 k.fx(z.el.K(0),k.H(z.H,z.G,z.21),\'O\');if(z.1u==\'6g\'){z.eh.1L(z.2i.w,0);z.et.1L(z.2i.O,z.2i.O+z.2i.w/2)}P{z.eh.1L(0,z.2i.w);z.et.1L(z.2i.O+z.2i.w/2,z.2i.O)}1r}};k.fn.bg=u(H,3V,J){E q.1w(\'1n\',u(){if(!k.4K(q)){k.2H(q,\'1n\');E I}D fx=12 k.fx.bg(q,H,3V,J);fx.bf()})};k.fx.bg=u(el,H,3V,J){D z=q;z.3V=3V;z.5y=1;z.el=el;z.H=H;z.J=J;k(z.el).1Y();z.bf=u(){z.5y++;z.e=12 k.fx(z.el,k.H(z.H,u(){z.ef=12 k.fx(z.el,k.H(z.H,u(){if(z.5y<=z.3V)z.bf();P{k.2H(z.el,\'1n\');if(z.J&&z.J.1K==2A){z.J.1D(z.el)}}}),\'1G\');z.ef.1L(0,1)}),\'1G\');z.e.1L(1,0)}};k.fn.23({jb:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.6G(q,H,1,2a,1b,J,\'fa\',G)})},jc:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.6G(q,H,2a,1,1b,J,\'b4\',G)})},j8:u(H,J,G){E q.1w(\'1n\',u(){D G=G||\'fl\';12 k.fx.6G(q,H,2a,f8,1b,J,\'6h\',G)})},6G:u(H,57,30,6H,J,G){E q.1w(\'1n\',u(){12 k.fx.6G(q,H,57,30,6H,J,\'6G\',G)})}});k.fx.6G=u(e,H,57,30,6H,J,1u,G){if(!k.4K(e)){k.2H(e,\'1n\');E I}D z=q;z.el=k(e);z.57=T(57)||2a;z.30=T(30)||2a;z.G=2g J==\'4V\'?J:G||S;z.J=2g J==\'u\'?J:S;z.1m=k.H(H).1m;z.6H=6H||S;z.2i=k.1a.2o(e);z.V={Z:z.el.B(\'Z\'),W:z.el.B(\'W\'),4A:z.el.B(\'4A\')||\'2a%\',Y:z.el.B(\'Y\'),19:z.el.B(\'19\'),Q:z.el.B(\'Q\'),O:z.el.B(\'O\'),2U:z.el.B(\'2U\'),4S:z.el.B(\'4S\'),5O:z.el.B(\'5O\'),5Q:z.el.B(\'5Q\'),5b:z.el.B(\'5b\'),5M:z.el.B(\'5M\'),5U:z.el.B(\'5U\'),5n:z.el.B(\'5n\'),4X:z.el.B(\'4X\')};z.Z=T(z.V.Z)||e.4c||0;z.W=T(z.V.W)||e.5W||0;z.Q=T(z.V.Q)||0;z.O=T(z.V.O)||0;1q=[\'em\',\'U\',\'j7\',\'%\'];24(i in 1q){if(z.V.4A.3J(1q[i])>0){z.fg=1q[i];z.4A=2m(z.V.4A)}if(z.V.4S.3J(1q[i])>0){z.fc=1q[i];z.bw=2m(z.V.4S)||0}if(z.V.5O.3J(1q[i])>0){z.fe=1q[i];z.bc=2m(z.V.5O)||0}if(z.V.5Q.3J(1q[i])>0){z.fL=1q[i];z.bA=2m(z.V.5Q)||0}if(z.V.5b.3J(1q[i])>0){z.g8=1q[i];z.bt=2m(z.V.5b)||0}if(z.V.5M.3J(1q[i])>0){z.g4=1q[i];z.bx=2m(z.V.5M)||0}if(z.V.5U.3J(1q[i])>0){z.g9=1q[i];z.bv=2m(z.V.5U)||0}if(z.V.5n.3J(1q[i])>0){z.gc=1q[i];z.bj=2m(z.V.5n)||0}if(z.V.4X.3J(1q[i])>0){z.fK=1q[i];z.b7=2m(z.V.4X)||0}}if(z.V.Y!=\'2s\'&&z.V.Y!=\'1P\'){z.el.B(\'Y\',\'2s\')}z.el.B(\'2U\',\'2K\');z.1u=1u;3m(z.1u){1e\'fa\':z.4b=z.Q+z.2i.h/2;z.5a=z.Q;z.4k=z.O+z.2i.w/2;z.59=z.O;1r;1e\'b4\':z.5a=z.Q+z.2i.h/2;z.4b=z.Q;z.59=z.O+z.2i.w/2;z.4k=z.O;1r;1e\'6h\':z.5a=z.Q-z.2i.h/4;z.4b=z.Q;z.59=z.O-z.2i.w/4;z.4k=z.O;1r}z.be=I;z.t=(12 7g).7z();z.4w=u(){5T(z.2I);z.2I=S};z.2D=u(){if(z.be==I){z.el.1Y();z.be=1b}D t=(12 7g).7z();D n=t-z.t;D p=n/z.1m;if(t>=z.1m+z.t){9T(u(){o=1;if(z.1u){t=z.5a;l=z.59;if(z.1u==\'6h\')o=0}z.bs(z.30,l,t,1b,o)},13);z.4w()}P{o=1;if(!k.G||!k.G[z.G]){s=((-18.5H(p*18.2Q)/2)+0.5)*(z.30-z.57)+z.57}P{s=k.G[z.G](p,n,z.57,(z.30-z.57),z.1m)}if(z.1u){if(!k.G||!k.G[z.G]){t=((-18.5H(p*18.2Q)/2)+0.5)*(z.5a-z.4b)+z.4b;l=((-18.5H(p*18.2Q)/2)+0.5)*(z.59-z.4k)+z.4k;if(z.1u==\'6h\')o=((-18.5H(p*18.2Q)/2)+0.5)*(-0.9Y)+0.9Y}P{t=k.G[z.G](p,n,z.4b,(z.5a-z.4b),z.1m);l=k.G[z.G](p,n,z.4k,(z.59-z.4k),z.1m);if(z.1u==\'6h\')o=k.G[z.G](p,n,0.9Y,-0.9Y,z.1m)}}z.bs(s,l,t,I,o)}};z.2I=6V(u(){z.2D()},13);z.bs=u(4q,O,Q,fM,1G){z.el.B(\'W\',z.W*4q/2a+\'U\').B(\'Z\',z.Z*4q/2a+\'U\').B(\'O\',O+\'U\').B(\'Q\',Q+\'U\').B(\'4A\',z.4A*4q/2a+z.fg);if(z.bw)z.el.B(\'4S\',z.bw*4q/2a+z.fc);if(z.bc)z.el.B(\'5O\',z.bc*4q/2a+z.fe);if(z.bA)z.el.B(\'5Q\',z.bA*4q/2a+z.fL);if(z.bt)z.el.B(\'5b\',z.bt*4q/2a+z.g8);if(z.bx)z.el.B(\'5M\',z.bx*4q/2a+z.g4);if(z.bv)z.el.B(\'5U\',z.bv*4q/2a+z.g9);if(z.bj)z.el.B(\'5n\',z.bj*4q/2a+z.gc);if(z.b7)z.el.B(\'4X\',z.b7*4q/2a+z.fK);if(z.1u==\'6h\'){if(1X.71)z.el.K(0).14.5E="8V(1G="+1G*2a+")";z.el.K(0).14.1G=1G}if(fM){if(z.6H){z.el.B(z.V)}if(z.1u==\'b4\'||z.1u==\'6h\'){z.el.B(\'19\',\'1o\');if(z.1u==\'6h\'){if(1X.71)z.el.K(0).14.5E="8V(1G="+2a+")";z.el.K(0).14.1G=1}}P z.el.B(\'19\',\'2B\');if(z.J)z.J.1D(z.el.K(0));k.2H(z.el.K(0),\'1n\')}}};k.fn.23({9U:u(H,1O,G){o=k.H(H);E q.1w(\'1n\',u(){12 k.fx.9U(q,o,1O,G)})},j6:u(H,1O,G){E q.1E(u(){k(\'a[@3h*="#"]\',q).5h(u(e){fW=q.3h.7C(\'#\');k(\'#\'+fW[1]).9U(H,1O,G);E I})})}});k.fx.9U=u(e,o,1O,G){D z=q;z.o=o;z.e=e;z.1O=/fT|gd/.48(1O)?1O:I;z.G=G;p=k.1a.3w(e);s=k.1a.6z();z.4w=u(){5T(z.2I);z.2I=S;k.2H(z.e,\'1n\')};z.t=(12 7g).7z();s.h=s.h>s.ih?(s.h-s.ih):s.h;s.w=s.w>s.iw?(s.w-s.iw):s.w;z.5a=p.y>s.h?s.h:p.y;z.59=p.x>s.w?s.w:p.x;z.4b=s.t;z.4k=s.l;z.2D=u(){D t=(12 7g).7z();D n=t-z.t;D p=n/z.o.1m;if(t>=z.o.1m+z.t){z.4w();9T(u(){z.d3(z.5a,z.59)},13)}P{if(!z.1O||z.1O==\'fT\'){if(!k.G||!k.G[z.G]){9V=((-18.5H(p*18.2Q)/2)+0.5)*(z.5a-z.4b)+z.4b}P{9V=k.G[z.G](p,n,z.4b,(z.5a-z.4b),z.o.1m)}}P{9V=z.4b}if(!z.1O||z.1O==\'gd\'){if(!k.G||!k.G[z.G]){9W=((-18.5H(p*18.2Q)/2)+0.5)*(z.59-z.4k)+z.4k}P{9W=k.G[z.G](p,n,z.4k,(z.59-z.4k),z.o.1m)}}P{9W=z.4k}z.d3(9V,9W)}};z.d3=u(t,l){1X.j4(l,t)};z.2I=6V(u(){z.2D()},13)};k.fn.cY=u(3V,J){E q.1w(\'1n\',u(){if(!k.4K(q)){k.2H(q,\'1n\');E I}D e=12 k.fx.cY(q,3V,J);e.cG()})};k.fx.cY=u(e,3V,J){D z=q;z.el=k(e);z.el.1Y();z.3V=T(3V)||3;z.J=J;z.5y=1;z.V={};z.V.Y=z.el.B(\'Y\');z.V.Q=T(z.el.B(\'Q\'))||0;z.V.O=T(z.el.B(\'O\'))||0;if(z.V.Y!=\'2s\'&&z.V.Y!=\'1P\'){z.el.B(\'Y\',\'2s\')}z.cG=u(){z.5y++;z.e=12 k.fx(z.el.K(0),{1m:60,21:u(){z.e=12 k.fx(z.el.K(0),{1m:60,21:u(){z.e=12 k.fx(e,{1m:60,21:u(){if(z.5y<=z.3V)z.cG();P{z.el.B(\'Y\',z.V.Y).B(\'Q\',z.V.Q+\'U\').B(\'O\',z.V.O+\'U\');k.2H(z.el.K(0),\'1n\');if(z.J&&z.J.1K==2A){z.J.1D(z.el.K(0))}}}},\'O\');z.e.1L(z.V.O-20,z.V.O)}},\'O\');z.e.1L(z.V.O+20,z.V.O-20)}},\'O\');z.e.1L(z.V.O,z.V.O+20)}};k.fn.23({fo:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'4F\',\'in\',G)})},fq:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'4F\',\'4l\',G)})},iY:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'4F\',\'3R\',G)})},iX:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'4r\',\'in\',G)})},jr:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'4r\',\'4l\',G)})},jq:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'4r\',\'3R\',G)})},jp:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'O\',\'in\',G)})},jn:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'O\',\'4l\',G)})},jm:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'O\',\'3R\',G)})},iP:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'2L\',\'in\',G)})},ic:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'2L\',\'4l\',G)})},ib:u(H,J,G){E q.1w(\'1n\',u(){12 k.fx.1z(q,H,J,\'2L\',\'3R\',G)})}});k.fx.1z=u(e,H,J,2S,1u,G){if(!k.4K(e)){k.2H(e,\'1n\');E I}D z=q;z.el=k(e);z.G=2g J==\'4V\'?J:G||S;z.J=2g J==\'u\'?J:S;if(1u==\'3R\'){1u=z.el.B(\'19\')==\'1o\'?\'in\':\'4l\'}if(!e.4s)e.4s=z.el.B(\'19\');z.el.1Y();z.H=H;z.fx=k.fx.9P(e);z.1u=1u;z.2S=2S;z.21=u(){if(z.1u==\'4l\')z.el.B(\'3n\',\'2K\');k.fx.a0(z.fx.3p.K(0),z.fx.V);if(z.1u==\'in\'){z.el.B(\'19\',z.el.K(0).4s==\'1o\'?\'2B\':z.el.K(0).4s)}P{z.el.B(\'19\',\'1o\');z.el.B(\'3n\',\'dd\')}if(z.J&&z.J.1K==2A){z.J.1D(z.el.K(0))}k.2H(z.el.K(0),\'1n\')};3m(z.2S){1e\'4F\':z.ef=12 k.fx(z.el.K(0),k.H(z.H,z.G,z.21),\'Q\');z.7v=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G),\'W\');if(z.1u==\'in\'){z.ef.1L(-z.fx.V.1q.hb,0);z.7v.1L(0,z.fx.V.1q.hb)}P{z.ef.1L(0,-z.fx.V.1q.hb);z.7v.1L(z.fx.V.1q.hb,0)}1r;1e\'4r\':z.ef=12 k.fx(z.el.K(0),k.H(z.H,z.G,z.21),\'Q\');if(z.1u==\'in\'){z.ef.1L(z.fx.V.1q.hb,0)}P{z.ef.1L(0,z.fx.V.1q.hb)}1r;1e\'O\':z.ef=12 k.fx(z.el.K(0),k.H(z.H,z.G,z.21),\'O\');z.7v=12 k.fx(z.fx.3p.K(0),k.H(z.H,z.G),\'Z\');if(z.1u==\'in\'){z.ef.1L(-z.fx.V.1q.1C,0);z.7v.1L(0,z.fx.V.1q.1C)}P{z.ef.1L(0,-z.fx.V.1q.1C);z.7v.1L(z.fx.V.1q.1C,0)}1r;1e\'2L\':z.ef=12 k.fx(z.el.K(0),k.H(z.H,z.G,z.21),\'O\');if(z.1u==\'in\'){z.ef.1L(z.fx.V.1q.1C,0)}P{z.ef.1L(0,z.fx.V.1q.1C)}1r}};k.3f=S;k.fn.ig=u(o){E q.1w(\'1n\',u(){12 k.fx.dG(q,o)})};k.fx.dG=u(e,o){if(k.3f==S){k(\'2e\',1h).1S(\'<22 id="3f"></22>\');k.3f=k(\'#3f\')}k.3f.B(\'19\',\'2B\').B(\'Y\',\'1P\');D z=q;z.el=k(e);if(!o||!o.30){E}if(o.30.1K==b0&&1h.9e(o.30)){o.30=1h.9e(o.30)}P if(!o.30.dq){E}if(!o.1m){o.1m=g5}z.1m=o.1m;z.30=o.30;z.8r=o.3l;z.21=o.21;if(z.8r){k.3f.2R(z.8r)}z.a3=0;z.a2=0;if(k.dF){z.a3=(T(k.3f.B(\'5b\'))||0)+(T(k.3f.B(\'5O\'))||0)+(T(k.3f.B(\'4X\'))||0)+(T(k.3f.B(\'5U\'))||0);z.a2=(T(k.3f.B(\'4S\'))||0)+(T(k.3f.B(\'5Q\'))||0)+(T(k.3f.B(\'5M\'))||0)+(T(k.3f.B(\'5n\'))||0)}z.26=k.23(k.1a.3w(z.el.K(0)),k.1a.2o(z.el.K(0)));z.2T=k.23(k.1a.3w(z.30),k.1a.2o(z.30));z.26.1C-=z.a3;z.26.hb-=z.a2;z.2T.1C-=z.a3;z.2T.hb-=z.a2;z.J=o.21;k.3f.B(\'Z\',z.26.1C+\'U\').B(\'W\',z.26.hb+\'U\').B(\'Q\',z.26.y+\'U\').B(\'O\',z.26.x+\'U\').5w({Q:z.2T.y,O:z.2T.x,Z:z.2T.1C,W:z.2T.hb},z.1m,u(){if(z.8r)k.3f.4i(z.8r);k.3f.B(\'19\',\'1o\');if(z.21&&z.21.1K==2A){z.21.1D(z.el.K(0),[z.30])}k.2H(z.el.K(0),\'1n\')})};k.1v={M:{2E:10,ec:\'1Q/iJ.eZ\',e3:\'<1T 2J="1Q/6g.da" />\',eW:0.8,d8:\'iN a6\',dc:\'57\',3W:8J},jQ:I,jW:I,6j:S,8m:I,8k:I,d1:u(2k){if(!k.1v.8k||k.1v.8m)E;D 3K=2k.7L||2k.7K||-1;3m(3K){1e 35:if(k.1v.6j)k.1v.26(S,k(\'a[@4I=\'+k.1v.6j+\']:jJ\').K(0));1r;1e 36:if(k.1v.6j)k.1v.26(S,k(\'a[@4I=\'+k.1v.6j+\']:jL\').K(0));1r;1e 37:1e 8:1e 33:1e 80:1e kb:D 9p=k(\'#87\');if(9p.K(0).53!=S){9p.K(0).53.1D(9p.K(0))}1r;1e 38:1r;1e 39:1e 34:1e 32:1e gl:1e 78:D 9k=k(\'#88\');if(9k.K(0).53!=S){9k.K(0).53.1D(9k.K(0))}1r;1e 40:1r;1e 27:k.1v.au();1r}},7q:u(M){if(M)k.23(k.1v.M,M);if(1X.2k){k(\'2e\',1h).1J(\'6y\',k.1v.d1)}P{k(1h).1J(\'6y\',k.1v.d1)}k(\'a\').1E(u(){el=k(q);en=el.1p(\'4I\')||\'\';e9=el.1p(\'3h\')||\'\';ev=/\\.da|\\.gw|\\.8X|\\.eZ|\\.gn/g;if(e9.6c().d5(ev)!=S&&en.6c().3J(\'eU\')==0){el.1J(\'5h\',k.1v.26)}});if(k.3a.4t){3A=1h.3F(\'3A\');k(3A).1p({id:\'cN\',2J:\'ek:I;\',ej:\'cD\',ep:\'cD\'}).B({19:\'1o\',Y:\'1P\',Q:\'0\',O:\'0\',5E:\'9n:9w.9y.cC(1G=0)\'});k(\'2e\').1S(3A)}8n=1h.3F(\'22\');k(8n).1p(\'id\',\'cP\').B({Y:\'1P\',19:\'1o\',Q:\'0\',O:\'0\',1G:0}).1S(1h.8M(\' \')).1J(\'5h\',k.1v.au);6A=1h.3F(\'22\');k(6A).1p(\'id\',\'eK\').B({4X:k.1v.M.2E+\'U\'}).1S(1h.8M(\' \'));cE=1h.3F(\'22\');k(cE).1p(\'id\',\'dg\').B({4X:k.1v.M.2E+\'U\',5n:k.1v.M.2E+\'U\'}).1S(1h.8M(\' \'));cF=1h.3F(\'a\');k(cF).1p({id:\'gg\',3h:\'#\'}).B({Y:\'1P\',2L:k.1v.M.2E+\'U\',Q:\'0\'}).1S(k.1v.M.e3).1J(\'5h\',k.1v.au);7m=1h.3F(\'22\');k(7m).1p(\'id\',\'cM\').B({Y:\'2s\',cA:\'O\',6w:\'0 9F\',3I:1}).1S(6A).1S(cE).1S(cF);2b=1h.3F(\'1T\');2b.2J=k.1v.M.ec;k(2b).1p(\'id\',\'eM\').B({Y:\'1P\'});4G=1h.3F(\'a\');k(4G).1p({id:\'87\',3h:\'#\'}).B({Y:\'1P\',19:\'1o\',2U:\'2K\',ey:\'1o\'}).1S(1h.8M(\' \'));4M=1h.3F(\'a\');k(4M).1p({id:\'88\',3h:\'#\'}).B({Y:\'1P\',2U:\'2K\',ey:\'1o\'}).1S(1h.8M(\' \'));1Z=1h.3F(\'22\');k(1Z).1p(\'id\',\'eE\').B({19:\'1o\',Y:\'2s\',2U:\'2K\',cA:\'O\',6w:\'0 9F\',Q:\'0\',O:\'0\',3I:2}).1S([2b,4G,4M]);6F=1h.3F(\'22\');k(6F).1p(\'id\',\'ao\').B({19:\'1o\',Y:\'1P\',2U:\'2K\',Q:\'0\',O:\'0\',cA:\'cv\',7i:\'cu\',hC:\'0\'}).1S([1Z,7m]);k(\'2e\').1S(8n).1S(6F)},26:u(e,C){el=C?k(C):k(q);9t=el.1p(\'4I\');D 6B,4u,4G,4M;if(9t!=\'eU\'){k.1v.6j=9t;8Y=k(\'a[@4I=\'+9t+\']\');6B=8Y.1N();4u=8Y.cZ(C?C:q);4G=8Y.K(4u-1);4M=8Y.K(4u+1)}89=el.1p(\'3h\');6A=el.1p(\'4g\');3O=k.1a.6z();8n=k(\'#cP\');if(!k.1v.8k){k.1v.8k=1b;if(k.3a.4t){k(\'#cN\').B(\'W\',18.3r(3O.ih,3O.h)+\'U\').B(\'Z\',18.3r(3O.iw,3O.w)+\'U\').1Y()}8n.B(\'W\',18.3r(3O.ih,3O.h)+\'U\').B(\'Z\',18.3r(3O.iw,3O.w)+\'U\').1Y().fX(cO,k.1v.M.eW,u(){k.1v.cw(89,6A,3O,6B,4u,4G,4M)});k(\'#ao\').B(\'Z\',18.3r(3O.iw,3O.w)+\'U\')}P{k(\'#87\').K(0).53=S;k(\'#88\').K(0).53=S;k.1v.cw(89,6A,3O,6B,4u,4G,4M)}E I},cw:u(89,gP,3O,6B,4u,4G,4M){k(\'#cW\').bk();aX=k(\'#87\');aX.2G();aO=k(\'#88\');aO.2G();2b=k(\'#eM\');1Z=k(\'#eE\');6F=k(\'#ao\');7m=k(\'#cM\').B(\'3n\',\'2K\');k(\'#eK\').3x(6A);k.1v.8m=1b;if(6B)k(\'#dg\').3x(k.1v.M.d8+\' \'+(4u+1)+\' \'+k.1v.M.dc+\' \'+6B);if(4G){aX.K(0).53=u(){q.5B();k.1v.26(S,4G);E I}}if(4M){aO.K(0).53=u(){q.5B();k.1v.26(S,4M);E I}}2b.1Y();82=k.1a.2o(1Z.K(0));56=18.3r(82.1C,2b.K(0).Z+k.1v.M.2E*2);6f=18.3r(82.hb,2b.K(0).W+k.1v.M.2E*2);2b.B({O:(56-2b.K(0).Z)/2+\'U\',Q:(6f-2b.K(0).W)/2+\'U\'});1Z.B({Z:56+\'U\',W:6f+\'U\'}).1Y();dw=k.1a.bm();6F.B(\'Q\',3O.t+(dw.h/15)+\'U\');if(6F.B(\'19\')==\'1o\'){6F.1Y().7f(k.1v.M.3W)}6k=12 9s;k(6k).1p(\'id\',\'cW\').1J(\'hJ\',u(){56=6k.Z+k.1v.M.2E*2;6f=6k.W+k.1v.M.2E*2;2b.2G();1Z.5w({W:6f},82.hb!=6f?k.1v.M.3W:1,u(){1Z.5w({Z:56},82.1C!=56?k.1v.M.3W:1,u(){1Z.bG(6k);k(6k).B({Y:\'1P\',O:k.1v.M.2E+\'U\',Q:k.1v.M.2E+\'U\'}).7f(k.1v.M.3W,u(){db=k.1a.2o(7m.K(0));if(4G){aX.B({O:k.1v.M.2E+\'U\',Q:k.1v.M.2E+\'U\',Z:56/2-k.1v.M.2E*3+\'U\',W:6f-k.1v.M.2E*2+\'U\'}).1Y()}if(4M){aO.B({O:56/2+k.1v.M.2E*2+\'U\',Q:k.1v.M.2E+\'U\',Z:56/2-k.1v.M.2E*3+\'U\',W:6f-k.1v.M.2E*2+\'U\'}).1Y()}7m.B({Z:56+\'U\',Q:-db.hb+\'U\',3n:\'dd\'}).5w({Q:-1},k.1v.M.3W,u(){k.1v.8m=I})})})})});6k.2J=89},au:u(){k(\'#cW\').bk();k(\'#ao\').2G();k(\'#cM\').B(\'3n\',\'2K\');k(\'#cP\').fX(cO,0,u(){k(q).2G();if(k.3a.4t){k(\'#cN\').2G()}});k(\'#87\').K(0).53=S;k(\'#88\').K(0).53=S;k.1v.6j=S;k.1v.8k=I;k.1v.8m=I;E I}};k.R={1A:S,41:S,F:S,1s:S,1q:S,Y:S,9a:u(e){k.R.F=(q.d0)?q.d0:q;k.R.1s=k.1a.4a(e);k.R.1q={Z:T(k(k.R.F).B(\'Z\'))||0,W:T(k(k.R.F).B(\'W\'))||0};k.R.Y={Q:T(k(k.R.F).B(\'Q\'))||0,O:T(k(k.R.F).B(\'O\'))||0};k(1h).1J(\'3D\',k.R.cR).1J(\'5P\',k.R.cK);if(2g k.R.F.1k.g2===\'u\'){k.R.F.1k.g2.1D(k.R.F)}E I},cK:u(e){k(1h).3q(\'3D\',k.R.cR).3q(\'5P\',k.R.cK);if(2g k.R.F.1k.fN===\'u\'){k.R.F.1k.fN.1D(k.R.F)}k.R.F=S},cR:u(e){if(!k.R.F){E}1s=k.1a.4a(e);7p=k.R.Y.Q-k.R.1s.y+1s.y;7r=k.R.Y.O-k.R.1s.x+1s.x;7p=18.3r(18.3L(7p,k.R.F.1k.8g-k.R.1q.W),k.R.F.1k.7h);7r=18.3r(18.3L(7r,k.R.F.1k.8h-k.R.1q.Z),k.R.F.1k.70);if(2g k.R.F.1k.4m===\'u\'){D 8a=k.R.F.1k.4m.1D(k.R.F,[7r,7p]);if(2g 8a==\'hh\'&&8a.1g==2){7r=8a[0];7p=8a[1]}}k.R.F.14.Q=7p+\'U\';k.R.F.14.O=7r+\'U\';E I},26:u(e){k(1h).1J(\'3D\',k.R.8j).1J(\'5P\',k.R.8o);k.R.1A=q.1A;k.R.41=q.41;k.R.1s=k.1a.4a(e);k.R.1q={Z:T(k(q.1A).B(\'Z\'))||0,W:T(k(q.1A).B(\'W\'))||0};k.R.Y={Q:T(k(q.1A).B(\'Q\'))||0,O:T(k(q.1A).B(\'O\'))||0};if(k.R.1A.1k.4o){k.R.1A.1k.4o.1D(k.R.1A,[q])}E I},8o:u(){k(1h).3q(\'3D\',k.R.8j).3q(\'5P\',k.R.8o);if(k.R.1A.1k.3T){k.R.1A.1k.3T.1D(k.R.1A,[k.R.41])}k.R.1A=S;k.R.41=S},6i:u(dx,az){E 18.3L(18.3r(k.R.1q.Z+dx*az,k.R.1A.1k.av),k.R.1A.1k.6x)},6m:u(dy,az){E 18.3L(18.3r(k.R.1q.W+dy*az,k.R.1A.1k.8c),k.R.1A.1k.8b)},fb:u(W){E 18.3L(18.3r(W,k.R.1A.1k.8c),k.R.1A.1k.8b)},8j:u(e){if(k.R.1A==S){E}1s=k.1a.4a(e);dx=1s.x-k.R.1s.x;dy=1s.y-k.R.1s.y;1I={Z:k.R.1q.Z,W:k.R.1q.W};2z={Q:k.R.Y.Q,O:k.R.Y.O};3m(k.R.41){1e\'e\':1I.Z=k.R.6i(dx,1);1r;1e\'fj\':1I.Z=k.R.6i(dx,1);1I.W=k.R.6m(dy,1);1r;1e\'w\':1I.Z=k.R.6i(dx,-1);2z.O=k.R.Y.O-1I.Z+k.R.1q.Z;1r;1e\'5F\':1I.Z=k.R.6i(dx,-1);2z.O=k.R.Y.O-1I.Z+k.R.1q.Z;1I.W=k.R.6m(dy,1);1r;1e\'76\':1I.W=k.R.6m(dy,-1);2z.Q=k.R.Y.Q-1I.W+k.R.1q.W;1I.Z=k.R.6i(dx,-1);2z.O=k.R.Y.O-1I.Z+k.R.1q.Z;1r;1e\'n\':1I.W=k.R.6m(dy,-1);2z.Q=k.R.Y.Q-1I.W+k.R.1q.W;1r;1e\'at\':1I.W=k.R.6m(dy,-1);2z.Q=k.R.Y.Q-1I.W+k.R.1q.W;1I.Z=k.R.6i(dx,1);1r;1e\'s\':1I.W=k.R.6m(dy,1);1r}if(k.R.1A.1k.4v){if(k.R.41==\'n\'||k.R.41==\'s\')4p=1I.W*k.R.1A.1k.4v;P 4p=1I.Z;4W=k.R.fb(4p*k.R.1A.1k.4v);4p=4W/k.R.1A.1k.4v;3m(k.R.41){1e\'n\':1e\'76\':1e\'at\':2z.Q+=1I.W-4W;1r}3m(k.R.41){1e\'76\':1e\'w\':1e\'5F\':2z.O+=1I.Z-4p;1r}1I.W=4W;1I.Z=4p}if(2z.Q<k.R.1A.1k.7h){4W=1I.W+2z.Q-k.R.1A.1k.7h;2z.Q=k.R.1A.1k.7h;if(k.R.1A.1k.4v){4p=4W/k.R.1A.1k.4v;3m(k.R.41){1e\'76\':1e\'w\':1e\'5F\':2z.O+=1I.Z-4p;1r}1I.Z=4p}1I.W=4W}if(2z.O<k.R.1A.1k.70){4p=1I.Z+2z.O-k.R.1A.1k.70;2z.O=k.R.1A.1k.70;if(k.R.1A.1k.4v){4W=4p*k.R.1A.1k.4v;3m(k.R.41){1e\'n\':1e\'76\':1e\'at\':2z.Q+=1I.W-4W;1r}1I.W=4W}1I.Z=4p}if(2z.Q+1I.W>k.R.1A.1k.8g){1I.W=k.R.1A.1k.8g-2z.Q;if(k.R.1A.1k.4v){1I.Z=1I.W/k.R.1A.1k.4v}}if(2z.O+1I.Z>k.R.1A.1k.8h){1I.Z=k.R.1A.1k.8h-2z.O;if(k.R.1A.1k.4v){1I.W=1I.Z*k.R.1A.1k.4v}}D 6p=I;if(k.R.1A.1k.f7){6p=k.R.1A.1k.f7.1D(k.R.1A,[1I,2z]);if(6p){if(6p.1q){k.23(1I,6p.1q)}if(6p.Y){k.23(2z,6p.Y)}}}8d=k.R.1A.14;8d.O=2z.O+\'U\';8d.Q=2z.Q+\'U\';8d.Z=1I.Z+\'U\';8d.W=1I.W+\'U\';E I},2r:u(M){if(!M||!M.3Z||M.3Z.1K!=7M){E}E q.1E(u(){D el=q;el.1k=M;el.1k.av=M.av||10;el.1k.8c=M.8c||10;el.1k.6x=M.6x||6P;el.1k.8b=M.8b||6P;el.1k.7h=M.7h||-aC;el.1k.70=M.70||-aC;el.1k.8h=M.8h||6P;el.1k.8g=M.8g||6P;d6=k(el).B(\'Y\');if(!(d6==\'2s\'||d6==\'1P\')){el.14.Y=\'2s\'}fS=/n|at|e|fj|s|5F|w|76/g;24(i in el.1k.3Z){if(i.6c().d5(fS)!=S){if(el.1k.3Z[i].1K==b0){3v=k(el.1k.3Z[i]);if(3v.1N()>0){el.1k.3Z[i]=3v.K(0)}}if(el.1k.3Z[i].4Y){el.1k.3Z[i].1A=el;el.1k.3Z[i].41=i;k(el.1k.3Z[i]).1J(\'5v\',k.R.26)}}}if(el.1k.5S){if(2g el.1k.5S===\'4V\'){aV=k(el.1k.5S);if(aV.1N()>0){aV.1E(u(){q.d0=el});aV.1J(\'5v\',k.R.9a)}}P if(el.1k.5S==1b){k(q).1J(\'5v\',k.R.9a)}}})},4U:u(){E q.1E(u(){D el=q;24(i in el.1k.3Z){el.1k.3Z[i].1A=S;el.1k.3Z[i].41=S;k(el.1k.3Z[i]).3q(\'5v\',k.R.26)}if(el.1k.5S){if(2g el.1k.5S===\'4V\'){3v=k(el.1k.5S);if(3v.1N()>0){3v.3q(\'5v\',k.R.9a)}}P if(el.1k.5S==1b){k(q).3q(\'5v\',k.R.9a)}}el.1k=S})}};k.fn.23({hz:k.R.2r,hs:k.R.4U});k.2C=S;k.7n=I;k.3k=S;k.7o=[];k.9v=u(e){D 3K=e.7L||e.7K||-1;if(3K==17||3K==16){k.7n=1b}};k.9u=u(e){k.7n=I};k.dL=u(e){q.f.1s=k.1a.4a(e);q.f.1M=k.23(k.1a.3w(q),k.1a.2o(q));q.f.3e=k.1a.6z(q);q.f.1s.x-=q.f.1M.x;q.f.1s.y-=q.f.1M.y;k(q).1S(k.2C.K(0));if(q.f.hc)k.2C.2R(q.f.hc).B(\'19\',\'2B\');k.2C.B({19:\'2B\',Z:\'2P\',W:\'2P\'});if(q.f.o){k.2C.B(\'1G\',q.f.o)}k.3k=q;k.96=I;k.7o=[];q.f.el.1E(u(){q.1M={x:q.8t+(q.4Z&&!k.3a.7I?T(q.4Z.5b)||0:0)+(k.3k.3c||0),y:q.8G+(q.4Z&&!k.3a.7I?T(q.4Z.4S)||0:0)+(k.3k.3d||0),1C:q.4c,hb:q.5W};if(q.s==1b){if(k.7n==I){q.s=I;k(q).4i(k.3k.f.7j)}P{k.96=1b;k.7o[k.7o.1g]=k.1p(q,\'id\')}}});k.am.1D(q,[e]);k(1h).1J(\'3D\',k.am).1J(\'5P\',k.cX);E I};k.am=u(e){if(!k.3k)E;k.fd.1D(k.3k,[e])};k.fd=u(e){if(!k.3k)E;D 1s=k.1a.4a(e);D 3e=k.1a.6z(k.3k);1s.x+=3e.l-q.f.3e.l-q.f.1M.x;1s.y+=3e.t-q.f.3e.t-q.f.1M.y;D 93=18.3L(1s.x,q.f.1s.x);D 5F=18.3L(18.3S(1s.x-q.f.1s.x),18.3S(q.f.3e.w-93));D 99=18.3L(1s.y,q.f.1s.y);D 9g=18.3L(18.3S(1s.y-q.f.1s.y),18.3S(q.f.3e.h-99));if(q.3d>0&&1s.y-20<q.3d){D 3X=18.3L(3e.t,10);99-=3X;9g+=3X;q.3d-=3X}P if(q.3d+q.f.1M.h<q.f.3e.h&&1s.y+20>q.3d+q.f.1M.h){D 3X=18.3L(q.f.3e.h-q.3d,10);q.3d+=3X;if(q.3d!=3e.t)9g+=3X}if(q.3c>0&&1s.x-20<q.3c){D 3X=18.3L(3e.l,10);93-=3X;5F+=3X;q.3c-=3X}P if(q.3c+q.f.1M.w<q.f.3e.w&&1s.x+20>q.3c+q.f.1M.w){D 3X=18.3L(q.f.3e.w-q.3c,10);q.3c+=3X;if(q.3c!=3e.l)5F+=3X}k.2C.B({O:93+\'U\',Q:99+\'U\',Z:5F+\'U\',W:9g+\'U\'});k.2C.l=93+q.f.3e.l;k.2C.t=99+q.f.3e.t;k.2C.r=k.2C.l+5F;k.2C.b=k.2C.t+9g;k.96=I;q.f.el.1E(u(){aw=k.7o.3J(k.1p(q,\'id\'));if(!(q.1M.x>k.2C.r||(q.1M.x+q.1M.1C)<k.2C.l||q.1M.y>k.2C.b||(q.1M.y+q.1M.hb)<k.2C.t)){k.96=1b;if(q.s!=1b){q.s=1b;k(q).2R(k.3k.f.7j)}if(aw!=-1){q.s=I;k(q).4i(k.3k.f.7j)}}P if((q.s==1b)&&(aw==-1)){q.s=I;k(q).4i(k.3k.f.7j)}P if((!q.s)&&(k.7n==1b)&&(aw!=-1)){q.s=1b;k(q).2R(k.3k.f.7j)}});E I};k.cX=u(e){if(!k.3k)E;k.g0.1D(k.3k,[e])};k.g0=u(e){k(1h).3q(\'3D\',k.am).3q(\'5P\',k.cX);if(!k.3k)E;k.2C.B(\'19\',\'1o\');if(q.f.hc)k.2C.4i(q.f.hc);k.3k=I;k(\'2e\').1S(k.2C.K(0));if(k.96==1b){if(q.f.98)q.f.98(k.cJ(k.1p(q,\'id\')))}P{if(q.f.9d)q.f.9d(k.cJ(k.1p(q,\'id\')))}k.7o=[]};k.cJ=u(s){D h=\'\';D o=[];if(a=k(\'#\'+s)){a.K(0).f.el.1E(u(){if(q.s==1b){if(h.1g>0){h+=\'&\'}h+=s+\'[]=\'+k.1p(q,\'id\');o[o.1g]=k.1p(q,\'id\')}})}E{7l:h,o:o}};k.fn.gZ=u(o){if(!k.2C){k(\'2e\',1h).1S(\'<22 id="2C"></22>\').1J(\'7B\',k.9v).1J(\'6y\',k.9u);k.2C=k(\'#2C\');k.2C.B({Y:\'1P\',19:\'1o\'});if(1X.2k){k(\'2e\',1h).1J(\'7B\',k.9v).1J(\'6y\',k.9u)}P{k(1h).1J(\'7B\',k.9v).1J(\'6y\',k.9u)}}if(!o){o={}}E q.1E(u(){if(q.eP)E;q.eP=1b;q.f={a:o.3C,o:o.1G?2m(o.1G):I,7j:o.eS?o.eS:I,hc:o.58?o.58:I,98:o.98?o.98:I,9d:o.9d?o.9d:I};q.f.el=k(\'.\'+o.3C);k(q).1J(\'5v\',k.dL).B(\'Y\',\'2s\')})};k.3b={bM:1,eH:u(3t){D 3t=3t;E q.1E(u(){q.4z.6s.1E(u(ab){k.3b.5c(q,3t[ab])})})},K:u(){D 3t=[];q.1E(u(cL){if(q.bI){3t[cL]=[];D C=q;D 1q=k.1a.2o(q);q.4z.6s.1E(u(ab){D x=q.8t;D y=q.8G;92=T(x*2a/(1q.w-q.4c));91=T(y*2a/(1q.h-q.5W));3t[cL][ab]=[92||0,91||0,x||0,y||0]})}});E 3t},ct:u(C){C.A.fu=C.A.28.w-C.A.1B.1C;C.A.fw=C.A.28.h-C.A.1B.hb;if(C.9r.4z.bC){9Z=C.9r.4z.6s.K(C.bF+1);if(9Z){C.A.28.w=(T(k(9Z).B(\'O\'))||0)+C.A.1B.1C;C.A.28.h=(T(k(9Z).B(\'Q\'))||0)+C.A.1B.hb}9Q=C.9r.4z.6s.K(C.bF-1);if(9Q){D cU=T(k(9Q).B(\'O\'))||0;D cH=T(k(9Q).B(\'O\'))||0;C.A.28.x+=cU;C.A.28.y+=cH;C.A.28.w-=cU;C.A.28.h-=cH}}C.A.g7=C.A.28.w-C.A.1B.1C;C.A.eC=C.A.28.h-C.A.1B.hb;if(C.A.2O){C.A.gx=((C.A.28.w-C.A.1B.1C)/C.A.2O)||1;C.A.gy=((C.A.28.h-C.A.1B.hb)/C.A.2O)||1;C.A.fU=C.A.g7/C.A.2O;C.A.fH=C.A.eC/C.A.2O}C.A.28.dx=C.A.28.x-C.A.2c.x;C.A.28.dy=C.A.28.y-C.A.2c.y;k.11.1c.B(\'9b\',\'ad\')},3H:u(C,x,y){if(C.A.2O){fE=T(x/C.A.fU);92=fE*2a/C.A.2O;ft=T(y/C.A.fH);91=ft*2a/C.A.2O}P{92=T(x*2a/C.A.fu);91=T(y*2a/C.A.fw)}C.A.b3=[92||0,91||0,x||0,y||0];if(C.A.3H)C.A.3H.1D(C,C.A.b3)},eI:u(2k){3K=2k.7L||2k.7K||-1;3m(3K){1e 35:k.3b.5c(q.3U,[ae,ae]);1r;1e 36:k.3b.5c(q.3U,[-ae,-ae]);1r;1e 37:k.3b.5c(q.3U,[-q.3U.A.gx||-1,0]);1r;1e 38:k.3b.5c(q.3U,[0,-q.3U.A.gy||-1]);1r;1e 39:k.3b.5c(q.3U,[q.3U.A.gx||1,0]);1r;1e 40:k.11.5c(q.3U,[0,q.3U.A.gy||1]);1r}},5c:u(C,Y){if(!C.A){E}C.A.1B=k.23(k.1a.3w(C),k.1a.2o(C));C.A.2c={x:T(k.B(C,\'O\'))||0,y:T(k.B(C,\'Q\'))||0};C.A.4n=k.B(C,\'Y\');if(C.A.4n!=\'2s\'&&C.A.4n!=\'1P\'){C.14.Y=\'2s\'}k.11.c5(C);k.3b.ct(C);dx=T(Y[0])||0;dy=T(Y[1])||0;2v=C.A.2c.x+dx;2q=C.A.2c.y+dy;if(C.A.2O){3y=k.11.c7.1D(C,[2v,2q,dx,dy]);if(3y.1K==7M){dx=3y.dx;dy=3y.dy}2v=C.A.2c.x+dx;2q=C.A.2c.y+dy}3y=k.11.ce.1D(C,[2v,2q,dx,dy]);if(3y&&3y.1K==7M){dx=3y.dx;dy=3y.dy}2v=C.A.2c.x+dx;2q=C.A.2c.y+dy;if(C.A.5i&&(C.A.3H||C.A.2Z)){k.3b.3H(C,2v,2q)}2v=!C.A.1O||C.A.1O==\'4j\'?2v:C.A.2c.x||0;2q=!C.A.1O||C.A.1O==\'49\'?2q:C.A.2c.y||0;C.14.O=2v+\'U\';C.14.Q=2q+\'U\'},2r:u(o){E q.1E(u(){if(q.bI==1b||!o.3C||!k.1a||!k.11||!k.1x){E}5x=k(o.3C,q);if(5x.1N()==0){E}D 4N={2p:\'94\',5i:1b,3H:o.3H&&o.3H.1K==2A?o.3H:S,2Z:o.2Z&&o.2Z.1K==2A?o.2Z:S,3v:q,1G:o.1G||I};if(o.2O&&T(o.2O)){4N.2O=T(o.2O)||1;4N.2O=4N.2O>0?4N.2O:1}if(5x.1N()==1)5x.7t(4N);P{k(5x.K(0)).7t(4N);4N.3v=S;5x.7t(4N)}5x.7B(k.3b.eI);5x.1p(\'bM\',k.3b.bM++);q.bI=1b;q.4z={};q.4z.er=4N.er;q.4z.2O=4N.2O;q.4z.6s=5x;q.4z.bC=o.bC?1b:I;bZ=q;bZ.4z.6s.1E(u(2N){q.bF=2N;q.9r=bZ});if(o.3t&&o.3t.1K==7F){24(i=o.3t.1g-1;i>=0;i--){if(o.3t[i].1K==7F&&o.3t[i].1g==2){el=q.4z.6s.K(i);if(el.4Y){k.3b.5c(el,o.3t[i])}}}}})}};k.fn.23({hN:k.3b.2r,hS:k.3b.eH,hG:k.3b.K});k.2u={5I:[],eg:u(){q.5B();X=q.31;id=k.1p(X,\'id\');if(k.2u.5I[id]!=S){1X.5T(k.2u.5I[id])}1z=X.L.3u+1;if(X.L.1Q.1g<1z){1z=1}1Q=k(\'1T\',X.L.5u);X.L.3u=1z;if(1Q.1N()>0){1Q.7a(X.L.3W,k.2u.95)}},dp:u(){q.5B();X=q.31;id=k.1p(X,\'id\');if(k.2u.5I[id]!=S){1X.5T(k.2u.5I[id])}1z=X.L.3u-1;1Q=k(\'1T\',X.L.5u);if(1z<1){1z=X.L.1Q.1g}X.L.3u=1z;if(1Q.1N()>0){1Q.7a(X.L.3W,k.2u.95)}},2I:u(c){X=1h.9e(c);if(X.L.6o){1z=X.L.3u;7d(1z==X.L.3u){1z=1+T(18.6o()*X.L.1Q.1g)}}P{1z=X.L.3u+1;if(X.L.1Q.1g<1z){1z=1}}1Q=k(\'1T\',X.L.5u);X.L.3u=1z;if(1Q.1N()>0){1Q.7a(X.L.3W,k.2u.95)}},go:u(o){D X;if(o&&o.1K==7M){if(o.2b){X=1h.9e(o.2b.X);5N=1X.hn.3h.7C("#");o.2b.6S=S;if(5N.1g==2){1z=T(5N[1]);1Y=5N[1].4E(1z,\'\');if(k.1p(X,\'id\')!=1Y){1z=1}}P{1z=1}}if(o.90){o.90.5B();X=o.90.31.31;id=k.1p(X,\'id\');if(k.2u.5I[id]!=S){1X.5T(k.2u.5I[id])}5N=o.90.3h.7C("#");1z=T(5N[1]);1Y=5N[1].4E(1z,\'\');if(k.1p(X,\'id\')!=1Y){1z=1}}if(X.L.1Q.1g<1z||1z<1){1z=1}X.L.3u=1z;52=k.1a.2o(X);dt=k.1a.aT(X);d9=k.1a.6U(X);if(X.L.3z){X.L.3z.o.B(\'19\',\'1o\')}if(X.L.3s){X.L.3s.o.B(\'19\',\'1o\')}if(X.L.2b){y=T(dt.t)+T(d9.t);if(X.L.1U){if(X.L.1U.5A==\'Q\'){y+=X.L.1U.4C.hb}P{52.h-=X.L.1U.4C.hb}}if(X.L.2x){if(X.L.2x&&X.L.2x.6Q==\'Q\'){y+=X.L.2x.4C.hb}P{52.h-=X.L.2x.4C.hb}}if(!X.L.c1){X.L.df=o.2b?o.2b.W:(T(X.L.2b.B(\'W\'))||0);X.L.c1=o.2b?o.2b.Z:(T(X.L.2b.B(\'Z\'))||0)}X.L.2b.B(\'Q\',y+(52.h-X.L.df)/2+\'U\');X.L.2b.B(\'O\',(52.1C-X.L.c1)/2+\'U\');X.L.2b.B(\'19\',\'2B\')}1Q=k(\'1T\',X.L.5u);if(1Q.1N()>0){1Q.7a(X.L.3W,k.2u.95)}P{aj=k(\'a\',X.L.1U.o).K(1z-1);k(aj).2R(X.L.1U.5R);D 1T=12 9s();1T.X=k.1p(X,\'id\');1T.1z=1z-1;1T.2J=X.L.1Q[X.L.3u-1].2J;if(1T.21){1T.6S=S;k.2u.19.1D(1T)}P{1T.6S=k.2u.19}if(X.L.2x){X.L.2x.o.3x(X.L.1Q[1z-1].6L)}}}},95:u(){X=q.31.31;X.L.5u.B(\'19\',\'1o\');if(X.L.1U.5R){aj=k(\'a\',X.L.1U.o).4i(X.L.1U.5R).K(X.L.3u-1);k(aj).2R(X.L.1U.5R)}D 1T=12 9s();1T.X=k.1p(X,\'id\');1T.1z=X.L.3u-1;1T.2J=X.L.1Q[X.L.3u-1].2J;if(1T.21){1T.6S=S;k.2u.19.1D(1T)}P{1T.6S=k.2u.19}if(X.L.2x){X.L.2x.o.3x(X.L.1Q[X.L.3u-1].6L)}},19:u(){X=1h.9e(q.X);if(X.L.3z){X.L.3z.o.B(\'19\',\'1o\')}if(X.L.3s){X.L.3s.o.B(\'19\',\'1o\')}52=k.1a.2o(X);y=0;if(X.L.1U){if(X.L.1U.5A==\'Q\'){y+=X.L.1U.4C.hb}P{52.h-=X.L.1U.4C.hb}}if(X.L.2x){if(X.L.2x&&X.L.2x.6Q==\'Q\'){y+=X.L.2x.4C.hb}P{52.h-=X.L.2x.4C.hb}}hg=k(\'.ca\',X);y=y+(52.h-q.W)/2;x=(52.1C-q.Z)/2;X.L.5u.B(\'Q\',y+\'U\').B(\'O\',x+\'U\').3x(\'<1T 2J="\'+q.2J+\'" />\');X.L.5u.7f(X.L.3W);3s=X.L.3u+1;if(3s>X.L.1Q.1g){3s=1}3z=X.L.3u-1;if(3z<1){3z=X.L.1Q.1g}X.L.3s.o.B(\'19\',\'2B\').B(\'Q\',y+\'U\').B(\'O\',x+2*q.Z/3+\'U\').B(\'Z\',q.Z/3+\'U\').B(\'W\',q.W+\'U\').1p(\'4g\',X.L.1Q[3s-1].6L);X.L.3s.o.K(0).3h=\'#\'+3s+k.1p(X,\'id\');X.L.3z.o.B(\'19\',\'2B\').B(\'Q\',y+\'U\').B(\'O\',x+\'U\').B(\'Z\',q.Z/3+\'U\').B(\'W\',q.W+\'U\').1p(\'4g\',X.L.1Q[3z-1].6L);X.L.3z.o.K(0).3h=\'#\'+3z+k.1p(X,\'id\')},2r:u(o){if(!o||!o.1Z||k.2u.5I[o.1Z])E;D 1Z=k(\'#\'+o.1Z);D el=1Z.K(0);if(el.14.Y!=\'1P\'&&el.14.Y!=\'2s\'){el.14.Y=\'2s\'}el.14.2U=\'2K\';if(1Z.1N()==0)E;el.L={};el.L.1Q=o.1Q?o.1Q:[];el.L.6o=o.6o&&o.6o==1b||I;97=el.f3(\'hL\');24(i=0;i<97.1g;i++){7Z=el.L.1Q.1g;el.L.1Q[7Z]={2J:97[i].2J,6L:97[i].4g||97[i].hD||\'\'}}if(el.L.1Q.1g==0){E}el.L.4n=k.23(k.1a.3w(el),k.1a.2o(el));el.L.b5=k.1a.aT(el);el.L.bu=k.1a.6U(el);t=T(el.L.b5.t)+T(el.L.bu.t);b=T(el.L.b5.b)+T(el.L.bu.b);k(\'1T\',el).bk();el.L.3W=o.3W?o.3W:g5;if(o.5A||o.9f||o.5R){el.L.1U={};1Z.1S(\'<22 6T="g1"></22>\');el.L.1U.o=k(\'.g1\',el);if(o.9f){el.L.1U.9f=o.9f;el.L.1U.o.2R(o.9f)}if(o.5R){el.L.1U.5R=o.5R}el.L.1U.o.B(\'Y\',\'1P\').B(\'Z\',el.L.4n.w+\'U\');if(o.5A&&o.5A==\'Q\'){el.L.1U.5A=\'Q\';el.L.1U.o.B(\'Q\',t+\'U\')}P{el.L.1U.5A=\'4D\';el.L.1U.o.B(\'4D\',b+\'U\')}el.L.1U.aE=o.aE?o.aE:\' \';24(D i=0;i<el.L.1Q.1g;i++){7Z=T(i)+1;el.L.1U.o.1S(\'<a 3h="#\'+7Z+o.1Z+\'" 6T="gR" 4g="\'+el.L.1Q[i].6L+\'">\'+7Z+\'</a>\'+(7Z!=el.L.1Q.1g?el.L.1U.aE:\'\'))}k(\'a\',el.L.1U.o).1J(\'5h\',u(){k.2u.go({90:q})});el.L.1U.4C=k.1a.2o(el.L.1U.o.K(0))}if(o.6Q||o.9c){el.L.2x={};1Z.1S(\'<22 6T="dn">&7k;</22>\');el.L.2x.o=k(\'.dn\',el);if(o.9c){el.L.2x.9c=o.9c;el.L.2x.o.2R(o.9c)}el.L.2x.o.B(\'Y\',\'1P\').B(\'Z\',el.L.4n.w+\'U\');if(o.6Q&&o.6Q==\'Q\'){el.L.2x.6Q=\'Q\';el.L.2x.o.B(\'Q\',(el.L.1U&&el.L.1U.5A==\'Q\'?el.L.1U.4C.hb+t:t)+\'U\')}P{el.L.2x.6Q=\'4D\';el.L.2x.o.B(\'4D\',(el.L.1U&&el.L.1U.5A==\'4D\'?el.L.1U.4C.hb+b:b)+\'U\')}el.L.2x.4C=k.1a.2o(el.L.2x.o.K(0))}if(o.9D){el.L.3s={9D:o.9D};1Z.1S(\'<a 3h="#2\'+o.1Z+\'" 6T="eY">&7k;</a>\');el.L.3s.o=k(\'.eY\',el);el.L.3s.o.B(\'Y\',\'1P\').B(\'19\',\'1o\').B(\'2U\',\'2K\').B(\'4A\',\'eR\').2R(el.L.3s.9D);el.L.3s.o.1J(\'5h\',k.2u.eg)}if(o.9o){el.L.3z={9o:o.9o};1Z.1S(\'<a 3h="#0\'+o.1Z+\'" 6T="ee">&7k;</a>\');el.L.3z.o=k(\'.ee\',el);el.L.3z.o.B(\'Y\',\'1P\').B(\'19\',\'1o\').B(\'2U\',\'2K\').B(\'4A\',\'eR\').2R(el.L.3z.9o);el.L.3z.o.1J(\'5h\',k.2u.dp)}1Z.bG(\'<22 6T="ca"></22>\');el.L.5u=k(\'.ca\',el);el.L.5u.B(\'Y\',\'1P\').B(\'Q\',\'2P\').B(\'O\',\'2P\').B(\'19\',\'1o\');if(o.2b){1Z.bG(\'<22 6T="dW" 14="19: 1o;"><1T 2J="\'+o.2b+\'" /></22>\');el.L.2b=k(\'.dW\',el);el.L.2b.B(\'Y\',\'1P\');D 1T=12 9s();1T.X=o.1Z;1T.2J=o.2b;if(1T.21){1T.6S=S;k.2u.go({2b:1T})}P{1T.6S=u(){k.2u.go({2b:q})}}}P{k.2u.go({1Z:el})}if(o.cS){fi=T(o.cS)*aC}k.2u.5I[o.1Z]=o.cS?1X.6V(\'k.2u.2I(\\\'\'+o.1Z+\'\\\')\',fi):S}};k.X=k.2u.2r;k.1t={7s:[],5L:{},1c:I,7u:S,26:u(){if(k.11.F==S){E}D 4O,3G,c,cs;k.1t.1c.K(0).3l=k.11.F.A.6R;4O=k.1t.1c.K(0).14;4O.19=\'2B\';k.1t.1c.1B=k.23(k.1a.3w(k.1t.1c.K(0)),k.1a.2o(k.1t.1c.K(0)));4O.Z=k.11.F.A.1B.1C+\'U\';4O.W=k.11.F.A.1B.hb+\'U\';3G=k.1a.cy(k.11.F);4O.5K=3G.t;4O.5z=3G.r;4O.5k=3G.b;4O.5j=3G.l;if(k.11.F.A.46==1b){c=k.11.F.fI(1b);cs=c.14;cs.5K=\'2P\';cs.5z=\'2P\';cs.5k=\'2P\';cs.5j=\'2P\';cs.19=\'2B\';k.1t.1c.5o().1S(c)}k(k.11.F).f5(k.1t.1c.K(0));k.11.F.14.19=\'1o\'},fC:u(e){if(!e.A.44&&k.1x.5r.cQ){if(e.A.3T)e.A.3T.1D(F);k(e).B(\'Y\',e.A.cz||e.A.4n);k(e).aS();k(k.1x.5r).f6(e)}k.1t.1c.4i(e.A.6R).3x(\'&7k;\');k.1t.7u=S;D 4O=k.1t.1c.K(0).14;4O.19=\'1o\';k.1t.1c.f5(e);if(e.A.fx>0){k(e).7f(e.A.fx)}k(\'2e\').1S(k.1t.1c.K(0));D 86=[];D 8q=I;24(D i=0;i<k.1t.7s.1g;i++){D 1j=k.1x.3P[k.1t.7s[i]].K(0);D id=k.1p(1j,\'id\');D 8i=k.1t.8x(id);if(1j.1i.ay!=8i.7l){1j.1i.ay=8i.7l;if(8q==I&&1j.1i.2Z){8q=1j.1i.2Z}8i.id=id;86[86.1g]=8i}}k.1t.7s=[];if(8q!=I&&86.1g>0){8q(86)}},al:u(e,o){if(!k.11.F)E;D 6e=I;D i=0;if(e.1i.el.1N()>0){24(i=e.1i.el.1N();i>0;i--){if(e.1i.el.K(i-1)!=k.11.F){if(!e.5V.b2){if((e.1i.el.K(i-1).1M.y+e.1i.el.K(i-1).1M.hb/2)>k.11.F.A.2q){6e=e.1i.el.K(i-1)}P{1r}}P{if((e.1i.el.K(i-1).1M.x+e.1i.el.K(i-1).1M.1C/2)>k.11.F.A.2v&&(e.1i.el.K(i-1).1M.y+e.1i.el.K(i-1).1M.hb/2)>k.11.F.A.2q){6e=e.1i.el.K(i-1)}}}}}if(6e&&k.1t.7u!=6e){k.1t.7u=6e;k(6e).h5(k.1t.1c.K(0))}P if(!6e&&(k.1t.7u!=S||k.1t.1c.K(0).31!=e)){k.1t.7u=S;k(e).1S(k.1t.1c.K(0))}k.1t.1c.K(0).14.19=\'2B\'},cT:u(e){if(k.11.F==S){E}e.1i.el.1E(u(){q.1M=k.23(k.1a.74(q),k.1a.7G(q))})},8x:u(s){D i;D h=\'\';D o={};if(s){if(k.1t.5L[s]){o[s]=[];k(\'#\'+s+\' .\'+k.1t.5L[s]).1E(u(){if(h.1g>0){h+=\'&\'}h+=s+\'[]=\'+k.1p(q,\'id\');o[s][o[s].1g]=k.1p(q,\'id\')})}P{24(a in s){if(k.1t.5L[s[a]]){o[s[a]]=[];k(\'#\'+s[a]+\' .\'+k.1t.5L[s[a]]).1E(u(){if(h.1g>0){h+=\'&\'}h+=s[a]+\'[]=\'+k.1p(q,\'id\');o[s[a]][o[s[a]].1g]=k.1p(q,\'id\')})}}}}P{24(i in k.1t.5L){o[i]=[];k(\'#\'+i+\' .\'+k.1t.5L[i]).1E(u(){if(h.1g>0){h+=\'&\'}h+=i+\'[]=\'+k.1p(q,\'id\');o[i][o[i].1g]=k.1p(q,\'id\')})}}E{7l:h,o:o}},fF:u(e){if(!e.dq){E}E q.1E(u(){if(!q.5V||!k(e).is(\'.\'+q.5V.3C))k(e).2R(q.5V.3C);k(e).7t(q.5V.A)})},4U:u(){E q.1E(u(){k(\'.\'+q.5V.3C).aS();k(q).dR();q.5V=S;q.fm=S})},2r:u(o){if(o.3C&&k.1a&&k.11&&k.1x){if(!k.1t.1c){k(\'2e\',1h).1S(\'<22 id="e5">&7k;</22>\');k.1t.1c=k(\'#e5\');k.1t.1c.K(0).14.19=\'1o\'}q.do({3C:o.3C,9J:o.9J?o.9J:I,a5:o.a5?o.a5:I,58:o.58?o.58:I,7x:o.7x||o.dC,7y:o.7y||o.fO,cQ:1b,2Z:o.2Z||o.ia,fx:o.fx?o.fx:I,46:o.46?1b:I,6I:o.6I?o.6I:\'cV\'});E q.1E(u(){D A={6N:o.6N?1b:I,ff:6P,1G:o.1G?2m(o.1G):I,6R:o.58?o.58:I,fx:o.fx?o.fx:I,44:1b,46:o.46?1b:I,3v:o.3v?o.3v:S,2p:o.2p?o.2p:S,4o:o.4o&&o.4o.1K==2A?o.4o:I,4m:o.4m&&o.4m.1K==2A?o.4m:I,3T:o.3T&&o.3T.1K==2A?o.3T:I,1O:/49|4j/.48(o.1O)?o.1O:I,6M:o.6M?T(o.6M)||0:I,2V:o.2V?o.2V:I};k(\'.\'+o.3C,q).7t(A);q.fm=1b;q.5V={3C:o.3C,6N:o.6N?1b:I,ff:6P,1G:o.1G?2m(o.1G):I,6R:o.58?o.58:I,fx:o.fx?o.fx:I,44:1b,46:o.46?1b:I,3v:o.3v?o.3v:S,2p:o.2p?o.2p:S,b2:o.b2?1b:I,A:A}})}}};k.fn.23({j3:k.1t.2r,f6:k.1t.fF,iS:k.1t.4U});k.iZ=k.1t.8x;k.2t={6O:S,7b:I,9m:S,6K:u(e){k.2t.7b=1b;k.2t.1Y(e,q,1b)},cq:u(e){if(k.2t.6O!=q)E;k.2t.7b=I;k.2t.2G(e,q)},1Y:u(e,el,7b){if(k.2t.6O!=S)E;if(!el){el=q}k.2t.6O=el;1M=k.23(k.1a.3w(el),k.1a.2o(el));8u=k(el);4g=8u.1p(\'4g\');3h=8u.1p(\'3h\');if(4g){k.2t.9m=4g;8u.1p(\'4g\',\'\');k(\'#eT\').3x(4g);if(3h)k(\'#bL\').3x(3h.4E(\'jh://\',\'\'));P k(\'#bL\').3x(\'\');1c=k(\'#8z\');if(el.4H.3l){1c.K(0).3l=el.4H.3l}P{1c.K(0).3l=\'\'}bo=k.1a.2o(1c.K(0));ga=7b&&el.4H.Y==\'bO\'?\'4D\':el.4H.Y;3m(ga){1e\'Q\':2q=1M.y-bo.hb;2v=1M.x;1r;1e\'O\':2q=1M.y;2v=1M.x-bo.1C;1r;1e\'2L\':2q=1M.y;2v=1M.x+1M.1C;1r;1e\'bO\':k(\'2e\').1J(\'3D\',k.2t.3D);1s=k.1a.4a(e);2q=1s.y+15;2v=1s.x+15;1r;ad:2q=1M.y+1M.hb;2v=1M.x;1r}1c.B({Q:2q+\'U\',O:2v+\'U\'});if(el.4H.54==I){1c.1Y()}P{1c.7f(el.4H.54)}if(el.4H.2Y)el.4H.2Y.1D(el);8u.1J(\'8B\',k.2t.2G).1J(\'5B\',k.2t.cq)}},3D:u(e){if(k.2t.6O==S){k(\'2e\').3q(\'3D\',k.2t.3D);E}1s=k.1a.4a(e);k(\'#8z\').B({Q:1s.y+15+\'U\',O:1s.x+15+\'U\'})},2G:u(e,el){if(!el){el=q}if(k.2t.7b!=1b&&k.2t.6O==el){k.2t.6O=S;k(\'#8z\').7a(1);k(el).1p(\'4g\',k.2t.9m).3q(\'8B\',k.2t.2G).3q(\'5B\',k.2t.cq);if(el.4H.3i)el.4H.3i.1D(el);k.2t.9m=S}},2r:u(M){if(!k.2t.1c){k(\'2e\').1S(\'<22 id="8z"><22 id="eT"></22><22 id="bL"></22></22>\');k(\'#8z\').B({Y:\'1P\',3I:6P,19:\'1o\'});k.2t.1c=1b}E q.1E(u(){if(k.1p(q,\'4g\')){q.4H={Y:/Q|4D|O|2L|bO/.48(M.Y)?M.Y:\'4D\',3l:M.3l?M.3l:I,54:M.54?M.54:I,2Y:M.2Y&&M.2Y.1K==2A?M.2Y:I,3i:M.3i&&M.3i.1K==2A?M.3i:I};D el=k(q);el.1J(\'9z\',k.2t.1Y);el.1J(\'6K\',k.2t.6K)}})}};k.fn.hO=k.2t.2r;k.84={bq:u(e){3K=e.7L||e.7K||-1;if(3K==9){if(1X.2k){1X.2k.bT=1b;1X.2k.c0=I}P{e.aP();e.aW()}if(q.b1){1h.6J.dZ().3g="\\t";q.dV=u(){q.6K();q.dV=S}}P if(q.aF){26=q.5q;2T=q.dN;q.2y=q.2y.hd(0,26)+"\\t"+q.2y.h8(2T);q.aF(26+1,26+1);q.6K()}E I}},4U:u(){E q.1E(u(){if(q.7P&&q.7P==1b){k(q).3q(\'7B\',k.84.bq);q.7P=I}})},2r:u(){E q.1E(u(){if(q.4Y==\'cf\'&&(!q.7P||q.7P==I)){k(q).1J(\'7B\',k.84.bq);q.7P=1b}})}};k.fn.23({j5:k.84.2r,hH:k.84.4U});k.1a={3w:u(e){D x=0;D y=0;D es=e.14;D bP=I;if(k(e).B(\'19\')==\'1o\'){D 5Y=es.3n;D 9q=es.Y;bP=1b;es.3n=\'2K\';es.19=\'2B\';es.Y=\'1P\'}D el=e;7d(el){x+=el.8t+(el.4Z&&!k.3a.7I?T(el.4Z.5b)||0:0);y+=el.8G+(el.4Z&&!k.3a.7I?T(el.4Z.4S)||0:0);el=el.dJ}el=e;7d(el&&el.4Y&&el.4Y.6c()!=\'2e\'){x-=el.3c||0;y-=el.3d||0;el=el.31}if(bP==1b){es.19=\'1o\';es.Y=9q;es.3n=5Y}E{x:x,y:y}},7G:u(el){D x=0,y=0;7d(el){x+=el.8t||0;y+=el.8G||0;el=el.dJ}E{x:x,y:y}},2o:u(e){D w=k.B(e,\'Z\');D h=k.B(e,\'W\');D 1C=0;D hb=0;D es=e.14;if(k(e).B(\'19\')!=\'1o\'){1C=e.4c;hb=e.5W}P{D 5Y=es.3n;D 9q=es.Y;es.3n=\'2K\';es.19=\'2B\';es.Y=\'1P\';1C=e.4c;hb=e.5W;es.19=\'1o\';es.Y=9q;es.3n=5Y}E{w:w,h:h,1C:1C,hb:hb}},74:u(el){E{1C:el.4c||0,hb:el.5W||0}},bm:u(e){D h,w,de;if(e){w=e.8W;h=e.8O}P{de=1h.5d;w=1X.d4||aa.d4||(de&&de.8W)||1h.2e.8W;h=1X.cB||aa.cB||(de&&de.8O)||1h.2e.8O}E{w:w,h:h}},6z:u(e){D t=0,l=0,w=0,h=0,iw=0,ih=0;if(e&&e.9N.6c()!=\'2e\'){t=e.3d;l=e.3c;w=e.d7;h=e.d2;iw=0;ih=0}P{if(1h.5d){t=1h.5d.3d;l=1h.5d.3c;w=1h.5d.d7;h=1h.5d.d2}P if(1h.2e){t=1h.2e.3d;l=1h.2e.3c;w=1h.2e.d7;h=1h.2e.d2}iw=aa.d4||1h.5d.8W||1h.2e.8W||0;ih=aa.cB||1h.5d.8O||1h.2e.8O||0}E{t:t,l:l,w:w,h:h,iw:iw,ih:ih}},cy:u(e,7N){D el=k(e);D t=el.B(\'5K\')||\'\';D r=el.B(\'5z\')||\'\';D b=el.B(\'5k\')||\'\';D l=el.B(\'5j\')||\'\';if(7N)E{t:T(t)||0,r:T(r)||0,b:T(b)||0,l:T(l)};P E{t:t,r:r,b:b,l:l}},aT:u(e,7N){D el=k(e);D t=el.B(\'5M\')||\'\';D r=el.B(\'5U\')||\'\';D b=el.B(\'5n\')||\'\';D l=el.B(\'4X\')||\'\';if(7N)E{t:T(t)||0,r:T(r)||0,b:T(b)||0,l:T(l)};P E{t:t,r:r,b:b,l:l}},6U:u(e,7N){D el=k(e);D t=el.B(\'4S\')||\'\';D r=el.B(\'5O\')||\'\';D b=el.B(\'5Q\')||\'\';D l=el.B(\'5b\')||\'\';if(7N)E{t:T(t)||0,r:T(r)||0,b:T(b)||0,l:T(l)||0};P E{t:t,r:r,b:b,l:l}},4a:u(2k){D x=2k.hT||(2k.gM+(1h.5d.3c||1h.2e.3c))||0;D y=2k.ki||(2k.iQ+(1h.5d.3d||1h.2e.3d))||0;E{x:x,y:y}},cI:u(4R,cx){cx(4R);4R=4R.7c;7d(4R){k.1a.cI(4R,cx);4R=4R.hQ}},h7:u(4R){k.1a.cI(4R,u(el){24(D 1p in el){if(2g el[1p]===\'u\'){el[1p]=S}}})},hV:u(el,1O){D 5l=k.1a.6z();D b6=k.1a.2o(el);if(!1O||1O==\'49\')k(el).B({Q:5l.t+((18.3r(5l.h,5l.ih)-5l.t-b6.hb)/2)+\'U\'});if(!1O||1O==\'4j\')k(el).B({O:5l.l+((18.3r(5l.w,5l.iw)-5l.l-b6.1C)/2)+\'U\'})},hW:u(el,dk){D 1Q=k(\'1T[@2J*="8X"]\',el||1h),8X;1Q.1E(u(){8X=q.2J;q.2J=dk;q.14.5E="9n:9w.9y.hE(2J=\'"+8X+"\')"})}};[].3J||(7F.hF.3J=u(v,n){n=(n==S)?0:n;D m=q.1g;24(D i=n;i<m;i++)if(q[i]==v)E i;E-1});',62,1293,'||||||||||||||||||||jQuery||||||this||||function||||||dragCfg|css|elm|var|return|dragged|easing|speed|false|callback|get|ss|options|iAuto|left|else|top|iResize|null|parseInt|px|oldStyle|height|slideshow|position|width||iDrag|new||style||||Math|display|iUtil|true|helper|subject|case|autoCFG|length|document|dropCfg|iEL|resizeOptions|carouselCfg|duration|interfaceFX|none|attr|sizes|break|pointer|iSort|type|ImageBox|queue|iDrop|iAutoscroller|slide|resizeElement|oC|wb|apply|each|fisheyeCfg|opacity|delta|newSizes|bind|constructor|custom|pos|size|axis|absolute|images|items|append|img|slideslinks|255|firstNum|window|show|container||complete|div|extend|for||start||cont|elsToScroll|100|loader|oR||body|elem|typeof|selectedItem|oldP|props|event|accordionCfg|parseFloat|field|getSize|containment|ny|build|relative|iTooltip|islideshow|nx|tp|slideCaption|value|newPosition|Function|block|selectHelper|step|border|itemWidth|hide|dequeue|timer|src|hidden|right|limit|nr|fractions|0px|PI|addClass|direction|end|overflow|cursorAt|result|parentData|onShow|onChange|to|parentNode|||||||||browser|iSlider|scrollLeft|scrollTop|scr|transferHelper|text|href|onHide|pre|selectdrug|className|switch|visibility|item|wrapper|unbind|max|nextslide|values|currentslide|handle|getPosition|html|newCoords|prevslide|iframe|iExpander|accept|mousemove|canvas|createElement|margins|onSlide|zIndex|indexOf|pressedKey|min|valueToAdd|multipleSeparator|pageSize|zones|highlighted|toggle|abs|onStop|dragElem|times|fadeDuration|diff|dhs|handlers||resizeDirection||vp|so|distance|ghosting||test|vertically|getPointer|startTop|offsetWidth|subjectValue|lastSuggestion|DropOutDirectiont|title|wrs|removeClass|horizontally|startLeft|out|onDrag|oP|onStart|nWidth|percent|down|ifxFirstDisplay|msie|iteration|ratio|clear|color|lastValue|slideCfg|fontSize|currentPointer|dimm|bottom|replace|up|prevImage|tooltipCFG|rel|els|fxCheckTag|context|nextImage|params|shs|fieldData|elToScroll|nodeEl|borderTopWidth|chunks|destroy|string|nHeight|paddingLeft|tagName|currentStyle||halign|slidePos|onclick|delay||containerW|from|helperclass|endLeft|endTop|borderLeftWidth|dragmoveBy|documentElement|dhe|newStyles|clonedEl|click|si|marginLeft|marginBottom|clientScroll|OpenClose|paddingBottom|empty|toWrite|selectionStart|overzone|toAdd|onDragModifier|holder|mousedown|animate|toDrag|cnt|marginRight|linksPosition|blur|getAttribute|hight|filter|sw|zoney|cos|slideshows|zonex|marginTop|collected|paddingTop|url|borderRightWidth|mouseup|borderBottomWidth|activeLinkClass|dragHandle|clearInterval|paddingRight|sortCfg|offsetHeight|prop|oldVisibility|styles||BlindDirection|point|fxh|nmp|old|post|currentPanel|onSelect|elementData|grid|pow|toLowerCase|animationHandler|cur|containerH|close|puff|getWidth|currentRel|imageEl|Expander|getHeight|iFisheye|random|newDimensions|itemHeight|reflections|sliders|selRange|wr|orig|margin|maxWidth|keyup|getScroll|captionText|totalImages|128|parseColor|curCSS|outerContainer|Scale|restore|tolerance|selection|focus|caption|snapDistance|revert|current|3000|captionPosition|hpc|onload|class|getBorder|setInterval|oldStyleAttr|rule|rgb|open|minLeft|ActiveXObject|oldDisplay|restoreStyle|getSizeLite||nw|0x||F0|fadeOut|focused|firstChild|while|cssRules|fadeIn|Date|minTop|backgroundColor|sc|nbsp|hash|captionEl|selectKeyHelper|selectCurrent|newTop|init|newLeft|changed|Draggable|inFrontOf|efx|139|onHover|onOut|getTime|np|keydown|split|radiusY|increment|Array|getPositionLite|selectClass|opera|onHighlight|keyCode|charCode|Object|toInteger|frameClass|hasTabsEnabled|zonew|user|zoneh|positionItems|onClick|oD|scrollIntoView|accordionPos|proximity|indic||data|containerSize|sin|iTTabs||ts|ImageBoxPrevImage|ImageBoxNextImage|imageSrc|newPos|maxHeight|minHeight|elS|activeClass|panels|maxBottom|maxRight|ser|move|opened|bounceout|animationInProgress|overlay|stop|reflectionSize|fnc|classname|insideParent|offsetLeft|jEl|nRy|pr|serialize|nRx|tooltipHelper|cssSides|mouseout|select|count|namedColors|padding|offsetTop|directionIncrement|parentEl|400|dir|expand|createTextNode|finishedPre|clientHeight|li|applyOn|content|contBorders|object|parentBorders|alpha|clientWidth|png|gallery|fontWeight|link|yproc|xproc|sx|parent|showImage|selectedone|imgs|onselect|sy|startDrag|cursor|captionClass|onselectstop|getElementById|linksClass|sh|ul|onActivate|isDroppable|nextEl|onDrop|oldTitle|progid|prevslideClass|prevEl|oldPosition|SliderContainer|Image|linkRel|selectKeyUp|selectKeyDown|DXImageTransform|inCache|Microsoft|mouseover|dragstop|diffX|211|nextslideClass|prot|auto|dEs|hidehelper|isDraggable|activeclass|unit|DoFold|unfold|nodeName|startTime|buildWrapper|prev|1px|oldColor|setTimeout|ScrollTo|st|sl|cssText|9999|next|destroyWrapper|opt|diffHeight|diffWidth|exec|hoverclass|image|blind|borderColor|sideEnd|self|key||default|2000|styleSheets|getValues|192|diffY|lnk|reflexions|checkhover|selectcheck|maxRotation|ImageBoxOuterContainer|gradient|panelHeight|childs|headers|ne|hideImage|minWidth|iIndex|itemsText|os|side|iCarousel|5625|1000|itemMinWidth|linksSeparator|setSelectionRange|protectRotation|positionContainer|posx|hoverClass|valToAdd|minchars|helperClass|source|nextImageEl|preventDefault|multiple|headerSelector|DraggableDestroy|getPadding|autofill|handleEl|stopPropagation|prevImageEl|getFieldValues|panelSelector|String|createTextRange|floats|lastSi|shrink|oPad|windowSize|paddingLeftSize|angle|paddingY|paddingX|RegExp|borderRightSize|floatVal|firstStep|pulse|Pulsate|Color|rotationSpeed|paddingBottomSize|remove|parseStyle|getClient|Number|helperSize|bounce|doTab||zoom|borderLeftSize|oBor|paddingRightSize|borderTopSize|paddingTopSize|stopAnim|pValue|borderBottomSize|extraWidth|restricted|autoSize|unselectable|SliderIteration|prepend|clearTimeout|isSlider|oneIsSortable|applyOnHover|tooltipURL|tabindex|draginit|mouse|restoreStyles|sliderSize|sliderPos|parentPos|cancelBubble|autocomplete|inputWidth|oldBorder|dragmove|clnt|sliderEl|returnValue|loaderWidth|idsa|letterSpacing|pause|getContainment|fade|snapToGrid|linear|10000|slideshowHolder|asin|cssSidesEnd|borderWidth|fitToContainer|TEXTAREA|entities|INPUT|spacer|writeItems|character|currentValue|paddings|169|oldFloat|borders|hidefocused|bouncein||modifyContainer|transparent|center|loadImage|func|getMargins|initialPosition|textAlign|innerHeight|Alpha|no|captionImages|closeEl|shake|prevTop|traverseDOM|Selectserialize|stopDrag|slider|ImageBoxCaption|ImageBoxIframe|300|ImageBoxOverlay|sortable|moveDrag|autoplay|measure|prevLeft|intersect|ImageBoxCurrentImage|selectstop|Shake|index|dragEl|keyPressed|scrollHeight|scroll|innerWidth|match|elPosition|scrollWidth|textImage|slideBor|jpg|captionSize|textImageFrom|visible||loaderHeight|ImageBoxCaptionImages||hoverItem|clickItem|emptyGIF||notColor|slideshowCaption|Droppable|goprev|childNodes|autocompleteHelper|autocompleteIframe|slidePad|fit|165|clientSize|||fontFamily|colorCssProps|elType|onhover|cssProps|expanderHelper|boxModel|itransferTo|keypress|moveStart|offsetParent|Width|selectstart|fxe|selectionEnd|checkCache|fontStyle|update|DroppableDestroy|remeasure|fontStretch|fontVariant|onblur|slideshowLoader|htmlEntities|wordSpacing|createRange|224|KhtmlUserSelect||closeHTML|on|sortHelper|245|userSelect|dragHelper|hrefAttr|dragstart|107|loaderSRC|highlight|slideshowPrevslide||gonext||styleFloat|frameborder|javascript|||relAttr|wid|scrolling||onslide|||listStyle|imageTypes|insertBefore|999|textDecoration|sqrt|140|230|maxy|240|ImageBoxContainer|doScroll|interval|set|dragmoveByKey|protect|ImageBoxCaptionText|144|ImageBoxLoader|off|checkdrop|isSelectable|hlt|30px|selectedclass|tooltipTitle|imagebox|shc|overlayOpacity|selRange2|slideshowNextSlide|gif|getSelectionStart|360|iAccordion|getElementsByTagName|iBounce|after|SortableAddItem|onResize|150|itemZIndex|grow|getHeightMinMax|borderTopUnit|selectcheckApply|borderRightUnit|zindex|fontUnit|togglehor|time|se|parte|easeout|isSortable||SlideInUp|fold|SlideOutUp|rgba|addColorStop|yfrac|containerMaxx|interfaceColorFX|containerMaxy||leftUnit|mousex||radiusX|check|getContext|xfrac|addItem|topUnit|fracH|cloneNode|togglever|paddingLeftUnit|borderBottomUnit|finish|onDragStop|onout|posy|isFunction|oldOverflow|directions|vertical|fracW|fakeAccordionClass|parts|fadeTo|inputValue|xml|selectstopApply|slideshowLinks|onDragStart|BlindUp|paddingTopUnit|500|trim|maxx|borderLeftUnit|paddingRightUnit|filteredPosition|BlindDown|paddingBottomUnit|horizontal|valign|find|ImageBoxClose|onselectstart|mozUserSelect|ondragstart|scale|110|globalCompositeOperation|bmp||drawImage|ondrop|password|quot||save|starty|jpeg|||number|startx|finishOpacity|hover|recallDroppables|flipv|finishx|destination|khtml|moz|lt|amp|pW|clientX|Accordion|translate|captiontext|elasticin|slideshowLink|fix|elasticout|resize|elasticboth|bounceboth|984375|9375|Selectable|30002|list|625|30001|nodeValue|before|100000|purgeEvents|substr|duplicate|moveEnd|||substring|success|param|par|array|Fisheye|name|POST|ajax|easeboth|location|fromHandler|collapse|MozUserSelect||ResizableDestroy|rotationTimer|fillRect|fill|WebKit|fillStyle|createLinearGradient|Resizable|navigator|appVersion|lineHeigt|alt|AlphaImageLoader|prototype|SliderGetValues|DisableTabs|Carousel|load|easein|IMG|200|Slider|ToolTip|wh|nextSibling|Autocomplete|SliderSetValues|pageX|float|centerEl|fixPNG|isNaN|dotted|dashed|stopAll|Left|outlineColor|Top|Right|Bottom|solid|double|selectorText|rules|onchange|SlideToggleRight|SlideOutRight||borderStyle||TransferTo||groove|ridge|inset|outset|borderTopColor||borderRightColor|olive|navy|orange||pink|203|maroon||magenta|182|193|lightyellow|lime|purple|red|outlineOffset|outlineWidth|borderBottomColor|borderLeftColor|lineHeight|loading|silver|white|yellow|Showing|100000000|SlideInRight|clientY|Highlight|SortableDestroy|CloseVertically|CloseHorizontally|FoldToggle|UnFold|SlideInDown|SlideToggleUp|SortSerialize|Fold|SwitchHorizontally|SwitchVertically|Sortable|scrollTo|EnableTabs|ScrollToAnchors|pt|Puff|OpenVertically|OpenHorizontally|Grow|Shrink|DropToggleRight|DropInRight|BlindToggleHorizontally|BlindRight|http|Bounce|120|BlindLeft|BlindToggleVertically|SlideToggleLeft|SlideOutLeft|toUpperCase|SlideInLeft|SlideToggleDown|SlideOutDown|DropOutLeft|DropInLeft|DropToggleLeft|DropOutRight|DropToggleUp|DropInUp|DropOutDown|DropInDown|DropToggleDown|DropOutUp|lightpink|textIndent|aqua|appendChild|azure|beige|220|last|cssFloat|first|ol|wrapEl|fxWrapper|black|imageLoaded|darkkhaki|darkgreen|189|183|darkmagenta|firstResize|darkgrey|brown|cyan|darkblue|darkcyan|table|form|col|tfoot|colgroup|th|header|thead|tbody|112|Autoexpand|tr|td|script|frame|input|pageY|textarea|button|w_|removeChild|frameset|option|optgroup|meta|darkolivegreen|blue|122|233|green|lightcyan|204|darkviolet|lightgreen|indigo|216|khaki|darksalmon|130|darkred|lightblue|148|173|215|238|fuchsia|gold|darkorchid|153|darkorange|lightgrey'.split('|'),0,{}))


/* ../plugins/auto/forms_et_tables_2_0/javascript/forms_lier_donnees.js */
jQuery.fn.ajaxWait=function(){
$(this).prepend("<div>"+ajax_image_searching+"</div>");
return this}
jQuery.fn.ajaxAction=function(){
var id=$(this).attr("id");
$('#'+id+' a.ajaxAction').click(function(){
var action=$(this).attr("href");
var idtarget=action.split('#')[1];
if(!idtarget)idtarget=id;
var url=(($(this).attr("rel")).split('#'))[0];
var redir=url+"&var_ajaxcharset="+ajaxcharset+"&bloc="+idtarget;
action=(action.split('#')[0]).replace(/&?redirect=[^&#]*/,'');
$('#'+idtarget).ajaxWait();
$.get(action,{redirect:redir},function(data){$('#'+idtarget).html(data).ajaxAction()});
return false});
$('#'+id+' form.ajaxAction').each(function(){
var idtarget=$(this).children('input[name=idtarget]').val();
if(!idtarget)idtarget=$(this).parent().attr("id");
var redir=$(this).children('input[name=redirectajax]');
var url=(($(redir).val()).split('#'))[0];
$(this).children('input[name=redirect]').val(url+"&var_ajaxcharset="+ajaxcharset+"&bloc="+idtarget);
$(redir).after("<input type='hidden' name='var_ajaxcharset' value='"+ajaxcharset+"' />");
$(this).ajaxForm({"target":'#'+idtarget,
"after":
function(){
$('#'+idtarget).ajaxAction()},
"before":
function(param,form){
$('#'+idtarget).prepend("<div>"+ajax_image_searching+"</div>")}
})});
var script=$('input[name=autocompleteUrl]').val();
$('#autocompleteMe').Autocomplete(
{
source:script,
delay:300,
autofill:false,
helperClass:'autocompleter',
selectClass:'selectAutocompleter',
minchars:1,
onSelect:setDonnee
}
)}
var setDonnee=function(data){
$('#_id_donnee_liee').val(data.id_donnee)};
$(document).ready(function(){
$('#forms_lier_donnees').ajaxAction();
$('#forms_donnees_liantes').ajaxAction()});


/* ../local/couteau-suisse/header_prive.js */
var cs_prive=window.location.pathname.match(/\/ecrire\/$/)!=null;
jQuery.fn.cs_todo=function(){return this.not('.cs_done').addClass('cs_done')};
var onglet_actif=0;
jQuery.fn.montre_onglet=function(selector){
if(this.is('.onglets_titre')){
var contenu='#'+this[0].id.replace(/titre/,'contenu');
var bloc=this.parent().parent();
bloc.children('.selected').removeClass('selected').end()
.children('.onglets_liste').children('.selected').removeClass('selected');
jQuery(contenu).addClass('selected');
this.addClass('selected')}
if(this.is('.onglets_contenu')){
var titre=this[0].id.replace(/contenu/,'titre');
jQuery('#'+titre).montre_onglet()}
return this};
function onglets_init(){
var cs_bloc=jQuery('div.onglets_bloc_initial',this);
if(cs_bloc.length){
cs_bloc.prepend('<div class="onglets_liste"></div>')
.children('.onglets_contenu').each(function(i){
this.id='onglets_contenu_'+i;
jQuery(this).parent().children('.onglets_liste').append(
'<h2 id="'+'onglets_titre_'+i+'" class="onglets_titre">'+this.firstChild.innerHTML+'</h2>'
)})
.children('h2').remove();
jQuery('div.onglets_liste',this).each(function(){
this.firstChild.className+=' selected';
this.nextSibling.className+=' selected'});
jQuery('h2.onglets_titre',this).hover(
function(){
jQuery(this).addClass('hover')
},function(){
jQuery(this).removeClass('hover')
}
);
jQuery('div.onglets_bloc_initial',this)
.attr('class','onglets_bloc').each(function(i){this.id='ongl_'+i});
jQuery('h2.onglets_titre',this).click(function(e){
jQuery(this).montre_onglet();
return false});
jQuery('h2.onglets_titre a',this).click(function(e){
jQuery(this).parents('h2').click();
if(e.stopPropagation)e.stopPropagation();
e.cancelBubble=true;
return false});
if(onglet_get&&(this==document)){
sel=jQuery('#onglets_titre_'+onglet_get);
sel.click()}
jQuery('.spip_note['+cs_sel_jQuery+'name^=nb], .spip_note['+cs_sel_jQuery+'id^=nb]').each(function(i){
jQuery(this).click(function(e){
var href=this.href.substring(this.href.lastIndexOf("#"));
jQuery(href).parents('.onglets_contenu').eq(0).montre_onglet();
return true})})}
}
function get_onglet(url){
tab=url.search.match(/[?&]onglet=([0-9]*)/)||url.hash.match(/#onglet([0-9]*)/);
if(tab==null)return false;
return tab[1]}
var onglet_get=get_onglet(window.location);
function lancerlien(a,b){x='ma'+'ilto'+':'+a+'@'+b;return x}
function soft_scroller_init(){if(typeof jQuery.localScroll=="function")jQuery.localScroll({hash:true})}
jQuery.fn.blocs_toggle_slide_dist=function(selector){
this.toggleClass('blocs_slide');
if(typeof jQuery.fn.blocs_toggle_slide=='function')
return this.blocs_toggle_slide();
return this.is(".blocs_slide")?this.slideUp(blocs_slide):this.slideDown(blocs_slide)};
jQuery.fn.blocs_set_title=function(selector){
var title=this.parent().find('.blocs_title:last').text();
if(!title)title=blocs_title_def;
title=title.split(blocs_title_sep);
this.children('a').attr('title',title[jQuery(this).is('.blocs_replie')?0:1]);
return this};
jQuery.fn.blocs_toggle=function(){
if(!this.length)return this;
var cible=this.is('.cs_blocs')?this.children('.blocs_titre').eq(0):this;
cible.toggleClass('blocs_replie').blocs_set_title();
var dest=this[0].id.match('^cs_bloc_id_')?jQuery('div.'+this[0].id):cible.next();
if(blocs_slide==='aucun'){
dest.toggleClass('blocs_invisible');
if(dest.is('div.blocs_resume'))dest.next().toggleClass('blocs_invisible')}else{
dest.blocs_toggle_slide_dist();
if(dest.is('div.blocs_resume'))dest.next().blocs_toggle_slide_dist()}
var lien=cible.children();
var url=lien.attr("href");
if(url!='javascript:;'){
lien.attr("href",'javascript:;');
cible.parent().children(".blocs_destination")
.load(url)}
return this};
jQuery.fn.blocs_replie_tout=function(){
if(blocs_replier_tout){
var cible=this.is('.cs_blocs')?this:this.parents('div.cs_blocs');
var lignee=cible.children('.blocs_titre');
jQuery('.blocs_titre').not('.blocs_replie').not(lignee).blocs_toggle()}
return this}
var blocs_clic_ajax=null;
function blocs_init(){
jQuery('.blocs_titre',this).cs_todo()
.click(function(){
jQuery(this).blocs_replie_tout().blocs_toggle();
return false})
.each(function(){
jQuery(this).blocs_set_title()});
jQuery('.blocs_destination a.replier_bloc',this).cs_todo()
.click(function(){
s=jQuery(this).parents('.cs_blocs:first');
if(typeof jQuery.fn.scrollTo=="function")jQuery('body').scrollTo(s,500,
{margin:true,onAfter:function(){s.blocs_replie_tout().blocs_toggle()}});
else s.blocs_replie_tout().blocs_toggle();
return false});
jQuery('.spip_note['+cs_sel_jQuery+'name^=nb], .spip_note['+cs_sel_jQuery+'id^=nb]').each(function(i){
jQuery(this).click(function(e){
var href=this.href.substring(this.href.lastIndexOf("#"));
href=jQuery(href).parents('.cs_blocs').eq(0).children('.blocs_titre').eq(0);
old_blocs_slide=blocs_slide;
if(blocs_slide!='aucun')blocs_slide=-1;
if(href.is('.blocs_replie'))href.click();
blocs_slide=old_blocs_slide;
return true})})}
document.write('<style type="text/css">div.blocs_invisible{display:none;}</style>');
function cs_blocs_cookie(){
if(typeof jQuery.cookie!='function')return;
var blocs_cookie_name='blocs'+window.location.pathname+window.location.search
blocs_cookie_name=blocs_cookie_name.replace(/[ ;,=]/,'_');
var deplies=jQuery.cookie(blocs_cookie_name);
jQuery.cookie(blocs_cookie_name,null);
if(deplies)
jQuery(deplies).blocs_replie_tout().blocs_toggle();
jQuery(window).bind('unload',function(){
jQuery.cookie(blocs_cookie_name,blocs_deplies())})}
function blocs_deplies(){
var deplies='';
jQuery('.cs_blocs').each(function(){
var numero=/cs_bloc\d+/.exec(this.className);
if(numero==null)return;
replie=jQuery(this).children('.blocs_titre').eq(0).is('.blocs_replie');
if(!replie)deplies+=(deplies.length?', ':'')+'div.'+numero[0]});
return deplies.length?deplies:null}
function blocs_get_pagination(url){
tab=url.match(/#pagination([0-9]+)/);
if(tab==null)return false;
return tab[1]}
var blocs_pagination=blocs_get_pagination(window.location.hash);
var blocs_replier_tout=0;
var blocs_millisec=100;
var blocs_slide='slow';
var blocs_title_sep=/\|\|/g;
var blocs_title_def='Déplier||Replier';
var cs_init=function(){
onglets_init.apply(this);
jQuery('span.spancrypt',this).attr('class','cryptOK').html('&#6'+'4;');
jQuery("a["+cs_sel_jQuery+"title*='..']",this).each(function(){
this.title=this.title.replace(/\.\..t\.\./,'[@]')});
soft_scroller_init.apply(this);
blocs_init.apply(this)}
if(typeof onAjaxLoad=='function')onAjaxLoad(cs_init);
if(window.jQuery){
var cs_sel_jQuery=typeof jQuery(document).selector=='undefined'?'@':'';
var cs_CookiePlugin="../prive/javascript/jquery.cookie.js";
jQuery(document).ready(function(){
cs_init.apply(document)})}


/* page=ckeditor4spip.js */
var ckeDataProcessor;
var sansConversion=false;
if(sansConversion){
spipDataProcessor={
toDataFormat:function(html,fixForBody){
if(fixForBody){
return ckeDataProcessor.toDataFormat(html,fixForBody).replace(/<head[^>]*>(.|\r|\n)*<\/head>/,'').replace(/[\r\n\s]*<body[^>]*>[\r\n\s]*/,'').replace(/[\r\n\s]*<\/body>[\r\n\s]*/,'')}else{
return ckeDataProcessor.toDataFormat(html,fixForBody)}
},
toHtml:function(data,fixForBody){
if(fixForBody){
return'<html><head><title></title></head><body>'+ckeDataProcessor.toHtml(data.replace(/<html>/,'').replace(/<\/html>/,''),fixForBody)+'</body></html>'}else{
return ckeDataProcessor.toHtml(data,fixForBody)}
}
}}else{
spipDataProcessor={
toDataFormat:function(html,fixForBody){
return $.ajax({url:CKEDITOR.spipurl+'?page=ckspip_convert',data:{text_area:html.replace(/<span\s+data-scayt[^>]*>\s*(.*?)\s*<\/span>/g,'$1'),cvt:'html2spip',fix:fixForBody},global:false,type:'POST',dataType:'text',async:false}).responseText},
toHtml:function(data,fixForBody){
return $.ajax({url:CKEDITOR.spipurl+'?page=ckspip_convert',data:{text_area:data.replace(/<span\s+data-scayt[^>]*>\s*(.*?)\s*<\/span>/g,'$1'),cvt:'spip2html',fix:fixForBody},global:false,type:'POST',dataType:'text',async:false}).responseText}
}}
function htmldecode(s){
return $('<div/>').html(s).text()}
function HideSpipUI(editor_id){
if($(editor_id).size()==0){return}
var crayon=editor_id.match(/^(#crayon_\d+)\s/);
if(crayon){
stack[editor_id].crborder=$(crayon[1]+' .formulaire_spip').css('border');
stack[editor_id].crbg=$(crayon[1]+' .formulaire_spip').css('background-color');
$(crayon[1]+' .formulaire_spip')
.css('border','none')
.css('background-color','white')}
var item=$(editor_id).parents().find('.edition');
if(editor_id.match(/^#formulaire_forum\s/)){
stack[editor_id].fobd=item.css('border');
stack[editor_id].fobg=item.css('background');
item.css('border','none');
item.css('background','none')}
item
.find('.spip_barre').css('display','none').end()
.find('.explication').css('display','none').end()
.find('.markItUpHeader').css('display','none').end()
.find('.markItUpTabs').css('display','none').end()
.find('.markItUpPreview').css('display','none').end()
.find('.markItUpFooter').css('display','none')}
function ShowSpipUI(editor_id){
if($(editor_id).size()==0){return}
if(!stack[editor_id].nobarre){
$(editor_id).removeClass('no_barre');
barrebouilles_editor(editor_id);
stack[editor_id].nobarre=false}
var item=$(editor_id).parents().find('.edition');
if(editor_id.match(/^#formulaire_forum\s/)){
item.css('border',stack[editor_id].fobd);
item.css('background',stack[editor_id].fobg)}
var crayon=editor_id.match(/^(#crayon_\d+)\s/);
if(crayon){
$(crayon[1]+' .formulaire_spip')
.css('border',stack[editor_id].crborder)
.css('background-color',stack[editor_id].crbg)}
if(item.find('.markItUpTabs .previsuVoir').hasClass('on')){
item.find('.markItUpTabs').css('display','').end()
.find('.markItUpPreview').css('display','block').end()
.find('.markItUpEditor').css('display','none')}else{
item.find('.spip_barre').css('display','').end()
.find('.explication').css('display','').end()
.find('.markItUpHeader').css('display','').end()
.find('.markItUpTabs').css('display','').end()
.find('.markItUpFooter').css('display','').end()
.find('.markItUpEditor').css('display','block').end()
.find('.markItUpPreview').css('display','none')}
}
var stack=[];
function SpipEditor2CKEditor(editor_id){
if($(editor_id).size()==0){return}
$('#swapeditor_'+stack[editor_id].ndx)
.attr('disabled',true)
.attr('title',htmldecode('Chargement'))
.find('img')
.attr('src','http://realestatecaretaking.com/plugins/ckeditor-spip-plugin/images/searching.gif');
$(editor_id).attr('disabled',true);
var EdConfig={};$.extend(EdConfig,CKEDITOR.ckConfig);
EdConfig.toolbar='Spip'+stack[editor_id].tb;
HideSpipUI(editor_id);
$(editor_id).ckeditor(function(){
stack[editor_id].n='#'+this.container.getId();
stack[editor_id].dw=$('.cadre-formulaire-editer').width()-$(stack[editor_id].n).width();
var cke=$(editor_id).ckeditorGet();
cke.on('resize',function(e){
$('.cadre-formulaire-editer').width($(stack[editor_id].n).width()+stack[editor_id].dw)});
contexteChange(editor_id);
$(editor_id).attr('disabled','');
$('#swapeditor_'+stack[editor_id].ndx)
.attr('title',htmldecode('Utiliser l&#39;&#233;diteur de SPIP'))
.find('img')
.attr('src','http://realestatecaretaking.com/plugins/ckeditor-spip-plugin/images/ckeditor_spip.png')
.end()
.attr('disabled','');
cke.setReadOnly(false)},EdConfig)}
function barrebouilles_editor(editor_id){
if($(editor_id).hasClass('inserer_barre_forum'))
$(editor_id).barre_outils('forum');
if($(editor_id).hasClass('inserer_barre_edition'))
$(editor_id).barre_outils('edition');
if($(editor_id).hasClass('inserer_previsualisation'))
$(editor_id).barre_previsualisation();
if($(editor_id).hasClass('textarea_forum'))
$(editor_id).barre_outils('forum');
if($(editor_id).attr('name').match(/^(texte|\w+_texte)$/)){
if(!editor_id.match(/\b#formulaire_forum\b/)){
$(editor_id).barre_outils('edition').barre_previsualisation()}
else{
$(editor_id).barre_outils('forum')}
}
}
function CKEditor2SpipEditor(editor_id){
if($(editor_id).size()==0){return}
$('#swapeditor_'+stack[editor_id].ndx)
.attr('disabled',true)
.attr('title',htmldecode('Chargement'))
.find('img')
.attr('src','http://realestatecaretaking.com/plugins/ckeditor-spip-plugin/images/searching.gif');
$(editor_id)
.attr('disabled',true)
.css('display','block')
.ckeditorGet().destroy();
ShowSpipUI(editor_id);
$('#swapeditor_'+stack[editor_id].ndx)
.attr('title',htmldecode('Utiliser CKEditor'))
.find('img')
.attr('src','http://realestatecaretaking.com/plugins/ckeditor-spip-plugin/images/ckeditor.png')
.end()
.attr('disabled','');
$(editor_id)
.attr('disabled','')}
function SwapEditor(editor_id){
if($(editor_id).size()==0){return}
try{
CKEditor2SpipEditor(editor_id)}catch(e){
SpipEditor2CKEditor(editor_id)}
}
function contexteChange(editor_id){
if($(editor_id).size()==0){return}
if($("#contexte_"+stack[editor_id].ndx).length){
var contexte=$("#contexte_"+stack[editor_id].ndx).val().match(/^([\.#])(.*)$/);
if(stack[editor_id].ctx){
if(stack[editor_id].ctx[1]=="#"){
$(stack[editor_id].n+' iframe').contents().find('body').attr('id','')}else{
$(stack[editor_id].n+' iframe').contents().find('body').removeClass(stack[editor_id].ctx[2])}
}
stack[editor_id].ctx=contexte;
if(contexte){
if(contexte[1]=="#"){
$(stack[editor_id].n+' iframe').contents().find('body').attr('id',contexte[2])}else{
$(stack[editor_id].n+' iframe').contents().find('body').addClass(contexte[2])}
}
}
}
function cke_crayon_submit(editor_id){
if($(editor_id).size()==0){return}
try{
$(editor_id).ckeditorGet().updateElement()}catch(e){}
$(this).parents('.formulaire_crayon').submit()}
function fullInitCKEDITOR(editor_ids){
if(!editor_ids)editor_ids=[["textarea[name=texte]","Full"]];
initCKEDITOR();
CKEDITOR.ckConfig.on={
'pluginsLoaded':function(ev){ckeDataProcessor=ev.editor.dataProcessor;ev.editor.dataProcessor=spipDataProcessor}
};
if(!CKEDITOR.fullInitDone){
CKEDITOR.on('dialogDefinition',function(ev){
var dialogName=ev.data.name,
dialogDefinition=ev.data.definition;
if(dialogName==='about'){
var aboutTab=dialogDefinition.getContents('tab1');
aboutTab.add({
'type':'html',
'html':'<div style="padding:0 10px 10px 10px;">Copyright &copy; 2009 <a style="text-decoration:underline;color:blue;cursor:pointer;" href="http://code.google.com/p/ckeditor-spip-plugin/">Plugin SPIP</a> - Fr&#233;d&#233;ric Bonnaud, Mehdi Cherifi, Emmanuel Dreyfus</div>'
})}
var advTab=dialogDefinition.getContents('advanced');
if(advTab){
var advClasses=advTab.get('advCSSClasses');
if(advClasses){
advClasses['default']='spip'}
}
});
for(var plugin in CKEDITOR.ckConfig.loadExtraPlugins){
CKEDITOR.plugins.addExternal(plugin,CKEDITOR.ckConfig.loadExtraPlugins[plugin])}
CKEDITOR.fullInitDone=true}
for(var id in editor_ids){
var editor_id=editor_ids[id][0],editor_tb=editor_ids[id][1],crayon=editor_ids[id][2];
if(CKEDITOR.version<CKEDITOR.ckpreferedversion){
var pref='CKEditor version %1 est install&#233;, ce plugin pr&#233;f&#233;rerait la version %2. Veuillez d&#39;abord d&#233;sintaller la version actuelle.';
$(editor_id).after(
'<div class="erreur_message">'+pref.replace(/%2/,CKEDITOR.ckpreferedversion).replace(/%1/,CKEDITOR.version)+'</div>'
)}
var ndx=$('[id^=cke_cpt_]').size(),buttons='';
while($('[id=cke_cpt_'+ndx+']').size()>0){ndx++}
stack[editor_id]={'n':null,'w':null,'wr':null,'ctx':null,'crayons':0,'ndx':ndx,'tb':editor_tb};
stack[editor_id].nobarre=($(editor_id).hasClass('no_barre')||CKEDITOR.ckeditmode=='spip');
if(!stack[editor_id].nobarre)
$(editor_id).addClass('no_barre');
$(editor_id).after('<span id="cke_cpt_'+ndx+'"></span>');
if(CKEDITOR.ckeditmode!='ckeditor-exclu'){
buttons=buttons+
'<button style="margin-right:15px;width:40px;height:24px;" type="button" id="swapeditor_'+ndx+'" onclick="javascript:SwapEditor(\''+editor_id+'\');" title="'
+htmldecode(CKEDITOR.ckeditmode=='spip'?'Utiliser CKEditor':'Utiliser l&#39;&#233;diteur de SPIP')
+'"><img src="http://realestatecaretaking.com/plugins/ckeditor-spip-plugin/images/ckeditor.png"/></button>'}
;
if(buttons)
$(editor_id).before('<div id="cke_buttons_'+ndx+'" style="clear:both;width:100%;height:24px;margin:2px 0 5px 0;padding:0;"><a name="cke_buttons_ancre_'+ndx+'"></a>'+buttons+'</div>');
if(crayon){
$('#'+crayon+' .crayon-submit')
.after('<button id="save" style=\'background:url("http://realestatecaretaking.com/plugins/auto/crayons/images/ok.png") no-repeat scroll left top transparent;\' onclick="javascript:return cke_crayon_submit(\''+editor_id+'\');" title="Enregistrer">Enregistrer</button>')
.remove()}
}
if(CKEDITOR.ckeditmode!='spip'){
for(var id in editor_ids){
SpipEditor2CKEditor(editor_ids[id][0])}
}
$("div[ondblclick^=barre_inserer]").each(function(){
var spip_dblclick=$(this).attr('ondblclick'),
str_dblclick=""+spip_dblclick;
params=str_dblclick.match(/barre_inserer\(\s*"(.*)"\s*,\s*\$\("(.*)"\)/);
if((params!=null)&&params[1]&&params[2]){
var insert_text=params[1],insert_html=null,
doc=insert_text.match(/^(<|&lt;|&#60;|\u003c)([a-zA-Z]*)(\d*)(.*)(>|&gt;|&#62;|\u003e)$/);
if(doc){
var doc_url=$.trim($.ajax({
url:CKEDITOR.spipurl+'?page=ckdoc&id='+doc[3],
async:false,
dataType:'text'
}).responseText),
alignement=doc[4].match(/(.*)\|(left|center|right)(|\|(.*))/),style='',align='';
if(alignement){
if(alignement[2]=='left'){
align=" align='left'"}else if(alignement[2]=='right'){
align=" align='right'"}else if(alignement[2]=='center'){
align=" align='middle'";
style="display:block;margin-left:auto;margin-right:auto;"}
}
if(CKEDITOR.ckConfig.vignette>0){
style=style+"max-width:"+CKEDITOR.ckConfig.vignette+"px;max-height:"+CKEDITOR.ckConfig.vignette+"px;"}
style=(style?" style='"+style+"'":'');
insert_html="<img src='"+doc_url+"?docid="+doc[3]+"&doctype="+doc[2]+"' alt='"+doc[2]+doc[3]+doc[4]+"'"+align+style+" />"}
$(this)
.attr('ondblclick',null)
.dblclick(function(){
try{
if(insert_html){
$(params[2]).ckeditorGet().insertHtml(insert_html)}else if(insert_text){
$(params[2]).ckeditorGet().insertText(insert_text)}
}catch(e){
spip_dblclick()}
})}
})}


