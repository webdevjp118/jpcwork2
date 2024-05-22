// html5geoform.js

function start() {
	$('#run').attr("disabled", "disabled");

	if (!navigator.geolocation) {
		alert('ご利用のブラウザは HTML5 GeoLocation API に対応していません');
		return;
	}

	navigator.geolocation.getCurrentPosition(callback1);
}

function callback1(position) {
	lat = position.coords.latitude
	lng = position.coords.longitude;
	var geocoder = new google.maps.ClientGeocoder();
	var latlng = new google.maps.LatLng(lat, lng);
	geocoder.getLocations(latlng, callback2);
}

function callback2(response) {
	$('#run').attr("disabled", "");
	if (!response) return;
	if (response.Status.code != 200) return;
	var place;
	for(var i=0; i<response.Placemark.length; i++) {
		place = response.Placemark[i];
		if (!place.AddressDetails) continue;
		if (!place.AddressDetails.Country) continue;
		if (!place.AddressDetails.Country.AdministrativeArea) continue;
		break;
	}
	if (!place) {
		alert('緯度経度から住所への変換に失敗しました');
		return;
	}
	var area = place.AddressDetails.Country.AdministrativeArea;
	if (!area) {
		alert('緯度経度から住所への変換に失敗しました: '+place.address);
		return;
	}
	$('#pref').val(area.AdministrativeAreaName);
	if (area.Locality) {
		$('#city').val(area.Locality.LocalityName);
		if (area.Locality.DependentLocality) {
			$('#town').val(area.Locality.DependentLocality.DependentLocalityName);
			$('#number').val(area.Locality.DependentLocality.Thoroughfare.ThoroughfareName);
		}
	}
}

function init() {
	$('#ver').text(navigator.appName + ' ' + navigator.appVersion);
	$('#run').click(start);
}

$(init);
