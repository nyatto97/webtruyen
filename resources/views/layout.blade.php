<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Đọc truyện Online, đọc truyện hay, mọi thể loại truyện...</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">

        <style type="text/css">
          h5{
            font-weight: bold;
            line-height: 25px;
          }
          .switch_color{
            background: #181818;
            color: #fff;
          }
          .switch_color_light{
            background: #181818 !important;
            color: #000;
          }
          .noidung_color{
            color: #000;
          }
          .fbcomments_color{
            color: #000;
          }
          
          /* Style for back to top bottom */
          #button {
            display: inline-block;
            background-color: #ffffff;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s, 
              opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
          }
          #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: rgb(236, 17, 17);
          }
          #button:hover {
            cursor: pointer;
            background-color: #333;
          }
          #button:active {
            background-color: #555;
          }
          #button.show {
            opacity: 1;
            visibility: visible;
          }
          @media (min-width: 500px) {
            #button {
              margin: 30px;
            }
          }
          body{
            background-image: url('background.jpg');
          }
          .navbar{
            background-color: rgb(158, 221, 216);
            /* background-image: url('background.jpg'); */
          }
          footer{
            background-color: rgb(182, 177, 177);
          }
          div.container{
            /* background-color: rgb(9, 104, 96); */
          }
          /* End style for back to top bottom */
        </style>
    </head>
    <body>
      <!-- Back to top button -->
      <a id="button"></a>

        {{-- <div class="container"> --}}
            {{-- -------------------MENU------------------ --}}
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container">
                <a class="navbar-brand" href="{{url('/')}}" style="color: rgba(172, 38, 72, 0.842)"><i class="fa fa-book" aria-hidden="true"></i> TruyenHay247</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    {{-- <li class="nav-item active">
                      <a class="nav-link" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
                    </li> --}}
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" style="font-weight: bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Danh mục
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach ($danhmuc as $key => $danh)
                            <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>
                          @endforeach
                        
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="font-weight: bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-tags" aria-hidden="true"></i>
                          Thể loại
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($theloai as $key => $the)
                            <a class="dropdown-item" href="{{url('the-loai/'.$the->slug_theloai)}}"><i class="fa fa-tags" aria-hidden="true"></i>{{$the->tentheloai}}</a>
                            @endforeach
                          
                        </div>
                    </li>
                    
                    {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item">
                        <i>Màu nền</i>
                        <i>
                          <select class="custom-select mr-sm-2" id="switch_color">
                            <option value="xam">Xám</option>
                            <option value="den">Đen</option>
                          </select>
                        </i>
                      </a>
                    </div> --}}
                    <select class="custom-select mr-sm-2" id="switch_color">
                      <option value="xam">Xám</option>
                      <option value="den">Đen</option>
                    </select>
                  </ul>
                  <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search">
                    {{-- <div id="search_ajax">

                    </div> --}}
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                  </form>
                </div>
              </div>
              </nav>
              
        <div class="container">
            {{-- -------------------Slide------------------ --}}
            @yield('slide')
            {{-- -------------------Truyện mới------------------ --}}
            @yield('content')   
        </div>

        <!-- Footer -->
        <footer class="page-footer font-small teal pt-4">

          <!-- Footer Text -->
          <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-6 mt-md-0 mt-3 text-center">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">Truyện Hay 247</h5>
                <p>Đọc truyện Online, đọc truyện chữ, truyện hay.</p>
                
                <p>Website luôn cập nhật những bộ truyện mới với nhiều thể loại đặc sắc.</p>

              </div>
              <!-- Grid column -->

              <hr class="clearfix w-100 d-md-none pb-3">

              <!-- Grid column -->
              <div class="col-md-6 mb-md-0 mb-3 text-center">

                <!-- Content -->
                {{-- <h5 class="text-uppercase font-weight-bold">Footer text 2</h5> --}}
                <p>Kết nối với chúng tôi</p>
                <p>
                  <h2><i class="fab fa-facebook" aria-hidden="true"></i></h2>
                </p>
                <p>Email liên hệ: <a href="#">truyenhay247@gmail.com</a></p>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Footer Text -->

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="{{url('/')}}"> Truyentranh247.com</a>
          </div>
          <!-- Copyright -->

        </footer>
        <!-- Footer -->


        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function(){
            if(localStorage.getItem('switch_color')!==null){
              const data = localStorage.getItem('switch_color');
              const data_obj = JSON.parse(data);
              $(document.body).addClass(data_obj.class_1);
              $('.album').addClass(data_obj.class_2);
              $('.pluginSkinLight').addClass(data_obj.class_2);
              $('.card-body').addClass(data_obj.class_1);
              $('.card').addClass(data_obj.class_1);
              $('ul.mucluctruyen > li > a').css('color','#fff');
              $('.sidebar > a').css('color', '#fff');

              $("select option[value='den']").attr("selected", "selected");
            }
          
            $("#switch_color").change(function(){
              $(document.body).toggleClass('switch_color');
              $('.album').toggleClass('switch_color_light');
              $('.pluginSkinLight').toggleClass('switch_color_light');
              $('.card-body').toggleClass('switch_color');
              $('.card').toggleClass('switch_color');
              $('.noidungchuong').addClass('noidung_color');
              $('ul.mucluctruyen > li >a').css('color', '#fff');
              $('.sidebar > a').css('color', '#fff');

              if ($(this).val() == 'den') {
                var item = {
                  'class_1':'switch_color',
                  'class_2':'switch_color_light'
                }
                localStorage.setItem('switch_color', JSON.stringify(item));

              }else if($(this).val() == 'xam'){
                localStorage.removeItem('switch_color');
                $('ul.mucluctruyen > li >a').css('color', '#000');
                // $('.div.show').css('background-color', '#000');
              }
            });
          });
        </script>

        <script type="text/javascript">
          $('#keywords').keyup(function(){
            var keywords = $(this).val();

              if (keywords != '') {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                  url:"{{url('/timkiem-ajax')}}",
                  method:"POST",
                  data:{keywords:keywords, _token:_token},
                  success:function(data){
                    $('#search_ajax').fadeIn();
                      $('#search_ajax').html(data);
                  }
                });
              } else {
                $('#search_ajax').fadeOut();
              }
          });

          $(document).on('click', '.li_search_ajax', function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
          });
        </script>

        <script type="text/javascript">
                $('.owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                })
        </script>
        <script type="text/javascript">
              $('.select-chapter').on('change',function(){
                var url = $(this).val();
                if(url){
                  window.location = url;
                }

                return false;
              });

              current_chapter();
              function current_chapter(){
                var url = window.location.href;

                $('.select-chapter').find('option[value="'+url+'"]').attr("selected", true);
              }
        </script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="lySnppKn"></script>

        
        <script type="text/javascript">
          var btn = $('#button');

          $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
              btn.addClass('show');
            } else {
              btn.removeClass('show');
            }
          });

          btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
          });
        </script>

        <script type="text/javascript">
          show_wishlist();
          function show_wishlist(){
            if (localStorage.getItem('wishlist_truyen')!=null) {
              var data = JSON.parse(localStorage.getItem('wishlist_truyen'));

              data.reverse();

              for(i=0; i< data.length; i++){
                var title = data[i].title;
                var img = data[i].img;
                var id = data[i].id;
                var url = data[i].url;

                $('#yeuthich').append(`
                  <div class="row mt-3">
                    <div class="col-md-5">
                      <img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`">
                    </div>

                    <div class="col-md-7 sidebar">
                      <a href="`+url+`">
                        <p>`+title+`</p>
                      </a>
                    </div>
                  </div>
                `);
              }
            }
          }

          $('.btn-thich-truyen').click(function(){
            $('.fa.fa-heart').css('color', '#fac');
            const id = $('.wishlist_id').val();
            const title = $('.wishlist_title').val();
            const img = $('.card-img-top').attr('src');
            const url = $('.wishlist_url').val();

            const item = {
              'id': id,
              'title': title,
              'img': img,
              'url': url
            }

            if (localStorage.getItem('wishlist_truyen')==null) {
              localStorage.setItem('wishlist_truyen', '[]');
            }
            var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
            var matches = $.grep(old_data, function(obj){
              return obj.id == id;
            })
            if (matches.length) {
              alert('Truyện đã có trong danh sách yêu thích');
            } else {
              if (old_data.length<=10) {
                old_data.push(item);
              } else {
                alert('Đã đạt tới giới hạn lưu truyện yêu thích.');
              }
              $('#yeuthich').append(`
                <div class="row mt-3">
                  <div class="col-md-5">
                    <img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`">
                  </div>
                  <div class="col-md-7 sidebar">
                    <a href="`+url+`">
                      <p style="color: #666">`+title+`</p>
                    </a>  
                  </div>
                </div>
              `);
            
            localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
            alert('Đã lưu vào danh sách truyện yêu thích.');
            }

            localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
          })
        </script>

    </body>
</html>
