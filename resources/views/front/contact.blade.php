@extends('layout.app')
@section('style')
<style>
    /* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
</style>
    
@endsection
@section('content')
    <!-- Begin Contact Main Page Area -->
    <div class="contact-main-page">
        <div class="container">
            <div id="map"></div>
        @if (session()->has('status'))
            <div id="message-success" class="alert alert-success mt-3" role="alert">
                {{ session()->get('status') }}
            </div>
        @endif
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contactez-nous</h3>
                        <p class="contact-page-message"></p>
                        
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Télèphone</h4>
                            <p>Mobile:  {{ $contacts[0]->phone }}</p>
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                            <p> {{ $contacts[0]->email }}</p>
                           
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Adresse</h4>
                            <p> {{ $contacts[0]->address }}</p>
                        </div>
                    </div>
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Suivez-nous</h3>
                        <p class="contact-page-message"></p>
                        
                        <div class="single-contact-block">
                            <h4> <a href="{{ $contacts[0]->facebook }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i> Facebook </a> </h4>
                        </div>
                        <div class="single-contact-block">
                            <h4> <a href="{{ $contacts[0]->instagram }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i> Instagram </a> </h4>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <div class="contact-form-content">
                        <div class="contact-form">
                            <form id="contact-form" action="{{ url('contacts') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nom et prénom <span class="required">(*)</span></label>
                                    <input
                                    class="form-control @error('name') is-invalid @enderror"
                                     type="text" name="name" id="name"
                                     value="{{ old('name')}}">
                                     @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="required">(*)</span></label>
                                    <input 
                                    class="form-control @error('email') is-invalid @enderror"
                                    type="email" name="email" id="email" 
                                    value="{{ old('email')}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Télèphone <span class="required">(*)</span></label>
                                    <input 
                                    class="form-control @error('subject') is-invalid @enderror"
                                    type="text" name="subject" id="subject"
                                    value="{{ old('subject')}}">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group form-group-2">
                                    <label>Votre Message <span class="required">(*)</span></label>
                                    <textarea
                                    class="form-control @error('message') is-invalid @enderror"
                                     name="message" id="message"></textarea>
                                     @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button style="border-radius: 0px;" type="submit" value="submit" id="submit" class="alsita-contact-form_btn"
                                        name="submit">Envoyer</button>
                                </div>
                            </form>
                        </div>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Main Page Area End Here -->
@endsection


@section('js')
    <!-- Begin Hiraola's Google Map Area -->
    {{-- <script
        src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyB6rya2tbP_gCB1zU71S_Z_Nl_tR7h0dWY">
    </script> --}}

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6rya2tbP_gCB1zU71S_Z_Nl_tR7h0dWY&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    <script>

// Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: 33.5983292, lng: -7.6412708 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 17,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
        

    </script>
    <!-- Hiraola's Google Map Area End Here -->

@endsection
