NProgress.start();
//loadHeader();
$( function(){
	NProgress.done();
	$('.loader').fadeOut();
	
		$(document).ajaxSend(function() {
		$('.loader').fadeIn();
			NProgress.configure({ showSpinner: true });
				NProgress.start();
				$('#nprogress .bar').css({'background': '#7dccbf'});
				$('#nprogress .peg').css({'box-shadow': '0 0 10px #7dccbf, 0 0 5px #7dccbf'});
				$('#nprogress .spinner-icon').css({'border-top-color': '#fff', 'border-left-color': '#fff'});
				
	});
	$(document).ajaxStart(function() {
	$('.loader').fadeIn();
	});
	
	$(document).ajaxStop(function() {
		NProgress.done();
		$('.loader').fadeOut();
	});
});

function loadHeader(){
		$('head').load('inc/header.html');
	 }
	 
	 tokenX= document.cookie;
	
	 function register(){
		 var username = $('.username').val();
		 var password = $('.password').val();
		 var email = $('.email').val();
		 var first_name = $('.first_name').val();
		 var last_name = $('.last_name').val();
		 
		 var formdata={
			"username":username,
			"password":password,
			"email":email,
			"first_name":first_name,
			"last_name":last_name
		 };
		 var LoginSettings={
			"type":"POST",
			"async": true,
			"dataType":"json",
			"data":formdata,
			"url":"http://192.168.1.105:8000/users/",
			};
			
			$.ajax(LoginSettings).success(function(response){
				notify("User Account Created","success");
				window.location.href = "register.html";
				console.log(JSON.stringify(response));
		});
		 
		 
	 }
	 
	 function notify(textM, type){
		$('.notification').hide();
	
		if(type==="error"){
			mType="#errorNot";
		}
		else if(type==="success"){
			mType="#successNot";
		}
		else if(type==="warning"){
			mType="#warnNot";
		}
		else{
			console.log("Error on Notify Plugin (var type)");
		}
$(mType).slideDown( function(){

	$(mType+" p").text('');
	$(mType+" p").text(textM);
	
		$(mType).click( function(){
		$(this).slideUp();
		
		});
	setTimeout( function(){
$(mType).slideUp();	
	}, 40000);
});	
	} 
	
	
	
	function login(){
		 var username = $('.username').val();
		 var password = $('.password').val();
		 
		 
		 var formdata={
			"username":username,
			"password":password,
		};
		 var LoginSettings={
			"type":"POST",
			"dataType":"json",
			"data":formdata,
			"url":"http://192.168.1.105:8000/users/auth-token/"
			};
			
			$.ajax(LoginSettings).success(function(response){
			var tokenX=response.token;
			document.cookie ="tokenX= jwt "+tokenX;
				notify("Logging in","success");
				window.location.href = "index.html";
				console.log(JSON.stringify(response));
		});
		 
		 
	 }
	 
	 
	 
	 	function addIncome(){
		 var amount = $('.amount').val();
		 var reason = $('.reason').val();
		 
		 
		 var formdata={
			"amount":amount,
			"reason":reason,
		};
		 var LoginSettings={
			"type":"POST",
			"dataType":"json",
			"data":formdata,
			"url":"http://192.168.1.105:8000/addIncome",
			"header":{
			"Authorization":tokenX
			}
			};
			
			$.ajax(LoginSettings).success(function(response){
				$('.addIncome')[0].reset();
				notify("Record Saved Successfully","success");
				console.log(JSON.stringify(response));
		});
		 
		 
	 }
	 

	 	 
	 	function addExpense(){
		 var amount = $('.amount').val();
		 var purpose = $('.purpose').val();
		 var Description = $('.Description').val();
		 var Date = $('.Description').val();
		
		 
		 
		 var formdata={
			"amount":amount,
			"purpose":purpose,
			"Description":Description,
			"Date":Date,
		};
		
		 var LoginSettings={
			"type":"POST",
			"dataType":"json",
			"data":formdata,
			"url":"http://192.168.1.105:8000/addExpense",
			"header":{
			"Authorization":tokenX
			}
			};
			
			$.ajax(LoginSettings).success(function(response){
				$('.addExpense')[0].reset();
				notify("Record Saved Successfully","success");
				console.log(JSON.stringify(response));
		});
		 
		 
	 }
	 
	 
	 
	 function incomeList(){
		
		 var LoginSettings={
			"type":"GET",
			"url":"http://192.168.1.105:8000/incomeList",
			"header":{
			"Authorization":tokenX
			}
			};
			
			$.ajax(LoginSettings).success(function(response){
				$('.listX').html("");	
				console.log(JSON.stringify(response));
				var appendData="";
	 $.each(response, function(key, value){
		 
		 	
			appendData+='<tr>'+
						'<td>'+value.date+'</td>'+
						'<td>'+value.reason+'</td>'+
						'<td>'+value.amount+'</td>'+
						'</tr>';
			
	
			
		});
		$('.listX').html(appendData);
		});
		 
		 
	 }
	 
	 
	 function expenseList(){
		
		 var LoginSettings={
			"type":"GET",
			"url":"http://192.168.1.105:8000/expenseList",
			"header":{
			"Authorization":tokenX
			}
			};
			
			$.ajax(LoginSettings).success(function(response){
				$('.listX').html("");	
				console.log(JSON.stringify(response));
				var appendData="";
	 $.each(response, function(key, value){
		 
		 	
			appendData+='<tr>'+
						'<td>'+value.date+'</td>'+
						'<td>'+value.amount+'</td>'+
						'<td>'+value.puporse+'</td>'+
						'<td>'+value.description+'</td>'+
						'</tr>';
			
	
			
		});
		$('.listX').html(appendData);
		});
		 
		 
	 }
	 
	 
	 function adviceList(){
		
		 var LoginSettings={
			"type":"GET",
			"url":"http://192.168.1.105:8000/adviceList",
			"header":{
			"Authorization":tokenX
			}
			};
			
			$.ajax(LoginSettings).success(function(response){
				$('.listX').html("");	
				console.log(JSON.stringify(response));
				var appendData="";
	 $.each(response, function(key, value){
		 
		 	
			appendData+='<p class="well adv">'+value.advice+'</p>';
			
	
			
		});
		$('.listX').html(appendData);
		});
		 
		 
	 }