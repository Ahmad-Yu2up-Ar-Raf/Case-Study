<?php 
error_reporting(E_ERROR | E_PARSE);
$u =  (int)$_POST["harga"];
$x =  $_POST["member"];
$t = $_POST["submit2"];

$r = null;
$y = null;
$a = null;
$gajibersih = null; 
$pajak = null; 
$bonus = null; 

if(isset($t)){
  switch($x){
  case "Meanager" :
    $r = 700000000;
    break;
   case "Supervisor" :
    $r = 500000000;
 break;
   case "Staff" :
    $r = 300000000;
 break;
  }
  
if($r >= 500000000 ){
 $a = 15; 
}elseif($r < 500000000 && $r >  300000000){
    $a = 10; 
}elseif($r <=  300000000){
    $a = 3; 
};

if($u >= 200){
    $so = 20000;
    $bonus = ($u - 200) * $so;
    
}else{
    $bonus = 0;
}

$pajak = ($r * $a) / 100;
$gajibersih = $r - $pajak + $bonus;
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
  
    <script
  defer
  src="https://unpkg.com/alpinejs-money@latest/dist/money.min.js"
></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>


<div  x-data="{ modalOpen: false,  }" x-init=" setTimeout(() => {<?=$gajibersih?> == null ? modalOpen = false  : modalOpen = true}, 400)  "
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
            class="relative w-full py-8 bg-white px-7 sm:max-w-lg sm:rounded-lg">
            <div class="border-b  justify-between flex items-center  pb-3 mb-6">
            <div x-data="{                                      
    fallbackModalIsOpen: false,                    
    copiedToClipboard: false,                    
    share() {                        
        // check if web share API is available
        if (navigator.share) {                            
            navigator.share({                                
                title: document.title,                                
                text: 'Check out this site',                                
                url: window.location.href,                            
            })                        
        } else {                            
            this.fallbackModalIsOpen = true                        
        }                    
    },                    
    copyUrlToClipboard(url) {                        
        navigator.clipboard
        .writeText(url)                            
        .then(() => {                                
            this.copiedToClipboard = true                            
        })                            
        .catch((err) => {                                
            this.copiedToClipboard = false                            
        })                    
    },                
}">
    <button title="Share" x-on:click="share()" class="">
        <span class="sr-only">share</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="size-6">
            <path fill-rule="evenodd" d="M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z" clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Modal -->
    <div x-cloak x-show="fallbackModalIsOpen" class="fixed inset-0 z-100 flex items-end justify-center bg-black/30 p-4 pb-8 sm:items-center lg:p-8" role="dialog" aria-labelledby="sharetModalTitle" aria-modal="true" x-on:click.self="fallbackModalIsOpen = false" x-on:keydown.esc.window="fallbackModalIsOpen = false" x-transition.opacity.duration.200ms x-trap.inert.noscroll="fallbackModalIsOpen">    
        <div x-show="fallbackModalIsOpen" class="flex w-full max-w-lg flex-col gap-4 rounded-sm border border-neutral-300 overflow-hidden bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300" x-transition:enter="transition delay-100 duration-200 ease-out motion-reduce:transition-opacity" x-transition:enter-end="scale-100 opacity-100" x-transition:enter-start="scale-50 opacity-0">
            
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                <h3 id="sharetModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">Share</h3>
                <button aria-label="close modal" x-on:click="fallbackModalIsOpen = false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="size-5">
                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <!-- Dialog Body -->
            <div class="flex flex-col gap-8 px-4 py-8">
                <!-- Social Icons -->
                <div class="grid grid-cols-3 gap-6 px-4 sm:grid-cols-5 sm:gap-4">

                    <!-- X - Twitter -->
                    <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fwww.penguinui.com%2F&text=UI%20Components%20for%20Tailwind%20CSS%20and%20Alpine%20JS" class="flex flex-col items-center justify-center gap-1.5 text-white" target="_blank">
                        <div class="w-fits flex items-center justify-center size-10 rounded-full bg-black p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="size-5">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                            </svg>
                        </div>
                        <span class="whitespace-nowrap text-xs text-neutral-600 dark:text-neutral-300">X(Twitter)</span>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.penguinui.com%2F" class="flex flex-col items-center justify-center gap-1.5 text-white" target="_blank">
                        <div class="w-fits flex items-center justify-center size-10 rounded-full bg-blue-500 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="size-6">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>
                        </div>
                        <span class="whitespace-nowrap text-xs text-neutral-600 dark:text-neutral-300">Facebook</span>
                    </a>

                    <!-- Reddit -->
                    <a href="http://www.reddit.com/submit?url=https%3A%2F%2Fwww.penguinui.com%2F&title=UI%20Components%20for%20Tailwind%20CSS%20and%20Alpine%20JS" class="flex flex-col items-center justify-center gap-1.5 text-white" target="_blank">
                        <div class="w-fits flex items-center justify-center size-10 rounded-full bg-orange-600 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="size-7">
                                <path d="M6.167 8a.83.83 0 0 0-.83.83c0 .459.372.84.83.831a.831.831 0 0 0 0-1.661m1.843 3.647c.315 0 1.403-.038 1.976-.611a.23.23 0 0 0 0-.306.213.213 0 0 0-.306 0c-.353.363-1.126.487-1.67.487-.545 0-1.308-.124-1.671-.487a.213.213 0 0 0-.306 0 .213.213 0 0 0 0 .306c.564.563 1.652.61 1.977.61zm.992-2.807c0 .458.373.83.831.83s.83-.381.83-.83a.831.831 0 0 0-1.66 0z" />
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.828-1.165c-.315 0-.602.124-.812.325-.801-.573-1.9-.945-3.121-.993l.534-2.501 1.738.372a.83.83 0 1 0 .83-.869.83.83 0 0 0-.744.468l-1.938-.41a.2.2 0 0 0-.153.028.2.2 0 0 0-.086.134l-.592 2.788c-1.24.038-2.358.41-3.17.992-.21-.2-.496-.324-.81-.324a1.163 1.163 0 0 0-.478 2.224q-.03.17-.029.353c0 1.795 2.091 3.256 4.669 3.256s4.668-1.451 4.668-3.256c0-.114-.01-.238-.029-.353.401-.181.688-.592.688-1.069 0-.65-.525-1.165-1.165-1.165" />
                            </svg>
                        </div>
                        <span class="whitespace-nowrap text-xs text-neutral-600 dark:text-neutral-300">Reddit</span>
                    </a>

                    <!-- LinkedIn -->
                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fwww.penguinui.com%2F&title=UI%20Components%20for%20Tailwind%20CSS%20and%20Alpine%20JS" class="flex flex-col items-center justify-center gap-1.5 text-white" target="_blank">
                        <div class="w-fits flex items-center justify-center size-10 rounded-full bg-blue-700 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="size-5">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                            </svg>
                        </div>
                        <span class="whitespace-nowrap text-xs text-neutral-600 dark:text-neutral-300">Linkedin</span>
                    </a>

                    <!-- Email -->
                    <a href="mailto:?subject=Check out Penguin UI&body=Check out this cool UI components library http://www.penguinui.com." class="flex flex-col items-center justify-center gap-1.5" target="_blank">
                        <div class="w-fits flex items-center justify-center size-10 rounded-full bg-black dark:bg-white p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="size-6 fill-neutral-100 dark:fill-black">
                                <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                            </svg>
                        </div>
                        <span class="whitespace-nowrap text-xs text-neutral-600 dark:text-neutral-300">Email</span>
                    </a>
                </div>

                <!-- Copy -->
                <div class="relative px-2">
                    <label for="shareLink" class="sr-only">share link</label>
                    <input id="shareLink" type="text" class="w-full bg-neutral-50 border border-neutral-300 rounded-sm px-2.5 py-2 pr-10 text-sm text-neutral-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-950/50 dark:text-neutral-300 dark:focus-visible:outline-white" x-ref="shareUrl" x-bind:value="window.location.href" />
                    <button class="absolute right-5 top-1/2 -translate-y-1/2 rounded-full p-1 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:focus-visible:outline-white" x-on:click="copyUrlToClipboard($refs.shareUrl.value)" x-on:click.away="copiedToClipboard = false">
                        <span class="sr-only" x-text="copiedToClipboard ? 'copied' : 'copy the url to clipboard'"></span>
                        <svg x-cloak x-show="!copiedToClipboard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.5" class="size-5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                        </svg>
                        <svg x-cloak x-show="copiedToClipboard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.5" aria-hidden="true" class="size-5 stroke-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                        </svg>
                    </button> 
                </div>
            </div>
        </div>
    </div>
