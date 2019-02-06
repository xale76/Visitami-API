# Visitami-API
Visitami API versione 0.9.2.6

Questo progetto contiene l'elenco delle funzionalità per l'integrazione con le API Visitami e un codice di esempio da usare come guida per le chiamate in PHP.

# Prerequisiti

a) Concordare per l'acquisizione di un <b>Token Applicazione</b>.
b) Comunicare la URL certificata (https) da cui far provenire le richieste in modo che questa venga aggiunta alle URL per cui esiste un grant per le API.

# Url API

Esistono 2 url, uno di sviluppo e l'altro di produzione:
<i> Sviluppo </i>
https://demo.visitamiapp.com/app_api_web/genApi.asmx (possibile visionare WSDL)

<i> Produzione </i>
https://www.visitamiapp.com/app_api_web/genApi.asmx (WSDL bloccato)

# Chiamate API

Tutte le chiamate API prevedono una chiamata SOAP/Ajax con il passaggio di un token come parte dell'Header SOAP.

# Utilizzo del Token Applicazione

Il <b>Token Applicazione</b> identifica univocamente l'applicazione che invoca le API e viene consegnato da Visitami al partner.
Attraverso il <b>Token Applicazione</b> è possibile ottenere e rinnovare il <b>Token Utilizzo</b>, tramite il quale chiamare le API.
Il <b>Token Utilizzo</b> ha una scadenza di 30 giorni, dopo i quali va rinnovato.

    Public Function APIGEN_TokenRenew(ByRef lErr As String) As String


    



