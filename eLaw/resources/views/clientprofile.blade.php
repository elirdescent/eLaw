<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Profile</title>
     @vite('resources/css/app.css')
</head>


<!-- EDIT PROFILE MODAL -->

<input type="checkbox" id="my-modal-edit-" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
  <div class="modal-box">
    <h1 class="mb-4 ml-2 text-4xl font-extrabold text-gray-900 text-white md:text-4xl lg:text-4xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Edit Profile</span></h1>

    <form action="{{url('updateClientProfile')}}" method="POST">
      @csrf
      @method('PUT')
      <div class="">
        <h2>Name</h2>
        <input type="text" name="name" value="{{$data->name}}" class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
      </div>
      <div class="">
        <h2>Surname</h2>
        <input type="text" name="surname" value="{{$data->surname}}"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
      </div>
      <div class="">
        <h2>Username</h2>
        <input type="text" name="username" value="{{$data->username}}" class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
      </div>
      <div class="">
        <h2>City</h2>
        <input type="text" name="city" value="{{$data->city}}"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
      </div>
    
      <div class="">
        <h2>Address</h2>
        <input type="text" name="address" value="{{$data->address}}"  class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" >
      </div>
    
      <div class="">
        <h2>Country</h2>
        <input type="text" value="{{$data->country}}" placeholder="" name="country"   class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs"  />
        <div class="w-full flex justify-between text-xs px-2">
        </div>

        <div class="">
          <h2>Job</h2>
          <input type="text" name="job" value="{{$data->job}}"  class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" >
        </div>

        <div class="">
          <h2>Bio</h2>
          <input type="text" name="bio" value="{{$data->bio}}"  class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" >
        </div>
          
        <div class="flex items-center ">
        <button class="mt-2 btn border-none bg-teal-400 text-black hover:bg-blue-400 duration-300 hover:shadow-l" type="submit">Save</button>
    
        
          <label for="my-modal-edit-" class="cursor-pointer hover:bg-red-500 btn-sm btn-circle bg-red-400 p-0.5 ml-2  text-black text-center text-bold transition duration-300 ease-in-out">
            <i class=" fas fa-minus text-lg "></i>
          </label>
        </div>
      </div>
    </form>

    <input type="checkbox" id="my-modal-edit-{{$data->client_id}}" class="modal-toggle" />
<div class="modal">
  <div class="modal-box justify-center">
    

    <div class="modal-action">
     
      
    </div>
  </div>
</div>
  
  </div>
</div>

<!-- -->


<body>
   <main class="profile-page">
    
    
  <section class="relative block h-64 bg-teal-700 ">

                @if(Session::has('success'))
                  <div class="flex rounded-lg items-center bg-teal-500 text-white text-sm font-bold px-4 py-3" role="alert">
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
  
  
    
    <div class="absolute top-0 w-full h-full  bg-center bg-cover" style="">
      
      
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px " style="transform: translateZ(0px)">
     
    
    </div>
  </section>
  <section class="bg-gradient-to-t to-teal-700 from-gray-950 relative py-16 bg-blueGray-200">
    <div class="container mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-neutral   w-full  shadow-xl rounded-lg -mt-64">
        
        <div class="px-6 py-10">
          <div></div>
        
          
          <div class="flex flex-wrap justify-center">
            
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                
                <img alt="..." src="{{URL('images/avatar.png')}}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
              </div>
            </div>
            
            <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              
              <div class="py-6 px-3 mt-32 sm:mt-0">
               <a href="logout"><button  class="bg-blue-300 btn-sm active:bg-pink-600 uppercase text-neutral font-bold hover:shadow-md hover:bg-teal-300 shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                Log out
              </button></a> 
                 <button class="cursor:pointer bg-blue-300 active:bg-pink-600 uppercase text-neutral font-bold hover:shadow-md hover:bg-teal-300 shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                  <label for="my-modal-edit-" class="btn-sm cursor:pointer ">Update Profile</label>
                </button>

                
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                <div class="mr-4 p-3 text-center">

                </div>
              </div>
            </div>
          </div>
          <div class="ml-3 text-center justify-center mt-12">
            <h3 class="text-4xl flex justify-center font-semibold leading-normal mb-2 text-blue-300">
             {{$data->name}} {{$data->surname}}
            </h3>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
              {{$data->city}}, {{$data->country}}
            </div>
            <div class="mb-2 text-blueGray-400 mt-10">
              <i class="fas fa-briefcase mr-2 text-lg text-teal-300"></i>{{$data->job}}
            </div>
          
          </div>
          <div class="mt-10 py-10 text-center bg-neutral  rounded-md ">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-9/12 px-4">
                <h1 class="text-teal-300">About</h1>
                <p class="mb-4 text-lg leading-relaxed text-blueGray-400">
                {{$data->bio}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="relative pt-8 pb-6 mt-8">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center flex justify-center items-center">
        <img src="{{URL('images/legalbox.png')}}" alt="" class="h-10">
      </div>
    </div>
  </div>
</footer>
  </section>
</main> 
</body>
</html>