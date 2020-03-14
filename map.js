// Escapes HTML characters in the infoWindow template, to avoid XSS.
function escapeHTML(strings) {
  let result = strings[0];
  for (let i = 1; i < arguments.length; i++) {
    result += String(arguments[i]).replace(/[&<>'"]/g, (c) => {
      return {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'}[c];
    });
    result += strings[i];
  };
  return result;
}

function initMap() {

  // Create the map.
  const map = new google.maps.Map(document.getElementsByClassName('map')[0], {
    zoom: 7,
    center: {lat: 52.632469, lng: -1.689423},
    styles: mapStyle
  });


  // Define the user's post icons, using "image".
  map.data.setStyle(feature => {
    return {
      icon: {
        url: `img/icon_${feature.getProperty('image')}.png`,
        scaledSize: new google.maps.Size(64, 64)
      }
    };
  });

  const apiKey = 'AIzaSyD-Pzwaca70aQbYSxOm6XScEyFYRaQGFHg';
  
  <input type="button" onclick="location.href='post.html';" value="Go to Google" />
  const infoWindow = new google.maps.InfoWindow();
  infoWindow.setOptions({pixelOffset: new google.maps.Size(0, -30)});

  // Show the information for a store when its marker is clicked.
  map.data.addListener('click', event => {

    const image = $image;
    const description = $description;
    const reaction = $iconReaction;
    const reactText = $reactText;
    const position = event.feature.getGeometry().get();
    const content = escapeHTML`
      <img style="float:left; width:200px; margin-top:30px" src="img/logo_${image}.png">
      <div style="margin-left:220px; margin-bottom:20px;">
        <p>${description}</p>
        <p><b>Grade:</b> ${reaction}<br/><b>commment:</b> ${reactText}</p>
        <p><img src="https://maps.googleapis.com/maps/api/streetview?size=350x120&location=${position.lat()},${position.lng()}&key=${apiKey}"></p>
      </div>
    `;

    infoWindow.setContent(content);
    infoWindow.setPosition(position);
    infoWindow.open(map);
  });

}

function createDummyDiv(w, h){
    var out = $(document.createElement('div')).addClass('dummy-div').css('width', w).css('height', h);
    return out[0];
}