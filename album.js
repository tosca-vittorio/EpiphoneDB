const RIGHT_ARROW = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1083533/forward-arrow.png';
const DOWN_ARROW = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1083533/down-arrow.png';


function cerca(event)
{
    let trovato = 0;
    const barraRicerca = event.currentTarget;
    const contenuti = document.querySelector('.master');
    //console.log(contenuti);
    const titles = contenuti.querySelectorAll('h1');
    //console.log(titles);

   for(elemento of titles)
    {
      /*console.log(elemento.textContent);
      console.log(elemento.parentNode.parentNode);*/
      //console.log(elemento.parentNode.parentNode.parentNode);

      if(elemento.textContent.toLowerCase().search(barraRicerca.value.toLowerCase()) === -1)
      {
        elemento.parentNode.parentNode.parentNode.classList.add('hidden');
        trovato++;
      }
      else
      {
        elemento.parentNode.parentNode.parentNode.classList.remove('hidden');
      }
    }
}


function toggle(event)
{
  console.log('event.target: ' + event.target.tagName);
  console.log('event.currentTarget: ' + event.currentTarget.tagName);
  console.log(event.currentTarget.parentNode);

  //risalgo fino al parentNode <div class='item__copy' per selezionare la classe <div class='dettagli hidden'>
  const details = event.currentTarget.parentNode.querySelector('.dettagli');
  //con l'event.currentTarget siamo dentro il <div class='mostra_dettagli'>
  //quindi, seleziono e salvo sia l'immagine sia il testo contenuto nello <span>
  const image = event.currentTarget.querySelector('img');
  const text = event.currentTarget.querySelector('span');


  if (details.classList.contains('hidden'))
  {
    //Rimuovo la 2° classe del <div class='dettagli hidden'>, ottenendo quindi <div class='dettagli'>
    details.classList.remove('hidden');
    //cambio il contenuto della mia immagine
    image.src = DOWN_ARROW;
    //cambio il contenuto del mio testo
    text.textContent = 'Nascondi dettagli';
  }
  else
   {
     //Riporto tutto allo stato iniziale
    details.classList.add('hidden');
    image.src = RIGHT_ARROW;
    text.textContent = 'Mostra dettagli';
  }
}





function removePreferito(event)
{
  //VERIFICO SE AL 'CLICK' SONO DENTRO QUESTA FUNZIONE
  console.log(event);

  //console.log(event.target);
  //console.log(event.currentTarget);
  //console.log(event.currentTarget.parentNode);

  event.target.src = 'icon/cuore_vuoto1.png';
  event.currentTarget.parentNode.classList.remove('selected');

  const box_preferiti = document.querySelector('#preferiti');
  const sezione_preferiti = document.querySelector('.preferiti__copy');
  const pref = sezione_preferiti.querySelectorAll('.item.selected');
  console.log(pref);

  const box_master = document.querySelector('.master');
  const selezionati = box_master.querySelectorAll('section .item.selected');
  console.log(selezionati);


  //memorizzo il nome del clone da eliminare
  const daElimnare = event.currentTarget.parentNode.dataset.albumName;
  console.log("da eliminare: " + daElimnare);

  //SCORRO L'ARRAY DEI PREFERITI
  for(preferito of pref)
  {
    //potrei stampare gli elementi di questo array
    //console.log(preferito);

    //SE IL PREFERITO CORRENTE
    //HA IL DATASET.ALBUMNAME IDENTICO A QUELLO
    if(preferito.dataset.albumName === daElimnare)
    {
      console.log('Clone trovato: ' + preferito.dataset.albumName);
      preferiti.shift(preferito);
      sezione_preferiti.removeChild(preferito);

      if(preferiti.length === 0)
      {
        box_preferiti.classList.add('hidden');
      }
    }

    else
    {
      console.log('Non trovato');
    }
  }
  const item_deselected = event.currentTarget;
  item_deselected.removeEventListener('click', removePreferito);
  //AGGIUNGO un nuovo addEventListener alla checkbox corrente in maniera dinamica
  item_deselected.addEventListener('click', itemSelezionato);
  console.log('Vettore che contiene i preferiti selezionati: ' + preferiti);
}

