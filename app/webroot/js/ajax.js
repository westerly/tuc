function ParseHTTPResponse (httpRequest) {
    var xmlDoc = httpRequest.responseXML;

    // if responseXML is not valid, try to create the XML document from the responseText property
    if (!xmlDoc || !xmlDoc.documentElement) {
        if (window.DOMParser) {
            var parser = new DOMParser();
            try {
                xmlDoc = parser.parseFromString (httpRequest.responseText, "text/xml");
            } catch (e) {
                alert ("XML parsing error");
                return null;
            };
        }
        else {
            xmlDoc = CreateMSXMLDocumentObject ();
            if (!xmlDoc) {
                return null;
            }
            xmlDoc.loadXML (httpRequest.responseText);

        }
    }

            // if there was an error while parsing the XML document
    var errorMsg = null;
    if (xmlDoc.parseError && xmlDoc.parseError.errorCode != 0) {
        errorMsg = "XML Parsing Error: " + xmlDoc.parseError.reason
                  + " at line " + xmlDoc.parseError.line
                  + " at position " + xmlDoc.parseError.linepos;
    }
    else {
        if (xmlDoc.documentElement) {
            if (xmlDoc.documentElement.nodeName == "parsererror") {
                errorMsg = xmlDoc.documentElement.childNodes[0].nodeValue;
            }
        }
    }
    if (errorMsg) {
        alert (errorMsg);
        return null;
    }

        // ok, the XML document is valid
    return xmlDoc;
}
