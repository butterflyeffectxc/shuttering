 <div class="d-flex justify-content-between gap-3 py-4">
     <img src="{{ asset('assets/Shuttering.svg') }}" alt="" class="logo-small">
     <div class="mx-auto">
         <a href="{{ url('homepage') }}"
             class="btn link-white {{ Request::is('homepage') ? 'btn-primary-sm' : '' }} px-3">Home</a>
         <a href="{{ url('users/booking') }}"
             class="btn link-white {{ Request::is('users/booking') ? 'btn-primary-sm' : '' }} px-3">Booking</a>
     </div>
     <div class="">
         <a href="" class="btn btn-primary-sm "><i class="fa-solid icon-small fa-heart"></i></a>
         <a href="" class="btn btn-primary-sm ms-2"><i class="fa-solid icon-small fa-envelope"></i></a>
     </div>
 </div>
