<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <title>Lawyer Search</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
</head>




@foreach($details as $lawyer)
<!-- VIEW PROFILE -->
<input type="checkbox" id="my-modal-view-{{$lawyer->id}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box w-11/12 max-w-5xl">
    <div>

    
       <h1 class="mb-4  text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{$lawyer->name}} {{$lawyer->surname}}</span></h1>
        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
          <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
         {{$lawyer->city}}, {{$lawyer->country}}
        </div>
        <div class="mb-2 text-blueGray-400 mt-10">
          <i class="fas fa-briefcase mr-2 text-lg text-teal-300"></i>{{$lawyer->job}}
        </div>
        <div class="mb-2 text-blueGray-400">
          <i class=" fas fa-money-bill mr-2 text-lg text-teal-300"></i>{{$lawyer->pricing}}
        </div><br>
      
   
      
          
            <h1 class="text-teal-300">About</h1>
            <p class="mb-4 text-md leading-relaxed text-blueGray-400">
                {{$lawyer->bio}}
              
        
    </div>

    <div class="modal-action">
      <label for="my-modal-view-{{$lawyer->id}}" class="btn">Close</label>
    </div>
  </div>
</div>

<!-- VIEW PROFILE -->

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
                    src="{{URL('images/useravatar.png')}}"
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
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                    >Your Profile</a
                  >

                  
  
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
  
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
               
                <!-- Notifications button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
                  class="p-2 transition-colors bg-neutral-800 rounded-lg shadow-md  hover:text-blue-300  focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-indigo-600' : 'text-gray-500 '"
                >
                  <span class="sr-only">Toggle case adding panel</span>
                <i class="fas fa-question w-6 h-6"></i>
                   
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
                    src="{{URL('images/useravatar.png')}}"
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
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >
                  <a href="{{route('clientprofile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                    >Your Profile</a
                  >
  
                  <a href="{{route('createClient')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Create Profile</a>
  
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
              <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center flex-shrink-0 py-10">
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
                <div class="flex-1 justify-start px-4 space-y-2 overflow-hidden hover:overflow-auto">
                  <a href="{{route('lawyersearch')}}" class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white">
                    <span aria-hidden="true" class="p-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white">
                    <i class="fas fa-user  "></i>
                    </span>
                    <span class="">Lawyers</span>
                  </a>
                  <a
                    href="{{route('reviews')}}"
                    class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
                  >
                    <span
                      aria-hidden="true"
                      class="pl-2 pr-1 pt-2 pb-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                    >
                    <i class="fas fa-star"></i>
                   
                    </span>
                    <span class="m-0">Reviews</span>
                  </a>

                  <a
                  href="{{route('clposts')}}"
                  class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
                >
                  <span
                    aria-hidden="true"
                    class="pl-2 pr-1 pt-2 pb-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                  >
                  <i class="fas fa-comments"></i>
                 
                  </span>
                  <span class="m-0">Legal Issues</span>
                </a>
                </div>
  
               
              </nav>
  
              <section x-show="currentSidebarTab == 'messagesTab'" class="px-2 py-2">
                <h2 class="text-xl">Leave a review</h2>
          
              </section>

              <form action="{{route('reportpost')}}" method="POST">
                @csrf
  
              <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
                <h2 class="text-xl">Report a problem</h2>
                

                <div  class="flex -mx-3 mt-5">
                  <div class="w-full px-3 mb-5">
                      <label for="" class="text-xs font-semibold px-1">Describe your problem</label>
                      <div class="flex">
                          <div class="w-10 z-10  text-start pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                          <textarea type="text" class="text-blue-300 w-full -ml-10 pl-2 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"  name="description" value="{{old('description')}}" > </textarea>
                      </div> 
                      <button class="mt-2 btn border-none bg-teal-400 text-black hover:bg-blue-400 duration-300 hover:shadow-l" type="submit">POST</button>
                  </div>
                  
              </div>
              </section>
            </div>
          </div>
          <div class="flex flex-col flex-1 ">
            <header class="relative flex items-center justify-between flex-shrink-0 p-4">
                
           
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
            class="absolute flex items-center justify-start p-2 bg-blue-300 rounded-md shadow-lg sm:hidden top-16 left-5 right-64"
          >
            
       
            <!-- Notifications button -->
            <button
              @click="isSidebarOpen = true; currentSidebarTab = 'notificationsTab'; isSubHeaderOpen = false"
              class="p-2 text-gray-400 bg-blue-200 rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
            >
              <span class="sr-only">Toggle notifications panel</span>
             <i class="fas fa-question m-1"></i>
            </button>
            <!-- Github link -->
            
          </div>
            </header>
  
            <div class="flex-none flex-2">
              <!-- Main -->
              <main class="flex-none flex-shrink-0 items-start justify-start   flex-1 px-4 py-0 ">
                <h1 class="mb-3 lg:ml-20 md:ml-20 sm:ml-0  text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Find Lawyers</span></h1>

   
               <div class="lg:flex md:flex sm:flex-none items-center ">
                <form action="{{URL('lawsearchresult')}}" type="get" method="GET">
                    @csrf
                    <div class="flex sm:mb-2 lg:mb-0">
                        <div class="w-10 lg:ml-20 md:ml-20 z-10 pl-1 text-center pointer-events-none flex items-start justify-start"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                        <input type="search" name="query" class="text-blue-300  -ml-10 p-5  py-2 rounded-lg flex justify-start  outline-none focus:border-blue-500" placeholder="Username" name="username" >
                        <button class="ml-2 bg-blue-300 btn text-neutral hover:bg-teal-300 " type="submit">Search</button>
                    </div>
                </form>

                <div class="flex lg:ml-5 md:ml-5 sm:ml-0 mb-5   flex">
                <form action="{{URL('lawsearchlocation')}}" type="get" method="GET">
                    @csrf
                    <p class="  mt-5 lg:mt-0 md:mt-0   text-blue-300">Location</p>
                    <div class="flex">
                    
                    <select name="city" type="submit" class="  w-32  input text-blue-300 input-bordered input-teal-500 w-full max-w-xs">
                         
                              
                        <option  value="Prishtina">Prishtina</option>
                        <option  value="Prizren">Prizren</option>
                     
                       </select>
                       <button class="ml-2 bg-blue-300 btn text-neutral hover:bg-teal-300 " type="submit">Filter</button>
                      </div>
                </form>
            </div>
        </div>
            

                


                @foreach($details as $lawyer)
                <!-- LAWYER CARD -->

                <div class="  lg:ml-20 md:ml-20 sm:ml-0 max-w-4xl px-10 my-4 py-6 bg-neutral rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        
                    </div>
                    <div class="lg:flex sm:flex-none">
                        <img src="{{URL('images/avatar.png')}}" class="w-32 h-32 mt-3 justify-center  rounded-full" alt="">
                    
                    <div class="lg:ml-10 sm:ml-0"> 
                    <div class="mt-2 ">

                      <div class="flex">
                        <h1 class="mb-2  text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{$lawyer->name}} {{$lawyer->surname}}</span></h1>
                  
                    </div>

                    <div class="flex">
                    <h1 class="mb-1 flex items-center text-sm font-extrabold text-gray-900 text-white md:text-sm lg:text-sm"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">@</span></h1> <h1 class="mb-1 flex items-center text-sm font-extrabold text-gray-900 text-white md:text-sm lg:text-sm"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{$lawyer->username}}</span></h1>
                </div>

                        

                          <div class="mb-2  ">
                            <div class="flex items-center">
                            <i class="fas fa-money-bill mr-2 text-lg text-teal-300"></i>
                            <p class="text-blue-300 ">{{$lawyer->pricing}}</p>
                        </div>
                          </div>
                        <p class="mt-2 text-gray-500">{{Str::limit($lawyer->bio,140)}}</p>
                    </div>
                    <label for="my-modal-view-{{$lawyer->id}}" class="btn mt-1 bg-neutral-800 btn-sm text-teal-300  "><i class="fas fa-info"></i><p class="ml-2"> Info</p></label>
                    
                
                 
                    </div>
                </div>
                </div>

                  <!-- LAWYER CARD -->
                  @endforeach
                
                
                
                
                
               

                  
                      
              </main>

           
              
               
              <section class="lg:ml-10 sm:ml-0 ">
                @if(Session::has('success'))
                <div class="lg:ml-8 sm:ml-0 flex rounded-lg items-center bg-neutral w-2/6 text-white text-sm font-bold px-4 py-3" role="alert">
                  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                  <p>{{Session::get('success')}}</p>
                </div>
                @endif

                @if(Session::has('fail'))
                <div class="lg:ml-8 sm:ml-0 flex rounded-lg items-center bg-neutral w-2/6 text-white text-sm font-bold px-4 py-3" role="alert">
                  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                  <p>{{Session::get('success')}}</p>
                </div>
                @endif

                
 

              
              </section>
                
              
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
            <h2 class="text-lg font-semibold">Settings</h2>
          </div>
        </section>
  
  
  
      
  


    
</body>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script src="{{URL('js/dashboard.js')}}"></script>
</html>