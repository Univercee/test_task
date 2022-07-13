<template>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-4">
        <form @submit.prevent="CREATE_PRODUCT" class="d-flex flex-column justify-content-center" style="width:max-content">
            <div class="mb-2">
                <label for="name">Name: </label>
                <input type="text" name="name" v-model="name" class="ml-2 float-right" placeholder="Name">
            </div>
            <div class="mb-2">
                <label for="description">Description: </label>
                <textarea type="text" name="description" v-model="description" class="ml-2 float-right" placeholder="Description"></textarea>
            </div>
            <div class="mb-2">
                <label for="price">Price: </label>
                <input type="number" name="price" v-model="price" class="ml-2 float-right" placeholder="Price">
            </div>
            <div class="mb-2">
                <label for="main_image">Main image: </label>
                <input type="text" name="main_image" v-model="main_image" class="ml-2 float-right" placeholder="Main photo">
            </div>
            <div class="mb-2">
                <label for="images">Image: </label>
                <input type="text" name="images" v-model="images" class="ml-2 float-right" placeholder="Images (split by ';')">
            </div>
            <input type="submit" class="btn btn-primary" value="Create">
        </form>
        <router-link :to="{name:'product_list'}" class="mt-3" style="width:max-content">Back</router-link>
    </div>
</template>

<script>
    import Pagination from 'vue-pagination-2';
    export default {
        name: "ProductList",
        components: {
            Pagination
        },
        data(){
            return {
                name: "",
                description: "",
                price: 0,
                main_image: "",
                images: ""
            }
        },
        methods: {
            async CREATE_PRODUCT(e){
                await axios({
                    method: 'post',
                    url: 'api/products/create',
                    data: {
                        name: this.name,
                        description: this.description,
                        price: this.price,
                        main_image: this.main_image,
                        images: this.images.split(";")
                    }
                }).then((response)=>{
                    this.$router.push({name:'product', params:{id: response.data}})
                }).catch((err)=>{
                    let str = "Error\n"
                    for(e in err.response.data){
                        str += e+": "+err.response.data[e]+'\n'
                    }
                    alert(str)
                })
            },
        }
    }
</script>
