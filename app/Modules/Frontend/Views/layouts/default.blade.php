<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="{!!asset('public')!!}/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" href="{!!asset('public/assets/frontend')!!}/css/bootstrap.css">
	<link rel="stylesheet" href="{!!asset('public/assets/frontend')!!}/css/animate.css">
	<link rel="stylesheet" href="{!!asset('public/assets/frontend')!!}/js/tooltip/css/tooltipster.bundle.css">
	@yield('css')

	<title>@yield('title','BS Group - Bespoke Event Agency in Vietnam')</title>

</head>
<body class="{!!Request::segment(1) !== '' ? 'page-level-2' : ''!!}">
	@include('Frontend::layouts.header')
	 @yield('content')
  @include('Frontend::layouts.footer')

  <script src="{!!asset('public/assets/frontend')!!}/js/jquery-1.11.2.min.js"></script>
  <script src="{!!asset('public/assets/frontend')!!}/js/jquery.waypoints.min.js"></script>
	<script src="{!!asset('public/assets/frontend')!!}/js/jquery.validate.min.js"></script>
  <script src="{!!asset('public/assets/frontend')!!}/js/script.js"></script>


	<!-- MENU -->
  <script src="{!!asset('public/assets/frontend')!!}/js/menu/modernizr.custom.js"></script>
  <!-- SWIPER -->
  <link rel="stylesheet" href="{!!asset('public/assets/frontend')!!}/js/swiper/css/swiper.min.css">
  <script src="{!!asset('public/assets/frontend')!!}/js/swiper/js/swiper.min.js"></script>
  <!-- END -->

	<script src="{!!asset('public/assets/frontend')!!}/js/menu/classie.js"></script>
	<script src="{!!asset('public/assets/frontend')!!}/js/menu/demo1.js"></script>

	<!-- VERTICAL NAVIGATION -->

	<script src="{!!asset('public/assets/frontend')!!}/js/tooltip/tooltipster.bundle.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(window).bind('scroll',function(e){
				dotnavigation();
			});

			function dotnavigation(){
				var numSections = $('section.section').length;
						// console.log(numSections);
		        $('.dotstyle li').removeClass('current');
		        $('.section').each(function(i,item){
		          var ele = $(item), nextTop;

		          // console.log(ele.next().html());
		          // console.log(ele.next().offset());

		          if (typeof ele.next().offset() != "undefined") {
		            nextTop = ele.next().offset().top;
		          }
		          else {
		            nextTop = $(document).height();
		          }

		          if (ele.offset() !== null) {
		            thisTop = ele.offset().top - ((nextTop - ele.offset().top) / numSections);
		          }
		          else {
		            thisTop = 0;
		          }

		          var docTop = $(document).scrollTop();

		          if(docTop >= thisTop && (docTop < nextTop)){
		            $('.dotstyle li').eq(i).addClass('current');
		          }
		        });
			}
			/* get clicks working */
			$('.dotstyle li').click(function(){
					$('.dotstyle li a').removeClass('current').parent('li').removeClass('current');
					var id = $(this).find('a').attr("href"),
						posi,
						ele,
						padding = 0;

					ele = $(id);
					posi = ($(ele).offset()||0).top - padding;
					// $('.dotstyle li a').removeClass('current').parent('li').removeClass('current');
					$('html, body').animate({scrollTop:posi}, 'slow');
					$(this).addClass('current');


					return false;
			});

			$('.tooltipser').tooltipster({
				side: 'left',
				arrow: false,
			})

		})
	</script>

  @yield('script')

</body>
</html>
