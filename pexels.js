
function onJsonPexels(json)
{
  console.log(json);

  let source = json.src.original;

  console.log(source);









}


function onResponsePexels(response)
{
  return response.json();
}


function requestPhoto()
{
  const array_photo_id = ['1010519', '63695', '417451', '1431796', '811838', '1407322'];

  for(let i=0; i<array_photo_id.length; i++)
  {
    let indice = array_photo_id[i];
    fetch('https://api.pexels.com/v1/photos/' + indice,
    {
      method: 'GET',
      headers:
      {
        Accept:'application/json',
        Authorization: key_pexels
      }
    }).then(onResponsePexels).then(onJsonPexels);
  }
}


function createImage(src)
{
  const image = document.createElement('img');
  image.src = src;
  return image;
}

function onClickPexel(event)
{
  const image = createImage(event.currentTarget.src);
  document.body.classList.add('no_scroll');
  modalView.style.top = window.pageYOffset + 'px';
  modalView.classList.remove('hidden');
  modalView.appendChild(image);
  modalView.appendChild(testo);
}

function onModalClick()
{
  modalView.classList.add('hidden');
  document.body.classList.remove('no_scroll');
  modalView.innerHTML = '';
}


const modalView = document.querySelector('#modalView');
modalView.addEventListener('click', onModalClick);

const key_pexels = '563492ad6f91700001000001328ec93d742e42178a8de98988ff5227';
requestPhoto();
