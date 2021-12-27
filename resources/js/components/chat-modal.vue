<template>
    <div class="modal-msg " tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-face mr-2"><img src="asset/img/man-medium-light-skin-tone.svg"
                                                      alt=""></div>
                    <h5 class="modal-title" id="exampleModalLabel">Bot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="msg-bot">
                        <div class="msg-bot_body"> hi, i'm a bot</div>
                        <div class="msg-bot_time">15:20</div>
                    </div>
                    <div class="msg-user">
                        <div class="msg-user_body">
                            hi, i'm a user
                        </div>
                        <div class="msg-user_time">
                            15:21
                        </div>
                    </div>
                    <div class="msg-bot">
                        <div class="msg-bot_body"> hi, i'm a bot</div>
                        <div class="msg-bot_time">15:22</div>
                    </div>
                    <div class="msg-user">
                        <div class="msg-user_body">
                            hi, i'm a user
                        </div>
                        <div class="msg-user_time">
                            15:23
                        </div>
                    </div>

                    <div class="msg-bot">
                        <div class="msg-bot_body"> hi, i'm a bot</div>
                        <div class="msg-bot_time">15:24</div>
                    </div>
                    <div class="msg-user">
                        <div class="msg-user_body">
                            hi, i'm a user
                        </div>
                        <div class="msg-user_time">
                            15:25
                        </div>
                    </div>

                </div>
                <div class="modal-footer md-f">
                    <input type="text" class="form-control" placeholder="Введите текст">
                    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <button type="button" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "chat-modal"
    }
</script>

<style scoped>

</style>