// Ora, definiamo la funzione 'itemSelezionato'
function itemSelezionato(event)
{
  //event.currentTarget ci riporta al nodo .item__checkbox
  //quindi, per prima cosa cambiamo l'icona
  event.currentTarget.querySelector('img').src = "icon/cuore_pieno1.png"

  //dopodiché devo necessariamente spostarmi al nodo padre
  //per poter modificare lo stile dell'item.
  //Quindi utilizzo .parentNode per risalire fino al nodo padre ".item"
  //così da poter aggiungere al parentNode della checkbox selezionata, il nuovo stile
  event.currentTarget.parentNode.classList.add('selected');

  //Conservo la risposta che l'utente ha selezionato
  //memorizzo l'attributo dataset, aggiunto in fase di creazione degli elementi,
  //che contiene il nome dell'album. Quindi memorizzo il nome dell'album corrente.
  const rispostaSelezionata = event.currentTarget.parentNode.dataset.albumName
  //AGGIUNGO un flag per contrassegnare che questo elemento è stato selezionato
  const selezionato = event.currentTarget.parentNode.dataset.selezionato = 1;
  //verifico le operazioni riga=100 e riga=102
  console.log("La risposta selezionata dall'utente è: " + rispostaSelezionata);

  //Nel vettore che contiene le "RISPOSTE SELEZIONATE"
  //aggiungo la copia dell'elemento selezionato dall'utente.
  risposteSelezionate.unshift(rispostaSelezionata);
  //Stampo questo vettore per verificare che tutto funzioni
  console.log('Vettore che contiene le risposte selezionate: ' + risposteSelezionate);


  //SEZIONE PREFERITI

  //Creo una variabile javascript per visualizzare in console l'idea di implementazione

  //quindi utilizzo questa variabile per risalire al giusto elemento del DOM,
  //ovvero l'item corrente selezionato dall'utente
  const preferitoSelezionato = event.currentTarget.parentNode;
  console.log("L'utente ha selezionato " + "preferitoSelezionato = " + event.currentTarget.parentNode.tagName);

  //Adesso DUPLICO l'elemento selezionato dall'utente
  //che corrisponde al preferitoSelezionato, e CONSERVO in una variabile javascript
  //il CLONE dell'elemento selezionato dall'utente.
  let copiaSelezionata = event.currentTarget.parentNode.cloneNode('false');
  copiaSelezionata.classList.add('clone');

  //Nel vettore che contiene i "PREFERITI SELEZIONATI"
  //aggiungo la copia dell'elemento selezionato dall'utente.
  preferiti.unshift(copiaSelezionata);
  //Stampo questo vettore per verificare che tutto funzioni
  console.log('Vettore che contiene i preferiti selezionati: ' + preferiti);

  //Se la SEZIONE DEI PREFERITI NON E' VUOTA
  if(preferiti.length !== 0)
  {
    for(let i=0; i<preferiti.length; i++)
    {
      //SELEZIONA LA SEZIONE DEI PREFERITI
      const section = document.querySelector('.preferiti__copy');
      //NON DEVE ESSERE PIU' NASCOSTA PERCHE' NON E' PIU' VUOTA
      section.parentNode.classList.remove('hidden');
      //APPENDI IL CLONE DELL'ELEMENTO SELEZIONATO
      section.appendChild(copiaSelezionata);
    }
  }


  //Memorizzo all'interno di una variabile javascript
  //l'elemento che mi ritorna l'event.currentTarget, ovvero la checkbox corrente
  const item_selected = event.currentTarget;
  //TOLGO l'addEventListener della checkbox corrente
  item_selected.removeEventListener('click', itemSelezionato)
  //AGGIUNGO un nuovo addEventListener alla checkbox corrente in maniera dinamica
  item_selected.addEventListener('click', removePreferito)



  const more_info = copiaSelezionata.querySelector('.mostra_dettagli');
  more_info.addEventListener('click', toggle);
}

function createArtist(info)
{
  //<div class='artista'>
  const artista = document.createElement('div');
  artista.classList.add('artista');

  //<div class='image'>
  const image = document.createElement('div');
  image.classList.add('image')
  artista.appendChild(image);

  //<img class='artista__image' src="section_maneskin/maneskin.png" alt='maneskin'>
  const artista_image = document.createElement('img');
  artista_image.classList.add('artista__image');
  artista_image.src = info.cover;
  image.appendChild(artista_image);

  //<div class='artista__copy'>
  const copy = document.createElement('div');
  copy.classList.add('artista__copy');
  artista.appendChild(copy);

  const name = document.createElement('h3');
  name.textContent = info.name;
  name.classList.add('normal-text');
  copy.appendChild(name);

  return artista;
}


