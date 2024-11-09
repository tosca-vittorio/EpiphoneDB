function Meteo(nome, id, nazione, longitudine, latitudine, temperatura, max, min, percepita, umidità, pressione, vel_vento, ang_vento, descrizione)
{

  const sezione_meteo = document.querySelector('#meteo');

  //<div class="display">
  const contenitore_meteo = document.createElement('div');
  contenitore_meteo.classList.add('display');

  const città = document.createElement('h1');
  città.textContent = nome;
  città.classList.add('med-text');
  contenitore_meteo.appendChild(città);

  const city_id = document.createElement('p');
  city_id.textContent = 'ID della città: ' + id;
  contenitore_meteo.appendChild(city_id);

  const naz = document.createElement('p');
  naz.textContent = 'Nazione: ' + nazione;
  contenitore_meteo.appendChild(naz);

  const lon = document.createElement('p');
  lon.textContent = 'Longitudine: ' + longitudine;

  const lat = document.createElement('p');
  lat.textContent = 'Latitudine: ' + latitudine;

  const temp = document.createElement('p');
  temp.textContent = 'Temperatura: ' + temperatura;
  contenitore_meteo.appendChild(temp);

  const massima = document.createElement('p');
  massima.textContent = 'Temperatura massima: ' + max;
  contenitore_meteo.appendChild(massima);

  const minima = document.createElement('p');
  minima.textContent = 'Temperatura minima: ' + min;
  contenitore_meteo.appendChild(minima);

  const feels_like = document.createElement('p');
  feels_like.textContent = 'Temperatura percepita: ' + percepita;
  contenitore_meteo.appendChild(feels_like);

  const umid = document.createElement('p');
  umid.textContent = 'Umiditià: ' + umidità;
  contenitore_meteo.appendChild(umid);

  const press = document.createElement('p');
  press.textContent = 'Pressione: ' + pressione;
  contenitore_meteo.appendChild(press);

  const velVento = document.createElement('p');
  velVento.textContent = 'Velocità del vento: ' + vel_vento;
  contenitore_meteo.appendChild(velVento);

  const angVento = document.createElement('p');
  angVento.textContent = 'Angolazione del vento: ' + ang_vento;
  contenitore_meteo.appendChild(angVento);

  const desc = document.createElement('p');
  desc.textContent = 'Descrizione: ' + descrizione;
  contenitore_meteo.appendChild(desc);

  sezione_meteo.appendChild(contenitore_meteo);
}



function onJson(json)
{
  console.log(json);

  const nome = json['name'];
  const id = json['sys']['id'];
  const nazione = json['sys']['country'];
  const longitudine = json['coord']['lon'];
  const latitudine = json['coord']['lat'];
  const temperatura = json['main']['temp'];
  const max = json['main']['temp_max'];
  const min = json['main']['temp_min'];
  const percepita = json['main']['feels_like'];
  const umidità = json['main']['humidity'];
  const pressione = json['main']['pressure'];
  const vel_vento = json['wind']['speed'];
  const ang_vento = json['wind']['deg'];
  const descrizione = json['weather'][0]['description'];

  Meteo(nome, id, nazione, longitudine, latitudine, temperatura, max, min, percepita, umidità, pressione, vel_vento, ang_vento, descrizione);
}


function onResponse(response)
{
  //dalla response estraggo il JSON
  return response.json();
}


function search(event)
{
  event.preventDefault();

  const input = document.querySelector('#input_meteo');
  //estraggo il valore dall'input, lo codifico e lo conservo
  const input_value = input.value;

  // CREO IL FORM DATA
  const formData = new FormData();
  formData.append("city", input_value);

  fetch("sMeteo.php", {method: "post", body:formData}).then(onResponse).then(onJson);
}

const form = document.querySelector('#form_meteo');
form.addEventListener('submit', search);




/* API SPOTIFY */
function onJsonTracks(json)
{
  //console.log(json);
  const results = json.items;
  console.log(results);
  const num_results = results.length;

  // SELEZIONO L'ELEMENTO IN MODAL VIEW
  const sez = document.querySelector('ul.tracks');
  console.log(sez);

  const new_sez = sez.parentNode;
  console.log(new_sez);

  //SCORRO I RISULTATI OTTENUTI
  for(let i=0; i<num_results; i++)
  {
    //LEGGO L'ALBUM
    const tracks = results[i];
    //console.log(tracks);


    const box_brano = document.createElement('div');
    box_brano.classList.add('box_brano');
    sez.appendChild(box_brano);

    const li = document.createElement('li');
    li.classList.add('track');
    li.textContent = results[i].name;
    box_brano.appendChild(li);

    if(tracks.preview_url !== null)
    {
      const audio = document.createElement('audio');
      audio.classList.add('audio');
      audio.setAttribute("controls", "");
      box_brano.appendChild(audio);

      const brano = document.createElement('source');
      brano.setAttribute("src", results[i].preview_url);
      brano.setAttribute("type", "audio/mpeg");
      audio.appendChild(brano);
    }
  }
}

