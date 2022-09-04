@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="row" style="width:800px; margin: auto" >
        <div class="col-md-12" style="background-color:gray; text-align: center; border-style:solid;border-width: 3px; color: white">
            thank you for contacting the Internal Security Forces of Lebanon.
        </div>

        <div class="col-md-12" style="color: white">
            <a href="{{ url()->previous() }}">back</a>
        </div>
        
    </div>
    
</div>
@endsection