{{-- 
@extends('layouts.app')
@section('content')
<div class = "container">
    <br><br><br>
    <div class="row">
        <div class="col-md-4" style=" background: white; padding: 10px;margin:auto;  box-shadow: 10px 10px 5px #888">
            <h1>Add new incident</h1>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Incident') }}</div>

                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf

                        <div class="row mb-3">
                            <label for="incidentType" class="col-md-2 col-form-label text-md-end">{{ __('incident type') }}</label>
                            <div class="col-md-6">
                                <select name="incidentType" class="form-control" id="">
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                                <label class="col-md-2 col-form-label text-md-end" for="details">details</label>
                                <div class="col-md-6">
                                    <textarea class="col-md-4 form-control" id="details"  rows="5"></textarea>
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

