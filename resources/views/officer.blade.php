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



//get the incidents table from controller
var incidents = {!! $incidents->toJson() !!};
var allMarkers = [];

console.log(incidents);


function initMap() {
 var map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 33.888630, lng: 35.495480 },
    zoom: 8,
  });

  //add all incidents on the map as markers

    for (const incident of incidents) {
        const text1 = "<h3><b>"
        let contentString = text1.concat(incident.incident_type.type,"</b></h3><div><p><i>",incident.details,"</i></p></div>");
       

        var marker=new google.maps.Marker({
            position: { lat: incident.lat, lng: incident.lng },
            map,
            title: incident.incident_type.type,
            customInfo: contentString
        });

        if(incident.priority==1){
            marker.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png')
        }else if(incident.priority==2){
            marker.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow-dot.png')
        }else{
            marker.setIcon('http://maps.google.com/mapfiles/ms/icons/orange-dot.png')
        }

        allMarkers.push(marker);
        
    }

    for(const mark of allMarkers){

        const infowindow = new google.maps.InfoWindow({
            content: mark.customInfo,
        });
        mark.addListener("click", () => {
            infowindow.open({
                anchor: mark,
                map,
            });
        });
    }
}



window.initMap = initMap;


// google.maps.event.addListener(marker, 'click', function() {
    //     infowindow.setContent(contentString);
    //     infowindow.open(map, marker);
    //     infoWindow.setPosition([incident.lat, incident.lng]);
    // });

</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-B3XSCEwfae0pYoGnvWE4I97aGfUi5Jc&region=LB&callback=initMap">
</script>
@stop


        

