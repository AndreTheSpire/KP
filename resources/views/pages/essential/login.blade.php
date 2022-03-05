@extends('layout.Layout_Login')
@section('title')
    Page Login
@endsection

@section('header')


@endsection

@section('main')

<div class="flex justify-center h-screen items-center text-center">
    <form action="/dologin" method="get" class='flex max-w-sm w-full justify-center bg-white shadow-md rounded-lg overflow-hidden mx-auto flex flex-col p-5' >
        @csrf
        <img src="{{ ('image/cettatf.png') }}" alt="" class="h-2/4">
        <div class="relative h-10 input-component mb-5">
            <input
            id="email"
            type="email"
            name="email"
            placeholder="Email"
            class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
            />
            <label for="address" class="absolute left-2 transition-all bg-white px-1">
            Email
            </label>
        </div>
        <div class="relative h-10 input-component mb-5">
            <input
            id="password"
            type="password"
            name="password"
            placeholder="*******"
            class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm py-1"
            />
            <label for="address" class="absolute left-2 transition-all bg-white px-1">
            Password
            </label>
        </div>
        <button type="submit" name="login" class="bg-secondary-red text-black hover:bg-secondary-red-hover py-4 text-center px-17 md:px-12 md:py-4 rounded leading-tight text-xl md:text-base font-sans mt-4">Login</button>

        @if(isset($gagalcek))
        {{-- <div class="text-2xl">Login Gagal</div> --}}
        @php
             echo '<script type="text/javascript">
            alert("Akun masih Terlock");
            </script>';
        @endphp
        @endif

        @if(isset($gagal))
        {{-- <div class="text-2xl">Login Gagal</div> --}}
        @php
             echo '<script type="text/javascript">
            alert("gagal login");
            </script>';
        @endphp
        @endif
        @if(isset($register))
        {{-- <div class="text-2xl">Login Gagal</div> --}}

        @if ($register==true)
        @php
        echo '<script type="text/javascript">
       alert("berhasil register");
       </script>';
         @endphp
        @else

        @endif
    @endif

        <a href="/register" class="text-base text-black text-right font-roboto leading-normal underline mb-3">belum punya akun?</a>
        </form>
</div>

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
    const allInputs = document.querySelectorAll('input');
    for(const input of allInputs) {
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

