console.log("enqueue script successfully");
const ajaxURL = pfa_ajax_obj?.ajax_url;
const nonce = pfa_ajax_obj?.nonce;
var mapStyles = [
  {
    featureType: "all",
    elementType: "labels.text.fill",
    stylers: [
      {
        color: "#ffffff",
      },
      {
        weight: "0.20",
      },
      {
        lightness: "28",
      },
      {
        saturation: "23",
      },
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "all",
    elementType: "labels.text.stroke",
    stylers: [
      {
        color: "#494949",
      },
      {
        lightness: 13,
      },
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "all",
    elementType: "labels.icon",
    stylers: [
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "administrative",
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#000000",
      },
    ],
  },
  {
    featureType: "administrative",
    elementType: "geometry.stroke",
    stylers: [
      {
        color: "#144b53",
      },
      {
        lightness: "-11",
      },
      {
        weight: 1.4,
      },
      {
        visibility: "on",
      },
    ],
  },
  {
    featureType: "landscape",
    elementType: "all",
    stylers: [
      {
        color: "#08304b",
      },
      {
        lightness: "-13",
      },
    ],
  },
  {
    featureType: "poi",
    elementType: "geometry",
    stylers: [
      {
        color: "#000203",
      },
      {
        lightness: "14",
      },
    ],
  },
  {
    featureType: "road.highway",
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#000000",
      },
    ],
  },
  {
    featureType: "road.highway",
    elementType: "geometry.stroke",
    stylers: [
      {
        color: "#010304",
      },
      {
        lightness: 25,
      },
      {
        visibility: "off",
      },
    ],
  },
  {
    featureType: "road.arterial",
    elementType: "geometry.fill",
    stylers: [
      {
        color: "#000000",
      },
    ],
  },
  {
    featureType: "road.arterial",
    elementType: "geometry.stroke",
    stylers: [
      {
        color: "#0b3d51",
      },
      {
        lightness: 16,
      },
    ],
  },
  {
    featureType: "road.local",
    elementType: "geometry",
    stylers: [
      {
        color: "#000000",
      },
    ],
  },
  {
    featureType: "transit",
    elementType: "all",
    stylers: [
      {
        color: "#146474",
      },
    ],
  },
  {
    featureType: "water",
    elementType: "all",
    stylers: [
      {
        color: "#021019",
      },
    ],
  },
];
let map;
(() => {
  map = new google.maps.Map(document.getElementById("pfa_map"), {
    center: { lat: 56.00919663863177, lng: 6.463585237261427 },
    zoom: 2,
    styles: mapStyles,
  });
})();

google.maps.event.addListener(map, "click", function (e) {
  console.log("Latitude: " + e.latLng.lat());
  console.log("Longitude: " + e.latLng.lng());
});

jQuery(document).ready(($) => {
  $(document).on("change", "form#paf_csv_form input", function () {
    var formData = new FormData();
    formData.append('action', 'pfa_read_csv_ajax');
    formData.append('file', $(this)[0].files[0]);
    formData.append('nonce', nonce);
    // Latitude , Longitude
    $.ajax({
      url: ajaxURL,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (res) {
        // console.log(res);
        if(!res.status) return;
        const data = res?.data; 
        setMarkers(data);
      },
      error: function (xhr, status, err) {
        console.log(err);
      },
    });
  });
});

function setMarkers(airports){
  if(!airports) return;
  airports.forEach(port => {
    const lng = parseFloat(port.Longitude);
    const lat = parseFloat(port.Latitude);

    const marker = new google.maps.Marker({
      position: {lat, lng},
      map: map,
      title: port['Airport Name']
  });

  });
}