</div> 


                <h3 class="text-2xl font-semibold">Slip Gaji Karyawan</h3>
             


                  <button  @click="modalOpen=false"  class="  flex items-center justify-center  text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                      <svg class="size-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
                  </button>
      
            </div>
            <div x-data="{            
    copiedToClipboard: false,            
    copyToClipboard() {                
        navigator.clipboard                    
        .writeText($refs.targetText.textContent)                    
        .then(() => {                        
            this.copiedToClipboard = true                    
        })                    
        .catch((err) => {                        
            this.copiedToClipboard = false                    
        })            
    },        
}" class="">

    <div x-ref="targetText" class="w-full pb-4 mt-10  space-y-4   whitespace-normal">
    <div class="border-b border-dashed flex flex-col gap-4 pb-4">


    <div class="flex gap-3">
        <h1 class="font-medium">JABATAN</h1>
        :
        <h1><?=$x ?></h1>
    </div>
    <div class="flex gap-3">
        <h1 class="font-medium">GAJI POKOK</h1>
        :
        <h1   x-money.id-ID.IDR ="<?=$r?>" ></h1>
    </div>
    <div class="flex gap-3">
        <h1 class="font-medium" >Pajak</h1>
        :
        <h1  x-money.id-ID.IDR ="<?=$pajak?>"></h1>
    </div>
    <div class="flex gap-3 ">
        <h1 class="font-medium">Bonus</h1>
        :
        <h1 x-money.id-ID.IDR ="<?=$bonus?>"></h1>
    </div>
