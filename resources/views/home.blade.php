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
                                <select name="incidentType" class="form-control" id="">
                                    <option value="">crime</option>
                                    <option value="">accident</option>
                                    <option value="">stealing</option>                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="incidentType" class="col-md-2 col-form-label text-md-end">{{ __('priority') }}</label>
                            <div class="col-md-6">
                                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                                    <label class="btn btn-danger" for="option2">High</label>
                                    
                                    <input type="radio"  class="btn-check" name="options" id="option3" autocomplete="off">
                                    <label style=" color: black;background-color: yellow;border-color: yellow" class="btn btn-secondary" for="option3">Medium</label>

                                    <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                                    <label class="btn btn-warning" for="option4">Low</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                                <label class="col-md-2 col-form-label text-md-end" for="details">details</label>
                                <div class="col-md-6">
                                    <textarea class="col-md-4 form-control" id="details"  rows="5"></textarea>
                                </div>
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

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 33.888630, lng: 35.495480 },
    zoom: 8,
  });

  
new google.maps.Marker({
    position: { lat: 33.888630, lng: 35.495480 },
    map,
    title: "Hello World!",
});
}




// marker.setMap(map);

window.initMap = initMap;
</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvt-jIlfujkdVUX9GuwTxRChtvHzM1bGs&region=LB&callback=initMap">
</script>
@stop


