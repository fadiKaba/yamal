<template>
    <div class="collection-container mt-3 mt-md-5">
      <h2 class="text-center"><span>Our Wonderful food</span></h2>
      <p class="pt-4 text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam, rerum. Lorem ipsum dolor, </p>
      <div class="mt-3 mt-md-5">

          <!-- admin add product form -->
          <div v-if="admin!=false">
                <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add new product
                        </button>
                    </div>
                </div>
                <div class="collapse mb-2" id="collapseExample">
                    <form class="border p-1 p-md-5" id='fp' enctype="multipart/form-data">
                         <div class="form-group">
                             <label for="supplier_id">Supplier</label>
                             <div class="d-flex">
                                <select required v-model="supplier_id" class="form-control" id="supplier_id" name="supplier_id">
                                     <option disable >Select supplier</option>
                                     <option v-for="sup in suppliers" :key="sup.id" :value="sup.id">{{sup.supplier_name}}</option>
                                </select>
                                <a href="/supplier" class="btn btn-primary ml-2" title="Add new supplier">+</a> 
                             </div>
                             
                             <small class="text-danger" v-if="validateErrors.supplier_id">{{validateErrors.supplier_id[0]}}</small>
                         </div>
                         <div class="form-group">
                             <label for="product_name">Product Name</label>
                             <input required v-model="product_name" class="form-control" type="text" name="product_name" id="product_name">
                             <small class="text-danger" v-if="validateErrors.product_name">{{validateErrors.product_name[0]}}</small>
                         </div>
                         <div class="form-group">
                             <label for="product_size">Size</label>
                             <input required v-model="product_size" class="form-control" type="text" name="product_size" id="product_size">
                             <small class="text-danger" v-if="validateErrors.product_size">{{validateErrors.product_size[0]}}</small>
                         </div>
                         <label for="product_price">Price</label>
                         <div class="input-group">
                             <input required v-model="product_price" class="form-control" type="number" step="0.01" name="product_price" id="product_price">
                             <div class="input-group-append">
                                <span class="input-group-text">$</span>
                                <span class="input-group-text">0.00</span>
                            </div>
                         </div>
                         <small class="text-danger" v-if="validateErrors.product_price">{{validateErrors.product_price[0]}}</small>
                         <div class="form-group mt-3">
                             <label for="product_photo">Image</label>
                             <input required class="form-control" type="file" name="product_photo" id="product_photo">
                             <small class="text-danger" v-if="validateErrors.product_photo">{{validateErrors.product_photo[0]}}</small>
                         </div>
                         <div>
                            <button @click.prevent="storeProduct()" type="submit" class="btn btn-success"><span id="save-p">Save</span> 
                                <div id="spin" class=" spinner-border spinner-border-sm d-none" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                         </div>                   
                    </form>          
                </div>
                <div v-if="error != ''" class="col-md-10">
                    <div class="alert alert-danger">{{error}}</div>
                </div>  
                <div v-if="success != ''" class="col-md-10">
                    <div class="alert alert-success">{{success}}</div>
                </div>
          </div>      
           <!-- end admin add product form -->
          <div class="row">
              <div v-for="prod in products" :key="prod.id" class="col-md-3 pb-2">
                  <transition name="component-fade" mode="out-in">
                  <Product @success="del($event)" :info="prod" :admin="admin"></Product>
                  </transition>
              </div>
          </div>
      </div>
    </div>
</template>
<script>

import Product from './Product';

export default {
    name: 'Collection',
    props:{
        admin: Boolean,
        user: [Object, Boolean]
    },
    components: {Product, },
    data: function(){
        return{
            suppliers: [],
            view:'Product',
            supplier_id:'Select supplier',
            product_name:'',
            product_size:'',
            product_price:'',
            success:'',
            error:'',
            validateErrors:{},
            products:[],
        }
    },
    mounted: function(){
       this.getProducts(1);
       this.getSuppliers();
    },
    methods:{
        getProducts: function(page){
            axios.get(`/product/?page=${page}`)
            .then(response => {
                response.data.data.forEach(item => {
                  let newProductn = this.createProductObject(
                      item.id, 
                      item.photo.photo_url, 
                      item.product_name, 
                      item.product_price, 
                      item.supplier.supplier_name,
                      item.product_size);
                  this.products.push(newProductn);    
                }); 
            }).catch(err => {
                if(err.response){
                    if(err.response.data){
                       this.error=err.response.data.message; 
                    }        
                    this.success = '';
                }else{
                    this.error = 'Somthing went wrong';
                } 
            });   
        },
        storeProduct: function(){
            // store new product function
            let spinner = document.querySelector('#spin');
            let saveP = document.querySelector('#save-p');
            spinner.classList.remove('d-none');
            saveP.classList.add('d-none');
            let form = document.querySelector('#fp');
            let data = new FormData(form);
            axios.post('/product', data)
            .then(response =>{
                let pr = response.data;
                this.products.unshift(
                    this.createProductObject(
                        pr.id,
                        pr.photo.photo_url, 
                        pr.product_name, 
                        pr.product_price, 
                        pr.supplier.supplier_name, 
                        pr.product_size)
                );
                this.error = '';
                this.validateErrors = {};
                saveP.classList.remove('d-none');
                spinner.classList.add('d-none');
                this.supplier_id = 'Select supplier';
                this.product_size = '';
                this.product_price = '';
                this.product_name = '';
                this.success = 'Saved successfully';
            })
            .catch(er =>{
                if(er.response){
                    this.success = '';
                    if(er.response.data.errors){
                    this.validateErrors = er.response.data.errors;
                    }else if(er.response.data.message){
                        this.validateErrors = {};
                        this.error = 'Somthing went wrong';
                    }  
                } 
                spinner.classList.add('d-none');
                saveP.classList.remove('d-none');
            });         
        },
        createProductObject: function(id, photo_url ,product_name, price, supplier_name, size){
             let product = {
                 id: id,
                 photo_url: photo_url,
                 product_name: product_name,
                 product_price: price,
                 supplier_name: supplier_name,
                 product_size: size   
             };
             return product;
        },
        del: function(e){
            this.success = 'Deleted';
            let ind = this.products.findIndex(item => item.id == e.data);
            this.products.splice(ind, 1);
            this.error = '';
            this.validateErrors = [];
        },
        getSuppliers: function(){
            axios.get('/sups')
            .then(response => {
                this.suppliers = response.data;
               // console.log(response);
            }).catch(err => {
                if(err.response){
                    this.error = err.response.data.message;
                }
            });
        }
    }

}
</script>
<style lang="scss" scoped>
 
 $color1: #308409;

 .collection-container{
     h2{
         font-size: 3.3rem;
         font-weight: 700;
         width: 100%;
         span{
             border-bottom: $color1 solid 5px;
         }
     }
 }


@media screen and (max-width:992px){
    .collection-container{
    h2{
        font-size: 2rem;
    }
    }
}
</style>