
		  function mostraLogin(n,o){
			  var sect1 = document.getElementById('openLogin');
			  var sect2 = document.getElementById('openLoginE');
			  var btn1 = document.getElementById('btn_cerrar1');
			  var btn2 = document.getElementById('btn_cerrar2');
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
					  sect2.style.zIndex = "100"; 
				  }
				  if(o==2){
					  sect2.style.zIndex = "-2";
				  }
			  }
		  }
	
		  function cambiaVisibilidad(s){
			  var div1 = document.getElementById('form_user2');
			  var div3 = document.getElementById('form_user');
			  var div2 = document.getElementById('form_refuge2');
			  var div4 = document.getElementById('form_refuge');
			  var btn1 = document.getElementById('btnUser2');			  
			  var btn2 = document.getElementById('btnRefuge2');
			  var btn3 = document.getElementById('btnUser');			  
			  var btn4 = document.getElementById('btnRefuge');
			  if (s==1){
				 btn2.style.backgroundColor = "#F88425";
				 btn1.style.backgroundColor = "#ffffff";
				 btn1.style.color = "black";
				 div2.style.display = 'none';
				 div1.style.display = 'block'; 
				 
				 btn4.style.backgroundColor = "#F88425";
				 btn3.style.backgroundColor = "#ffffff";
				 btn3.style.color = "black";
				 div4.style.display = 'none';
				 div3.style.display = 'block'; 
			  }
			  if(s==2){
				 btn3.style.backgroundColor = "#F88425";
				 btn4.style.backgroundColor = "#ffffff";
				 btn4.style.color = "black";
				 div3.style.display = 'none';
				 div4.style.display = 'block';  
			  }
		  }
		  
		  function cambiaVisibilidads(s){
			  var div1 = document.getElementById('form_Ruser');
			  var div2 = document.getElementById('form_Rrefuge');
			  if (s==1){
				 div2.style.display = 'none';
				 div1.style.display = 'block'; 
			  }
			  if(s==2){
				 div1.style.display = 'none';
				 div2.style.display = 'block';  
			  }
		  }