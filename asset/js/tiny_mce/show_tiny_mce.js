  tinyMCE.init({
    // General options
    mode : "textareas",
    elements : "ajaxfilemanager",
    theme : "advanced",
    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
    // theme_advanced_disable: "image,advimage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,
    file_browser_callback : "ajaxfilemanager",

    // Example content CSS (should be your site CSS)
    content_css : "../../../asset/css/tiny_mce/content.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "../../../asset/js/tiny_mce/lists/template_list.js",
    external_link_list_url : "../../../asset/js/tiny_mce/lists/link_list.js",
    external_image_list_url : "../../../asset/js/tiny_mce/lists/image_list.js",
    media_external_list_url : "../../../asset/js/tiny_mce/lists/media_list.js",

    // Style formats
    style_formats : [
      {title : 'Bold text', inline : 'b'},
      {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
      {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
      {title : 'Example 1', inline : 'span', classes : 'example1'},
      {title : 'Example 2', inline : 'span', classes : 'example2'},
      {title : 'Table styles'},
      {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    ],

    // Replace values for the template plugin
    template_replace_values : {
      username : "Some User",
      staffid : "991234"
    }
  });

  function ajaxfilemanager(field_name, url, type, win) {
      var ajaxfilemanagerurl = "../../asset/js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?editor=tinymce";
      var view = 'detail';
      switch (type) {
        case "image":
        view = 'thumbnail';
          break;
        case "media":
          break;
        case "flash": 
          break;
        case "file":
          break;
        default:
          return false;
      }
            tinyMCE.activeEditor.windowManager.open({
                url: "../../asset/js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?editor=tinymce",
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
/*            return false;     
      var fileBrowserWindow = new Array();
      fileBrowserWindow["file"] = ajaxfilemanagerurl;
      fileBrowserWindow["title"] = "Ajax File Manager";
      fileBrowserWindow["width"] = "782";
      fileBrowserWindow["height"] = "440";
      fileBrowserWindow["close_previous"] = "no";
      tinyMCE.openWindow(fileBrowserWindow, {
        window : win,
        input : field_name,
        resizable : "yes",
        inline : "yes",
        editor_id : tinyMCE.getWindowArg("editor_id")
      });
      
      return false;*/
    }
