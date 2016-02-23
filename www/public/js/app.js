"use strict";

var stars = document.getElementsByClassName("star");

var twinkleStar = function(element, light){
    var data = {
        'light':light
    };
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/twinkle');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = JSON.parse(xhr.responseText);
            if(result.success == true){
                element.className += " active";
                setTimeout(function(){
                    element.className = element.className.replace("active", "");
                }, 3000, element);
            }
        }
    }
    xhr.send(JSON.stringify(data));
};

var handleStarClick = function(event){
    event.preventDefault();
    twinkleStar(this, this.getAttribute('data-light'));
    
    ga('send', {
        hitType: 'event',
        eventCategory: 'Star Interactions',
        eventAction: 'click',
        eventValue: this.getAttribute('data-light')
    });
};

for(var i = 0; i < stars.length; i++){
    stars[i].onclick = handleStarClick;
}
