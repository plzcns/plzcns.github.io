(function(){tinymce.PluginManager.requireLangPack('emailtags');tinymce.create('tinymce.plugins.ExamplePlugin',{init:function(ed,url){},createControl:function(n,cm){switch(n){case'emailtags':var arrEmailTags=[["Paper Title","{paper-title}"],["Total Paper Mark","{total-paper-mark}"],["Random mark for Paper","{random-mark}"],["Student Title","{student-title}"],["Student Last Name","{student-last-name}"],["Student Mark","{student-mark}"],["Student %","{student-percent}"],["Student Time","{student-time}"],["Class mean Mark","{class-mean-mark}"],["Class mean percent","{class-mean-percent}"],["Class StDev","{class-stdev}"],["Class max mark","{class-max-mark}"],["Class min mark","{class-min-mark}"],["Class mean time","{class-mean-time}"]];var mlb=cm.createListBox('emailtags',{title:'Insert tag:    ',onselect:function(v){tinyMCE.activeEditor.selection.setContent(v);tinyMCE.activeEditor.focus()}});for(i=0;i<arrEmailTags.length;i++){mlb.add(arrEmailTags[i][0],arrEmailTags[i][1])}return mlb}return null},getInfo:function(){return{longname:'Email tags plugin',author:'Rob Ingram',authorurl:'https://rogo-eassessment-docs.atlassian.net',infourl:'https://rogo-eassessment-docs.atlassian.net',version:"1.0"}}});tinymce.PluginManager.add('emailtags',tinymce.plugins.ExamplePlugin)})();