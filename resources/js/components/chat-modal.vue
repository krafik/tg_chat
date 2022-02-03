<template>
    <div class="modal-msg " tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-face mr-2">
                        <div class="flex avatar"
                             style="background-image: url('/asset/img/man-medium-light-skin-tone.svg');"></div>
                    </div>
                    <div class="modal-title" id="exampleModalLabel">
                        <div class="h3">Bot</div>
                        <div class="small">{{typing ? 'печатает...':'в сети'}}</div>
                    </div>
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

import answers from '../configs/answers.json';

export default {
    name: "chat-modal",
    components: {ChatTyping, Chat_item},
    props: {
        show: {type: Object, default: () => ({'chat': false, 'first': true})},
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

            let message = this.entryMsg;

            this.addMessage(message, 'user');
            this.entryMsg = "";

            window.setTimeout(() => {
                $('.msg:last', this.$refs.body).eq(0)[0].scrollIntoView({behavior: 'smooth', block: 'end'});
            }, 100);

            this.answer(message);
        },
        addMessage(text, target = 'manager') {
            let date = new Date();
            this.historyMessage.push({
                from: target,
                text: text,
                time: `${date.getHours()}: ${date.getMinutes()}`
            });
        },
        answer(message) {
            let result = [];

            _.forEach(answers, answer => {
                let reg = new RegExp(answer.regexp, 'ig');

                if (reg.test(message)) {
                    result.push(answer.answer);
                }
            });

            if (result.length === 0) {
                result.push('Моя твоя не понимать!))');
            }

            let result_text = result.join("\r\n");
            this.type(result_text, result_text.length / 4 * 200);
        },
        type(message, timer = 1000) {
            this.typing = true;

            let in_position = (this.$refs.body.scrollHeight - this.$refs.body.scrollTop - this.$refs.body.clientHeight) < 100;

            if (in_position) {
                window.setTimeout(() => {
                    $('.typing', this.$refs.body).eq(0)[0].scrollIntoView({behavior: 'smooth', block: 'end'});
                }, 100);
            }

            window.setTimeout(() => {
                this.typing = false;
                this.addMessage(message);

                let in_position = (this.$refs.body.scrollHeight - this.$refs.body.scrollTop - this.$refs.body.clientHeight) < 100;

                if (in_position) {
                    window.setTimeout(() => {
                        $('.msg:last', this.$refs.body).eq(0)[0].scrollIntoView({behavior: 'smooth', block: 'end'});
                    }, 100);
                }
            }, timer)
        },
    },
    watch: {
        'show.chat': function (n) {
            if (n && !this.show.first) {
                this.type('Hello');
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

.modal-body {
    position: relative;
    min-height: 230px;
}
</style>
