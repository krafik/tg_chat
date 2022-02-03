<template>
    <div>
        <div class="typing">
            <template v-for="n in length">
                .
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        name: "chat-typing",
        data: () => ({
            length: 3
        }),
        mounted() {
            setInterval(() => {
                switch (this.length) {
                    case 3:
                        this.length = 1;
                        break;
                    case 2:
                        this.length = 3;
                        break;
                    case 1:
                        this.length = 2;
                        break;
                    default:
                        this.length = 3;
                        break;
                }
            }, 400)
        }
    }
</script>

<style scoped>
    .typing {
        width: 40px;
        float: right;
        border-radius: 5px;
        background-color: #ccc;
        line-height: 20px;
        padding-left: 10px;
    }
</style>
