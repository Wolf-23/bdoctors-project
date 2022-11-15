<template>
  <div>
    <form class="d-flex flex-column col-6" @submit.prevent = 'sendMessage()'>
    <label for="name">Nome</label>
    <input type="text" name="name" id="name">

    <label for="surname">Cognome</label>
    <input type="text" name="surname" id="surname">

    <label for="title">Tolo</label>
    <input type="text" name="title" id="title">

    <label for="message_text">Messaggio</label>
    <textarea name="message_text" id="message_text"></textarea>
    <button type="submit">Invia</button>

    </form>
  </div>
</template>

<script>
export default {
    name: 'MessageForm'
}
</script>

<style>

</style>