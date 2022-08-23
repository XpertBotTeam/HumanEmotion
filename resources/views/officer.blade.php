
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
@endsection
