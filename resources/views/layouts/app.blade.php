<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Volgh – Laravel Bootstrap 5 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat Laravel Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin template, admin dashboard, admin panel template, laravel template, bootstrap dashboard, admin dashboard bootstrap, bootstrap admin template, laravel admin panel, laravel dashboard, admin dashboard laravel, template dashboard, dashboard, theme ui, admin dashboard template, bootstrap 5 admin template, laravel bootstrap">
        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<!-- TITLE -->
		<title>curdApp</title>

        <!-- BOOTSTRAP CSS -->
	    <link id="style" href="{{asset('build/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
       
        <!-- APP CSS & APP SCSS -->
        @vite(['resources/css/app.css' , 'resources/sass/app.scss']) 

        @yield('styles')
        
	</head> 
    <body class="app ltr sidebar-mini light-mode">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('build/assets/images/svgs/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- GLOBAL-LOADER -->
        @stack('scripts')
        
		<!-- PAGE -->
		<div class="page">

            <div class="page-main">
        
                <!-- App-Header -->
                @include('layouts.partials.header')
                <!-- End App-Header -->

                <!--App-Sidebar-->
                @include('layouts.partials.sidebar')
                <!-- End App-Sidebar-->

                <!--app-content open-->
				<div class="app-content main-content">
					<div class="side-app">
						<div class="main-container">
                        
                            @yield('content')

                        </div>
                    </div>
                    <!-- Container closed -->
                </div>            
                <!-- main-content closed -->

            </div>

            <!-- Footer opened -->
			@include('layouts.partials.footer')
            <!-- End Footer -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->
        @include('layouts.partials.scripts')
        
        <!-- APP JS-->
		@vite('resources/js/app.js')
        <!-- END SCRIPTS -->


</body>
