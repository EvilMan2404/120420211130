function generateMap(address) {
    let lat;
    let lng;
    $.ajax({
        async: false,
        dataType: "json",
        url: 'https://nominatim.openstreetmap.org/search?q=' + address + '&format=json',
        success: function (data) {
            if (typeof data[0] !== 'undefined') {
                lat = data[0].lat
                lng = data[0].lon
            }
        }
    });
    return {lat: lat, lng: lng}
}

function initMap() {
    $('.itemAddress').each(function () {
        let $address = $(this).data('address'),
            $data = generateMap($address),
            id = $(this).data('id')
        name = $(this).data('name')

        if (typeof $data.lat !== 'undefined' && typeof $data.lng !== 'undefined') {
            let $map = $('#map-' + id);
            $map.before('<hr>')
            $map.css('height', '250px')
            let lat = parseFloat($data.lat)
            let lng = parseFloat($data.lng)
            var mapOptions = {
                zoom: 8,
                center: new google.maps.LatLng(lat, lng),
                mapTypeId: 'roadmap'
            };
            var map = new google.maps.Map(document.getElementById('map-' + id), mapOptions);
            var goldenGatePosition = {lat: lat, lng: lng};
            var marker = new google.maps.Marker({
                position: goldenGatePosition,
                map: map,
                title: name
            });
        } else {
            $('#map-' + id).remove()
        }
    });

}
