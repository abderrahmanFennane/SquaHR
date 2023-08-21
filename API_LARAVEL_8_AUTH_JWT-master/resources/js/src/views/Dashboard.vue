<template>
    <div class="test">
        <!-- <Header2 /> -->
        <div></div>
        <div id="main" class="main">
            <div class="pagetitle">
                <!-- <nav> -->
            </div>
            <!-- End Page Title -->
            <section class="section dashboard">
                <div class="row">
                    <!-- Left side columns -->
                    <div :class="[ (  isHiddenAddSe  )  ? 'col-lg-9' : 'col-lg-12']">
                        <!-- tables  -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                                <h2 style="caption-side: top;color: white; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; 
                                                    font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">
                                                    <strong>Products
                                                        <button v-on:click="isHiddenAddSe = !isHiddenAddSe; this.resetForm()" type="button" :class="isHiddenAddSe ? 'btn btn-danger' : 'btn btn-primary' ">
                                                            <!-- <font-awesome-icon :icon="isHiddenAddSe ? 'minus' : 'plus'" /> -->
                                                            <i :class="isHiddenAddSe ? 'bi bi-dash-lg' : 'bi bi-plus'" ></i>
                                                        </button></strong>
                                                    </h2>
                                            <table class="table datatable datatable-table" id="data">
    
                                                <thead :style="{textAlign: center}">
                                                    <tr>
                                                        <th scope="col">name</th>
                                                        <th scope="col">description</th>
                                                        <th scope="col">type</th>
                                                        <th scope="col">size</th>
                                                        <th scope="col">cost</th>
                                                        <th scope="col">price</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody v-if="products">
                                                    <tr v-for="(rev, index) in products" :key="index">
                                                        <td>{{ rev.name }}</td>
                                                        <td>{{ rev.description }}</td>
                                                        
                                                        <td v-if="rev.type.name">{{ rev.type.name }}</td> 
                                                        <td v-else></td> 
                                                        <td>{{ rev.size }}</td>
                                                        <td>{{ rev.cost }}$</td>
                                                        <td>{{ rev.price }}$</td>
                                                        <td>
                                                            <a href="#">
                                                                <button @click="edit_product(rev.id)" type="button" class="btn btn-primary">
                                                                    <!-- <font-awesome-icon icon="pen" /> -->
                                                                    <i class="bi bi-pencil-fill" ></i>

                                                                </button>
                                                            </a>
                                                            &nbsp;&nbsp;
                                                            <a href="#" style="color: red" @click="delete_product(rev.id)">
                                                                <button type="button" class="btn btn-danger">
                                                                    <!-- <font-awesome-icon icon="trash" /> -->
                                                                    <i class="bi bi-trash" ></i>

                                                                    
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody v-else>
                                                    <tr>
                                                        <td colspan="7" class="text-center">No data</td>
                                                    </tr>
                                                </tbody>            
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End tables  -->
                    </div><!-- End Left side columns -->
    
                    <!-- Right side columns -->
                    <div class="col-lg-3">
                        <!-- add type -->
                        <div v-if="isHiddenAddtype" class="card">
                            <div class="card-body">
                                <form class="row g-3"  v-bind:key="index" @submit.prevent="add_update_Type()">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" required v-model="name">
                                            <label for="floatingName">Type</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end add type -->
                        <!-- add se -->
                        <div v-if="isHiddenAddSe" class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <h5 class="card-title">{{ Editproducts ? 'Edit' : 'Add' }} a product : </h5>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-4 text-end">
                                        <button v-on:click="isHiddenAddtype = !isHiddenAddtype;" type="button" :class="isHiddenAddtype ? 'btn btn-danger' : 'btn btn-primary' ">
                                            Type <i :class="isHiddenAddtype ? 'bi bi-dash-lg' : 'bi bi-plus'" ></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <form class="row g-3"  v-bind:key="index" @submit.prevent="add_update_product()">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select" v-model="typeId" aria-label="Default select example">
                                                <option disabled value="">Type</option>
                                                <option v-for="(se, index) in types" :key="index" :value="se.id">{{ se.name }}</option>
    
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" required v-model="name">
                                            <label for="floatingName">Product name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" required v-model="description"></textarea>
                                            <label for="floatingName">Description</label>
                                        </div>
                                    </div>
    
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" required v-model="size">
                                            <label for="floatingName">Size</label></div>
                                    </div>
    
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" required v-model="cost">
                                            <label for="floatingName">Cost</label></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" required v-model="price">
                                            <label for="floatingName">Price</label></div>
                                    </div>
    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{ Editproducts ? 'Update' : 'Submit' }}</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form><!-- End No Labels Form -->
                            </div>
                        </div>
                        <!-- End Ajouter -->
                    </div>
                    <!-- End Right side columns -->
                </div>
            </section>
            <!-- End #main -->
        </div>
    </div>
    </template>
    
    <script>
    // @ is an alias to /src
    import axios from 'axios'
    // import swall from 'swall'
    import swal from 'sweetalert2';

    // import $ from 'jquery'; 
    import $ from 'jquery'; 

    export default {
      // eslint-disable-next-line vue/multi-word-component-names
        name: 'Sous_Ensembles',
        components:{
            // eslint-disable-next-line vue/no-unused-components
            
            // ComponentWithMap
        },
        data() {
            return {
                    isHiddenAddSe: false,
                    isHiddenAddtype: false,
                    products : [],
                    Editproducts: [],
                    idProduct: "",
                    name: "",
                    description: "",
                    typeId: "",
                    size: "",
                    cost: "",
                    price: "",
            }
        },
        created(){
            this.show_products();
        },
        methods: {
            add_update_Type(){
                var link = 'http://localhost:8000/api/types';
                axios.post(link,{
                    name: this.name
                })
                .then((response)=>{
                    console.log(response.data);
                    this.show_products();}
                )
                .catch(  console.log('err') )
            },
            add_update_product() {
                if (this.Editproducts) {
                    var updateUrl = "http://localhost:8000/api/main/" + this.Editproducts[0][0].id;
                    axios.patch(updateUrl, { 
                        name: this.name,
                        description: this.description,
                        typeId: this.typeId,
                        size: this.size,
                        cost: this.cost,
                        price: this.price})
                    .then(response => {
                        console.log('Product updated:', response.data);
                        this.show_products();
                        this.resetForm();
                    })
                    .catch(error => {
                        console.error('Update error:', error);
                    });
                } else {
                        var link = 'http://localhost:8000/api/main';
                        axios.post(link,{
                                    name: this.name,
                                    description: this.description,
                                    typeId: this.typeId,
                                    size: this.size,
                                    cost: this.cost,
                                    price: this.price,
                        })
                        .then(this.show_products)
                        .catch(  console.log('err') )
                }
            },
    
            resetForm() {
                this.typeId = '';
                this.name = '';
                this.description = '';
                this.size = '';
                this.cost = '';
                this.price = '';
                this.Editproducts = null;
                // this.isHiddenAddSe = false;
            },
    
            // addproduct() {
            //     var link = 'http://localhost:8000/api/main';
            //     axios.post(link,{
            //                 name: this.name,
            //                 description: this.description,
            //                 typeId: this.typeId,
            //                 size: this.size,
            //                 cost: this.cost,
            //                 price: this.price,
            //     })
            //     .then(this.show_products)
            //     .catch(  console.log('err') )
            // },
            edit_product(id){
                var page = "http://localhost:8000/api/main/"+id;
                axios.get(page)
                .then((response)=>{
                    console.log('this is SE ggg ',response.data);
                    this.Editproducts = response.data;
                    console.log('vEditproducts',this.Editproducts);
    
                    this.typeId = this.Editproducts[0][0].type.id;
                    this.name = this.Editproducts[0][0].name;
                    this.description = this.Editproducts[0][0].description;
                    this.size = this.Editproducts[0][0].size;
                    this.cost = this.Editproducts[0][0].cost;
                    this.price = this.Editproducts[0][0].price;
    
                    this.isHiddenAddSe = true;
                })
                .catch(err =>err)
            },
            show_products(){
                var page = "http://localhost:8000/api/main";
                axios.get(page)
                .then((response)=>{
                this.products = response.data[0];
                this.types = response.data[1];
                setTimeout(function(){
                    $('#data').DataTable(
                        {
                            pagingType: 'full_numbers',
                            pageLength: 5,
                            ordering: true,
                            processing: true,
                            dom: 'lfrtip',
                        }
                    );
                    },
                        1000
                        );
                })
            },
            delete_product(id) {
                swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this item?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    position: 'center',
                    customClass: {            
                        container: 'position-absolute'
                    },
                }).then(result => {
                    if (result.value) {
                        var link = 'http://localhost:8000/api/main/' + id;
                        axios.delete(link)
                        .then(() => {
                            swal.fire({
                                position: 'center',
                                title: 'Well deleted',
                                text: 'The item has been successfully deleted', 
                                icon: 'success',
                                customClass: {                     
                                    container: 'position-absolute',
                                }
                            });
                            this.show_products();
                        })
                        .catch(err => {
                            console.error('Error deleting item:', err);
                        });
                    }
                });
            }
    
        },
    }
    </script>
    <style>
    body {
        margin: 20px;
        line-height: 3;
        font-family: sans-serif;
    
    }
    
    div {
        position: relative;
    }
    
    * {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    
    .ul li {
        margin-left: 15px;
        position: relative;
        padding-left: 5px;
    }
    
    .ul li::before {
        content: " ";
        position: absolute;
        width: 1px;
        background-color: #000;
        top: 5px;
        bottom: -12px;
        left: -10px;
    }
    
    body>ul>li:first-child::before {
        top: 12px;
    }
    
    .ul li:not(:first-child):last-child::before {
        display: none;
    }
    
    .ul li:only-child::before {
        display: list-item;
        content: " ";
        position: absolute;
        width: 1px;
        background-color: #000;
        top: 5px;
        bottom: 7px;
        height: 7px;
        left: -10px;
    }
    
    .ul li::after {
        content: " ";
        position: absolute;
        left: -10px;
        width: 10px;
        height: 1px;
        background-color: #000;
        top: 12px;
    }
    
    #map {
        height: 600px;
    }
    .dataTables_paginate .paginate_button {
        color: white;
        background-color: black; /* Set the background color you want */
        border: 1px solid white; /* Add a white border */
    }
    
    /* Change color of active pagination control */
    .dataTables_paginate .paginate_button.current {
        color: black; /* Set text color for the active page */
        background-color: white; /* Set background color for the active page */
        border: 1px solid black; /* Add a black border */
    }
    </style>
    