"use strict";

var stars = document.getElementsByClassName("star");
console.log(stars);

var twinkleStar = function(light){
    var data = {
        'light':light
    };
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/twinkle');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = JSON.parse(xhr.responseText);
        }
    }
    xhr.send(JSON.stringify(data));
};

var handleStarClick = function(){
    twinkleStar(this.getAttribute('data-light'));
};

for(var i = 0; i < stars.length; i++){
    stars[i].onclick = handleStarClick;
}



