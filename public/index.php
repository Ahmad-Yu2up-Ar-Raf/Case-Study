<?php 

error_reporting(E_ERROR | E_PARSE);

$test = $_POST["gaji"];

$x =  (int)$test;
$q = $_POST["status"] ;
$y = $_POST["submit"];
// $t = $_POST["close"];


$result = null;
$gajibersih = null;
$status = '';
$pajak = null;



$r = $_POST["reset"];









if(isset($y)){


  if($x >= 15000000){
    $pajak = 20;
    $result = ($x * $pajak) / 100;
  }elseif($x >  10000000 && $x <  15000000){
    $pajak = 15;
    $result = ($x * $pajak) / 100;
  }elseif($x >  5000000 && $x <=  10000000){
    $pajak = 10;
    $result = ($x * $pajak) / 100;
  }else{
    $pajak = 5;
    $result = ($x * $pajak) / 100;
  } 
 
 if($q === "Pegawai Tetap"){
 $pajak += 5;
          $result = ($x * $pajak) / 100;
 }
 
$status = $q; 

$gajibersih = $x -  $result;





}
 
 

// if(isset($_POST["close"])){

// $result = null;
// $gajibersih = null;
// $status = '';
// $pajak = null;


// }


// member 


$JenisMember = null; 
$TotalBelanja = null;
$Diskon = null;
$Potongan = null;
$TotalBayar = null; 

$harga = (int)$_POST["harga"];
$member = $_POST["member"];
$close2 = $_POST["close2"];
$submit2 = $_POST["submit2"];


if(isset($submit2)){
  if($member == "Member Gold" ){

      if($harga >= 1500000){
        $Diskon = 20;
      }elseif($harga >=  1000000 &&  $harga < 1500000){
        $Diskon = 15;
      }elseif($harga < 1000000  ){
        $Diskon = 10;
      }
    } elseif($member=="Member Silver" ) {
      if($harga >= 1500000){
        $Diskon = 15;
      }elseif($harga >=  1000000 &&  $harga < 1500000){
        $Diskon = 10;
      }elseif($harga < 1000000  ){
        $Diskon = 5;
      }
    }else {

   if($harga >= 1500000){
 
     $Diskon = 5;
   }elseif($harga >=  1000000 &&  $harga < 1500000){
     $Diskon = 3;
   }else{
     $Diskon = "None";
   }
 }
 $JenisMember = $member;
 $TotalBelanja = $harga;
 $Potongan = ($harga * $Diskon) / 100;
 $TotalBayar = $harga - $Potongan;

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
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body >

    
<div  x-data="{ modalOpen: false }" x-init=" setTimeout(() => {<?=$gajibersih?> == null ? modalOpen = false  : modalOpen = true}, 400)  "
@keydown.escape.window="modalOpen = false">

  <template x-teleport="body">
  
    <div x-show="modalOpen"   class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen">
        <div
        x-show="modalOpen" 
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
        <div 
        x-show="modalOpen"
                x-trap.inert.noscroll="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
            <div class="border-b  flex items-center justify-between pb-3 mb-6">
                <h3 class="text-2xl font-semibold">Rincian Pajak</h3>
             


                  <button  @click="modalOpen=false"  class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
                  </button>
      
            </div>
            <div class="flex flex-col gap-3">

              <div class="flex  gap-x-3">
  <h1 class="font-semibold ">Gaji Bulanan:</h1>
        <h1>Rp <?=$x ?> JT</h1>
      </div>
              <div class="flex  gap-x-3">
  <h1 class="font-semibold ">Status:</h1>
        <h1><?=$status ?> </h1>
      </div>
              <div class="flex  gap-x-3">
  <h1 class="font-semibold ">Pajak:</h1>
        <h1><?=$pajak ?>%</h1>
      </div>
              <div class="flex  gap-x-3">
  <h1 class="font-semibold ">Potongan Pajak:</h1>
        <h1>Rp <?=$result ?> JT</h1>
      </div>
              <div class="flex  gap-x-3">
  <h1 class="font-semibold ">Gaji Bersih:</h1>
        <h1>Rp <?=$gajibersih ?> JT</h1>
      </div>
            </div>
        </div>
    </div>
  </template>
  
  </div>
<div
    x-data="{
        tabSelected: 1,
        tabId: $id('tabs'),
        tabButtonClicked(tabButton){
            this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
            this.tabRepositionMarker(tabButton);
        },
        tabRepositionMarker(tabButton){
            this.$refs.tabMarker.style.width=tabButton.offsetWidth + 'px';
            this.$refs.tabMarker.style.height=tabButton.offsetHeight + 'px';
            this.$refs.tabMarker.style.left=tabButton.offsetLeft + 'px';
        },
        tabContentActive(tabContent){
            return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
        },
        tabButtonActive(tabContent){
            const tabId = tabContent.id.split('-').slice(-1);
            return this.tabSelected == tabId;
        }
    }"
    
    x-init="tabRepositionMarker($refs.tabButtons.firstElementChild);" class="relative w-full pt-20 content-center min-h-screen max-w-xl  m-auto">
    
    <div x-ref="tabButtons" class="relative inline-grid items-center justify-center w-full h-10 grid-cols-2 p-1 text-gray-500 bg-white border border-gray-100 rounded-lg select-none">
        <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" :class="{ 'bg-gray-100 text-gray-700' : tabButtonActive($el) }" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Studi Kasus 1</button>
        <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" :class="{ 'bg-gray-100 text-gray-700' : tabButtonActive($el) }" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Studi Kasus 2</button>
        
        <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out" x-cloak><div class="w-full h-full bg-gray-100 rounded-md shadow-sm"></div></div>
    </div>

        
        <div :id="$id(tabId + '-content')" x-data="{ salary: '', open: false, status: '',       disabled() {
            return this.salary.trim() !== '' && this.status.trim() !== '' ;
        },
        
        
        }" x-show="tabContentActive($el)" class="relative mt-3">
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
        </div>

        <div :id="$id(tabId + '-content')" x-data="{ salary: '', open: false, status: '',       disabled() {
            return this.salary.trim() !== '' && this.status.trim() !== '' ;
        },
        
        
        }" x-show="tabContentActive($el)" class="relative" x-cloak>
        <form   method="post" action="index.php"  class=" content-center">
