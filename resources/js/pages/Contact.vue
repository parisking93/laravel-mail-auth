<template>
    <div class="container">
        <h2 class="text-center mt-5">Inviaci un'email</h2>
        <form class="w-75 mx-auto my-5" @submit.prevent="sendToForm">
            <div class="mb-3">
                <label for="client-name" class="form-label">Nome</label>
                <input v-model="name" type="text" name="name" class="form-control" id="client-name">
                <div class="alert alert-danger" v-for="error, index in errors.name" :key="index">{{error}}</div>
            </div>
            <div class="mb-3">
                <label for="client-mail" class="form-label">Inserisci la tua Email</label>
                <input v-model="email" type="email" class="form-control" name="email" id="client-mail" aria-describedby="emailHelp">
                <div class="alert alert-danger" v-for="error, index in errors.email" :key="index">{{error}}</div>

            </div>
            <div class="mb-3">
                <label for="messaggio" class="form-label">Example textarea</label>
                <textarea v-model="message" class="form-control" name="message" id="messaggio" rows="3"></textarea>
                <div class="alert alert-danger" v-for="error, index in errors.message" :key="index">{{error}}</div>

            </div>
                <button type="submit" class="btn btn-primary"> {{ (sending) ? 'invio in corso' : 'invia'}}</button>
        </form>
    </div>
</template>

<script>
export default {
    name : 'Contact',
    data() {
        return {
            name : '',
            email : '',
            message: '',
            errors : {},
            sending : false
        }
    },
    methods : {
        sendToForm() {
            // console.log(this.sending);
            this.sending = true;
            this.success = false;

            axios.post('/api/contacts', {
                'name': this.name,
                'email': this.email,
                'message': this.message
            })
                .then(response => {
                    // console.log(response);
                    // console.log(response.data);

                   if(!response.data.success){
                       this.errors = response.data.errors;
                       this.success = false;
                        this.sending = false;

                   } else {
                    this.success = true,
                    this.sending = false;
                    this.name ='',
                    this.email='',
                    this.message = ''
                    alert('Grazie per averci Contattato. La risposta arriverà a breve via email');
                   }
                })
                // .catch(error =>{
                //     console.log(error);
                // });
        }
    }

}

</script>

<style lang="scss" scoped>

</style>
