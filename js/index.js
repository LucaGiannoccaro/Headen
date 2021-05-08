var navLinks = document.querySelectorAll('#navbar .navbar-item .navbar-link')
for(var link of navLinks){
    if(link.href == window.location.href){
        link.classList.add('active');
    }else
        link.classList.add('normal');
}