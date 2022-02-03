<template>
    <div v-if="item" :class="['msg', getUserType()]">
        <div class="header">{{item.from}}</div>
        <div class="body">{{item.text}}</div>
        <div class="time">{{item.time}}</div>
    </div>
</template>

<script>
    export default {
        name: "chat_item",
        props: {
            item: {
                type: Object,
                default: null
            }
        },
        methods: {
            getUserType() {
                return this.item.from === 'manager' ? 'bot' : 'user';
            }
        }
    }
</script>

<style lang="scss" scoped>
    .msg {
        padding: 5px;
        border-radius: 5px;
        margin: 5px 0;
        color: #fff;
        min-width: 80%;

        .time {
            font-size: 10px;
        }

        &.bot {
            background-color: #3679F7;
            align-self: flex-start;
        }

        &.user {
            background-color: #1595C2;
            align-self: flex-end;
        }
        .body {
            white-space: pre;
        }
    }
</style>
