

function onClickMenu(event)
{
  //console.log(event.currentTarget.parentNode);
  const menu = event.currentTarget.parentNode.querySelector('.menu');
  //console.log(menu);
  menu.classList.toggle('is-open');
  const hero = event.currentTarget.parentNode.parentNode.parentNode.querySelector('.hero_element');
  hero.classList.toggle('nasconditi');
}


const menu = document.querySelector('#icona_menu');
menu.addEventListener('click', onClickMenu);


const progbar = document.getElementById('progbar');
let totalHeight = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight) * 150; progbar.style.height = progressHeight + "%";}
