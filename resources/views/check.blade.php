@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row" style="background-color: black;width:800px; margin: auto" >
        <div class="col-md-4" style=" border-style:solid;border-width: 3px; border-color: white">
            <img src="/uploads/{{$imageToken}}.jpg" style="width: 200px; height: 200px;">
        </div>
        <div class="col-md-8" style="color: white; border-style:solid; border-width: 3px; text-align: center;padding-top: 70px">
            <h1>{{$feeling}}</h1>
        </div>
    </div>
    
</div>
@endsection


