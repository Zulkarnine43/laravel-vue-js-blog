<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  @submit.prevent="updateCategory()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryId">Edit Category</label>
                                    <input type="text" class="form-control" v-model="categoryItem.cat_name">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
import Swal from 'sweetalert2'
    export default {
      data(){
       return{
           categoryItem:{
                    cat_name:''
                   }
          }
        },
        mounted(){
            axios.get('http://localhost/blog/public/api/editcategory/'+this.$route.params.categoryid)
                .then(res =>{
                    this.categoryItem.cat_name=res.data.cat_name;
                })
                .catch(err => console.log(err));
        },
        methods:{
            updateCategory(){
                axios.post('http://localhost/blog/public/api/update-category/'+this.$route.params.categoryid,this.categoryItem)
                    .then((response)=>{
                        this.$router.push('/category-list')
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been update',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    })
                    .catch(()=>{
                        console.log(err)
                    })
            }
        }


    }
</script>

<style scoped>

</style>