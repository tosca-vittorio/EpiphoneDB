
function onJsonCheckUsername(json)
{
  console.log(json);
  let result = json[0];
  console.log(result);

  if(result)
  {
    // SE L'UTENTE ESISTE SEGNALO L'ERRORE
    const error = document.querySelector('span[name="error_cUsername"]');
    const us = document.querySelector('.type_zero input[name="Username"]');

    error.textContent = "USERNAME NON DISPONIBILE!";
    error.classList.remove('okay');
    error.classList.remove('hidden');

    error.classList.add('error');
    //console.log(username.parentNode.parentNode.querySelector("input[type='text']").value);
    us.value='';
  }

  else
  {
    const not_error = document.querySelector('span[name="error_cUsername"]');
    not_error.classList.remove('hidden');
    not_error.classList.remove('error');

    not_error.classList.add('okay');
    not_error.textContent = "USERNAME DISPONIBILE!";
  }
}

function onResponseCheckUsername(response)
{
  return response.json();
}



function checkEmail(event)
{
  const form = document.getElementById("form");
  let email_value = document.getElementById("email").value;
  const text = document.getElementById("text");

  const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if(email_value.match(pattern))
  {
    form.classList.add("valid");
    form.classList.remove("invalid");
    text.textContent = "La tua Email Address è valida";
    text.style.color = "#00ff00";
  }

  else
  {
    form.classList.remove("valid");
    form.classList.add("invalid");
    text.textContent = "Perfavore, inserisci un Email Address valido";
    text.style.color = "#ff0000";

    const mail = document.querySelector('input[name="Email"]');
    mail.value='';
  }

  if(email_value == '')
  {
    form.classList.remove("valid");
    form.classList.remove("invalid");
    text.textContent = "";
    text.style.color = "#00ff00";
  }
}

function check_cPassword(event)
{
  //prendo il valore del campo "verifica password"
  const checkPass = document.querySelector('input[name="cPassword"]');
  let valueCheck = checkPass.value;
  console.log(valueCheck);

  //prendo il valore del campo "password"
  const pass = document.querySelector('input[name="Password"]');
  let valuePass = pass.value;
  console.log(valuePass);

  if(valuePass != '')
  {
    if (valueCheck != valuePass)
    {
      console.log('password diverse imbecille');
      const span_error = document.querySelector('span[name="error_cPassword"]');
      span_error.textContent = "Password diverse.. Hai già dimenticato la tua password?";
      span_error.classList.remove('okay')
      span_error.classList.remove('hidden');

      span_error.classList.add('error');
      // potrei pulire entrambi i campi di testo, ma forse è meglio agire solo sul campo di verifica password:
      checkPass.value='';
    }

    else
    {
      const span_error = document.querySelector('span[name="error_cPassword"]');
      span_error.classList.remove('hidden');
      span_error.classList.remove('error');
      span_error.classList.add('okay');
      span_error.textContent = "Le Password coincidono";
    }
  }

  else
  {
    const span_error = document.querySelector('span[name="error_cPassword"]');
    span_error.textContent = "Devi prima inserire la password per poter confermare";
    span_error.classList.remove('okay')
    span_error.classList.remove('hidden');

    span_error.classList.add('error');
    checkPass.value='';
  }



}


function checkCognome(event)
{
  //seleziono nuovamente la label "cognome"
  const cognome = document.querySelector('input[name="Cognome"]');
  let value = cognome.value;

  //verifico che il valore della label rispetti un certo pattern
  if(!/^[ a-z A-Z ò à ù è ]{4,15}$/.test(cognome.value))
  {
    //alert('Sono ammesse lettere, numeri e undescore ed un massimo di 15 caratteri.');

    const span_error = cognome.parentNode.parentNode.parentNode.querySelector('span[name="error_cognome"]');
    span_error.textContent = "Errore durante l'inserimento del cognome. Inserisci una combinazione di almeno 4 lettere(a-z oppure A-Z) utilizzando anche caratteri speciali(òàùè)";
    span_error.classList.remove('hidden');
    span_error.classList.remove('okay');

    span_error.classList.add('error');
    cognome.value='';
  }
  else
  {
    const span_error = cognome.parentNode.parentNode.parentNode.querySelector('span[name="error_cognome"]');
    span_error.classList.remove('hidden');
    span_error.classList.remove('error');

    span_error.classList.add('okay');
    span_error.textContent = "Formato 'Cognome' valido";
  }
}

