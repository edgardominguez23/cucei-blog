<template>
    <div>
        <div class="card text-white bg-dark mb-3" v-for="post in posts" :key="post.title">
            <img class="card-img-top" :src="'/images/' + post.image"/>
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.content}}</p>
                <button class="btn btn-primary" v-on:click="postClick(post)">Resumen</button>
            </div>
        </div>
         <modal-post :post="postSelected"></modal-post>
    </div>
</template>
<script>
export default {
    methods:{
        postClick: function(p){
            this.postSelected = p;
        }
    },
      data: function () {
      return {
        postSelected: "",
        posts: [
            {
                title:"Titulo 1",
                image:"1622669223.png",
                content:"Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs."
            },
            {
                title:"Titulo 2",
                image:"1622669223.png",
                content:"Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs."
            },
            {
                title:"Titulo 3",
                image:"1622669223.png",
                content:"Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs."
            },
            {
                title:"Titulo 4",
                image:"1622669223.png",
                content:"Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs."
            },
            {
                title:"Titulo 5",
                image:"1622669223.png",
                content:"Next, we will create a fresh Vue application instance and attach it to the page. Then, you may begin adding components to this application or customize the JavaScript scaffolding to fit your unique needs."
            }
        ]
      };
    },
};
</script>
