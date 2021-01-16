<template>
    <div>
        <div class="container py-5 px-3">

            <h1 class="h3">The Worst Advice To Give A Newbie (This Is For New Members)</h1>
            <span class="text-muted category">Fiverr tips</span>

            <div class="content p-3 mt-3">

                <single-post></single-post>

                <!-- comments -->
                <!--                <reply></reply>-->
                <!--                <hr class="mt-3">-->
                <!--                &lt;!&ndash;    add reply     &ndash;&gt;-->
                <!--                <add-reply></add-reply>-->
            </div>

        </div>

    </div>
</template>

<script>
    import SinglePost from "./SinglePost";

    export default {
        name: "Post",
        components: {SinglePost},

    }
</script>

<style scoped>

</style>
