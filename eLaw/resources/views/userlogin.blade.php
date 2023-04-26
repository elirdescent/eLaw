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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>  
</body>
</html>