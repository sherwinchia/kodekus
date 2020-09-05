@section('meta-content')
<title>Dashboard | {{ config('app.name') }} </title>
@endsection

<div class="flex flex-col p-4">
  <div class="flex">
    <div class="user flex items-center w-48 h-24 rounded-lg bg-dark-100 mb-4">
      <span class="flex flex-col items-center border-r-2 p-4">
        <i class="fas fa-user text-3xl"></i>
        <span class="text-xl">User</span>
      </span>
      <span class="font-roboto text-3xl font-bold pl-4">
        100
      </span>
    </div>
  </div>
  <div class="flex">
    <div class="flex-1 bg-dark-100 rounded-lg p-4">
      <label class="text-xl">Site Traffic</label>
      <hr>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis consequuntur quibusdam voluptate porro atque
      voluptatum minus ipsum explicabo soluta facilis, quam quas aliquam nesciunt, inventore, doloremque sapiente
      asperiores aspernatur ratione.
    </div>
  </div>
</div>