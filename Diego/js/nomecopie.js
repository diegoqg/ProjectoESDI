
		  function mostraModal(n,o, x){
		  	var modal = "openmodal"+x;
			  var sect1 = document.getElementById(modal);

			  if (n==1){
				  if (o==1){
					 sect1.style.zIndex = "100"; 
				  }
				  if(o==2){
					  sect1.style.zIndex = "-2";
				  }
			  }
			  if(n==2){
				  if (o==1){
					  sect1.style.zIndex = "100"; 
				  }
				  if(o==2){
					  sect1.style.zIndex = "-2";
				  }
			  }

			
		  }
	
		