<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  @submit.prevent="updatePost()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postId">Update Post </label>
                                    <input type="text" class="form-control" v-model="post.title">
                                </div>
                                <div class="form-group">
                                    <label for="descriptionId">Add New Description</label>

                                    <textarea v-model="post.description"></textarea>
                                </div>

                                <div class="form-group" >
                                    <label>Select</label>
                                    <select class="form-control"  v-model="post.cat_id">
                                        <option  value="">Select One</option>
                                        <option :value="category.id" :key="id" v-for="(category,id) in categoryItem">{{category.cat_name}}</option>

                                    </select>
                                </div>
                                <div class="form-group" >
                                    <input @change = "changePhoto()" type="file" ref="file">
                                     <img :src="post.photo" alt="" width="80" height="80">
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
            axios.get('http://localhost/blog/public/api/post/'+this.$route.params.postid)
                .then(res =>{
                    this.post.title=res.data.title;
                    this.post.description=res.data.description;
                    this.post.cat_id=res.data.cat_id;
                    this.post.photo=res.data.photo;
                    console.log(res);
                })
                .catch(err => console.log(err));

            axios.get('http://localhost/blog/public/api/category')
                .then(res =>{
                    this.categoryItem=res.data;
                })
                .catch(err => console.log(err));
        },
        methods:{
           changePhoto(){
                this.post.photo= this.$refs.file.files[0];
            },
            updatePost(){
                let formData= new FormData();
                formData.append('title',this.post.title);
                formData.append('description',this.post.description);
                formData.append('cat_id',this.post.cat_id);
                // formData.append('photo',this.post.photo);
     
               axios.post('http://localhost/blog/public/api/update/'+this.$route.params.postid,formData,{
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