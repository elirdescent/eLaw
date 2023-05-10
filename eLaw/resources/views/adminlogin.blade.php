<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <title>Admin Login</title>
        @vite('resources/css/app.css')
</head>
<body>
    </script>
  <!--NAVBAR-->
   <nav class="relative px-4 py-4 flex justify-center items-center bg-gray-700 transition duration-300 ease-in-out">
     <nav class="flex-1 ">
        <a href="{{URL('loginrole')}}"> <button class="inline-flex items-center px-4 py-2 bg-transparent hover:bg-gray-800 text-white text-sm font-medium rounded-full mx-2">
	<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
	</svg>
    Back
  </button></a>
    </nav>
        <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
          <img src="{{URL('images/elaw.png')}}" class="h-10 " alt="">
       </a>
       <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
         <img src="{{URL('images/legalboxteal.png')}}" class="h-10 ml-1 " alt="">
      </a>    
      </ul>
     
    </nav>
    <!--FORM-->

    <div class="min-w-screen min-h-screen   flex items-center justify-center pb-20 px-5 py-5 ">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden transition duration-300 hover:bg-blue-200  lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="flex justify-center items-center">
                  
                  <img src="{{URL('images/adminlogin.png')}}" alt=""  class=" h-64 mx-auto transition duration-300 ease-in-out hover:transform hover:scale-110">
                  
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10 ">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">Hi, Admin!</h1>
                        <p>Enter your information to login</p>
                    </div>
                    <div>
                        <div  class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Username</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg  "></i></div>
                                    <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="johnsmith">
                                </div>
                            </div>
                            
                        </div>

                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-12">
                                <label for="" class="text-xs font-semibold px-1">Password</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                    <input type="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="************">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5 ">
                                <button class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-800 ease-in-out duration-300 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold ">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FORM-->

</body>
</html>