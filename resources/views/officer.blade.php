{{-- 
@extends('layouts.app')
@section('content')
<div class = "container">
    <br><br><br>
    <div class="row">
        <div class="col-md-4" style=" background: white; padding: 10px;margin:auto;  box-shadow: 10px 10px 5px #888">
            <div class="panel-heading">
                <h2>Google Cloud Vision API</h2>
                <p style="font-style: italic">image processing</p>
            </div>
            <hr>
            <form action="/check" method="POST" enctype="multipart/form-data">
                @csrf <!--when you got 419| Page Expired add @ csrf -->
                <input type="file" name="image" accept="image/*">
                <br>
                <button type="submit" class="btn btn-lg btn-outline-success w-100 mt-3" style="border-radius: 0px;" >Analyse Image</button>
            </form>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')
@section('content')

<div class = "container" style="height: 350px;overflow: hidden;">
    <div class="row mb-3">
        <div class="col-md-12">
            <div id="map" style="height:300px "></div>
        </div>
    </div>
</div>
<div class = "container" style="height: 300px; overflow-y: scroll;">
    <br><br><br>
    <div class="row">
        <div class="col-md-12" style=" background: white; padding: 10px;margin:auto;  box-shadow: 10px 10px 5px #888">
            <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Incident Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Details</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $incidents as $incident )
                        <tr>
                            <td>{{$incident->id}}</td>
                            <td> {{$incident->incidentType->type}} </td>
                            <td> {{$incident->created_at}} </td>

                            @if ($incident->priority==1)
                            <td>high</td>
    
                            @elseif ($incident->priority==2)
                                <td>medium</td>
                            @else
                                <td>low</td>
                            @endif
                            <td> {{$incident->details}} </td>
                            
                        </tr>       
                    @endforeach
                 

                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection

@section('script')
<script>




var incidents = {!! $incidents->toJson() !!};

console.log(incidents);


function initMap() {
 var map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 33.888630, lng: 35.495480 },
    zoom: 8,
  });

  //add all incidents on the map as markers

    // for(var i=0; i<incidents.length;i++){
    //     new google.maps.Marker({
    //     position: { lat: incidents[i].lat, lng: incidents[i].lng },
    //     map,
    //     title: "Hello World!",
    //     });
    // }

    for (const incident of incidents) {
        new google.maps.Marker({
        position: { lat: incident.lat, lng: incident.lng },
        map,
        title: "Hello World!",
        });
    }
}

window.initMap = initMap;

</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvt-jIlfujkdVUX9GuwTxRChtvHzM1bGs&region=LB&callback=initMap">
</script>
@stop


