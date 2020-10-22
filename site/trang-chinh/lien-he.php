<div class="col-md text-center">
    <article class="aboutus mb-5 mt-3">
            <header>
                <h4 class="text-center font-weight-bold introduce pb-3" style="font-family: 'Playfair Display', serif;font-size: 3rem;letter-spacing: 1px;padding-bottom: 0.5rem;">Get in touch with us !</h4>
            </header>
            <article>
                <div class="col-12 pb-5">
                    <div class="col-12 pb-5 pt-2">
                        <dl class="row">
                            <dt class="col-sm-4 text-center">
                                <i class="fas fa-mobile" style="font-size: 3rem;"></i>
                                <h5 class="pt-3" style="font-size: 1.3rem;">PHONE</h5>
                                <p class="mb-1">Phone: (+84) 989999999</p>
                                <p>Phone: 0344358618</p>
                            </dt>
                            <dt class="col-sm-4 text-center">
                                <i class="fas fa-map-marker-alt" style="font-size: 3rem;"></i>
                                <h5>ADDRESS</h5>
                                <p>Số 23/71, Đường Mỹ Đình , Quận Nam Từ Niêm, Thành Phố Hà Nội</p>
                            </dt>
                            <dt class="col-sm-4 text-center">
                                <i class="fas fa-envelope" style="font-size: 3rem;"></i>
                                <h5>EMAIL</h5>
                                <p>gammtph100005@gmail.com</p>
                            </dt>
                        </dl>

                    </div>
                    <div class="row mr-3 ml-3 ">
                        <div class="col-3 d-sm-block d-none "></div>
                        <div class="col-md-6">
                            <form class="">
                                <div class="form-group w-100 ">
                                    <input type="text" class="form-control" placeholder="Name" id="inputText4">
                                </div>
                                <div class="form-group w-100">
                                    <input type="email" class="form-control" placeholder="Email" id="inputEmail4">
                                </div>
                                <div class="form-group w-100">
                                    <input type="number" class="form-control " id="inputAddress" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <textarea cols="30" rows="10" class="w-100 form-control" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary-outline bg-dark " style="color:white;">Send Message</button>
                            </form>
                        </div>
                        <div class="col-3 d-sm-block d-none"></div>
                    </div>
                </div>
            </article>
            <header class="mt-0 ">
                <h4 style="color: #262626;font-family: 'Playfair Display', serif;font-size: 3rem;letter-spacing: 1px;padding-bottom: 0.5rem">Connect With Us !</h4>
                <h4 style="font-family: 'Playfair Display', serif;font-size: 3rem;letter-spacing: 1px;padding-bottom: 0.5rem">
                    <a href="https://www.facebook.com/Huy.neeeee/">
                        <i class="fab fa-facebook " style="color: #262626;"></i>
                    </a>
                    <a href="https://www.instagram.com/huy_neeee/">
                        <i class="fab fa-instagram " style="color: #262626;"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter" style="color: #262626;"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-pinterest " style="color: #262626;"></i>
                    </a>
                </h4>
            </header>
            <!-- ////google map -->
            <section id="wrapper">
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <article>
                    <p><span id="status">[object GeolocationPositionError] failed.</span></p>
                    </article>
                    <script type="text/javascript">
                    function initialize() {
                        if (navigator.geolocation) { 
                        navigator.geolocation.getCurrentPosition(show_location,
                            error_handler);
                        } else {
                        alert('Geolocation not supported in this browser.');
                        }
                    }
                
                    function show_location(position) {
                        var s = document.querySelector('#status');
                        // s.innerHTML = "found you!";
                        // Get the user's latitude and longitude
                        var latlng = new google.maps.LatLng(
                        position.coords.latitude,
                        position.coords.longitude);
                
                        // Create a container for the map
                        var mapcanvas = document.createElement('div');
                        mapcanvas.id = 'mapcanvas';
                        mapcanvas.style.height = '400px';
                        document.querySelector('article').appendChild(mapcanvas);
                
                        var myOptions = {
                        center: latlng,
                        zoom: 15,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
                        var marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        title: "You are here!"
                        });
                    }
                    function error_handler(msg) {
                        var s = document.querySelector('#status');
                        s.innerHTML = msg + " failed.";
                    }
                    </script>
            </section>

    </article>
</div>
