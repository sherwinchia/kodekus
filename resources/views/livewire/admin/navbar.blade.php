<div>
  <ul>

    <li class="{{ request()->is('admin/dashboard') ? 'navbar-active-list' : 'navbar-list' }}">
      <a class="flex-col justify-between items-center" href="#">
        <i class="fa fa-home w-8 text-lg"></i>
        <span class="font-roboto text-md">Dashboard</span>
      </a>
    </li>

    <li class="navbar-list pr-0"
      x-data="{contentDrop: {{ (request()->is('admin/content-article') || request()->is('admin/content-category') || request()->is('admin/content-tag')) ? 'true' : 'false' }}} ">
      <a class="flex-col justify-between items-center" href="#" @click="contentDrop=true">
        <div>
          <i class="fa fa-file-alt w-8 text-lg "></i>
          <span class="font-roboto text-md">Content</span>
          <span class="float-right pr-4">
            <i class="fas fa-caret-down fa-rotate-90" x-show="!contentDrop"></i>
            <i class="fas fa-caret-down" x-show="contentDrop"></i>
          </span>
        </div>
      </a>
      <ul class="my-2 transform origin-top-left" x-show="contentDrop" @click.away="contentDrop = false"
        x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-75" x-transition:leave-end="opacity-0 scale-0">
        <li class="{{ request()->is('admin/content-article') ? 'navbar-active-list' : 'navbar-list' }}">
          <a class="flex-col justify-between items-center " href="#">
            <i class="fas fa-newspaper w-8 text-lg "></i>
            <span class="font-roboto text-md ">Article</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/content-category') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="#">

            <i class="fas fa-archive w-8 text-lg  "></i>
            <span class="font-roboto text-md ">Category</span>

          </a>
        </li>
        <li class="{{ request()->is('admin/content-tag') ? 'navbar-active-list' : 'navbar-list' }}">
          <a class="flex-col justify-between items-center" href="#">
            <i class="fas fa-tag w-8 text-lg "></i>
            <span class="font-roboto text-md ">Tag</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="navbar-list pr-0"
      x-data="{authenticationDrop: {{ (request()->is('admin/auth-user') || request()->is('admin/auth-permission') || request()->is('admin/auth-role')) ? 'true' : 'false' }}}">
      <a class="flex-col justify-between items-center cursor-pointer" href="#" @click="authenticationDrop=true">
        <div>
          <i class="fas fa-user-lock w-8 text-lg "></i>
          <span class="font-roboto text-md">Authentication</span>
          <span class="float-right pr-4">
            <i class="fas fa-caret-down fa-rotate-90" x-show="!authenticationDrop"></i>
            <i class="fas fa-caret-down" x-show="authenticationDrop"></i>
          </span>
        </div>
      </a>
      <ul class="my-2 transform origin-top-left" x-show="authenticationDrop" @click.away="authenticationDrop = false"
        x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-75" x-transition:leave-end="opacity-0 scale-0">
        <li class=" {{ request()->is('admin/auth-user') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center " href="#">
            <i class="fas fa-users w-8 text-lg "></i>
            <span class="font-roboto text-md ">User</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/auth-role') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="#">

            <i class="fas fa-user-tag w-8 text-lg  "></i>
            <span class="font-roboto text-md ">Role</span>

          </a>
        </li>
        <li class="{{ request()->is('admin/auth-permission') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="#">
            <i class="fas fa-key w-8 text-lg "></i>
            <span class="font-roboto text-md ">Permission</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="{{ request()->is('admin/ads') ? 'navbar-active-list' : 'navbar-list' }}">
      <a class="flex-col justify-between items-center" href="#">
        <i class="fas fa-ad w-8 text-l"></i>
        <span class="font-roboto text-m">Advertisement</span>
      </a>
    </li>

    <li class="navbar-list pr-0 "
      x-data="{advancedDrop:{{ (request()->is('admin/file-manager') || request()->is('admin/backup') || request()->is('admin/log')) ? 'true' : 'false' }}}">
      <a class="flex-col justify-between items-center cursor-pointer" @click="advancedDrop=true">
        <div class="relative">
          <i class="fas fa-toolbox w-8 text-l"></i>
          <span class="font-roboto text-m">Advanced</span>
          <span class="float-right pr-4">
            <i class="fas fa-caret-down fa-rotate-90" x-show="!advancedDrop"></i>
            <i class="fas fa-caret-down" x-show="advancedDrop"></i>
          </span>
        </div>
      </a>
      <ul class="my-2 transform origin-top-left" x-show="advancedDrop" @click.away="advancedDrop = false"
        x-transition:enter="transition-all ease-out duration-200" x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-75" x-transition:leave-end="opacity-0 scale-0">
        <li class=" {{ request()->is('admin/file-manager') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center " href="#">
            <i class="fas fa-folder w-8 text-lg "></i>
            <span class="font-roboto text-md ">File Manager</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/backup') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="#">
            <i class="fas fa-database w-8 text-lg  "></i>
            <span class="font-roboto text-md ">Backups</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/log') ? 'navbar-active-list' : 'navbar-list' }} ">
          <a class="flex-col justify-between items-center" href="#">
            <i class="fas fa-scroll w-8 text-lg "></i>
            <span class="font-roboto text-md ">Logs</span>
          </a>
        </li>
      </ul>
    </li>

  </ul>
</div>