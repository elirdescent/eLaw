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

  <nav class="relative px-4 py-4 flex justify-center items-center bg-gray-700 transition duration-300 ease-in-out">

    <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
      <img src="{{URL('images/elaw.png')}}" class="h-10 " alt="">
   </a>
   <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
     <img src="{{URL('images/legalboxteal.png')}}" class="h-10 ml-1 " alt="">
  </a>    
  </ul>
 
</nav>



    <!--CARD-->
 
 
 
        
         

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
                                <a href="{{URL('regClient')}}" class="flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white bg-gray-800 border border-transparent transition duration-300 ease-in-out rounded-md hover:bg-gray-900" target="_blank">Register</a>
                              </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-900">
                                Register as a 
                                  <span class="font-bold">Client</span>
                                
                              </div></div>
                        
                        
                      </div>
                  <div class="mb-10 rounded-xl px-6 py-8 text-center bg-gradient-to-t from-blue-300 to-white  lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12" style="cursor: auto;">
                    <h3 class="text-2xl font-extrabold text-gray-900 sm:text-3xl" style="cursor: auto;">Welcome!</h3>
                    <h3 class="text-2xl font-extrabold text-gray-900 sm:text-3xl" style="cursor: auto;"></h3>
                      <div class="joinus mt-20">
                          <img src="{{URL('images/elaw.png')}}" alt="lawyers" class="  h-64 mx-auto transition duration-300 ease-in-out hover:transform hover:scale-110">
                          <div class="flex items-center justify-center mt-4 text-2xl font-extrabold text-gray-900">
                          <span>Choose your Role</span>
                          
                        </div>
                        <div class="mt-6">
                          <div class=" flex items-center justify-center w-full px-5 py-3 text-base font-medium text-gray-900  ">
                           Register as a Lawyer or a Client.
                          </div>
                        </div>
                       </div>
                    
                    
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
                            <a href="{{URL('regLawyer')}}" class="flex items-center justify-center w-full px-5 py-3 text-base font-medium text-white bg-gray-800 border border-transparent transition duration-300 ease-in-out rounded-md hover:bg-gray-900" target="_blank">Register</a>
                          </div>
                        </div>
                        <div class="mt-4 text-sm text-gray-900">
                          Register as a 
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