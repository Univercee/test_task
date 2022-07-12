<template>
    <div>
        <button v-on:click="sortByCreatedAt">CreatedAt</button>
        <button v-on:click="sortByPrice">Price</button>
        <div v-for="product in products" :key="product.id" class="card">
            <p>{{product.name}}</p>
            <p>{{product.price}}</p>
            <p>{{product.main_image}}</p>
            <p>{{product.created_at}}</p>
            <router-link :to="{name: 'product', params:{id: product.id}}">Go to About</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProductList",
        data(){
            return {
                products: []
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
                }).then(response => this.products = response.data);
            },
            sortByCreatedAt(){
                this.products.sort(function(a, b) {
                    var x = a.created_at; 
                    var y = b.created_at;
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                });
            },
            sortByPrice(){
                this.products.sort(function(a, b) {
                    var x = a.price; 
                    var y = b.price;
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                });
            }
        }
    }
</script>
