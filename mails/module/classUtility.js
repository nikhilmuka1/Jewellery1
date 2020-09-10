
	function amountWord(Amount, txtfield)   
	{   
		var Paise = Amount.split(".");  
		
		/* 
		 * Rupees Word Display
		 */
		 
		var junkVal = Paise[0];   
		junkVal		= Math.floor(junkVal);   
		
		var obStr	= new String(junkVal);   
		numReversed	= obStr.split("");  
		actnumber	= numReversed.reverse();   
	
		if(Number(junkVal) >=0)   
		{   
			//do nothing   
		}   
		else  
		{   
			alert('wrong Number cannot be converted');   
			return false;   
		}   
	
		if(Number(junkVal)==0)   
		{   
			document.getElementById(txtfield).innerHTML = 'Rupees Zero Only';
			return false;   
		}   
	
		if(actnumber.length>9)   
		{   
			alert('Oops!!!! the Number is too big to covertes');   
			return false;   
		}   
	
		var iWords		= ["Zero", " One", " Two", " Three", " Four", " Five", " Six", " Seven", " Eight", " Nine"];   
		var ePlace		= ['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];   
		var tensPlace	= ['dummy', ' Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety' ];   
	
		var iWordsLength= numReversed.length;   
		var totalWords	= "";   
		var inWords		= new Array();   
		var finalWord	= "";   
	
		j=0;   
	
		for(i=0; i<iWordsLength; i++)   
		{   
			switch(i)   
			{   
			case 0:   
				if(actnumber[i]==0 || actnumber[i+1]==1 )   
				{   
					inWords[j] = '';   
				}   
				else  
				{   
					inWords[j] = iWords[actnumber[i]];   
				}   
				inWords[j] = inWords[j]+' Rupees and ';   // Only 
				break;   
	
			case 1:   
				tens_complication();   
				break;   
	
			case 2:   
				if(actnumber[i]==0)   
				{   
					inWords[j]='';   
				}   
	
				else if(actnumber[i-1]!=0 && actnumber[i-2]!=0)   
				{   
					inWords[j]=iWords[actnumber[i]]+' Hundred';   
				}   
				else  
				{   
					inWords[j]=iWords[actnumber[i]]+' Hundred';   
				}   
				break;   
	
			case 3:   
				if(actnumber[i]==0 || actnumber[i+1]==1)   
				{   
					inWords[j]='';   
				}   
				else  
				{   
					inWords[j]=iWords[actnumber[i]];   
				}   
				inWords[j]=inWords[j]+" Thousand";   
				break;   
	
			case 4:   
				tens_complication();   
				break;   
			case 5:   
				if(actnumber[i]==0 || actnumber[i+1]==1 )   
				{   
					inWords[j]='';   
				}   
				else  
				{   
					inWords[j]=iWords[actnumber[i]];   
				}   
				inWords[j]=inWords[j]+" Lakh";   
				break;   
	
			case 6:   
				tens_complication();   
				break;   
	
			case 7:   
				if(actnumber[i]==0 || actnumber[i+1]==1 )   
				{   
					inWords[j]='';   
				}   
				else  
				{   
					inWords[j]=iWords[actnumber[i]];   
				}   
				inWords[j]=inWords[j]+" Crore";   
				break;   
	
			case 8:   
				tens_complication();   
				break;   
	
			default:   
				break;   
			}   
	
			j++;   
	
		}   
	
	  
	
		function tens_complication()   
		{   
			if(actnumber[i]==0)   
			{   
				inWords[j]='';   
			}   
			else if(actnumber[i]==1)   
			{   
				inWords[j]=ePlace[actnumber[i-1]];   
			}   
			else  
			{   
				inWords[j]=tensPlace[actnumber[i]];   
			}   
		}   
	
		inWords.reverse();   
		
		for(i=0; i<inWords.length; i++)   
		{   
			finalWord+=inWords[i];   
		}   
	
	
	
		// Paise Word Display
	
		var PaiseVal 	= Paise[1];   
		PaiseVal 		= Math.floor(PaiseVal);   
	
		var obStrPaise 		= new String(PaiseVal);   
		numReversedPaise 	= obStrPaise.split("");  
		actnumberPaise 		= numReversedPaise.reverse();     
	
		var iWordsLength	= numReversedPaise.length;   
		var inWordsPaise	= new Array();   
	
		j=0;  
	
		for(i=0; i<iWordsLength; i++)   
		{   
			switch(i)   
			{   
			case 0:   
				if(actnumberPaise[i]==0 || actnumberPaise[i+1]==1 )   
				{   
					inWordsPaise[j]='';   
				}   
				else  
				{   
					inWordsPaise[j]=iWords[actnumberPaise[i]];   
				}   
				inWordsPaise[j]=inWordsPaise[j]+' Paise Only.';
				break;   
	
			case 1:   
				tens_complication_Paise();   
				break; 
	
			default:   
				break;   
			}   
	
			j++;   
	
		}
	
		function tens_complication_Paise()   
		{   
			if(actnumberPaise[i]==0)   
			{   
				inWordsPaise[j]='';   
			}   
			else if(actnumberPaise[i]==1)   
			{   
				inWordsPaise[j]=ePlace[actnumberPaise[i-1]];   
			}   
			else  
			{   
				inWordsPaise[j]=tensPlace[actnumberPaise[i]];   
			}   
	
		}   
	
		inWordsPaise.reverse(); 
	
		if(inWordsPaise.length == 1)   
		{
			finalWord += "zero";
		}
		for(i=0; i<inWordsPaise.length; i++)   
		{   
			finalWord+=inWordsPaise[i];   
		} 
		
		  finalWord = finalWord.replace(/^\s*/, "");
		
		  finalWord = finalWord.replace(/\s*$/, "");
	
		document.getElementById(txtfield).innerHTML = finalWord;   
	
	}
	
	function chkUsername(username)
	{
		// trim starting / ending whitespace
		username = username.replace(/^\s*/, "");
		username = username.replace(/\s*$/, "");
		
		xmlHttp = GetXmlHttpObject();
		if (xmlHttp==null)
		{
			alert ("Browser does not support HTTP Request");
			return false;
		} 
		var url2 = baseJS +"/include/checkUsername.php";
		url2	 = url2 + "?username="+username;
		url2	 = url2 + "&rand="+Math.random();
		//alert(url2);
		xmlHttp.onreadystatechange = stateCheckUsername;
		xmlHttp.open("GET",url2,true);
		xmlHttp.send(null);				
	}
	function stateCheckUsername()
	{ 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			if(xmlHttp.responseText != '') 
				document.getElementById('chkUsername').innerHTML = xmlHttp.responseText;				
			else
				document.getElementById('chkUsername').innerHTML = 'Please Wait ...';
			//alert(xmlHttp.responseText);
		}
	}


	function allStateList(TBDis, Field, Country, State)
	{
		xmlHttp = GetXmlHttpObject();
		if (xmlHttp==null)
		{
			alert ("Browser does not support HTTP Request");
			return false;
		} 
		var url2 = baseJS +"/include/displayState.php?TBDis="+TBDis;
		url2	 = url2 + "&Field="+Field;
		url2	 = url2 + "&Country="+Country;
		url2	 = url2 + "&State="+State;
		url2	 = url2 + "&rand="+Math.random();
		//alert(url2);
		xmlHttp.onreadystatechange = stateAllStateList;
		xmlHttp.open("GET",url2,true);
		xmlHttp.send(null);				
	}
	function stateAllStateList()
	{ 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			var Text = xmlHttp.responseText.split('#@');
			
			if(xmlHttp.responseText != '') 
				document.getElementById(Text[1]).innerHTML = Text[0];
			else
				document.getElementById(Text[1]).innerHTML = 'Please Wait ...';				
			
			//alert(xmlHttp.responseText);
		}
	}






	function GetXmlHttpObject()	
	{ 
		var objXMLHttp = null;
		if (window.XMLHttpRequest)	
			objXMLHttp = new XMLHttpRequest();
		else if (window.ActiveXObject)
			objXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
			
		return objXMLHttp
	}

	function LoadPopup(url, name, width, height) 
	{	
		var propty 		= 'height='+height+',width='+width;
		var newwindow 	= window.open(url, name, propty);
		if (window.focus) {newwindow.focus();}
	}    

	function chkAll(name, val)
	{	
		if(document.getElementById('AP').checked == true)
		{
			for(var i=1; i<=val; i++)
			{ var aa = name+i;  document.getElementById(aa).checked = true; }
		}
		else
		{
			for(var i=1; i<=val; i++)
			{ var aa = name+i; document.getElementById(aa).checked = false; }
		}					
	}							

	function TBDis(BoxDis, TxtDis, val)
	{
	  if(val == 'US')
	  {
		  document.getElementById(BoxDis).style.display = 'block';
		  document.getElementById(TxtDis).style.display = 'none';
	  }
	  else
	  {
		  document.getElementById(BoxDis).style.display = 'none';
		  document.getElementById(TxtDis).style.display = 'block';													
	  }
	}
	
	function DisplayShippingTxt()
	{	
		if(document.getElementById('shippingFree').checked == true)
		{	document.getElementById('DisplayRate').style.display = "none"; document.getElementById('shippingRate').value='0.00'; }
		else
		{	document.getElementById('DisplayRate').style.display = "block"; document.getElementById('shippingRate').value='0.00'; }
	}
	
	function chkForm()
	{
		if(document.getElementById('shippingFree').checked == false)
		{	
			var ShipRate = document.getElementById('shippingRate');
			
			if(ShipRate.value == "")
			{
				alertMessage(ShipRate, 'Please enter shipping rate.');
				return false;
			}
			else if (ShipRate.value && ShipRate.value.match(/[^0-9\.]/))	
			{	
				alertMessage(ShipRate, 'Please enter shipping rate must be contain digits only.');
				return false;	
			}
			
		}
	}
	
	function addMoreImage()
	{
		var x 		= eval(document.getElementById('addImage').value);
		var newVal 	= eval(x+1);
		var strVal 	= '';


		strVal += '<input name="productImage[]" type="file" autocomplete="off" class="boxTxt" id="productImage' + x + '" value="" >';
		strVal += '<input name="productFilePosition[]" type="text" autocomplete="off" class="boxTxt" id="productFilePosition' + x + '" value="" maxlength="2" style="width:40px;font-weight:600;text-align:center;margin-right:6%;" >';
		

		strVal += '<div id="tblImage'+newVal+'"></div>';
		//alert(strVal)
		document.getElementById('addImage').value 			= newVal;
		document.getElementById('tblImage'+x).innerHTML 	= strVal;
	}
	
