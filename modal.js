function createImage(src)
{
  const image = document.createElement('img');
  image.src = src;
  return image;
}

function onClick(event)
{
  //console.log(event.currentTarget.parentNode);

  const image = createImage(event.currentTarget.src);
  modalView.appendChild(image);

  const div = document.createElement('div');
  div.classList.add('modalView_info');
  modalView.appendChild(div);

  const div_copy = document.createElement('div');
  div_copy.classList.add('modalView_copy');
  div.appendChild(div_copy);


  const box_titolo = document.createElement('div')
  box_titolo.classList.add('modalView_title');
  div_copy.appendChild(box_titolo);

  const titolo = document.createElement('h4');
  titolo.textContent = event.currentTarget.parentNode.dataset.titolo;
  titolo.classList.add('big-text');
  box_titolo.appendChild(titolo);

  const nome_artista = document.createElement('span');
  nome_artista.textContent = event.currentTarget.parentNode.dataset.artista;
  nome_artista.classList.add('med-text');
  box_titolo.appendChild(nome_artista);

  const box_detail = document.createElement('div');
  box_detail.classList.add('modalView_detail');
  div_copy.appendChild(box_detail);

  const id_album = document.createElement('span');
  const album_id = event.currentTarget.parentNode.dataset.idAlbum;
  console.log(album_id);
  id_album.textContent ='ORIGINAL ID ALBUM: ' + event.currentTarget.parentNode.dataset.idAlbum;
  box_detail.appendChild(id_album);


  const id_artista = document.createElement('span');
  id_artista.textContent = 'ORIGINAL ID ARTISTA: ' + event.currentTarget.parentNode.dataset.idArtista;
  box_detail.appendChild(id_artista);


  const num_brani = document.createElement('span');
  num_brani.textContent = 'TRACKS: ' + event.currentTarget.parentNode.dataset.n_brani;
  box_detail.appendChild(num_brani);

  const data_rilascio = document.createElement('span');
  data_rilascio.textContent = 'DATA DI RILASCIO: ' + event.currentTarget.parentNode.dataset.dataRilascio;
  box_detail.appendChild(data_rilascio);

  const box_tracks = document.createElement('div');
  box_tracks.classList.add('box_tracks');
  div.appendChild(box_tracks);

  const tracks = document.createElement('ul');
  tracks.classList.add('tracks');
  box_tracks.appendChild(tracks);


  // CREO IL FORM DATA
  const formData = new FormData();
  formData.append("idAlbum", album_id);

  fetch("sTrackList.php", {method: "post", body:formData}).then(onResponseTracks).then(onJsonTracks);

  document.body.classList.add('no_scroll');
  modalView.style.top = window.pageYOffset + 'px';
  modalView.classList.remove('hidden');

}

function onModalClick()
{
  modalView.classList.add('hidden');
  document.body.classList.remove('no_scroll');
  modalView.innerHTML = '';
}


const modalView = document.querySelector('#modalView');
modalView.addEventListener('click', onModalClick);
