

function onJsonOp1(json)
{
  console.log(json);
  const section = document.querySelector('#viewOp1');
  //section.innerHTML='';

  const results_op1 = json;
  let num_results_op1 = results_op1.length;

  if(num_results_op1 === 0)
  {
    // SE IL JSON HA UNA LUNGHEZZA DI 0, ALLORA SELEZIONO LO SPAN_ERROR
    // E SEGNALO CHE L'ID NON E' VALIDO PERCHE' NON HA PRODOTTO RISULTATI
    const span_error = document.querySelector('span[name="error_op1"]');
    span_error.classList.remove('okay');
    span_error.classList.add('errore');
    span_error.textContent = "L'ID CHE HAI INSERITO NON PRODUCE RISULTATI!!";
    span_error.classList.remove('hidden');
  }
  else
  {

    const pan = document.createElement('div');
    pan.classList.add('panoramica');
    section.appendChild(pan);

    if(num_results_op1 === 1)
    {
      const pe = document.createElement('p');
      pe.textContent = "La query ha fornito " + num_results_op1 + ' risultato:';
      pan.appendChild(pe);
    }

    else
    {
      const pe = document.createElement('p');
      pe.textContent = "La query ha fornito " + num_results_op1 + ' risultati:';
      pan.appendChild(pe);
    }


    for(let i=0; i<num_results_op1; i++)
    {
      const results = results_op1[i];
      const result_idAlbum = results.id_album;
      const result_idCliente = results.id_cliente;
      const result_name = results.nome;
      const result_cognome = results.cognome;
      const result_cf = results.codice_fiscale;
      const result_data = results.data_acquisto;

      const op1 = document.createElement('div');
      op1.classList.add('op1');
      pan.appendChild(op1);

      const id_A = document.createElement('p');
      id_A.textContent = "ID ALBUM:  " + result_idAlbum;
      op1.appendChild(id_A);

      const id_C = document.createElement('p');
      id_C.textContent = "ID CLIENTE:  " + result_idCliente;
      op1.appendChild(id_C);

      const nome = document.createElement('p');
      nome.textContent = result_name;
      op1.appendChild(nome);

      if(result_cognome != null)
      {
        const cognome = document.createElement('p');
        cognome.textContent = result_cognome;
        op1.appendChild(cognome);
      }

      if(result_cf != null)
      {
        const cf = document.createElement('p');
        cf.textContent = result_cf;
        op1.appendChild(cf);
      }

      const acquisto = document.createElement('p');
      acquisto.textContent = "DATA ACQUISTO: " + result_data;
      op1.appendChild(acquisto);
    }

  }
}

function onResponseOp1(response)
{
  return response.json();
}



function checkInputOp1(event)
{
  // prendo il valore inserito dall'utente nella label
  const input = document.querySelector('input[name="id"]');
  let input_value = input.value;
  console.log(input_value);

  //verifico che il valore della label rispetti un certo pattern
  if(!/^[0-9]{1,2}$/.test(input.value))
  {
    event.preventDefault();
    const span_error = input.parentNode.parentNode.parentNode.querySelector('span[name="error_op1"]');
    span_error.classList.remove('okay');
    span_error.classList.add('errore');
    span_error.textContent = "Inserisci un ID VALIDO!!";
    span_error.classList.remove('hidden');

    input.value='';
  }
  else
  {
    const span_error = input.parentNode.parentNode.parentNode.querySelector('span[name="error_op1"]');
    span_error.classList.add('hidden');
  }
}

function onClickSendToDatabase(event)
{
  event.preventDefault();

  // prendo il valore inserito dall'utente nella label
  const input = document.querySelector('input[name="id"]');
  let input_value = input.value;

  // VERIFICO SE L'UTENTE INVIA SENZA COMPILARE LA LABEL
  if(input_value === '')
  {
    alert("INSERISCI L'ID PRIMA DI CONTINUARE!");
  }
  else
  {
    // EFFETTUO UNA FETCH AJAX AD UN FILE PHP
    console.log(input_value);
    const span_error = document.querySelector('span[name="error_op1"]');
    span_error.classList.remove('hidden');
    span_error.classList.remove('errore');
    span_error.classList.add('okay');
    span_error.textContent = 'Invio dei dati effettuato con successo!'

    // CREO IL FORM DATA
    const formData = new FormData();
    formData.append("id", input_value);

    // EFFETTUO LA FETCH ASINCRONA AJAX e INVIO I DATI AL FILE.PHP
    fetch("database_operazione1.php", {method: "post", body:formData}).then(onResponseOp1).then(onJsonOp1);

  }
}

