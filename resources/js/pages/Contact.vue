<template>
    <div class="container">
        <form class="w-75 mx-auto my-5" @submit.prevent="sendToForm">
            <div class="mb-3">
                <label for="client-name" class="form-label">Nome</label>
                <input v-model="name" type="text" name="name" class="form-control" id="client-name">
            </div>
            <div class="mb-3">
                <label for="client-mail" class="form-label">Inserisci la tua Email</label>
                <input v-model="email" type="email" class="form-control" name="email" id="client-mail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="messaggio" class="form-label">Example textarea</label>
                <textarea v-model="message" class="form-control" name="message" id="messaggio" rows="3"></textarea>
            </div>
                <button type="submit" class="btn btn-primary">Invia</button>
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
            message: ''
        }
    },
    methods : {
        sendToForm() {
            axios.post('/api/contacts', {
                'name' : this.name,
                'email': this.email,
                'message' : this.message
            })
                .then(response=>{
                    console.log(response);
                })
        }
    }

}

</script>

<style lang="scss" scoped>

</style>
