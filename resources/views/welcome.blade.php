@include('partials.header')
<div class="bg-[url('{{ url('/img/bg-web-esp32.jpg') }}')] w-screen h-screen bg-no-repeat bg-cover flex text-white">
    <div class="flex w-2/12 p-2 justify-center items-center">
        <div class="flex flex-col gap-12">
            <div class="bg-white rounded-full flex justify-center items-center p-2">
                <svg class="w-10 h-10 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="bg-white rounded-full flex justify-center items-center p-2">
                <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="bg-white rounded-full flex justify-center items-center p-2">
                <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="bg-white rounded-full flex justify-center items-center p-2">
                <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z"
                        clip-rule="evenodd" />
                    <path d="M7.2 8.809H4V19.5h3.2V8.809Z" />
                </svg>

            </div>
        </div>
    </div>
    <div class="flex w-11/12 items-center justify-end gap-12 p-4 sm:p-12">
        <div class="flex ">
            <div class="flex flex-col gap-4">
                <h1 class="text-2xl sm:text-6xl text-right font-semibold">Explore the ESP32 <br> Advance Rich features</h1>
                <p class=" text-md sm:text-xl max-w-4xl text-right">The ESP32 is a powerful and versatile microcontroller known for its integrated Wi-Fi and Bluetooth
                  capabilities. </p>

                   <button class="ms-auto bg-white text-black text-xl px-8 py-3 rounded-3xl ">Get Started</button>
            </div>
        </div>

    </div>
</div>
@include('partials.footer')