function onClickHiddenOp1(event)
{
  document.getElementById('viewOp1Form').classList.add('hidden');
  document.getElementById('hiddenOp1').classList.add('hidden');
  nascosto_op1 = true;
}

function onClickShowOp1(event)
{
  document.getElementById('viewOp1Form').classList.remove('hidden');

  if(nascosto_op1)
  {
    document.getElementById('hiddenOp1').classList.remove('hidden');
    nascosto_op1 = false;
  }
}





// 'FUNCTIONS' COVERS
function onJsonCovers(json)
{
  console.log(json)
  const results_covers = json;
  let num_results_covers = results_covers.length;

  const bulms = document.querySelectorAll('.album');

  for(let i=0; i<num_results_covers; i++)
  {
    const covers = results_covers[i];
    const cover_id = covers.id;
    const url = covers.url;

    for(bulm of bulms)
    {
      let bulm_id = bulm.dataset.id;
      if(cover_id === bulm_id)
      {
        let sez = bulm.querySelector('.album_cover');
        console.log(sez)
        let img = document.createElement('img')
        img.src = url;
        img.classList.add('image');
        sez.appendChild(img);
      }
    }
  }
}

function onResponseCovers(response)
{
  return response.json();
}



// 'FUNCTIONS' ALBUMS
function leaveStyle(event)
{
  const span_search = document.querySelector('span[name="search_found"]');
  span_search.classList.add('hidden');
  const span_error = document.querySelector('span[name="error_search"]');
  span_error.classList.add('hidden');

}

function onResponseSearch(response)
{
  return response.json();
}

function onJsonSearch(json)
{
  console.log(json);
  const risultati = json;

  if(risultati.length === 0)
  {
    // ALBUM NON DISPONIBILE
    const span_search = document.querySelector('span[name="search_found"]');
    span_search.classList.remove('okay');
    span_search.classList.add('errore');
    span_search.textContent = "ALBUM NON DISPONIBILE!";
    span_search.classList.remove('hidden');

  }
  else
  {
    // ALBUM DISPONIBILE
    const found = risultati[0].nome;
    const span_search = document.querySelector('span[name="search_found"]');
    span_search.classList.remove('hidden');
    span_search.classList.remove('errore');
    span_search.classList.add('okay');
    span_search.textContent = "L'ALBUM --->"+found+" E' DISPONIBILE!";
  }
}

function onClickSearchInDatabase(event)
{
  event.preventDefault();

  // prendo il valore inserito dall'utente nella label
  const input = document.querySelector('input[name="searchAlbum"]');
  let input_value = input.value;

  // VERIFICO SE L'UTENTE INVIA SENZA COMPILARE LA LABEL
  if(input_value === '')
  {
    alert("INSERISCI UN NOME PRIMA DI CONTINUARE PRIMA DI CONTINUARE!");
  }
  //verifico che il valore della label rispetti un certo pattern
  else if(!/^[a-z A-Z 0-9]{1,22}$/.test(input_value))
  {
    event.preventDefault();
    const span_error = input.parentNode.parentNode.parentNode.querySelector('span[name="error_search"]');
    span_error.classList.remove('okay');
    span_error.classList.add('errore');
    span_error.textContent = "Inserisci un NOME VALIDO prima di inviare i dati!!!";
    span_error.classList.remove('hidden');
    const input_error = document.getElementById('input_search');

    input_error.value = '';
  }
  else
  {
    event.preventDefault();
    const span_error = input.parentNode.parentNode.parentNode.querySelector('span[name="error_search"]');
    span_error.classList.add('hidden');
    const input_error = document.getElementById('input_search');

    input_error.value = '';
    span_error.classList.remove('hidden');
    span_error.classList.remove('errore');
    span_error.classList.add('okay');
    span_error.textContent = 'Invio dei dati effettuato con successo!'

    // CREO IL FORM DATA
    const formData = new FormData();
    formData.append("input", input_value);

    // EFFETTUO LA FETCH ASINCRONA AJAX e INVIO I DATI AL FILE.PHP
    fetch("database_search.php", {method: "post", body:formData}).then(onResponseSearch).then(onJsonSearch);
  }
}

