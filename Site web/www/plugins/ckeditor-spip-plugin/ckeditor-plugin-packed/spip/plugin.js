CKEDITOR.plugins.add("spip",{requires:["dialog"],lang:["ar","en","fr"],init:function(a){if(CKEDITOR.env.ie6Compat){return}a.addCommand("spip",new CKEDITOR.dialogCommand("spip"));a.ui.addButton("Spip",{label:a.lang.spip.title,command:"spip",icon:this.path+"spip.gif"});CKEDITOR.dialog.add("spip",this.path+"dialogs/spip.js")}});