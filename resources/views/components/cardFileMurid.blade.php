<div class="w-48 bg-gray-300 flex flex-col gap-2 bg-opacity-50 m-2 p-2 rounded-md shadow-md">
    <div>
        <p>{{$nama}}</p>
    </div>
    <div class="flex flex-col">
        @if ($url==null)
            <p class="text-red-700">missing</p>
            <button class="mt-2 place-self-center hover:underline hover:text-blue text-black font-bold py-2 px-4 rounded dark:bg-indigo-100 bg-indigo-200 hover:bg-indigo-300 dark:hover:bg-indigo-300">
                Missing
            </button>
        @else
            <p class="text-green-700">Turned In</p>

            <a href="{{ url("download/$dataKelas->kelas_id/$url") }}">
                <button class="mt-2 place-self-center hover:underline hover:text-blue text-black font-bold py-2 px-4 rounded dark:bg-indigo-100 bg-indigo-200 hover:bg-indigo-300 dark:hover:bg-indigo-300">
                    Download
                </button>
            </a>

        @endif

    </div>
</div>
