<x-user.dashboard-layout title="Chat">
    <div class="container d-flex justify-content-center">
        <div class="card mt-5">

            <div class="d-flex justify-content-between p-3 adiv text-red">
                <i class="fas fa-chevron-left"></i>
                <span class="pd-3">Chat With {{ $receiver->name }}</span>
            </div>
            <div id="chat_area" class="text-red">

            </div>

            <div class="form-group px-3">
                <textarea id="message" name="message" class="form-control" cols="30" rows="10" placeholder="اكتب رسالتك"></textarea>
                <button id="send" class="btn btn-success my-2">ارسال</button>
            </div>
        </div>
        <!-- When there is no desire, all things are at peace. - Laozi -->
    </div>
    @push('scripts')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

        <script>
            $('#send').click(function() {

                $.ajax({
                    type: "POST",
                    url: "{{ $receiver->id }}",
                    data: {
                        message: $("#message").val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data, status) {
                        console.log("Data: " + data + "\nStatus: " + status);
                        let senderMessage = '' +
                            '<div class="d-flex justify-content-between p-3 text-blue">' +
                            // '<div class="chat ml-2 p-3 text-red>' +
                            $("#message").val() +
                            // '</div>'
                            '</div>';
                        $("#chat_area").append(senderMessage);
                    }
                })

            })
            
            Pusher.logToConsole = true;
    
    var pusher = new Pusher('1f53af7887f58e6f04b2', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('Chat' );
    channel.bind('Chat', function(data) {
        let receiverMessage = '' +
            '<div class="d-flex justify-content-between p-3 text-red">' +
            // '<div class="chat ml-2 p-3 text-red>' +
            JSON.stringify(data['message']) +
            // '</div>'
            '</div>';
        $("#chat_area").append(receiverMessage);
    }); 
        </script>
                {{-- <script>
                    // Enable pusher logging - don't include this in production
                </script> --}}
        {{-- <script>

            $('#send').click(function() {
                // var userType = "chat/{{ $receiver->id }}"
                console.log($("#message").val())
                $.post("{{ $receiver->id }}", {
                        // headers: {
                        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        // }
                        message: $("#message").val(),
                    },
                    function(data, status) {
                        console.log("Data: " + data + "\nStatus: " + status);
                        let senderMessage = ' ' +
                            '<div class="d-flex flex-row p-3">' +
                            '<div class="chat ml-2 p-3 bg-blue>' + $("#message").val() + '</div></div>';
                        $("#chat_area").append(senderMessage);
                    })
            })
        </script> --}}
    @endpush
</x-user.dashboard-layout>
