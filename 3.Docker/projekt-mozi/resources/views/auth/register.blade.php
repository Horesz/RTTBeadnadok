@extends('layouts.app')
@include('layouts.header')
<head>
 @section("Title", "Regisztráció")
    
    </head>

<form class="form_body" method="POST" action="{{ route('register') }}">
    <div class="form-group">
            <div class="mask d-flex align-items-center h-100 gradient-custom">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <img class="register_img" src="{{ asset('images/icon.png') }}" alt="logo" title="logo">
                                    <div class="mb-md-5 mt-md-4">
                                        <h2 class="fw-bold mb-2 text-uppercase">Felhasználó regisztrálása!</h2>
                                        <p class="text-white-50 mb-5">Töltsd ki a hiányzo mezőket!</p>

                                        <div class="form-group row mb-4">
                                            <label for="form3Example1cg" class="col-md-4 col-form-label text-md-end">Felhasználonév: </label>
                                            <div class="col-md-8">
                                                <input type="text" id="form3Example1cg" role="name" class="form-control form-control-lg" name="name" required />
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="form3Example3cg" class="col-md-4 col-form-label text-md-end">Email cím: </label>
                                            <div class="col-md-8">
                                                <input type="email" id="form3Example3cg" role="email" class="form-control form-control-lg" name="email" required />
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="form3Example4cg" class="col-md-4 col-form-label text-md-end">Jelszavad: </label>
                                            <div class="col-md-8">
                                                <input type="password" id="form3Example4cg" role="password" class="form-control form-control-lg" name="password" required />
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="form3Example4cdg" class="col-md-4 col-form-label text-md-end">Jelszavad ismét: </label>
                                            <div class="col-md-8">
                                                <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="password_confirmation" required />
                                            </div>
                                        </div>

                                        
                                        {{-- <div class="mb-3">
                                            <label for="role" class="form-label">Válassz szerepet:</label>
                                            <select class="form-select" id="role" name="adminE" role="adminE">
                                                <option value="user">Átlagos Felhasználó</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                         --}}
                                        <div class="form-check d-flex justify-content-center mb-3">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" required />
                                            <label class="form-check-label" for="form2Example3g">
                                               Elfogadod a felhasználási feltételeket <a href="#!" class="text-body"><u>Szolgáltatási feltételek</u></a>
                                            </label>
                                        </div>

                                        <div class="row justify-content-center  mb-2">
                                            <div class="col-md-8">
                                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Regisztrálás</button>
                                            </div>
                                        </div>

                                        <p class="text-center mt-4 ">Már felhasználói fiókod? <a href="{{ route('login') }}" class="fw-bold text-body"><u>Jelentkezz be itt!</u></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @csrf
    </div>

</form>
