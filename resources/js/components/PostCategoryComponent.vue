<template>
    <div>
        <h1>{{category.title}}</h1>
        <div class="card text-white bg-dark mb-3" v-for="post in posts" :key="post.title">
            <img class="card-img-top" :src="'/images/' + post.image"/>
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.content}}</p>
                <button class="btn btn-primary" v-on:click="postClick(post)">Resumen</button>
                <router-link class="btn btn-success" :to="{name: 'detail', params: {id: post.id}}">Visualizar</router-link>
            </div>
        </div>
         <modal-post :post="postSelected"></modal-post>
    </div>
</template>
<script>
export default {
    created() {
        this.getPosts();
    },
    methods:{
        postClick: function(p){
            this.postSelected = p;
        },
        getPosts(){
            fetch('/api/post/' + this.$route.params.category_id + '/category').then(response => response.json())
            .then(json => 
            {
                this.posts = json.data.posts.data,
                this.category = json.data.category
            });
          /*  fetch('/api/post').then(function(response){
                return response.json();
            }).then(function(json){
                console.log(json.data.data);
            });*/
        }
    },
      data: function () {
      return {
        postSelected: "",
        posts: [],
        category: ""
      };
    }
};
</script>