function checkInputSearch(event)
{
  // prendo il valore inserito dall'utente nella label
  const input = document.querySelector('input[name="searchAlbum"]');
  let input_value = input.value;
  console.log(input_value);

  //verifico che il valore della label rispetti un certo pattern
  if(!/^[ a-z A-Z 0-9 ]{1,22}$/.test(input.value))
  {
    event.preventDefault();
    const span_error = input.parentNode.parentNode.parentNode.querySelector('span[name="error_search"]');
    const input_error = document.getElementById('input_search');

    span_error.classList.remove('okay');
    span_error.classList.add('errore');
    span_error.textContent = "Inserisci un NOME VALIDO!!";
    span_error.classList.remove('hidden');

    input_error.value = '';
  }
  else
  {
    const span_error = input.parentNode.parentNode.parentNode.querySelector('span[name="error_search"]');
    span_error.classList.add('hidden');
  }
}

function onClickHiddenSearch(event)
{
  document.getElementById('viewSearch').classList.add('hidden');
  document.getElementById('hiddenSearch').classList.add('hidden');
  nascosto_search = true;
}


function onClickSearchAlbums(event)
{
  document.getElementById('viewSearch').classList.remove('hidden');

  if(nascosto_search)
  {
    document.getElementById('hiddenSearch').classList.remove('hidden');
    nascosto_search = false;
  }
}

function onJsonAlbums(json)
{
  fetch("database_cover.php").then(onResponseCovers).then(onJsonCovers);
  console.log(json);
  const section = document.querySelector('#viewAlbums');
  section.innerHTML='';

  const results_albums = json;
  let num_results_albums = results_albums.length;

  const pan = document.createElement('div');
  pan.classList.add('panoramica');
  section.appendChild(pan);

  const pe = document.createElement('p');
  pe.textContent = "Al momento disponiamo di " + num_results_albums + ' album:';
  pan.appendChild(pe);

  for(let i=0; i<num_results_albums; i++)
  {
    const albums = results_albums[i];
    const album_id = albums.id;
    const album_name = albums.nome;
    const album_nbrani = albums.numero_brani;
    const album_data = albums.data_uscita;
    const album_formato = albums.formato_disponibile;
    const album_genere = albums.genere;
    const album_prezzo = albums.prezzo;

    const album = document.createElement('div');
    album.classList.add('album');
    album.dataset.id = album_id;
    pan.appendChild(album);

    const album_cover = document.createElement('div');
    album_cover.classList.add('album_cover');
    album.appendChild(album_cover);

    const album_copy = document.createElement('div');
    album_copy.classList.add('album_copy');
    album.appendChild(album_copy);

    const id = document.createElement('p');
    id.textContent = "ID ALBUM: " + album_id;
    album_copy.appendChild(id);

    const nome = document.createElement('p');
    nome.textContent = album_name;
    album_copy.appendChild(nome);

    const nbrani = document.createElement('p');
    nbrani.textContent = "BRANI: " + album_nbrani;
    album_copy.appendChild(nbrani);

    const data = document.createElement('p');
    data.textContent = album_data;
    album_copy.appendChild(data);

    const genere = document.createElement('p');
    genere.textContent = album_genere;
    album_copy.appendChild(genere);

    const formato = document.createElement('p');
    formato.textContent =  album_formato;
    album_copy.appendChild(formato);

    const prezzo = document.createElement('p');
    prezzo.textContent = "PREZZO: " + album_prezzo;
    album_copy.appendChild(prezzo);
  }
}

function onResponseAlbums(response)
{
  return response.json();
}

function onClickHiddenAlbums(event)
{
  document.getElementById('viewAlbums').classList.add('hidden');
  document.getElementById('hiddenAlbums').classList.add('hidden');
  nascosto_albums = true;
}


function onClickShowAlbums(event)
{
  document.getElementById('viewAlbums').classList.remove('hidden');
  fetch("database_album.php").then(onResponseAlbums).then(onJsonAlbums);

  if(nascosto_albums)
  {
    document.getElementById('hiddenAlbums').classList.remove('hidden');
    nascosto_albums = false;
  }
}




