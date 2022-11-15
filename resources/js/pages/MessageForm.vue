<template>
  <div>
    <form @submit.prevent='sendMessage()' class="d-flex flex-column col-6">
        <label for="name">Nome</label>
        <input type="text" v-model="name" name="name" id="name">

        <label for="surname">Cognome</label>
        <input type="text" v-model="surname" name="surname" id="surname">

        <label for="email">Email</label>
        <input type="email" v-model="email" name="email" id="email">


        <label for="title">Title</label>
        <input type="text" v-model="title" name="title" id="title">

        <label for="message_text">Messaggio</label>
        <textarea v-model="messaggio" name="message_text"  id="message_text"></textarea>
        <button type="submit">Invia</button>
    </form>
  </div>
</template>

<script>
export default {
    name: 'MessageForm',

    data(){
        return {
            name: '',
            surname: '',
            email: '',
            title: '',
            messaggio: '',
            status: '',
            idProfile: ''

        }
    },
    mounted(){
        this.getIdProfile();
    },

    methods: {


        sendMessage(){
            
            axios.post('/api/users/message/', {
                'name': this.name,
                'surname': this.surname,
                'title': this.title,
                'email': this.email,
                'message_text': this.messaggio,
                'user_id': this.idProfile
            }).then( param => {
               this.status = param.data.status
            })
        },

        getIdProfile(){

        let slug = this.$route.params.slug
        console.log(slug)

        axios.get('/api/users/' + slug )
      .then( response => {
        this.profile = response.data.resolve;
        this.idProfile = response.data.resolve.id
        console.log(this.idProfile) 
        console.log(this.profile) 
      })
        }

    }
}
</script>

<style>

</style>