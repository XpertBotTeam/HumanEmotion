@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Incident') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Incident/add">
                        @csrf

                        <div class="row mb-3">
                            <label for="incidentType" class="col-md-2 col-form-label text-md-end">{{ __('incident type') }}</label>
                            <div class="col-md-6">
                                <select name="type" class="form-control" id="">
                                    @foreach ( $types as $type )
                                        <option value="{{$type->id}}">{{$type->type}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="incidentType" class="col-md-2 col-form-label text-md-end">{{ __('priority') }}</label>
                            <div class="col-md-6">
                                    <input type="radio" value="1" class="btn-check" name="options" id="option2" autocomplete="off">
                                    <label class="btn btn-danger" for="option2">High</label>
                                    
                                    <input type="radio"  value="2" class="btn-check" name="options" id="option3" autocomplete="off">
                                    <label style=" color: black;background-color: yellow;border-color: yellow" class="btn btn-secondary" for="option3">Medium</label>

                                    <input type="radio" value="3" class="btn-check" name="options" id="option4" autocomplete="off">
                                    <label class="btn btn-warning" for="option4">Low</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                                <label class="col-md-2 col-form-label text-md-end" for="details">details</label>
                                <div class="col-md-6">
                                    <textarea class="col-md-4 form-control" id="details" name='details' rows="5"></textarea>
                                </div>
                        </div>
                        
                        <div>
                            <input type="hidden" name="lat" id="lat" />
                        </div>

                        <div>
                            <input type="hidden" name="lng" id="lng" />
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label text-md-end" for="details">Location</label>
                            <div class="col-md-6">
                                <div id="map" style="width: 600px; height:300px "></div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6  offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

let map;
var lat = 33.888630;
var lng = 35.495480;

var lat1 = 33.08;
var lng1 = 36.495480;

const incidents = [
    {
        lat: 33.888630,
        lng: 35.495480
    },
    {
        lat: 33.08,
        lng: 36.495480
    },

    {
        lat: 33.6,
        lng: 36.06
    }
]

var latt = {{ $inc->lat}};
var lngg = {{ $inc->lng}};
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 33.888630, lng: 35.495480 },
    zoom: 8,
  });


//     for(var i=0; i<incidents.length;i++){
//         new google.maps.Marker({
//         position: { lat: incidents[i].lat, lng: incidents[i].lng },
//         map,
//         title: "Hello World!",
// });
//     }
    

  
  var marker =  new google.maps.Marker({
    position: { lat: latt, lng: lngg },
    map,
    title: "Hello World!",
});


google.maps.event.addListener(map, 'click', function(event) {

    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
    var position = {lat: event.latLng.lat(),lng: event.latLng.lng()};
    marker.setPosition(position);

});
}





// marker.setMap(map);

window.initMap = initMap;
</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvt-jIlfujkdVUX9GuwTxRChtvHzM1bGs&region=LB&callback=initMap">
</script>
@stop


