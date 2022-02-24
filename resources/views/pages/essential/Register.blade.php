@extends('layout.Layout_Login')
@section('title')
    Page Register
@endsection

@section('header')


@endsection

@section('main')

<form action="{{ url('/register/doregister') }}" method="get" class="flex justify-center h-screen items-center text-center">
    @csrf
    <div class='flex max-w-sm w-full justify-center bg-white shadow-md rounded-lg overflow-hidden mx-auto flex flex-col p-5'>
        <img src="{{ ('image/cettatf.png') }}" alt="" class="h-2/4">

    <div class="relative h-10 input-component mb-5 empty">
      <input
        id="name"
        type="text"
        name="pengguna_nama"
        class=" w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
        @error('pengguna_nama') style="border: 2px solid red;" @enderror
        value="{{ old('pengguna_nama')}}"
      />
      <label for="name" class="absolute left-2 transition-all bg-white px-1">
        Name
      </label>
        @error("pengguna_nama")
            <div class="text-red-500 text-xs text-left">{{ $message }}</div>
        @enderror
    </div>
    <!-- This is the input component -->
    <div class="relative h-10 input-component mb-6 empty">
      <input
        id="email"
        type="text"
        name="pengguna_email"
        class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
        @error('pengguna_nemail') style="border: 2px solid red;" @enderror value="{{ old('pengguna_email')}}"
      />
      <label for="email" class="absolute left-2 transition-all bg-white px-1">
        E-mail
      </label>
        @error("pengguna_email")
        <div class="text-red-500 text-xs text-left">{{ $message }}</div>
        @enderror
    </div>


      <div class="relative h-10 input-component mb-5 empty">
        <input
          id="password"
          type="password"
          name="pengguna_password"
          class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
          @error('pengguna_password') style="border: 2px solid red;" @enderror value="{{ old('pengguna_password')}}"
        />
        <label for="address" class="absolute left-2 transition-all bg-white px-1">
          Password
        </label>
        @error("pengguna_password")
        <div class="text-red-500 text-xs text-left">{{ $message }}</div>
        @enderror
      </div>
      <div class="relative h-10 input-component mb-1 empty">
        <input
          id="konfirmasi_password"
          type="password"
          name="pengguna_password_confirmation"
          class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
          @error('pengguna_password') style="border: 2px solid red;" @enderror value="{{ old('pengguna_password')}}"
        />
        <label for="address" class="absolute left-2 transition-all bg-white px-1">
          Konfirmasi Password
        </label>

      </div>
      <div class="relative h-10 input-component mt-5">
        <select id="peran" name="pengguna_peran" class="h-full w-full border border-gray-300 px-2 transition-all border-blue rounded-sm py-1">
            <option value="0">Guru</option>
            <option value="1">Murid</option>
        </select>
        <label for="peran" class="absolute text-black left-2 transition-all bg-white px-1">
         Peran
        </label>
      </div>
      @error("pengguna_password")
    <div class="text-red-500 text-xs text-left">{{ $message }}</div>
    @enderror

      {{-- <input type="hidden" name="penggutampilan" value='0'> --}}
      <div class="">
        <input type="submit" value="Submit" class="bg-secondary-red text-black hover:bg-secondary-red-hover py-4 text-center px-17 md:px-12 md:py-4 rounded leading-tight text-xl md:text-base font-sans mt-4 w-full">
       </div >
        <a href="/login" class="text-sm text-black text-left font-roboto leading-normal underline mt-2 ">Kembali Ke Login</a>
    </div>

</form>

<style>
label {
  top: 0%;
  transform: translateY(-50%);
  font-size: 11px;
  color: rgba(37, 99, 235, 1);
}
.empty input:not(:focus) + label {
  top: 50%;
  transform: translateY(-50%);
  font-size: 14px;
}
input:not(:focus) + label {
  color: rgba(70, 70, 70, 1);
}
input {
  border-width: 1px;
}
input:focus {
  outline: none;
  border-color: rgba(37, 99, 235, 1);
}
</style>
<script>
    document.getElementById('email').focus()
    const allInputs = document.querySelectorAll('input','select');
    for(const input of allInputs) {
        const val = input.value
            if(!val) {
                input.parentElement.classList.add('empty')
            } else {
                input.parentElement.classList.remove('empty')
            }
        input.addEventListener('input', () => {
            const val = input.value
            if(!val) {
                input.parentElement.classList.add('empty')
            } else {
                input.parentElement.classList.remove('empty')
            }
        })
    }
</script>

@endsection

@section('footer')

@endsection







</body>
</html>

