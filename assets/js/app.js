const mapCenter = [-7.5869, 110.9495];
const map = L.map('map').setView(mapCenter, 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap contributors',
}).addTo(map);

const umkmMarkerBounds = [];

window.umkmData.forEach((item) => {
    const marker = L.marker([item.lat, item.lng]).addTo(map);
    marker.bindPopup(
        `<strong>${item.nama}</strong><br>${item.kategori}<br>${item.alamat}<br><em>${item.deskripsi}</em>`
    );
    umkmMarkerBounds.push([item.lat, item.lng]);
});

if (umkmMarkerBounds.length > 0) {
    map.fitBounds(umkmMarkerBounds, { padding: [40, 40] });
}
