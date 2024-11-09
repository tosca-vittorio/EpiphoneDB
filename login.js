
function verifica(event)
{
  //ACCEDO AL VALORE INSERITO DALL'UTENTE nei vari input del nostro form

  //VERIFICA CHE TUTTI I CAMPI DEVONO ESSERE INSERITI
  if(form_dati.username.value.length==0 || form_dati.password.length==0)
  {
    //SE UNO DI QUESTI CAMPI NON E' STATO INSERITO:

    //MANDIAMO UN ALERT PER AVVISARE L'UTENTE
    alert('Compilare tutti i campi!!');
    event.preventDefault();
  }
}

function checkPassword(event)
{
  //seleziono nuovamente la label "username"
  const password = document.querySelector('.type_zero input[name="password"]');
  let value = password.value;

  //verifico che il valore della label rispetti un certo pattern
  if(!/^[a-zA-Z0-9_àòùè]{4,15}$/.test(password.value))
  {
    //alert('Sono ammesse lettere, numeri e undescore ed un massimo di 15 caratteri.');

    const span_error = password.parentNode.parentNode.parentNode.querySelector('span[name="error_password"]');
    span_error.textContent = "Errore durante l'inserimento della password. Inserisci una combinazione di almeno 4 lettere(a-z oppure A-Z), numeri(0-9), caratteri speciali( _ àòùè)";
    span_error.classList.remove('hidden');

    console.log(password.parentNode.parentNode.querySelector("input[type='password']").value);
    password.value='';
  }
  else
  {
    const span_error = password.parentNode.parentNode.parentNode.querySelector('span[name="error_password"]');
    span_error.classList.add('hidden');
  }
}

function checkUsername(event)
{
  //seleziono nuovamente la label "username"
  const username = document.querySelector('.type_zero input[name="username"]');
  let value = username.value;

  //verifico che il valore della label rispetti un certo pattern
  if(!/^[ a-z A-Z 0-9 _ àòùè]{4,15}$/.test(username.value))
  {
    //alert('Sono ammesse lettere, numeri e undescore ed un massimo di 15 caratteri.');

    const span_error = username.parentNode.parentNode.querySelector('span[name="error_username"]');
    span_error.textContent = "Errore durante l'inserimento dell'username. Inserisci una combinazione di almeno 4 lettere(a-z oppure A-Z), numeri(0-9), caratteri speciali( _ àòùè)";
    span_error.classList.remove('hidden');

    //console.log(username.parentNode.parentNode.querySelector("input[type='text']").value);
    username.value='';
  }
  else
  {
    const span_error = username.parentNode.parentNode.querySelector('span[name="error_username"]');
    span_error.classList.add('hidden');
  }
}

//seleziono la label "username"
const input_username = document.querySelector('.type_zero input[name="username"]');
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_username.addEventListener('blur', checkUsername);

//seleziono la label "password"
const input_password = document.querySelector('.type_zero input[name="password"]');
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_password.addEventListener('blur', checkPassword);



/*-------------------------------------------------------------------------------------------*/

//Per prima cosa definiamo una variabile che ci permette di avere il riferimento al FORM
const form_dati = document.forms['form_dati'];

//L'evento 'submit' di default è quello di inviare i dati.
//Noi in questo modo andiamo a intercettare il comportamento di default del form
//e gli diciamo cosa fare prima di mandare i dati intercettando l'evento submit
//e chiamando un handler, in questo caso la funzione verifica.
form_dati.addEventListener('submit', verifica);

const progbar_log = document.getElementById('progbar');
let totalHeight_log = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight_log) * 100; progbar_log.style.height = progressHeight + "%";}

/*-------------------------------------------------------------------------------------------*/
//TOGGLE PASSWORD
function showPassword(event)
{
  console.log(event)
  if(state)
  {
    let type = document.getElementById('password');
    type.setAttribute("type", "password");
    console.log(type);
    document.getElementById('eye').style.color='#7a797e';
    state = false;
  }
  else
  {
    let type = document.getElementById('password');
    type.setAttribute("type", "text");
    document.getElementById('eye').style.color='#5887ef';

    state = true;
  }

}

var state = false;
const eye = document.getElementById('eye');
console.log(eye);
eye.addEventListener('click', showPassword);
