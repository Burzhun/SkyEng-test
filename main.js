window.onload=function(){
	function addCss(object,rule){
		var old_style = object.getAttribute('style') || '';
		old_style = old_style.replace(rule+';','');
		console.log(old_style);console.log(rule);
		object.setAttribute('style',old_style+rule+';');
	}
	var layer = document.querySelector(".layer");
	var element = document.getElementsByClassName("element");
	for (var i = 0; i<element.length; i++) {
		console.log(element[i]);
	  element.item(i).oncllick = function () { 
		console.log('6');
		
	  };
	}
	
	function showPopup(element){
		addCss(layer,'display:block');
		document.querySelector(".element_popup .element").innerHTML = element.innerHTML;
		addCss(document.querySelector(".element_popup"),'display:block');
	}
	
	document.addEventListener('click', function (event) {
		event.preventDefault();

		if(event.target.matches('.container .element')){
			showPopup(event.target);
		}
		if(event.target.matches('.container .element *')){
			var element = event.target.closest('.element');
			showPopup(element);
		}	

	}, false);
	
	var close_button = document.querySelector(".close_icon");
	layer.onclick=close_button.onclick=function(){
		addCss(layer,'display:none');
		addCss(document.querySelector(".element_popup"),'display:none');
	}
	
	
}