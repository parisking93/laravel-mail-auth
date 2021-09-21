<template>
    <div class="container pt-5 ">
        <div class="card mt-5 rounded">
            <div class="card-body">
                <h3 class="card-title">{{post.title}}</h3>
                <h5 class="card-title" v-if="post.category">Categoria : {{post.category.name}}</h5>
                <p class="card-text">{{post.content}}</p>
                <div v-if="post.tags">
                    <h5>Tags</h5>
                    <span v-for="tag,index in post.tags" :key="index" class="badge badge-success mx-2">
                        {{tag.name}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name : 'Detail',
    data(){
        return {
            post : ''
        }
    },
    mounted() {
        this.getPost();
    },
    methods : {
        getPost() {
        axios.get('http://127.0.0.1:8000/api/post/' + this.$route.params.slug)
        .then(response => {
                this.post = response.data.results;
                console.log(this.post);
        });

        }
    }
}

</script>

<style lang="scss" scoped>

</style>