function onResponseTracks(response)
{
  return response.json();
}

// (6)
// Definiamo le due nuove funzioni:

//onJson
//e prende in ingresso un JSON
function onJsonAlbum(json)
{
  //SVUOTIAMO LA LIBRERIA
  const libreria = document.querySelector('#album__view');
  //Stampo i risultati ALBUM che trovo nel file json
  //console.log(json);

  //SVUOTO I RISULATI PRECEDENTI
  libreria.innerHTML='';

  //LEGGIAMO IL NUMERO DI RISULTATI CHE HA RESTITUITO SPOTIFY
  //MI TORNA UN ARRAY DI RISULTATI
  const results = json.albums.items;
  console.log(results);
  //SALVO IL NUMERO DEI RISULATI
  let num_results = results.length;

  //STAMPO SOLAMENTE 'N' RISULTATI
  if(num_results > 20)
  {
    num_results = 20;
  }

  //SCORRO I RISULTATI OTTENUTI
  for(let i=0; i<num_results; i++)
  {
    //LEGGO L'ALBUM
    const album_data = results[i];


    const album_id = album_data.id;
    const artista_id = album_data.artists[0].id;

    //lEGGO LE INFORMAZIONI CHE VOGLIO VISUALIZZARE NEL MIO SITO

    //SPOTIFY MI RITORNA UNA SERIE DI IMMAGINI DI COPERTINA
    //IO PRENDO IL LINK DELLA PRIMA
    const cover = album_data.images[0].url;

    //NOME ALBUM
    const title = album_data.name;
    //NUMERO DI BRANI
    const n_tracks = album_data.total_tracks;
    //DATA DI RILASCIO
    const date = album_data.release_date;
    //NOME ARTISTA
    const artist = album_data.artists[0].name;

    //A QUESTO PUNTO CREO IL DIV CHE CONTERRA' TITOLO ALBUM E IMMAGINE
    const contenitore_album = document.createElement('div');
    //DIAMO A QUESTO DIV UNA CLASSE DEFINITA NEL CSS
    contenitore_album.classList.add('album');
    contenitore_album.dataset.idAlbum = album_id;
    contenitore_album.dataset.idArtista = artista_id;
    contenitore_album.dataset.folder = cover;
    contenitore_album.dataset.titolo = title;
    contenitore_album.dataset.n_brani = n_tracks;
    contenitore_album.dataset.dataRilascio = date;
    contenitore_album.dataset.artista = artist;

    //Creo il tag <img> per l'IMMAGINE PER LA COPERTINA DELL'ALBUM CHE VOGLIO STAMPARE
    const image = document.createElement('img');
    image.addEventListener('click', onClick);
    image.classList.add('album__image')
    image.src = cover;

    //Creo una sezione testuale dove caricherò il titolo
    const box_text = document.createElement('div');
    box_text.classList.add('album__copy');

    const titolo = document.createElement('h1');
    titolo.textContent = title;

    //APPENDO GLI ELEMENTI
    contenitore_album.appendChild(image);
    contenitore_album.appendChild(box_text);
    box_text.appendChild(titolo);

    //APPENDO IL MIO CONTENITORE DI INFORMAZIONI/ELEMENTI NELLA MIA sezione
    libreria.appendChild(contenitore_album);
  }
}

//onResponse
//anche questa si prende come parametro una "response"
function onResponseAlbum(response)
{
  //della "response" estraiamo il JSON!
  return response.json();
}


function searchAlbum(event)
{
  event.preventDefault();
  const input = document.getElementById('album_input');
  let input_value = input.value;
  console.log(input_value);

  // CREO IL FORM DATA
  const formData = new FormData();
  formData.append("input", input_value);

  fetch("sAlbum.php", {method: "post", body:formData}).then(onResponseAlbum).then(onJsonAlbum);

}

// (1)_______________________________________
// Prima cosa da fare:
// Aggiungiamo l'eventListener al <form>
const form_album = document.querySelector('#form_music');
form_album.addEventListener('submit', searchAlbum);


const progbar_api = document.getElementById('progbar');
let totalHeight_api = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight_api) * 70; progbar_api.style.height = progressHeight + "%";}
