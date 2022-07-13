<template>
    <div class="btn btn-secondary" v-on:click="checked?sortBy():reverseSortBy()">{{field}}</div>
</template>
<script>
    export default {
        name: "FilterButton",
        props: ['field', 'data'],
        data(){
            return{
                checked: false
            }
        },
        methods: {
            sortBy(){
                this.checked = !this.checked
                this.data.sort((a, b)=>{
                    var x = a[this.field]; 
                    var y = b[this.field];
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                });
                this.$emit('update:data', this.data)
            },
            reverseSortBy(){
                this.checked = !this.checked
                this.data.sort((a, b)=>{
                    var x = a[this.field]; 
                    var y = b[this.field];
                    return ((x > y) ? -1 : ((x < y) ? 1 : 0));
                });
                this.$emit('update:data', this.data)
            }
        }

    }
</script>