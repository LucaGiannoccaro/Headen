
    
    function richiestaImmagini(){
        var xhr = new XMLHttpRequest();
        xhr.open('post', 'php/sliderImages.php?', true);
        xhr.send();
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4 && xhr.status==200){
                var resp = xhr.responseText;
                window.localStorage.clear();
                window.localStorage.setItem('listaImmagini', resp);
                return immagini = JSON.parse(resp);  

            }
        } 
    }
   
   
   var  listaElementi=JSON.parse(window.localStorage.getItem('listaImmagini'));
    var container = document.querySelector('#data-container');
    for(let i=0; i<listaElementi.length; i++){
        let item = document.createElement('div');
        item.classList.add('item');
        item.id = listaElementi[i][0];

        let img = document.createElement('img');
        img.src=listaElementi[i][2];

        let didivTesto = document.createElement('div');
        didivTesto.classList.add('testo');


        let nome = document.createElement('p');
        let testoNome = document.createTextNode(listaElementi[i][1]);
        nome.appendChild(testoNome);
        didivTesto.appendChild(nome);

        let elimina = document.createElement('p');
        elimina.classList.add('elimina');
        let testoElimina = document.createTextNode('Elimina');
        elimina.appendChild(testoElimina);
        elimina.addEventListener('click', (evt) => {
            rimuoviImmagine(listaElementi[i][0], item);
        })
        didivTesto.appendChild(elimina);
        

        let divFrecce = document.createElement('div');
        divFrecce.classList.add('freccie')


        let frecciaSinistra = document.createElement('p');
        let testoFrecciaSinistra = document.createTextNode('<');
        frecciaSinistra.addEventListener('click', (evt) => {
            spostaSu(listaElementi[i][0], item);
        })

        let frecciaDestra = document.createElement('p');
        let testoFrecciaDestra = document.createTextNode('>');
        frecciaDestra.addEventListener('click', (evt) => {
            spostaGiu(listaElementi[i][0], item);
        })

        frecciaSinistra.appendChild(testoFrecciaSinistra);
        frecciaDestra.appendChild(testoFrecciaDestra);
        divFrecce.appendChild(frecciaSinistra);
        divFrecce.appendChild(frecciaDestra);



        item.appendChild(img)
        item.appendChild(didivTesto);
        item.appendChild(divFrecce);
        container.appendChild(item);

    }


function rimuoviImmagine(id, item){
    var xhr = new XMLHttpRequest();
    xhr.open('get', 'php/eliminaImmagine.php?idItem='+id, true);
    xhr.send();
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status==200){
            var resp = xhr.responseText;
            container.removeChild(item);
        }
    } 
    window.localStorage.setItem('immagini', JSON.stringify(listaElementi));
}

function spostaSu(id, item){
    for(let i=0; i<listaElementi.length; i++){
        if(listaElementi[i][0]==id){
            if(i ==0)
                i=listaElementi.length;
            var xhr = new XMLHttpRequest();
            xhr.open('get', 'php/updateImmagini.php?primo='+id+"&secondo="+listaElementi[i-1][0], true);
            xhr.send();
            xhr.onreadystatechange = function(){
                if(xhr.readyState==4 && xhr.status==200){
                    window.localStorage.clear();
                    window.localStorage.setItem('listaImmagini', richiestaImmagini());
                    location.reload();
                }
            }
        }
    }
}

function spostaGiu(id, item){
    for(let i=0; i<listaElementi.length; i++){
        if(listaElementi[i][0]==id){
            var xhr = new XMLHttpRequest();
            xhr.open('get', 'php/updateImmagini.php?primo='+id+"&secondo="+listaElementi[(i+1)%listaElementi.length][0], true);
            xhr.send();
            xhr.onreadystatechange = function(){
                if(xhr.readyState==4 && xhr.status==200){
                    window.localStorage.clear();
                    window.localStorage.setItem('listaImmagini', richiestaImmagini());
                    location.reload();
                }
            }
        }
    }
}

// var submit = document.querySelector('#submit');
// submit.addEventListener('click', ()=>{
//     window.localStorage.clear();
//     window.localStorage.setItem('listaImmagini', richiestaImmagini());
//     location.reload();
// })



