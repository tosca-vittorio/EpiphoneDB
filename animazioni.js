var anima_zoom =
{
  duration: 1500, //questa è la durata dell'effetto
  easing: 'cubic-bezier(.215, .61, .355, 1)', //velocità dell'animazione
  interval: 200, //questa è la durata fra un effetto e quello successivo

  scale: 0.65, //diamo un valore di partenza più piccolo
  mobile: false //disattiviamo l'effetto su mobile
}

var animazioneX2 =
{
  distance: '100px', //faccio iniziare l'animazione dal basso di 100px
  duration: 1500, //questa è la durata dell'effetto
  easing: 'cubic-bezier(.215, .61, .355, 1)', //velocità dell'animazione
  interval: 500, //questa è la durata fra un effetto e quello successivo
}

var animazione =
{
  distance: '100px', //faccio iniziare l'animazione dal basso di 100px
  duration: 1500, //questa è la durata dell'effetto
  easing: 'cubic-bezier(.215, .61, .355, 1)', //velocità dell'animazione
  interval: 800, //questa è la durata fra un effetto e quello successivo
}

ScrollReveal().reveal('.animaX2', animazione);
ScrollReveal().reveal('.anima', animazione);

ScrollReveal().reveal('.zoom', anima_zoom);
