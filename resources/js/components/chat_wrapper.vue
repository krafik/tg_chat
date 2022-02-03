<template>
    <div>
        <chat-btn @clickEv="clickEvent" v-show="!show.chat"></chat-btn>
        <chat-modal :show="show"  @clickEv="clickEvent" v-show="show.chat"></chat-modal>
    </div>
</template>

<script>
    import ChatModal from "./chat-modal";
    import ChatBtn from "./chat-btn";

    export default {
        name: "chat_wrapper",
        components: {ChatBtn, ChatModal},
        data: () => ({
            show: {
                chat: false,
                first: false
            }
        }),
        methods:{
            clickEvent(state = true){
                this.show.chat = state;
            }
        }
    }
</script>

<style scoped>

</style>
