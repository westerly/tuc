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
				alert("vote enregistr� !");
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
	var data = "defi="+escape(defi)+"&clan="+escape(clan)+"&type="+escape(type);
	xhr_obj.open('POST','/tuc/app/webroot/process_vote.php',true);
	xhr_obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr_obj.send(data);
}