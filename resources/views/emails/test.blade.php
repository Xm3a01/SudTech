<!DOCTYPE html>
<html>
  <head>
      <title></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" />
    <script src="{{asset('js/app.js')}}" defer></script>
  </head>
  <body class="bg-gray-200 min-h-screen font-base">
      <div class ="flex justify-center">
          <span class="font-bold text-xl text-gray-700 text-center mt-10">SUD<span class="text-red-500">TE</span>CH</span>
      </div>
      <div class="flex justify-center">
          <div class="max-w-lg rounded overflow-hidden shadow-lg mt-10 bg-white">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">New job posted</div>
              <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
              </p>
            </div>
            <div class="w-full h-32 bg-red-600 px-6 py-4">
               <div class="flex">
                 <img src="images/search.png" class="w-24 h-24 px-3">
                 <div class="flex-col">
                   <span class=" px-3 mx-8 text-lg text-gray-700 font-bold">Web Developer</span>
                   <div class="px-6 py-4">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">photography</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">travel</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">winter</span>
                  </div>
                 </div>
               </div>
            </div>
            <div class="px-6 py-4">
              Thanks!<br>
              <span class="font-bold">SUD<span class="text-red-500">TE</span>CH</span>
            </div>
          </div>
      </div>
      <div class ="flex justify-center">
        <span class=" text-sm text-gray-700 text-center mt-10"> {{date('Y')}} &copy;  <span class="font-bold">SUD<span class="text-red-500">TE</span>CH</span> copy right resived.</span>
    </div>
  </body>
</html>
