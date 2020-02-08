@extends('layouts.app')

@section('content')
<div class="shadow" class="border-0">
    <div class="container">
        <div class="row ">
            <div class="col-sm-12 mt-5 mb-4 pb-2 justify-content-center">
                <p class="h4">My {{ config('app.name') }}</p>
                <ul class="nav nav-pills mt-4" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Event Types</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Scheduled Events</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Team Events</a>
                  </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
      @include('layouts.partials.alerts._alerts')

          <div class="tab-content my-5" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="row my-2">
                <div class="col">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text border-0 bg-light">🔎</span>
                    </div>
                    <input type="text" class="form-control col-md-4 border-0 bg-light" placeholder="Filter Event Types">
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="row my-2">
                <div class="col">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text border-0 bg-light">🔎</span>
                    </div>
                    <input type="text" class="form-control col-md-4 border-0 bg-light" placeholder="Filter Scheduled Events">
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <div class="row my-2">
                <div class="col">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text border-0 bg-light">🔎</span>
                    </div>
                    <input type="text" class="form-control col-md-4 border-0 bg-light" placeholder="Filter Team Events">
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
