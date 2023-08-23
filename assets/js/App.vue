// assets/js/App.vue
<script>
import axios from 'axios';
export default {
    methods: {
        onSubmit: function(e) {
            let formData = new FormData(e.target);
            axios.post('/api/submit-post-form', formData)
                .then((response) => {
                    console.log(response, typeof response.data.posts);
                    if (typeof response.data.posts !== 'undefined') {
                        this.$refs.post.innerHTML = response.data.posts; // posts list HTML
                    }
                })
        }
    },
    async mounted() {
        let {data} = await axios.get('/api/get-post-form');
        this.$refs.form.innerHTML = data.form; // form HTML
        this.$refs.post.innerHTML = data.posts; // posts list HTML
    }
}
</script>

<template>
    <div>
        <h2>New</h2>
        <div id="post-form-holder" ref="form" v-on:submit.prevent="onSubmit"></div>
        <div id="post-form-wrapper" ref="post"></div>
    </div>
</template>