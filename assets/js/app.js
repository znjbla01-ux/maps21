const mapCenter = [-7.5869, 110.9495];
const map = L.map('map').setView(mapCenter, 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap contributors',
}).addTo(map);

const umkmMarkerBounds = [];
const umkmData = Array.isArray(window.umkmData) ? window.umkmData : [];

const escapeHtml = (value) =>
    String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');

umkmData.forEach((item) => {
    const nama = escapeHtml(item.nama);
    const kategori = escapeHtml(item.kategori);
    const alamat = escapeHtml(item.alamat);
    const deskripsi = escapeHtml(item.deskripsi);

    const marker = L.marker([item.lat, item.lng]).addTo(map);
    marker.bindPopup(`<strong>${nama}</strong><br>${kategori}<br>${alamat}<br><em>${deskripsi}</em>`);
    umkmMarkerBounds.push([item.lat, item.lng]);
});

if (umkmMarkerBounds.length > 0) {
    map.fitBounds(umkmMarkerBounds, { padding: [40, 40] });
}
