<template>
    <div>
        <div class="card" style="width: 100%">
            <img class="card-img-top" :src="'/images/products/'+info.photo_url" :alt="info.product_name">
            <div class="card-body">
                <h4>{{info.supplier_name}}</h4>
                <p class="card-text">{{info.product_name}}</p>
                <p>{{info.product_size}}</p>
                <p>{{info.product_price}}</p>
                <div v-if="admin">
                    <a :href="`/product/${info.id}/edit`" class="btn btn-secondary">Edit</a>
                    <button @click="deleteProduct(info.id)" class="btn btn-danger"><span id="save-d">Delete</span>
                        <div id="spin-d" class=" spinner-border spinner-border-sm d-none" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'Product',
    props:{
        info: Object,
        admin: Boolean
    },
    methods:{
        deleteProduct: function(id){
            let spinner = document.querySelector('#spin-d');
            let saveP = document.querySelector('#save-d');
            let confirmation = confirm('Are you sure to delete'+ this.info.product_name);
            if(confirmation){
                spinner.classList.remove('d-none');
                saveP.classList.add('d-none');
                axios.delete(`/product/${id}`)
                .then(response => {
                    this.$emit('success', response);
                    saveP.classList.remove('d-none');
                    spinner.classList.add('d-none');
                }).catch(err => {
                    this.$emit('error', err);
                    saveP.classList.remove('d-none');
                    spinner.classList.add('d-none');
                });
            }
           
        }
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