function createItem(info)
{
  //<div class="item" data-artista="gazzelle" data-album-name="post_punk" data-id="one">
  const item = document.createElement('div');
  item.dataset.albumName = info.title;
  item.classList.add('item');

 //<img class="item__image" src="section_gazzelle/postpunk.png" alt="post_punk">
  const image = document.createElement('img');
  image.src = info.cover;
  image.classList.add('item__image');
  item.appendChild(image);

  //<div class="item__copy">
  const copy = document.createElement('div')
  copy.classList.add('item__copy');
  item.appendChild(copy);

  //<div class="item__list">
   const tracklist = document.createElement('div');
   tracklist.classList.add('item__list');
   copy.appendChild(tracklist);

   //<h1>Post Punk</h1>
   const titolo = document.createElement('h1');
   titolo.textContent = info.title;
   titolo.classList.add('big-text');
   tracklist.appendChild(titolo);

   const songs = info.descrizione;
   for(let i=0; i<songs.length; i++)
   {
     //<li>
     let song = document.createElement('li');
     song.textContent = songs[i];
     tracklist.appendChild(song);
   }

   //<div class='mostra_dettagli'>
   const detail = document.createElement('div');
   detail.classList.add('mostra_dettagli');
   copy.appendChild(detail);

   //<img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1083533/forward-arrow.png' class='arrow'/>
   const freccia = document.createElement('img');
   freccia.classList.add('arrow');
   freccia.src = RIGHT_ARROW;
   detail.appendChild(freccia);

   //<p>Mostra Dettagli</p>
   const span1 = document.createElement('span');
   span1.textContent ='Mostra Dettagli';
   detail.appendChild(span1);

   //<div class='dettagli'>
   const dettagli_nascosti = document.createElement('div');
   dettagli_nascosti.classList.add('dettagli');
   dettagli_nascosti.classList.add('hidden');
   copy.appendChild(dettagli_nascosti);

   //<p>Prezzo: 100 euro</p>
   const price = document.createElement('p');
   price.textContent = info.prezzo;
   dettagli_nascosti.appendChild(price);

   const div_checkbox = document.createElement('div');
   div_checkbox.classList.add('item__checkbox');

   const check_image = document.createElement('img');
   check_image.src = info.checkbox;
   div_checkbox.appendChild(check_image);

   item.appendChild(div_checkbox);
   return item;
}







// MAIN INIZIALE //
const risposteSelezionate = [];
const preferiti = [];

//BARRA DI RICERCA
const labelRicerca = document.querySelector("input[type='text']");
labelRicerca.addEventListener('keyup', cerca)

//sezione GAZZELLE
const gazzelle = document.querySelector('#gazzelle');
for (let i = 0; i < ALBUM_GAZZELLE.length; i++)
{
  const info = ALBUM_GAZZELLE[i];
  const item = createItem(info);
  gazzelle.appendChild(item);
}

//sezione MANESKIN
const maneskin = document.querySelector('#maneskin');
for (let i = 0; i < ALBUM_MANESKIN.length; i++)
{
  const info = ALBUM_MANESKIN[i];
  const item = createItem(info);
  maneskin.appendChild(item);
}

//sezione EINAUDI
const einaudi = document.querySelector('#einaudi');
for (let i = 0; i < ALBUM_EINAUDI.length; i++)
{
  const info = ALBUM_EINAUDI[i];
  const item = createItem(info);
  einaudi.appendChild(item);
}

//sezione INFORMAZIONI ARTISTA
const artist_info = document.querySelector('#artist_info');
for (let i = 0; i < ARTIST_INFO.length; i++)
{
  const info = ARTIST_INFO[i];
  const artista = createArtist(info);
  artist_info.appendChild(artista);
}

// Definiamo il comportamento quando l'utente
// effettua la scelta dell'album
// Quindi, seleziono tutti gli elementi '.item__checkbox'
const actions = document.querySelectorAll('.item__checkbox');
// aggiungiamo la funzione 'handler' per l'evento 'click'
//a tutti gli elementi 'item__checkbox'
for ( action of actions)
{
  action.addEventListener('click', itemSelezionato);
}


//MOSTRA DETTAGLI
console.log(document);
//const detailToggle = document.querySelector('.show-details');
const dettagli = document.querySelectorAll('.mostra_dettagli');
//detailToggle.addEventListener('click', toggle);
for(dettaglio of dettagli)
{
  dettaglio.addEventListener('click', toggle);
}



const progbar_2 = document.getElementById('progbar');
let totalHeight_2 = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight_2)*95; progbar_2.style.height = progressHeight + "%";}
