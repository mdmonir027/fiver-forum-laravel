<template>
    <div class="topic-minimum d-flex justify-content-start my-2 align-items-center">

        <user></user>

        <div class="topic-details">
            <router-link to="/post" class="h4 title">Any story behind your profile picture?</router-link>
            <p class="text m-0">Was wondering if any Fiverr users have an interesting backstory for their profile pic,
                such as being taken in an exotic or unusual location</p>
            <ul class="counters m-0 p-0">
                <li>1 like</li>
                <li>1 reply</li>
                <li>1 share</li>
                <li>1 view</li>
            </ul>
        </div>

    </div>
</template>

<script>
    import User from "../inc/User";

    export default {
        name: "PostMinimum",
        components: {User}
    }
</script>

<style scoped>

    .topic-details .title {
        color: #333333;
        text-decoration: none;
    }

    .topic-details .text {
        font-size: 14px;
    }

    .topic-details .title:hover {
        color: #007bff;
    }

    .counters {
        display: flex;
        list-style: none;
    }

    .counters li {
        margin-right: 10px;
        color: #00B22D;
    }

    .counters li:last-child {
        margin-right: 0;
    }

</style>
