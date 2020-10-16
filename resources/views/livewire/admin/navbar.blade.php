<div>
  <ul>
    <li class="{{ request()->is('admin/dashboard') ? 'navbar-active-list' : 'navbar-list' }}">
      <a class="flex-col justify-between items-center" href="{{ route('admin.dashboard.index') }}">
        <i class="fa fa-home w-8 text-lg"></i>
        <span class="font-roboto text-md">Dashboard</span>
      </a>
    </li>

    <li class="navbar-list pr-0"
      x-data="{contentDrop: {{ (request()->is('admin/articles*') || request()->is('admin/categories*') || request()->is('admin/tags*')) ? 'true' : 'false' }}} ">
      <a class="flex-col justify-between items-center cursor-pointer" @click="contentDrop=!contentDrop">
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
        <li class="{{ request()->is('admin/articles*') ? 'navbar-active-list' : 'navbar-list' }}">
          <a class="flex-col justify-between items-center " href="{{ route('admin.articles.index') }}">
            <div class="w-full">
              <i class="fas fa-newspaper w-8 text-lg "></i>
              <span class="font-roboto text-md ">Articles</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('admin/categories*') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.categories.index') }}">
            <div class="w-full">
              <i class="fas fa-archive w-8 text-lg  "></i>
              <span class="font-roboto text-md ">Categories</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('admin/tags*') ? 'navbar-active-list' : 'navbar-list' }}">
          <a class="flex-col justify-between items-center" href="{{ route('admin.tags.index') }}">
            <div class="w-full">
              <i class="fas fa-tag w-8 text-lg "></i>
              <span class="font-roboto text-md ">Tags</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('admin/series*') ? 'navbar-active-list' : 'navbar-list' }}">
          <a class="flex-col justify-between items-center" href="{{ route('admin.series.index') }}">
            <div class="w-full">
              <i class="fas fa-tv w-8 text-lg "></i>
              <span class="font-roboto text-md ">Series</span>
            </div>
          </a>
        </li>
      </ul>
    </li>

    <li class="navbar-list pr-0"
      x-data="{authenticationDrop: {{ (request()->is('admin/users*') || request()->is('admin/permissions*') || request()->is('admin/roles*')) ? 'true' : 'false' }}}">
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
        <li class=" {{ request()->is('admin/users*') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center " href="{{ route('admin.users.index') }}">
            <div class="w-full">
              <i class="fas fa-users w-8 text-lg "></i>
              <span class="font-roboto text-md ">Users</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('admin/roles*') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.roles.index') }}">
            <div class="w-full">
              <i class="fas fa-user-tag w-8 text-lg  "></i>
              <span class="font-roboto text-md ">Roles</span>
            </div>
          </a>
        </li>
        <li class="{{ request()->is('admin/permissions*') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="{{ route('admin.permissions.index') }}">
            <div class="w-full">
              <i class="fas fa-key w-8 text-lg "></i>
              <span class="font-roboto text-md ">Permissions</span>
            </div>
          </a>
        </li>
      </ul>
    </li>


    <li class="navbar-list pr-0 "
      x-data="{advancedDrop:{{ (request()->is('admin/files*') || request()->is('admin/backups*') || request()->is('admin/logs*')) ? 'true' : 'false' }}}">
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
        {{-- <li class=" {{ request()->is('admin/files*') ? 'navbar-active-list' : 'navbar-list' }} ">
        <a class="flex-col justify-between items-center " href="{{ route('admin.files.index') }}">
          <div class="w-full">
            <i class="fas fa-folder w-8 text-lg "></i>
            <span class="font-roboto text-md ">File Manager</span>
          </div>
        </a>
    </li>
    <li class="{{ request()->is('admin/backups*') ? 'navbar-active-list' : 'navbar-list' }} ">
      <a class="flex-col justify-between items-center" href="{{ route('admin.backups.index') }}">
        <div class="w-full">
          <i class="fas fa-database w-8 text-lg  "></i>
          <span class="font-roboto text-md ">Backup</span>
        </div>
      </a>
    </li> --}}
    <li class="{{ request()->is('admin/logs*') ? 'navbar-active-list' : 'navbar-list' }} ">
      <a class="flex-col justify-between items-center" href="{{ route('admin.logs.index') }}">
        <div class="w-full">
          <i class="fas fa-scroll w-8 text-lg "></i>
          <span class="font-roboto text-md ">Logs</span>
        </div>
      </a>
    </li>
  </ul>
  </li>

  <li class="{{ request()->is('admin/advertisements*') ? 'navbar-active-list' : 'navbar-list' }}">
    <a class="flex-col justify-between items-center" href="{{ route('admin.advertisements.index') }}">
      <div class="w-full">
        <i class="fas fa-ad w-8 text-l"></i>
        <span class="font-roboto text-m">Advertisement</span>
      </div>
    </a>
  </li>

  <li class="{{ request()->is('admin/profile*') ? 'navbar-active-list' : 'navbar-list' }}">
    <a class="flex-col justify-between items-center" href="{{ route('admin.profile.show') }}">
      <div class="w-full">
        <i class="fas fa-user w-8 text-l"></i>
        <span class="font-roboto text-m">Profile</span>
      </div>
    </a>
  </li>

  <li class="navbar-list">
    <a class="flex-col justify-between items-center" href="{{ route('admin.logout') }}">
      <div class="w-full">
        <i class="fas fa-sign-out-alt w-8 text-l"></i>
        <span class="font-roboto text-m">Logout</span>
      </div>
    </a>
  </li>
  </ul>
</div>