<template>
    <div class="container-fluid">
        <div
            class="row row-cols-1 mt-3 row-cols-md-4 g-4 justify-content-center"
            v-if="post"
        >
            <div class="card">
                <img
                    :src="'/storage/' + post.image"
                    class="card-img-top"
                    :alt="post.title"
                />
                <div class="card-body">
                    <h3 class="card-title">{{ post.author }}</h3>
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{ post.content }}</p>
                </div>
            </div>
        </div>
        <div class="btn-container d-flex justify-content-center mt-3">
            <router-link
                class="btn btn-primary me-1"
                :to="{
                    name: 'home',
                }"
                >Back to Home</router-link
            >
            <router-link
                class="btn btn-primary ms-1"
                :to="{
                    name: 'posts',
                }"
                >Back to Posts</router-link
            >
        </div>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "Post",
    props: ["id"],
    data() {
        return {
            post: null,
        };
    },
    created() {
        const url = "http://127.0.0.1:8000/api/v1/posts/" + this.id;
        this.getPost(url);
    },
    methods: {
        getPost(url) {
            Axios.get(url).then((result) => {
                console.log(result);
                this.post = result.data.results.data;
            });
        },
    },
};
</script>

<style></style>
