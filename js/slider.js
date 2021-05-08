var immagini;
function richiestaImmagini(){
    var xhr = new XMLHttpRequest();
    xhr.open('post', 'php/sliderImages.php?', true);
    xhr.send();
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status==200){
            var resp = xhr.responseText;
            immagini = JSON.parse(resp);  
            window.localStorage.clear();
            window.localStorage.setItem('listaImmagini', resp);
        }
    } 
}

var banner = document.querySelector('#banner');


var listaImmagini = JSON.parse(window.localStorage.getItem('listaImmagini'));
banner.style.backgroundImage = "url('" + listaImmagini[0][2] + "')"; 

console.log(listaImmagini)

var current = 0;
var next = document.querySelector('#next');
next.addEventListener('click', () => { 
        current= ((current+1) % listaImmagini.length);
        banner.style.backgroundImage = "url('" + listaImmagini[current][2] + "')";   
})

var prev = document.querySelector('#prev');
prev.addEventListener('click', () => {
    current--;
    if(current<0)
        current=listaImmagini.length-1;
    banner.style.backgroundImage = "url('" + listaImmagini[current][2] + "')";
})

