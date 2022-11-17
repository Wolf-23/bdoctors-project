<template>
  <div class="container-fluid eb_width">
    <h1 class="pt-5 ml-3">Scrivimi</h1>
    <form @submit.prevent='sendMessage'>
      <div class="d-flex flex-column col-6">
        <label for="name" class="mt-5 textGray">Nome</label>
        <input type="text" v-model="name" name="name" id="name">

        <label class="mt-3 textGray" for="surname">Cognome</label>
        <input type="text" v-model="surname" name="surname" id="surname">

        <label class="mt-3 textGray" for="email">Email</label>
        <input type="email" v-model="email" name="email" id="email">


        <label class="mt-3 textGray" for="title">Oggetto</label>
        <input type="text" v-model="title" name="title" id="title">

        <label class="mt-3 textGray" for="message_text">Messaggio</label>
        <textarea v-model="messaggio" name="message_text"  id="message_text" rows="6"></textarea>
      </div>  
        <button type="submit" :disabled="sending" class="btn btn-primary mt-3 ml-3 mb-5">Invia</button>
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
            idProfile: '',
            sending: false

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

<style scoped lang="scss">
   .eb_width{
      height: calc(100vh - 71px);
      overflow-y: auto;
      input, textarea{
        border-radius: 10px;
        outline-color: #3da9fc;
        border: none;
      }
      h1{
        color: #094067
      }
      .textGray{
        color:#5f6c7b;
      }
    }
</style>