<template>
    <div>
        <p> test tg component</p>
        <p>info about bot</p>
        <div class="flex">
<!--            <pre>{{infoBot}}</pre>-->
            <pre>{{updates}}</pre>
        </div>

        <button @click="getMe">getInfo</button>
        <button @click="getUpdate">getUpdate</button>
        <button @click="setMyCommand">setMyCommand</button>
        <button @click="getMyCommands">getMyCommand</button>
        <button @click="unswer">unswer</button>
    </div>
</template>

<script>
    export default {
        name: "test-tg",
        data() {
            return {
                tgApi: 'https://api.telegram.org',
                token: '5030298765:AAEEfMBVVWa1ooINKP2HB0cLZiFIsLZj2Xk',
                http: 'https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/getMe',
                infoBot: [],
                updates: null,
                chat_id: [],
                commands: [{"command": "a", "description": "sey hello"}, {"command": "b", "description": "sey bie"}]
            }
        },
        methods: {
            getMe: function () {
                axios.get(`${this.tgApi}/bot${this.token}/getMe`).then((t) => {
                    // this.infoBot = t
                    console.log(t)
                })
            },
            getUpdate: function () {
                axios.get(`https://api.telegram.org/bot${this.token}/getUpdates?offset=-1`).then((t) => {
                    this.updates = t.result
                    this.chat_id = t.result['0'].message.chat.id
                    console.log(t.result.message.chat.id)
                    console.log(typeof(this.updates))
                })
            },
            getUpdateSec: function () {
                axios.get(`https://api.telegram.org/bot${this.token}/getUpdates?timeout=120&offset=-1`).then((t) => {
                    this.updates = t.result['0']
                    this.chat_id = t.result['0'].message.chat.id
                    console.log(t)
                })
            },
            unswer: function () {
                // console.log(this.updates)
                this.updates.message.text === 'some' ?
                    axios.get(`${this.tgApi}/bot${this.token}/sendMessage?chat_id=${this.chat_id}&text=${this.updates.message.text}&parse_mode=HTML`)
                    : axios.get(`${this.tgApi}/bot${this.token}/sendMessage?chat_id=${this.chat_id}&text=Я вас не понял`)
            },
            setMyCommand: function () {
                let i = JSON.stringify(this.commands)
                console.log(i)
                axios.get(`${this.tgApi}/bot${this.token}/setMyCommands?commands=${i}`).then((t) => {
                    console.log(t)
                })

            },
            getMyCommands: function () {
                axios.get(`${this.tgApi}/bot${this.token}/getMyCommands`).then((t) => {
                    console.log(t)
                })
            },
            createChat: function () {
                // messages.createChat
                axios.get(`${this.tgApi}/bot${this.token}/messages.createChat`).then((t) => {
                    console.log(t)
                })
            }

        }
    }
</script>

<style scoped>
    .flex {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
    }
</style>