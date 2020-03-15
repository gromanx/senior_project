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

  

  // Show the information for a store when its marker is clicked.
  
    infoWindow.setContent(content);
    infoWindow.setPosition(position);
    infoWindow.open(map);
  });


function createDummyDiv(w, h){
    var out = $(document.createElement('div')).addClass('dummy-div').css('width', w).css('height', h);
    return out[0];
}