function convertToSlug( str ) {
	
    //replace all special characters | symbols with a space
    str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
      
    // trim spaces at start and end of string
    str = str.replace(/^\s+|\s+$/gm,'');
      
    // replace space with dash/hyphen
    str = str.replace(/\s+/g, '-');	
    
    document.getElementById("url").value= str;
    
    //return str;
  }
  function convertToComa( str1 ) {
      
      //replace all special characters | symbols with a space
      str1 = str1.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
        
      // trim spaces at start and end of string
      str1 = str1.replace(/^\s+|\s+$/gm,'');
        
      // replace space with dash/hyphen
      str1 = str1.replace(/\s+/g, ', ');	
      
      document.getElementById("seo_title").value= str1;
    //return str;
    }