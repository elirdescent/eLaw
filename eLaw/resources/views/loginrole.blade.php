<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <title>Role Selection</title>
    @vite('resources/css/app.css')
</head>
<body>
    @if(Session::has('fail'))
    <div class="flex  items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{Session::get('fail')}}</p>
    </div>
    @endif


    <!--CARD-->
    <nav class="relative px-4 py-4 flex justify-center items-center bg-gray-700 transition duration-300 ease-in-out">

        <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
          <img src="{{URL('images/elaw.png')}}" class="h-10 " alt="">
       </a>
       <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
         <img src="{{URL('images/legalboxteal.png')}}" class="h-10 ml-1 " alt="">
      </a>    
      </ul>
     
    </nav>
    
    
 
 
        
         

        <div class=" pt-10 ">

          


  
          
          <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 justify-content-space-around  " style="cursor: auto;">
            <div class="justify-evenly  max-w-lg mx-auto overflow-hidden  rounded-lg lg:max-w-none lg:flex sm:flex-row ">
                
                
                    <div class="mb-10 rounded-xl px-6 py-8 text-center bg-gray-100 bg-white transition-colors duration-300 ease-in-out hover:bg-blue-200  lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12" style="cursor: auto;">
                        
                        <h3 class="text-2xl font-extrabold text-gray-900 sm:text-3xl" style="cursor: auto;"></h3>
                          <div class="joinus mt-20">
                              <img src="{{URL('images/clientuser.png')}}" alt="lawyers" class="  h-64 mx-auto transition duration-300 ease-in-out hover:transform hover:scale-110">
                              
                              <div class="flex items-center justify-center mt-4 text-5xl font-extrabold text-gray-900">
                              <span>Client</span>
                              
                            </div>
                            <div class="mt-6">
                              <div class="rounded-md shadow">
                                <a href="{{route('clientlogin')}}" class="flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white bg-gray-800 border border-transparent transition duration-300 ease-in-out rounded-md hover:bg-gray-900" target="_blank">Log In</a>
                              </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-900">
                                Log in as a 
                                  <span class="font-bold">Client</span>
                                
                              </div></div>
                        
                        
                      </div>
                      <div class="mb-10 rounded-xl px-6 py-8 text-center bg-gradient-to-t from-blue-300 to-white  lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12" style="cursor: auto;">
                        <h3 class="text-2xl font-extrabold text-gray-900 sm:text-3xl" style="cursor: auto;">Welcome back!</h3>
                       
                          <div class="joinus mt-10">
                              <img src="{{URL('images/admin.png')}}" alt="lawyers" class="  h-64  mx-auto transition duration-300 ease-in-out hover:transform hover:scale-110">
                              
                              <div class="flex items-center justify-center mt-4 text-5xl font-extrabold text-gray-900">
                              <span>Admin</span>
                              
                            </div>
                            <div class="mt-6">
                              <div class="rounded-md shadow">
                                <a href="{{route('adminlogin')}}" class="flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white bg-gray-800 border border-transparent transition duration-300 ease-in-out rounded-md hover:bg-gray-900" target="_blank">Log In</a>
                              </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-900">
                             Log in as an
                                  <span class="font-bold">Admin</span>
                                
                              </div></div>
                        
                        
                      </div>

                  <div class="mb-10 rounded-xl px-6 py-8 text-center bg-gray-100 bg-white transition-colors duration-300 ease-in-out hover:bg-blue-200  lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12" style="cursor: auto;">
                    <h3 class="text-2xl font-extrabold text-gray-900 sm:text-3xl" style="cursor: auto;"></h3>
                      <div class="joinus mt-20">
                          <img src="{{URL('images/lawyers.png')}}" alt="lawyers" class="  h-64 mx-auto transition duration-300 ease-in-out hover:transform hover:scale-110">
                          <div class="flex items-center justify-center mt-4 text-5xl font-extrabold text-gray-900">
                          <span>Lawyer</span>
                          
                        </div>
                        <div class="mt-6">
                          <div class="rounded-md shadow">
                            <a href="{{URL('loginlawyer')}}" class="flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white bg-gray-800 border border-transparent transition duration-300 ease-in-out rounded-md hover:bg-gray-900" target="_blank">Log In</a>
                          </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-900">
                          Log in as a 
                            <span class="font-bold">Lawyer</span>
                          
                        </div></div>
                    
                    
                  </div>
             
              </div>
  
             
              
              
            </div>
          </div>
          </div>
          </div>
      
     
      </div>
      <!--CARD-->
  



    

    
    
</body>
</html>