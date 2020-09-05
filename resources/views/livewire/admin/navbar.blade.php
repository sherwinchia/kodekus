<div>
  <ul>

    <li class="{{ request()->is('admin/dashboard') ? 'navbar-active-list' : 'navbar-list' }}">
      <a class="flex-col justify-between items-center" href="{{ route('admin.dashboard.index') }}">
        <i class="fa fa-home w-8 text-lg"></i>
        <span class="font-roboto text-md">Dashboard</span>
      </a>
    </li>

    <li class="navbar-list pr-0"
      x-data="{contentDrop: {{ (request()->is('admin/articles') || request()->is('admin/categories') || request()->is('admin/tags')) ? 'true' : 'false' }}} ">
      <a class="flex-col justify-between items-center" @click="contentDrop=!contentDrop">
        <div>
          <i class="fa fa-file-alt w-8 text-lg "></i>
          <span class="font-roboto text-md">Content</span>
          <span class="float-right pr-4">
            <i class="fas fa-caret-down fa-rotate-90" x-show="!contentDrop"></i>
            <i class="fas fa-caret-down" x-show="contentDrop"></i>
          </span>
        </div>
      </a>
      <ul class="my-2 transform origin-top-left" x-show="contentDrop"
        x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-75" x-transition:leave-end="opacity-0 scale-0">
        <li class="{{ request()->is('admin/articles') ? 'navbar-active-list' : 'navbar-list' }}">
          <a class="flex-col justify-between items-center " href="{{ route('admin.articles.index') }}">
            <i class="fas fa-newspaper w-8 text-lg "></i>
            <span class="font-roboto text-md ">Articles</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/categories') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.categories.index') }}">

            <i class="fas fa-archive w-8 text-lg  "></i>
            <span class="font-roboto text-md ">Category</span>

          </a>
        </li>
        <li class="{{ request()->is('admin/tags') ? 'navbar-active-list' : 'navbar-list' }}">
          <a class="flex-col justify-between items-center" href="{{ route('admin.tags.index') }}">
            <i class="fas fa-tag w-8 text-lg "></i>
            <span class="font-roboto text-md ">Tag</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="navbar-list pr-0"
      x-data="{authenticationDrop: {{ (request()->is('admin/users') || request()->is('admin/permissions') || request()->is('admin/roles')) ? 'true' : 'false' }}}">
      <a class="flex-col justify-between items-center cursor-pointer" @click="authenticationDrop=!authenticationDrop">
        <div>
          <i class="fas fa-user-lock w-8 text-lg "></i>
          <span class="font-roboto text-md">Authentication</span>
          <span class="float-right pr-4">
            <i class="fas fa-caret-down fa-rotate-90" x-show="!authenticationDrop"></i>
            <i class="fas fa-caret-down" x-show="authenticationDrop"></i>
          </span>
        </div>
      </a>
      <ul class="my-2 transform origin-top-left" x-show="authenticationDrop"
        x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-75" x-transition:leave-end="opacity-0 scale-0">
        <li class=" {{ request()->is('admin/users') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center " href="{{ route('admin.users.index') }}">
            <i class="fas fa-users w-8 text-lg "></i>
            <span class="font-roboto text-md ">User</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/roles') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.roles.index') }}">

            <i class="fas fa-user-tag w-8 text-lg  "></i>
            <span class="font-roboto text-md ">Role</span>

          </a>
        </li>
        <li class="{{ request()->is('admin/permissions') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.permissions.index') }}">
            <i class="fas fa-key w-8 text-lg "></i>
            <span class="font-roboto text-md ">Permission</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="{{ request()->is('admin/advertisements') ? 'navbar-active-list' : 'navbar-list' }}">
      <a class="flex-col justify-between items-center" href="{{ route('admin.advertisements.index') }}">
        <i class="fas fa-ad w-8 text-l"></i>
        <span class="font-roboto text-m">Advertisement</span>
      </a>
    </li>

    <li class="navbar-list pr-0 "
      x-data="{advancedDrop:{{ (request()->is('admin/files') || request()->is('admin/backups') || request()->is('admin/logs')) ? 'true' : 'false' }}}">
      <a class="flex-col justify-between items-center cursor-pointer" @click="advancedDrop=!advancedDrop">
        <div class="relative">
          <i class="fas fa-toolbox w-8 text-l"></i>
          <span class="font-roboto text-m">Advanced</span>
          <span class="float-right pr-4">
            <i class="fas fa-caret-down fa-rotate-90" x-show="!advancedDrop"></i>
            <i class="fas fa-caret-down" x-show="advancedDrop"></i>
          </span>
        </div>
      </a>
      <ul class="my-2 transform origin-top-left" x-show="advancedDrop"
        x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-75" x-transition:leave-end="opacity-0 scale-0">
        <li class=" {{ request()->is('admin/files') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center " href="{{ route('admin.files.index') }}">
            <i class="fas fa-folder w-8 text-lg "></i>
            <span class="font-roboto text-md ">File Manager</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/backups') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.backups.index') }}">
            <i class="fas fa-database w-8 text-lg  "></i>
            <span class="font-roboto text-md ">Backup</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/logs') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.logs.index') }}">
            <i class="fas fa-scroll w-8 text-lg "></i>
            <span class="font-roboto text-md ">Log</span>
          </a>
        </li>
      </ul>
    </li>

  </ul>
</div>