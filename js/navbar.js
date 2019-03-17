let navbar = document.querySelector('#navblock');
let phone = document.querySelector('#phone');
let mail = document.querySelector('#mail');
let details = document.querySelector('#social-media-details');
let container = document.querySelector('#social-media-container');
let mobileOpenButton = document.querySelector('#mobile-nav-menu-button');
let mobileCloseButton = document.querySelector('#mobile-close-menu-button');


phone.addEventListener('mouseover', function(){
    if(details.style.letterSpacing != '0.2em'){
        move(details)
            .set('letter-spacing', '0.0em')
            .duration('0.0s')
            .end();
        move(details)
            .set('letter-spacing', '0.2em')
            .duration('0.2s')
            .end();
    }
    move(details)
        .set('opacity', 1)
        .duration('0.2s')
        .end();
    details.textContent = '623-227-1446';
});

mail.addEventListener('mouseover', function(){
    if(details.style.letterSpacing != '0.1em'){
        move(details)
            .set('letter-spacing', '0.0em')
            .duration('0.0s')
            .end();
        move(details)
            .set('letter-spacing', '0.1em')
            .duration('0.2s')
            .end();
    }
    move(details)
        .set('opacity', '1')
        .duration('0.2s')
        .end();
    details.textContent = 'giovanni@giodev.org';
});

container.addEventListener('mouseleave', function(){
    move(details)
    .set('opacity', 0)
    .duration('0.2s')
    .end();
});

document.querySelector('#mobile-nav-menu').style.display = 'none';

mobileOpenButton.addEventListener('click', openMobileMenu);

function openMobileMenu(){
    let menu = document.querySelector('#mobile-nav-menu');
    if(menu.style.display == 'none'){
        move(menu)
            .set('display', 'block')
            .end();
        move(menu)
            .set('left', '100vw')
            .end();
        move(menu)
            .set('left', '0vw')
            .set('opacity', '1')
            .duration('0.5s')
            .end();
        }
}

mobileCloseButton.addEventListener('click', closeMobileMenu);

function closeMobileMenu(){
    let menu = document.querySelector('#mobile-nav-menu');
    move(menu)
        .set('left', '-100vw')
        .set('opacity', '0.7')
        .duration('0.5s')
        .then()
            .set('left', '100vw')
            .duration('0s')
            .pop()
        .then()
            .set('display', 'none')
            .pop()
        .end();

}

window.addEventListener('resize', function(){
    if(window.innerWidth > 768){
        let menu = document.querySelector('#mobile-nav-menu');
        move(menu).set('display', 'none').end();
    }
});
