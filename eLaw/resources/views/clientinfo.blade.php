<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    
    
    
@vite('resources/css/app.css')
    
</head>

<body>
    <div class="">

     <!--NAVBAR-->

    <nav class="relative px-4 py-4 flex justify-center items-center bg-gray-700 transition duration-300 ease-in-out">

        <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
          <img src="{{URL('images/elaw.png')}}" class="h-10 " alt="">
       </a>
       <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
         <img src="{{URL('images/legalboxteal.png')}}" class="h-10 ml-1 " alt="">
      </a>    
      </ul>
     
    </nav>
  <!--NAVBAR-->