var xhr_obj;

if (window.XMLHttpRequest) {
	xhr_obj = new XMLHttpRequest();
} else if (window.ActiveXObject) {
	xhr_obj = new ActiveXObject("Microsoft.XMLHTTP");
} else {
	alert('Veuillez mettre à jour votre navigateur pour pouvoir voter.');
}

// traitement de la réponse
xhr_obj.onreadystatechange = function() {
	// si réponse reçue
	if (xhr_obj.readyState == 4) {
		// si réponse OK
		if (xhr_obj.status == 200) {
			var response = ParseHTTPResponse(xhr_obj);
			var code = response.getElementsByTagName("code").item(0).textContent;
			if (code != 0) {
				var desc = response.getElementsByTagName("description").item(0).textContent;
				alert(desc+' ('+code+')');
			} else {
				var defi = response.getElementsByTagName("defi").item(0).textContent;
				var clan = response.getElementsByTagName("clan").item(0).textContent;
				var pour = response.getElementsByTagName("pour").item(0).textContent;
				var contre = response.getElementsByTagName("contre").item(0).textContent;
				document.getElementById('count_pour_'+defi+'_'+clan).textContent = '('+pour+')';
				document.getElementById('count_contre_'+defi+'_'+clan).textContent = '('+contre+')';
				alert("vote enregistré !");
			}
		} else {
			// probleme avec la requète HTTP
			alert("problème avec la requète HTTP\ncode reçu : "+xhr_obj.status);
		}
	} else {
		// pas encore prêt
	}
}

function dump(obj) {
	var out = '';
	for (var i in obj) {
		out += i + ": " + obj[i] + "\n";
	}
	var pre = document.createElement('pre');
	pre.innerHTML = out;
	document.body.appendChild(pre)
}

function vote(defi,clan,type) {
	xhr_obj.open('GET','/tuc/defis/vote/'+escape(defi)+'/'+escape(clan)+'/'+escape(type),true);
	xhr_obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr_obj.send(null);
}