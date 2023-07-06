function onCercaLikeJson(json, giocatore, foto){
    const sezione1=document.querySelector('#section1');
    const bottone = document.createElement('button');
    bottone.classList.add('bottone-like');
    const cuore = document.createElement('i');
    if (json.exists === true) {
      console.log('Like messo');
      cuore.classList.add('fas');
    } else {
      console.log('Like non messo');
      cuore.classList.add('far');
    }

    bottone.appendChild(cuore);
    sezione1.appendChild(bottone);
    cuore.classList.add('fa-heart');

    bottone.addEventListener('click', function () {
  
      if (cuore.classList.contains('far')) {
        cuore.classList.remove('far');
        cuore.classList.add('fas');
        cuore.classList.add('animating');
        fetch(`/aggiungilike=${giocatore}&foto=${foto}`)
          .then((response) => response.text())
          .then((data) => console.log(data))
          .catch((error) => console.log(error));
      } else {
        cuore.classList.remove('fas');
        cuore.classList.add('far');
        cuore.classList.add('animating');
        fetch(`/rimuovilike=${giocatore}&foto=${foto}`)
          .then((response) => response.text())
          .then((data) => console.log(data))
          .catch((error) => console.log(error));
      }
      
      setTimeout(function() {
        cuore.classList.remove('animating');
      }, 500);
    });
  }


function onCercaGiocatoreJson(json){
    const sezione1=document.querySelector('#section1');
    sezione1.innerHTML='';
    const immagine=document.createElement('img');
    immagine.src=json.player[0].strCutout;
    immagine.classList.add('immagine3');
    sezione1.appendChild(immagine);
    const p1=document.createElement('p');
    p1.textContent='Birth date: ' + json.player[0].dateBorn;
    p1.classList.add('risultato');
    sezione1.appendChild(p1);
    const p2=document.createElement('p');
    p2.textContent='Birth place: ' + json.player[0].strBirthLocation;
    p2.classList.add('risultato');
    sezione1.appendChild(p2);
    const p3=document.createElement('p');
    p3.textContent='Height: ' + json.player[0].strHeight;
    p3.classList.add('risultato');
    sezione1.appendChild(p3);
    const p4=document.createElement('p');
    p4.textContent='Weight: ' + json.player[0].strWeight;
    p4.classList.add('risultato');
    sezione1.appendChild(p4);
    const p5=document.createElement('p');
    p5.textContent='Field position: ' + json.player[0].strPosition;
    p5.classList.add('risultato');
    sezione1.appendChild(p5);
    const p6=document.createElement('p');
    p6.textContent='Nationality: ' + json.player[0].strNationality;
    p6.classList.add('risultato');
    sezione1.appendChild(p6);
    const p7=document.createElement('p');
    p7.textContent='Club: ' + json.player[0].strTeam;
    p7.classList.add('risultato');
    sezione1.appendChild(p7);
    const p8=document.createElement('p');
    p8.textContent='Jersey number: ' + json.player[0].strNumber;
    p8.classList.add('risultato');
    sezione1.appendChild(p8);
    const p9=document.createElement('p');
    p9.textContent='National team: ' + json.player[0].strTeam2;
    p9.classList.add('risultato');
    sezione1.appendChild(p9);
    const p10=document.createElement('p');
    p10.textContent='Favorite foot: ' + json.player[0].strSide;
    p10.classList.add('risultato');
    sezione1.appendChild(p10);
    const giocatore=json.player[0].strPlayer;
    const foto=json.player[0].strCutout;
    fetch(`/cercalikegiocatore?giocatore=${giocatore}`)
    .then(response => response.json())
    .then(json => onCercaLikeJson(json, giocatore, foto));
}



function onCercaGiocatore(response){
    return response.json();
}

