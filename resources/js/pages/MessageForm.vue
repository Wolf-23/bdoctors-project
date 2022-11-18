<template>
  <div class="container-fluid eb_width">
    <h1 class="pt-5 text-center">Scrivimi</h1>
    <div v-if="status" class="alert alert-success">
        <i class="fa-solid  fa-circle-check"></i> Grazie di averci contattato! Il Dottore risponderà entro 48 ore!
    </div>
    <form @submit.prevent='sendMessage'>
      <div class="d-flex flex-column col-6 m-auto">
        <label for="name" class="mt-5 textGray font-weight-bold">Nome</label>
        <input type="text" :class="errors.name?'is-invalid':''" v-model="name" name="name" id="name">
        <div v-for="(error, index) in errors.name" :key="index" class="invalid-feedback">
            {{error}}
        </div>

        <label class="mt-3 textGray font-weight-bold" for="surname">Cognome</label>
        <input type="text" :class="errors.surname?'is-invalid':''" v-model="surname" name="surname" id="surname">
        <div v-for="(error, index) in errors.surname" :key="index" class="invalid-feedback">
            {{error}}
        </div>

        <label class="mt-3 textGray font-weight-bold" for="email">Email</label>
        <input type="email" :class="errors.email?'is-invalid':''" v-model="email" name="email" id="email">
        <div v-for="(error, index) in errors.email" :key="index" class="invalid-feedback">
            {{error}}
        </div>


        <label class="mt-3 textGray font-weight-bold" for="title">Oggetto</label>
        <input type="text" :class="errors.title?'is-invalid':''" v-model="title" name="title" id="title">
        <div v-for="(error, index) in errors.title" :key="index" class="invalid-feedback">
            {{error}}
        </div>

        <label class="mt-3 textGray font-weight-bold" for="message_text">Messaggio</label>
        <textarea v-model="messaggio" :class="errors.message_text?'is-invalid':''" name="message_text"  id="message_text" rows="6"></textarea>
        <div v-for="(error, index) in errors.message_text" :key="index" class="invalid-feedback">
            {{error}}
        </div>
      </div>  
      <div class="d-flex justify-content-center">
        <button type="submit" :disabled="sending" class="btn btn-primary mt-3 p-2 mb-5">Invia</button>
        <router-link :to="{name: 'single-profile'}" class="btn btn-primary mt-3 p-2 mb-5 ml-2">Torna al profilo</router-link>
      </div>
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
            status: false,
            idProfile: '',
            sending: false,
            errors: {}

        }
    },
    mounted(){
        this.getIdProfile();
    },

    methods: {


        sendMessage(){
            this.sending = true;
            axios.post('/api/users/message/', {
                'name': this.name,
                'surname': this.surname,
                'title': this.title,
                'email': this.email,
                'message_text': this.messaggio,
                'user_id': this.idProfile
            }).then( param => {
               this.status = param.data.status
               this.sending = false
               if(this.status){
                    this.errors = {};
                    this.name = '';
                    this.surname = '';
                    this.title = '';
                    this.email = '';
                    this.messaggio = '';
                    this.user_id = '';
               }else{
                  this.errors = param.data.errors;
               }
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