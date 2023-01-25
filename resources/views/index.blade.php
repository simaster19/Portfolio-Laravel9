 @extends('layouts.main')


 @section('container')
     <!-- ======= Works Section Start ======= -->
     <section class="section site-portfolio" id="home">
         <div class="container">
             <div class="row mb-5 align-items-center">
                 <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
                     <h2>Hey, I'm {{ $user }}</h2>
                     <p class="mb-0">I'm Web Programming</p>
                 </div>
                 <div class="col-md-12 col-lg-6 text-start text-lg-end" data-aos="fade-up" data-aos-delay="100">
                     <div id="filters" class="filters">
                         <a href="#" data-filter="*" class="active">All</a>
                         <a href="#" data-filter=".web">Web</a>
                         <a href="#" data-filter=".android">Android</a>
                         <a href="#" data-filter=".desktop">Desktop</a>
                     </div>
                 </div>
             </div>
             <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
                 @foreach ($dataProject as $data)
                     {{-- @dd($data) --}}
                     <div class="item {{ strtolower($data->jenis_project) }} col-sm-6 col-md-4 col-lg-4 mb-4">
                         <a href="/work/{{ $data->id }}" class="item-wrap fancybox">
                             <div class="work-info">
                                 <h3>{{ $data->nama_project }}</h3>
                                 <span>{{ $data->jenis_project }}</span>
                             </div>
                             <img class="img-fluid" src="{{ asset('project-images/' . $data->images->first()->gambar) }}" />
                         </a>
                     </div>
                 @endforeach


             </div>
         </div>
     </section>
     <!-- Works Section End -->

     <!-- About me Start -->
     <section class="section about" id="about">
         <div class="container">
             <div class="row justify-content-center text-center">
                 <h3 class="h3 heading">About Me</h3>
                 <img src="{{ asset('img/profile.jpg') }}" alt="Miftakhul" class="about" />
                 <p class="p-3">
                     My name is Miftakhul Kirom, 27 years old. I have very good health.
                     My nature is disciplined, friendly, sociable and hardworking. I am
                     able to work alone or in a team and able to work under pressure. I
                     believe I can contribute well in all types of work.
                 </p>
                 <div>
                     <button class="btn btn-dark text-light">Download CV</button>
                 </div>
             </div>
         </div>
     </section>
     <!-- About me End -->

     <!-- ======= Skill Section Start ======= -->
     <section class="section services skills" id="skills">
         <div class="container">
             <div class="row justify-content-center text-center mb-4">
                 <div class="col-5">
                     <h3 class="h3 heading">My Skills</h3>
                 </div>
             </div>

             <div class="row justify-content-center">
                 <div class="col-md-4">
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 99%" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
                             PHP 99%
                         </div>
                     </div>
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                             Javascript 80%
                         </div>
                     </div>
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                             HTML/CSS 85%
                         </div>
                     </div>
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                             Bootstrap 80%
                         </div>
                     </div>
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                             Tailwind CSS 70%
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                             React Js 50%
                         </div>
                     </div>
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                             Node Js 50%
                         </div>
                     </div>
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                             Laravel 75%
                         </div>
                     </div>
                     <div class="progress">
                         <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label"
                             style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                             Github 80%
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- Skill Section End -->

     <!-- Contact Start -->
     <section class="section contact" id="contact">
         <div class="container">
             <form action="/send" method="post">
                 @csrf
                 <div class="row justify-content-center text-center">
                     <h3 class="h3 heading">Contact Me</h3>

                     <p class="p-2">You can also contact me via this Form</p>

                     @if (session()->has('success'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">

                             {{ session('success') }}
                             <button type="button" class="btn-close" data-bs-dismiss="alert"
                                 aria-label="Close"></button>

                         </div>
                     @endif
                     <div class="col-md-5">
                         <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" name="name" class="form-control" id="name" required />
                         </div>
                         <div class="form-group">
                             <label for="name">Email</label>
                             <input type="email" class="form-control" name="email" id="email" required />
                         </div>
                         <div class="form-group">
                             <label for="name">Message</label>
                             <textarea class="form-control" name="message" cols="30" rows="10" required></textarea>
                         </div>

                         <div class="d-inline-block mt-3 form-group">
                             <button class="btn btn-dark" type="submit" name="tbSend">Send</button>
                         </div>
                     </div>


                 </div>
             </form>
         </div>
     </section>
     <!-- Contact End -->
 @endsection
