 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
 <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
 <link rel="icon" href="{{ asset('images/Popcorn.png') }}" type="image/x-icon">
 <!-- Boxicons link-->
 <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 <!-- Css/js/-->
 @section("Title", "Regisztráció")
 <title>@yield('Title')</title>
</head>
<body>
 <div class="container-fluid">
    <div class="menu-btn">
        <i class='bx bxs-grid'></i>
    </div>
        <!-- The sidebar -->
        <div class="side-bar">
        <header>
        <!-- Bezáro gomb -->
        <div class="close-btn">
            <i class='bx bx-window-close'></i>
        </div>
            <img  src="{{ asset('images/Popcorn.png') }}" alt="profilkep" title="profilkep">
   
            <h1>Catnip Cineplex</h1>
        </header>
                    <div class="menu">
                   @guest
                   {{-- Ha a felhasználó NINCS bejelentkezve --}}
                   <div class="item ">
                       <a href="/">
                           <i class='bx bx-home' ></i>
                           <span class="link_name">Kezdőlap</span>
                       </a>
                   </div>
                  
                   
                       <div class="item ">
                           <a href="/login">
                               <i class='bx bx-log-in' ></i>
                               <span class="link_name">Bejelentkezés</span>
                           </a>
                       </div>
                       <div class="item">
                           <a href="/register">
                               <i class='bx bx-registered' ></i>
                           <span class="link_name">Regisztráció</span>
                           </a>
                       </div>
                   @else
                   <div class="item ">
                    <a href="/">
                        <i class='bx bx-home' ></i>
                        <span class="link_name">Kezdőlap</span>
                    </a>
                </div>
               
                <div class="item">
                    <a class="sub-btn" href="#">
                    <i class='bx bxs-book' ></i>
                    <span class="link_name">Filmek</span>
                    <!-- leugro menu -->
                    <i class='bx bxs-chevron-down arrow'></i>

                    </a>
                        <div class="sub-menu">
                            <a href="/movies">
                                <i class='bx bx-book-reader'></i>
                                Filmek
                            </a>
                            <a href="/movies/create">
                                <i class='bx bx-book-reader'></i>
                                Film Hozzáadás
                            </a>
                            
                            <a href="">
                                <i class='bx bx-book-reader'></i>
                                Film Törlése
                            </a>
                        </div>
                    </div>
                           {{-- Ha a felhasználó BE van jelentkezve --}}
                       
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                   <div class="item"><a href="">Profil</a></div>
                   <div class="item"><a href="/logout">Kijelentkezés</a></div>
                   @endguest
   
               </div>
   
               </div>
 </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<script>
$(document).ready(function()
{
 //jquery a kinyiláshoz
 $('.menu-btn').click(function(){
     $('.side-bar').addClass('active');
     $('.menu-btn').css("visibility", "hidden");
 });
 //bezárás
 $('.close-btn').click(function(){
     $('.side-bar').removeClass('active');
     $('.menu-btn').css("visibility", "visible");
 });
 //Leugrohoz
 $('.sub-btn').click(function(){
     $(this).next('.sub-menu').slideToggle();
     $(this).find('.dropdown').toggleClass('rotate');
 });
})
</script>

 <main class="container">
     <div class="container ml-4">