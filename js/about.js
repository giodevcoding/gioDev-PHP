function main(){
    let buttons = document.querySelectorAll(".service-button");
    for(i = 0; i < buttons.length; i++){
        let button = buttons[i];
        button.addEventListener("click", function(){
            let div = button.parentElement.nextElementSibling;
            div.classList.toggle('service-details-open');
            if(div.classList.contains("service-details-open")){
                openDetails(button, div);
            }else{
                closeDetails(button, div);
            }
        });
    }
    //Resize service-details if window is resized
    window.addEventListener('resize', function(){

    });
}

function openDetails(button, div){
    button.textContent = "Close...";
    move(div).set('height', 'auto').end()
    move(div)
    .set('display', 'block')
    .set('opacity', 0)
    .duration('0s')
    .end()
    var height = div.offsetHeight;
    move(div).set('height', '0px').end();
    var marLeft = '-15px';
    if(isMobile()){
        marLeft = '5px';
    }    move(div)
        .set('height', height+'px')
        .set('opacity', 1)
        .set('margin', '10px')
        .set('margin-left', marLeft)
        .set('padding-top', '10px')
        .set('padding-bottom', '10px')
        .duration('0.3s')
    .end();

}

function closeDetails(button, div){
    button.textContent = "More info";
    move(div)
    .set('opacity', 0)
    .set('margin-top', '-5px')
    .set('margin-bottom', 0)
    .set('padding-top', '0px')
    .set('padding-bottom', 0)
    .set('height', 0)
    .duration('0.3s')
    .end(function(){
        div.style.display = 'none';
    });
}

function isMobile(){
    return window.innerWidth <= 767;
}

main();
