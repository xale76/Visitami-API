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

Tutte le chiamate API prevedono una chiamata SOAP/Ajax con il passaggio di un token (alcune prevedono il passaggio del <b>Token Applicazione</b>, altre del <b>Token Utilizzo</b>) come parte dell'Header SOAP.
<i>vedere esempio nel file <b>token.php</b></i>

# Ricavare il Token Utilizzo (necessario avere Token Applicazione)

Il <b>Token Applicazione</b> identifica univocamente l'applicazione che invoca le API e viene consegnato da Visitami al partner.
Attraverso il <b>Token Applicazione</b> è possibile ottenere e rinnovare il <b>Token Utilizzo</b>, tramite il quale chiamare le API.
Il <b>Token Utilizzo</b> ha una scadenza di 30 giorni, dopo i quali va rinnovato.

    Public Function APIGEN_TokenRenew(ByRef lErr As String) As String

Questa chiamata produrrà un JSON di questo tipo:

    {"token":"<TOKEN UTILIZZO>","issued":1497,"validuntil":1527,"UTCdatetime":"20190308"}

* Token      = Token Utilizzo per le successive chiamate API
* issued     = id del giorno di richiesta
* validuntil = id del giorno di fine validità
* UTCdatetime= data ultimo giorno di validità nel formato yyyyMMdd
    
# Ricavare Città (necessario avere Token Utilizzo)

Sono previsti due metodi per ricavare l'elenco delle Città di copertura del servizio Visitami abilitate alle API e per ricavare l'elenco delle Categorie di Prestazioni su Visitami.

    Public Function APIGEN_GetCitta(ByRef lErr As String) As String
    
Questa chiamata produrrà un JSON di questo tipo:

    [{"nome":"Milano","lat":"45.4642035","lng":"9.189982","codice":"MI-1","raggio":15}]

* nome     = nome della Città da mostrare
* lat      = latitudine
* lng      = longitudine
* codice   = codice univoco che identifica la città
* raggio   = raggio in Km di copertura a partire dalle coordinate gps

# Ricavare Elenco delle Categorie di Prestazioni (necessario avere Token Utilizzo)





