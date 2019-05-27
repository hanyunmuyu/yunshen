<template>

</template>

<script>
    import api from '../../../api'
    export default {
        name: "Community",
        mounted() {
            // if (this.$route.path.endsWith('/explore')) {
            //     this.active = 0;
            // } else if (this.$route.path.startsWith('/explore/recommend')) {
            //     this.active = 1;
            // } else if (this.$route.path.startsWith('/explore/attention')) {
            //     this.active = 2;
            // } else if (this.$route.path.startsWith('/explore/activity')) {
            //     this.active = 3;
            // }
            api.getSchoolCommunityList(this.$route.query.id).then((result) => {

            });
        },
    }
</script>

<style scoped>

</style>