function checkNome(event)
{
  //seleziono nuovamente la label "nome"
  const nome = document.querySelector('input[name="Nome"]');
  let value = nome.value;

  //verifico che il valore della label rispetti un certo pattern
  if(!/^[a-zA-Z]{3,15}$/.test(nome.value))
  {
    //alert('Sono ammesse lettere, numeri e undescore ed un massimo di 15 caratteri.');

    const span_error = nome.parentNode.parentNode.parentNode.querySelector('span[name="error_nome"]');
    span_error.textContent = "Errore durante l'inserimento del nome. Inserisci una combinazione di almeno 3 lettere(a-z oppure A-Z)";
    span_error.classList.remove('hidden');
    span_error.classList.remove('okay');

    span_error.classList.add('error');
    nome.value='';
  }
  else
  {
    const span_error = nome.parentNode.parentNode.parentNode.querySelector('span[name="error_nome"]');
    span_error.classList.remove('hidden');
    span_error.classList.remove('error');

    span_error.classList.add('okay');
    span_error.textContent = "Formato 'Nome' valido";
  }
}


function checkPassword(event)
{
  //seleziono nuovamente la label "password"
  const password = document.querySelector('.type_zero input[name="Password"]');
  let value = password.value;

  //verifico che il valore della label rispetti un certo pattern
  if(!/^[a-zA-Z0-9_àòùè]{4,15}$/.test(password.value))
  {
    //alert('Sono ammesse lettere, numeri e undescore ed un massimo di 15 caratteri.');

    const span_error = password.parentNode.parentNode.parentNode.parentNode.querySelector('span[name="error_password"]');
    span_error.textContent = "Errore durante l'inserimento della password. Inserisci una combinazione di almeno 4 lettere(a-z oppure A-Z), numeri(0-9), caratteri speciali( _ àòùè)";
    span_error.classList.remove('hidden');
    span_error.classList.remove('okay');


    console.log(password.parentNode.parentNode.querySelector("input[type='password']").value);
    span_error.classList.add('error');
    password.value='';
  }
  else
  {
    const span_error = password.parentNode.parentNode.parentNode.parentNode.querySelector('span[name="error_password"]');
    span_error.classList.remove('hidden');
    span_error.classList.remove('error');

    span_error.classList.add('okay');
    span_error.textContent = "Formato 'Password' valido";
  }
}

function checkUsername(event)
{
  //seleziono nuovamente la label "username"
  const username = document.querySelector('.type_zero input[name="Username"]');
  let value = username.value;
  //console.log(value);


  //verifico che il valore della label rispetti un certo pattern
  if(!/^[ a-z A-Z 0-9 _ àòùè]{4,15}$/.test(username.value))
  {
    const span_cError = document.querySelector('span[name="error_cUsername"]');
    span_cError.classList.remove('okay');
    span_cError.classList.add('hidden');

    //alert('Sono ammesse lettere, numeri e undescore ed un massimo di 15 caratteri.');
    const span_error = username.parentNode.parentNode.parentNode.parentNode.querySelector('span[name="error_username"]');
    span_error.textContent = "Errore durante l'inserimento dell'username. Inserisci una combinazione di almeno 4 lettere(a-z oppure A-Z), numeri(0-9), caratteri speciali( _ àòùè)";
    span_error.classList.remove('okay');
    span_error.classList.remove('hidden');

    span_error.classList.add('error');
    //console.log(username.parentNode.parentNode.querySelector("input[type='text']").value);
    username.value='';
  }

  else
  {
    const span_error = username.parentNode.parentNode.parentNode.parentNode.querySelector('span[name="error_username"]');
    span_error.classList.remove('hidden');
    span_error.classList.remove('error');

    span_error.classList.add('okay');
    span_error.textContent = "Formato 'Username' valido";

    //procediamo ad un ulteriore controllo,
    //questa volta effettuato da una pagina php

    //passiamo la stringa di input che l'utente inserisce
    //In questo modo stiamo effettuando una richiesta AJAX ASINCRONA AL SERVER

    //Stiamo effettuando una richiesta GET alla pagina "login_checkUsername"
    //dopo il "?" passiamo le variabiliin formato 'chiave' : 'valore'. Quindi assegniamo
    //q= al valore inserito dall'utente. Attenzione, il server non restituisce FILE JSON
    //MA RISPOSTE. In questo caso la risposta è JSON, ma può dare anche risposte testuali,
    //MA NON FILE! Possiamo passare quanti parametri vogliamo concatenandoli con "&", in
    //questo caso ne stiamo passando uno solo.

    // CREO IL FORM DATA
    const formData = new FormData();
    formData.append("alias", value);

    fetch("register_checkUsername.php", {method: "post", body:formData}).then(onResponseCheckUsername).then(onJsonCheckUsername);
  }
}

