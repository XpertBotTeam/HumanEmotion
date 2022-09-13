@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">#{{$incident->id}}</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        <div class="row mb-3">
                            <label for="incidentType" class="col-md-2 col-form-label text-md-end">{{ __('incident type') }}</label>
                            <div class="col-md-6">
                                <select name="type" disabled class="form-control" id="">
                                        <option aria-readonly>{{$incident->incidentType->type}}</option>
                                            
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="incidentType" class="col-md-2 col-form-label text-md-end">{{ __('priority') }}</label>
                            <div class="col-md-6">
                                    <input type="radio" value="1" class="btn-check" name="options" id="option1">
                                    <label class="btn btn-danger" for="option1">High</label>
                                    
                                    <input type="radio" value="2" class="btn-check" name="options" id="option2">
                                    <label class="btn btn-warning" for="option2">Medium</label>

                                    <input type="radio"  value="3" class="btn-check" name="options" id="option3">
                                    <label style=" color: black;background-color: yellow;border-color: yellow" class="btn btn-secondary" for="option3">Low</label>

                                 
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                                <label class="col-md-2 col-form-label text-md-end" for="details">details</label>
                                <div class="col-md-6">
                                    <textarea class="col-md-4 form-control" id="details"  readonly name='details' rows="5"></textarea>
                                </div>
                        </div>
                        
                        <div>
                            <input type="hidden" name="lat" id="lat" />
                        </div>

                        <div>
                            <input type="hidden" name="lng" id="lng" />
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label text-md-end" for="map">Location</label>
                            <div class="col-md-6">
                                <div id="map" style="width: 600px; height:300px "></div>
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
    const details = "{{$incident->details}}";
    const priority = {{$incident->priority}};
    const lat = {{$incident->lat}};
    const lng = {{$incident->lng}};

    const myLatLng = { lat: lat, lng: lng };

    console.log(priority);

    document.getElementById("details").value = details;

    const radioButtons = document.querySelectorAll('input[name="options"]');

    for (const radioButton of radioButtons) {
        if (radioButton.value != priority ) {
            radioButton.disabled=true;
        }
    }


    let map;

    function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 33.888630, lng: 35.495480 },
        zoom: 8,
    });
    
    new google.maps.Marker({
    position: myLatLng,
    map,
  });
}

window.initMap = initMap;
</script>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-B3XSCEwfae0pYoGnvWE4I97aGfUi5Jc&region=LB&callback=initMap">
</script>

@stop

