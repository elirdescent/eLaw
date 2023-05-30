<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
</head>

@foreach($lawyertask as $task)




<!-- DELETE MODAL -->
<input type="checkbox" id="my-modal-delete-{{$task['id']}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-lg text-error">Warning!</h3>
    <p class="py-4">Once a task is deleted, it cannot be recovered.</p>
    <div class="modal-action">
      <label for="my-modal-delete-{{$task['id']}}" class="btn">Discard</label>
      <a href="{{url('deletetask/'.$task['id'])}}" class="btn btn-circle"><i class="fas fa-trash text-error"></i></a>
    </div>
  </div>
</div>

<!-- DELETE MODAL -->



<!-- EDIT MODAL -->

<input type="checkbox" id="my-modal-edit-{{$task['id']}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <h1 class="mb-4  text-3xl font-extrabold text-gray-900 text-white md:text-3xl lg:text-3xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-sky-400">Edit Task</span></h1>
    <form action="{{url('updatetask/'.$task['id'])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="">
        <h2>Case Title</h2>
        <input type="text" name="title" value="{{$task['title']}}" class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
      </div>
      <div class="">
        <h2>Client Name</h2>
        <input type="text" name="name" value="{{$task['name']}}"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
      </div>
      <div class="">
        <h2>Client Surname</h2>
        <input type="text" name="surname" value="{{$task['surname']}}" class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
      </div>
      <div class="">
        <h2>Case Description</h2>
        <input type="text" name="task_description" value="{{$task['task_description']}}"  class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" >
      </div>
    
      <div class="">
        <h2>Case Progress</h2>
        <input type="number" value="{{$task['case_progress']}}" placeholder="{{$task['case_progress']}}" name="case_progress" min="0" max="100"    class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs"  />
        <div class="w-full flex justify-between text-xs px-2">
        </div>
          
        <div class="flex items-center ">
        <button class="mt-2 btn border-none bg-teal-400 text-black hover:bg-blue-400 duration-300 hover:shadow-l" type="submit">Save</button>
    
        
        <label for="my-modal-edit-{{$task['id']}}" class="btn border-none hover:bg-red-400 transition transition-duration-300 ease-in-out btn-circle btn-sm ml-2 mt-2"><i class="fas fa-minus"></i></label>
        </div>
      </div>
    </form>
       
     
    </div>
  </div>