</div>
    <div class="flex gap-3">
        <h1 class="font-medium">GAJI BERSIH</h1>
        :
        <h1 x-money.id-ID.IDR ="<?=$gajibersih?>"></h1>
    </div>

    </div>
    
    <button class="text-gray-500 w-full flex justify-end"  title="Copy" aria-label="Copy" x-on:click="copyToClipboard()" x-on:click.away="copiedToClipboard = false">
        <span class="sr-only" x-text="copiedToClipboard ? 'copied' : 'copy the response to clipboard'"></span>
        <svg x-show="!copiedToClipboard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" aria-hidden="true">
            <path fill-rule="evenodd" d="M13.887 3.182c.396.037.79.08 1.183.128C16.194 3.45 17 4.414 17 5.517V16.75A2.25 2.25 0 0 1 14.75 19h-9.5A2.25 2.25 0 0 1 3 16.75V5.517c0-1.103.806-2.068 1.93-2.207.393-.048.787-.09 1.183-.128A3.001 3.001 0 0 1 9 1h2c1.373 0 2.531.923 2.887 2.182ZM7.5 4A1.5 1.5 0 0 1 9 2.5h2A1.5 1.5 0 0 1 12.5 4v.5h-5V4Z" clip-rule="evenodd"/>
        </svg>
        <svg x-show="copiedToClipboard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5 fill-green-500">
            <path fill-rule="evenodd" d="M11.986 3H12a2 2 0 0 1 2 2v6a2 2 0 0 1-1.5 1.937V7A2.5 2.5 0 0 0 10 4.5H4.063A2 2 0 0 1 6 3h.014A2.25 2.25 0 0 1 8.25 1h1.5a2.25 2.25 0 0 1 2.236 2ZM10.5 4v-.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75V4h3Z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm6.585 1.08a.75.75 0 0 1 .336 1.005l-1.75 3.5a.75.75 0 0 1-1.16.234l-1.75-1.5a.75.75 0 0 1 .977-1.139l1.02.875 1.321-2.64a.75.75 0 0 1 1.006-.336Z" clip-rule="evenodd"/>
        </svg>
    </button>

