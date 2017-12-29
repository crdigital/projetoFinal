<!-- janela modal-->

function openModal(pUrl, pWidth, pHeight) {

	if (window.showModalDialog) {

		return window.showModalDialog(pUrl, window, "dialogWidth:" + pWidth + "px;dialogHeight:" + pHeight + "px");

	} else {

		try {

			netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserWrite");

			window.open(pUrl, "wndModal", "width=" + pWidth + ",height=" + pHeight + ",resizable=no,modal=yes");

			return true;

		}

		catch (e) {

			alert("Script n�o confi�vel, n�o � poss�vel abrir janela modal.");

			return false;

		}

	}

}

<!-- fim janela modal-->


/*Script fecha Janela popup*/ 

// fun��o usada para carregar o c�digo  

function fecha(par) 

{  

// fechando a janela atual ( popup )  

window.close();  

// dando um refresh na p�gina principal  

// fecha sem passar par�metros
if(par == null)
{
opener.location.href=opener.location.href;
}
// fecha passando par�metros
else
{
opener.location.href=""+par+"";  
}

/* ou assim:  

* window.opener.location.reload(); 

*/  

// document.location=""  

// fim da fun��o  

} 
