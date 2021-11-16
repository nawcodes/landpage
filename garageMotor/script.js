const about = document.querySelector('.about');
const card = about.querySelectorAll('.card');
const our = document.getElementById('our');

for (let index = 0; index < card.length; index++) {
    const element = card[index];
    let num = index + 1;
    
    const product = element.classList.contains('product' + num);

    if(product) {
        element.style.backgroundImage = 'url(' + 'img/' + num + '.jpeg' + ')';
        element.style.backgroundPosition = 'center';
        element.style.backgroundRepeat = 'no-repeat';
        element.style.backgroundSize = 'cover';
        element.style.border = '3px solid white';        
    }
    
    
}