</div>

        </div>
    </div>
  </template>
  
  </div>

    <section class="min-h-screen  content-center">


    <div class="max-w-lg m-auto">


<div  x-data="{ salary: '', open: false, status: '',       disabled() {
            return this.salary.trim() !== '' && this.status.trim() !== '' ;
        },
        
        
        }"  class="relative" x-cloak>
        <form   method="post" action="pertemuan2.php"  class=" content-center">
<div  class="   h-full space-y-10   p-6   shadow-xl rounded-lg border">
<div class="space-y-2">

    <h1 class="font-semibold  text-2xl">Pertemuan 2 </h1>
    <h1 class="text-gray-600  text-lg">Sistem Perhitungan Gaji Karyawan</h1>
  </div>
  <div class="space-y-3">
      <div>
        <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm lg:text-xl   font-medium mb-2">Jam Kerja</label>
        <div class="relative">
          <input  min="0"  required 
          step="0.01" x-model="salary"  type="number" id="hs-input-with-leading-and-trailing-icon" name="harga" class="py-3 px-4 ps-11 pe-16 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="000">
          <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3">
            <span class="text-gray-500">
                <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20 13C20 17.4183 16.4183 21 12 21C7.58172 21 4 17.4183 4 13C4 8.58172 7.58172 5 12 5C16.4183 5 20 8.58172 20 13Z" stroke="#7a7a7a" stroke-width="null" stroke-linejoin="round" class="my-path"></path>
<path d="M12 9V13L15 16" stroke="#7a7a7a" stroke-width="null" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
<path d="M3 5.12132L5.10714 3" stroke="#7a7a7a" stroke-width="null" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
<path d="M20.9978 5.12669L18.8906 3.00537" stroke="#7a7a7a" stroke-width="null" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
</svg></span>
          </div>
          <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
            <span class="text-gray-500">JAM</span>
          </div>
        </div>
        <span class="text-sm text-red-500"  x-show="open">*Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum, molestias.</span>
      </div>
    </div>
<div class="flex flex-col gap-y-4">
  <label for="tetap" class="font-semibold text-lg">Jabatan</label>

<form action="pertemuan2.php" method="post" class="flex flex-col  gap-y-3">
   

        <label class="flex items-start  p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
            <input x-model='status' type="radio" name="member" value="Meanager" class="text-gray-900 translate-y-px focus:ring-gray-700" />
            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                <span  class="font-semibold">Menager</span>
                <span  class="text-sm opacity-50">Keanggotaan premium dengan akses penuh ke semua fitur eksklusif, diskon spesial, dan layanan prioritas.</span>
            </span>
        </label>
        <label  class="flex my-2 items-start p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
            <input x-model='status' type="radio" name="member" value="Supervisor" class="text-gray-900 translate-y-px focus:ring-gray-700" />
            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                <span  class="font-semibold">Supervisor</span>
                <span  class="text-sm opacity-50">Keanggotaan menengah dengan akses terbatas ke fitur eksklusif dan beberapa keuntungan spesial.</span>
            </span>
        </label>
        <label  class="flex items-start p-5 space-x-3 bg-white border rounded-md shadow-sm hover:bg-gray-50 border-neutral-200/70">
            <input x-model='status' type="radio" name="member" value="Staff" class="text-gray-900 translate-y-px focus:ring-gray-700" />
            <span class="relative flex flex-col text-left space-y-1.5 leading-none">
                <span  class="font-semibold">Staff</span>
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
        </section>
</body>
</html>