<?php 

error_reporting(E_ERROR | E_PARSE);
$x = $_POST["gaji"] ;
$q = $_POST["tetap"] ;
$y = $_POST["submit"];

$result = null;
$gajibersih = null;

$status = null;

$pajak = null;




$r = $_POST["reset"];



if(isset($r)){
  
$result = null;
$gajibersih = null;

$status = null;

$pajak = null;
}






if(isset($y)){

  if($x >= 15000000){
    $result = $x * 0.2;
    $pajak = "20";
  }elseif($x >=  10000000 && $x <  15000000){
    $result = $x * 0.15;
    $pajak = "15";
  }elseif($x >=  5000000 && $x <  10000000){
    $result = $x * 0.1;
    $pajak = "10";
  }else{
     $result = $x * 0.05;
     $pajak = "5";
  } 
 $gajibersih = $x -  $result;
 if($q == "y" || $q == "iya"){

   $result = $result * 0.05;
   $status = "Tetap";
 }else{
  $status = "Tidak Tetap";
 };

}
 
 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>



  <form method="post" action="index.php"  class="min-h-screen content-center">
<div  x-data="{ salary: '', open: true}" class=" m-auto max-w-xl h-full space-y-10 p-14 shadow-xl rounded-lg border">
  <div class="space-y-5">
    <div class="size-20 m-auto">

      <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 486 512.171"><path fill="#FF8985" d="M307.513 178.485c10.489 2.516 12.642-.236 22.415-6.327 6.014-3.749 12.457-7.732 19.29-10.036 4.609-1.561 20.698-2.616 36.004-2.928 17.418-.391 34.717 1.094 36.473 4.607 1.367 2.696 2.227 6.171 1.915 10.037-.234 3.086-1.211 6.403-3.202 9.762-4.569 7.693-12.809 13.394-20.619 18.745-7.927 5.427-15.191 10.426-13.981 14.175.079.312.86.975 2.031 1.912 1.717 1.368 4.217 2.968 6.835 4.571 10.503 6.404 18.704 13.199 25.656 21.204 9.525 10.99 17.073 24.744 22.842 38.113 3.462 7.931 4.038 10.291 6.038 17.819.66 2.484 1.439 4.483 2.358 5.924 1.392 2.197 2.115 1.717 4.299 1.717 3.199 0 6.327.015 9.525-.116 7.811-.547 12.184-.82 16.755 10.896 3.161 8.12 4.215 19.445 3.747 30.731-.508 12.145-2.732 24.524-5.974 32.998-1.171 5.583-3.711 10.035-7.654 13.316-7.802 6.411-16.018 5.739-25.188 5.739-3.983 0-7.459-.156-10.035-.234-2.461-.078-2.968-.429-3.281-.273-.468.234.117.273-.547 1.134-6.428 8.866-14.701 16.727-22.65 24.248a285.048 285.048 0 01-13.549 11.989c-3.788 3.125-5.623 4.647-5.701 5.117-.35 2.01 15.311 37.456 16.771 40.725 1.716 3.845 3.912 7.949 4.59 12.154 1.955 12.083-8.564 15.739-18.707 14.951H361.05c-4.608.312-8.982-.663-13.081-3.007-8.131-4.632-11.21-10.492-14.761-18.431-3.242-7.186-7.225-16.128-10.467-14.84-22.335 8.708-44.164 13.901-67.79 14.684-23.353.781-48.345-2.735-77.203-11.481-8.279-1.171-9.958 2.341-12.614 7.887-.742 1.563-1.522 3.242-2.615 5.312-.663 1.365-.899 1.912-1.173 2.421-3.827 8.162-7.496 16.048-18.938 18.353l-1.249.118-42.957-.313c-2.615-.195-4.92-.781-6.949-1.876-2.344-1.209-4.14-2.966-5.43-5.31-3.43-6.258-1.672-11.14.605-15.921.926-1.952 1.865-3.878 2.781-5.884l12.391-27.11c.902-1.972 3.101-6.124 3.508-7.954.212-.95.239-1.808.085-2.565-.351-1.679-1.6-3.32-3.671-4.92a185.667 185.667 0 01-8.63-6.522c-2.89-2.303-5.622-4.686-8.278-7.108-8.787-8.042-16.91-17.494-23.861-27.88-6.677-9.959-12.301-20.815-16.362-32.139-3.078-8.628-5.269-17.48-6.391-26.372a8.497 8.497 0 01-2.136-.693c-18.067-8.696-28.22-23.282-32.846-40.067-5.459-19.795-2.978-42.594 3.171-61.857 1.406-4.44 6.149-6.898 10.589-5.492l11.982 3.827a8.446 8.446 0 015.459 10.621c-3.952 12.325-6.341 27.327-3.913 40.517 1.33 7.23 4.167 13.91 9.11 19.175 3.609-17.86 10.98-34.548 21.025-49.547 54.88-81.709 157.953-92.511 247.072-78.296z"/><path fill="#BC5050" d="M375.577 285.405a20.266 20.266 0 0120.307 20.305 20.265 20.265 0 01-20.307 20.307c-11.195 0-20.267-9.072-20.267-20.268 0-11.197 9.048-20.344 20.267-20.344zm-214.522-27.471c-6.652 2.291-13.905-1.245-16.196-7.898-2.291-6.652 1.245-13.905 7.897-16.196 26.032-9.004 52.391-13.203 78.993-13.051 26.529.15 53.207 4.603 79.957 12.903 6.735 2.069 10.517 9.209 8.447 15.944-2.069 6.735-9.209 10.517-15.944 8.447-24.475-7.594-48.691-11.665-72.56-11.801-23.794-.135-47.352 3.613-70.594 11.652z"/><path fill="#FAC900" d="M232.43 0c66.164 0 119.8 53.636 119.8 119.8 0 66.164-53.636 119.8-119.8 119.8-66.163 0-119.799-53.636-119.799-119.8C112.631 53.636 166.267 0 232.43 0z"/><path fill="#D49000" d="M232.43 25.137c52.281 0 94.663 42.382 94.663 94.663s-42.382 94.663-94.663 94.663-94.663-42.382-94.663-94.663 42.382-94.663 94.663-94.663z"/><path fill="#FBD746" fill-rule="nonzero" d="M185.816 149.014v-12.831l23.078-34.572h-23.078V87.115h42.738v12.83l-23.075 34.572h23.075v14.497h-42.738zm65.904.379l-.792-.048a77.01 77.01 0 01-5.165-.499 110.237 110.237 0 01-4.873-.748 53.361 53.361 0 01-4.498-1.001v-12.83c1.888.167 3.931.307 6.122.416a269.532 269.532 0 0012.955.334c1.833 0 3.36-.141 4.581-.417 1.219-.277 2.139-.721 2.749-1.332.612-.611.916-1.445.916-2.499v-1.001c0-1.222-.433-2.139-1.29-2.748-.863-.61-1.876-.917-3.042-.917h-4.415c-6.439 0-11.332-1.417-14.661-4.248-3.335-2.831-4.999-7.582-4.999-14.245v-2.751c0-6.108 1.831-10.68 5.499-13.705 2.736-2.259 6.375-3.677 10.913-4.248v-6.539h8.997v6.355a64.6 64.6 0 013.291.267c2.305.248 4.47.558 6.499.918 2.024.359 3.846.735 5.455 1.124v12.83a200.05 200.05 0 00-8.622-.543 203.28 203.28 0 00-8.707-.207c-1.554 0-2.943.112-4.165.333-1.219.222-2.164.665-2.831 1.332-.667.667-1.001 1.64-1.001 2.917v.833c0 1.386.444 2.446 1.332 3.165.889.722 2.25 1.084 4.084 1.084h5.498c3.887 0 7.123.737 9.705 2.207 2.581 1.472 4.526 3.472 5.831 5.999 1.306 2.526 1.958 5.403 1.958 8.622v2.748c0 5.275-.914 9.304-2.748 12.082-1.834 2.776-4.446 4.65-7.832 5.621-2.279.653-4.863 1.089-7.747 1.303v7.154h-8.997v-7.118z"/></svg>
    </div>
    <h1 class="font-bold  text-center text-xl">Sistem Penentuan Kategori <br/> Pajak Penghasilan</h1>
  </div>
  <div class="space-y-3">
      <div>
        <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm lg:text-xl   font-medium mb-2">Salary</label>
        <div class="relative">
          <input  min="0" required
          step="0.01" x-model="salary"  type="number" id="hs-input-with-leading-and-trailing-icon" name="gaji" class="py-3 px-4 ps-9 pe-16 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="0.000.000">
          <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-2">
            <span class="text-gray-500">Rp</span>
          </div>
          <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
            <span class="text-gray-500">IDR</span>
          </div>
        </div>
        <span class="text-sm text-red-500"  x-show="open">*Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum, molestias.</span>
      </div>
    </div>
