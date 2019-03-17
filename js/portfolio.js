document.querySelector("#featured-project-section").classList.add("portfolio-project-section-current");
document.querySelector("#featured-projects-button").classList.add("portfolio-button-current");

var portfolioButtons = document.querySelectorAll(".portfolio-button");

for(i = 0; i < portfolioButtons.length; i++){
    var button = portfolioButtons[i];

    button.addEventListener("click", function(){
        var button = this;
        var currentButtons = document.querySelectorAll(".portfolio-button-current");
        for(j = 0; j < currentButtons.length; j++){
            var btn = currentButtons[j];
            btn.classList.remove("portfolio-button-current");
        }
        button.classList.add("portfolio-button-current");
        var oldSection = document.querySelector(".portfolio-project-section-current");
        oldSection.classList.remove("portfolio-project-section-current");
        var newSection = document.querySelector("#" + button.dataset.section);
        newSection.classList.add("portfolio-project-section-current");
    });
}

var githubButton = document.querySelector("#github-button");
githubButton.addEventListener("click", function(){
    window.open('https://github.com/giodevcoding', '_blank');
});

var buttons = document.querySelectorAll(".portfolio-details-button");

for(i = 0; i < buttons.length; i++){
    var button = buttons[i];
    var div = button.parentElement.previousElementSibling;
    div.style.display = "none";
    button.addEventListener("click", function(e){
        var btn = e.target;
        var details = btn.parentElement.previousElementSibling;
        if(details.style.display == "none"){
            details.style.display = "block";
            btn.textContent = "Hide details...";
        }else{
            details.style.display = "none";
            btn.textContent = "Show details...";
        }
        //details.parentElement.scrollIntoView();
    })
}
