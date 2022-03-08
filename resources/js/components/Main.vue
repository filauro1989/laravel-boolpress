<template>
    <div>Hello World</div>
</template>

<script>
export default {
    name: "Main",
    data() {
        return {
            posts: null,
        };
    },
    created() {
        this.getPosts("http://127.0.0.1:8000/api/posts");
    },
    methods: {
        getPosts(url) {
            Axios.get(url).then((result) => {
                this.posts = result.data.results.data;
            });
        },
    },
};
</script>

<style></style>