// 'FUNCTIONS' LAVORATORI ONESTI
function onJsonWorkers(json)
{
  console.log(json);
  const section = document.querySelector('#viewWorkers');
  section.innerHTML='';

  const results_workers = json;
  let num_results_workers = results_workers.length;

  const pan = document.createElement('div');
  pan.classList.add('panoramica');
  section.appendChild(pan);

  const pe = document.createElement('p');
  pe.textContent = "Un ringraziamento a tutti i nostri " + num_results_workers + ' ingegneri che operano sul campo.';
  pan.appendChild(pe);

  for(let i=0; i<num_results_workers; i++)
  {
    const workers = results_workers[i];
    const worker_id = workers.id_dipendente;
    const worker_name = workers.nome;
    const worker_cognome = workers.cognome;
    const worker_data = workers.data_nascita;

    const worker = document.createElement('div');
    worker.classList.add('worker');
    pan.appendChild(worker);

    const id = document.createElement('p');
    id.textContent = "ID EROE:  " + worker_id;
    worker.appendChild(id);

    const nome = document.createElement('p');
    nome.textContent = worker_name;
    worker.appendChild(nome);

    const indirizzo = document.createElement('p');
    indirizzo.textContent = worker_cognome;
    worker.appendChild(indirizzo);

    const recap = document.createElement('p');
    recap.textContent = worker_data;
    worker.appendChild(recap);
  }

}

function onResponseWorkers(response)
{
  return response.json();
}

function onClickHiddenWorkers(event)
{
  document.getElementById('viewWorkers').classList.add('hidden');
  document.getElementById('hiddenWorkers').classList.add('hidden');
  nascosto_workers = true;
}


function onClickShowWorkers(event)
{
  document.getElementById('viewWorkers').classList.remove('hidden');
  fetch("database_dipendenti.php").then(onResponseWorkers).then(onJsonWorkers);

  if(nascosto_workers)
  {
    document.getElementById('hiddenWorkers').classList.remove('hidden');
    nascosto_workers = false;
  }
}


// 'MAIN' LAVORATORI ONESTI
let nascosto_workers = true;

const showWorkers = document.querySelector('#showWorkers');
showWorkers.addEventListener('click', onClickShowWorkers);

const hiddenWorkers = document.querySelector('#hiddenWorkers');
hiddenWorkers.addEventListener('click', onClickHiddenWorkers);

// 'MAIN' ALBUMS
let nascosto_albums = true;
let nascosto_search = true;

const showAlbums = document.querySelector('#showAlbums');
showAlbums.addEventListener('click', onClickShowAlbums);

const hiddenAlbums = document.querySelector('#hiddenAlbums');
hiddenAlbums.addEventListener('click', onClickHiddenAlbums);

const searchAlbums = document.querySelector('#searchAlbums');
searchAlbums.addEventListener('click', onClickSearchAlbums);

const hiddenSearch = document.querySelector('#hiddenSearch');
hiddenSearch.addEventListener('click', onClickHiddenSearch);

const submit_search = document.getElementById('submit_search');
submit_search.addEventListener('click', onClickSearchInDatabase);

//seleziono la label "username"
const input_search = document.querySelector('input[name="searchAlbum"]');
//console.log(input_username);
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_search.addEventListener('blur', checkInputSearch);

const input_searchFocus = document.querySelector('input[name="searchAlbum"]');
input_searchFocus.addEventListener('focus', leaveStyle)

// 'MAIN' OPERAZIONE 1
let nascosto_op1 = true;

const showOp1 = document.querySelector('#showOp1');
showOp1.addEventListener('click', onClickShowOp1);

const hiddenOp1 = document.querySelector('#hiddenOp1');
hiddenOp1.addEventListener('click', onClickHiddenOp1);

const submit_id = document.getElementById('op1_submit');
submit_id.addEventListener('click', onClickSendToDatabase);

//seleziono la label "username"
const input_op1 = document.querySelector('input[name="id"]');
//console.log(input_username);
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_op1.addEventListener('blur', checkInputOp1);


//BARRA PROGRESSIVA COLORATA
const progbar_op = document.getElementById('progbar');
let totalHeight_op = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight_op) * 100; progbar_op.style.height = progressHeight + "%";}