function verifica(event)
{

  //ACCEDO AL VALORE INSERITO DALL'UTENTE nei vari input del nostro form

  //VERIFICA CHE TUTTI I CAMPI DEVONO ESSERE INSERITI
  if(form_dati.Nome.value.length==0 || form_dati.Cognome.length==0 ||
     form_dati.Username.length == 0 || form_dati.Password.length==0 ||
     form_dati.cPassword.length == 0 || form_dati.Email.length==0 ||
     form_dati.Genere.value === '')
  {
    //SE UNO DI QUESTI CAMPI NON E' STATO INSERITO:

    //MANDIAMO UN ALERT PER AVVISARE L'UTENTE
    alert('Compilare tutti i campi!!');
    event.preventDefault();
  }
}


//Per prima cosa definiamo una variabile che ci permette di avere il riferimento al FORM
const form_dati = document.forms['form_dati'];

//L'evento 'submit' di default è quello di inviare i dati.
//Noi in questo modo andiamo a intercettare il comportamento di default del form
//e gli diciamo cosa fare prima di mandare i dati intercettando l'evento submit
//e chiamando un handler, in questo caso la funzione verifica.
form_dati.addEventListener('submit', verifica);

/*--------------------------------------------------------------------------------------------*/

//seleziono la label "username"
const input_username = document.querySelector('input[name="Username"]');
//console.log(input_username);
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_username.addEventListener('blur', checkUsername);

//seleziono la label "password"
const input_password = document.querySelector('input[name="Password"]');
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_password.addEventListener('blur', checkPassword);

//seleziono la label "nome"
const input_nome = document.querySelector('input[name="Nome"]');
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_nome.addEventListener('blur', checkNome);

//seleziono la label "Cognome"
const input_cognome = document.querySelector('input[name="Cognome"]');
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_cognome.addEventListener('blur', checkCognome);

//seleziono la label "cPassword"
const input_cPassword = document.querySelector('input[name="cPassword"]');
//associo un event 'blur' che viene attivato nel momento in cui esce il focus della label
input_cPassword.addEventListener('blur', check_cPassword);

const email = document.querySelector("input[name='Email']");
//console.log(email);
email.addEventListener('blur', checkEmail);


const progbar_regi = document.getElementById('progbar');
let totalHeight_regi = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight_regi) * 100; progbar_regi.style.height = progressHeight + "%";}
/*-------------------------------------------------------------------------------------------*/
//TOGGLE PASSWORD ----> CAMPO PASSWORD
function showPassword(event)
{
  //console.log(event)
  if(stateP)
  {
    let typeP = document.getElementById('Password');
    typeP.setAttribute("type", "password");
    console.log(typeP);
    document.getElementById('eyeP').style.color='#7a797e';
    stateP = false;
  }
  else
  {
    let typeP = document.getElementById('Password');
    typeP.setAttribute("type", "text");
    document.getElementById('eyeP').style.color='#5887ef';

    stateP = true;
  }

}

var stateP = false;
const eyeP = document.getElementById('eyeP');
//console.log(eyeP);
eyeP.addEventListener('click', showPassword);
