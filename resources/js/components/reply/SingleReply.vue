<template>
    <div class="reply-content bg-white p-3">

        <div class="reply-header border-bottom d-flex justify-content-between">

            <div class="h5 text-muted d-block">looseink</div>
            <div class="">
                <span class="mr-1"><i class="fas fa-pencil-alt"></i></span>
                <span>9d</span>
            </div>

        </div>
        <div class="elabration my-3">

            <p>I have been on Fiverr for about 4 years.</p>
            <p>I have owned my own business for 20+ years.</p>
            <p>I also have 40+ years of experience in Media/Marketing.</p>
        </div>
        <div class="border-top pt-2 mt-4 d-flex justify-content-between align-items-center">

            <div class="h5 text-muted d-block">
                    <span class="mr-4 text-success reply-btn" @click="repliesToggle"> 2 replies
                        <i class="fas fa-angle-down" v-if="!replies"></i>
                        <i v-if="replies" class="fas fa-angle-up"></i>
                    </span>
                <span class="mr-1">90</span>
                <i class="far fa-heart mr-1"></i>
                <i class="fas fa-heart"></i>
            </div>
            <div class="">
                <span class="mr-1"><i class="fas fa-share"></i></span>
                <span>Share</span>
            </div>

        </div>
        <div class="replies" v-if="replies">
            <reply-reply></reply-reply>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SingleReply"
    }
</script>

<style scoped>

</style>
