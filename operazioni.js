// 'FUNCTIONS' CLIENTI
function onJsonClients(json)
{
  //console.log(json);
  const section = document.querySelector('#viewClients');
  section.innerHTML='';

  const results_clients = json;
  let num_results_clients = results_clients.length;

  const pan = document.createElement('div');
  pan.classList.add('panoramica');
  section.appendChild(pan);

  const pe = document.createElement('p');
  pe.textContent = 'Attualmente abbiamo avuto ' + num_results_clients + ' clienti:'
  pan.appendChild(pe);

  for(let i=0; i<num_results_clients; i++)
  {
    const clients = results_clients[i];
    const id = clients.id;
    const nome = clients.nome;
    const cognome = clients.cognome;
    const cf = clients.codice_fiscale;
    const p_iva = clients.partita_IVA;
    const sede = clients.sede_legale;

    const client = document.createElement('div');
    client.classList.add('client');
    pan.appendChild(client);

    const client_id = document.createElement('p');
    client_id.textContent = 'ID CLIENTE:  ' + id;
    client.appendChild(client_id);

    const client_name = document.createElement('p');
    client_name.textContent = nome;
    client.appendChild(client_name);

    if(cognome)
    {
      const client_cognome = document.createElement('p');
      client_cognome.textContent = cognome;
      client.appendChild(client_cognome);
    }

    if(cf)
    {
      const client_cf = document.createElement('p');
      client_cf.textContent = "CODICE FISCALE:  " + cf;
      client.appendChild(client_cf);
    }

    if(sede)
    {
      const client_sede = document.createElement('p');
      client_sede.textContent = "SEDE LEGALE: " + sede;
      client.appendChild(client_sede)
    }

    if(p_iva)
    {
      const client_iva = document.createElement('p');
      client_iva.textContent = "PARTITA IVA:  " + p_iva;
      client.appendChild(client_iva);
    }

  }

}

function onResponseClients(response)
{
  return response.json();
}

function onClickHiddenClients(event)
{
  document.getElementById('viewClients').classList.add('hidden');
  document.getElementById('hiddenClients').classList.add('hidden');
  nascosto_clients = true;
}

function onClickShowClients(event)
{
  document.getElementById('viewClients').classList.remove('hidden');
  fetch("database_clienti.php").then(onResponseClients).then(onJsonClients);

  if(nascosto_clients)
  {
    document.getElementById('hiddenClients').classList.remove('hidden');
    nascosto_clients = false;
  }
}

// 'FUNCTIONS' NEGOZI
function onJsonStores(json)
{
  console.log(json);
  const section = document.querySelector('#viewStores');
  section.innerHTML='';

  const results_stores = json;
  let num_results_stores = results_stores.length;

  const pan = document.createElement('div');
  pan.classList.add('panoramica');
  section.appendChild(pan);

  const pe = document.createElement('p');
  pe.textContent = "Controlla se c'è uno dei nostri " + num_results_stores + ' store nella tua zona e vienici a trovare:';
  pan.appendChild(pe);

  for(let i=0; i<num_results_stores; i++)
  {
    const stores = results_stores[i];
    const store_id = stores.id;
    const store_name = stores.nome;
    const store_address = stores.indirizzo;
    const store_recap = stores.recapito;

    const store = document.createElement('div');
    store.classList.add('store');
    pan.appendChild(store);

    const id = document.createElement('p');
    id.textContent = "ID NEGOZIO:  " + store_id;
    store.appendChild(id);

    const nome = document.createElement('p');
    nome.textContent = store_name;
    store.appendChild(nome);

    const indirizzo = document.createElement('p');
    indirizzo.textContent = store_address;
    store.appendChild(indirizzo);

    const recap = document.createElement('p');
    recap.textContent = "RECAPITO: "+ store_recap;
    store.appendChild(recap);
  }
}


function onResponseStores(response)
{
  return response.json();
}

function onClickHiddenStores(event)
{
  document.getElementById('viewStores').classList.add('hidden');
  document.getElementById('hiddenStores').classList.add('hidden');
  nascosto_stores = true;
}


function onClickShowStores(event)
{
  document.getElementById('viewStores').classList.remove('hidden');
  fetch("database_negozi.php").then(onResponseStores).then(onJsonStores);

  if(nascosto_stores)
  {
    document.getElementById('hiddenStores').classList.remove('hidden');
    nascosto_stores = false;
  }
}




