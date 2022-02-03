<template>
    <div @click="$emit('clickEv')" class="chatbtn">
        <span class="flex items-">c</span>
    </div>
</template>

<script>
    export default {
        name: "chat-btn",

    }
</script>

<style scoped>
    .chatbtn {
        position: fixed;
        right: 100px;
        bottom: 100px;
        width: 100px;
        height: 100px;
        background: green;
        border-radius: 50%;
    }
    .chatbtn{
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        font-size: 50px;
        color: white;
    }
</style>
