   @if ($errors->any())
       {{-- admin lte wajib tambahin default pada alert untuk warna subtle --}}
       <div class="alert alert-{{ $type }} d-flex flex-column">
           @foreach ($errors->all() as $error)
               <small class="text-danger my-2">{{ $error }}</small>
           @endforeach
       </div>
   @endif
