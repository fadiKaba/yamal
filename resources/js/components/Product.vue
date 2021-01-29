<template>
    <div>
        <div class="card" style="width: 100%">
            <img class="card-img-top" :src="'../images/products/'+info.photo_url" :alt="info.product_name">
            <div class="card-body">
                <h4>{{info.supplier_name}}</h4>
                <p class="card-text">{{info.product_name}}</p>
                <p>{{info.product_size}}</p>
                <p>{{info.product_price}}</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'Product',
    props:{
        info: Object,
    }
}
</script>
<style lang="scss" scoped>
    .card{
         p:nth-child(4){
             font-weight: 600;
             font-size: 1.3rem;
             font-style: italic;
         }
     }
</style>