// 'FUNCTIONS' ARTISTI
function onJsonArtists(json)
{
  console.log(json);
  const section = document.querySelector('#viewArtists');
  section.innerHTML='';

  const results_artists = json;
  let num_results_artists = results_artists.length;

  const pan = document.createElement('div');
  pan.classList.add('panoramica');
  section.appendChild(pan);

  const pe = document.createElement('p');
  pe.textContent = 'Attualmente collaboriamo con ' + num_results_artists + ' artisti:';
  pan.appendChild(pe);

  for(let i=0; i<num_results_artists; i++)
  {
    const artists = results_artists[i];
    const artist_name = artists.nome_arte;

    const artist = document.createElement('div');
    artist.classList.add('artist');
    pan.appendChild(artist);

    const artist_nome = document.createElement('p');
    artist_nome.textContent = artist_name;
    artist.appendChild(artist_nome);
  }
}

function onResponseArtists(response)
{
  return response.json();
}


function onClickHiddenArtists(event)
{
  document.getElementById('viewArtists').classList.add('hidden');
  document.getElementById('hiddenArtists').classList.add('hidden');
  nascosto_artists = true;
}


function onClickShowArtists(event)
{
  document.getElementById('viewArtists').classList.remove('hidden');
  fetch("database_artisti.php").then(onResponseArtists).then(onJsonArtists);

  if(nascosto_artists)
  {
    document.getElementById('hiddenArtists').classList.remove('hidden');
    nascosto_artists = false;
  }
}




// 'FUNCTIONS' UTENTI REGISTRATI AL SITO
function onJsonUsers(json)
{
  //console.log(json);

  const section = document.querySelector('#viewUsers');
  section.innerHTML='';

  const results = json;
  console.log(results);

  let num_results = results.length;
  console.log(num_results);

  const pan = document.createElement('div');
  pan.classList.add('panoramica');
  section.appendChild(pan);

  const p = document.createElement('p');
  p.textContent = 'Attualmente si sono registrati ' + num_results + ' utenti:'
  pan.appendChild(p);

  for(let i=0; i<num_results; i++)
  {
    const users = results[i];
    const id = users.id;
    const nome = users.nome;
    const cognome = users.cognome;
    const username = users.username;
    const password = users.password;
    const mail = users.email;
    const registrazione = users.data_registrazione;

    const user = document.createElement('div');
    user.classList.add('user');
    pan.appendChild(user);

    const user_id = document.createElement('p');
    user_id.textContent = "ID:  "+id;
    user.appendChild(user_id);

    const user_nome = document.createElement('p');
    user_nome.textContent = nome;
    user.appendChild(user_nome);

    const user_cognome = document.createElement('p');
    user_cognome.textContent = cognome;
    user.appendChild(user_cognome);

    const user_username = document.createElement('p');
    user_username.textContent = "USERNAME:  " + username;
    user.appendChild(user_username);

    const data = document.createElement('p');
    data.textContent = "DATA REGISTRAZIONE:  " + registrazione;
    user.appendChild(data);
  }
}


function onResponseUsers(response)
{
  return response.json();
}


function onClickHiddenUsers(event)
{
  document.getElementById('viewUsers').classList.add('hidden');
  document.getElementById('hiddenUsers').classList.add('hidden');
  nascosto_users = true;
}


function onClickShowUsers(event)
{
  document.getElementById('viewUsers').classList.remove('hidden');
  fetch("database_utenti.php").then(onResponseUsers).then(onJsonUsers);

  if(nascosto_users)
  {
    document.getElementById('hiddenUsers').classList.remove('hidden');
    nascosto_users = false;
  }
}

// 'MAIN' UTENTI REGISTRATI AL SITO
let nascosto_users = true;

const showUsers = document.querySelector('#showUsers');
showUsers.addEventListener('click', onClickShowUsers)

const hiddenUsers = document.querySelector('#hiddenUsers');
hiddenUsers.addEventListener('click', onClickHiddenUsers);

// 'MAIN' ARTISTI
let nascosto_artists = true;

const showArtists = document.querySelector('#showArtists');
showArtists.addEventListener('click', onClickShowArtists);

const hiddenArtists = document.querySelector('#hiddenArtists');
hiddenArtists.addEventListener('click', onClickHiddenArtists);

// 'MAIN' NEGOZI
let nascosto_stores = true;

const showStores = document.querySelector('#showStores');
showStores.addEventListener('click', onClickShowStores);

const hiddenStores = document.querySelector('#hiddenStores');
hiddenStores.addEventListener('click', onClickHiddenStores);

// 'MAIN' CLIENTI
let nascosto_clients = true;

const showClients = document.querySelector('#showClients');
showClients.addEventListener('click', onClickShowClients);

const hiddenClients = document.querySelector('#hiddenClients');
hiddenClients.addEventListener('click', onClickHiddenClients);


//BARRA PROGRESSIVA COLORATA
const progbar_op = document.getElementById('progbar');
let totalHeight_op = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight_op) * 100; progbar_op.style.height = progressHeight + "%";}
