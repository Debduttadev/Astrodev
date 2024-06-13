 <!-- Start Footer -->
 <footer class="site-footer">
     <div class="container">
         <div class="row footerlist">
             <div class="col-md-4 pull-left listfooter">
                 @php
                 $servicelistfooter=servicelistfooter();
                 @endphp
                 <h2>Services</h2>
                 @foreach ($servicelistfooter as $key => $service)
                 @php
                 // strip out all whitespace
                 $servicename = preg_replace('/\s*/', '', $service);
                 // convert the string to all lowercase
                 $servicename = strtolower($servicename);
                 @endphp
                 <a href="{{ URL::to('service').'/'.$servicename.'/'.base64_encode($key) }}">{{$service}}</a><br>
                 @endforeach
             </div>

             <div class="col-md-4 pull-left listfooter">
                 <h2>Quick Link</h2>
                 <a href="{{ URL::to('/') }}">Home</a><br>
                 <a href="{{ URL::to('/services') }}">Services</a><br>
                 <a href="{{ URL::to('/appointment') }}">Appointment</a><br>
                 <a href="{{ URL::to('/blogs') }}">Blog</a><br>
                 <a href="{{ URL::to('/chambers') }}">Chamber</a><br>
                 <a href="{{ URL::to('/aboutus') }}">About</a><br>
                 <a href="{{ URL::to('/contactus') }}">Contact us</a><br>
             </div>

             <div class="col-md-4 pull-right">
                 <div class="social-icon pull-right">
                     <ul class="list-inline">
                         @php
                         $socialdata=scociallinks();
                         @endphp
                         @foreach ($socialdata as $social)
                         <li>
                             @if($social['name'] == 'Facebook')
                             <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-facebook social" aria-hidden="true"></i></a>
                             @elseif($social['name'] == 'Youtube')
                             <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-youtube-play social" aria-hidden="true"></i></a>
                             @elseif($social['name'] == 'Instagram')
                             <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-instagram social" aria-hidden="true"></i></a>
                             @elseif($social['name'] == 'Linkedin')
                             <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-linkedin-square social" aria-hidden="true"></i></a>
                             @elseif($social['name'] == 'Twitter')
                             <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="social"><img src="{{ URL::to('admin/img/twitter1.png') }}" class="twitter" style="height: 29px; width: 25px;"></i></a>
                             @endif
                         </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
         <small class="copyright pull-left">Copyrights © 2024 All Rights Reserved By Astroachariyadebdutta.com</small>
         <!-- /social-icon -->
     </div>
     <!-- /container -->
 </footer>
 <!-- End Footer -->