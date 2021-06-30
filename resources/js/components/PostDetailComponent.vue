<template>
<div>
    <div v-if="post">
        <div class="card text-white bg-dark mt-3">
            <div class="card-header">
                <img class="card-img-top" :src="'/images/' + post.image.image"/>
            </div>
            <div class="card-body">
                <h1 class="card-title">{{post.title}}</h1>
                 <router-link class="btn btn-success" :to="{name: 'post-category', params: {category_id: post.category.id}}">{{post.category.title}}</router-link>
                <p class="card-text">{{post.content}}</p>
                <div v-if="post.tags">
                    <div v-for="tag in post.tags" :key="tag">
                        <h4><span class="badge bg-warning text-dark badge-lg">{{tag.title}}</span></h4>
                    </div>
                </div>
                <div v-if="post.archivos">
                    <div class="container py-0">
                        <div v-for="(archivo, index) in post.archivos" :key="index" xs12 md4>
                            <!--{{archivo.ruta.substr(7)}}-->
                            <!--LbNCNVVRYODFV0Kjqr3WWYZOmJcFQMJZZfrehrgd.png-->
                            <!--<img class="card-img-top" :src="'/storage/'+archivo.ruta.substr(7)"/>-->
                            <button class="btn btn-primary" v-on:click="downloadWithAxios('/storage/'+ archivo.ruta.substr(7) ,archivo.nombre_original)">{{ archivo.nombre_original }} Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <h1>El post no existe</h1>
    </div>
</div>
</template>
<script>
import axios from 'axios';
export default {
    created() {
       this.getPost();
    },
    methods:{
        getPost: function(){
            fetch('/api/post/' + this.$route.params.id).then(response => response.json())
            .then(json => this.post = json.data);
        },
        forceFileDownload(response, title) {
            console.log(title)
            const url = window.URL.createObjectURL(new Blob([response.data]))
            const link = document.createElement('a')
            link.href = url
            link.setAttribute('download', title)
            document.body.appendChild(link)
            link.click()
        },
        downloadWithAxios(url, title) {
            axios({
                method: 'get',
                url,
                responseType: 'arraybuffer',
            })
            .then((response) => {
                console.log(response)
                this.forceFileDownload(response, title)
            })
            .catch(() => console.log('error occured'))
        },
    },
      data: function () {
      return {
        postSelected: "",
        post: ""
      };
    },
};
</script>
