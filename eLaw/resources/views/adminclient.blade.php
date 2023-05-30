<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <title>Client</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
</head>



@foreach($client as $cli)
<input type="checkbox" id="my-modal-delete-{{$cli->id}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-lg text-error">Warning!</h3>
    <p class="py-4">Once a user is deleted, their account cannot be recovered.</p>
    <div class="modal-action">
      <label for="my-modal-delete-{{$cli->id}}" class="btn">DISCARD</label>
      <button class="btn"><a href="{{URL('deleteclient/'.$cli->id)}}"><i class="fas fa-trash text-error"></i></a></button>
    </div>
  </div>
</div> 
@endforeach


<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
        <div class="flex p-0 m-0 antialiased text-gray-900 " >
         
          <div
            x-ref="loading"
            class="fixed h-screen inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-neutral"
          >
            <img src="{{URL('images/elaw.png')}}" alt="">
          </div>
  
          <!-- Sidebar -->
          <div class="z-10 fixed flex h-screen flex-shrink-0 transition-all">
            <div
              x-show="isSidebarOpen"
              @click="isSidebarOpen = false"
              class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"
            ></div>
            <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-white"></div>

            
  
            <!-- Mobile bottom bar -->
            <nav
              aria-label="Options"
              class="fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-neutral  border-indigo-100 sm:hidden shadow-t rounded-t-3xl"
            >
              <!-- Menu button -->
              <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg bg-neutral-800 shadow-md  hover:text focus:outline-none focus:ring focus:ring-blue-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-blue-600' : 'text-gray-500 '"
              >
                <span class="sr-only">Toggle sidebar</span>
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
              </button>
  
              <!-- Logo -->
              <a href="#">
                <img
                  class="w-10 h-auto"
                  src="{{URL('images/elaw.png')}}"
                  alt="K-UI"
                />
              </a>
  
              <!-- User avatar button -->
              <div class="relative flex items-center flex-shrink-0 p-2 " x-data="{ isOpen: false }">
                <button
                  @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                  class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-blue-600 focus:ring-offset-white focus:ring-offset-2"
                >
                  <img
                    class="w-8 h-8 rounded-lg shadow-md"
                    src="{{URL('images/adminavatar.png')}}"
                    alt=""
                  />
                  <span class="sr-only">User menu</span>
                </button>
                <div
                  x-show="isOpen"
                  @click.away="isOpen = false"
                  @keydown.escape="isOpen = false"
                  x-ref="userMenu"
                  tabindex="-1"
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-blue-300 rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >

  
                  <a href="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                </div>
              </div>
              
            </nav>
  
            <!-- Left mini bar -->
            <nav
              aria-label="Options"
              class=" z-20 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-neutral shadow-md sm:flex rounded-tr-3xl rounded-br-3xl"
            >
              <!-- Logo -->
              <div class="flex-shrink-0 py-4">
                <a href="#">
                  <img
                    class="w-10 h-auto"
                    src="{{URL('images/elaw.png')}}"
                    alt="K-UI"
                  />
                </a>
              </div>
              <div class="flex flex-col items-center flex-1 p-2 space-y-4">
                <!-- Menu button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                  class="p-2 transition-colors bg-neutral-800 rounded-lg shadow-md  hover:text-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 '"
                >
                  <span class="sr-only">Toggle sidebar</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                  </svg>
                </button>

              </div>
  
              <!-- User avatar -->
              <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
                <button
                  @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                  class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-white focus:ring-offset-2"
                >
                  <img
                    class="w-10 h-10 rounded-lg shadow-md"
                    src="{{URL('images/adminavatar.png')}}"
                    alt="Ahmed Kamel"
                  />
                  <span class="sr-only">User menu</span>
                </button>
                <div
                  x-show="isOpen"
                  @click.away="isOpen = false"
                  @keydown.escape="isOpen = false"
                  x-ref="userMenu"
                  tabindex="-1"
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >

  
                  <a href="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                </div>
              </div>
            </nav>
  
            <div
              x-transition:enter="transform transition-transform duration-300"
              x-transition:enter-start="-translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transform transition-transform duration-300"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="-translate-x-full"
              x-show="isSidebarOpen"
              class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-blue-200   shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64"
            >
              <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="z-100 flex flex-col h-full">
                <!-- Logo -->
                <div class="z-100 flex items-center justify-center flex-shrink-0 py-10">
                  <a href="#">
                    <!-- <svg
                      class="text-indigo-600"
                      width="96"
                      height="53"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.691 34.703L13.95 28.2 32.09 52h8.087L18.449 23.418 38.594.813h-8.157L7.692 26.125V.812H.941V52h6.75V34.703zm27.61-7.793h17.156v-5.308H35.301v5.308zM89.19 13v22.512c0 3.703-1.02 6.574-3.058 8.613-2.016 2.04-4.934 3.059-8.754 3.059-3.773 0-6.68-1.02-8.719-3.059-2.039-2.063-3.058-4.945-3.058-8.648V.813h-6.68v34.874c.047 5.297 1.734 9.458 5.062 12.481 3.328 3.023 7.793 4.535 13.395 4.535l1.793-.07c5.156-.375 9.234-2.098 12.234-5.168 3.024-3.07 4.547-7.02 4.57-11.848V13h-6.785zM89 8h7V1h-7v7z"
                      />
                    </svg> -->
                    <img
                      class="w-24 h-auto"
                      src="{{URL('images/legalbox.png')}}"
                      alt="K-UI"
                    />
                  </a>
                </div>
  
                <!-- Links -->
                  <!-- Links -->
                  <div class="flex-1 justify-start px-4 space-y-2 overflow-hidden hover:overflow-auto">
                    <a href="{{route('adminlawyer')}}" class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white">
                      <span aria-hidden="true" class="p-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white">
                      <i class="fas fa-user-tie  "></i>
                      </span>
                      <span class="">Lawyers</span>
                    </a>
                    <a
                      href="{{route('adminclient')}}"
                      class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
                    >
                      <span
                        aria-hidden="true"
                        class="pl-1 pr-1 pt-2 pb-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                      >
                      <i class="fas fa-user ml-1"></i>
                     
                      </span>
                      <span class="">Clients</span>
                    </a>
  
                    <a
                    href="{{route('reports')}}"
                    class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
                  >
                    <span
                      aria-hidden="true"
                      class="pl-2 pr-1 pt-2 pb-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                    >
                    <i class="fas fa-exclamation-circle"></i>
                   
                    </span>
                    <span class="m-0">Reports</span>
                  </a>
                  </div>
    
  
               
              </nav>
  
              <section x-show="currentSidebarTab == 'messagesTab'" class="px-2 py-2">
               
  
              <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
                <h2 class="text-xl">Notifications</h2>
              </section>
            </div>
          </div>
          <div class="flex flex-col flex-1 ">
            <header class="relative flex items-center justify-between flex-shrink-0 p-4">
              <form action="#" class="flex-1">
           
              </form>
              
  
              <!-- Mobile sub header button -->
              <button
                @click="isSubHeaderOpen = !isSubHeaderOpen"
                class="p-2 text-gray-400 bg-neutral rounded-lg shadow-md sm:hidden hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
              >
                <span class="sr-only">More</span>
  
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                  />
                </svg>
              </button>
  
              <!-- Mobile sub header -->
              <div
                x-transition:enter="transform transition-transform"
                x-transition:enter-start="translate-y-full opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transform transition-transform"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="translate-y-full opacity-0"
                x-show="isSubHeaderOpen"
                @click.away="isSubHeaderOpen = false"
                class="absolute flex items-center justify-between p-2 bg-blue-300 rounded-md shadow-lg sm:hidden top-16 left-5 right-5"
              >
                <!-- Seetings button -->
                <button
                  @click="isSettingsPanelOpen = true; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-blue-200 rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Create/Update Profile</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                </button>
                <!-- Messages button -->
                <button
                  @click="isSidebarOpen = true; currentSidebarTab = 'messagesTab'; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-blue-200 rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Toggle message panel</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                    />
                  </svg>
                </button>
                <!-- Notifications button -->
                <button
                  @click="isSidebarOpen = true; currentSidebarTab = 'notificationsTab'; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-blue-200 rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Toggle notifications panel</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    />
                  </svg>
                </button>
                <!-- Github link -->
                
              </div>
            </header>

            @if(Session::has('success'))
            <div class="ml-10 w-1/4 flex items-center justify-center pl-10 pb-5">
              <div class="flex alert shadow-lg ">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-white stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="text-white">{{Session::get('success')}}</span>
                </div>
            </div>
            </div>
            @endif

            @if(Session::has('fail'))
            <div class="ml-10 w-1/4 flex items-center justify-center pl-10 pb-5">
              <div class="flex alert shadow-lg ">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-white stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span class="text-white">{{Session::get('fail')}}</span>
                </div>
            </div>
            </div>
            @endif


            <div class="lg:ml-20 sm:ml-10 md:ml-10">
            <h1 class="ml-4 text-normal text-6xl font-extrabold text-gray-900 text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Clients</span></h1>
          </div>
            <div class="flex flex-2  ">
              <!-- Main -->
              <main class="z-0 flex items-start justify-center flex-1 px-4  py-0  ">
                
                <div class="overflow-x-auto w-full lg:ml-20 sm:ml-0 mt-5">
                    <table class="table table-normal  text-lg w-full  text-blue-300  " >
                      <!-- head -->
                      <thead class="">
                        <tr class="">
                         
                          <tr class="" >
                            <td>Name</td>
                            <td>Surname</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td></td>
                          
                          </tr>
                        </tr>
                      </thead>
                      <tbody class="z-0 ">
                        @foreach($client as $client)
                        <!-- row 1 -->
                     
                     
                          <td>{{$client->name}}</td>
                          <td>{{$client->surname}}</td>
                          <td>{{$client->username}}</td>
                          <td>{{$client->email}}</td>
                          <td><label for="my-modal-delete-{{$client->id}}" class="btn btn-circle btn-md"><i class="fas fa-trash text-error"></i></label></td>
                        </tr>
                        <!-- row 2 -->
                        @endforeach
                    
                       
                      </tbody>
                    </table>
                  </div>
                
            

                

                
                
                
                
                
                
                
               
               
              </main>

              
            </div>
          </div>
        </div>
  
        <!-- Panels -->
  
        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div
          x-show="isSettingsPanelOpen"
          class="fixed inset-0 bg-black bg-opacity-50"
          @click="isSettingsPanelOpen = false"
          aria-hidden="true"
        ></div>
        <!-- Panel -->
        <section
          x-transition:enter="transform transition-transform duration-300"
          x-transition:enter-start="translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition-transform duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="translate-x-full"
          x-show="isSettingsPanelOpen"
          class="fixed inset-y-0 right-0 w-64 bg-white border-l border-indigo-100 rounded-l-3xl"
        >
          <div class="px-4 py-8">
            <h2 class="text-lg font-semibold">Create/Update Profile</h2>
          </div>
        </section>
  
  
  
      
  


    
</body>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script src="{{URL('js/dashboard.js')}}"></script>
</html>