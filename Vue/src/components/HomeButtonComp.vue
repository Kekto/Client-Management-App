<template>
    <el-button class="button" :disabled="this.disabled">
        <img v-if="this.image != null" class="image" :src="this.image" alt="">
        <div class="title">
            {{ this.title }}
        </div>
    </el-button>
</template>

<script>
export default {
    name: 'HomeButton',
    data() {
        return {

        }
    },
    props:{
        title: String,
        disabled: Boolean,
        image:String,
    },
    methods:{
    }
    }
</script>

<style scoped>

.button{
    width: 400px;
    height: 220px;
    background-color: #bde6dc;
    border-color: #9fd3c7;
    display: flex;
    align-self: center;  
    padding: 10px;
    font-size: 20px;
    --el-button-disabled-bg-color: #96c5b991;
    --el-button-disabled-text-color: white;
    color: white;
}
.button:hover{
    background-color: #9fd3c7;
    border-color: #9fd3c7;
    color: white;
}
.image {
    width: 400px;
    height: 220px;
    object-fit: cover;
    position: absolute;
    transform: translate(-50%,0%);
    filter: grayscale(100%);
    border-radius: 5px;
}
.title {
    position: absolute;
    transform: translate(-50%,0%);
    text-shadow: 2px 1px #030303;
}
.button:hover:not(:disabled) .image{
    filter: grayscale(0%);
    transform: translate(-50%,0%);
    animation-name: grayscaleHover;
    animation-duration: 0.3s;
}
.button:hover:not(:disabled) .title{
    opacity: 50%;
    animation-name: opacityTitle;
    animation-duration: 0.3s;
}

/* ANIMATIONS */
@keyframes grayscaleHover {
  from {filter: grayscale(100%);}
  to {filter: grayscale(0%)}
}

@keyframes opacityTitle {
  from {opacity: 100%;}
  to {opacity: 50%;}
}
</style>
  