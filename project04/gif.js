$(document).ready(function () {

var PUBLIC_KEY = 'dc6zaTOxFJmzC';
var BASE_URL = '//api.giphy.com/v1/gifs/';
var ENDPOINT = 'search';
var LIMIT = 1;
var RATING = 'pg';

var $dog = $('#randomDog')
var $queryInput = $('#fname');
var $resultWrapper = $('#results');
var $response = $('#response');
var $loader = $('.loader');
var $inputWrapper = $('#signup');
var $likeButton = $('#like');
var $dislikeButton = $('#dislike');

var currentTimeout;

var query = {
    text: null,
    offset: 0,
    request() {
        return `${BASE_URL}${ENDPOINT}?q=${this.text}&limit=${LIMIT}&rating=${RATING}&offset=${this.offset}&api_key=${PUBLIC_KEY}`;
    },
    fetch(callback) {
        $.getJSON(this.request())
            .done(data => {
                var results = data.data;

                if (results.length) {
                    var url = results[0].images.downsized.url;
                    console.log(results);
                    callback(url);
                } else {
                    callback('');
                }
            })
            .fail(error => {
                console.log(error);
            });
    }
}

function buildImg(src = '//giphy.com/embed/xv3WUrBxWkUPC', classes = 'gif hidden') {
    return `<img src="${src}" class="${classes}" alt="gif" width='100%' height='100%' />`;
}

$likeButton.on('click', e => {
    
    query.text = 'Dogs'
    query.offset = Math.floor(Math.random() * 25);

    if (currentTimeout) {
        clearTimeout(currentTimeout);
        $loader.removeClass('done');
    }

    currentTimeout = setTimeout(() => {
        currentTimeout = null;
        $('.gif').addClass('hidden');

        if (query.text && query.text.length) {
            $inputWrapper.addClass('active').removeClass('empty');

            query.fetch(url => {
                if (url.length) {
                    $resultWrapper.html(buildImg(url));

                    $response.html("Cool! We like dogs too!")
                } else {


                    $response.html('err')
                }

                $loader.addClass('done');
                currentTimeout = setTimeout(() => {
                    $('.hidden').toggleClass('hidden');
                }, 1000);
            });
        } else {
            $inputWrapper.removeClass('active').addClass('empty');
            $button.removeClass('active');
        }
    }, 1000);
});

    $dislikeButton.on('click', e => {

        query.text = 'Cats'
        query.offset = Math.floor(Math.random() * 25);

        if (currentTimeout) {
            clearTimeout(currentTimeout);
            $loader.removeClass('done');
        }

        currentTimeout = setTimeout(() => {
            currentTimeout = null;
            $('.gif').addClass('hidden');

            if (query.text && query.text.length) {
                $inputWrapper.addClass('active').removeClass('empty');

                query.fetch(url => {
                    if (url.length) {
                        $resultWrapper.html(buildImg(url));

                        $response.html("Maybe you prefer cats?")
                    } else {


                        $response.html("err")
                    }

                    $loader.addClass('done');
                    currentTimeout = setTimeout(() => {
                        $('.hidden').toggleClass('hidden');
                    }, 1000);
                });
            } else {
                $inputWrapper.removeClass('active').addClass('empty');
                $button.removeClass('active');
            }
        }, 1000);
    });

    $dog.on('click', e => {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp.status == 200) {
                    var dog = JSON.parse(xmlhttp.responseText);
                    $resultWrapper.html("<img id ='imageWrapper' src='" + dog.message + "' />");
                    console.log(dog.message);

                    $response.html('');
                }
                else if (xmlhttp.status == 401) {
                    document.getElementById("error").innerHTML = 'Sorry! There was an issue retrieving your dogs.';
                }
            }
        };
        xmlhttp.open("GET", "https://dog.ceo/api/breeds/image/random", true);
        xmlhttp.send();

        

    });

});

