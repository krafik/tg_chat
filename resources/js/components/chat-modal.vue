<template>
    <div class="modal-msg " tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-face mr-2">
                        <div class="flex avatar"
                             style="background-image: url('/asset/img/man-medium-light-skin-tone.svg');"></div>
                    </div>
                    <h5 class="modal-title" id="exampleModalLabel">Bot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" ref="body">
                    <template v-for="(item, index) in historyMessage">
                        <chat_item :item="item" :key="index" :id="index"/>
                    </template>
                </div>
                <div class="modal-footer md-f">
                    <input type="text" class="form-control" placeholder="Введите текст" v-model.trim="entryMsg"
                           @keyup.enter="addToHistory">
                    <button @click="addToHistory" type="button" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import Chat_item from "./chat_modal/chat_item";

    export default {
        name: "chat-modal",
        components: {Chat_item},
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
                entryMsg: '',
            }
        },
        methods: {
            addToHistory: function () {
                if (!this.entryMsg) {
                    return false;
                }

                let date = new Date();
                this.historyMessage.push({
                    from: 'user',
                    text: this.entryMsg,
                    time: `${date.getHours()}: ${date.getMinutes()}`
                });
                this.entryMsg = "";

                window.setTimeout(() => {
                    $('.msg:last', this.$refs.body).eq(0)[0].scrollIntoView({behavior: 'smooth', block: 'end'});
                }, 100);
            }
        }
    }
</script>

<style scoped>
    .avatar {
        background-size: cover;
        background-position: 0 0;
        background-repeat: no-repeat;
        height: 30px;
        width: 30px;
    }
</style>
