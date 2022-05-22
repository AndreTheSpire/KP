<div class="w-48 bg-gray-300 flex flex-col gap-2 bg-opacity-50 m-2 p-2 rounded-md shadow-md">
    <div>
        <p class="text-center">{{$nama}}</p>
    </div>
    <div class="flex flex-col">
        @if ($url==null)
            <p class="text-red-700 text-center">missing</p>
            <button class="mt-2 place-self-center hover:underline hover:text-blue  bg-red-600 text-white hover:bg-red-400 font-bold py-2 px-4 rounded dark:bg-indigo-100  dark:hover:bg-indigo-300">
                Missing
            </button>
        @else
            <p class="text-green-700 text-center">Turned In</p>

            <a href="{{ url("download/$detailTugas->tugas_id/$url") }}">
                <button class="mt-2 w-full place-self-center hover:underline  bg-red-600 text-white hover:bg-red-400 font-bold py-2 px-4 rounded dark:bg-indigo-100 dark:hover:bg-indigo-300">
                    Download
                </button>
            </a>

        @endif

    </div>
</div>
