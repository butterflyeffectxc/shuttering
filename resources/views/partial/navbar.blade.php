 <div class="d-flex justify-content-between gap-3 py-4">
     <img src="{{ asset('assets/Shuttering.svg') }}" alt="" class="logo-small">
     <div class="mx-auto">
         <a href="{{ url('homepage') }}"
             class="btn link-white {{ Request::is('homepage') ? 'btn-primary-sm' : '' }} px-3">Home</a>
         <a href="{{ url('users/booking') }}"
             class="btn link-white {{ Request::is('users/booking') ? 'btn-primary-sm' : '' }} px-3">Booking</a>
     </div>
     <div class="">
         {{-- <a href="" class="btn {{ Request::is('users/booking') ? 'btn-primary-sm' : '' }}"><i class="fa-solid px-1 fa-heart"></i></a> --}}
         <a href="{{ url('users/profile') }}"
             class="btn btn-outline {{ Request::is('users/profile') ? 'btn-primary-sm' : '' }} ms-2"><i
                 class="bi px-1 bi-person"></i></a>
     </div>
 </div>
