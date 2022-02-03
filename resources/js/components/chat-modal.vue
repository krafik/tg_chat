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
                    <button @click="$emit('clickEv', false)" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" ref="body">
                    <template v-for="(item, index) in historyMessage">
                        <chat_item :item="item" :key="index" :id="index"></chat_item>
                    </template>
                    <chat-typing v-if="typing"></chat-typing>
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
    import templates from "../templates.json";
    import ChatTyping from "./chat-typing";

    export default {
        name: "chat-modal",
        components: {ChatTyping, Chat_item},
        props: {
            show: {type: Object, default: ()=>({'chat': false, 'first': true})},
        },
        data: () => ({
            historyMessage: [],
            entryMsg: '',
            templates: null,
            typing: false
        }),
        methods: {
            addToHistory: function () {
                if (!this.entryMsg) {
                    return false;
                }

                this.addMessage('user', this.entryMsg);
                this.entryMsg = "";

                window.setTimeout(() => {
                    $('.msg:last', this.$refs.body).eq(0)[0].scrollIntoView({behavior: 'smooth', block: 'end'});
                }, 100);
            },
            addMessage(target = 'bot', text) {
                let date = new Date();
                this.historyMessage.push({
                    from: target,
                    text: text,
                    time: `${date.getHours()}: ${date.getMinutes()}`
                });
            },
            hello() {
                this.typing = true;
                window.setTimeout(() => {
                    this.typing = false;
                    this.addMessage('bot', 'Hello');
                }, 1000)
            }
        },
        watch: {
            'show.chat': function ( n) {
                if(n && !this.show.first){
                    this.hello();
                    this.show.first = true;
                    // // this.show.seccond = '2';
                    // Vue.set(this.show, 'seccond', 2)
                    // console.log(this.show)

                }
            }
        },
        beforeMount() {
            this.templates = templates;
        },
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
