<template>
    <div class="d-flex flex-column justify-content-center container mt-2">
        <div class="d-flex flex-column align-items-center text-center my-2">
            <pagination v-model="page" :records="products.length" :per-page="products_per_page" @paginate="paginationCallback"/>
            <div class="w-100 d-flex align-items-end justify-content-between">
                <div class="btn btn-primary float-left" v-on:click="createProduct()">Create</div>
                <div class="float-right">
                    <div class="mt-1">Sort by</div>
                    <div>
                        <FilterButton :data="products" field="id" v-on:update:data="updateProducts($event)"></FilterButton>
                        <FilterButton :data="products" field="created_at" v-on:update:data="updateProducts($event)"></FilterButton>
                        <FilterButton :data="products" field="price" v-on:update:data="updateProducts($event)"></FilterButton>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-between">
            <div v-for="product in products_on_page" :key="product.id" class="card flex mb-4" style="width: 12rem;">
                <img :src="product.main_image" class="card-img-top" style="width:190px; height:190px" alt="Product image">
                <div class="card-body">
                    <h3>{{product.name}}</h3>
                    <p>Price: {{product.price}}$</p>
                    <p>Created: {{product.created_at}}</p>
                    <div class="btn btn-primary float-right" v-on:click="showProduct(product.id)">About</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Pagination from 'vue-pagination-2';
    import FilterButton from './FilterButton.vue';
    export default {
        name: "ProductList",
        components: {
            Pagination,
            FilterButton
        },
        data(){
            return {
                page: 1,
                products_per_page: 10,
                products: [],
                products_on_page: []
            }
        },
        mounted() {
            this.GET_PRODUCT_LIST()
        },
        methods: {
            async GET_PRODUCT_LIST(){
                await axios({
                    method: 'get',
                    url: 'api/products',
                }).then((response)=>{
                    this.products = response.data
                    this.paginationCallback()
                });
            },
            showProduct(id){
                this.$router.push({name:'product', params:{id: id}})
            },
            createProduct(id){
                this.$router.push({name:'create_product'})
            },
            updateProducts(products){
                console.log(products);
                this.products = products
                this.paginationCallback()
            },  
            paginationCallback(){
                let first = (this.page-1)*this.products_per_page
                let last = this.page*this.products_per_page
                this.products_on_page = this.products.slice(first, last)
            }
        }
    }
</script>
