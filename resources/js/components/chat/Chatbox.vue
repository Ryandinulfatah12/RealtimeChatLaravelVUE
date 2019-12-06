<template>
    <div>
        <div>
            <h3>Discuss Here Now!</h3>
            <chat-messages></chat-messages>
            <chat-form></chat-form> 
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
