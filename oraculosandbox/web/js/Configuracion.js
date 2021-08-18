  function refrescar_log(item)
  {
      var aURL = "trae.php";
      var params = "proce=" + item;
      var ajx = new Ajax.Updater("centro", aURL , {method:"post", parameters:params });
  }

  function refrescar(item)
  {
     // alert ( this.item ) ;
      var params = "?codigo="+document.form1.codigo.value  ;
      
      var ajx = new Ajax.Updater( "centro" , "validar.php" , { method:"post", parameters:params } );
   //   alert ( params ) ;
     // alert(ajx);
  }

/*
function check_text(input) {
alert("entra?"+document.form1.codigo.value );

   input.target.setCustomValidity('Username should only contain lowercase letters. e.g. john');
}
*/

  function refrescar_busca_num(item)
  {
     //count();
    // alert ("ENTRA "+document.form1.b_numero.value  ) ;
  //  count(250);
    
     var params = "?b_numero="+document.form1.b_numero.value  ;
     var ajx = new Ajax.Updater( "res_numer" , "bus_num.php" , { method:"post", parameters:params } );
    // var ajx = new Ajax.Updater( "res_numer" , "num.php" , { method:"post", parameters:params } );
       
  }
  
	function count(item)
	{

	//	 alert (item ) ;
		  var counter = { var: 0 };
		  TweenMax.to(counter, 3, {
		    var: item,
		    onUpdate: function () {
		      var number = Math.ceil(counter.var);
		      $('counter').html(number);
		      if(number === counter.var){ count.kill(); }
		    },
		    onComplete: function(){
		      count(item);
		    },
		    ease:Circ.easeOut
		  });
		 // alert (item ) ;
		  
	}

