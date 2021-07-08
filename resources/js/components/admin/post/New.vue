<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form @submit.prevent="addnewPost()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postId">Add New Post </label>
                                    <input type="text" class="form-control" placeholder="Add New Post" v-model="post.title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="descriptionId">Add New Description</label>

                                    <textarea rows="5" cols="50" v-model="post.description"></textarea>

                                </div>

                                <div class="form-group" >
                                    <label>Select</label>
                                    <select class="form-control" v-model="post.cat_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="category.id" :key="idx" v-for="(category,idx) in categoryItem">option {{category.cat_name}}</option>

                                    </select>
                                 
                                </div>
                                <div class="form-group" >
                                    <input @change = "changePhoto()"  type="file" ref="file">
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
    export default {
     data(){
            return{
               post:{
                    title:'',
                    description:'',
                    cat_id:'',
                    photo:'',
                },
                categoryItem:[],
            }
        },
       mounted(){
            axios.get('http://localhost/blog/public/api/category')
                .then(res =>{
                    this.categoryItem=res.data;
                })
                .catch(err => console.log(err));
        },
        methods:{
            changePhoto(){
                this.post.photo= this.$refs.file.files[0];

                //  if(file.size>1048576){
                //      alert('Something went wrong!');
                //  }else{
                //    this.post.photo=file;
                //  }
            },
            addnewPost(){
                let formData= new FormData();
                formData.append('title',this.post.title);
                formData.append('description',this.post.description);
                formData.append('cat_id',this.post.cat_id);
                formData.append('photo',this.post.photo);
     
               axios.post('http://localhost/blog/public/api/savepost',formData,{
                     headers:{
                         'Content-Type':'multipart/form-data'
                     }
                 })
                    .then((res)=>{
                        this.$router.push('/post-list');
                        console.log(res)
                    })
                    .catch((err)=>{
                           console.log(err)
                    })
            }
        }

    }
</script>

<style scoped>

</style>