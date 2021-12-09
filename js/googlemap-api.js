const city = document.getElementById('city')
const venue = document.getElementById('venue')

function initMap(){

    tokyo = {lat: 35.6803997, lng: 139.7690174}

    map = new google.maps.Map(document.getElementById('map'), {
        center: tokyo,
        zoom: 12,
    });

    marker = new google.maps.Marker({
        position: tokyo,
        map: map
    });
}

function codeAddress(){
    geocoder = new google.maps.Geocoder();

    inputAddress = document.getElementById('venue').value;

    geocoder.geocode({ 'address': inputAddress}, function(results, status){
        if (status == 'OK') {

            address_components_length = results[0].address_components.length;

            for (let i = 0; i < address_components_length; i++) {
                if (results[0].address_components[i].types[0] === 'locality') {
                    city_name = results[0].address_components[i].long_name;
                }
                if (results[0].address_components[i].types[0] === 'country') {
                    if (results[0].address_components[i].long_name === '日本') {
                        map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                        });
                        city.value = city_name;
                    }
                }
            }
        }
    });
}

const $input = document.querySelector('#venue');
$input.addEventListener('input', function () {
    codeAddress();
});