<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    </head>
    @extends('layouts.app')
    
    @include('layouts.header')
<form class="form_body" method="POST" action="{{ route('login') }}">
    <div class="form-group">
        <section id="login__section" class="vh-100 gradient-custom ">
            <div class="container py-5 h-100">
                
              <div class="row d-flex justify-content-center align-items-center h-100">
                
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    
                    <div class="card-body p-5 text-center">
                        <img class="register_img" src="{{ asset('images/icon.png') }}" alt="logo" title="logo">

                      <div class="mb-md-5 mt-md-4 pb-5 login">
                        <br><br>
                        <h3 class="fw-bold mb-2 text-uppercase">Bejelentkezés</h3>
                        <p class="text-white-50 mb-5">Kérlek add meg az Email címed és Jelszavad!</p>
                        <div class="form-outline form-white mb-4">
                          <input type="email" id="email" placeholder="Ide írd az email címed!"  class="form-control form-control-lg" />
                          <br>
                          <label class="form-label" for="typeEmailX">Email</label>
                        </div>
                        <div class="form-outline form-white mb-4">
                          <input type="password" id="password" minlength="8" placeholder="Ide írd a jelszavad!" class="form-control form-control-lg" />
                          <br>
                          <label class="form-label" for="typePasswordX">Jelszo</label>
                        </div>
                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Elfelejtetted jelszavad?</a></p>
                        <button class="btn btn-outline-light btn-lg px-5 hover:success" type="submit">Bejelentkezés</button>
                      </div>
          
                      <div>
                        <p class="mb-0">Nincs még felhasználó fiókod?
                              <a id="reg__szoveg" href="{{route('register')}}" class="text-50 fw-bold">Regisztráció!</a>
                        </p>
                      </div>
          
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
</form>