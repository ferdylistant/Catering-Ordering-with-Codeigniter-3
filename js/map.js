var map = L.map('map')
.setView(
    [-7.733060497042215, 110.38090318718851], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

L.marker([-7.733060497042215, 110.38090318718851]).addTo(map)
.bindPopup('<a href="https://www.google.com/maps/dir//Kampung+Jawa+Resto/@-7.732931,110.3110587,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x2e7a592031c130fb:0x8848c175285c0330!2m2!1d110.3810993!2d-7.7329367" target="_blank" class="size36 txt11 trans-0-4">Kampung Jawa Resto</a>')
.openPopup();
map.addControl(new L.Control.Fullscreen({
    title: {
        'false': 'View Fullscreen',
        'true': 'Exit Fullscreen'
    }
}));