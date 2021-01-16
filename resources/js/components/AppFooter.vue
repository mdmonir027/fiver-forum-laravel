<template>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <ul class="footer-list">
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Partnership</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>

                </div>
                <div class="col-md-6 text-right">

                    <ul class="footer-list social-media">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitch"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AppFooter"
    }
</script>


<style scoped>
    .footer {
        background: #fff;
        padding: 20px 0;
        color: #000;
        border-top: 1px solid #0002;
    }

    .footer-list {
        list-style: none;
    }

    .footer-list li {
        display: inline-block;
        margin-right: 15px;
    }

    .footer-list li:last-child {
        margin-right: 0;
    }

    .footer-list li a {
        color: #000;
    }

    .social-media li {
        font-size: 18px;

    }
</style>