function onCercaLikeStadioJson(json, nomeStadio, foto){
    const sezione1=document.querySelector('#section1');
    const bottone = document.createElement('button');
    bottone.classList.add('bottone1', 'bottone-like');
    const cuore = document.createElement('i');
    if (json.exists === true) {
      console.log('Like messo');
      cuore.classList.add('fas');
    } else {
      console.log('Like non messo');
      cuore.classList.add('far');
    }

    bottone.appendChild(cuore);
    sezione1.appendChild(bottone);
    cuore.classList.add('fa-heart');

    bottone.addEventListener('click', function () {
  
      if (cuore.classList.contains('far')) {
        cuore.classList.remove('far');
        cuore.classList.add('fas');
        cuore.classList.add('animating');
        fetch(`/aggiungilikestadio?stadio=${nomeStadio}&foto=${foto}`)
          .then((response) => response.text())
          .then((data) => console.log(data))
          .catch((error) => console.log(error));
      } else {
        cuore.classList.remove('fas');
        cuore.classList.add('far');
        cuore.classList.add('animating');
        fetch(`/rimuovilikestadio?stadio=${nomeStadio}`)
          .then((response) => response.text())
          .then((data) => console.log(data))
          .catch((error) => console.log(error));
      }
      
      setTimeout(function() {
        cuore.classList.remove('animating');
      }, 500);
    });
}


function onCercaStadioJson(json){
  console.log(json)
    const inserito=document.querySelector('#barra');
    const squadraCercata=inserito.value;
    const squadre=json.response;
    for(let i=0;i<squadre.length;i++){
        if(squadre[i].team.name===squadraCercata)
        {
            const sezione1=document.querySelector('#section1');
            sezione1.innerHTML='';
            const stemma=document.createElement('img');
            stemma.classList.add('immagine1');
            stemma.src=squadre[i].team.logo;
            const stadio=document.createElement('img');
            stadio.classList.add('immagine2');
            stadio.src=squadre[i].venue.image;
            const p1=document.createElement('p');
            p1.textContent='Name: ' + squadre[i].venue.name;
            p1.classList.add('risultato');
            const p2=document.createElement('p');
            p2.textContent='Location: ' + squadre[i].venue.city + ', ' + squadre[i].venue.address;
            p2.classList.add('risultato');
            const p3=document.createElement('p');
            p3.textContent='Capacity: ' + squadre[i].venue.capacity;
            p3.classList.add('risultato');
            console.log('Ho trovato la squadra che cercavi');
            sezione1.appendChild(stemma);
            sezione1.appendChild(stadio);
            sezione1.appendChild(p1);
            sezione1.appendChild(p2);
            sezione1.appendChild(p3);
            const nomeStadio=squadre[i].venue.name;
            const foto=squadre[i].venue.image;
            fetch(`/cercalikestadio?stadio=${nomeStadio}`)
            .then(response => response.json())
            .then(json => onCercaLikeStadioJson(json, nomeStadio, foto));
        }
    }
}

function onCercaStadio(response){
    return response.json();
}


function onSubmit(event){
  event.preventDefault();
  const form = document.querySelector('#form1');

  const stadio = form.elements.stadio.value;
  const seleziona = form.elements.seleziona.value;

  const data = new FormData();
  data.append('_token', csrfToken);
  data.append('stadio', stadio);
  data.append('seleziona', seleziona);

  fetch('/cercastadio', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrfToken// include the CSRF token in the headers
    },
    body: data
  }).then(onCercaStadio).then(onCercaStadioJson);
}

function onSubmit2(event){
    event.preventDefault();
    const form = document.querySelector('#form2');
    const nome = form.elements.nome.value;
    const cognome = form.elements.cognome.value;

    const data = new FormData();
    data.append('_token', csrfToken);
    data.append('nome', nome);
    data.append('cognome', cognome);

    fetch('/cercagiocatore', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken// include the CSRF token in the headers
        },
        body: data
    }).then(onCercaGiocatore).then(onCercaGiocatoreJson)
}

const form1=document.querySelector('#form1');
form1.addEventListener('submit', onSubmit);
const form2=document.querySelector('#form2');
form2.addEventListener('submit', onSubmit2);
