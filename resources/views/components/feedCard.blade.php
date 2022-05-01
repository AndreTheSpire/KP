<div class="bg-white rounded-md p-2 lg:p-4 dark:bg-ocean-light dark:bg-opacity-75 my-5">

    <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white p-5">
        <div class="w-8 h-8 overflow-hidden rounded-full">
          <img class="w-full h-full object-cover" src="{{ asset('image/user.svg') }}" >
        </div>

        <div class="ml-2 capitalize flex grid grid-rows-2 ">
            <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{$feed_creator}}</h1>
            <h1 class="text-sm text-gray-600 m-0 p-0 leading-none">{{$feed_waktu}}</h1>
        </div>

    </div>

    <div class="text-xs lg:text-base mb-2 p-5">
        {{$keterangan}}
    </div>
    @if ($feed_lampiran=="kosong")

    @else
    <div class="text-xs lg:text-base mb-2 p-5">
        <div class="text-xs lg:text-base bg-gray-100 round p-5">
            @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
            <a href="{{ url("/guru/downloadlampiranfeed/$feed_id") }}">{{$feed_lampiran}}</a>
            @else
            <a href="{{ url("/murid/downloadlampiranfeed/$feed_id") }}">{{$feed_lampiran}}</a>
            @endif


        </div>
    </div>
    @endif
    @foreach ($dataComment->get() as $comment)
    <div class="ml-5">
        <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white pt-3">
            <div class="w-8 h-8 overflow-hidden rounded-full">
              <img class="w-full h-full object-cover" src="{{ asset('image/user.svg') }}" >
            </div>

            <div class="ml-2 capitalize flex grid grid-rows-3 w-7/8 pt-5">
                <div class="flex flex-row justify-between gap-2 w-full">
                    <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{$comment->pengirim->pengguna_nama}}</h1>
                    <h1 class="text-sm text-gray-600 m-0 p-0 leading-none">{{date('d M Y, H:i', strtotime($comment->created_at))}}</h1>

                </div>
                <h1 class="text-sm text-gray-600 m-0 p-0 leading-none mt-2">{{$comment->keterangan}}</h1>
            </div>
        </div>
        <div class="ml-10">
            @foreach ($comment->Reply as $reply)
            <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white pt-3">
                <div class="w-8 h-8 overflow-hidden rounded-full">
                  <img class="w-full h-full object-cover" src="{{ asset('image/user.svg') }}" >
                </div>

                <div class="ml-2 capitalize flex grid grid-rows-3 w-7/8 pt-5">
                    <div class="flex flex-row justify-between gap-2 w-full">
                        <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{$reply->pengirim->pengguna_nama}}</h1>
                        <h1 class="text-sm text-gray-600 m-0 p-0 leading-none">{{date('d M Y, H:i', strtotime($reply->created_at))}}</h1>

                    </div>
                    <h1 class="text-sm text-gray-600 m-0 p-0 leading-none mt-2">{{$reply->keterangan}}</h1>
                </div>
            </div>
            @endforeach
        </div>
        @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
        <form action="{{url('/guru/kelas/reply/'.$comment->comment_id.'/add')}}" class="flex pt-2 ml-10 pr-5" method="POST">
            @csrf
            <input type="text" name="keterangan" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2" placeholder="tuliskan replymu disini">
            <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Reply</button>
        </form>
        @else
        <form action="{{url('/murid/kelas/reply/'.$comment->comment_id.'/add')}}" class="flex pt-2 ml-10 pr-5" method="POST">
            @csrf
            <input type="text" name="keterangan" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2" placeholder="tuliskan replymu disini">
            <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Reply</button>
        </form>
        @endif
    </div>
    @endforeach
    @if (Auth::guard('satpam_pengguna')->user()->pengguna_peran==1)
    <form action="{{url('/guru/kelas/comment/'.$feed_id.'/add')}}" class="flex p-5" method="POST">
        @csrf
        <input type="text" name="comment" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2" placeholder="tuliskan commentmu disini">
        <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Komentar</button>
    </form>
    @else
    <form action="{{url('/murid/kelas/comment/'.$feed_id.'/add')}}" class="flex p-5" method="POST">
        @csrf
        <input type="text" name="comment" id="" class="border border-gray-400 rounded-lg w-auto flex-grow mr-4 p-1 px-2" placeholder="tuliskan commentmu disini">
        <button type="submit" class="py-1 px-4 text-black rounded-lg bg-button-light hover:bg-button-dark dark:bg-button-dark dark:hover:bg-button-light shadow-lg block md:inline-block w-auto">Komentar</button>
    </form>
    @endif

</div>
