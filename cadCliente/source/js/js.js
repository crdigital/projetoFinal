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

			alert("Script não confiável, não é possível abrir janela modal.");

			return false;

		}

	}

}

<!-- fim janela modal-->


/*Script fecha Janela popup*/ 

// função usada para carregar o código  

function fecha(par) 

{  

// fechando a janela atual ( popup )  

window.close();  

// dando um refresh na página principal  

// fecha sem passar parâmetros
if(par == null)
{
opener.location.href=opener.location.href;
}
// fecha passando parâmetros
else
{
opener.location.href=""+par+"";  
}

/* ou assim:  

* window.opener.location.reload(); 

*/  

// document.location=""  

// fim da função  

} 