<div  class="   h-full space-y-10   p-6   shadow-xl rounded-lg border">
<div class="space-y-2">

    <h1 class="font-semibold  text-2xl">Studi Kasus 2 </h1>
    <h1 class="text-gray-600  text-lg">Sistem Penentuan Diskon Berdasarkan Jenis Member dan Total Belanja</h1>
  </div>
  <div class="space-y-3">
      <div>
        <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm lg:text-xl   font-medium mb-2">Belanja</label>
        <div class="relative">
          <input  min="0"  required 
          step="0.01" x-model="salary"  type="number" id="hs-input-with-leading-and-trailing-icon" name="harga" class="py-3 px-4 ps-9 pe-16 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="0.000.000">
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

<form action="index.php" method="post" class="flex flex-col  gap-y-3">
   

        <label class="flex items-start  p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
            <input x-model='status' type="radio" name="member" value="Member Gold" class="text-gray-900 translate-y-px focus:ring-gray-700" />
            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                <span  class="font-semibold">Member Gold</span>
                <span  class="text-sm opacity-50">Keanggotaan premium dengan akses penuh ke semua fitur eksklusif, diskon spesial, dan layanan prioritas.</span>
            </span>
        </label>
        <label  class="flex my-2 items-start p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
            <input x-model='status' type="radio" name="member" value="Member Silver" class="text-gray-900 translate-y-px focus:ring-gray-700" />
            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                <span  class="font-semibold">Member Silver</span>
                <span  class="text-sm opacity-50">Keanggotaan menengah dengan akses terbatas ke fitur eksklusif dan beberapa keuntungan spesial.</span>
            </span>
        </label>
        <label  class="flex items-start p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
            <input x-model='status' type="radio" name="member" value="Non-Member" class="text-gray-900 translate-y-px focus:ring-gray-700" />
            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                <span  class="font-semibold">Non-Member</span>
                <span  class="text-sm opacity-50">Pengguna tanpa keanggotaan yang hanya memiliki akses ke fitur dasar tanpa manfaat tambahan.</span>
            </span>
        </label>
    
    </form>

</div>
    <div class="space-y-3 md:flex md:space-y-0 md:space-x-4">

    <button id="hs-run-on-click-run-confetti"  @click="!disabled() ? open=true : modalOpen = true  " name="submit2" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal" type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Submit
      </button>
      <button name="reset"  x-on:click="salary ='', status='' " type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        Reset
      </button>
    </div>
   

</div>
</form>
        </div>

 

</div>

<div x-data="{ modalOpen: false }"      
    @keydown.escape.window="modalOpen = false"
    class="relative z-50 w-auto h-auto"> 
   

 <template x-teleport="body" x-init=" setTimeout(() => {<?=$TotalBayar?> == null ? modalOpen = false  : modalOpen = true}, 400)  ">


  
   <div x-show="modalOpen"  class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen">
       <div
       x-show="modalOpen" 
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
           @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
       <div 
       x-show="modalOpen"
                x-trap.inert.noscroll="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
           class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
           <div class="border-b  flex items-center justify-between pb-3 mb-6">
               <h3 class="text-2xl font-semibold">Rincian Pembelian</h3>
             


                 <button  @click="modalOpen=false"  type="submit"  class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                     <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
                 </button>
        
           </div>
           <div class="flex flex-col gap-3">

             <div class="flex  gap-x-3">
 <h1 class="font-semibold ">Jenis member:</h1>
       <h1><?=$JenisMember ?> </h1>
     </div>
             <div class="flex  gap-x-3">
 <h1 class="font-semibold ">total Belanja:</h1>
       <h1>Rp<?=$TotalBelanja ?> </h1>
     </div>
             <div class="flex  gap-x-3">
 <h1 class="font-semibold ">Diskon:</h1>
       <h1><?=$Diskon ?>%</h1>
     </div>
             <div class="flex  gap-x-3">
 <h1 class="font-semibold ">Potongan:</h1>
       <h1>Rp <?=$Potongan ?> </h1>
     </div>
             <div class="flex  gap-x-3">
 <h1 class="font-semibold ">Total Bayar:</h1>
       <h1>Rp <?=$TotalBayar ?> </h1>
     </div>
           </div>
       </div>
   </div>
   </template>
</div>
    <script src="../node_modules/preline/dist/preline.js"></script>
   
    <script src="../node_modules/canvas-confetti/dist/confetti.browser.js"></script>
    <script>


let x = <?=$gajibersih?>



if(x !== null ){

  (function() {
 
  
 
  setTimeout(() => {
  
  confetti({
    particleCount: 100,
    spread: 70,
    origin: {
      y: 0.6
    }
  });
  }, 400)

  
  })();
}

    </script>
    <script>
       let q = <?=$Potongan?>

if(q !== null ){

(function() {



setTimeout(() => {

confetti({
 particleCount: 100,
 spread: 70,
 origin: {
   y: 0.6
 }
});
}, 400)


})();
}
    </script>
</body>
</html>
