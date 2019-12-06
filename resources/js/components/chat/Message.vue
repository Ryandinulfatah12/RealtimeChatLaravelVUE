<template>
    <div>
        <div class="chat-lists">
        	<div class="messages" v-for="message in messages">
	        	<div class="users"> {{message.user.name}}
					<span class="time">{{message.created_at}}</span>
	        	</div>

                <div class="message">
                    {{message.subject}}
                </div>
        	</div>
        	
        	
        </div>
    </div>
</template>

<script>
    import Bus from '../../bus'
    export default {
        data() {
            return {
                messages: []
            }
        },

        mounted() {
            this.getMessage();

            Bus.$on('chat.sent', (newMessage) => {
                this.messages.push(newMessage)
                this.scrollToBottom()
            }).$on('chat.removed', (message) => {
                this.removeChat(message.id)
            })
        },
        methods: {
            getMessage() {
                axios.get('/messages').then(response =>{
                    this.messages = response.data.reverse()
                    this.scrollToBottom()
                });
            },

            removeChat(id) {
                this.messages = this.messages.filter((message) => {
                    return message.id !== id
                })
            },

            scrollToBottom() {
                setTimeout(function() {
                        let chatList = document.getElementsByClassName('chat-lists')[0]
                        chatList.scrollTop = chatList.scrollHeight
                    }, 1)
            }
        }
    }
</script>

<style lang="scss">
	.messages {
		margin-top: 7px;

		.time {
            font-weight: 800;
        }

        .message {
            font-size: 1.5rem;
        }

	}

    .chat-lists {
        max-height: 350px;
        overflow: scroll;
    }
</style>