<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/images/elaw.png">
    <title>User Login</title>
@vite('resources/css/app.css')
</head>
<body>
    <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center pb-20 px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="hidden md:block w-1/2 flex justify-center pt-28 pl-10 ">
                  <img src="{{URL('images/loginuser.png')}}" alt="">
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-gray-900">Hi, User!</h1>
                        <p>Enter your information to Log In</p>
                    </div>
                    <div>
                        @error('username') 
                        <div class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                          <span class="block sm:inline">{{$message}} </span>
                        </div>
                        @enderror
                        <div  class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Username</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                    <input type="text" class="text-blue-300 w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="johnsmith" name="username" value="{{old('username')}}" >
                                </div>
                            </div> 
                        </div>
                        @error('password') 
                        <div class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                          <span class="block sm:inline">{{$message}} </span>
                        </div>
                        @enderror
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-12">
                                <label for="" class="text-xs font-semibold px-1">Password</label>
                                <div class="flex">
                                    <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                    <input type="password" class="text-blue-300 w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500" placeholder="************" name="password">
                                </div>
                            </div>
                        </div>
                         <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <button class="block w-full max-w-xs mx-auto bg-blue-500 hover:bg-blue-800 ease-in-out duration-300 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold" type="submit">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>  
</body>
</html>