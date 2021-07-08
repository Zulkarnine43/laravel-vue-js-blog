<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  @submit.prevent="addCategory()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryId">Add New Category</label>
                                    <input type="text" class="form-control" v-model="category.cat_name" placeholder="Add New Category">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
import axios from 'axios'
import Swal from 'sweetalert2'
    export default {
        // name: "New",
        data(){
            return {
                category:{
                    cat_name:''
                },
                message:'',
            }
        },
        methods:{
            addCategory(){
                axios.post('http://localhost/blog/public/api/add-category',this.category)
                    .then((response)=>{
                  this.$router.push('/category-list');
                        Swal.fire({
                        icon: 'success',
                        title: 'Category Added successfully...',
                        })
                    })
                    .catch((err)=>{
                      console.log(err);
                    })
            }
        }

    }
</script>

<style scoped>

</style>