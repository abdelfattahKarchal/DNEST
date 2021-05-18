@extends('layout.app')
@section('content')
    <!-- Begin Contact Main Page Area -->
    <div class="contact-main-page">
        <div class="container">
            <div id="google-map"></div>
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
    <script
        src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE">
    </script>

    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.740610, -73.935242), // New York
                // How you would like to style the map.
                // This is where you would paste any style found on
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ]
            };
            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('google-map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(33.5983292, -7.6412708),
                map: map,
                title: 'Limupa',
                animation: google.maps.Animation.BOUNCE
            });
        }

    </script>
    <!-- Hiraola's Google Map Area End Here -->

@endsection
