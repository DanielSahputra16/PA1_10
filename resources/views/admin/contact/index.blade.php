<h1>Contact Us</h1>
<p>Phone: {{ $contact->phone_number }}</p>
<p>Operational Hours: {{ $contact->operational_hours }}</p>
<!-- Tambahkan elemen HTML lain untuk WhatsApp, Instagram, dan peta -->

<div id="map" style="height: 400px;"></div>
<script>
  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: {{ $contact->latitude }}, lng: {{ $contact->longitude }} },
      zoom: 12,
    });
    const marker = new google.maps.Marker({
      position: { lat: {{ $contact->latitude }}, lng: {{ $contact->longitude }} },
      map: map,
      title: "Ramos Badminton Center",
    });
  }

  window.initMap = initMap;
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
