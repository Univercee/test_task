<template>
    <div class="d-flex justify-content-center container mt-2">
        <div class="mr-2 d-flex flex-column align-items-center">
            <img :src="product.main_image" class="card-img-top" alt="Product image" style="width:15rem">
            <div class="btn btn-primary mt-2 w-100" v-on:click="showProductList(product.id)">Back</div>
        </div>
        <div class="d-flex flex-column justify-content-between align-items-center">
            <div>
                <h3>{{product.name}}</h3>
                <p>Description: {{product.description}}</p>
                <p>Price: {{product.price}}$</p>
                <p>Created: {{product.created_at}}</p>
                <p>Main image: {{product.main_image}}</p>
                <p>Images: {{product.images ? product.images.join(', ') : "No images"}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Pagination from 'vue-pagination-2';
    export default {
        name: "Product",
        components: {
            Pagination
        },
        data(){
            return {
                product: {},
            }
        },
        mounted() {
            this.GET_PRODUCT()
        },
        methods: {
            async GET_PRODUCT(){
                await axios({
                    method: 'get',
                    url: 'api/products/'+this.$route.params.id,
                }).then((response)=>{
                    this.product = response.data
                });
            },
            showProductList(){
                this.$router.push({name:'product_list'})
            },
        }
    }
</script>
