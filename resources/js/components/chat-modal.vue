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
                    <div v-for="item in historyMessage"
                         :class="{'msg-bot': item.from === 'manager', 'msg-user': item.from ==='user'}">
                        <div :class="{'msg-bot_header': item.from === 'manager', 'msg-user_header': item.from ==='user'}"
                             style="font-size: 10px">
                            {{item.from}}
                        </div>
                        <div :class="{'msg-bot_body': item.from === 'manager', 'msg-user_body': item.from ==='user'}">
                            hi, i'm a {{item.from}}
                        </div>

                        <div :class="{'msg-bot_time': item.from === 'manager', 'msg-user_time': item.from ==='user'}">
                            15:20
                        </div>
                    </div>

                </div>
                <div class="modal-footer md-f">
                    <input type="text" class="form-control" placeholder="Введите текст" v-model="msg">
                    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <button @click="addToHistory" type="button" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!--                    <div class="msg-bot">-->
    <!--                        <div class="msg-bot_body"> hi, i'm a bot</div>-->
    <!--                        <div class="msg-bot_time">15:20</div>-->
    <!--                    </div>-->
    <!--                    <div class="msg-user">-->
    <!--                        <div class="msg-user_body">-->
    <!--                            hi, i'm a user-->
    <!--                        </div>-->
    <!--                        <div class="msg-user_time">-->
    <!--                            15:21-->
    <!--                        </div>-->
    <!--                    </div>-->


</template>

<script>
    export default {
        name: "chat-modal",
        data() {
            return {
                historyMessage: [
                    {
                        from: 'user',
                        text: 'some text',
                        time: '15:23'
                    },
                    {
                        from: 'manager',
                        text: 'some text',
                        time: '15:23'
                    }
                ],
                msg: {}
            }
        },
        methods: {
            addToHistory: function () {
                console.log(this.msg)
                this.historyMessage.push(this.msg)
            }
        }
    }
</script>

<style scoped>

</style>