<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form   method="post" action="index.php"  class=" content-center">
<div  class="   h-full space-y-10   p-6   shadow-xl rounded-xl border">
  <div class="space-y-2">

    <h1 class="font-semibold  text-2xl">Studi Kasus 1 </h1>
    <h1 class="text-gray-600  text-lg">Sistem Penentuan Kategori Pajak Penghasilan</h1>
  </div>
  <div class="space-y-3">
      <div>
        <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm lg:text-xl   font-medium mb-2">Salary</label>
        <div class="relative">
          <input  min="0"  required 
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
  <label for="tetap" class="font-semibold text-lg">Status</label>
  <div class="grid sm:grid-cols-2 gap-2">
  <label for="hs-radio-in-form" class="cursor-pointer hover:bg-gray-100 active:bg-gray-50 flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
    <input  required x-model="status" value="Pegawai Tetap" type="radio" name="status" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-radio-in-form">
    <span class="text-sm text-gray-500 ms-3">Pegawai Tetap</span>
  </label>

  <label for="hs-radio-checked-in-form" class="cursor-pointer hover:bg-gray-100 active:bg-gray-50    flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
    <input required x-model="status" value="Pegawai Kontra" type="radio" name="status" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-radio-checked-in-form" checked="">
    <span class="text-sm text-gray-500 ms-3">Pegawai Kontra</span>
  </label>
</div>
</div>
    <div class="space-y-3 md:flex md:space-y-0 md:space-x-4">

    <button   @click="!disabled() ? open=true : modalOpen = true  " name="submit" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal" type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Submit
      </button>
      <button name="reset"  x-on:click="salary ='', status='' " type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Reset
      </button>
    </div>
  

</div>
</form>
</body>
</html>