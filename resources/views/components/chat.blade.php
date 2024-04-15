<div class="container d-flex justify-content-center">
    <div class="card mt-5">

        <div class="d-flex justify-content-between p-3 adiv text-red">
            <i class="fas fa-chevron-left"></i>
            <span class="pd-3">Chat With {{ $receiver->name ?? "Bad"}}</span>
        </div>
        <div class="chat_area">
            <div class="d-flex flex-row p-3">
                {{-- <img src="" alt="Image"> --}}
                <div class="chat ml-2 p-3 bg-blue" >Hello</div>
            </div>      
        </div>

        <div class="d-flex flex-row p-3">
            <div class="bg-white mr-2 p-3"><span class="text-muted">Thank you</span></div>
            {{-- <img src="" alt="Image" width="30" height="30"> --}}
        </div>
        <div class="form-group px-3">
            <textarea id="message" name="message" class="form-control" cols="30" rows="10" placeholder="اكتب رسالتك"></textarea>
            <button id="send" class="btn btn-success my-2">ارسال</button>
        </div>
    </div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
</div>

