@php
    $sub_category = DB::table('sub_category')->orderBy('id','desc')->limit(6)->get();
    $site_setting = DB::table('site_setting')->first();
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('footer')

<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_1">Quick Links</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="{{url('/About')}}">About us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="{{url('/Contact')}}">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-target="#collapse_2">Categories</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        @foreach ($sub_category  as $row)
                        <li><a href="{{url('products/'.$row->id. '/' .$row->sub_category_name)}}">{{ $row->sub_category_name}}</a></li>
                        @endforeach


                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_3">Contacts</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>{!! $site_setting->address!!}</li>
                        <li><i class="ti-headphone-alt"></i>{!! $site_setting->contact_number!!}</li>
                        <li><i class="ti-email"></i><a href="#0">{!! $site_setting->email!!}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_4">Keep in touch</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('public/frontEnd/img/whatsapp.svg')}}" alt="" class="lazy"></a></li>
                            <li><a href="{{$site_setting->facebook}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('public/frontEnd/img/facebook_icon.svg')}}" alt="" class="lazy"></a></li>
                            <li><a href="{{$site_setting->instagram}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('public/frontEnd/img/instagram_icon.svg')}}" alt="" class="lazy"></a></li>
                            <li><a href="{{$site_setting->youtube}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('public/frontEnd/img/youtube_icon.svg')}}" alt="" class="lazy"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    {{-- <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="English" selected>English</option>
                                <option value="French">French</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Russian">Russian</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="US Dollars" selected>US Dollars</option>
                                <option value="Euro">Euro</option>
                            </select>
                        </div>
                    </li> --}}
                    <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('public/frontEnd/img/download (1).png')}}" alt="" width="198" height="30" class="lazy"></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="additional_links">
                    <li><a href="#0">Terms and conditions</a></li>
                    <li><a href="#0">Privacy</a></li>
                    <li><span>© 2021 bdbookshop | Developed By <a href="https://souravkairy.me">Sourav Kairy</a></span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
</div>
<!-- page -->

<!--<div id="toTop"></div><!-- Back to top button -->-->

<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "104540064399844");
      chatbox.setAttribute("attribution", "page_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v10.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>





{{-- <div class="popup_wrapper">
    <div class="popup_content">
        <span class="popup_close">Close</span>
        <a href="listing-grid-1-full.html"><img class="img-fluid" src="{{asset('public/frontEnd/img/banner_popup.png')}}" alt="" width="500" height="500"></a>
    </div>
</div> --}}


<!-- COMMON SCRIPTS -->
<script src="{{asset('public/frontEnd/js/common_scripts.min.js')}}"></script>
<script src="{{asset('public/frontEnd/js/main.js')}}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('public/frontEnd/js/carousel-home.min.js')}}"></script>
<script src="{{asset('public/frontEnd/js/sticky_sidebar.min.js')}}"></script>
<script src="{{asset('public/frontEnd/js/specific_listing.js')}}"></script>
<script  src="{{asset('public/frontEnd/js/carousel_with_thumbs.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" integrity="sha512-P2Z/b+j031xZuS/nr8Re8dMwx6pNIexgJ7YqcFWKIqCdbjynk4kuX/GrqpQWEcI94PRCyfbUQrjRcWMi7btb0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script type="text/javascript">
    $(document).ready(function() {
          $('.addtocart').on('click', function(){
            var id = $(this).data('id');
            if(id) {
               $.ajax({
                   url: "{{  url('/addcart/') }}/"+id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {

                     const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }

                   },

               });
           } else {
               alert('danger');
           }
            e.preventDefault();
       });
   });

</script> --}}
{{-- <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
 <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
        --}}
     {{-- </script> --}}
         <script>
            // Other address Panel
            $('#other_addr input').on("change", function (){
                if(this.checked)
                    $('#other_addr_c').fadeIn('fast');
                else
                    $('#other_addr_c').fadeOut('fast');
            });
        </script>
        <script type="text/javascript">
            var path = "{{route('searchdata')}}";
            $('input.typesearch').typeahead({
                source:function(terms,process)
                {
                    return $.get(path.{terms:terms},function(data){
                        return process(data);
                    })
                }
            })
        </script>

        <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>


    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "104540064399844");
      chatbox.setAttribute("attribution", "page_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v10.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

</body>
</html>
@endsection


