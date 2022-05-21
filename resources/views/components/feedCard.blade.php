<div class="bg-white rounded-md p-2 lg:p-4 dark:bg-ocean-light dark:bg-opacity-75 my-5">

    <div class=" flex justice-between">
        <div class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center w-full bg-white p-5">

                <div class="w-8 h-8 overflow-hidden rounded-full">
                    <img class="w-full h-full object-cover" src="/upload/{{$feed_creator_photo}}" >
                </div>

                  <div class="ml-2 capitalize flex grid grid-rows-2 ">
                      <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">{{$feed_creator}}</h1>
                      <h1 class="text-sm text-gray-600 m-0 p-0 leading-none">{{$feed_waktu}}</h1>
                  </div>

        </div>
        @if ($feed_creator==Auth::guard('satpam_pengguna')->user()->pengguna_nama)
            <div class="float-right p-5 flex">
                <div onclick="update({{$feed_id}},'{{$keterangan}}','{{$feed_lampiran}}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </div>
                <div class="ml-3" onclick="deletepost({{$feed_id}})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
            </div>
        @else

        @endif


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
              <img class="w-full h-full object-cover"  src="/upload/{{$comment->pengirim->pengguna_photo}}" >
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
                  <img class="w-full h-full object-cover" src="/upload/{{$reply->pengirim->pengguna_photo}}" >
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