<div class="flex flex-col gap-y-4">
  <label for="tetap" class="font-semibold text-lg">Pegawai Tetap</label>
  <input type="text" required name="tetap" placeholder="y/n" class="rounded-lg border-gray-300">
</div>
    <div class="space-y-3 md:flex md:space-y-0 md:space-x-4">

    <button name="submit" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal" type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Submit
      </button>
      <button name="reset"  x-on:click="salary =''  " type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Reset
      </button>
    </div>
    <?php if(!is_null($result) &&  !is_null($result) && !is_null($result)  && !is_null($result) ){ ?> 
      <div class=" space-y-10">

        <h1 class="font-bold  text-center text-xl">Rincian Pajak</h1>
      <div class="grid grid-cols-3 gap-12 text-center">

   
        
        <div class="flex flex-col">
    <h1 class="font-semibold ">Gaji Bulanan</h1>
          <h1><?=$x ?> JT</h1>
        </div>
        <div class="flex flex-col">
    <h1 class="font-semibold ">Potongan Pajak</h1>
          <h1><?=$result ?> JT</h1>
        </div>
        <div class="flex- flex-col ">
<h1 class="font-semibold ">Gaji Bersih</h1>
    <h1><?=$gajibersih ?> JT</h1>
        </div>
<div class="flex- flex-col ">
<h1 class="font-semibold ">Status</h1>
  <h1><?=$status ?> </h1>
</div>
<div class="flex- flex-col ">
<h1 class="font-semibold ">Pajak</h1>
    <h1><?=$pajak?>%</h1>
</div>
      </div>
    <?php } ?>
      </div>
</div>
</form>

    <script src="../node_modules/preline/dist/preline.js"></script>
</body>
</html>