</div>
<!-- EDIT MODAL -->

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
                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
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
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-blue-300 rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                    >Your Profile</a
                  >

                  
  
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Create/Update Profile</a>
  
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
                <!-- Messages button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
                  class="p-2 transition-colors bg-blue-300 rounded-lg shadow-md  hover:text-blue-300 hover:bg-teal-300 duration-300  focus:outline-none focus:ring focus:ring-blue-300  focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-teal-300' : 'text-gray-500 '"
                >
                  <span class="sr-only">Toggle message panel</span>
            
                  
                  <svg 
                   aria-hidden="true"
                  class="w-6 h-6"
              
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Add_Plus"> <path id="Vector" d="M6 12H12M12 12H18M12 12V18M12 12V6" stroke="#878787" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                 
                 
                </button>
                <!-- Notifications button -->
                
              </div>
  
              <!-- User avatar -->
              <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
                <button
                  @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                  class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-white focus:ring-offset-2"
                >
                  <img
                    class="w-10 h-10 rounded-lg shadow-md"
                    src="{{URL('images/avatar.png')}}"
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
                  <a href="{{route('userprofile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                    >Your Profile</a
                  >
  
                  <a href="{{route('lawyerup')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Create/Update Profile</a>
  
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
                <a href="{{route('lawyercases')}}" class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white">
                  <span aria-hidden="true" class="p-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white">
                  <i class="fas fa-box  "></i>
                  </span>
                  <span class="">Cases</span>
                </a>
                <a
                  href="{{route('lawyertasks')}}"
                  class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
                >
                  <span
                    aria-hidden="true"
                    class="pl-2 pr-1 pt-2 pb-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                  >
                  <i class="fas fa-archive"></i>
                 
                  </span>
                  <span class="m-0">Tasks</span>
                </a>

                <a
                href="{{route('viewclients')}}"
                class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
              >
                <span
                  aria-hidden="true"
                  class="pl-2 pr-1 pt-2 pb-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                >
                <i class="fas fa-user"></i>
               
                </span>
                <span class="m-0">Users</span>
              </a>

                <a
                href="{{route('clientposts')}}"
                class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
              >
                <span
                  aria-hidden="true"
                  class="pl-2 pr-1 pt-2 pb-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                >
                <i class="fas fa-balance-scale"></i>
               
                </span>
                <span class="m-0">Legal Issues</span>
              </a>

            

              </div>
              </nav>
  
              <section x-show="currentSidebarTab == 'messagesTab'" class="px-2 py-2">
                <h2 class="text-xl">Add a task</h2>
           <!-- ADD A CASE -->
                <form class="pt-10" action="{{route('saveTask')}}" method="post">
                  @csrf

                  @if(Session::has('success'))
                  <div class="flex rounded-lg items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                      <p>{{Session::get('success')}}</p>
                    </div>
                    @endif
                   

                    @if(Session::has('fail'))
                    <div class="flex rounded-lg items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{{Session::get('fail')}}.</p>
                      </div>
                      @endif

                          @error('name') 
                          <div class="bg-red-200 border border-red-400 text-red-700 px-2 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{$message}} </span>
                          </div>
                          @enderror

                

                  <div class="">
                    <h2>Task Title</h2>
                    <input type="text" name="title"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>
                  <div class="">
                    <h2>Assignee Name</h2>
                    <input type="text" name="name"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>
                  <div class="">
                    <h2>Assignee Surname</h2>
                    <input type="text" name="surname"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>
                  <div class="">
                    <h2>Task Description</h2>
                    <input type="text" name="task_description"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>

                  <div class="">
                    <h2>Task Progress</h2>
                    <input type="number" name="case_progress" min="0" max="100"    class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs"  />
                  </div>

              
                      
                  <div class="pt-2">
                    <button class="btn border-none bg-teal-400 text-black hover:bg-blue-400 duration-300 hover:shadow-l" type="submit">Add Task</button>
                  </div>
              
 
                </form>
           <!-- ADD A CASE -->
              </section>
  
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
  
            <div class="flex flex-2">
              <!-- Main -->
              <main class="flex items-start justify-start flex-1 px-4 py-0 ">
                
                
                
                
                
               
                <div class="reviews  mb-20 ml-10 mr-10">

                  @if(Session::has('success'))
                  <div class="flex items-center justify-center pl-10 pb-5">
                    <div class="flex alert shadow-lg ">
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-white stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-white">{{Session::get('success')}}.</span>
                      </div>
                  </div>
                  </div>
                    @endif

                    @if(Session::has('fail'))
                    <div class="flex items-center justify-center pl-10 pb-5">
                      <div class="flex alert shadow-lg ">
                        <div>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-white stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                          <span class="text-white">{{Session::get('fail')}}</span>
                        </div>
                    </div>
                    </div>
                      @endif
                  
                  <h1 class="mb-4 ml-10 text-6xl font-extrabold text-gray-900 text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-red-600 from-sky-400">Tasks</span></h1>
              
                
                  
                  <section class="text-neutral-700 text-neutral-300">
                    
                   
                    
                     
                      <div class="grid lg:ml-10 gap-6 text-center md:grid-cols-3">
              
                        @foreach($lawyertask as $task )
              
                        <div>
                          <div
                            class="block rounded-lg text-white  shadow-lg bg-neutral-700 shadow-black/30">
                            <div class=" overflow-hidden rounded-t-lg bg-neutral-700">
                              <h4 class="mb-4 mt-5 text-2xl font-semibold"> {{$task['title']}} </h4> 
                                         <div class="p-none m-none h-30 radial-progress bg-blue-200 text-teal-700 border-4 border-blue-200" style="--value:{{$task['case_progress']}};">{{$task['case_progress']}} %</div>
                              
                            </div>
                 
                            <div
                              class="m overflow-hidden rounded-full   ">
                    
                             
                            </div>
                            <div class="p-6">
                              <h4 class="mb-4 text-l font-semibold">Assigned to: </h4> <h4 class="mb-4 text-2xl font-semibold">{{$task['name']}} {{$task['surname']}}</h4>
                              <hr />
                              <p class="justify-center mt-4 ">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="currentColor"
                                  class="inline-block h-7 w-7 pr-2"
                                  viewBox="0 0 24 24">
                                </svg>
                          {{$task['task_description']}}
                              </p>
                            </div>
                            <div class="">
                              <label for="my-modal-delete-{{$task['id']}}" class="btn btn-circle mr-5 mb-5"><i class="fas fa-trash"></i></label>
                              <label for="my-modal-edit-{{$task['id']}}" class="btn btn-circle ml-5  mb-2"><i class="fas fa-edit"></i></label>
                              
                            </div>
                          
                          </div>
                        </div>
              
              
              
                        @endforeach
                    
              
                        
                            
              
              
                      </div>
              
              
                      
              
              
                
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