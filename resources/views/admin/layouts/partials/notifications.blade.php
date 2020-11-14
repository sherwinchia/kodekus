@if(session('success'))
<div class="custom-alert-wrapper bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
  role="alert">
  <strong class="font-bold">Success!</strong>
  <span class="block sm:inline">{{session('success')}}</span>
  {{-- <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeNotification()">
    <svg class="fill-current h-6 w-6 text-green-500" viewBox="0 0 20 20">
      <path
        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
    </svg>
  </button> --}}
</div>
@endif

@if(session('error'))
<div class="custom-alert-wrapper bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">Error!</strong>
  <span class="block sm:inline">{{session('error')}}</span>
  {{-- <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeNotification()">
    <svg class="fill-current h-6 w-6 text-red-500" viewBox="0 0 20 20">
      <path
        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
    </svg>
  </button> --}}
</div>
@endif